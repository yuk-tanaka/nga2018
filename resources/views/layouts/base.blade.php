<!doctype html>
<html lang="ja">
<head>
  <!--meta-->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
@yield('meta')
<!--title-->
  <title>@yield('title') ｜ 日本酒ゴーアラウンド非公式ポータル</title>
  <!--style-->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  @stack('styles')

  @if(env('APP_ENV') === 'production'))
    {!! Analytics::render() !!}
  @endif
</head>

<body>

<div id="app">
  @include('layouts.header')

  <b-container>
    @yield('body')
  </b-container>

</div>

<!--scripts-->
<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts')
</body>
</html>
