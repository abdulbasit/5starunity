<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Lottery;
use Auth;
use DB;
class LottryController extends Controller
{

    public function index()
    {
        $lotteries = Lottery::with('product')->get();
        dd($lotteries);
        return view('admin.lotteries.index',compact('lotteries'));
    }
    public function create()
    {
        $products = Product::all();
        return view('admin.lotteries.create',compact('products'));
    }
    public function save(Request $request)
    {
        $start_date =  date('Y-m-d', strtotime($request->get("start_date")));
        $end_date =  date('Y-m-d', strtotime($request->get("end_date")));
        $lottery_id = Lottery::create([
            "name" => $request->get("name"),
            "description"=>$request->get("desc"),
            "pro_id"=>$request->get("pro_id"),
            "lot_amount"=>$request->get("lot_amount"),
            "min_lot_amount"=>$request->get('min_lot'),
            "max_lot_amount"=>$request->get('max_lot'),
            "start_date"=>$start_date,
            "end_date"=>$end_date,
            "created_at"=>Carbon::now(),
            "updated_at"=>Carbon::now(),
            "one_lot_amount"=>$request->get('one_lot_amount'),
            "total_lots"=>$request->get('total_lots'),
            "factor_amount"=>$request->get('factor')
        ]);

        return redirect('admin/lotteries');
    }
    public function edit($id)
    {
        $products = Product::all();
        $lottery = Lottery::find($id);
        return view('admin.lotteries.edit',compact('products','lottery'));
    }
    public function update($id,Request $request)
    {
        $start_date =  date('Y-m-d', strtotime($request->get("start_date")));
        $end_date =  date('Y-m-d', strtotime($request->get("end_date")));
        $lottery = Lottery::find($id);
        $lottery->name=$request->get("name");
        $lottery->description=$request->get("desc");
        $lottery->pro_id=$request->get("pro_id");
        $lottery->lot_amount=$request->get("lot_amount");
        $lottery->min_lot_amount=$request->get("min_lot");
        $lottery->max_lot_amount=$request->get("max_lot");
        $lottery->start_date=$start_date;
        $lottery->end_date=$end_date;
        $lottery->updated_at = Carbon::now();
        $lottery->one_lot_amount=$request->get("one_lot_amount");
        $lottery->total_lots=$request->get("total_lots");
        $lottery->factor_amount=$request->get("factor");
        $lottery->save();
        return redirect('admin/lotteries');
    }
    public function delete($id,Request $request)
    {
        $lottery = Lottery::where('id',$id);
        $lottery->delete();
        return redirect('admin/lotteries');
    }
    public function detail($id)
    {
        $lotteryInfo='';
        return view('admin.lotteries.lottery_detail',compact('lotteryInfo'));
    }
}
