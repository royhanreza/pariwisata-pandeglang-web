<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  @yield('head')

  <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
  <title>@yield('title')</title>
  @yield('pagestyle')
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper" id="app">
    @include('layout.navigation')
    @yield('content')
  </div>
  <!-- jQuery -->
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  @yield('script')
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
  <script src="{{ asset('js/adminlte.min.js') }}"></script>
  @yield('pagescript')
</body>
</html>