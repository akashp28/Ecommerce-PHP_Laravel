@extends('user_template.layouts.template')
@section('page_title')
Confirm Address
@endsection

@section('main-content')


<div class="container">
<div class="row">
    
    <div class="col-12">
        <h2 class="mt-3">Confirm your Shipping Address</h2>
        <div class="box_main border">
            <form action="{{route('saveaddress')}}" method="POST">
                @csrf
               
                <div class="form-group">
                    <label for="number">Contact Number</label>
                    <input type="text" class="form-control  @error('number') is-invalid @enderror" name="number" id="" value="{{$address ? $address->number : '' }}">
                    @error('number')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control  @error('address') is-invalid @enderror" name="address" id="" placeholder="House Name/No. ,Street,Village/Panchayath/City" value="{{$address ? $address->address : '' }}">
                    @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="district">District</label>
                    <input type="text" class="form-control  @error('district') is-invalid @enderror" name="district" id="" value="{{$address ? $address->district : '' }}">
                    @error('district')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="state">State</label>
                    <input type="text" class="form-control  @error('state') is-invalid @enderror" name="state" id="" value="{{$address ? $address->state : '' }}">
                    @error('state')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" class="form-control  @error('country') is-invalid @enderror" name="country" id="" value="{{$address ? $address->country : '' }}">
                    @error('country')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pincode">Pincode</label>
                    <input type="text" class="form-control  @error('pincode') is-invalid @enderror" name="pincode" id="" value="{{$address ? $address->pincode : '' }}">
                    @error('pincode')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
              
                <input type="submit" value="Confirm Address" class="btn btn-warning">
            </form>
        </div>
    </div>
</div>
</div>
@endsection