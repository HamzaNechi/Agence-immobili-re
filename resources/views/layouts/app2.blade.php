<!DOCTYPE html>
<html>

<!-- Mirrored from themecraze.net/demos/html/lirive/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Sep 2021 14:35:33 GMT -->
@include('vitrine.layouts.head')
@yield('css')

<body oncontextmenu ="return false;">

<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"></div>
 	
    <!-- Main Header-->
    @include('vitrine.layouts.header')
    <!--End Main Header -->
    
    
    @yield('content')
    
    <!--Main Footer-->
    @include('vitrine.layouts.footer')
    
    
</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-long-arrow-up"></span></div>


@include('vitrine.layouts.script')
@yield('js')
</body>

<!-- Mirrored from themecraze.net/demos/html/lirive/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Sep 2021 14:35:47 GMT -->
</html>
