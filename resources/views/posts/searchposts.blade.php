@extends('layouts.app')
<style type="text/css">   

.image{
  border: 1px solid #ddd;
  border-radius: 20px;
  padding: 5px;
  width: 700px;
  height:200px;
  max-width:90%;
  object-fit:cover;
}
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(count($errors)>0)
                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
            @endif
            @if (session('response'))
                    <div class="alert alert-success"> {{ session('response') }}</div>
            @endif
            <div class="card">
                <div class="card-header" align="center">
                    <div class="row">
                    <div class="col-md-4">Dashboard</div>
                        <div class="col-md-8">
                            <form method="POST" action='{{ url("/search") }}'>
                                {{ @csrf_field() }}
                                <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search For...">
                                <span class="input-group-btn">
                                <button type="submit" class="btn btn-default"> GO </button>
                                </span>
                                </div>
                            </form>    
                        </div>
                    </div>
                </div> <br> 
            <div class="card-body">
                <div class="col-md-4">
                    @if(!empty($profile))
                        <img src="{{ $profile->profile_pic }}" alt="" class="rounded-circle" 
                        style="max-width:90%; width:200px; height:160px"/>
                       <br> <br>

                    @else
                    <img src="{{ url('images/avatar.png') }}" alt="" class="rounded-circle" 
                        style="max-width:90%; width:200px; height:160px"/> <br> <br>
                   <br> 
                    @endif

                    @if(!empty($profile))
                    <p class="lead">{{ $profile->name }}</p> <hr>
                    @else
                    <p></p>
                    @endif

                    @if(!empty($profile))
                    <p><b>{{ $profile->designation }}<b></p>
                    @else
                    <p></p>
                    @endif
                </div>
                   <div class="col-md-8">
                   <br><br>
                   @if( count($posts) > 0)
                                     @foreach( $posts as $post )
                                       <h2>{{ $post->post_title }} </h2>
                                       <img src=" {{ $post-> post_image }}" alt="" class="image"><br><br>
                                       <p>{{ substr($post-> post_body, 0, 150) }}</p>

                                       <ul class="nav nav-pills">
                                        <li role="presentation">
                                        <a href='{{ url ( "/view/{$post->id}" )}}'>
                                            <span class="fa fa-eye">View</span>
                                            </a>
                                        </li> &nbsp &nbsp &nbsp
                                            <li role="presentation">
                                            <a href='{{ url ( "/edit/{$post->id}" )}}'>
                                            <span class="fa fa-eye">Edit</span>
                                            </a>
                                        </li> &nbsp &nbsp &nbsp
                                        <li role="presentation">
                                        <a href='{{ url ( "/delete/{$post->id}" )}}'>
                                            <span class="fa fa-eye">Delete</span>
                                            </a>
                                        </li>
                                       </ul>
                                       <br>
                                       <cite style="float:left;">Posted on: {{ ($post->updated_at )}}</cite>

                                      <hr/> <br>
                                    @endforeach
                     @else
                    <p align="center"> NO Posts Available</p>
                    @endif
              
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
