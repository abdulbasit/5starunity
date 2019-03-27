@extends('layouts.app')
@section('content')
<div class="headerBlue headerTransparent">
    <div class="container">
        <div class="row">
            <div class="text-center">
                <h1>News</h1>
            </div>
        </div>
    </div>
</div>

<div class="container pageContent">
	<div class="row">
		<div class="col-xs-12">
			<a href="rss.html" class="btn btn-primary btn-default" title="RSS FEED" style="margin-bottom: 30px;"><img class="img-responsive pull-left" src="../graphics/icons/icon-rss.png" alt="RSS FEED" title="RSS FEED" />RSS FEED</a>
		</div>
	</div>

    <div class="row">
        <div class="col-md-8">
            <div class="row">
                @foreach($blogData as $blog)
                <div class="col-sm-6">
                    <div class="homeNewsItem imgItem">
                        <a class="articleImgLink responsive-image-container-4by3" href="article/article-2766.html" title="{{$blog->title}}">
                            <img class="responsive-image-fit" lat="{{$blog->title}}" src="{{ URL::to('/') }}/uploads/blog/{{$blog->post_img}}" />
                        </a>
                        <div class="articleDate">{{\Carbon\Carbon::parse($blog->created_at)->toFormattedDateString()}}</div>
                        <a class="articleTitle smallerTitle" href="article/article-2766.html" title=" {{$blog->title}}">
                            {{$blog->title}}
                        </a>
                        <div class="articleBtm">
                            <div class="row">
                                <div class="col-xs-12 articleIcons">
                                    <a class="pull-right" href="article/article-2766.html#commentspart" title="Kommentare" style="margin-top:3px">
                                        <sup class="pull-right">0</sup>
                                        <img class="pull-right small_news_icon" src="{{ URL::to('/') }}/frontend/graphics/icons/icon-comments.svg" alt="Kommentare" title="Kommentare" />
                                    </a>
                                    <div class="shareIcon pull-right" title="Teilen" data-toggle="popover" data-placement="top" data-content="<div class='addthis_sharing_toolbox' data-url='https://www.companisto.com/de/article/article-2766' data-title='Warum vanilla bean auf vegan setzt - Schauen Sie es sich an! - Schauen Sie es sich an!'></div>">
                                        <img class="small_news_icon" src="{{ URL::to('/') }}/frontend/graphics/icons/icon-share.svg" alt="Teilen" title="Teilen" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
               </div>
            <nav class="text-center">
                <ul class="pagination">
                        {{ $blogData->links() }}
                    {{-- <li class='active'><span>1</span></li>
                    <li ><a href="news/2.html">2</a></li>
                    <li ><a href="news/3.html">3</a></li>
                    <li ><a href="news/4.html">4</a></li>
                    <li>
                    <a href="news/2.html" aria-label="Next" class="img-circle">
                        <span class="glyphicon glyphicon-menu-right"></span>
                    </a>
                    </li> --}}
                </ul>
            </nav>
        </div>
@endsection
