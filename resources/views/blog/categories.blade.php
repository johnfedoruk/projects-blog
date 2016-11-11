@extends("main")

@section("title","Welcome")

@section("stylesheets")
@endsection

@section("javascript")
@endsection

@section("content")
  <div class="row">
    <div class="col-md-12">
      <div class="jumbotron">
        <h1>{{$category->name}} <small>category</small></h1>
      </div>
    </div>
  </div>
  <style>
  .center-cropped {
    object-fit: none; /* Do not scale the image */
    object-position: center; /* Center the image within the element */
    max-height: 400px;
    width: 100%;
  }
  </style>
  <div class="row">
    <div class="col-md-8">
      @if($posts->count() == 0)
        <h3>No posts to show...</h3>
      @endif
      @foreach($posts as $post)
        <h2>
          {{$post->title}}
          <small>
            <a href="{{url('category/'.$post->category->slug.'/blogs')}}" style="text-decoration:none;">
              {{$post->category->name}}
            </a>
          </small>
        </h2>
        <h5>
          Published: {{date("M j, Y",strtotime($post->created_at))}}
          @if($post->created_at!=$post->updated_at)
            <br>Edited: {{date("M j, Y",strtotime($post->updated_at))}}
          @endif
        </h5>
        @if($post->featuredImageExists())
          <div class="thumbnail">
            <a href="{{url('blog/'.$post->slug)}}">
              <img class="img-responsive center-block center-cropped" src="{{$post->getFeaturedImagePath()}}" alt="{{$post->title}}"/>
            </a>
          </div>
        @endif
        <div>
          {{substr($post->body,0,$len)}}{{(strlen($post->body)>$len)?("..."):("")}}
        </div>
        <br>
        <a href="{{url('blog/'.$post->slug)}}" class="btn btn-primary">Read More &rarr;</a>
        <br>
        <hr>
      @endforeach
    </div>
    <br>
    <div class="col-md-3 col-md-offset-1">
      <h3>Categories</h3>
      <div class="list-group">
        @foreach($categories as $category)
        <a class="list-group-item" href="{{url("category/".$category->slug."/blogs")}}">
          {{$category->name}}
          <span class="badge float-xs-right">{{$category->posts->count()}}</span>
        </a>
        @endforeach
      </div>
      <br>
      <h3>Tags</h3>
      <div class="panel panel-default" style="padding:15px;">
        <div class="tags text-center">
          @foreach($tags as $tag)
          <a class="label label-default" style="margin:5px;" href="{{url("tag/".$tag->slug."/blogs")}}">
            {{$tag->name}}
          </a>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-8 text-center">
      {!!
        $posts->links()
      !!}
    </div>
  </div>
@endsection
