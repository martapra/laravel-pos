<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gata Com | @yield("title")</title>

  @include("layouts.sc_head")
</head>

<body class="hold-transition sidebar-mini">
  @yield('content')
  @include('layouts.sc_footer')
</body>
</html>