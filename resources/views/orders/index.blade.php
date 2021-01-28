@extends('layout.app')
@section('title',trans('home.my_orders'))
@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('index') }}"><i class="fas fa-home"></i> @lang('orders.home')</a></li>
    <li class="breadcrumb-item active">@lang('home.my_orders')</li>
</ol>
@endsection
@section('content')
<div class="row">      
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h2><i class="fas fa-shipping-fast"></i> @lang('home.my_orders')</h2>
        </div>         
        <table class="table table-bordered">
            <thead>
                <th># @lang('orders.order')</th>
                <th>@lang('orders.date')</th>
                <th>@lang('orders.product')</th>
                <th>@lang('orders.total')</th>
                <th>@lang('orders.status')</th>
                <th>@lang('orders.detail')</th>
                <th>@lang('orders.retry_payment')</th>
            </thead>
            <tbody>
                @if($orders->count() > 0)
                    @foreach($orders as $order)
                        <tr>
                            <td align="center">{{ $order->id }}</td>
                            <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }}</td>
                            <td>{{ $order->product->name }}</td>
                            <td>${{ number_format($order->product->price,0,',','.') }}</td>
                            <td><strong>{{ $order->getStatus() }}</strong></td>
                            <td align="center">
                                <a href="{{ route('orders.show',$order->id) }}" title="@lang('orders.detail')" alt="@lang('orders.detail')">
                                    <i class="fas fa-2x fa-info-circle"></i>
                                </a>                                  
                            </td>
                            <td align="center"> 
                                @if($order->status == 'REJECTED')
                                    <a href="{{ route('orders.retry',$order->id) }}" title="@lang('orders.detail')" alt="@lang('orders.detail')">
                                        <i class="fas fa-2x fa-sync"></i>
                                    </a>                                  
                                @elseif($order->status == 'PENDING')
                                    <a href="{{ $order->payment_url }}" title="@lang('orders.detail')" alt="@lang('orders.detail')">
                                        <i class="fas fa-2x fa-sync"></i>
                                    </a>
                                @else
                                    <i class="fas fa-2x fa-ban" style="color:#007bff;"></i>
                                @endif                                                              
                            </td>                            
                        <tr> 
                    @endforeach
                @else
                    <tr>
                        <td colspan="7" align="center"><strong>@lang('orders.no_orders_reg')</strong></td>
                    <tr> 
                @endif
            </tbody>                    
        </table>     
        {{ $orders->links() }}
        <br>         
    </div>
</div>
@endsection