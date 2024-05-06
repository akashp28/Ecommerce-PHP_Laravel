@extends('admin.layouts.template')
@section('page_title')
Messages
@endsection
@section('content')

 <!-- Bootstrap Table with Header - Light -->
 <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin/</span>Customer Messages</h4>
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
            <th>Message</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($messages as $message)
          <tr>
            <td>{{$loop->iteration}}</td>
           <td>{{$message->id}}</td>
           <td>{{$message->name}}</td>
           <td>{{$message->email}}</td>
           <td>{{$message->number}}</td>
           <td>{{$message->message}}</td>
           <td>{{$message->status}}</td>
           
<td>
    @if($message->status != 'Replied')
        <a href="{{ route('replymessage', $message->id) }}" class="btn btn-sm btn-success">Reply</a>
    @endif
    <a href="{{ route('deletemessage', $message->id) }}" class="btn btn-sm btn-danger">Delete</a>
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