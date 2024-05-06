@extends('user_template.layouts.user_profile_template')
@section('page_title')
Edit Review
@endsection
@section('profilecontent')
<h2>Edit Review</h2>
<div class="row">
    @if(session()->has('message'))
<div class="alert alert-success">
    {{session()->get('message')}}
</div>
@endif
@php
$product_name=App\Models\Product::where('id',$reviews->product_id)
->value('product_name');
@endphp
<div class="class col-12">
    {{-- <div class="box_main"> --}}
        <form action="{{route('updatereview')}}" method="POST">
            @csrf
            <input type="hidden" name="review_id" id="" value="{{$reviews->id}}">
              <div class="row mb-3">
              <label class="col-sm-2 col-form-label" for="basic-default-name" >Product Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="product_name" name="product_name" readonly value="{{$product_name}}" />
              </div> 
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name" >Product Review</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="review" name="review" value="{{$reviews->review}}" />
                </div> 
              </div>
            
            <div class="row justify-content-end">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-info btn-sm">Update Review</button>
              </div>
            </div>
          </form>
    {{-- </div> --}}
</div>

</div>

@endsection
