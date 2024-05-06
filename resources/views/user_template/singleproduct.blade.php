@extends('user_template.layouts.template')
@section('page_title')
{{$product->product_name}}
@endsection

@section('main-content')

<div class="container">
    <div class="row">
        <div class="col-lg-4">
          <div class="box_main">
            <div class="tshirt_img"><img src="{{asset($product->product_img)}}"></div>
          </div>
        </div>
        <div class="col-lg-8">
            <div class="box_main">
                <div class="product-info">
                    <h4 class="shirt_text text-left">{{$product->product_name}}</h4>
                    <p class="price_text text-left">Price  <span style="color: #262626;">₹ {{$product->price}}</span></p>
                </div>
                <div class="my-3 product-details">
                    <p class="lead">{{$product->product_long_des}}</p>

                <ul class="p2 bg-light my-2">
                    <li>Category - {{$product->product_category_name}} </li>
                    <li>Sub Category - {{$product->product_subcategory_name}}</li>
                    <li>Available Stock - {{$product->quantity}}</li>
                </ul>
                </div>
                <div class="btn_main">
                    <form action="{{route('addproducttocart')}}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" id="" value="{{$product->id}}">
                        <input type="hidden" name="price" id="" value="{{$product->price}}">
                        <div class="form-group">
                        <label for="product_quantity">Count</label>
                        <input class="form-control" type="number" min="1" max="{{$product->quantity}}" value="1" name="count" >
                    </div>
                        <br>
                        <input type="submit" value="Add to Cart" class="btn btn-warning">
                    </form>
                   
                 </div>
                 <p><h2><a href="{{route('review',$product->id)}}">Reviews</a></h2></p>
            </div>
          
        </div>
       
    </div>
    <div class="fashion_section">
        <div id="main_slider" >
             
                 <div class="container">
                    <h1 class="fashion_taital">Related Products</h1>
                    <div class="fashion_section_2">
                       <div class="row">
                        @foreach($related_products as $related_product)
                          <div class="col-lg-4 col-sm-4">
                             <div class="box_main">
                                <h4 class="shirt_text">{{$related_product->product_name}}</h4>
                                <p class="price_text">Price  <span style="color: #262626;"> ₹ {{$related_product->price}}</span></p>
                                <div class="tshirt_img"><img src="{{asset($related_product->product_img)}}"></div>
                                <div class="btn_main">
                                   <div class="buy_bt"><a href="#">Buy Now</a></div>
                                   <div class="seemore_bt"><a href="{{route('singleproduct',[$related_product->id,$related_product->slug])}}">See More</a></div>
                                </div>
                             </div>
                          </div>
                        @endforeach
                       </div>
                    </div>
                 </div>
       
        </div>
     </div>
</div>

@endsection