@extends('admin.layouts.template')

@section('page_title')
Pending Orders
@endsection
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin/</span>Pending Orders</h4>
 <div class="card">
    <h5 class="card-header"></h5>
    @if(session()->has('message'))
    <div class="alert alert-success">
      {{session()->get('message')}}
    </div>
    @endif
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead class="table-light">
          <tr>
            <th>S. No</th>
            <th>Order Id</th>
            <th>Product Id</th>
            <th>Quantity</th>
            <th>Customer Id</th>
            <th>Number</th>
            <th>Address</th>
            <th>Total</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($orders as $order)
          <tr>

            <td>{{$loop->iteration}}</td>
           <td>{{$order->id}}</td>
           <td>{{$order->product_id}}</td>
           <td>{{$order->quantity}}</td>
           <td>{{$order->user_id}}</td>
           <td>{{$order->shipping_number}}</td>
           <td>
            {{$order->shipping_address}}, {{$order->shipping_district}}, {{$order->shipping_state}}, {{$order->shipping_country}}, {{$order->shipping_pincode}}
        </td>
           <td>{{$order->total_price}}</td>
           <td>
            <a href="{{route('confirmorder',$order->id)}}" class="btn btn-sm btn-success">Confirm</a>
            <a href="{{route('rejectorder',$order->id)}}" class="btn btn-sm btn-danger">Reject</a>
        </td>
          </tr>
          @endforeach   
        </tbody>
      </table>
    </div>
  </div>
</div>


@endsection