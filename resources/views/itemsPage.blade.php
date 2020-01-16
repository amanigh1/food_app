@extends('layouts.app')
@section('title', 'Menu')

@section('css')
    <link href="{{ asset('/css/navBar.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
@endsection

@section('content')

    <!--  Top nav  -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light" style="background: #7b4920;">
        <div class="container">

            <!--  Back icon  -->
            <div class="col-5 backIcon">
                <a href="{{route('home')}}">
                    <img src="../Icons/icons8-back-arrow-100 (3).png" height="50px" width="50px"/>
                </a>
            </div>

            <!--  Category name  -->
            <div class="col-7 titleHeader">
                <h5> {{$category}} </h5>
            </div>
        </div>

    </nav>


    <div class="container menuItem my-5 py-4 ">

    @forelse($menu as $item)


        <!--  item card  -->
            <div class="card p-2 mb-4 position-relative">
                <div class="row">

                    <!-- image column -->
                    <div class="col-6 col-sm-4">
                        <div class="itemPicMenu d-flex align-items-center position-relative">

                            <!--  Badge  -->
                            <div class="badge badge-pill badge-danger itemBadge">New</div>

                            <!--  img  -->
                            <img src="{{asset('FoodPics/'.$item->img)}}"/>
                        </div>
                    </div>


                    <!-- Description column -->
                    <div class="col-6 col-sm-7 text-center p-0" onclick="location.href='{{route("productPage",$item->id)}}';" style="cursor: pointer;">
                        <div class="card-body ">

                            <!--  item's name  -->
                            <h6 class="card-title pricing-card-title">{{$item->name}}</h6>

                            <!--  item's description  -->
                                    <p class="card-text text-secondary small item-description">
                                        {{$item->description}}
                                    </p>


                            <div  class="align-self-end" style="margin-top: auto;">
                                <div class="row">
                                    <!--  Garlic, Chili and Nuts  -->
                                        <div data-placement="bottom" data-toggle="tooltip"
                                             class="mobile-btn d-inline mr-2 mr-sm-auto icon-col col-6 text-center rounded-pill d-flex justify-content-center align-items-center p-0">
                                            <div class="col-2 btmBtn icon ">
                                                <img src="../Icons/icons8-garlic-100 copy.png"/>
                                            </div>
                                            <div class="col-2 btmBtn icon ">
                                                <img src="../Icons/icons8-chili-pepper-100 copy.png"/>
                                            </div>
                                            <div class="col-2 btmBtn icon ">
                                                <img src="../Icons/icons8-almond-100 copy.png"/>
                                            </div>
                                        </div>

                                    <!--  item's price  -->
                                        <div class="col-4 btmBtn price d-inline m-0">
                                            <button
                                               class="mobile-btn btn btn-block price-btn rounded-pill text-white">{{$item->price}} SR</button>
                                        </div>
                                </div>
                                </div>

                        </div>
                    </div>
                </div>

            </div>


        @empty
            <p>There are no items yet!</p>

        @endforelse
    </div>

@endsection

@section('footer')
    @if(isset(session()->get('cart')->checkout) && session()->get('cart')->checkout)
        @include('_partials._editOrder_bar')
    @else
        @include('_partials._viewOrder_bar')
    @endif
    @include('_partials._bottom_bar')
@endsection

@section('script')
    <script>

        // Garlic, Chili and Nuts Toggle when hover or click on.
            $('[data-toggle="tooltip"]').tooltip({
                title: '<img class="small-icon m-2 ml-auto" src="../Icons/icons8-almond-100 copy.png"/><span class="mr-auto">Nuts</span> <br/>' +
                    '<img class="small-icon m-2 ml-auto" src="../Icons/icons8-chili-pepper-100 copy.png"/><span class="mr-auto">Chili</span> <br/>' +
                    '<img class="small-icon m-2 ml-auto" src="../Icons/icons8-garlic-100 copy.png"/><span class="mr-auto">Garlic</span>',
                html: true
            });


    </script>
@endsection





