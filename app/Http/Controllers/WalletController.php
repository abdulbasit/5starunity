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
    public function index()
    {
        $userId = Auth::guard('client')->user()->id;
        $userData = User::where('users.id',$userId)->first();
        $userProfile = UserProfile::with("country_name","state_name")->where('user_id',$userId)->first();
        // dd($userProfile['country_name']->name);
        $userDocuments = UserDocument::where('user_id',$userId)->get();
        $userInfo = array("user_data"=>$userData,"user_profile"=>$userProfile,"user_documents"=>$userDocuments);
        // dd($userInfo['user_profile']);
        $route='wallet';
        $walletHistory = Vallet::where('credit','>','0')->where('status','approved')->get();
        return view('wallet.index',compact('userInfo','route','walletHistory'));
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

    public function donated()
    {
        $apiContext = new ApiContext(
            new OAuthTokenCredential(
                'AficHECouMmU57A3VrB7mCNGZLr_XGYUfo76jH9zlYdeLv8atTJADxoot0V_popoqfdbOwZLf83zPXpi',     // ClientID
                'EPvvH-sgq8D6DnN_CyFUAYrlFYP4F4jaSXsAg7zfjK_HvB2s6Z2pHb5loqQrFmYR9fpYKaMGvw_sIBhX'      // ClientSecret
                )
            );
            $baseUrl = url('/');
            $payer = new Payer();
            $payer->setPaymentMethod("paypal");
            $currency = 'USD';
            $amountPayable = 10.00;
            $invoiceNumber = uniqid();
            $amount = new Amount();
            $amount->setCurrency($currency)
                ->setTotal($amountPayable);
            $transaction = new Transaction();
            $transaction->setAmount($amount)
                ->setDescription('Some description about the payment being made')
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
                $payment->create($apiContext);
            } catch (Exception $e) {
                throw new Exception('Unable to create link for payment');
            }
            header('location:' . $payment->getApprovalLink());
            exit(1);
    }
    public function response(){
        $apiContext = new ApiContext(
            new OAuthTokenCredential(
                'AficHECouMmU57A3VrB7mCNGZLr_XGYUfo76jH9zlYdeLv8atTJADxoot0V_popoqfdbOwZLf83zPXpi',     // ClientID
                'EPvvH-sgq8D6DnN_CyFUAYrlFYP4F4jaSXsAg7zfjK_HvB2s6Z2pHb5loqQrFmYR9fpYKaMGvw_sIBhX'      // ClientSecret
                )
            );
        if (empty($_GET['paymentId']) || empty($_GET['PayerID'])) {
            throw new Exception('The response is missing the paymentId and PayerID');
        }
        $paymentId = $_GET['paymentId'];
        $payment = Payment::get($paymentId, $apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId($_GET['PayerID']);
        try {
            // Take the payment
           $res= $payment->execute($execution, $apiContext);
           dd($payment->getApprovalLink());
        } catch (Exception $e) {
            // Failed to take payment
        }
    }
    public function paypal()
    {
        $apiContext = new ApiContext(
            new OAuthTokenCredential(
                'AficHECouMmU57A3VrB7mCNGZLr_XGYUfo76jH9zlYdeLv8atTJADxoot0V_popoqfdbOwZLf83zPXpi',     // ClientID
                'EPvvH-sgq8D6DnN_CyFUAYrlFYP4F4jaSXsAg7zfjK_HvB2s6Z2pHb5loqQrFmYR9fpYKaMGvw_sIBhX'      // ClientSecret
                )
            );

            $payer = new Payer();
            $payer->setPaymentMethod("paypal");
            $item1 = new Item();
            $item1->setName('Ground Coffee 40 oz')
                ->setCurrency('USD')
                ->setQuantity(1)
                ->setPrice(25.00);
            $item2 = new Item();
            $item2->setName('Granola bars')
                ->setCurrency('USD')
                ->setQuantity(5)
                ->setPrice(2);

            $itemList = new ItemList();
            $itemList->setItems(array($item1));
            $details = new Details();
            $details->setShipping(0)
                ->setTax(0)
                ->setSubtotal(25.00);
                $amount = new Amount();
            $amount->setCurrency("USD")
                ->setTotal(25)
                ->setDetails($details);
                $transaction = new Transaction();
            $transaction->setAmount($amount)
                ->setItemList($itemList)
                ->setDescription("Payment description")
                ->setInvoiceNumber(uniqid());
                $baseUrl = url('/');
                $redirectUrls = new RedirectUrls();
                $redirectUrls->setReturnUrl("$baseUrl/donate?success=true")
                    ->setCancelUrl("$baseUrl/donate?success=false");
                    $payment = new Payment();
            $payment->setIntent("sale")
                ->setPayer($payer)
                ->setRedirectUrls($redirectUrls)
                ->setTransactions(array($transaction));
                $request = clone $payment;
                try {
                    $payment->create($apiContext);
                } catch (Exception $ex) {
                    ResultPrinter::printError("Created Payment Order Using PayPal. Please visit the URL to Approve.", "Payment", null, $request, $ex);
                    exit(1);
                }
            echo $approvalUrl = $payment->getApprovalLink();
            ResultPrinter::printResult("Created Payment Order Using PayPal. Please visit the URL to Approve.", "Payment", "<a href='$approvalUrl' >$approvalUrl</a>", $request, $payment);

            return $payment;
    }
    public function credit_card(Request $request)
    {


        $users_id = Auth::guard('client')->user()->id;
        $checkTotalCredit = Vallet::where('user_id',$users_id)->orderBy('id','desc')->first();
            if(!$checkTotalCredit)
            {
                $trans_id = Vallet::create([
                    "user_id" => $users_id,
                    "credit"=>$request->get('credit'),
                    "balance"=>$request->get('credit'),
                     "pre_balance"=> '0',
                     "total_available_balance"=>$request->get('credit'),
                     "created_at"=>Carbon::now(),
                     "updated_at"=>Carbon::now(),
                     "status"=>"pending"
                ]);
            }
            else
            {

                $credit=$request->get('credit');
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
                    "status"=>"pending"
                ]);
            // dd(DB::getQueryLog());
            }

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
            $payment->create($this->_api_context);
            $transStatus = Vallet::find($trans_id->id);
            $transStatus->status='approved';
            $transStatus->save();
            echo 'success';
        } catch (Exception $ex) {
            $transStatus = Vallet::find($trans_id->id);
            $transStatus->status='error';
            $transStatus->save();
            echo 'error';
        }
    }
    public function donate()
    {
        $apiContext = new ApiContext(
            new OAuthTokenCredential(
                'AficHECouMmU57A3VrB7mCNGZLr_XGYUfo76jH9zlYdeLv8atTJADxoot0V_popoqfdbOwZLf83zPXpi',     // ClientID
                'EPvvH-sgq8D6DnN_CyFUAYrlFYP4F4jaSXsAg7zfjK_HvB2s6Z2pHb5loqQrFmYR9fpYKaMGvw_sIBhX'      // ClientSecret
                )
            );
    if (isset($_GET['success']) && $_GET['success'] == 'true') {
        // ### Approval Status
        $paymentId = $_GET['paymentId'];
        $payment = Payment::get($paymentId, $apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId($_GET['PayerID']);
        $transaction = new Transaction();
        $amount = new Amount();
        $details = new Details();
        $details->setShipping(0)
            ->setTax(0)
            ->setSubtotal(25.00);
        $amount->setCurrency('USD');
        $amount->setTotal(25);
        $amount->setDetails($details);
        $transaction->setAmount($amount);
        $execution->addTransaction($transaction);
        try {

            $result = $payment->execute($execution, $apiContext);

            ResultPrinter::printResult("Executed Payment", "Payment", $payment->getId(), $execution, $result);
            try {

                $payment = Payment::get($paymentId, $apiContext);
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
        } else {

            ResultPrinter::printResult("User Cancelled the Approval", null);
            exit;
        }
    }
}
