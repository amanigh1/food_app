@extends('layouts.app')
@section('title', 'Menu')

@section('css')
    <link href="{{ asset('/css/navBar.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/itemsPage.css') }}" rel="stylesheet">
@endsection

@section('content')
    <nav class="navbar fixed-top navbar-expand-lg navbar-light" style="background: #71051A;">

        <div class="container">

            <div class="col-6 backIcon">
                <a href="{{url('/')}}">
                    <img src="../Icons/icons8-back-arrow-100 (3).png" height="50px" width="50px"/>
                </a>
            </div>

            <div class="col-6 titleHeader">
                <h5> {{$category}} </h5>
            </div>
        </div>

    </nav>

    <div class="container menuItem mt-5 pt-4 ">
    @forelse($menu as $item)


        <!-- Item 1 -->
            <div class="card mb-4 position-relative">
                <div class="row">
                    <div class="col-4 d-flex align-items-center">
                        <div class="itemPic">
                            <img src="{{asset('FoodPics/'.$item->img)}}"/>
                        </div>
                    </div>
                    {{--------------------------------------------- image column-----}}
                    <div class="col-8 ">
                        <div class="container">
                            <h5 class="card-title text-center"> {{$item->name}} </h5>
                            <p class="card-text text-secondary ml-4 small item-description">
                                {{$item->description}}
                            </p>

                            {{--------------------------------------------- Description column-----}}

                            {{---- Start row Garlic/Chilli/Almond with price ----}}
                            <div class="row bottom_icons">

                                <div class="col-2 btmBtn icon ">
                                    <img src="../Icons/icons8-garlic-100 (1).png"/>
                                </div>
                                <div class="col-2 btmBtn icon ">
                                    <img src="../Icons/chili.png"/>
                                </div>
                                <div class="col-2 btmBtn icon ">
                                    <img src="../Icons/icons8-almond-100 (1).png"/>
                                </div>

                                <div class="col-6 btmBtn price">
                                    <a href="{{url('/product/'.$item->id)}}"
                                       class="btn btn-outline-success btn-block">Buy {{$item->price}} SR</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{---- End of row Garlic/Chilli/Almond with price ----}}
            </div>


        @empty


        @endforelse
    </div>

@endsection


@section('footer')
    @include('_partials._bottom_bar')
@endsection
