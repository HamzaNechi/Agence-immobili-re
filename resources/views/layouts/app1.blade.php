<!doctype html>
<html lang="en">


<!-- Mirrored from codervent.com/rocker/demo/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Oct 2021 09:55:58 GMT -->
@include('dashboard.layout.head')
@yield('css')

<body oncontextmenu ="return false;">
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		@include('dashboard.layout.sidebar')
		<!--end sidebar wrapper -->
		<!--start header -->
		
		@include('dashboard.layout.header')
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
		@yield('content')
			</div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button-->
		  <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		@include('dashboard.layout.footer')
	</div>

	@include('dashboard.layout.script')
    @yield('js')
</body>


<!-- Mirrored from codervent.com/rocker/demo/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Oct 2021 09:56:48 GMT -->
</html>
		