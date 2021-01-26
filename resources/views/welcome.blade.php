@extends('layout.app')
@section('title','Home')
@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item active"><a href="/">Inicio</a></li>
</ol>
@endsection
@section('content')
    @foreach($products as $product)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <a href="#">
                    <img class="card-img-top" src="{{ asset($product->route_image) }}" alt="{{ $product->name }}">
                </a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="#">{{ $product->name }}</a>
                    </h4>
                    <h5>${{ number_format($product->price,0,',','.') }}</h5>
                </div>
                <div class="card-footer">
                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                    <a href="#" style="float:right">
                        <i class="fas fa-cart-plus"></i>
                    </a>
                </div>
            </div>
        </div>
    @endforeach
@endsection