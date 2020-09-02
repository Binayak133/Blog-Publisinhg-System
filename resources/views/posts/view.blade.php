@extends('layouts.app')
<style type="text/css">   

.image{
  border: 1px solid #ddd;
  border-radius: 20px;
  padding: 5px;
  width: 800px;
  height:300px;
  max-width:95%;
  object-fit:cover;
}
</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if (session('response'))
                    <div class="alert alert-success"> {{ session('response') }}</div>
            @endif
            <div class="card">
                <div class="card-header" align="center">Post View</div> <br> 
            <div class="card-body">
                <div class="col-md-4">
                <ul class="list-group">
               
                @if(count($categories) > 0)
                
                    @foreach($categories as $category)
                    <li class="list-group-item"> <a href='{{ url( "category/{$category->id}") }}'>{{ $category-> category }} </a></li>
                    @endforeach
                @else
                <p> NO Category Found </p>
                @endif
                
                </ul>
                   
                </div>
                <div class="col-md-8"> 
                   <br><br>
                   @if( count($posts) > 0)
                                     @foreach( $posts as $post )
                                       <h2>{{ $post->post_title }} </h2>
                                       <img src=" {{ $post-> post_image }}" alt="" class="image"><br><br>
                                       <p>{{ $post-> post_body }}</p>

                                       <ul class="nav nav-pills">
                                        <li role="presentation">
                                        <a href='{{ url("/like/{$post->id}") }}'>
                                            <span class="fa fa-thumbs-up"> Like({{ $likeCtr}})</span>
                                            </a>
                                        </li> &nbsp &nbsp &nbsp
                                            <li role="presentation">
                                            <a href='{{ url ( "/dislike/{$post->id}" )}}'>
                                            <span class="fa fa-thumbs-down">Dislike( {{$dislikeCtr}}) </span>
                                            </a>
                                        </li> &nbsp &nbsp &nbsp
                                        <li role="presentation">
                                        <a href='{{ url ( "/comment/{$post->id}" )}}'>
                                            <span class="fa fa-eye">Comment( ) </span>
                                            </a>
                                        </li>
                                       </ul>
                                    @endforeach
                     @else
                    <p align="center"> NO Posts Available</p>
                    @endif
                    <form method="POST" action='{{url("/comment/{$post->id}") }}'>
                    {{csrf_field()}}
                        <div class="form-group">
                            <textarea id="comment" rows="2" class="form-control" name="comment" required autofocus></textarea>
                        </div>
                        <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg btn-block">POST COMMENT</button>
                        </div>
                        </form> 
                        <h3> Comments </h3>
                        @if( count($comments) > 0)
                            @foreach( $comments as $comment )
                            <p><b>{{$comment->comment}}</b> &nbsp <i>Commented By: &nbsp({{$comment->name}})</i></p>
                            <hr/>
                            @endforeach
                        @else
                        <p align="center"> <b>NO Comments Available</b></p>
                        <hr/>
                        @endif
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
