@extends('admin.layouts.template')
@section('page_title')
All Sub Category
@endsection
@section('content')

 <!-- Bootstrap Table with Header - Light -->
 <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin/</span>All Sub Category</h4>
 <div class="card">
    <h5 class="card-header">Sub Category Information</h5>
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
            <th>Sub Category Name</th>
            <th>Category</th>
            <th>Product</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($subcategories as $subcategory)
              
          
          <tr>
            <td>{{$loop->iteration}}</td>
           <td>{{$subcategory->id}}</td>
           <td>{{$subcategory->subcategory_name}}</td>
           <td>{{$subcategory->category_name}}</td>
           <td>{{$subcategory->product_count}}</td>
           <td>
            <a href="{{route('editsubcategory',$subcategory->id)}}" class="btn btn-sm btn-info">Edit</a>
            <a href="{{route('deletesubcategory',$subcategory->id)}}" class="btn btn-sm btn-danger">Delete</a>
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