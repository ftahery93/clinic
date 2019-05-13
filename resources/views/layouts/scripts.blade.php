<!-- Bottom scripts (common) -->
<script src="{{ asset('assets/js/jquery-1.11.3.min.js') }}"></script>
<script src="{{ asset('assets/js/gsap/TweenMax.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/js/joinable.js') }}"></script>
<script src="{{ asset('assets/js/resizeable.js') }}"></script>
<script src="{{ asset('assets/js/neon-api.js') }}"></script>
<!--	<script src="{{ asset('assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>-->
<script src="{{ asset('assets/js/bootbox.js') }}"></script>


<!-- JavaScripts initializations and stuff -->
<script src="{{ asset('assets/js/neon-custom.js') }}"></script>


<!-- Demo Settings -->
<script src="{{ asset('assets/js/neon-demo.js') }}"></script>
<script>
jQuery(document).ready(function ($) {
    $('input#check-all:checkbox').removeAttr('checked');
    $('.unread.notification-success').on('click', function (e) {
        e.preventDefault();
        var ID = $(this).attr('sid');
        $.ajax({
            type: "GET",
            async: true,
            url: "{{ url('admin/serviceProviders')}}/" + ID + '/serviceViewed',
            success: function (data) {                
               window.location.href="{{ url('admin/serviceProviders')}}/" + data.html + '/services';
            }
        });
    });
    $('.unreadRequirement.notification-success').on('click', function (e) {
        e.preventDefault();
        var ID = $(this).attr('sid');
        $.ajax({
            type: "GET",
            async: true,
            url: "{{ url('admin/serviceProviders')}}/" + ID + '/requirementViewed',
            data: {_token: '{{ csrf_token() }}'},
            success: function (data) {                
               window.location.href="{{ url('admin/serviceProviders')}}/" + data.html + '/requirements';
            }
        });
    });
});
</script>    