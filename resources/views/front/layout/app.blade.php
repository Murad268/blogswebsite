<!DOCTYPE html>
<html lang="en">

@include('front.layout.includes.head')

<body>
    <x-header-component />

    @yield('content')

    <x-footer-component />
    @include('front.layout.includes.foot')
    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session("success") }}',
        });
    </script>
    @elseif(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '{{ session("error") }}',
        });
    </script>
    @endif
</body>

</html>
