@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                  
                    <h3>Your blog Posts</h3>
                    @if(count($club) > 0)
                    <table class="table table-striped">
                        @foreach($club as $n)
                        <tr>
                            <th>{{$n->club_name}}</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @endforeach
                    </table>
                @else
                    <p>You have no posts</p>
                @endif
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
