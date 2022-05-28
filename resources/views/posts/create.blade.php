
@extends('layouts.app')


@section('content')
<div class="container m-2">
<h3>CreatePost</h3>
{!! Form::open(['method' => 'POST','action' => 'PostController@store', 'enctype' => 'multipart/form-data']) !!}
<div class="form-group">
    {{Form::label('title', 'Title')}}
    {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
</div>
<div class="form-group">
    {{Form::label('body', 'Body')}}
    {{Form::textarea('body', '', ['id' => 'summary-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
</div>
{{-- <div class="form-group">
    {{Form::file('cover_image')}}
</div> --}}

<div class="from-group">
    {{Form::file('cover_image')}}
     </div>
     <br>
{{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}


</div>
@endsection