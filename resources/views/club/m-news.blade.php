@extends('layouts.app')
<title>{{Session::get('club_name')}}</title>
@include('inc.m_navbar')
@include('inc.messages')
@section('content')
@foreach($clubnews as $c)

@endforeach
<div class="mx-5 mb-5 mt-3">
  <div class="container-fluid">
    <div class="row pb-3">
      <div class="col-6 pt-4 text-right pr-0">
        <h4><strong>社團</strong></h4>
      </div><div class="col-4 pt-4 text-right pl-0">
        <h4 class="text-left"><strong>消息</strong></h4>
      </div>
      <div class="col-2 pb-2 pl-0">
        <a href="/clubOfnews/create"><img class="img-thumbnail" style="border-radius:10rem; border-width:0px;max-width: 60px;float: right;background-color:rgba(255, 255, 255, 0);" src="../img/plus.png"></a>
      </div>
    </div>
  </div>

  <div class="mb-3 p-5 bg-t light border border-light border-radius" style="border-radius: 10px;">
    <div class="container-fluid border border-light rounded">
    <div class="row mt-3">
    <div class="col-5 text-center">
          <strong>標題</strong>
          <hr>
        </div>
        <div class="col-1 text-center">
          <strong>分類</strong>
          <hr>
        </div>
        <div class="col-1 text-center">
          <strong>狀態</strong>
          <hr>
        </div>
        <div class="col-2 text-center">
          <strong>發布日期</strong>
          <hr>
        </div>
        <div class="col-3 text-center">
          <strong>詳情</strong>
          <hr>
        </div>
      </div>
      @if(count($clubnews)>0)
      @php
      $mnum = 1;
      @endphp
      @foreach($clubnews as $n)
      @php
      $plc = $n->PLC;
      $modal = "exampleModal".(string)$mnum;
      @endphp
      <div class="row">
        {!!Session::put('club_semester', $n->club_semester)!!}
        {!!Session::put('club_id', $n->club_id)!!}
        {!!Session::put('club_name', $n->club_name)!!}
        {{-- {{dd($n->flow_of_news)}} --}}
        <div class="col-5 text-center">
          <p>{{$n->news_title}}</p>
        </div>
        <div class="col-1 text-center">
          <span class="badge badge-secondary bg-type">{{ $n -> news_name}}</span>
        </div>
        <div class="col-1 text-center">
          @if($plc == "1")
          <span class="badge badge-secondary spanF bg-r">公開</span>
          @else
          <span class="badge badge-secondary spanF bg-r">不公開</span>
          @endif
        </div>
        <div class="col-2 text-center">
          <span>{{$n->date}}</span>
        </div>
        <div class="col-3 text-center">
          <button type="button" class="btn button-c" data-toggle="modal" data-target="<?php echo "#" . $modal ?>" style="border-radius: 25px;">
            MORE
          </button>
          <a href="/clubOfnews/{{$n->flow_of_news}}/edit">
            <button type="button" class="btn button-c mx-3" style="border-radius: 25px;">
              編輯
            </button>
          </a>
          {{-- <form action="clubOfnews/{{$n->flow_of_news}}" method="DELETE">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger">刪除</button>
          </form> --}}
          {{-- {{dd($n->flow_of_news)}} --}}

          <!-- DEL Button trigger modal -->


          {{-- {!! Form::open(['method' => 'delete','action' => ['ClubofnewsController@destroy',$n->flow_of_news], 'class' => 'pull-right']) !!} --}}
          <div class="modal fade c0" id="<?php echo $modal ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $modal . "Title" ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content bg-t">
                <div class="modal-header">
                  <h5 class="modal-title" id="<?php echo $modal . "Title" ?>">{{$n->news_title}}</h5>
                  <button type="button" class="close c0" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class='text-left'>
                    <p>{!!$n->news_content!!}</p>
                  </div>
                  <div class="image-3x4" style="background-image: url(/storage/newpic/{{$n->news_pic}});"></div>
                  <!-- <img  style="width:100%" src="/storage/newpic/{{$n->news_pic}}"> -->
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