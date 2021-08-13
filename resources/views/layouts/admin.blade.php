@include('admin.includes.header')
    <div class="wrapper ">
        @include('admin.includes.sidebar')   
        <div class="main-panel">
            <!-- Navbar -->
            @include('admin.includes.navbar')
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                   @yield('content')
                </div>
            </div>
          {{-- Start footer--}}
          @include('admin.includes.footer')
          {{-- end footer--}}
            <script>
                const x = new Date().getFullYear();
                let date = document.getElementById('date');
                date.innerHTML = '&copy; ' + x + date.innerHTML;

            </script>
        </div>
    </div>

    @include('admin.includes.scripts')
</body>

</html>
