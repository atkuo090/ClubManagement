@extends('layouts.app')
@include('inc.bs_navbar')
@section('content')
<title>後台</title>

<div class="container mb-5">
    <h5 class="my-4"><strong>我的社團</strong></h5>
    <div class="row">
        @if(count($club) > 0)
        <!--要改參數-->
        @foreach($club as $n)
        <div class="col-lg-3 col-sm-6 pb-3">
            <a href="clubOfnews/{{$n->club_name}}" class="a-col">
                <div class="card" style="border: 0px;">
                    <div class="card-img-top image-1x1" style="background-image: url(/storage/club/{{$n->club_icon}});"></div>
                    <div class="card-body text-center" style="background-color:rgba(255, 255, 255, 0);">
                        <h6 class="card-title" style="color: #2f2c40;">
                            <strong>
                                {{$n->club_name}}
                            </strong>
                        </h6>
                        <!-- <div style="text-align: center;">
                            <a href="clubOfnews/{{$n->club_name}}" class="btn button-c1">&nbsp;&nbsp;VIEW&nbsp;MORE&nbsp;&nbsp;</a>
                        </div> -->
                    </div>
                </div>
            </a>
        </div>
        @endforeach
        @endif
    </div>
</div>


@endsection