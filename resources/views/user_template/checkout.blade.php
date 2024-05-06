@extends('user_template.layouts.template')
@section('page_title')
CheckOut Page
@endsection

@section('main-content')
   
    <div class="row">
        <div class="col-8 border mt-3">
            <div class="box_main">
                <h3>Product will be delivered at :</h3>
                <p>Address : {{$shipping_address->address}}</p>
                <p>District : </h3>{{$shipping_address->district}}</p>
                <p>State : {{$shipping_address->state}}</p>
                <p>Country : {{$shipping_address->country}}</p>
                <p>Pincode : {{$shipping_address->pincode}}</p>
                <p>Contact Number : {{$shipping_address->number}}</p>
            </div>
        </div>

        <div class="col-4 border mt-3">
            <div class="box_main">
                Ordered Products are :
                <table class="table">
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                    @php
                    $total=0;
                   @endphp
                    @foreach ($cart_items as $item)
                    <tr>
                        @php
                        $product_name=App\Models\Product::where('id',$item->product_id)
                        ->value('product_name');
                        @endphp
                        <td>{{$product_name}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>{{$item->price}}</td>
                        
                    </tr>
    
                    @php
                     $total=$total+$item->price;
                    @endphp
    
                    @endforeach
                    <tr>
                        <td></td>
                        <td>Total</td>
                        <td>{{$total}}</td>
                    </tr> 
                </table>
            </div>
        </div>
    
    <form action="{{route('addtocart')}}" method="get">
    @csrf
    <input type="submit" value="Cancel Order" class="btn btn-danger mr-4 mb-3">
</form>
<form action="{{route('placeorder')}}" method="POST">
    @csrf
    <input type="submit" value="Place Order" class="btn btn-primary">
</form>

</div>



@endsection