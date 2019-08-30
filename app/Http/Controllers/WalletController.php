<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_images;
use App\Models\Lottery;
use App\Models\LotteryContestent;
use App\Models\Vallet;
use App\Models\UserDocument;
use App\Models\UserProfile;
use Route;
use Session;
use Auth;
use DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\TransLog;

use PayPal\Api\Amount;
use PayPal\Api\PaymentExecution;
use PayPal\Api\CreditCard;
use PayPal\Api\FundingInstrument;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\ResultPrinter;
use Cache;
use Config;
class WalletController extends Controller
{
    private $_api_context;

    public function __construct()
    {

        // setup PayPal api context
        $paypal_conf = Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }
    public function index($type="", Request $request)
    {
        $action = $request->input('action');

        $userId = Auth::guard('client')->user()->id;
        $userData = User::where('users.id',$userId)->first();
        $userProfile = UserProfile::with("country_name","state_name")->where('user_id',$userId)->first();

        $userDocuments = UserDocument::where('user_id',$userId)->get();
        $userInfo = array("user_data"=>$userData,"user_profile"=>$userProfile,"user_documents"=>$userDocuments);

        DB::enableQueryLog(); // Enable query log

        $route='wallet';
        $walletHistory = Vallet::where('user_id',$userId)->where('status','approved')->orderBy('id','desc')->get();
        
        // if($type=="credit")
        // {   
        //     $walletHistory = $walletHistory->where('credit','>','0');
        // }
        // else if($type=="lot" || $type=="bonus")
        // {
            // $walletHistory = $walletHistory->where('credit','0.00');
        // }
        // else
        // {
        //     $type='credit';
        // }
        // $walletHistory = $walletHistory->orderBy('id','desc')->get();
        
        // dd(DB::getQueryLog()); // Show results of log
        
        return view('wallet.index',compact('userInfo','route','walletHistory','action','type'));
    }
    public function kalarna()
    {
        require(base_path() . '/vendor/autoload.php');
        $merchantId = getenv('USERNAME') ?: 'PK08452_e7d971b33f20';
        $sharedSecret = getenv('PASSWORD') ?: 'zJZvHMidbFnoqr1n';
        $authorizationToken = getenv('AUTH_TOKEN') ?: 'authorizationToken';

        $apiEndpoint = Transport\ConnectorInterface::EU_TEST_BASE_URL;

        $connector = Klarna\Rest\Transport\Connector::create(
            $merchantId,
            $sharedSecret,
            $apiEndpoint
        );
    }

