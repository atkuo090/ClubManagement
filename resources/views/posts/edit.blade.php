
@extends('layouts.app')


@section('content')
<div class="container m-2">
<h3>EditPost</h3>
{!! Form::open(['method' => 'PUT','action' => ['PostController@update',$post->id], 'enctype' => 'multipart/form-data']) !!}
<div class="form-group">
    {{Form::label('title', 'Title')}}
    {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
</div>
<div class="form-group">
    {{Form::label('body', 'Body')}}
    {{Form::textarea('body', $post->body, ['id' => 'summary-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
</div>
<div class="form-group">
    {{Form::file('cover_image')}}
</div>
{{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}


</div>
@endsection