@extends('user_template.layouts.template')
@section('page_title')
Home Page
@endsection

@section('main-content')
             <div class="container" style="margin: 100px 0 100px 0">
                
                <h1 class="fashion_taital">All Products</h1>
                <div class="fashion_section_2">
                   <div class="row" id="productsRow" >
                     @foreach($allproducts as $product)
                      <div class="col-lg-4 col-sm-4" >
                         <div class="box_main">
                            <h4 class="shirt_text">{{$product->product_name}}</h4>
                            <p class="price_text">Price  <span style="color: #262626;"> ₹ {{$product->price}}</span></p>
                            <div class="tshirt_img"><img src="{{asset($product->product_img)}}"></div>
                            <div class="btn_main">
                              <form action="{{route('addproducttocart')}}" method="POST">
                                 @csrf
                                 <input type="hidden" name="product_id" id="" value="{{$product->id}}">
                                 <input type="hidden" name="price" id="" value="{{$product->price}}">
                                 <input type="hidden" value="1" name="count" >
                                 <input type="submit" value="Buy Now" class="btn btn-warning">
                              </form>
                               <div class="seemore_bt"><a href="{{route('singleproduct',[$product->id,$product->slug])}}">See More</a></div>
                            </div>
                         </div>
                      </div>
                    @endforeach
                   </div>
                </div>


      </div>
    
 @endsection