@extends('layouts.app')
<title>{{Session::get('club_name')}}</title>
@include('inc.m_edit_navbar')
@include('inc.messages')
@section('content')


<div class="m-5">
    {!! Form::open(['method' => 'PUT','action' =>['ClubinfoController@update',Session::get('club_id')], 'enctype' => 'multipart/form-data']) !!}

    <h5><strong>社團簡介</strong></h5>
    <div class="my-3 p-5 bg-t light border border-light border-radius" style="border-radius: 10px;">
        {{Form::label('club_purpose', '宗旨')}}
        {{Form::textarea('club_purpose',$class->club_purpose, ['id' => 'summary-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
        {{Form::label('club_introduce', '簡介')}}
        {{Form::textarea('club_introduce',$class->club_introduce, ['id' => 'summary-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
    </div>

    <h5><strong>社團簡介</strong></h5>
    <div class="my-3 p-5 bg-t light border border-light border-radius" style="border-radius: 10px;">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-6">
                    {{Form::label('club_time', '社課時間')}}
                    {{Form::text('club_time',$class->club_time, ['class' => 'form-control', 'placeholder' => 'Title'])}}

                </div>
                <div class="col-6">
                    {{Form::label('club_place', '社課地點')}}
                    {{Form::text('club_place', $class->club_place, ['class' => 'form-control', 'placeholder' => 'Title'])}}
                </div>
                <div class="col-6">
                    {{Form::label('club_fee', '社課費用')}}
                    {{Form::text('club_fee', $class->club_fee, ['class' => 'form-control', 'placeholder' => 'Title'])}}
                </div>
                <div class="col-6">
                    {{Form::label('club_teacher', '指導老師')}}
                    {{Form::text('club_teacher', $class->club_teacher, ['class' => 'form-control', 'placeholder' => 'Title'])}}
                </div>
                <div class="col-6">
                    {{Form::label('club_website', '網站')}}
                    {{Form::text('club_website', $class->club_website, ['class' => 'form-control', 'placeholder' => 'Title'])}}
                </div>
                <div class="col-6">
                    {{Form::label('source_of_funding', '經費來源')}}
                    {{Form::text('source_of_funding', $class->source_of_funding, ['class' => 'form-control', 'placeholder' => 'Title'])}}
                </div>
            </div>
        </div>
    </div>
    <h5><strong>社團圖片</strong></h5>
    <div class="p-3 bg-t light border border-light border-radius" style="border-radius: 10px;">
        <div class="row">
            <div class="card-deck">
                <div class="card bg-t" style="border: 0px;" data-toggle="modal" data-target="#exampleModalCenter">
                    <div class="card-head">
                        <h5><strong>社團 icon</strong></h5>
                    </div>

                    {{Form::file('club_icon')}}
                </div>
                <div class="card bg-t" style="border: 0px;" data-toggle="modal" data-target="#exampleModalCenter">
                    <div class="card-head">
                        <h5><strong>社團簡介圖</strong></h5>
                    </div>
                    {{Form::file('club_show_pic')}}
                </div>
                <div class="card bg-t" style="border: 0px;" data-toggle="modal" data-target="#exampleModalCenter">
                    <div class="card-head">
                        <h5><strong>我的社團封面</strong></h5>
                    </div>

                    {{Form::file('club_cover')}}
                </div>
            </div>
        </div>
    </div>

    <div class="text-center">
        {{ Form::hidden('club_semester',Session::get('club_semester'))}}
        {{ Form::hidden('club_name',Session::get('club_name'))}}
        {{ Form::hidden('club_id',Session::get('club_id'))}}
        {{ Form::hidden('club_type',$class->club_type)}}
        {{ Form::hidden('status_of_club',$class->status_of_club)}}
        {{ Form::hidden('semester_id',Session::get('semester_id'))}}
        {{ Form::submit('更  新', ['class'=>'btn button-c1 mt-3 e-button'])}}
    </div>
</div>
@endsection