@extends('layouts.app')
@include('inc.navbar')
@section('content')
@foreach($club as $c)
<title>{{$c->club_name}}</title>
@endforeach
<div class="container-fluid m-0 p-0">
    @foreach($club as $c)
    <div class="row m-0">
        <div class="col-4">
            <div class="" style="font-weight:bold;box-sizing: border-box;display: flex;padding: 2rem;flex-flow: column;height:fit-content;">
                <h5><strong>社團簡介</strong></h5>
                <div class="bg border border-radius" style="border-radius: 10px;width: 100%;padding: 2rem;box-sizing: border-box;display: flex;flex-flow: column;">
                    <p>宗旨：{!! $c->club_purpose !!}</p>
                    <p>社團介紹：{!! $c->club_introduce !!}</p>
                </div>
                <hr>
                </hr>
                <h5><strong>社團資訊</strong></h5>
                <div class="bg border border-radius" style="border-radius: 10px;width: 100%;padding: 2rem;box-sizing: border-box;display: flex;flex-flow: column;">
                    <p>社課時間：{{$c->club_time}}</p>
                    <p>社課地點：{{$c->club_place}}</p>
                    <p>社課費用：{{$c->club_fee}}</p>
                    <p>指導老師：{{$c->club_teacher}}</p>
                </div>
            </div>
        </div>
        <div class="col-8 p-0">
            <div class="image-3x4" style="background-image: url(/storage/club/{{$c->club_show_pic}});height:100%;width:auto;">
            </div>
        </div>
    </div>
@endforeach
</div>
<nav>
    <strong>
        <div class="nav nav-tabs bg-d " id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-news-tab" data-toggle="tab" href="#nav-news" role="tab" aria-controls="nav-news" aria-selected="true">最新消息</a>
            <a class="nav-item nav-link" id="nav-class-tab" data-toggle="tab" href="#nav-class" role="tab" aria-controls="nav-class" aria-selected="false">社課紀錄</a>
            <a class="nav-item nav-link" id="nav-feedback-tab" data-toggle="tab" href="#nav-feedback" role="tab" aria-controls="nav-feedback" aria-selected="true">即時反饋</a>
            <a class="nav-item nav-link" id="nav-result-tab" data-toggle="tab" href="#nav-result" role="tab" aria-controls="nav-result" aria-selected="false">活動成果</a>
            <a class="nav-item nav-link" id="nav-plan-tab" data-toggle="tab" href="#nav-plan" role="tab" aria-controls="nav-plan" aria-selected="false">學期計畫</a>
        </div>
    </strong>
