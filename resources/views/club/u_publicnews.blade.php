@extends('layouts.app')
@include('inc.navbar')
@section('content')
<title>最新消息</title>

  <div class="m-5" id="club">
    <div class="container-fluid">
      <div class="row">
        <div class="col-7">
          <h5><strong>最新消息</strong></h5>
        </div>

        <div class="col-5">
        <div class="dropdown float-right">
          <button class="btn btn-secondary button-c1 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          消息類型
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="dropdown-item nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">---</a>
              </li>
            @foreach($types as $type)
              <li class="nav-item" role="presentation">
              <a class="dropdown-item nav-link" id="{{$type->news_name}}-tab" data-toggle="tab" href="#{{$type->news_name}}" role="tab" aria-controls="{{$type->news_name}}" aria-selected="false">{{$type->news_name}}</a>
              </li>
            @endforeach
            </ul>
          </div>
        </div>
        </div>
      </div>
    </div>

    <div class="tab-content">
      <!-- 所有消息 -->
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
      <div class="my-3 p-5 bg-d light border border-light border-radius" style="border-radius: 10px;">
      <div class="container-fluid border border-light rounded">
        <div class="row mt-3">
          <div class="col-4 text-center">
            <strong>標題</strong>
            <hr>
          </div>
          <div class="col-2 text-center">
            <strong>社團</strong>
            <hr>
          </div>
          <div class="col-1 text-center">
            <strong>分類</strong>
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
              $modal = "exampleModal".(string)$mnum;
            @endphp
            <div class="row">
              <div class="col-4 text-center">
              <p>{{$n->news_title}}</p>
              </div>
              <div class="col-2 text-center">
                <span >{{ $n -> club_name}}</span>
              </div>
              <div class="col-1 text-center">
                <span class="badge badge-secondary spanF bg-r">{{ $n -> news_name}}</span>
              </div>
              <div class="col-2 text-center">
                <span>{{$n->date}}</span>
              </div>
              <div class="col-3 text-center">
                <button type="button" class="btn button-c" data-toggle="modal" data-target="<?php echo "#".$modal ?>" style="border-radius: 25px;">
                MORE
                </button>
                <div class="modal fade c0" id="<?php echo $modal ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $modal."Title" ?>" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content bg-d">
                      <div class="modal-header">
                        <h5 class="modal-title" id="<?php echo $modal."Title" ?>">{{$n->news_title}}</h5>
                        <button type="button" class="close c0" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body text-left">
                        <div>
                          <p>{!!$n->news_content!!}<p>
                        </div>
                        <div class="image-3x4" style="background-image: url(/storage/newpic/{{$n->news_pic}}"></div>
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
      <!-- 一般消息 -->
    <div class="tab-pane fade" id="消息" role="tabpanel" aria-labelledby="消息-tab">
      <div class="my-3 p-5 bg-d light border border-light border-radius" style="border-radius: 10px;">
      <div class="container-fluid border border-light rounded">
        <div class="row mt-3">
          <div class="col-4 text-center">
            <strong>標題</strong>
            <hr>
          </div>
          <div class="col-2 text-center">
            <strong>社團</strong>
            <hr>
          </div>
          <div class="col-1 text-center">
            <strong>分類</strong>
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
              $modal = "exampleModal".(string)$mnum;
            @endphp
            @if($n->news_name =='消息')
            <div class="row">
              <div class="col-4 text-center">
                <p>{{$n->news_title}}</p>
                </div>
                <div class="col-2 text-center">
                  <span >{{ $n -> club_name}}</span>
                </div>
                <div class="col-1 text-center">
                  <span class="badge badge-secondary spanF bg-r">{{ $n -> news_name}}</span>
                </div>
              <div class="col-2 text-center">
                <span>{{$n->date}}</span>
              </div>
              <div class="col-3 text-center">
                <button type="button" class="btn button-c" data-toggle="modal" data-target="<?php echo "#".$modal ?>" style="border-radius: 25px;">
                MORE
                </button>
                <div class="modal fade c0" id="<?php echo $modal ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $modal."Title" ?>" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content bg-d">
                      <div class="modal-header">
                        <h5 class="modal-title" id="<?php echo $modal."Title" ?>">{{$n->news_title}}</h5>
                        <button type="button" class="close c0" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body text-left">
                        <div>
                          <p>{!!$n->news_content!!}<p>
                        </div>
                        <div class="image-3x4" style="background-image: url(/storage/newpic/{{$n->news_pic}}"></div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary button-c" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @else
            @endif
            @php
              $mnum++
            @endphp
          @endforeach
        @endif
      </div>
      </div>
    </div>
    <!-- 活動消息 -->
    <div class="tab-pane fade" id="活動" role="tabpanel" aria-labelledby="活動-tab">
      <div class="my-3 p-5 bg-d light border border-light border-radius" style="border-radius: 10px;">
      <div class="container-fluid border border-light rounded">
        <div class="row mt-3">
          <div class="col-4 text-center">
            <strong>標題</strong>
            <hr>
          </div>
          <div class="col-2 text-center">
            <strong>社團</strong>
            <hr>
          </div>
          <div class="col-1 text-center">
            <strong>分類</strong>
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
              $modal = "exampleModal".(string)$mnum;
            @endphp
            @if($n->news_name =='活動')
            <div class="row">
              <div class="col-4 text-center">
                <p>{{$n->news_title}}</p>
                </div>
                <div class="col-2 text-center">
                  <span >{{ $n -> club_name}}</span>
                </div>
                <div class="col-1 text-center">
                  <span class="badge badge-secondary spanF bg-r">{{ $n -> news_name}}</span>
                </div>
              <div class="col-2 text-center">
                <span>{{$n->date}}</span>
              </div>
              <div class="col-3 text-center">
                <button type="button" class="btn button-c" data-toggle="modal" data-target="<?php echo "#".$modal ?>" style="border-radius: 25px;">
                MORE
                </button>
                <div class="modal fade c0" id="<?php echo $modal ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $modal."Title" ?>" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content bg-d">
                      <div class="modal-header">
                        <h5 class="modal-title" id="<?php echo $modal."Title" ?>">{{$n->news_title}}</h5>
                        <button type="button" class="close c0" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body text-left">
                        <div>
                          <p>{!!$n->news_content!!}<p>
                        </div>
                        <div class="image-3x4" style="background-image: url(/storage/newpic/{{$n->news_pic}}"></div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary button-c" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @else
            @endif
            @php
              $mnum++
            @endphp
          @endforeach
        @endif
      </div>
      </div>
    </div>
    <!-- 成果展消息 -->
    <div class="tab-pane fade" id="成果展" role="tabpanel" aria-labelledby="成果展-tab">
      <div class="my-3 p-5 bg-d light border border-light border-radius" style="border-radius: 10px;">
      <div class="container-fluid border border-light rounded">
        <div class="row mt-3">
          <div class="col-4 text-center">
            <strong>標題</strong>
            <hr>
          </div>
          <div class="col-2 text-center">
            <strong>社團</strong>
            <hr>
          </div>
          <div class="col-1 text-center">
            <strong>分類</strong>
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
              $modal = "exampleModal".(string)$mnum;
            @endphp
            @if($n->news_name =='成果展')
            <div class="row">
              <div class="col-4 text-center">
                <p>{{$n->news_title}}</p>
                </div>
                <div class="col-2 text-center">
                  <span >{{ $n -> club_name}}</span>
                </div>
                <div class="col-1 text-center">
                  <span class="badge badge-secondary spanF bg-r">{{ $n -> news_name}}</span>
                </div>
              <div class="col-2 text-center">
                <span>{{$n->date}}</span>
              </div>
              <div class="col-3 text-center">
                <button type="button" class="btn button-c" data-toggle="modal" data-target="<?php echo "#".$modal ?>" style="border-radius: 25px;">
                MORE
                </button>
                <div class="modal fade c0" id="<?php echo $modal ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $modal."Title" ?>" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content bg-d">
                      <div class="modal-header">
                        <h5 class="modal-title" id="<?php echo $modal."Title" ?>">{{$n->news_title}}</h5>
                        <button type="button" class="close c0" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body text-left">
                        <div>
                          <p>{!!$n->news_content!!}<p>
                        </div>
                        <div class="image-3x4" style="background-image: url(/storage/newpic/{{$n->news_pic}}"></div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary button-c" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @else
            @endif
            @php
              $mnum++
            @endphp
          @endforeach
        @endif
      </div>
      </div>
    </div>


  </div>
  </div>

@endsection