@extends('layouts.app')
@section('style')
    <style>
        .card{
            width:100%;
            border:0px;
            margin-top: 0px
        }
        .postContainer
        {
            width:100%; position:absolute; 
            height:100%; top:0px; 
            z-index:10000; padding:0px
        }
    </style>
@endsection
@section('script')
 <script>
  var timer2 = convertTime(<?php echo $company_detail->duration ?>);
    var interval = setInterval(function() {


    var timer = timer2.split(':');
    //by parsing integer, I avoid all extra string processing
    var minutes = parseInt(timer[0], 10);
    var seconds = parseInt(timer[1], 10);
    --seconds;
    minutes = (seconds < 0) ? --minutes : minutes;
    if (minutes < 0) clearInterval(interval);
    seconds = (seconds < 0) ? 59 : seconds;
    seconds = (seconds < 10) ? '0' + seconds : seconds;
    
    //minutes = (minutes < 10) ?  minutes : minutes;
    $('.countdown').html(minutes + ':' + seconds);
    timer2 = minutes + ':' + seconds;
    if(minutes==0 && seconds==0)
    {
        window.location="/partner/bonus/<?php echo $company_detail->id ?>"
    }
    },1000);
    
    function convertTime(sec) {
        var hours = Math.floor(sec/3600);
        (hours >= 1) ? sec = sec - (hours*3600) : hours = '00';
        var min = Math.floor(sec/60);
        (min >= 1) ? sec = sec - (min*60) : min = '00';
        (sec < 1) ? sec='00' : void 0;

        (min.toString().length == 1) ? min = '0'+min : void 0;    
        (sec.toString().length == 1) ? sec = '0'+sec : void 0;    

        return min+':'+sec;
    }
 </script>
@endsection
@section('content')

<input type="hidden" id="lottery_id" name="lottery_id" value="{{$company_detail->id}}">
<div class="container postContainer">
		<div class="card">
            <div class="row" style="margin-bottom:20px">
               <span class="pull-left"><a href="/promotions" style="font-size:16px; text-decoration:underline">Back</a></span>
            </div>
			<div class="container-fliud">   
				<div class="wrapper row">
					<div class="preview col-md-12">
                            
						<div class="preview-pic tab-content">
                            <h3 class="product-title pull-left"> {{$company_detail->company_name}}</h3>
                            <span class="pull-right" style="font-weight:bold; font-size:20px"><div class="countdown"></div></span>
                            <div class="tab-pane active" id="pic-1">
                                @if($company_detail->image!="")
                                    <img class="img-responsive" src="{{ URL::to('/') }}/uploads/copmany_images/{{$company_detail->image}}" />
                                @else
                                <?php 
                                    if (($pos = strpos($company_detail->vidoe, "=")) !== FALSE) 
                                    { 
                                        $whatIWant = substr($company_detail->vidoe, $pos+1); 
                                    }
                                    // $thumbnail="http://img.youtube.com/vi/".$whatIWant."/maxresdefault.jpg";
                                ?>
                                    <object width="100%" height="600" data="http://www.youtube.com/v/{{$whatIWant}}?autoplay=1" type="application/x-shockwave-flash"><param name="src" value="http://www.youtube.com/v/{{$whatIWant}}?autoplay=1" /></object>    
                                @endif
                            </div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
    </div>

@endsection

