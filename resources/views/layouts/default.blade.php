<!doctype html>
<html lang="en">

<head>
  @include('includes.head')
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    @include('includes.sidebar')
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      @include('includes.header')
      <!--  Header End -->
      @yield('content')
    </div>
  </div>
  @include('includes.footer')
</body>
</html>