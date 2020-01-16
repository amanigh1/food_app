@extends('layouts.app')
@section('title', 'Cancel')

@section('css')
    <link href="{{ asset('/css/navBar.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">

@endsection

@section('content')

<!-- Back Icon-->
    <div class="container mt-3">
        <div class="col-5 backIcon">
            <a href="{{route('home')}}">
                <img class="shadow rounded-pill" src="../Icons/icons8-back-arrow-100 (2).png" height="50px"
                     width="50px"/>
            </a>
        </div>
    </div>

<!-- order canceled -->
    <div class="container mt-5 pt-sm-5 text-center">
        <h5 class="brownish">Your order has been canceled</h5>
        <h6 class="text-secondary">We hope to see you soon</h6>

        <!-- img -->
        <img class="mt-5" src="../Icons/icons8-crying-100.png" height="100px" width="100px"/>


    </div>

<!-- Logo img -->
            <div class="logo">
                <img  src="../Icons/organic-restaurant-logo-D34AC3E788-seeklogo.com.png" height="100px"
                     width="100px"/>
            </div>

@endsection

@section('footer')
    @include('_partials._bottom_bar')
@endsection

