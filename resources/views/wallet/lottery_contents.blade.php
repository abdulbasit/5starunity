@extends('layouts.app')
@section('content')
@section('style')
<style>
#paymentOptions
{
    height: 500px;
}
.profileTable > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td
{
    padding-left:0px !important
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
                    <h3>Übersicht Ihre Lose</h3>
                    <table class="table table-striped text-center">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Eingelöst mit</th>
                            <th class="text-center">LOS Nummer</th>
                            <th class="text-center">Eingelöste Taler</th>
                            <th class="text-center">Einlösungsdatum</th>
                            <th class="text-center">Status</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lotteryDetail as $key => $lottery)
                            <tr>
                                <td>{{$key+1}}</td>
                                @if($lottery->type=='credit')
                                    <td>Purchased Credit</td>
                                @elseif($lottery->type=='bonus')
                                    <td>Bonus Talers</td>
                                @elseif($lottery->type=='team')
                                    <td>Team Spend Bonus</td>
                                @endif
                                <td>{{$lottery->lot_number}}</td>
                                <td>{{$lottery->lottery->one_lot_amount}}</td>
                                <td>{{Carbon\Carbon::parse($lottery->created_at)->toFormattedDateString()}}</td>
                                <td>
                                    @if($lottery->status==0)
                                        Nicht gewonnen
                                    @else if($lottery->status==1)
                                        Gewonnen
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
