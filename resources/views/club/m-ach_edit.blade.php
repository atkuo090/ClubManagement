@extends('layouts.app')
<title>{{Session::get('club_name')}}</title>
@include('inc.m_edit_navbar')
@include('inc.messages')
@section('content')


<div class="m-5">
    <h5><strong>活動成果</strong></h5>
    {!! Form::open(['method' => 'PUT','action' => ['ClubactivityController@update',$activity->flow_of_activity], 'enctype' => 'multipart/form-data']) !!}
    <div class="my-3 p-5 bg-t light border  border-radius" style="border-radius: 10px;">
        <div class=" mb-3">
            <strong>{{Form::label('name', '活動名稱')}}</strong>
            {{Form::text('name', $activity->name, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class=" mb-3">
            <strong>{{Form::label('content', '內容')}}</strong>
            {{Form::textarea('content', $activity->content, ['id' => 'summary-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-6">
                    <strong>{{Form::label('place', '地點')}}</strong>
                    {{Form::text('place', $activity->place, ['class' => 'form-control', 'placeholder' => 'Title'])}}
                </div>
                <div class="col-6">
                    <strong>{{Form::label('population', '人數')}}</strong>
                    {{Form::text('population', $activity->population, ['class' => 'form-control', 'placeholder' => 'Title'])}}
                </div>
            </div>
            <div class="row">
                <div class="my-4 col-6">
                    <strong>{{Form::label('title', '社課日期')}}</strong>
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
                                        <h5 class="modal-title" id="exampleModalTitle">刪除活動</h5>
                                        <button type="button" class="close c0" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class='text-left'>
                                            <p>確定要刪除該項活動嗎？</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn button-c my-0 mx-3" data-dismiss="modal">取消</button>
                                        {!! Form::open(['method' => 'DELETE','action' => ['ClubactivityController@destroy',$activity->flow_of_activity], 'class' => 'pull-right']) !!}
                                        {{ Form::hidden('club_name',Session::get('club_name'))}}
                                        {{Form ::submit('刪除',['class' => 'btn button-c my-0'])}}
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
</div>
</form>
</div>
@endsection