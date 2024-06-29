<!-- BEGIN: Vendor JS-->
<script src="{{ asset('app-assets') }}/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('app-assets') }}/js/core/app-menu.js"></script>
<script src="{{ asset('app-assets') }}/js/core/app.js"></script>
<!-- END: Theme JS-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stack('js')

@stack('js-internal')
@include('sweetalert::alert')

{{-- auto logout --}}
<script>
    // autologout.js
    $(document).ready(function() {
        const timeout = 43200000; // 900000 ms = 15 minutes //12 jam
        var idleTimer = null;
        $('*').bind(
            'mousemove click mouseup mousedown keydown keypress keyup submit change mouseenter scroll resize dblclick',
            function() {
                clearTimeout(idleTimer);

                idleTimer = setTimeout(function() {
                    document.getElementById('auto-logout').submit();
                }, timeout);
            });
        $("body").trigger("mousemove");
    });

    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>
