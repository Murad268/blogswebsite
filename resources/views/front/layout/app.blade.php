<!DOCTYPE html>
<html lang="en">

@include('front.layout.includes.head')

<body>
    <x-home-header-component />

    @yield('content')

    <x-home-footer-component />
    @include('front.layout.includes.foot')

</body>

</html>