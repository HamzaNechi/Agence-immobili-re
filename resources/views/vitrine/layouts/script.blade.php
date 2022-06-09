<script src="{{URL::asset('vitrine/js/jquery.js')}}"></script> 
<script src="{{URL::asset('vitrine/js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('vitrine/js/jquery-ui.js')}}"></script>
<script src="{{URL::asset('vitrine/js/jquery.fancybox.pack.js')}}"></script>
<script src="{{URL::asset('vitrine/js/jquery.fancybox-media.js')}}"></script>
<script src="{{URL::asset('vitrine/js/mixitup.js')}}"></script>
<script src="{{URL::asset('vitrine/js/owl.js')}}"></script>
<script src="{{URL::asset('vitrine/js/wow.js')}}"></script>
<script src="{{URL::asset('vitrine/js/appear.js')}}"></script>
<script src="{{URL::asset('vitrine/js/script.js')}}"></script>
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