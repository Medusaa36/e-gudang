<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E - Gudang | @yield ('title')</title>
  
  @include('layouts.style')
  @livewireStyles
</head>
<body class="hold-transition login-page">

    @yield ('content')
    
  @include('layouts.script')
  @livewireScripts
</body>
</html>
