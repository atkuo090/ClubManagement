@extends('layouts.app')
<title>{{Session::get('club_name')}}</title>
@include('inc.m_navbar')
@section('content')
@foreach($club as $c)

@endforeach

<div class="mx-5 mb-5 mt-3">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-6 pt-4 text-right pr-0">
                <h4><strong>簡介</strong></h4>
            </div>
            <div class="col-4 pt-4 text-right pl-0">
                <h4 class="text-left"><strong>資訊</strong></h4>
            </div>
            <div class="col-2 pb-2 pl-0">
                @if(count($club)>0)
                @foreach($club as $c)
                <a href="/clubs/{{$c->club_id}}/edit">
                    <img class="img-thumbnail" style="border-radius:10rem; border-width:0px;max-width: 60px;float: right;background-color:rgba(255, 255, 255, 0);" src="../img/pencil.png"></a>
            </div>
        </div>
    </div>
    <div class="my-3 p-3 bg-t light border border-light border-radius" style="border-radius: 10px;">
        <table class="table table-borderless light mb-0">
            <tbody>
                {!!Session::put('club_id', $c->club_id )!!}
                {!!Session::put('club_semester', $c->club_semester )!!}
                {!!Session::put('semester_id', $c->semester_id )!!}
                {!!Session::put('club_name', $c->club_name )!!}

                <tr>
                    <th style="width: 4rem">宗旨：</th>
                    <td>{!!$c->club_purpose!!}</td>
                </tr>
                <tr>
                    <th style="width: 4rem">簡介：</th>
                    <td>
                        {!!$c->club_introduce!!}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-6 pt-4">
                <h5><strong>社團資訊</strong></h5>
            </div>
        </div>
        <div class="my-3 p-3 bg-t light border border-light border-radius" style="border-radius: 10px;">
            <table class="table table-borderless light mb-0">
                <tbody>
                    <tr>
                        <th style="width: 6rem">社課時間：</th>
                        <td>{{$c->club_time}}</td>
                    </tr>
                    <tr>
                        <th style="width: 6rem">社課地點：</th>
                        <td>{{$c->club_place}}</td>
                    </tr>
                    <tr>
                        <th style="width: 6rem">社課費用：</th>
                        <td>{{$c->club_fee}}</td>
                    </tr>
                    <tr>
                        <th style="width: 6rem">指導老師：</th>
                        <td>{{$c->club_teacher}}</td>
                    </tr>
                    <tr>
                        <th style="width: 6rem">社團網址：</th>
                        <td>
                            <a href="{{$c->club_website}}" class="a-col">{!!$c->club_website!!}</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-6 pt-4">
                <h5><strong>社團圖片</strong></h5>
            </div>
        </div>
        <div class="my-3 px-3 pt-3 bg-t light border border-light border-radius" style="border-radius: 10px;">
            <div class="row">
                <div class="card-deck pr-0">
                    <div class="card bg-t" style="border: 0px;" data-toggle="modal" data-target="#exampleModalCenter">
                        <div class="card-head">
                            <h5><strong>社團 icon</strong></h5>
                        </div>
                        <form class="bg-t" action="">
                            <!-- <div class="card-img-top image-1x1" style="background-image: url('img/club-2.jpg');"></div> -->
                            <div class="card-img-top image-1x1" style="background-image: url(/storage/club/{{$c->club_icon}});"></div>
                        </form>
                    </div>
                    <div class="card bg-t m-0" style="border: 0px;" data-toggle="modal" data-target="#exampleModalCenter">
                        <div class="card-head">
                            <h5><strong>社團簡介圖</strong></h5>
                        </div>
                        <form class="bg-t" action="">
                            <!-- <div class="card-img-top image-3x4" style="background-image: url('img/activity.jpg');"></div> -->
                            <div class="card-img-top image-1x1" style="background-image: url(/storage/club/{{$c->club_cover}});"></div>
                        </form>
                    </div>
                    <div class="card bg-t mr-0" style="border: 0px;" data-toggle="modal" data-target="#exampleModalCenter">
                        <div class="card-head">
                            <h5><strong>我的社團封面</strong></h5>
                        </div>
                        <form class="bg-t" action="">
                            <div class="card-img-top image-1x1" style="background-image: url(/storage/club/{{$c->club_show_pic}});"></div>
                            <!-- <div class="card-img-top image-3x4" style="background-image: url('img/club.jpg');"></div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
    @endsection