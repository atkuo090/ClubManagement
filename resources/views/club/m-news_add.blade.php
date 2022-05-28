@extends('layouts.app')
<title>{{Session::get('club_name')}}</title>
@include('inc.m_navbar')
@include('inc.messages')
@section('content')


<div class="m-5">
    <h5><strong>社團消息</strong></h5>
    {!! Form::open(['method' => 'POST','action' => 'ClubofnewsController@store', 'enctype' => 'multipart/form-data']) !!}
    <div class="my-3 p-5 bg-t light border border-light border-radius" style="border-radius: 10px;">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-6">
                    <strong>{{Form::label('title', '日期')}}</strong>
                    {{ Form::date('date', date('Y-m-d'))}}
                </div>
                <div class="col-6">
                    <strong>{{Form::label('title', '消息類型')}}</strong>
                    {{Form::select('news_id', array('1' => '消息','2' => '活動','3' => '成果展'), '1')}}
                </div>
                <div class="col-12">
                    <strong>{{Form::label('news_title', '標題')}}</strong>
                    {{Form::text('news_title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}

                </div>
                <div class="col-12">
                    <strong>{{Form::label('news_content', '內容')}}</strong>
                    {{Form::textarea('news_content', '', ['id' => 'summary-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
                </div>

                <div class="col-12 ">
                    <strong>{{Form::label('PLC', '公開與否')}}</strong>
                    {{Form::radio('PLC', '1', true,['class'=>'mx-2 mt-1']) }}
                    {{Form::label('PLC', '公開')}}
                    {{Form::radio('PLC', '0',false,['class'=>'mx-2 mt-1']) }}
                    {{Form::label('PLC', '不公開')}}
                </div>
                <div class="col-6">
                    <label><strong class="light">圖 片</strong></label>
                    {{Form::file('news_pic')}}
                </div>
            </div>
        </div>
        <div class="text-center">
            {{ Form::hidden('club_id',Session::get('club_id'))}}
            {{ Form::hidden('club_name',Session::get('club_name'))}}
            {{Form::submit('新 增', ['class'=>'btn button-c e-button m-0'])}}
            {{ Form::hidden('flow_of_news',Str::uuid()) }}
            {{ Form::hidden('flow_of_file',Str::uuid()) }}
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection