@extends('user_template.layouts.user_profile_template')
@section('profilecontent')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

      <div class="row">
        <div class="col-md-12">
         
          <div class="card mb-4">
            <h5 class="card-header">Profile Details</h5>
            <!-- Account -->
          
            <hr class="my-0" />
            <div class="card-body">
              <form action="{{route('updateprofile')}}" method="POST" >
                @csrf
                <div class="row">
                  <div class="mb-3 col-md-6">
                    <label for="firstName" class="form-label">Name</label>
                    <input
                      class="form-control @error('name') is-invalid @enderror"
                      type="text"
                      id="name"
                      name="name"
                        value="{{$user->name}}"
                    />
                     @error('name')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
                  </div>
               
                  <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">E-mail</label>
                    <input
                      class="form-control @error('email') is-invalid @enderror"
                      type="text"
                      id="email"
                      name="email"
                      value="{{$user->email}}"
                      placeholder="john.doe@example.com"
                    />
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
              
                  <div class="mb-3 col-md-6">
                    <label class="form-label" for="phoneNumber">Number</label>
                    <div class="input-group input-group-merge">
                     
                      <input
                        type="text"
                        id="number"
                        name="number"
                        class="form-control @error('number') is-invalid @enderror"
                        value="{{$address ? $address->number : '' }}"
                       
                      />
                      @error('number')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{$address ? $address->address : '' }}" placeholder="House No./Name, Street, Village/Town" />
                    @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="state" class="form-label">District</label>
                    <input class="form-control @error('district') is-invalid @enderror" type="text" id="district" name="district"  value="{{$address ? $address->district : '' }}"/>
                    @error('district')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="state" class="form-label">State</label>
                    <input class="form-control @error('state') is-invalid @enderror" type="text" id="state" name="state" value="{{$address ? $address->state : '' }}" />
                    @error('state')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="state" class="form-label">Country</label>
                    <input class="form-control @error('country') is-invalid @enderror" type="text" id="country" name="country" value="{{$address ? $address->country : '' }}" />
                    @error('country')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="mb-3 col-md-6">
                    <label for="zipCode" class="form-label">Pin Code</label>
                    <input
                      type="text"
                      class="form-control @error('pincode') is-invalid @enderror"
                      id="pincode"
                      name="pincode"
                      value="{{$address ? $address->pincode : '' }}"
                      maxlength="6"
                    />
                    @error('pincode')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                
                </div>
                <div class="mt-2">
                  <button type="submit" class="btn btn-primary me-2">Save changes</button>
                  <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                </div>
              </form>
            </div>
            <!-- /Account -->
          </div>
         
        </div>
      </div>
    </div>
    <!-- / Content -->
</div>
@endsection
