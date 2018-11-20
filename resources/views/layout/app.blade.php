<!doctype html>
<html lang="sk">
<head>
    @include('layout.partials.head')
</head>

<body>
    @include('layout.partials.nav')
  
    <div class="container">
        <div class="row mt-4">
            <div class="col-3 d-none d-lg-block">
                <h1>Katalóg produktov</h1>
                @include('layout.partials.catalog')
            </div>
            <div class="col-12 col-lg-9">
                @yield('content')
            </div>
        </div>
    </div>
  
    <!-- Bootstrap core JavaScript -->
    @include('layout.partials.footer-scripts');
</body>
</html>