<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Teacher Management System') }}</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
   
  
    <meta name="csrf-token" content="{{ csrf_token() }}" />
 
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-sm bg-primary navbar-light">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link text-white" href="{{route('home')}}">Teacher Management System</a>
    </li>

    <li class="nav-item">
      <a class="nav-link text-white" href="#">|</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="{{route('teachers')}}">Teachers</a>
    </li>

   <li class="nav-item">
      <a class="nav-link text-white" href="#">|</a>
    </li>
    
   <li class="nav-item">
      <a class="nav-link text-white" href="{{route('students')}}">Students</a>
    </li>

  </ul>
</nav>
        <div class="container">
            <div class="row" style="padding: 5% 0 0 0;">
                
               
              
                
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
        </div>
       
    </div>


</body>
</html>
