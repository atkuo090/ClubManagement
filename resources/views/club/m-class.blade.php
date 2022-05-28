@extends('layouts.app')
<title>{{Session::get('club_name')}}</title>
@include('inc.m_navbar')
@include('inc.messages')
@section('content')


<!-- <div class="mr-5">
        <a href="/clubOfclassrecord/create"><img class="img-thumbnail bg-l"
                style="border-radius:10rem; border-width:0px;max-width: 60px;float: right;" src="../img/plus.png"></a>
    </div> -->
<div class="mx-5 mb-5 mt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 pt-4 text-right pr-0">
                <h4><strong>社課</strong></h4>
            </div>
            <div class="col-4 pt-4 text-right pl-0">
                <h4 class="text-left"><strong>紀錄</strong></h4>
            </div>
            <div class="col-2 pb-2 pl-0">
                <a href="/clubOfclassrecord/create"><img class="img-thumbnail" style="border-radius:10rem; border-width:0px;max-width: 60px;float: right;background-color:rgba(255, 255, 255, 0);" src="../img/plus.png"></a>
            </div>
        </div>
    </div>
    <div class="my-3 p-5 bg-t light border border-light border-radius" style="border-radius: 10px;">
        <div class="container-fluid border border-light rounded">
            <div class="row mt-3">
                <div class="col-5 text-center">
                    <strong>標題</strong>
                    <hr>
                </div>
                <div class="col-1 text-center">
                    <strong>狀態</strong>
                    <hr>
                </div>
                <div class="col-2 text-center">
                    <strong>社課日期</strong>
                    <hr>
                </div>
                <div class="col-4 text-center">
                    <strong>詳情</strong>
                    <hr>
                </div>
            </div>
            @if(count($classrecord)>0)
            @php
            $mnum = 1;
            @endphp
            @foreach($classrecord as $r)
            @php
            $modal = "exampleModal".(string)$mnum;
            $plc = $r->PLC;
            @endphp
            <div class="row">
                <div class="col-5 text-center">
                    <p>{{ $r -> class_name }}</p>
                    {!!Session::put('club_semester', $r->club_semester)!!}

                </div>
                <div class="col-1 text-center">
                    @if($plc == "1")
                    <span class="badge badge-secondary spanF bg-r">公開</span>
                    @else
                    <span class="badge badge-secondary spanF bg-r">不公開</span>
                    @endif
                    <!-- <span class="badge badge-secondary spanF bg-r">{{ $r -> PLC}}</span> -->
                </div>
                <div class="col-2 text-center">
                    <span>{{$r -> date}}</span>
                </div>
                <div class="col-4 text-center">
                    <button type="button" class="btn button-c" data-toggle="modal" data-target="<?php echo "#" . $modal ?>" style="border-radius: 25px;">
                        MORE
                    </button>
                    <a href="/clubOfclassrecord/{{ $r -> flow_of_classrecord }}/edit">
                        <button type="button" class="btn button-c mx-3" style="border-radius: 25px;">
                            編輯
                        </button>
                    </a>

                    <div class="modal fade c0" id="<?php echo $modal ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $modal . "Title" ?>" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content bg-t">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="<?php echo $modal . "Title" ?>">{{$r->class_name}}</h5>
                                    <button type="button" class="close c0" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid p-0">
                                        <div class="row d-flex text-left">
                                            <p>社課日期：{{ $r -> date }}</p>
                                            <p>社課地點：{{ $r -> class_place }}</p>
                                            <p>授課導師：{{ $r -> class_teacher }}</p>
                                            <p>社課內容：{!!$r -> class_contect!!}</p>
                                        </div>
                                        <hr>
                                        </hr>
                                        <div class="row d-flex">
                                            <div class="col-12 text-left">
                                                <p>社課圖片：</p>
                                            </div>
                                        </div>
                                        <div class="row d-flex">
                                            <div class="col-12">
                                                <div class="image-3x4" style="background-image: url(/storage/classrecord/{{$r->pic}});"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary button-c" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @php
            $mnum++
            @endphp
            @endforeach
            @endif
        </div>
    </div>
</div>
@endsection