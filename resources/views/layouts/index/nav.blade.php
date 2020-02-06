<!-- Menu desktop -->
<nav class="menu-desktop">
  <a class="logo-stick" href="{{ route('home') }}">
    <img src="{{ asset('img/mo.png')}}" alt="LOGO" >
  </a>

  <ul class="main-menu justify-content-center">
    <li class="main-menu-active">
      <a href="{{route('home')}}">Home</a>
      <ul class="sub-menu">
       <li><a href="{{route('welcome')}}">Welcome</a></li>
      </ul>
    </li>

@include('layouts.index.entertainment_nav')

  @include('layouts.index.lifestyle_nav')

    @include('layouts.index.travel_nav')

      @include('layouts.index.business_nav')

        @include('layouts.index.video_nav')

  <li>
    <a >Features</a>
    <ul class="sub-menu">
      <li><a href="{{url('Technology = Mobile')}}">Mobile</a></li>
      <li><a href="{{url('Business = Finance')}}">Finance</a></li>
      <li><a href="{{url('Business = Economy')}}">Economy</a></li>
      <li><a href="{{url('Business = Money')}}">Money</a></li>
      <li><a href="{{url('Fashion = Beauty')}}">Beauty</a></li>
      <li><a href="{{url('Entertainment = Music')}}">Music</a></li>
      <li><a href="{{url('Entertainment = Games')}}">Games</a></li>
      <li><a href="{{url('Entertainment = Sport')}}">Sport</a></li>
      <li><a href="{{url('Fashion = Shoe')}}">Shoe</a></li>
      <li><a href="{{url('Travel = Beachs')}}">Beachs</a></li>
      <li><a href="{{url('Travel = Hotels')}}">Hotels</a></li>

    </ul>
  </li>


  @auth
  <li >
    <a class="hov-cl10">{{$user->email}}</a>
    <ul class="sub-menu">
      <li><a href="p  {{$user->email}}"><i class="fa fa-user"></i> My Profile</a></li>
      <li><a href="{{route('user_comments')}}"><i class="fas fa-comments"></i> My Comments</a></li>
      <li><a href="{{route('user_contacts')}}"><i class="fa fa-envelope" ></i> My Messages</a></li>
      <li><a href="{{route('setting')}}"><i class="fa fa-cog fa-spin fa-1x fa-fw"></i> Settings</a></li>
      <li><a class="dropdown-item m-l-7" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
          <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
      </li>

    </ul>
  </li>
     @endauth

  </ul>
</nav>
