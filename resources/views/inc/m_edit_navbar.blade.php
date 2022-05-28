<nav class="navbar navbar-expand-md navbar-light bg-d shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/backstage') }}">
      <!-- {{ config('app.name', 'Laravel') }} -->
      <img src="../../img/n_logo.png" height="45px"></a>
    </a>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav mr-auto">
        <li class="nav-item px-3 active">
          <a class="a-col" href="/clubs/{{Session::get('club_name')}}">簡介/資訊 <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item px-3">
          <a class="a-col" href="/clubOfnews/{{Session::get('club_name')}}">社團消息</a>
        </li>
        <li class="nav-item px-3">
          <a class="a-col" href="/clubOfclassrecord/{{Session::get('club_name')}}">社課紀錄</a>
        </li>
        <li class="nav-item px-3">
          <a class="a-col" href="/clubOfFeedback/{{Session::get('club_name')}}">即時反饋</a>
        </li>
        <li class="nav-item px-3">
          <a class="a-col" href="/Clubactivity/{{Session::get('club_name')}}">活動成果</a>
        </li>
        <li class="nav-item px-3">
          <a class="a-col" href="/clubOfplan/{{Session::get('club_name')}}">學期計畫</a>
        </li>
        <li class="nav-item px-3">
          <a class="a-col" href="/clubOfplan/{{Session::get('club_name')}}">社員名冊</a>
        </li>

      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto">
        {{-- <li class="nav-item">
                <a class="a-col" href="/join">Dashboard</a>
            </li> --}}
        <!-- Authentication Links -->
        @guest
        @if (Route::has('login'))
        <li class="nav-item">
          <a class="a-col" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @endif

        @if (Route::has('register'))
        <li class="nav-item">
          <a class="a-col" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
        @endif
        @else
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="a-col dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">


            @if(Session::has('role') )
            <a class="dropdown-item" href="/home">
              學生
            </a>
            @endif
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
              {{ __('登出') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

              @csrf
            </form>
          </div>
        </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>