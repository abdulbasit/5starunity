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
        <div class="col-md-8">
            <div class="row">
                @foreach($blogData as $blog)

                <div class="col-sm-6">
                    <div class="homeNewsItem imgItem">
                        <a class="articleImgLink responsive-image-container-4by3" href="{{$blog->post_name}}-{{$blog->id}}" title="{{$blog->title}}">
                            <img class="responsive-image-fit" lat="{{$blog->title}}" src="{{ URL::to('/') }}/uploads/blog/{{$blog->post_img}}" />
                            <span class="">Update #1</span>
                        </a>
                        <div class="articleDate">{{\Carbon\Carbon::parse($blog->created_at)->toFormattedDateString()}}</div>
                        <a class="articleTitle smallerTitle" href="{{$blog->post_name}}-{{$blog->id}}" title=" {{$blog->title}}">
                            {{$blog->title}}
                        </a>
                        {{-- <div class="articleBtm">
                            <div class="row">
                                <div class="col-xs-12 articleIcons">
                                    <a class="pull-right" href="article/article-2766.html#commentspart" title="Kommentare" style="margin-top:3px">
                                        <sup class="pull-right">{{$blog->blog_comment}}</sup>
                                        <img class="pull-right small_news_icon" src="{{ URL::to('/') }}/frontend/graphics/icons/icon-comments.svg" alt="Kommentare" title="Kommentare" />
                                    </a>
                                    <div class="shareIcon pull-right" title="Teilen" data-toggle="popover" data-placement="top" data-content="<div class='addthis_sharing_toolbox' data-url='https://www.companisto.com/de/article/article-2766' data-title='Warum vanilla bean auf vegan setzt - Schauen Sie es sich an! - Schauen Sie es sich an!'></div>">
                                        <img class="small_news_icon" src="{{ URL::to('/') }}/frontend/graphics/icons/icon-share.svg" alt="Teilen" title="Teilen" />
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                @endforeach
               </div>
            <nav class="text-center">
                <ul class="pagination">
                    {{ $blogData->links() }}
                </ul>
            </nav>
        </div>
        {{-- <div class="col-md-4">

                <div class="sidebarBox" id="sidebar-twitter-box">
<div class="boxTitle">Twitter</div>
<div id="twitterBox">
<a class="twitter-timeline"  href="https://twitter.com/search?q=companisto" data-widget-id="273424024363745280"></a>
<script type="text/javascript">
        //<![CDATA[
        !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="../../platform.twitter.com/widgets.html";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
        //]]>
</script>
</div>
</div>                        <div class="sidebarBox graysidebarBox" id="sidebar-comments-box">

<div class="boxTitle">Neueste Kommentare</div>

            <div class="sidebarComment">
<span class="commentName">Paul</span> 04.02.2019:
<a class="commentTitle" href="article/article-2736.html" title="Nepos passt die Strategie an und sichert sich Aufträge von namhaften Kunden">Nepos passt die Strategie an und sichert sich Aufträge von namhaften Kunden</a>
<a href="article/article-2736.html#comment57970" title="Hallo Christian, erstmal in aller Kürze: wir zum Weihnachtsgeschäft 2019...">Hallo Christian, erstmal in aller Kürze: wir zum Weihnachtsgeschäft 2019...</a>
</div>
            <div class="sidebarComment">
<span class="commentName">Christian</span> 01.02.2019:
<a class="commentTitle" href="article/article-2736.html" title="Nepos passt die Strategie an und sichert sich Aufträge von namhaften Kunden">Nepos passt die Strategie an und sichert sich Aufträge von namhaften Kunden</a>
<a href="article/article-2736.html#comment57845" title="Es wäre nett, mal etwas Genaueres über einen möglichen Produktionsstart...">Es wäre nett, mal etwas Genaueres über einen möglichen Produktionsstart...</a>
</div>
            <div class="sidebarComment">
<span class="commentName">Anne-Kathrin</span> 29.01.2019:
<a class="commentTitle" href="article/article-2762.html" title="BE Food und StadtFarm wecken internationales Interesse">BE Food und StadtFarm wecken internationales Interesse</a>
<a href="article/article-2762.html#comment57775" title="Hallo Klaus,
es sieht ganz so aus! Wir freuen uns sehr, bedanken uns ganz...">Hallo Klaus,
es sieht ganz so aus! Wir freuen uns sehr, bedanken uns ganz...</a>
</div>
            <div class="sidebarComment">
<span class="commentName">Klaus</span> 29.01.2019:
<a class="commentTitle" href="article/article-2762.html" title="BE Food und StadtFarm wecken internationales Interesse">BE Food und StadtFarm wecken internationales Interesse</a>
<a href="article/article-2762.html#comment57773" title="Hallo und guten Tag,
offensichtlich bin ich der letzte Investor, der es...">Hallo und guten Tag,
offensichtlich bin ich der letzte Investor, der es...</a>
</div>
            <div class="sidebarComment">
<span class="commentName">Anne-Kathrin</span> 26.01.2019:
<a class="commentTitle" href="article/article-2762.html" title="BE Food und StadtFarm wecken internationales Interesse">BE Food und StadtFarm wecken internationales Interesse</a>
<a href="article/article-2762.html#comment57733" title="Hallo Robert,

vielen lieben Dank! Mich hat es sehr gefreut zu hören,...">Hallo Robert,

vielen lieben Dank! Mich hat es sehr gefreut zu hören,...</a>
</div>

</div>
</div> --}}
@endsection
