<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    
    @yield('library-css')

    <title>Document</title>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar bg-base-100">
        <div class="navbar-start">
          <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M4 6h16M4 12h8m-8 6h16" />
              </svg>
            </div>
            <ul
              tabindex="0"
              class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
             
              <li>
                <a>Master Data</a>
                <ul class="p-2">
                  <li><a href="/master/event_category">Master Event Category</a></li>
                  <li><a href="/master/organizer">Master Organizer</a></li>
                  <li><a href="/master/event">Master Event</a></li>
                </ul>
              </li>
              <li><a href="/events">Events</a></li>
            </ul>
          </div>
          <a class="btn btn-ghost text-xl">Surabaya</a>
        </div>
        <div class="navbar-center hidden lg:flex">
          <ul class="menu menu-horizontal px-1">
            <li>
              <details>
                <summary>Master Data</summary>
                <ul class="p-2">
                  <li><a href="/master/event_category">Master Event Category</a></li>
                  <li><a href="/master/organizer">Master Organizer</a></li>
                  <li><a href="/master/event">Master Event</a></li>
                </ul>
              </details>
            </li>
            <li><a href="/events">Events</a></li>
          </ul>
        </div>
        <div class="navbar-end">
          <a class="btn">Home</a>
        </div>
      </div>
    <div class="container mx-auto px-4">
        @yield('content')
    </div>
   


    @yield('library-js')
</body>
</html>