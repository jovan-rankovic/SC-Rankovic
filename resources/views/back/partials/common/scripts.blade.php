<script>
    const BASE_URL = "{{ url('/admin') }}";
    const TOKEN = "{{ csrf_token() }}";
</script>
<script src="{{ asset('/js/app.js') }}"></script>
<script src="{{ asset('back/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('back/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('back/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('back/plugins/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('back/js/admin.js') }}"></script>
<script src="{{ asset('back/js/ajax_admin.js') }}"></script>
