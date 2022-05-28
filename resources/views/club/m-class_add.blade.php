@extends('layouts.app')
<title>{{Session::get('club_name')}}</title>
@include('inc.m_navbar')
@include('inc.messages')
@section('content')


<div class="m-5">
    <h5><strong>社課紀錄</strong></h5>
    {!! Form::open(['method' => 'POST','action' => 'ClubofclassrecordController@store', 'enctype' => 'multipart/form-data']) !!}
    <div class="my-3 p-5 bg-t light border border-light border-radius" style="border-radius: 10px;">

        <strong>{{Form::label('class_name', '社課名稱')}}</strong>
        {{Form::text('class_name', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}

        <strong>{{Form::label('class_teacher', '授課老師')}}</strong>
        {{Form::text('class_teacher', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}

        <strong>{{Form::label('class_place', '上課地點')}}</strong>
        {{Form::text('class_place', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        <strong>{{Form::label('class_contect', '內容')}}</strong>
        {{Form::textarea('class_contect', '', ['id' => 'summary-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}

        <div class="container-fluid">
            <div class="row">
                <div class="my-4 col-6 p-0">
                    <strong>{{Form::label('title', '社課日期')}}</strong>
                    {{ Form::date('date', date('Y-m-d'))}}
                </div>
                <div class="my-4 col-6 p-0 d-flex">
                    <strong>{{Form::label('PLC', '公開與否')}}</strong>
                    {{Form::radio('PLC', '1', true,['class'=>'mx-2 mt-1']) }}
                    {{Form::label('PLC', '公開')}}
                    {{Form::radio('PLC', '0',false,['class'=>'mx-2 mt-1']) }}
                    {{Form::label('PLC', '不公開')}}
                </div>
                <div class="row">
                    <div class="col-4 p-0">
                        <label><strong class="light">圖 片</strong></label>
                        {{Form::file('pic')}}
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            {{ Form::hidden('club_semester',Session::get('club_semester'))}}
            {{ Form::hidden('club_name',Session::get('club_name'))}}
            {{Form::submit('新 增', ['class'=>'btn button-c e-button m-0'])}}
            {{ Form::hidden('flow_of_pic',Str::uuid()) }}
            {{ Form::hidden('flow_of_classrecord',Str::uuid()) }}

        </div>
        {!! Form::close() !!}
    </div>

</div>
</form>
</div>
@endsection