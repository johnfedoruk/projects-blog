@extends("main")

@section("title","View Post")

@section("stylesheets")
@endsection

@section("javascript")
@endsection

@section("content")
  <div class="row">
    <div class="col-md-8">
      <h1>
        {{$post->title}}
      </h1>
      <p class='lead'>
        {{$post->body}}
      </p>
    </div>
    <div class="col-md-4">
      <div class="well">
        <dl class="dl-horizontal">
          <dt>
            Created At:
          </dt>
          <dd>
            {{date("l, M j, Y \a\\t h:ia",strtotime($post->created_at))}}
          </dd>
          @if($post->created_at!=$post->updated_at)
            <dt>
              Last Update:
            </dt>
            <dd>
              {{date("l, M j, Y \a\\t h:ia",strtotime($post->updated_at))}}
            </dd>
          @endif
        </dl>
        <hr>
        <div class="row">
          <div class="col-sm-6">
            {!!
              Html::linkRoute(
                "posts.edit",
                "Edit",
                array($post->id),
                array("class"=>"btn btn-primary btn-block")
              )
            !!}
          </div>
          <div class="col-sm-6">
            {!!
              Form::open(
                [
                  "method"=>"DELETE",
                  "route"=>[
                    "posts.destroy",
                    $post->id
                  ]
                ]
              )
            !!}
              {{
                Form::submit(
                  "Delete",
                  [
                    "class"=>"btn btn-danger btn-block"
                  ]
                )
              }}
            {!!
              Form::close()
            !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
