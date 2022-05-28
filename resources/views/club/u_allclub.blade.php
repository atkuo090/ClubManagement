@extends('layouts.app')
@include('inc.navbar')
<!-- body -->
@section('content')
<title>社團總覽</title>

<div class="container" style="margin-bottom: 10vh;">
    <h5 class="my-4"><strong>社團總覽</strong></h5>
    @if(count($clubInfo)>0)
    @php
    $mnum = 1;
    @endphp
    <div class="row m-3">
        @foreach($clubInfo as $n)
        <div class="col-lg-3 col-sm-6 pb-3">
            @php
            $modal = "exampleModal".(string)$mnum;
            $join = "joinModal".(string)$mnum;
            @endphp
            <!-- 每一個要顯示的 -->
            <div class="card" style="border: 0px;" data-toggle="modal" data-target="<?php echo "#" . $modal ?>">
                <!-- <div class="card-img-top image-1x1" style="background-image: url('../img/club-3.jpg');"></div> -->
                <div class="card-img-top image-1x1" style="background-image: url(/storage/club/{{$n->club_icon}});"></div>
                <div class="card-body text-center" style="background-color:rgba(255, 255, 255, 0);">
                    <h6 class="card-title">
                        <strong>
                            <p class="a-col-d">{{ $n -> club_name}}</p>
                        </strong>
                    </h6>
                </div>
                <div class="modal fade c0 " id="<?php echo $modal ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $modal . "Title" ?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content bg-d">
                            <div class="modal-header">
                                <h5 class="modal-title" id="<?php echo $modal . "Title" ?>">{{ $n -> club_name}}</h5>
                                <button type="button" class="close bg-d c0" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row d-flex">
                                        <div class="col-4 ">
                                            <div class="card-img-top image-1x1" style="background-image: url(/storage/club/{{$n->club_icon}});"></div>
                                            <!-- <div class="image-1x1" style="background-image: url('../img/club-3.jpg');"></div> -->
                                        </div>
                                        <div class="col-8">
                                            宗旨：<p>{{ $n -> club_purpose}}</p>
                                            社團介紹：<p>{{ $n -> club_introduce}}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    </hr>
                                    <div class="row d-flex">
                                        <div class="col-12">
                                            <p>社課時間：{{ $n -> club_time}}</p>
                                            <p>社團費用：{{ $n -> club_fee}}</p>
                                        </div>
                                        <div class="col-12">
                                            <p>社課地點：{{ $n -> club_place}}</p>
                                            <p>指導老師：{{ $n -> club_teacher}}</p>
                                        </div>
                                    </div>
                                    <div class="row d-flex">
                                        <div class="col-12">
                                            <p>社課圖片：</p>
                                            <div class="image-3x4" style="background-image: url(/storage/club/{{$n->club_cover}});"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="container">
                                    <div class="row">
                                        <div class="col text-center">
                                            @if(!Session::has( $n -> club_name))
                                            <button type="button" class="btn btn-secondary button-c mx-3 mb-0" data-toggle="modal" data-target="<?php echo "#" . $join ?>">申請加入</button>
                                            @endif
                                            <button type="button" class="btn btn-secondary button-c mx-3 mb-0" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade c0 " id="<?php echo $join ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $join . "Title" ?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content bg-d">
                            <div class="modal-header">
                                <h5 class="modal-title" id="<?php echo $join . "Title" ?>"><strong>申請入社</strong></h5>
                                <button type="button" class="close bg-d c0" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row d-flex">
                                        <div class="col-12">

                                            <p>姓名：{{ Auth::user()->name}}</p>
                                            <p>學號：{{ Auth::user()->user_id}}</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-6 text-center">
                                            {!! Form::open(['method' => 'POST','action' => 'UserController@store', 'enctype' => 'multipart/form-data']) !!}
                                            {{ Form::hidden('member_id',Str::uuid()) }}
                                            {{ Form::hidden('user_id',Auth::user()->user_id) }}
                                            {{ Form::hidden('club_semester',$n ->club_semester)}}
                                            {{ Form::hidden('role_id','8')}}
                                            {{ Form::hidden('status',0)}}
                                            {{Form::submit('我要入社', ['class'=>'btn btn-secondary button-c mx-3 mb-0 float-end'])}}
                                            {!! Form::close() !!}
                                        </div>
                                        <div class="col-6 text-center">
                                            <button type="button" class="btn btn-secondary button-c mx-3 mb-0 float-start" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @php
                $mnum++
                @endphp
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection