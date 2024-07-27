@include('admin.layout.partial.header')
@include('admin.layout.partial.navbar')
@include('admin.layout.partial.sidebar') 
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class=""></div>
    <div class="content-wrapper">
        @yield('breadcrumb')
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section id="dashboard-ecommerce">
                @yield('content')
            </section>
        </div>
    </div>
</div>
@include('admin.layout.partial.footer')