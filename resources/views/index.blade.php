@extends('layouts.app')
@section('title', 'Home')

@section('css')
    <link href="{{ asset('/css/navBar.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/mainPage.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        @include('_partials._logo_bar')
    </div>
    <div class="container mt-5 pt-5 mb-5 pb-5">
        <h3 class="text-center">International Kitchens</h3>
        <hr class="w-25">
        <div class="row">
            @forelse($categories as $category)
                <div class=" col-sm-12 col-md-6 col-lg-4 p-2">
                    <div class="card  category_img" style="background-image: url({{url('FoodPics/Header/'.$category->card_img)}})">
                        <a href="{{url('itemsPage/'.$category->id)}}">
                            <div class="card-img-overlay">

                                    @if(!empty($category->title_img))
                                    <div class="category_title_w_img">
                                    <div style="background-image: url({{asset('flags/'.$category->title_img)}})" class="flag"></div>
                                        <div class="category_name">{{$category->description}}</div>
                                    </div>

                                    @else
                                    <div class="category_title_no_img">
                                        <div class="category_name">{{$category->description}}</div>
                                    </div>
                                    @endif




                            </div>
                        </a>
                    </div>
                </div>
            @empty
                <p>empty!</p>
            @endforelse
        </div>
    </div>

    {{--    <!-- Kitchens -->--}}

    {{--    <div class="container mt-5 pt-5">--}}

    {{--        <div class="row">--}}

    {{--            <!-- Kitchen 1 -->--}}
    {{--            <div class="col-sm-12 col-md-6 col-lg-3 p-2">--}}
    {{--                <a href="{{url('itemsPage')}}">--}}
    {{--                    <img  src="../Food Pics/dan-gold-4_jhDO54BYg-unsplash.jpg" class="card-img">--}}
    {{--                    <div class="card-img-overlay">--}}
    {{--                        <span class="badge badge-pill badge-danger"> New </span>--}}
    {{--                    </div>--}}
    {{--                </a>--}}
    {{--            </div>--}}

    {{--            <!-- Kitchen 2 -->--}}
    {{--            <div class="col-sm-12 col-md-6 col-lg-3 p-2">--}}
    {{--                <a href="{{url('itemsPage')}}">--}}
    {{--                <img  src="../Food Pics/dan-gold-4_jhDO54BYg-unsplash.jpg" class="card-img">--}}
    {{--                    <div class="card-img-overlay">--}}
    {{--                        <span class="badge badge-pill badge-danger"> New </span>--}}
    {{--                    </div>--}}
    {{--                </a>--}}
    {{--            </div>--}}

    {{--            <!-- Kitchen 3 -->--}}
    {{--            <div class="col-sm-12 col-md-6 col-lg-3 p-2">--}}
    {{--                <a href="{{url('itemsPage')}}">--}}
    {{--                    <img  src="../Food Pics/dan-gold-4_jhDO54BYg-unsplash.jpg" class="card-img">--}}
    {{--                    <div class="card-img-overlay">--}}
    {{--                        <span class="badge badge-pill badge-danger"> New </span>--}}
    {{--                    </div>--}}
    {{--                </a>--}}
    {{--            </div>--}}

    {{--            <!-- Kitchen 4 -->--}}
    {{--            <div class="col-sm-12 col-md-6 col-lg-3 p-2">--}}
    {{--                <a href="{{url('itemsPage')}}">--}}
    {{--                    <img  src="../Food Pics/dan-gold-4_jhDO54BYg-unsplash.jpg" class="card-img">--}}
    {{--                    <div class="card-img-overlay">--}}
    {{--                        <span class="badge badge-pill badge-danger"> New </span>--}}
    {{--                    </div>--}}
    {{--                </a>--}}
    {{--            </div>--}}

    {{--            <!-- Kitchen 5 -->--}}
    {{--            <div class="col-sm-12 col-md-6 col-lg-3 p-2">--}}
    {{--                <a href="{{url('itemsPage')}}">--}}
    {{--                    <img  src="../Food Pics/dan-gold-4_jhDO54BYg-unsplash.jpg" class="card-img">--}}
    {{--                    <div class="card-img-overlay">--}}
    {{--                        <span class="badge badge-pill badge-danger"> New </span>--}}
    {{--                    </div>--}}
    {{--                </a>--}}
    {{--            </div>--}}

    {{--            <!-- Kitchen 6 -->--}}
    {{--            <div class="col-sm-12 col-md-6 col-lg-3 p-2">--}}
    {{--                <a href="{{url('itemsPage')}}">--}}
    {{--                    <img  src="../Food Pics/dan-gold-4_jhDO54BYg-unsplash.jpg" class="card-img">--}}
    {{--                    <div class="card-img-overlay">--}}
    {{--                        <span class="badge badge-pill badge-danger"> New </span>--}}
    {{--                    </div>--}}
    {{--                </a>--}}
    {{--            </div>--}}

    {{--            <!-- Kitchen 7 -->--}}
    {{--            <div class="col-sm-12 col-md-6 col-lg-3 p-2">--}}
    {{--                <a href="{{url('itemsPage')}}">--}}
    {{--                    <img  src="../Food Pics/dan-gold-4_jhDO54BYg-unsplash.jpg" class="card-img">--}}
    {{--                    <div class="card-img-overlay">--}}
    {{--                        <span class="badge badge-pill badge-danger"> New </span>--}}
    {{--                    </div>--}}
    {{--                </a>--}}
    {{--            </div>--}}

    {{--            <!-- Kitchen 8 -->--}}
    {{--            <div class="col-sm-12 col-md-6 col-lg-3 p-2">--}}
    {{--                <a href="{{url('itemsPage')}}">--}}
    {{--                    <img  src="../Food Pics/dan-gold-4_jhDO54BYg-unsplash.jpg" class="card-img">--}}
    {{--                    <div class="card-img-overlay">--}}
    {{--                        <span class="badge badge-pill badge-danger"> New </span>--}}
    {{--                    </div>--}}
    {{--                </a>--}}
    {{--            </div>--}}

    {{--            <!-- Kitchen 9 -->--}}
    {{--            <div class="col-sm-12 col-md-6 col-lg-3 p-2">--}}
    {{--                <a href="{{url('itemsPage')}}">--}}
    {{--                    <img  src="../Food Pics/dan-gold-4_jhDO54BYg-unsplash.jpg" class="card-img">--}}
    {{--                    <div class="card-img-overlay">--}}
    {{--                        <span class="badge badge-pill badge-danger"> New </span>--}}
    {{--                    </div>--}}
    {{--                </a>--}}
    {{--            </div>--}}

    {{--        </div>--}}
    {{--    </div>--}}


@endsection


@section('footer')
    @include('_partials._bottom_bar')
@endsection
