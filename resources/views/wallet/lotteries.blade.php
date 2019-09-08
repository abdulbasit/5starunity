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
         <div class="col-md-9 ">
             <div class="row">
                 <div class="col-md-8">
                    Viele Partner stellen Produkte / Konzepte zur Verfügung um unsere Community und des Gedanken des spendenbasierten Crowdfundings voran zu bringen. Diese Vorteile möchten wir an alle Spender weitergeben - nutzen Sie daher die Möglichkeit, Ihre Taler in unserer internen Lottery of Things einzulösen!
                 </div>
                 <div class="col-md-4 col-sm-4 c_dist" >
                    <a href="/lotteries">
                        <div class="circle c_nd lotteriesCircle"></div>
                    </a>
                 </div>
             </div>
                <br /><br />
            <div class="checkout-panel">
                @if(Session::get('success')!="")
                <div class="alert alert-success">
                    <strong>Success!</strong> {{Session::get('success')}}
                </div>
                @endif
                <div id="historyTable">
                    <h3>Übersicht Ihrer Teilnahmen</h3>
                    <table class="table table-striped text-center">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Verlosungsname </th>
                            <th class="text-center">Anzahl Lose</th>
                            <th class="text-center">Eingelöste Taler</th>
                            <th class="text-center">Einlösungsdatum</th>
                            <th class="text-center">Anmerkungen</th>
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
