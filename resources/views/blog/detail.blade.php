
@extends('layouts.app')
@section('content')

<div class="container pageContent">
        <div class="row">
            <div class="col-md-8">
            <div class="">
                <h2>
                    {{$blogPostData->title}}
                </h2>
            </div>
            <div class="clear"></div>
                <div class="articleDetails">

                    <div class="dottedSpacer"></div>
                    <div class="row">
                        <div class="col-md-12" style="min-height: 42px;">
                            <span class="articleDate">{{\Carbon\Carbon::parse($blogPostData->created_at)->toFormattedDateString()}}</span>

                        </div>
                    </div>
                    <div class="dottedSpacer"></div>
                    <div class="inner-text news-inner-text">
                        {!! html_entity_decode($blogPostData->description) !!}
                    </div>
                </div>
                <br />
                <br />
                @if(!Auth::guard('client')->check())
                    <h3>Kommentare</h3>
                    <div class="row">
                        <div class="col-sm-8">
                            <p>Das Kommentieren ist nur für Registrierte Benutzer möglich. Bitte melden Sie sich an, um kommentieren zu können.</p>
                        </div>
                        <div class="col-sm-4 text-center">
                            <a href="{{ route('login') }}" class="btn btn-primary" style="margin-bottom: 5px;">Log In</a> &nbsp;
                            <a href="{{ route('register') }}" class="btn btn-primary" style="margin-bottom: 5px;">Registrieren</a>
                        </div>
                    </div>
                @else
                    <h3>Bemerkungen</h3>
                    <div class="row addComment " id="addCommentMain" style="display: block;">
                        {{-- <div class="col-sm-2 col-md-1">
                            <div class="avatar" style="background-image:url();"></div>
                        </div> --}}
                        <div class="col-xs-12">
                            <form class="message-field" action="#" method="post" id="addCommForm">
                                <textarea name="comment" id="postCommentBox" placeholder="Geben Sie hier Ihre Nachricht ein"></textarea>
                                <input type="hidden" name="post_id" id="post_id" value="{{$blogPostData->id}}">
                                <span id="cmnt_msg" class="red" style="display:none; color:red">Required Field</span>
                                <button type="button" onclick="sumbit_comment()" class="btn-default-new-layout-small btn-new-layout-ghost-bggreen pull-right">Submit</button>
                            </form>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                          <div class="col-md-8">
                              <section class="comment-list">
                                @foreach($commentsData as $i=>$comments)
                                    <!-- First Comment -->
                                    <article class="row">
                                    <div class="col-md-2 col-sm-2 hidden-xs">
                                        <figure class="thumbnail">
                                            @if($commentsData[$i]->user->userProfile->profile_picture=="")
                                                <img class="img-responsive" id="prfl_picture" src="{{ URL::to('/') }}/frontend/graphics/profile_avtar.png">
                                            @else
                                                <img class="img-responsive" id="prfl_picture"  src="{{ URL::to('/') }}/uploads/users/profile_pic/{{$commentsData[$i]->user->userProfile->profile_picture}}">
                                            @endif
                                        </figure>
                                    </div>
                                    <div class="col-md-10 col-sm-10">
                                        <div class="panel panel-default arrow left">
                                        <div class="panel-body">
                                            <header class="text-left">
                                            <div class="comment-user"><i class="fa fa-user"></i> {{$blogPostData->blog_comments[$i]->user->name." ".$blogPostData->blog_comments[$i]->user->middle_name." ".$blogPostData->blog_comments[$i]->user->last_name}}</div>
                                            <time class="comment-date" datetime="{{\Carbon\Carbon::parse($comments->created_at)->format('d-m-Y H:i:s')}}"><i class="fa fa-clock-o"></i> {{\Carbon\Carbon::parse($comments->created_at)->toFormattedDateString()}}</time>
                                            </header>
                                            <div class="comment-post">
                                            <p>
                                                {{$comments->comment}}
                                            </p>
                                            </div>
                                            {{-- <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a></p> --}}
                                        </div>
                                        </div>
                                    </div>
                                    </article>
                                @endforeach
                              </section>
                          </div>
                        </div>
                      </div>
                @endif
            </div>
            <div class="col-lg-4 col-xs-12 categories">
                <h4 class="text-left">Categories</h4>
                <div class="profile-usermenu">
                    <ul class="nav">
                        @foreach($categories as $category)
                        <li class="">
                            <a href="/cat-news/{{$category->id}}">{{$category->name}} </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
@endsection
@section('script')
<script>
    function sumbit_comment()
    {

        var comment = $("#postCommentBox").val();
        if(comment=="")
            {
                $("#postCommentBox").addClass('error_msg');
                $("#cmnt_msg").css('display','block');
                return false;
            }
        $("#postCommentBox").removeClass('error_msg');
        $("#cmnt_msg").css('display','none');
        var post_id = $("#post_id").val();
        $.ajax({
            method: "POST",
            url: "{{route('post-comment')}}",
            data: { "_token": "{{ csrf_token() }}",comment: comment, post_id,post_id}
        })
        .done(function( msg ) {
            $("#postCommentBox").val("");
            location.reload();
        });
    }

</script>
@endsection
