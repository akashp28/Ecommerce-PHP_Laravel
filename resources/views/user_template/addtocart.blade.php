@extends('user_template.layouts.template')
@section('page_title')
Cart Page
@endsection

@section('main-content')
<div class="row">
    @if(session()->has('message'))
<div class="alert alert-success">
    {{session()->get('message')}}
</div>
@endif
    <div class="class col-12">
        <div class="box_main border mt-3">
            <table class="table">
                <tr>
                    <th>S. No.</th>
                    <th>Product Name</th>
                    <th>Image</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                @php
                $total=0;
               @endphp
                @foreach ($cart_items as $item)
                <tr>
                    @php
                    $product_name=App\Models\Product::where('id',$item->product_id)
                    ->value('product_name');
                    $img=App\Models\Product::where('id',$item->product_id)
                    ->value('product_img');
                    @endphp
                    <td>{{$loop->iteration}}</td>
                    <td>{{$product_name}}</td>
                    <td><img src="{{asset($img)}}" alt="" style="height: 30px;"></td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->price}}</td>
                    <td><a href="{{route('removeitem',$item->id)}}" class="btn btn-danger btn-sm">Remove</a></td>
                </tr>

                @php
                 $total=$total+$item->price;
                @endphp

                @endforeach
                @if ($total >0)
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total</td>
                    <td>{{$total}}</td>
                    <td><a href="{{route('getaddress')}}" class="btn btn-primary btn-sm">Checkout</a></td>
                </tr> 
                @else
                <tr>
                    <td>No Items in Cart..! <a href="{{route('home')}}"><b>Shop Now</b></a></td>
                </tr>
                 @endif
            </table>

            </div>
        </div>
    </div>
</div>

@endsection