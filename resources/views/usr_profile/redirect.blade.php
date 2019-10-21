@extends('layouts.app')
@section('script')
<script>
    $( document ).ready(function() {
        var tarea = "{{$cuppon->reference_website}}";
        alert(tarea);
        if (tarea.indexOf("http://") == 0 || tarea.indexOf("https://") != 0) {
            alert('dd');
        }
       setTimeout(function(){
           
            // window.location="/{{$cuppon->reference_website}}"
       },8000)
    });
</script>
@endsection
@section('content')
    <div class="container">
        <div class="row profile">
            <div class="col-md-12 prof" style="margin-top:0px">
                <div class="text-center" >
                    <img width="100" src="{{ asset('frontend/img/loading.svg')}}" alt=""/>
                    <br />
                    <br />
                    <span>Please waite you will be automatically redirect to <b>{{$cuppon->reference_website}}...</b></span>
                </div>
            </div>
        </div>
    </div>
    
@endsection


