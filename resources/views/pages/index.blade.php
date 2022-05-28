@extends('layouts.app')
@include('inc.navbar')
@section('content')
  <div class="cover">
    <h1 class="word">
      <div style="border: 2px #F8F8F6 solid; padding: 1vw; background-color:rgba(255, 255, 255, 0.199); "> Live the life
        you have imagined</div>
    </h1>
  </div>
  </div>



  <section class="m-5">
    <div id="container" style="margin-top: 6vh; ">
      <div id="left-col">
        <div class="tab-content " id="nav-tabContent">
          @if(count($showPLC)>0)
            @php
              $lnum = 1;
            @endphp
            @foreach($showPLC as $n)
              @php
                $listid = "list-".(string)$lnum;
              @endphp
            <div class="tab-pane fade " id="<?php echo $listid ?>" role="tabpanel" aria-labelledby="list-<?php echo (string)$lnum ?>-list" >
              <img src="../storage/classrecord/{{$n->image}}" >
              <!-- <div class="c0">
                <span>{{$n->image}}</span>
              </div> -->
              <!-- <div class="image-3x4" style="background-image: url('/storage/newpic/{{$n->image}}');"></div> -->
            </div>
            @php
              $lnum ++;
            @endphp
            @endforeach
          @endif
        </div>
      </div>

      <div id="right-col" class="lign-self-center">
        <h3 class="c0" style="margin: 1vh;">🎇精彩活動與社課</h3>
        <div class="lign-self-center " style="margin: 5px; ">
          <div class="list-group " id="list-tab" role="tablist">
          @if(count($showPLC)>0)
            @php
              $lnum = 1;
            @endphp
            @foreach($showPLC as $n)
              @php
                $listid = "list-".(string)$lnum;
              @endphp
            <a class="list-group-item list-group-item-action bg-d c0" id="<?php echo $listid ?>" data-toggle="list"
              href="<?php echo '#'.$listid ?>" role="tab" aria-controls="<?php echo (string)$lnum ?>" aria-selected="false">{{ $n -> name}}</a>
              @php
              $lnum ++;
              @endphp
              @endforeach
          @endif
          </div>
        </div>
      </div>
    </div>
  </section>


  <div class="container-fluid" style="background-color: #DFCFB8;">
    <div class="row" style="padding:9vh 9vw 13vh">
      <div class="card-deck">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title dark py-3 text-center"><strong>最新消息</strong></h4>
            <div class="card-img image-1x1" style="background-image: url('/storage/newpic/{{$NORMALnews->news_pic}}');"></div>
            <p class="card-text py-4 m-0 text-center"><strong>{{$NORMALnews -> news_title}}</strong></p>
            <div style="text-align: center;">
              <a href="/clubOfnews" class="btn button-c1">&nbsp;&nbsp;VIEW&nbsp;MORE&nbsp;&nbsp;</a>
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <h4 class="card-title dark py-3 text-center"><strong>最新活動</strong></h4>
            <div class="card-img image-1x1" style="background-image: url('/storage/newpic/{{$ACTIVITYnews->news_pic}}');"></div>
            <p class="card-text py-4 m-0 text-center"><strong>{{$ACTIVITYnews -> news_title}}</strong></p>
            <div style="text-align: center;">
              <a href="/clubOfnews" class="btn button-c1">&nbsp;&nbsp;VIEW&nbsp;MORE&nbsp;&nbsp;</a>
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <h4 class="card-title py-3 text-center"><strong>最新成果展消息</strong></h4>
            <div class="card-img image-1x1" style="background-image: url('/storage/newpic/{{$ResultsNEWS->news_pic}}');"></div>
            <p class="card-text py-4 m-0 text-center"><strong>{{$ResultsNEWS -> news_title}}</strong></p>
            <div style="text-align: center;">
              <a href="/clubOfnews" class="btn button-c1">&nbsp;&nbsp;VIEW&nbsp;MORE&nbsp;&nbsp;</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @endsection