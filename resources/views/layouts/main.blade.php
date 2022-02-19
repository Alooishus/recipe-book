<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Local Recipe Book</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
@if(\Session::has('error'))
    <div class="alert alert-danger">
      {{\Session::get('error')}}
    </div>
  @endif
<body class="font-playfair flex flex-col min-h-screen">
    <header class="">
        @include('layouts.header')
    </header>

    @yield('content')

    <!-- Footer -->
    <footer>
        @include('layouts.footer')
    </footer>
</body>
</html>