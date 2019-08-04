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
<br />
<div class="container pageContent">
    <div class="row">
        <div class="col-xs-12 col-lg-3 pull-right">
            <select name="category" id="category" class="form-control" style="width:100%">
                <option value="">----{{ __('lables.category')}}--</option>
                @foreach($categories as $categoryBlog)
                    <option @if($categoryBlog->id==@$cat_id) selected="selected"@endif value="{{$categoryBlog->id}}">{{$categoryBlog->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-xs-12 col-lg-3 pull-right text-right">  
            Filter
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                @if(count($blogData) >0)
                    @foreach($blogData as $blog)
                    <div class="col-sm-4">
                        <div class="homeNewsItem imgItem">
                            <a class="articleImgLink responsive-image-container-4by3" href="/article/{{$blog->post_name}}-{{$blog->id}}" title="{{$blog->title}}">
                                <img class="responsive-image-fit" lat="{{$blog->title}}" src="{{ URL::to('/') }}/uploads/blog/{{$blog->post_img}}" />
                                <span class="">Update #1</span>
                            </a>
                            <div class="articleDate">{{\Carbon\Carbon::parse($blog->created_at)->toFormattedDateString()}}</div>
                            <a class="articleTitle smallerTitle" href="/article/{{$blog->post_name}}-{{$blog->id}}" title=" {{$blog->title}}">
                                {{$blog->title}}
                            </a>
                        </div>
                    </div>
                    @endforeach
                @else
                <span style="color:red; text-align:center">{{__('messages.no_data')}}</span>
                @endif
               </div>
            <nav class="text-center">
                <ul class="pagination">
                    {{ $blogData->links() }}
                </ul>
            </nav>
        </div>

@endsection
@section('script')
    <script>
        $("#category").on('change',function(){
            var categoryID = $(this).val();
            if(categoryID!="")
                window.location="/cat-news/"+categoryID;
        });
    </script>
@endsection