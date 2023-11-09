<!DOCTYPE html>
<html lang="en">

@include('front.layout.includes.head')

<body>
    <x-header-component />

    @yield('content')

    <x-footer-component />
    @include('front.layout.includes.foot')

</body>

</html>
