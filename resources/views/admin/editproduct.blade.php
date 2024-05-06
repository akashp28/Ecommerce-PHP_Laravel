@extends('admin.layouts.template')
@section('page_title')
Edit Product
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin/</span>Edit Product</h4>

    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Update Product Details</h5>
            <small class="text-muted float-end">Edit Information</small>
          </div>
          {{-- @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif --}}
          <div class="card-body">
            <form action="{{route('updateproduct')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="id" value="{{$productinfo->id}}">
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="product_name">Product Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control @error('product_name') is-invalid @enderror" id="product_name" name="product_name" placeholder="Iphone"  value="{{ old('product_name', $productinfo->product_name) }}"/>
                  @error('product_name')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div> 
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="price">Product Price</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="1000"  value="{{ old('price', $productinfo->price) }}"/>
                  @error('price')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div> 
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="quantity">Product Quantity</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" placeholder="1000"  value="{{ old('quantity', $productinfo->quantity) }}"/>
                  @error('quantity')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div> 
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="product_short_des">Product Short Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control @error('product_short_des') is-invalid @enderror" name="product_short_des">{{ old('product_short_des', $productinfo->product_short_des) }}</textarea>
                  @error('product_short_des')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div> 
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="product_long_des">Product Long Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control @error('product_long_des') is-invalid @enderror" name="product_long_des">{{ old('product_long_des', $productinfo->product_long_des) }}</textarea>
                    @error('product_long_des')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div> 
              </div>
              
{{-- 
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Select Category</label>
                <div class="col-sm-10">
               <select class="form-select" name="product_category_id" id="product_category_id" aria-label="Default selected example">
                <option selected disabled>Select Category</option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->category_name}}</option>
                @endforeach
               
               
               </select>
                </div> 
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Select Sub Category</label>
                <div class="col-sm-10">
               <select class="form-select" name="product_subcategory_id" id="product_subcategory_id" aria-label="Default selected example">
                <option selected disabled>Select Sub Category</option>
                @foreach ($subcategories as $subcategory)
                <option value="{{$subcategory->id}}">{{$subcategory->subcategory_name}}</option>
                @endforeach
               </select>
                </div> 
              </div> --}}

              {{-- <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Upload Product Image</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="formFile" name="product_img" />
                </div> 
            </div> --}}
              
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Update Product</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

</div>

@endsection