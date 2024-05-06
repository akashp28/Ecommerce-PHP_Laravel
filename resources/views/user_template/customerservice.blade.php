@extends('user_template.layouts.template')
@section('page_title')
Customer Service
@endsection

@section('main-content')



{{-- <div class="container"> --}}
   
        {{-- <div class="row"> --}}
          <div class="col-xxl ">
           
            <h1>Customer Service</h1>
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{session()->get('message')}}
            </div>
            @endif
            <div class="container">
            
            <div class="card mb-12">
              <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Enter Your Details</h5>
               
              </div>
              <div class="card-body">
                
                <form action="{{route('contact')}}" method="POST">
                    @csrf
                  
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control @error('name') is-invalid @enderror" id="basic-default-name" placeholder="John Doe" name="name" />
                      @error('name')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-email" name="email">Email</label>
                    <div class="col-sm-10">
                      <div class="input-group input-group-merge">
                        <input
                          type="text"
                          id="basic-default-email"
                          class="form-control @error('email') is-invalid @enderror"
                          placeholder="john.doe"
                          aria-label="john.doe"
                          aria-describedby="basic-default-email2" name="email"
                        />
                        <span class="input-group-text" id="basic-default-email2">@example.com</span>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-phone">Mobile No.</label>
                    <div class="col-sm-10">
                      <input
                        type="text"
                        id="basic-default-phone"
                        class="form-control phone-mask @error('number') is-invalid @enderror"
                        placeholder="658 799 8941"
                        aria-label="658 799 8941"
                        aria-describedby="basic-default-phone" name="number"
                      />
                      @error('number')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="basic-default-message">Message</label>
                    <div class="col-sm-10">
                      <textarea
                        id="basic-default-message"
                        class="form-control @error('message') is-invalid @enderror"
                        placeholder="Hi, Do you have a moment to talk Joe?"
                        aria-label="Hi, Do you have a moment to talk Joe?"
                        aria-describedby="basic-icon-default-message2" name="message"
                      ></textarea>
                      @error('message')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="row justify-content-end">
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-warning ">Send Message</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
</div>

@endsection