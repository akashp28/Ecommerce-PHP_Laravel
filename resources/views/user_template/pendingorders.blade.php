@extends('user_template.layouts.user_profile_template')
@section('page_title')
Pending Orders
@endsection
@section('profilecontent')
<h2>Pending Orders</h2>
<div class="row">
    @if(session()->has('message'))
<div class="alert alert-success">
    {{session()->get('message')}}
</div>
@endif
<div class="class col-12">
    <div class="box_main">
        <table class="table">
            <tr>
                <th>S. No</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Status</th>
            </tr>
            @if ($orders->isEmpty())
            <tr>
                <td>No Pending Orders..!</td>
            </tr>           
            @else
            @foreach ($orders as $order)
            <tr>
                @php
                $product_name=App\Models\Product::where('id',$order->product_id)
                ->value('product_name');
                @endphp
                <td>{{$loop->iteration}}</td>
                <td>{{$product_name}}</td>
                <td>{{$order->quantity}}</td>
                <td>{{$order->status}}</td>
            </tr>
            @endforeach
            @endif
        </table>
    </div>
</div>

</div>

@endsection
