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
@section('script')
    <script>
       $("#recomendations").on('click',function(){
            window.location='recomendations';
        });
    </script>
@endsection
@section('content')

    <div class="container">
        <div class="row profile">
            @include('../layouts.user_menu')
            <div class="profile-content">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ $message }}
                    </div>
                @endif
                <div class="row profile-body">
                    <div class="col-lg-9 col-xs-12 profileWraper">
                        <p>
                                Erfinder, Gründer und Start-Up Unternehmen, welche durch den 5starUnity e.V. mit Ihren Spenden unterstützt wurden, bieten an dieser Stelle Ihre Produkte an. Ferner finden Sie ggf. weitere Schnäppchen anderer Partner – wir wünschen Ihnen bereits an dieser Stelle viel Spass beim stöbern und einkaufen. 
                            <br />
                            <br />
                            Kennen auch Sie z.B. Unternehmen, welche unserer Community exklusive Produkte und / oder gezielte Angebote offerieren möchten? Durch Ihre Mithilfe können wir zu einer sehr starken Gemeinschaft wachsen und generieren Vorteile für jeden! 
                        </p>
                        <br />
                        <div class="row text-center">
                            <button id="recomendations" type="button" class="btn-green" style="margin-top:-5px; right:0px">
                                {{ __('lables.recomend') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

