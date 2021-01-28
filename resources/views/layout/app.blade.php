<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <title>Tienda Deportiva | @yield('title')</title>
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link rel="stylesheet" href="{{asset('css/shop-homepage.css')}}" rel="stylesheet">
        <!--fontawesome-->
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    </head>
    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ route('index') }}">@lang('home.store_name')</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item @if(\Request::route()->getName() == 'index') active @endif">
                            <a class="nav-link" href="{{ route('index') }}">@lang('home.home')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(\Request::route()->getName() == 'orders.index') active @endif" href="{{ route('orders.index') }}">@lang('home.my_orders')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">@lang('home.services')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">@lang('home.contact')</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page Content -->
        <div class="container">
            <br>            
            <div class="row">                
                <div class="col-lg-12">
                    @yield('breadcrumb')
                </div>
            </div>
            <div class="row">                
                <!-- /.col-lg-3 -->                
                <div class="col-lg-12">
                    @if(\Request::route()->getName() == 'index')
                        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active">
                                    <img class="d-block img-fluid" src="{{ asset('img/slider/imgSlider001.jpg') }}" style="width:100%;height:350px">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block img-fluid" src="{{ asset('img/slider/imgSlider002.jpg') }}" style="width:100%;height:350px">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block img-fluid" src="{{ asset('img/slider/imgSlider003.jpg') }}" style="width:100%;height:350px">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only"></span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only"></span>
                            </a>
                        </div>
                    @endif
                    <div class="container">
                        @yield('content')
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.col-lg-9 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
        <!-- Footer -->
        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; @lang('home.store_name') {{ date('Y') }}</p>
            </div>
            <!-- /.container -->
        </footer>
        <!-- Bootstrap core JavaScript -->
        <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    </body>
</html>
