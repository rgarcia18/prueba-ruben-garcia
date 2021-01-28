@extends('layout.app')
@section('title',trans('orders.new_order'))
@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('index') }}"><i class="fas fa-home"></i> @lang('orders.home')</a></li>
    <li class="breadcrumb-item active">@lang('orders.new_order')</li>
</ol>
@endsection
@section('content')
<form role="form" action="{{ route('orders.store',$product->id) }}" method="POST">
    {{csrf_field()}}
    <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
    <div class="row">      
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h2><i class="fas fa-shipping-fast"></i> @lang('orders.new_order')</h2>
            </div>   
            @if(Session::has('message'))
                <div class="alert alert-{{ Session::get('typeMsg') }} alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> @lang('orders.alert')!</h4>
                    {{ Session::get('message') }}
                </div>
            @endif
            @if(count($errors) > 0)
                <div class="alert alert-danger alert-dismissible section-margin-top-50">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> @lang('orders.alert')!</h4>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{!! $error !!}</li>
                        @endforeach
                    </ul>
                </div>
            @endif            
            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <label for="customer_name">@lang('orders.name')*</label>
                <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="@lang('orders.name')" required="required" maxlength="180" value="{{ old('customer_name') }}">
            </div>
            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <label for="customer_email">@lang('orders.email')*</label>
                <input type="email" class="form-control" id="customer_email" name="customer_email" placeholder="@lang('orders.email')" required="required" maxlength="180" value="{{ old('customer_email') }}">
            </div>
            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <label for="customer_mobile">@lang('orders.phone')*</label>
                <input type="text" class="form-control" id="customer_mobile" name="customer_mobile" placeholder="@lang('orders.phone')" required="required" maxlength="50" value="{{ old('customer_mobile') }}">
            </div>
            <br>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <strong>{{ $product->name }}</strong>
            </div>
            <br>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                 <p class="lead">@lang('orders.description')</p>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">{{ $product->description }}</p> 
            </div>
            <br><br>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <p class="lead">@lang('orders.payment_methods')</p>
                <img src="{{ asset('img/media/visa.png') }}" alt="Visa">
                <img src="{{ asset('img/media/mastercard.png') }}" alt="Mastercard">
                <img src="{{ asset('img/media/american-express.png') }}" alt="American Express">
            </div>
            <br>            
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h2>@lang('orders.purchase_summary')</h2>
            </div>
            <div class="col-xs-12 table-responsive">
                <table class="table table-active">
                    <tbody>
                        <tr>
                            <td colspan="2">
                                <strong>{{ $product->name }}</strong>
                            </td>
                        </tr>  
                        <tr>
                            <td><strong>@lang('orders.subtotal'):</strong></td>
                            <td>${{ number_format($product->price,0,',','.') }}</td>
                        </tr>
                        <tr>
                            <td><strong>@lang('orders.shipping'):</strong></td>
                            <td>@lang('orders.free')</td>
                        </tr>
                        <tr>
                            <td><strong>@lang('orders.total'):</strong></td>
                            <td>${{ number_format($product->price,0,',','.') }}</td>
                        </tr>   
                        <tr>
                            <td colspan="2" align="center">
                                <button type="submit" class="btn btn-primary btn-block">@lang('orders.go_pay')</button>
                            </td>
                        </tr>                     
                        <tr>
                            <td colspan="2" align="center">
                                <img class="card-img-top" src="{{ asset($product->route_image) }}" alt="{{ $product->name }}">
                            </td>
                        </tr>                   
                    </tbody>                    
                </table>
            </div> 
        </div>
    </div>
</form>
@endsection