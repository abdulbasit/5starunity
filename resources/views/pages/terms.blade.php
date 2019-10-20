@extends('layouts.app')
@section('content')
<div class="container no-padding">
    <br />
    <h2 class="text-center registerHeading">{{$page->page_title}}</h2>
    <br />
    <div class="fieldset-content">
        <div class="row">
            <div class="col-xs-12 terms_cond" id="terms">
                {!!$page->page_content!!}
                @if($pageName=='partner')
                    <div class="col-xs-12 button-container" style="margin:0px; margin-top:35px">
                        <a href="https://advertise.5starunity.com" class="btn layoutV2-btn" style="width:500px">
                            pix`lMania 
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
