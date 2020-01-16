@extends('layouts.app')
@section('title', 'Order Received')

@section('css')
    <link href="{{ asset('/css/navBar.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">

@endsection

@section('content')

    <!-- Back Icon -->
    <div class="container mt-3">
        <div class="col-5 backIcon">
            <a href="{{route('home')}}">
                <img class="shadow rounded-pill" src="../Icons/icons8-back-arrow-100 (2).png" height="50px"
                     width="50px"/>
            </a>
        </div>
    </div>


    <div class="container mt-5 pt-sm-5 text-center">
        <!-- order info -->
        <h5 class="brownish">Your order #5890 has been successfully received</h5>
        <h6 class="brownish">Order is being processed</h6>

        <!-- img -->
        <img src="../Icons/icons8-cooking-pot-500.png" height="200px" width="200px"/>

        <!-- Estimated delivery -->
        <h5 class="mt-sm-5 mt-2 pt-sm-5 text-secondary">Estimated delivery time</h5>
        <h5 class="mt-2 text-danger">10:33 pm</h5>

        <!-- Review Order btn -->
        <div class="text-left orderBtn">
            <a href="{{route('reviewOrder')}}" class="p-0 mt-5 btn btn-sm mr-auto border-bottom">Review Order</a>

        </div>

    </div>
@endsection

@section('footer')
    @include('_partials._bottom_bar')
@endsection
