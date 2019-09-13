<script src="{{ secure_asset('js/jquery.js') }}"></script>
<script src="{{ secure_asset('js/bootstrap.min.js') }}"></script>
<script src="{{ secure_asset('js/jquery.parallax.js') }}"></script>
<script src="{{ secure_asset('js/smoothscroll.js') }}"></script>
<script>
    const BASE_URL = "{{ url('/') }}";
</script>
@yield('moreJS')
<script src="{{ secure_asset('js/ajax.js') }}"></script>
<script src="{{ secure_asset('js/wow.min.js') }}"></script>
<script src="{{ secure_asset('js/custom.js') }}"></script>
