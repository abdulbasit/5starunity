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
                    <h3>Your Lots</h3>
                    <table class="table table-striped text-center">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Lot Number</th>
                            <th class="text-center">Lot Amount</th>
                            <th class="text-center">Created At</th>
                            <th class="text-center">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lotteryDetail as $key => $lottery)

                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$lottery->lot_number}}</td>
                                <td>{{$lottery->lottery->one_lot_amount}}</td>
                                <td>{{Carbon\Carbon::parse($lottery->created_at)->toFormattedDateString()}}</td>
                                <td>
                                    @if($lottery->status==0)
                                        Not Winner
                                    @else if($lottery->status==1)
                                        Winner
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
         </div>
    </div>
</div>
@endsection
