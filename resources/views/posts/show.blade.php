@extends('layouts.app')


@section('content')

<div class="container m-2">
<h3>{{$post->title}}</h3>

<small>Written on {{$post->created_at}}by {{$post->user->name}}</small>
<img  style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
<div>
    
    <br>
    {!!$post->body!!}

   
</div>
<hr>
<div class="container">
    <div class="row">
    <div class="col-4"><a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a></div>
    <div class="col-4">{!! Form::open(['method' => 'DELETE','action' => ['PostController@destroy',$post->id], 'class' => 'pull-right']) !!}
        {{Form ::submit('Delete',['class' => 'btn btn-danger'])}}
        {!!Form::close() !!}</div>   
    <div class="col-4"><a href="/posts" class="btn btn-primary"> Go back </a></div> 
</div>
</div>




</div>
@endsection