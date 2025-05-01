@include('admin.partials.header')

@include('admin.partials.sidebar')

<!-- Main Content -->
<div id="content">

    @include('admin.partials.topbar')

    @yield('page_content')

</div>
<!-- End of Main Content -->

@include('admin.partials.footer')