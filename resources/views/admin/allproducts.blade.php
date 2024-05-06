@extends('admin.layouts.template')
@section('page_title')
All Products
@endsection
@section('content')

 <!-- Bootstrap Table with Header - Light -->
 <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin/</span>All Products</h4>
 <div class="card">
    <h5 class="card-header">Product Information</h5>
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
            <th>Id</th>
            <th>Product Name</th>
            <th>Image</th>
            <th></th>
            <th>Price</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($products as $product)
          <tr>
            <td>{{$loop->iteration}}</td>
           <td>{{$product->id}}</td>
           <td>{{$product->product_name}}</td>
           <td>
            <img style="height:50px" src="{{asset($product->product_img)}}" alt=""> </td>
            <td><a href="{{route('editproductimage',$product->id)}}" style="" class="btn btn-info btn-sm">Edit</a>
           </td>
           <td>₹ {{$product->price}}</td>
           <td>
            <a href="{{route('editproduct',$product->id)}}" class="btn btn-sm btn-info">Edit</a>
            <a href="{{route('deleteproduct',$product->id)}}" class="btn btn-sm btn-danger">Delete</a>
        </td>
          </tr>
          @endforeach   
        </tbody>
      </table>
    </div>
  </div>
</div>

  <!-- Bootstrap Table with Header - Light -->


@endsection