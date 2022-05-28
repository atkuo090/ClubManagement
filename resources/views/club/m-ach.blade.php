@extends('layouts.app')
<title>{{Session::get('club_name')}}</title>
@include('inc.m_navbar')
@include('inc.messages')
@section('content')
@foreach($club as $c)

@endforeach
<div class="mx-5 mb-5 mt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 pt-4 text-right pr-0">
                <h4><strong>活動</strong></h4>
            </div>
            <div class="col-4 pt-4 text-right pl-0">
                <h4 class="text-left"><strong>成果</strong></h4>
            </div>
            <div class="col-2 pb-2 pl-0">
                <a href="/Clubactivity/create"><img class="img-thumbnail" style="border-radius:10rem; border-width:0px;max-width: 60px;float: right;background-color:rgba(255, 255, 255, 0);" src="../img/plus.png"></a>
            </div>
        </div>
    </div>
    <form class="row g-3 needs-validation m-0" novalidate>
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
                @foreach($club as $c)
                @php
                $modal = "exampleModal".(string)$mnum;
                $plc = $c->PLC;
                @endphp
                <div class="row">
                    <div class="col-5 text-center">
                        {!!Session::put('club_semester', $c->club_semester)!!}
                        <p>{{$c->name}}</p>
                    </div>
                    <div class="col-1 text-center">
                        @if($plc == "1")
                        <span class="badge badge-secondary spanF bg-r">公開</span>
                        @else
                        <span class="badge badge-secondary spanF bg-r">不公開</span>
                        @endif

                    </div>
                    <div class="col-2 text-center">
                        <span>{{$c->date}}</span>
                    </div>
                    <div class="col-4 text-center">
                        <button type="button" class="btn button-c" data-toggle="modal" data-target="<?php echo "#" . $modal ?>" style="border-radius: 25px;">
                            MORE
                        </button>
                        <!-- EDIT Button trigger modal -->
                        <a href="/Clubactivity/{{$c->flow_of_activity}}/edit">
                            <button type="button" class="btn button-c mx-3" style="border-radius: 25px;">編輯</button>
                        </a>


                        <div class="modal fade c0" id="<?php echo $modal ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $modal . "Title" ?>" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content bg-t">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="<?php echo $modal . "Title" ?>"><strong>{{$c->name}}</strong></h5>
                                        <button type="button" class="close c0" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-start">
                                        <div>
                                            <label><strong class="light">人數：</strong>{{$c->population}}</label><br>
                                            <label><strong class="light">地點：</strong>{{ $c ->place}}</label><br>
                                            <label><strong class="light">時間：</strong>{{ $c ->date}}</label><br>
                                            <label><strong class="light">活動內容：</strong>{!! $c ->content !!}</label><br>
                                            <label><strong class="light">活動照片：</strong></label><br>
                                        </div>
                                        <div class="card-img-top image-3x4" style="background-image: url(/storage/activity/{{$c->pic}});"></div>

                                        <!-- <div class="image-3x4" style="background-image: url(img/class1.jpg);"></div> -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn button-c" data-dismiss="modal">Close</button>
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
</form>
</div>
@endsection