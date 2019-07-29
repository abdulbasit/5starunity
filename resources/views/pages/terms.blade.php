@extends('layouts.app')
@section('content')
<div class="container no-padding">
    <br />
    <h2 class="text-center registerHeading">{{$page->page_title}}</h2>
    <br />
    <div class="fieldset-content">
        <div class="row">
            <div class="col-xs-12 terms_cond" id="terms">
                {{$page->page_content}}
            </div>
        </div>
    </div>
</div>
@endsection
