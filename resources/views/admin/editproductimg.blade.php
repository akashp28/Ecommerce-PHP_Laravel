@extends('admin.layouts.template')
@section('page_title')
Edit Product Image
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin/</span>Edit Product Image</h4>

    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Upload New Product Image</h5>
            <small class="text-muted float-end">Add Information</small>
          </div>
          <div class="card-body">
            <form action="{{route('updateproductimg')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="id" value="{{$productinfo->id}}">
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="product_name" name="product_name" value="{{$productinfo->product_name}}" disabled />
                </div> 
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Previous Image</label>
                <div class="col-sm-10">
                  <img src="{{asset($productinfo->product_img)}}" style="height: 300px" alt="">
                </div> 
              </div>
              
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Upload New Product Image</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="formFile" name="product_img" />
                </div> 
            </div>
              
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Update Product Image</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

</div>

@endsection