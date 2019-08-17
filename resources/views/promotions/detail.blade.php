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
                            
                            <h3 class="product-title"> {{$company_detail->company_name}} </h3>
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
                                    <object width="100%" height="600" data="http://www.youtube.com/v/{{$whatIWant}}" type="application/x-shockwave-flash"><param name="src" value="http://www.youtube.com/v/{{$whatIWant}}" /></object>    
                                @endif
                            </div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
    </div>

<!-- Trigger the modal with a button -->
{{-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> --}}
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Lottery Numbers</h4>
            </div>
            <div class="modal-body">
            <p>Pleaase notedown your lottery numbers </p>
            <div id="numbers"></div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
    </div>
</div>
@endsection
@section('script')
 
@endsection
