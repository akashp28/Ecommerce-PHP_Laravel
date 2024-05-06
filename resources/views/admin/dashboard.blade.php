@extends('admin.layouts.template')
@section('page_title')
Admin Dashboard
@endsection

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin/</span>Dashboard</h4>

    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
           <h3>Hello Admin..! Welcome Back</h3>
          </div>
          <div class="card-body">
           
<div class="row">
   
    <div class="border col-lg-4 mr w" >
        <a href="{{route('pendingorders')}}">
       <h2>{{$pendingorders}}</h2> <br>
       <h2>Pending Orders</h2></a>
    </div>
    <div class="border col-lg-4 mr w" >
        <a href="{{route('completedorders')}}">
        <h2>{{$completedorders}}</h2> <br>
        <h2>Completed Orders</h2></a>
    </div>
    <div class="border col-lg-4 mr w">
        <a href="{{route('userslist')}}">
        <h2>{{$users}}</h2> <br></a>
        <h2>Users</h2>
    </div>
    <div class="border col-lg-4 mr w">
        <a href="{{route('messages')}}">
        <h2>{{$messages}}</h2> <br>
        <h2>User Messages</h2></a>
    </div>
    <div class="border col-lg-4 mr w">
        <a href="{{route('allproducts')}}">
        <h2>{{$products}}</h2> <br>
        <h2>Products</h2></a>
    </div>
</div>
</div>
</div>
</div>
</div>

@endsection