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

                                       
                                    @endforeach
                     @else
                    <p align="center"> NO Posts Available</p>
                    @endif
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
