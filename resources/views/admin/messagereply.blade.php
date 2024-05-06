@extends('admin.layouts.template')
@section('page_title')
Message Reply
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin/</span>Message Reply</h4>

    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Enter Message</h5>
            <small class="text-muted float-end">Edit Information</small>
          </div>
          @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
          <div class="card-body">
            <form action="{{route('sendreply',$message->id)}}" method="POST">
              @csrf
              <input type="hidden" name="id" value="{{$message->id}}">

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="product_name">User Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="user_name" name="name" readonly value="{{$message->name}}"/>
              </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="product_name">User Email</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="user_email" name="user_email" readonly value="{{$message->email}}"/>
              </div>
            </div>
            
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="product_long_des">User Message</label>
                <div class="col-sm-10">
                    <textarea readonly class="form-control" name="usermessage">{{$message->message}}</textarea>
                </div> 
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="messgae_reply">Reply Message</label>
                <div class="col-sm-10">
                    <textarea class="form-control @error('message') is-invalid @enderror" name="replymessage"></textarea>
                    @error('message')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div> 
              </div>
              
              
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-success">Send Mail</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

</div>

@endsection