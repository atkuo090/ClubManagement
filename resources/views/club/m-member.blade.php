@extends('layouts.app')
<title>{{Session::get('club_name')}}</title>
@include('inc.m_navbar')
@include('inc.messages')
@section('content')

<div class="mx-5 mb-5 mt-3">
    <div class="mx-5">
        <div class="container-fluid">
            <div class="row pb-3">
                <div class="col-6 pt-4 text-right px-0">
                    <h4><strong>社員</strong></h4>
                </div>
                <div class="col-6 pt-4 text-left px-0">
                    <h4><strong>名冊</strong></h4>
                </div>
            </div>
            <nav>
                <div class="nav nav-tabs bg-t text-center nav-fill" style="border-radius:5px 5px 0px 0px;" id="nav-tab" role="tablist">
                    <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><strong>社員</strong></a>
                    <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><strong>申請中</strong></a>
                </div>
            </nav>
            <div class="mb-3 p-5 bg-t light" style="border-radius: 0px 0px 5px 5px;">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="container-fluid ">
                            <div class="row mt-3">
                                <div class="col-1 text-center">
                                    <strong>#</strong>
                                    <hr>
                                </div>
                                <div class="col-3 text-center">
                                    <strong>姓名</strong>
                                    <hr>
                                </div>
                                <div class="col-3 text-center">
                                    <strong>學號</strong>
                                    <hr>
                                </div>
                                <div class="col-1 text-center">
                                    <strong>性別</strong>
                                    <hr>
                                </div>
                                <div class="col-2 text-center">
                                    <strong>擔任</strong>
                                    <hr>
                                </div>
                                <div class="col-2 text-center">
                                    <strong>詳情</strong>
                                    <hr>
                                </div>
                            </div>
                            @if(count($member)>0)
                            @php
                            $mnum = 1;
                            @endphp
                            @foreach($member as $f)
                            @php
                            $sex = $f->gender;
                            $modal = "exampleModal".(string)$mnum;
                            @endphp
                            <div class="row">
                                <div class="col-1 text-center">
                                    <?php echo $mnum ?>
                                </div>
                                <div class="col-3 text-center">
                                    {{$f->name}}
                                </div>
                                <div class="col-3 text-center">
                                    {{$f->user_id}}
                                </div>
                                <div class="col-1 text-center">
                                    @if($sex == "女")
                                    <span class="badge badge-secondary spanF bg-r"> {{$f->gender}}</span>
                                    @else
                                    <span class="badge badge-secondary spanF bg-b"> {{$f->gender}}</span>
                                    @endif
                                </div>
                                <div class="col-2 text-center">
                                    {{$f->role_name}}
                                </div>
                                <div class="col-2 text-center">
                                    <button type="button" class="btn button-c" data-toggle="modal" data-target="<?php echo "#" . $modal ?>" style="border-radius: 25px;">
                                        刪除</button>
                                    <div class="modal fade c0" id="<?php echo $modal ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $modal . "Title" ?>" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content bg-t">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="<?php echo $modal . "Title" ?>">刪除成員</h5>
                                                    <button type="button" class="close c0" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class='text-left'>
                                                        <p>確定要刪除該名成員嗎？</p>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn button-c my-0 mx-3" data-dismiss="modal">取消</button>
                                                    {!! Form::open(['method' => 'DELETE','action' => ['UserController@destroy',$f->member_id], 'class' => 'pull-right']) !!}
                                                    {{ Form::hidden('club_semester',Session::get('club_semester'))}}
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
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="container-fluid ">
                            <div class="row mt-3">
                                <div class="col-1 text-center">
                                    <strong>#</strong>
                                    <hr>
                                </div>
                                <div class="col-3 text-center">
                                    <strong>姓名</strong>
                                    <hr>
                                </div>
                                <div class="col-3 text-center">
                                    <strong>學號</strong>
                                    <hr>
                                </div>
                                <div class="col-2 text-center">
                                    <strong>性別</strong>
                                    <hr>
                                </div>
                                <div class="col-3 text-center">
                                    <strong>詳情</strong>
                                    <hr>
                                </div>
                            </div>
                            @if(count($apply)>0)
                            @php
                            $mnum = 1;
                            @endphp
                            @foreach($apply as $f)
                            @php
                            $sex = $f->gender;
                            @endphp
                            <div class="row">
                                <div class="col-1 text-center">
                                    <?php echo $mnum ?>
                                </div>
                                <div class="col-3 text-center">
                                    {{$f->name}}
                                </div>
                                <div class="col-3 text-center">
                                    {{$f->user_id}}
                                </div>
                                <div class="col-2 text-center">
                                    @if($sex == "女")
                                    <span class="badge badge-secondary spanF bg-r"> {{$f->gender}}</span>
                                    @else
                                    <span class="badge badge-secondary spanF bg-b"> {{$f->gender}}</span>
                                    @endif
                                </div>
                                <div class="col-3 text-center">
                                    <!-- php echo "#".$modal  -->
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-6">
                                                {!! Form::open(['method' => 'PUT','action' =>['UserController@update',$f->member_id], 'enctype' => 'multipart/form-data']) !!}
                                                {{ Form::hidden('status',1)}}
                                                {{-- {{dd($f->member_id)}} --}}
                                                {{ Form::hidden('club_semester',Session::get('club_semester'))}}
                                                {{Form::submit('同意', ['class'=>'btn btn-secondary button-c mx-3 float-end'])}}
                                                {!! Form::close() !!}
                                            </div>
                                            <div class="col-6">
                                                {!! Form::open(['method' => 'DELETE','action' => ['UserController@destroy',$f->member_id], 'class' => 'pull-right']) !!}
                                                {{-- @php dd($a->flow_of_plan); @endphp --}}
                                                {{ Form::hidden('club_semester',Session::get('club_semester'))}}
                                                {{Form ::submit('刪除',['class' => 'btn button-c float-start'])}}
                                                {!!Form::close() !!}
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
            </div>
        </div>
    </div>
    @endsection