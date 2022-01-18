<!DOCTYPE html>
<html lang="en">
    @include('partials.head')
    <body>
        
        @include('partials.preloader')

        <!-- PAGE CONTENT
		============================================= -->	
        <div id="page" class="page">
            @include('partials.header')

            @yield('frontBody')

            @include('partials.footer')

            @include('partials.scripts')
        </div> <!-- END PAGE CONTENT -->

    </body>
</html>