</nav>
<div class="tab-content" id="nav-tabContent" style="margin: 3rem;">
    <!-- 最新消息 -->
    <div class="tab-pane fade show active" id="nav-news" role="tabpanel" aria-labelledby="nav-news-tab">
        <h5><strong>最新消息</strong></h5>
        <div class="my-3 p-5 bg-d light border border-light border-radius" style="border-radius: 10px;">
            <div class="container-fluid border border-light rounded">
                <div class="row mt-3">
                    <div class="col-5 text-center">
                        <strong>標題</strong>
                        <hr>
                    </div>
                    <div class="col-3 text-center">
                        <strong>發布日期</strong>
                        <hr>
                    </div>
                    <div class="col-4 text-center">
                        <strong>詳情</strong>
                        <hr>
                    </div>
                </div>
                @if(count($news)>0)
                @php
                $mnum = 1;
                @endphp
                @foreach($news as $n)
                @php
                $modal = "Modalnews".(string)$mnum;
                @endphp
                <div class="row">
                    <div class="col-5 text-center">
                        <p>{{$n->news_title}}</p>
                    </div>
                    <div class="col-3 text-center">
                        <span>{{$n->date}}</span>
                    </div>
                    <div class="col-4 text-center">
                        <button type="button" class="btn button-c" data-toggle="modal" data-target="<?php echo "#" . $modal ?>" style="border-radius: 25px;">MORE</button>
                        <div class="modal fade c0" id="<?php echo $modal ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $modal . "Title" ?>" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content bg-d">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="<?php echo $modal . "Title" ?>">{{$n->news_title}}</h5>
                                        <button type="button" class="close c0" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="text-start">
                                            <p>{!!$n->news_content!!}</p>
                                        </div>
                                        <div class="image-3x4" style="background-image: url(/storage/newpic/{{$n->news_pic}});"></div>
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
    <!-- 活動月曆 -->
    <!-- <div class="tab-pane fade" id="nav-calendar" role="tabpanel" aria-labelledby="nav-calendar-tab">
            <h5><strong>活動月曆</strong></h5>
            <div class="text-center">
                <iframe src="https://calendar.google.com/calendar/embed?src=2023youth%40gmail.com&ctz=Asia%2FTaipei"
                    style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
            </div>
        </div> -->
    <!-- 社課紀錄 -->
    <div class="tab-pane fade" id="nav-class" role="tabpanel" aria-labelledby="nav-class-tab">
        <h5><strong>社課紀錄</strong></h5>
        @if(count($classrecord)>0)
        @php
        $mnum = 1;
        @endphp
        @foreach($classrecord as $r)
        @php
        $modal = "Modalclassrecord".(string)$mnum;
        @endphp
        <div class="card mb-3 bg" data-toggle="modal" data-target="<?php echo "#" . $modal ?>">
            <div class="row">
                <div class="col-md-4">
                    <div class="image-3x4 rounded" style="background-image: url(/storage/classrecord/{{$r->pic}}">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title" style="color:#2f2c40;">{{ $r -> class_name }}</h5>
                        <p class="card-text">{{ $r -> date }}</p>
                        <p class="card-text">{!! $r -> class_contect !!}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade c0 " id="<?php echo $modal ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $modal . "Title" ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content bg-d">
                    <div class="modal-header">
                        <h5 class="modal-title" id="<?php echo $modal . "Title" ?>">{{ $r -> class_name }}</h5>
                        <button type="button" class="close bg-d c0" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row d-flex text-start">
                                <p>社課日期：{{ $r -> date }}</p>
                                <p>社課地點：{{ $r -> class_place }}</p>
                                <p>授課導師：{{ $r -> class_teacher }}</p>
                                <span style="padding-left: 12px;padding: right 12px;">
                                    <p>社課內容：</p>
                                    <div style="padding-left: 12px;padding: right 12px;">{!! $r -> class_contect !!}
                                    </div>
                                </span>
                            </div>
                            <hr>
                            </hr>

                            <div class="row d-flex">
                                <div class="col-12">
                                    <p>社課圖片：</p>
                                    <div class="image-3x4" style="background-image: url(/storage/classrecord/{{$r->pic}});"></div>
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
        @endforeach
        @endif
    </div>
    <!-- 即時反饋 -->
    <div class="tab-pane fade show" id="nav-feedback" role="tabpanel" aria-labelledby="nav-feedback-tab">
        <h5><strong>即時反饋</strong></h5>
        @include('inc.messages')
        {!! Form::open(['method' => 'POST','action' => 'CluboffeedbackController@store', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            @csrf
            {{Form::label('title', '反饋類型')}}
            {{Form::radio('feedback_id', '1', true) }}
            {{Form::label('feedback_id', '社課')}}
            {{Form::radio('feedback_id', '2',false) }}
            {{Form::label('feedback_id', '活動')}}
            {{Form::radio('feedback_id', '3',false) }}
            {{Form::label('feedback_id', '成果展')}}
            {{Form::radio('feedback_id', '4',false) }}
            {{Form::label('feedback_id', '其他')}}
        </div>
        <div class="form-group">
            {{Form::label('title', '標題')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}

            {{Form::label('body', '反饋內容')}}
            {{Form::textarea('content', '', ['id' => 'summary-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
            {{ Form::hidden('club_id', $c->club_id) }}
            {{ Form::hidden('club_name', $c->club_name) }}
            {{ Form::hidden('date',date('Y-m-d H:i:s'))}}
            {{ Form::hidden('flow_of_feedback',Str::uuid()) }}

        </div>
        <div class="text-center">
            {{Form::submit('提交', ['class'=>'btn button-c1 my-3'])}}
            {!! Form::close() !!}
        </div>


    </div>
    <!-- 活動成果 -->
    <div class="tab-pane fade" id="nav-result" role="tabpanel" aria-labelledby="nav-result-tab">
        <h5><strong>活動成果</strong></h5>
        @if(count($activity)>0)
        @php
        $mnum = 1;
        @endphp
        @foreach($activity as $a)
        @php
        $modal = "Modalactivity".(string)$mnum;
        @endphp
        <div class="card mb-3 bg m-3" data-toggle="modal" data-target="<?php echo "#" . $modal ?>">
            <div class="row">
                <div class="col-md-4">
                    <div class="image-3x4 rounded" style="background-image: url(/storage/activity/{{$a->pic}}"></div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title" style="color:#2f2c40;">{{ $a ->name }}</h5>
                        <p class="card-text">{!! $a -> date !!}</p>
                        <p class="card-text">{!! $a -> content !!}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade c0 " id="<?php echo $modal ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $modal . "Title" ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content bg-d">
                    <div class="modal-header">
                        <h5 class="modal-title" id="<?php echo $modal . "Title" ?>">{{ $a -> name }}</h5>
                        <button type="button" class="close bg-d c0" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row d-flex text-start">
                                <p>活動日期：{{ $a -> date }}</p>
                                <p>活動地點：{{ $a -> 	place }}</p>
                                <span style="padding-left: 12px;padding: right 12px;">
                                    <p>活動內容：</p>
                                    <div style="padding-left: 12px;padding: right 12px;">{!! $a -> content !!}
                                    </div>
                                </span>
                            </div>
                            <hr>
                            </hr>

                            <div class="row d-flex">
                                <div class="col-12">
                                    <p>社課圖片：</p>
                                </div>
                            </div>
                            <div class="row d-flex">
                                <div class="col-12">
                                    <div class="image-3x4" style="background-image: url(/storage/activity/{{$a->pic}}">
                                    </div>
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
        @endforeach
        @else
        <div class="container">
            <div class="row">
                <div class="col text-center m-3">
                    <strong>暫無活動成果</strong>
                </div>
            </div>
        </div>
        @endif
    </div>
    <!-- 年度計畫 -->
    <div class="tab-pane fade" id="nav-plan" role="tabpanel" aria-labelledby="nav-plan-tab">
        <h5><strong>年度計畫</strong></h5>
        <div class="container m-3">
            <div class="row text-center">
                @if(count($plan)>0)
                @foreach($plan as $p)
                <div class="col-6 col-lg-3">
                    <div class="card m-2 card-border">
                        <div class="card-body">
                            <h5 class="card-title">{{ $p -> activity_name }}</h5>
                            <p class="card-text">{{ $p -> date }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection