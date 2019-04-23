@extends('layouts.app')
@section('content')
@section('style')
<style>
#paymentOptions
{
    height: 500px;
}
</style>
@endsection
<div class="container">
    <div class="row profile">
         @include('../layouts.user_menu')
         <div class="col-md-9 prof">
            <div class="checkout-panel">
                @if(Session::get('success')!="")
                <div class="alert alert-success">
                    <strong>Success!</strong> {{Session::get('success')}}
                </div>
                @endif
                <div id="historyTable">
                    <h3>Your Purchased Lotteries</h3>
                    <table class="table table-striped text-center">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Lottery Name </th>
                            <th class="text-center">Total lots</th>
                            <th class="text-center">Total Amount</th>
                            <th class="text-center">Purchased Date</th>
                            <th class="text-center">Detail</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lotteryData as $key => $lottery)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$lottery->lottery->name}}</td>
                                <td>{{$lottery->totalBalance}}</td>
                                <td>{{$lottery->totalBalance*$lottery->lottery->one_lot_amount}}</td>
                                <td>{{Carbon\Carbon::parse($lottery->created_at)->toFormattedDateString()}}</td>
                                <td><a href="{{route("lots.numbers",$lottery->lottery->id)}}">Detail</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
         </div>
    </div>
</div>
@endsection
