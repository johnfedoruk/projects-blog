@extends("main")

@section("title","Post List")

@section("stylesheets")
  <link rel="stylesheet" href="/css/parsley.css">
@endsection

@section("javascript")
  <script src="/js/parsley.min.js"></script>
@endsection

@section("content")
  <div class="row">
    <div class="col-md-10">
      <h1>All Posts</h1>
    </div>

    <div class="col-md-2">
      <a href="{{route('posts.create')}}"
      class="btn btn-lg btn-block btn-primary btn-h1-spacing">
        Create
      </a>
    </div>
    <div class="col-md-12">
      <hr>
    </div>

    <div class="row">
      <div class="col-md-12">
        <table class="table">
          <thead>
            <th>#</th>
            <th>Title</th>
            <th>Body</th>
            <th>Created At</th>
            <th>Edited At</th>
            <th></th>
          </thead>
          <tbody>
            @foreach($posts as $post)
              <tr>
                <th>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{substr($post->body,0,50)}}{{(strlen($post->body)>50)?("..."):("")}}</td>
                <td>{{date("M j, Y",strtotime($post->created_at))}}</td>
                <td>{{date("M j, Y",strtotime($post->updated_at))}}</td>
                <td>
                  <a href="{{route('posts.show',['id'=>$post->id])}}" class="btn btn-default">View</a>
                  <a href="{{route('posts.edit',['id'=>$post->id])}}" class="btn btn-default">Edit</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
