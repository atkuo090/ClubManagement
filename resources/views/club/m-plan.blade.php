@extends('layouts.app')
<title>{{Session::get('club_name')}}</title>
@include('inc.m_navbar')
@include('inc.messages')
<!-- body -->
@section('content')
@foreach($club as $c)

@endforeach
<div class="mx-5 mb-5 mt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 pt-4 text-right pr-0">
                <h4><strong>學期</strong></h4>
            </div>
            <div class="col-4 pt-4 text-right pl-0">
                <h4 class="text-left"><strong>計畫</strong></h4>
            </div>
            <div class="col-2 pb-2 pl-0">
                <img class="img-thumbnail bg-t" data-toggle="modal" data-target="#exampleModalCenter" style="border-radius:10rem; border-width:0px;max-width: 60px;float: right;background-color:rgba(255, 255, 255, 0);" src="../img/plus.png">
                <div class="modal fade c0" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content bg-t">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">新增活動</h5>
                                <button type="button" class="close c0" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body px-3 pt-3 p-0">
                                {!! Form::open(['method' => 'POST','action' => 'ClubofplanController@store']) !!}
                                <div class="container-fluid">
                                    <div class="row mb-2">
                                        <div class="col-3">
                                            {{Form::label('activity_name', '活動名稱')}}
                                        </div>
                                        <div class="col-9">
                                            {{Form::text('activity_name', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            {{Form::label('title', '活動日期')}}
                                        </div>
                                        <div class="col-9">
                                            {{ Form::date('date', date('Y-m-d'))}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{ Form::hidden('club_semester',Session::get('club_semester'))}}
                            {{ Form::hidden('club_name',Session::get('club_name'))}}
                            <div class="modal-footer">
                                <div class="text-center">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-6 p-0">
                                                {{Form::submit('新增', ['class'=>'btn button-c m-0'])}}
                                            </div>
                                            <div class="col-6">
                                                <button type="button" class="btn btn-secondary button-c m-0" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{ Form::hidden('flow_of_plan',Str::uuid()) }}
                            {!! Form::close() !!}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="my-3 p-5 bg-t light border border-light border-radius" style="border-radius: 10px;">
        <div class="container-fluid border border-light rounded">
            <div class="row mt-3">
                <div class="col-4 text-center">
                    <strong>標題</strong>
                    <hr>
                </div>
                <div class="col-4 text-center">
                    <strong>活動日期</strong>
                    <hr>
                </div>
                <div class="col-4 text-center">
                    <strong>詳情</strong>
                    <hr>
                </div>
            </div>
            @if(count($club)>0)
            @php
            $mnum = 1;
            @endphp
            @foreach($club as $a)
            @php
            $modal = "exampleModal".(string)$mnum;
            @endphp
            <div class="row">
                <div class="col-4 text-center">
                    <p>{{ $a -> activity_name}}</p>
                    {!!Session::put('club_semester', $a->club_semester)!!}
                </div>
                <div class="col-4 text-center">
                    <span>{{ $a -> date}}</span>
                </div>
                <div class="col-4 text-center">
                    <button type="button" class="btn button-c" data-toggle="modal" data-target="<?php echo "#" . $modal ?>" style="border-radius: 25px;">
                        刪除</button>
                    <div class="modal fade c0" id="<?php echo $modal ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $modal . "Title" ?>" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content bg-t">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="<?php echo $modal . "Title" ?>">刪除活動</h5>
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
                                    {!! Form::open(['method' => 'DELETE','action' => ['ClubofplanController@destroy',$a->flow_of_plan], 'class' => 'pull-right']) !!}
                                    {{-- @php dd($a->flow_of_plan); @endphp --}}
                                    {{ Form::hidden('club_name',Session::get('club_name'))}}
                                    {{Form ::submit('刪除',['class' => 'btn button-c my-0'])}}
                                    {!!Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @php
            $mnum ++;
            @endphp
            @endforeach
            @endif
        </div>
    </div>
</div>
@endsection