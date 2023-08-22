<!DOCTYPE html>
<html lang="en">
    <head>
        @include('frontend.layouts.head')
    </head>

  <!-- Navbar -->
  @include('frontend.layouts.header')
  <!-- /.navbar -->
  <!-- Navbar -->
  @include('frontend.layouts.nav')
  <!-- /.navbar -->

    <!-- Main content -->
    @yield('content')
    <!-- /.content -->

  <!-- /.content-wrapper -->
  @include('frontend.layouts.footer')
  </body>
</html>
