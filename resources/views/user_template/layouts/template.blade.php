@php
 $categories=App\Models\Category::latest()->get();   
@endphp

<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>@yield('page_title')</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content=""> 
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.min.css')}}">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/style.css')}}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{asset('home/css/responsive.css')}}">
      <!-- fevicon -->
      <link rel="icon" href="{{asset('home/images/fevicon.png')}}" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{asset('home/css/jquery.mCustomScrollbar.min.css')}}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
      <!-- font awesome -->
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--  -->
      <!-- owl stylesheets -->
      <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
      <link rel="stylesheet" href="{{asset('home/css/owl.carousel.min.css')}}">
      <link rel="stylesoeet" href="{{asset('home/css/owl.theme.default.min.css')}}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <body>
      <!-- banner bg main start -->
      <div class="banner_bg_main">
         <!-- header top section start -->
         <div class="container">
            <div class="header_section_top">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="custom_menu">
                        <ul>
                           <li><a href="{{route('topproducts')}}">Best Sellers</a></li>
                           {{-- <li><a href="#">Gift Ideas</a></li> --}}
                           <li><a href="{{route('newrelease')}}">New Releases</a></li>
                           {{-- <li><a href="{{route('todaysdeal')}}">Today's Deals</a></li> --}}
                           <li><a href="{{route('customerservice')}}">Customer Service</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- header top section start -->
         <!-- logo section start -->
         <div class="logo_section">
            <div class="container">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="logo">
                        {{-- <h1>E Buy</h1> --}}
                        <a href="{{route('home')}}"><h1 style="color: aliceblue; font-size:2rem; font-family: cursive; font-weight: bolder; ">Ebuy</h1></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- logo section end -->
         <!-- header section start -->
         <div class="header_section">
            <div class="container">
               <div class="containt_main">
                  <div id="mySidenav" class="sidenav">
                     <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                     <a href="{{route('home')}}">Home</a>
                     @foreach ($categories as $category)
                     <a href="{{route('category',[$category->id,$category->slug])}}">{{$category->category_name}}</a>
                     @endforeach
                    
                     {{-- <a href="electronic.html">Electronic</a>
                     <a href="jewellery.html">Jewellery</a> --}}
                  </div>
                  <span class="toggle_icon" onclick="openNav()"><img src="{{asset('home/images/toggle-icon.png')}}"></span>
                  <div class="dropdown">
                     <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sort By Category 
                     </button>
                     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{route('home')}}">All Products</a>
                        @foreach ($categories as $category)
                        <a class="dropdown-item" href="{{route('category',[$category->id,$category->slug])}}">{{$category->category_name}}</a>
                        @endforeach
                       
                     </div>
                  </div>
                  <div class="main">
                     <!-- Another variation with a button -->
                     <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search Products" id="searchProduct" name="query">
                        <div class="input-group-append">
                           <button class="btn btn-secondary search-btn" type="button" style="background-color: #f26522; border-color:#f26522 ">
                           <i class="fa fa-search"></i>
                           </button>
                        </div>
                     </div>
                  </div>
                  <div class="header_box">
                    
                     <div class="login_menu">
                        <ul>
                           <li><a href="{{route('addtocart')}}">
                              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                              <span class="padding_10">Cart</span></a>
                           </li>
                           <li><a href="{{route('userprofile')}}">
                              <i class="fa fa-user" aria-hidden="true"></i>
                              <span class="padding_10">My Profile</span></a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- header section end -->
         <!-- banner section start -->
         <div class="banner_section layout_padding">
            <div class="container">
               <div id="my_slider" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Get Start <br>Your Favourite Shopping</h1>
                              {{-- <div class="buynow_bt"><a href="#">Buy Now</a></div> --}}
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Get Start <br>Your Favourite Shopping</h1>
                              {{-- <div class="buynow_bt"><a href="#">Buy Now</a></div> --}}
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Get Start <br>Your Favourite Shopping</h1>
                              {{-- <div class="buynow_bt"><a href="#">Buy Now</a></div> --}}
                           </div>
                        </div>
                     </div>
                  </div>
                  {{-- <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
                  </a>
                  <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
                  <i class="fa fa-angle-right"></i>
                  </a> --}}
               </div>
            </div>
         </div>
         <!-- banner section end -->
      </div>
      <!-- banner bg main end -->
      <div class="container py" style="margin-top: 200px">
         @yield('main-content')
      </div>
    
      <!-- footer section start -->
      <div class="footer_section layout_padding">
         <div class="container">
            <div class="footer_logo"><a href="index.html"><h1 style="color: aliceblue; font-size:4rem; font-family: cursive; font-weight: bolder; ">E Buy</h1></a></div>
            <div class="input_bt">
               <input type="text" class="mail_bt" placeholder="Your Email" name="Your Email">
               <span class="subscribe_bt" id="basic-addon2"><a href="#">Subscribe</a></span>
            </div>
            <div class="footer_menu">
               <ul>
                  <li><a href="{{route('topproducts')}}">Best Sellers</a></li>
                  {{-- <li><a href="#">Gift Ideas</a></li> --}}
                  <li><a href="{{route('newrelease')}}">New Releases</a></li>
                  {{-- <li><a href="{{route('todaysdeal')}}">Today's Deals</a></li> --}}
                  <li><a href="{{route('customerservice')}}">Customer Service</a></li>
               </ul>
            </div>
            <div class="location_main">Help Line  Number : <a href="#">+1 1800 1200 1200</a></div>
         </div>
      </div>
      <!-- footer section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">© 2024 All Rights Reserved. Design by Free html  Templates</a></p>
         </div>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script> 
      <script src="{{asset('home/js/jquery.min.js')}}"></script>
      <script src="{{asset('home/js/popper.min.js')}}"></script>
      <script src="{{asset('home/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('home/js/jquery-3.0.0.min.js')}}"></script>
      <script src="{{asset('home/js/plugin.js')}}"></script>
      <!-- sidebar -->
      <script src="{{asset('home/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
      <script src="{{asset('home/js/custom.js')}}"></script> 
      <script>
         function openNav() {
           document.getElementById("mySidenav").style.width = "250px";
         }
         
         function closeNav() {
           document.getElementById("mySidenav").style.width = "0";
         }
   



$(document).ready(function() {
    function searchProducts(query) {
        $.ajax({
            url: "{{ route('search.products') }}",
            method: "GET",
            data: {query: query},
            success: function(data) {
               console.log(data);
                $('#productsRow').empty(); 
                if(data.length) {
                    $.each(data, function(index, product) {
                     var id=product.id;
                     var slug=product.slug;

                        $('#productsRow').append(`
                            <div class="col-lg-4 col-sm-4">
                                <div class="box_main">
                                    <h4 class="shirt_text">${product.product_name}</h4>
                                    <p class="price_text">Price <span style="color: #262626;">₹ ${product.price}</span></p>
                                    <div class="tshirt_img"><img src="{{asset('/${product.product_img}')}}"></div>
                                    <div class="btn_main">
                                     
                              <form action="{{route('addproducttocart')}}" method="POST">
                                 @csrf
                                 <input type="hidden" name="product_id" id="" value="${product.id}">
                                 <input type="hidden" name="price" id="" value="${product.price}">
                                 <input type="hidden" value="1" name="count" >
                                 <input type="submit" value="Buy Now" class="btn btn-warning">
                              </form>
                              <div class="seemore_bt">
                                 <a href="/product-details/${id}/${slug}">See More</a>
                        </div>
                                    </div>
                                </div>
                            </div>
                        `);
                    });
                } else {
                  
                    $('#productsRow').append('<p>No products found.</p>');
                }
            }
        });
    }

    $('#searchProduct').keyup(function() {
        let query = $(this).val();
        searchProducts(query);
    });

    $('.search-btn').click(function() {
        let query = $('#searchProduct').val();
        searchProducts(query);
    });
});

</script>    
   </body>
</html>