    public function donated(Request $request)
    {
            $amount = $request->get('credit');
            $baseUrl = url('/');
            $payer = new Payer();
            $payer->setPaymentMethod("paypal");
            $currency = 'USD';
            $amountPayable = $amount;
            $invoiceNumber = uniqid();
            $amount = new Amount();
            $amount->setCurrency($currency)
                ->setTotal($amountPayable);
            $transaction = new Transaction();
            $transaction->setAmount($amount)
                ->setDescription('5starUnity Balance Purchases ')
                ->setInvoiceNumber($invoiceNumber);
                $redirectUrls = new RedirectUrls();
                $redirectUrls->setReturnUrl("$baseUrl/response?success=true")
                ->setCancelUrl("$baseUrl/donate?success=false");
                $payment = new Payment();
            $payment->setIntent('sale')
                ->setPayer($payer)
                ->setTransactions([$transaction])
                ->setRedirectUrls($redirectUrls);
            try {
                $payment->create($this->_api_context);
            } catch (Exception $e) {
                throw new Exception('Unable to create link for payment');
            }
            header('location:' . $payment->getApprovalLink());
            exit(1);
    }
    public function response()
    {
       
        if (empty($_GET['paymentId']) || empty($_GET['PayerID']))
        {
            throw new Exception('The response is missing the paymentId and PayerID');
        }
        $paymentId = $_GET['paymentId'];
        $payment = Payment::get($paymentId, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId($_GET['PayerID']);
        try {

           $response= $payment->execute($execution, $this->_api_context);

           $type = 'payal';
           $payment_method = $response->payer->payment_method;
           $invoice_id = $response->transactions[0]->invoice_number;
           $amount = $response->transactions[0]->amount->total;
           $transaction_id = $response->transactions[0]->related_resources[0]->sale->id;
           $state = $response->transactions[0]->related_resources[0]->sale->state;
           $users_id = Auth::guard('client')->user()->id;
           $checkTotalCredit = Vallet::where('user_id',$users_id)->where('status','approved')->where('type','credit')->orderBy('id','desc')->first();
           if(!$checkTotalCredit)
               {
                   $trans_id = Vallet::create([
                       "user_id" => $users_id,
                       "credit"=>$amount,
                       "balance"=>$amount,
                        "pre_balance"=> '0',
                        "total_available_balance"=>$amount,
                        "created_at"=>Carbon::now(),
                        "updated_at"=>Carbon::now(),
                        "status"=>"approved",
                        "type"=>"credit"
                   ]);
               }
               else
               {
                   $credit = $amount;
                   $previousBalance = $checkTotalCredit->total_available_balance;
                   $remainingTotalBalance = $checkTotalCredit->total_available_balance+$credit;
                   $balance = $credit;

                   $trans_id = Vallet::create([
                       "user_id" => $users_id,
                       "credit"=>$credit,
                       "balance"=>$balance,
                       "pre_balance"=> $previousBalance,
                       "total_available_balance"=>$remainingTotalBalance,
                       "created_at"=>Carbon::now(),
                       "updated_at"=>Carbon::now(),
                       "status"=>"approved",
                       "type"=>"credit"
                   ]);
                }
           //save transaction log
           $trans_log = TransLog::create([
               "type" => $type,
               "payment_method"=>$payment_method,
               "amount"=>$amount,
               "trans_id"=> $transaction_id,
               "state"=>$state,
               "invoice_number"=>$invoice_id,
               "vallet_id"=>$trans_id->id,
               "created_at"=>Carbon::now(),
               "updated_at"=>Carbon::now()
           ]);
           Session::flash('success', "Payment Successfull!");
           return redirect('/wallet');
        }
        catch (Exception $e)
        {
            // Failed to take payment
        }
    }
    public function credit_card(Request $request)
    {
        // return "Hello?";
        $card = new CreditCard();
        $expiration = explode("/",$request->get('expiration'));
        // 4694416896479228
        $card->setType("visa")->setNumber($request->get('card_number'))->setExpireMonth($expiration[0])->setExpireYear($expiration[1])->setCvv2($request->get('cvv'))->setFirstName($request->get('fname'))->setLastName($request->get('lname'));
        $fi = new FundingInstrument();
        $fi->setCreditCard($card);
        $payer = new Payer();
        $payer->setPaymentMethod("credit_card")->setFundingInstruments(array($fi));
        $item1 = new Item();
        $item1->setName('5Starunity Credit Purcase')->setDescription('5Starunity Credit Purcase')->setCurrency('USD')->setQuantity(1)->setTax(0)->setPrice($request->get('credit'));
        //  $item2 = new Item();
        //  $item2->setName('Granola bars')->setDescription('Granola Bars with Peanuts')->setCurrency('USD')->setQuantity(5)->setTax(0.2)->setPrice(2);
        $itemList = new ItemList();
        $itemList->setItems(array($item1));
        $details = new Details();
        $details->setShipping(0)->setTax(0)->setSubtotal($request->get('credit'));
        $amount = new Amount();
        $amount->setCurrency("USD")->setTotal($request->get('credit'))->setDetails($details);
        $transaction = new Transaction();
        $transaction->setAmount($amount)->setItemList($itemList)->setDescription("Payment description")->setInvoiceNumber(uniqid());
        $payment = new Payment();
        $payment->setIntent("sale")->setPayer($payer)->setTransactions(array($transaction));
        $request = clone $payment;

        try {
            $response = $payment->create($this->_api_context);

            $type = 'payal';
            $payment_method = $response->payer->payment_method;
            $invoice_id = $response->transactions[0]->invoice_number;
            $amount = $response->transactions[0]->amount->total;
            $transaction_id = $response->transactions[0]->related_resources[0]->sale->id;
            $state = $response->transactions[0]->related_resources[0]->sale->state;

            $users_id = Auth::guard('client')->user()->id;
            $checkTotalCredit = Vallet::where('user_id',$users_id)->where('status','approved')->where('type','credit')->orderBy('id','desc')->first();
                if(!$checkTotalCredit)
                {
                    $trans_id = Vallet::create([
                        "user_id" => $users_id,
                        "credit"=>$amount,
                        "balance"=>$amount,
                         "pre_balance"=> '0',
                         "total_available_balance"=>$amount,
                         "created_at"=>Carbon::now(),
                         "updated_at"=>Carbon::now(),
                         "status"=>"pending",
                         "type"=>"credit"
                    ]);
                }
                else
                {
                    $credit=$amount;
                    $previousBalance = $checkTotalCredit->total_available_balance;
                    $remainingTotalBalance = $checkTotalCredit->total_available_balance+$credit;
                    $balance = $credit;

                    DB::enableQueryLog();
                    $trans_id = Vallet::create([
                        "user_id" => $users_id,
                        "credit"=>$credit,
                        "balance"=>$balance,
                        "pre_balance"=> $previousBalance,
                        "total_available_balance"=>$remainingTotalBalance,
                        "created_at"=>Carbon::now(),
                        "updated_at"=>Carbon::now(),
                        "status"=>"pending",
                        "type"=>"credit"
                    ]);
                // dd(DB::getQueryLog());
                }
            //save transaction log
            $trans_log = TransLog::create([
                "type" => $type,
                "payment_method"=>$payment_method,
                "amount"=>$amount,
                "trans_id"=> $transaction_id,
                "state"=>$state,
                "invoice_number"=>$invoice_id,
                "vallet_id"=>$trans_id->id,
                "created_at"=>Carbon::now(),
                "updated_at"=>Carbon::now()
            ]);
            $transStatus = Vallet::find($trans_id->id);
            $transStatus->status='approved';
            $transStatus->save();
            return 'success';
        } catch (Exception $ex) {
            $transStatus = Vallet::find($trans_id->id);
            $transStatus->status='error';
            $transStatus->save();
            echo 'error';
        }
    }
    public function capturePayment()
    {
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");
        $item1 = new Item();
        $item1->setName('Ground Coffee 40 oz')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice(7.5);
        $item2 = new Item();
        $item2->setName('Granola bars')
            ->setCurrency('USD')
            ->setQuantity(5)
            ->setPrice(2);

        $itemList = new ItemList();
        $itemList->setItems(array($item1, $item2));
        $details = new Details();
        $details->setShipping(1.2)
            ->setTax(1.3)
            ->setSubtotal(17.50);
        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal(20)
            ->setDetails($details);
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid());
            $baseUrl = url('/');
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl("$baseUrl/redirectBack?success=true")
            ->setCancelUrl("$baseUrl/redirectBack?success=false");
        $payment = new Payment();
        $payment->setIntent("authorize")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));
        $request = clone $payment;
        try {
            $payment->create($this->_api_context);
        } catch (Exception $ex) {
            ResultPrinter::printError("Created Payment Authorization Using PayPal. Please visit the URL to Authorize.", "Payment", null, $request, $ex);
            exit(1);
        }
        $approvalUrl = $payment->getApprovalLink();
        ResultPrinter::printResult("Created Payment Authorization Using PayPal. Please visit the URL to Authorize.", "Payment", "<a href='$approvalUrl' >$approvalUrl</a>", $request, $payment);

        return $payment;
    }
    public function redirectBack()
    {
        if (isset($_GET['success']) && $_GET['success'] == 'true') {

                $paymentId = $_GET['paymentId'];
                $payment = Payment::get($paymentId, $this->_api_context);

                $execution = new PaymentExecution();
                $execution->setPayerId($_GET['PayerID']);

                $transaction = new Transaction();
                $amount = new Amount();
                $details = new Details();

                $details->setShipping(2.2)
                    ->setTax(1.3)
                    ->setSubtotal(17.50);

                $amount->setCurrency('USD');
                $amount->setTotal(21);
                $amount->setDetails($details);
                $transaction->setAmount($amount);


                $execution->addTransaction($transaction);

                try {

                    $result = $payment->execute($execution, $this->_api_context);


                    ResultPrinter::printResult("Executed Payment", "Payment", $payment->getId(), $execution, $result);

                    try {
                        $payment = Payment::get($paymentId, $this->_api_context);
                    } catch (Exception $ex) {


                        ResultPrinter::printError("Get Payment", "Payment", null, null, $ex);
                        exit(1);
                    }
                } catch (Exception $ex) {


                    ResultPrinter::printError("Executed Payment", "Payment", null, null, $ex);
                    exit(1);
                }


                ResultPrinter::printResult("Get Payment", "Payment", $payment->getId(), null, $payment);

                return $payment;
            }
            else
            {
                ResultPrinter::printResult("User Cancelled the Approval", null);
                exit;
            }
    }
    public function detail($id)
    {
        $userId = Auth::guard('client')->user()->id;
        $userData = User::where('users.id',$userId)->first();
        $userProfile = UserProfile::with("country_name","state_name")->where('user_id',$userId)->first();

        $userDocuments = UserDocument::where('user_id',$userId)->get();
        $userInfo = array("user_data"=>$userData,"user_profile"=>$userProfile,"user_documents"=>$userDocuments);

        $route='lotteries';
        $lotteryDetail = LotteryContestent::where('lottery_id',$id)
                                            ->where('lottery_contestents.user_id',$userId)
                                            ->leftjoin('vallets','vallets.id','lottery_contestents.vallet_id')
                                            ->select('lottery_contestents.*','vallets.*')
                                            ->orderBy('lottery_contestents.id','desc')
                                            ->get();
        return view('wallet.lottery_contents',compact('lotteryDetail','userInfo','route'));
    }
}
