@extends('layout.app')
@section('title',trans('orders.new_order').' # '.$order->id)
@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i> @lang('orders.home')</a></li>
    <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">@lang('home.my_orders')</a></li>
    <li class="breadcrumb-item active">@lang('orders.order')</li>
</ol>
@endsection
@section('content')
<div class="row">      
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h2><i class="fas fa-shipping-fast"></i> @lang('orders.order') # {{$order->id}}</h2>
        </div>   
        @if(Session::has('message'))
            <div class="alert alert-{{ Session::get('typeMsg') }} alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> @lang('orders.information')!</h4>
                {{ Session::get('message') }}
            </div>
        @endif        
        
        <table class="table table-active">
            <tbody>
                <tr>
                    <td>
                        <strong>@lang('orders.date'):</strong>
                    </td>
                    <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y g:iA') }}</td>
                </tr>                 
                <tr>
                    <td>
                        <strong>@lang('orders.name'):</strong>
                    </td>
                    <td>{{ $order->customer_name }}</td>
                </tr>       
                <tr>
                    <td>
                        <strong>@lang('orders.email'):</strong>
                    </td>
                    <td>{{ $order->customer_email }}</td>
                </tr> 
                <tr>
                    <td>
                        <strong>@lang('orders.phone'):</strong>
                    </td>
                    <td>{{ $order->customer_mobile }}</td>
                </tr>        
                <tr>
                    <td>
                        <strong>@lang('orders.phone'):</strong>
                    </td>
                    <td>{{ $order->customer_mobile }}</td>
                </tr>
                <tr>
                    <td>
                        <strong>@lang('orders.order_status'):</strong>
                    </td>
                    <td>
                        <strong>{{ $order->getStatus() }}</strong>
                    </td>
                </tr>                                        
            </tbody>                    
        </table>            
        <br>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <strong>{{ $order->product->name }}</strong>
        </div>
        <br>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
             <p class="lead">@lang('orders.description')</p>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">{{ $order->product->description }}</p> 
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
                            <strong>{{ $order->product->name }}</strong>
                        </td>
                    </tr>  
                    <tr>
                        <td><strong>@lang('orders.subtotal'):</strong></td>
                        <td>${{ number_format($order->product->price,0,',','.') }} </td>
                    </tr>
                    <tr>
                        <td><strong>@lang('orders.shipping'):</strong></td>
                        <td>@lang('orders.free')</td>
                    </tr>
                    <tr>
                        <td><strong>@lang('orders.total'):</strong></td>
                        <td>${{ number_format($order->product->price,0,',','.') }}</td>
                    </tr>   
                    @if($order->status == 'REJECTED')
                        <tr>
                            <td colspan="2" align="center">
                                <a href="{{ route('orders.retry',$order->id) }}" class="btn btn-primary btn-block">@lang('orders.go_pay')</a>
                            </td>
                        </tr> 
                    @endif
                    @if($order->status == 'PENDING')
                        <tr>
                            <td colspan="2" align="center">
                                <a href="{{ $order->payment_url }}" class="btn btn-primary btn-block">@lang('orders.retry_payment')</a>
                            </td>
                        </tr> 
                    @endif                                              
                    <tr>
                        <td colspan="2" align="center">
                            <img class="card-img-top" src="{{ asset($order->product->route_image) }}" alt="{{ $order->product->name }}">
                        </td>
                    </tr>                   
                </tbody>                    
            </table>
        </div> 
    </div>
</div>
@endsection