@extends('layouts.app')
<title>{{Session::get('club_name')}}</title>
@include('inc.m_edit_navbar')
@include('inc.messages')
@section('content')


<div class="m-5">
    <h5><strong>社課紀錄</strong></h5>
    {!! Form::open(['method' => 'PUT','action' =>['ClubofclassrecordController@update',$class->flow_of_classrecord], 'enctype' => 'multipart/form-data']) !!}
    <div class="my-3 p-5 bg-t light border border-light border-radius" style="border-radius: 10px;">

        <strong>{{Form::label('class_name', '社課名稱')}}</strong>
        {{Form::text('class_name', $class->class_name, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        <strong>{{Form::label('class_teacher', '授課老師')}}</strong>
        {{Form::text('class_teacher', $class->class_teacher, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        <strong>{{Form::label('class_place', '上課地點')}}</strong>
        {{Form::text('class_place', $class->class_place, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        <strong>{{Form::label('class_contect', '內容')}}</strong>
        {{Form::textarea('class_contect',$class->class_contect, ['id' => 'summary-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
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
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        {{Form::submit('更 新', ['class'=>'btn button-c e-button m-0 float-end'])}}
                    </div>
                    <div class="col-6">
                        <button type="button" class="btn button-c m-0 e-button float-start" data-toggle="modal" data-target="#exampleModal" style="border-radius: 25px;">
                            刪除</button>
                        <div class="modal fade c0" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content bg-t">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalTitle">刪除社課紀錄</h5>
                                        <button type="button" class="close c0" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class='text-left'>
                                            <p>確定要刪除該堂社課紀錄嗎？</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn button-c my-0 mx-3" data-dismiss="modal">取消</button>
                                        {!! Form::close() !!}
                                        {!! Form::open(['method' => 'DELETE','action' => ['ClubofclassrecordController@destroy',$class->flow_of_classrecord], 'class' => 'pull-right']) !!}
                                        {{ Form::hidden('club_name',Session::get('club_name'))}}
                                        {{Form ::submit('刪 除',['class' => 'btn button-c my-0'])}}
                                        {!!Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}

    </div>

</div>
</form>
</div>
@endsection