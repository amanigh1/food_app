@extends('layouts.app')
@section('title', 'Settings')

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


    <div class="container menuItem  ">
        <div class="card mb-3 pb-0 shadow-none">
            <div class="card-body p-0 ">


                    <div class=" p-2 ">
                        <div class="row text-center">
                            <!-- img column -->

                            <div class="col-4 col-sm-3">
                                <div class="itemPic d-flex align-items-center shadow rounded-pill">
                                    <img src="{{asset('Icons/person.png')}}"/>
                                </div>
                            </div>

                            <!-- Description column -->

                            <div class="col-8 col-sm-8 text-left pr-0">

                                <h6 class="card-title">Khalid Almutairi</h6>
                                <div style="color: darkgray" class="small">0568925606</div>
                                <div style="color: darkgray" class="small">Address: Riyadh - Qurtuba - 9984</div>

                            </div>
                        </div>
                    </div>

                <hr>
                <!-- Settings btns -->
                    <div class="text-center mt-5">
                    <button class="btn brownBtn rounded-pill w-50 mx-auto mb-3">Account</button>
                    <button class="btn brownBtn rounded-pill w-50 mx-auto mb-3">Payment Method</button>
                    <button class="btn brownBtn rounded-pill w-50 mx-auto mb-3">Dates of Orders</button>
                    <button class="btn brownBtn rounded-pill w-50 mx-auto mb-3">Support</button>
                    <button class="btn brownBtn rounded-pill w-50 mx-auto mb-3">Settings</button>
                    </div>

                <!-- Sign Out btn -->
                <div class="text-center mt-5 pt-5">
                    <button class="btn ligntGray rounded-pill w-50 mx-auto mb-3">Sign Out</button>

                </div>
                </div>
        </div>
    </div>

@endsection

@section('footer')
    @include('_partials._bottom_bar')
@endsection




