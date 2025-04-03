<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Home')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> 
    @yield('style')
  </head>
<body >
  <div class="container-fluid m-0 p-0">
    <div class="row row-cols-2 w-100" style="height: 100vh">       
      <div class="col-3 position-fixed">
        {{-- Sidebar --}}
<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark position-s" style="width: 280px; height: 100vh;">
  <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
    <span class="fs-4"><i class="bi bi-toggles"></i> Admin Dashboard</span>
  </a>
  <hr>
  <ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
      <a href="{{ route('admin.homepage.index')}} " class="nav-link {{ request()->routeIs('admin.homepage.index') ? 'active' : 'text-white' }}" aria-current="page">
        <i class="bi bi-house-door"></i>
        Home
      </a>
    </li>
    <li>
      <a href="{{route('admin.users.index')}}" class="nav-link {{ request()->routeIs('admin.users.index') ? 'active' : 'text-white' }}">
        <i class="bi bi-people"></i>
        Users
      </a>
    </li>
    <li>
      <a href="{{ route('admin.bookings.index') }}" class="nav-link {{ request()->routeIs('admin.bookings.index') ? 'active' : 'text-white' }}">
        <i class="bi bi-ticket-detailed"></i>
        Bookings
      </a>
    </li>
    <li>
      <a href="{{ route('admin.hotels.index')}}" class="nav-link {{ request()->routeIs('admin.hotels.index') ? 'active' : 'text-white' }}">
        <i class="bi bi-building"></i>
        Hotels
      </a>
    </li>
    <li>
      <a href="{{ route('admin.rooms.index')}}" class="nav-link {{ request()->routeIs('admin.rooms.index') ? 'active' : 'text-white' }}">
        <i class="bi bi-123"></i>
        Rooms
      </a>
    </li>
    <li>
      <a href="{{route('admin.coupons.index')}}" class="nav-link {{ request()->routeIs('admin.coupons.index') ? 'active' : 'text-white' }}">
        <i class="bi bi-percent"></i>
        Coupons
      </a>
    </li>
    <li>
      <a href="{{route('admin.reviews.index')}}" class="nav-link {{ request()->routeIs('admin.reviews.index') ? 'active' : 'text-white' }}">
        <i class="bi bi-chat-right-heart"></i>
        Reviews
      </a>
    </li>

    <li>
        <a href="{{route('home')}}" class="nav-link text-white">
            <i class="bi bi-house"></i>
          Back to Home
        </a>
      </li>
  </ul>
  <hr>
  <div class="dropdown">
    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
      <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="" width="32" height="32" class="rounded-circle me-2">
      <strong>{{Auth::user()->name}}</strong>
    </a>
    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
      <li>
        <x-dropdown-link :href="route('profile.edit') " class="dropdown-item">
             <i class="bi bi-person-circle"></i>
              {{ __('Profile') }}
          </x-dropdown-link>
      </li>
      <li>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <x-dropdown-link :href="route('logout') " class="dropdown-item"
          style="color: rgb(231, 62, 62);"
                  onclick="event.preventDefault();
                              this.closest('form').submit();">
              <i class="bi bi-box-arrow-left"></i>
              {{ __('Log Out') }}
          </x-dropdown-link>
        </form>
      </li>
    </ul>
  </div>
</div>
      </div>
      <div class="col-9" style="margin-left: 280px;">
              @yield('content')
      </div>
    </div>
  </div>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    
</body>
</html>