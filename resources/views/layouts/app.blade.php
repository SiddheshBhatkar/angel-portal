<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('includes.head')
    </head>
    <body>
        
        <div class="container-scroller">
            @include('includes.navbar')

            <div class="container-fluid page-body-wrapper">
                @include('includes.sidebar')
            
                <div class="main-panel">
                   @yield('content')
                </div>
            </div>
       </div>
       <footer class="footer">
           @include('includes.footer')
       </footer>
    <!-- </div> -->
</body>
</html>