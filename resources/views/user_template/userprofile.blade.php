@extends('user_template.layouts.user_profile_template')
@section('profilecontent')

<h1>Hello {{ strtoupper(auth()->user()->name) }}</h1>

<div class="row">
    <div class=" border col-lg-5 mr w">
        <a href="{{route('user.pendingorders')}}">
       <h2>{{$count_p_orders}}</h2> <br>
       <h2>Pending Orders</h2></a>
    </div>
    <div class="border  col-lg-6 mr w" >
        <a href="{{route('history')}}">
        <h2>{{$count_orders}}</h2> <br>
        <h2>Total Orders</h2></a>
    </div>
    <div class="border col-lg-5 mr w">
        <a href="{{route('addtocart')}}">
        <h2>{{ $count_cart}}</h2> <br>
        <h2>Items in Cart</h2></a>
    </div>
</div>


@endsection
