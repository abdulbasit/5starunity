{{-- {{dd('here')}} --}}
@extends('layouts.app')

@section('style')
<style>
.bootstrap-tagsinput .tag
{
   line-height: 30px
}
.bs-docs-example input 
{
    width:100% !important
}
.bootstrap-tagsinput
{
    width:100%
}
.profileTable > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td
{
    padding-left:10px !important
}
</style>
<link rel="stylesheet" href="{{ asset('frontend/tags_input/bootstrap-tagsinput.css')}}">
@endsection
@section('content')
    <div class="container">
        <div class="row profile">
            @include('../layouts.user_menu')
            <div class="profile-content">
                <div class="row profile-body">
                    <div class="col-lg-8 col-xs-12 profileWraper">
                        <p>
                            Partner bieten Ihnen die Möglichkeit nachfolgend eingestellte Werbung bis zu drei Mal anzusehen wodurch Sie kostenfreie Bonus-Taler zur freien Verfügung erhalten. Nutzen Sie diese Chance um bspw. Lose von Produkten Ihrer Wahl zu erwerben.  
                            <br />
                            Kennen auch Sie z.B. Unternehmen, welche gut sichtbare Werbeplätze buchen und an garantierten Views / Klicks interessiert sein könnten? Jede positv zustande gekommene Empfehlung vergüten wir mit S-PAY, die Sie frei nutzen dürfen.  
                        </p>
                        <br />
                        <div class="row text-center">
                            <button type="submit" class="btn-green" style="margin-top:-5px">
                                {{ __('lables.recomend') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

