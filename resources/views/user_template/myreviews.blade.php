@extends('user_template.layouts.user_profile_template')
@section('page_title')
My Reviews
@endsection
@section('profilecontent')
<h2>My Reviews</h2>
<div class="row">
    @if(session()->has('message'))
<div class="alert alert-success">
    {{session()->get('message')}}
</div>
@endif
<div class="class col-12">
    {{-- <div class="box_main"> --}}
        <table class="table">
            <tr>
                <th>S. No</th>
                <th>Product Name</th>
                <th>Review</th>
                <th>Posted Date</th>
                <th>Action</th>
            </tr>
            @foreach ($reviews as $review)
            <tr>
                @php
                $product_name=App\Models\Product::where('id',$review->product_id)
                ->value('product_name');
                @endphp
                <td>{{$loop->iteration}}</td>
                <td>{{$product_name}}</td>
                <td>{{$review->review}}</td>
                <td>{{$review->created_at}}</td>
                <td>
                    <a href="{{route('editreview',$review->id)}}" class="btn btn-sm btn-warning">Edit</a>
                    <a href="{{route('deletereview',$review->id)}}" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </table>
    {{-- </div> --}}
</div>

</div>

@endsection
