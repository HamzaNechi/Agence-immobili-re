<script src="{{URL::asset('assets/js/bootstrap.bundle.min.js')}}"></script>
	<!--plugins-->
	<script src="{{URL::asset('assets/js/jquery.min.js')}}"></script>
	<script src="{{URL::asset('assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
	<script src="{{URL::asset('assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
	<script src="{{URL::asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
	<script src="{{URL::asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
	<script src="{{URL::asset('assets/plugins/chartjs/js/Chart.min.js')}}"></script>
	<script src="{{URL::asset('assets/plugins/chartjs/js/Chart.extension.js')}}"></script>
	<script src="{{URL::asset('assets/js/index.js')}}"></script>
	<script src="{{URL::asset('assets/js/text-editor.js')}}"></script>
	
	
	<!--app JS-->
	<script src="{{URL::asset('assets/js/app.js')}}"></script>
	<script>
		$(function () {
			$('[data-bs-toggle="popover"]').popover();
			$('[data-bs-toggle="tooltip"]').tooltip();
		})
	</script>

<script>
    document.onkeydown=function(e)
    {
        if(event.KeyCode == 123)
        {
            return false;
        }

        if(e.ctrlKey && e.shiftKey && e.KeyCode == 'I'.charCodeAt(0))
        {
            return false;
        }

        if(e.ctrlKey && e.shiftKey && e.KeyCode == 'J'.charCodeAt(0))
        {
            return false;
        }

        if(e.ctrlKey && e.KeyCode == 'U'.charCodeAt(0))
        {
            return false;
        }
    }
</script>