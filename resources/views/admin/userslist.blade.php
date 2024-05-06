@extends('admin.layouts.template')
@section('page_title')
User List
@endsection
@section('content')

 <!-- Bootstrap Table with Header - Light -->
 <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin/</span>Users</h4>
 <div class="card">
    <h5 class="card-header"></h5>
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
            <th>Name</th>
            <th>Email</th>
            <th>Number</th>
            <th>Address</th>
            <th>No. of Orders</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($users as $user)
          <tr>
            <td>{{$loop->iteration}}</td>
           <td>{{ $user->id }}</td>
           <td>{{ $user->name }}</td>
           <td>{{ $user->email }}</td>
           <td> @foreach($user->shippingInfos as $shippingInfo)
            {{ $shippingInfo->number }} <br>
        @endforeach</td>
           <td> @foreach($user->shippingInfos as $shippingInfo)
            {{ $shippingInfo->address }}, {{ $shippingInfo->district }}, {{ $shippingInfo->state }}, {{ $shippingInfo->country }}, {{ $shippingInfo->pincode }} <br>
        @endforeach</td>
        <td>{{ $user->orders_count }}</td>
           <td>
            {{-- <a href="" class="btn btn-sm btn-warning">Disable User</a> --}}
            <a href="{{route('deleteuser',$user->id)}}" class="btn btn-sm btn-danger">Remove User</a>
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