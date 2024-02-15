<!doctype html>
<html lang="en-US">
@include('theme.header')
@stack('css')
<body>
@include('theme.navbar')
<div class="container mt-4">
    @yield('content')
</div>
@stack('modal')
@include('theme.footer')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    });
</script>
@stack('script')
</body>
</html>
