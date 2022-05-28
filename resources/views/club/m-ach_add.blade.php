@extends('layouts.app')
<title>{{Session::get('club_name')}}</title>
@include('inc.m_navbar')
@include('inc.messages')
@section('content')

<div class="m-5">
    <h5><strong>活動成果</strong></h5>
    {!! Form::open(['method' => 'POST','action' => 'ClubactivityController@store', 'enctype' => 'multipart/form-data']) !!}
    <div class="my-3 p-5 bg-t light border  border-radius" style="border-radius: 10px;">
        <div class=" mb-3">
            <strong>{{Form::label('name', '活動名稱')}}</strong>
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class=" mb-3">
            <strong>{{Form::label('content', '內容')}}</strong>
            {{Form::textarea('content', '', ['id' => 'summary-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-6">
                    <strong>{{Form::label('place', '地點')}}</strong>
                    {{Form::text('place', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
                </div>
                <div class="col-6">
                    <strong>{{Form::label('population', '人數')}}</strong>
                    {{Form::text('population', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
                </div>
            </div>
            <div class="row">
                <div class="my-4 col-6">
                    <strong>{{Form::label('title', '活動日期')}}</strong>
                    {{ Form::date('date', date('Y-m-d'))}}
                </div>
                <div class="my-4 col-6 d-flex">
                    <strong>{{Form::label('PLC', '公開與否')}}</strong>
                    {{Form::radio('PLC', '1', true,['class'=>'mx-2 mt-1']) }}
                    {{Form::label('PLC', '公開')}}
                    {{Form::radio('PLC', '0',false,['class'=>'mx-2 mt-1']) }}
                    {{Form::label('PLC', '不公開')}}
                </div>
            </div>
            <div class="row">
                <div class="col-4 mb-3">
                    <label><strong class="light">圖 片</strong></label>
                    {{Form::file('pic')}}
                </div>
            </div>
            <div class="text-center">
                {{ Form::hidden('club_semester',Session::get('club_semester'))}}
                {{ Form::hidden('club_name',Session::get('club_name'))}}
                {{Form::submit('新 增', ['class'=>'btn button-c e-button m-0'])}}

                {{ Form::hidden('flow_of_activity',Str::uuid()) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
</form>
</div>
@endsection