@extends('layout.app')
@section('title','Home')
@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item active"><a href="{{ route('index') }}"><i class="fas fa-home"></i> Inicio</a></li>
</ol>
@endsection
@section('content')
    <div class="row">
    @foreach($products as $product)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <a href="{{ route('orders.create',$product->id) }}">
                    <img class="card-img-top" src="{{ asset($product->route_image) }}" alt="{{ $product->name }}" style="width:253px;height:145px">
                </a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="{{ route('orders.create',$product->id) }}">{{ $product->name }}</a>
                    </h4>
                    <h5>${{ number_format($product->price,0,',','.') }}</h5>
                </div>
                <div class="card-footer">
                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                    <a href="{{ route('orders.create',$product->id) }}" style="float:right">
                        <i class="fas fa-cart-plus"></i>
                    </a>
                </div>
            </div>
        </div>
    @endforeach
    </div>
@endsection