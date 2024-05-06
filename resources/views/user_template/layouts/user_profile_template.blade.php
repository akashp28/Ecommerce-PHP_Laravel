@extends('user_template.layouts.template')
@section('page_title')
User Profile
@endsection
@section('main-content')

<div class="container">
    <div class="row">
        <div class="col-lg-3 mt-3">
            <div class="box_main border" >
               
                   <p><a href="{{route('userprofile')}}">Dashboard</a></p> 
                   <p><a href="{{route('editprofile')}}">Edit Profile</a></p> 
                    <p><a href="{{route('user.pendingorders')}}">Pending Orders</a></p> 
                    <p><a href="{{route('history')}}">History</a></p> 
                    <p><a href="{{route('reviews')}}">My Reviews</a></p> 
                    <p><a href="{{route('changepassword')}}">Change Password</a></p> 
                    <p><a href="{{route('userlogout')}}">Logout</a></p> 
            </div>
        </div>
        <div class="col-lg-9 mt-3">
            <div class="box_main border">
                @yield('profilecontent')
            </div>
        </div>
    </div>
</div>

@endsection