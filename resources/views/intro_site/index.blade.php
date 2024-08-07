
@extends('intro_site.layouts.master')

@section('content')
   <!-- Start body-content -->


    {{--  start slider section  --}}
        @include('intro_site.parts.slider')
    {{--  end slider section  --}}
    <main id="main">
    {{-- start about app section --}}
        @include('intro_site.parts.about')
    {{-- end about app section --}}
    {{-- our services section --}}
        @include('intro_site.parts.services')
    {{-- our services section --}}
        @include('intro_site.parts.portfolio')
    {{-- start parteners section --}}
        {{-- @include('intro_site.parts.parteners') --}}
    {{-- start parteners section --}}
    @include('intro_site.parts.team')
    {{-- start how work section --}}
        {{-- @include('intro_site.parts.how_work') --}}
    {{-- end how work section --}}
    {{-- start fqs section --}}
        {{-- @include('intro_site.parts.fqs') --}}
    {{-- end fqs section --}}

    {{-- end parteners section --}}
    {{-- start parteners section --}}
        @include('intro_site.parts.contact_us')
    {{-- end parteners section --}}
    </main><!-- End #main -->

<!-- end body-content --> 
@endsection
    

  