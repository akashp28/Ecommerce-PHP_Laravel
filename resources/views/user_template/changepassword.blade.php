@extends('user_template.layouts.user_profile_template')
@section('page_title')
Change Password
@endsection
@section('profilecontent')


<div class="col-lg-6">
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{session()->get('message')}}
    </div> 
@endif
<div class="card-body">
    <h2>Change Password</h2>
    <form action="{{route('updatepassword')}}" method="POST" >
      @csrf
      <div class="row">
        <div class="mb-3 col-md-12">
          <label for="currentpassword" class="form-label">Enter Current Password</label>
          <input
            class="form-control @error('currentpassword') is-invalid @enderror"
            type="password"
            id="currentpassword"
            name="currentpassword"
             
          />
           @error('currentpassword')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
        </div>
        <div class="mb-3 col-md-12">
            <label for="newpassword" class="form-label">Enter New Password</label>
            <input
              class="form-control @error('newpassword') is-invalid @enderror"
              type="password"
              id="newpassword"
              name="newpassword"
               
            />
             @error('newpassword')
  <div class="invalid-feedback">{{ $message }}</div>
  @enderror
          </div>
          <div class="mb-3 col-md-12">
            <label for="confirmpassword" class="form-label">Confirm Password</label>
            <input
              class="form-control @error('confirmpassword') is-invalid @enderror"
              type="password"
              id="confirmpassword"
              name="confirmpassword"
               
            />
             @error('name')
  <div class="invalid-feedback">{{ $message }}</div>
  @enderror
          </div>
    </div>
    <input type="submit" value="Change Password" class="btn btn-danger ">
</form>
</div>
</div>



@endsection