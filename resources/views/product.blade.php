@extends('layouts.app')
@section('title', $item->name)

@section('css')
    <link href="{{ asset('/css/navBar.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/product.css') }}" rel="stylesheet">
@endsection

@section('content')

    <!--  Back icon  -->


    <div class="fixed-top">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="col-5 d-flex justify-content-start ">
                <a href="{{route('itemsPage', $item->category)}}">
                    <img class="shadow rounded-pill" src="../Icons/icons8-back-arrow-100 (2).png" height="50px"
                         width="50px"/>
                </a>
            </div>
        </div>
    </div>


    <!--  Item Card  -->

    <!-- Form to add this item to cart (or to the edited cart) -->
    <form id="cartForm"
          action="@if(isset(session()->get('cart')->checkout) && session()->get('cart')->checkout) {{{url('/addToEditCart/'.$item->id)}}} @else {{{url('/addToCart/'.$item->id)}}} @endif"
          method="post">
        @csrf
        <div class="container p-0 position-relative" style="height: 100vh;">
            <div class="card mx-auto p-0 h-100">
                <div class="card-body p-0 position-relative">


                    <!-- Image Section -->
                    <div class="imageSection bg-dark mb-4 ">

                        <!-- Image Badge -->
                        <div class="col-5 d-flex justify-content-end itemBadge">
                            <div class="badge badge-danger badge-pill text-white px-3 py-2 ">New</div>
                        </div>

                        <!-- Image -->
                        <img class="showImage" src="{{asset('FoodPics/'.$item->img)}}" alt="" width="100%"
                             height="100%">
                    </div>


                    <div class="row justify-content-center  align-items-center px-5">

                        <!-- Item's Name -->
                        <div class="col-12 text-center">
                            <h4 class="mealName d-inline"> {{$item->name}} </h4>
                        </div>

                        <!-- Item's Price -->
                        <div class="small d-inline price rounded-pill bg-secondary text-white px-3 py-2 mt-3">
                            {{$item->price}} SR
                        </div>
                    </div>
                    <hr class="w-50 mb-2 mb-sm-5">

                    <!-- description -->
                    <div class="desc mb-2 mb-sm-5">
                        <p class="mx-4">
                            {{$item->description}}
                        </p>
                    </div>

                    <!-- show info - Garlic, Chili and Nuts -->
                    <div class="container mb-5 ">
                        <div class="row">
                            <div
                                class="mx-auto icon-col text-center rounded-pill p-0 d-flex align-items-center justify-content-center">
                                <div data-placement="bottom" data-toggle="tooltip"
                                     class="garlic icon-col text-center rounded-pill p-0">
                                    <div class="btmBtn icon ">
                                        <img src="../Icons/icons8-garlic-100 (1).png"/>
                                    </div>
                                </div>
                                <div data-placement="bottom" data-toggle="tooltip"
                                     class="chili icon-col text-center rounded-pill p-0">
                                    <div class="btmBtn icon ">
                                        <img src="../Icons/chili.png"/>
                                    </div>
                                </div>
                                <div data-placement="bottom" data-toggle="tooltip"
                                     class="nuts icon-col text-center rounded-pill p-0">
                                    <div class="btmBtn  icon ">
                                        <img src="../Icons/icons8-almond-100 (1).png"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Add to cart & View cart button -->
                    <div class="container pt-3 cartContainer">

                        <!-- If item is already in cart: show "view your cart" button -->
                    @if((session()->has('cart') || session()->has('editCart')) && array_key_exists( $item['id'], $cart->items ))

                            <div class="cartBtn mt-3">
                                <a href="{{session()->has('editCart')? route('editCart.show') : route('cart.show')}}"
                                   class="btn btn-lg btn-block text-white"> view your cart <span
                                        class="badge badge-pill badge-light">{{$cart->totalQty}}</span></a>
                            </div>

                            <!-- If item not in cart: show "Add to your cart" button with ability to increase or reduce by one-->
                    @else
                        <!-- Quantity -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="btns">

                                        <!-- reduce by one btn -->
                                        <button type="button" class="sub btn btn-success btn-circle m-1">
                                            <span> - </span>
                                        </button>

                                        <!-- show quantity -->
                                        <button type="button" class=" btn btn-circle m-1 " id="quantity">

                                            <input type="text" name="qty"
                                                   class="rounded-pill qty w-100 border-0 px-auto text-center"
                                                   value="1"
                                                   readonly>
                                        </button>

                                        <!-- increase by one btn -->
                                        <button type="button" class="add btn btn-success btn-circle m-1">
                                            <span> + </span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Add to your Cart button -->
                            <div class="cartBtn mt-3">
                                <button type="submit" class="btn btn-lg btn-block text-white"> Add to your Cart
                                </button>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </form>






@endsection




@section('script')
    <script>

        // increase by one
        $('.add').click(function () {
            $('.qty').val(parseInt($('.qty').val()) + 1);

        });

        // reduce by one "if quantity more than 1"
        $('.sub').click(function () {
            if ($('.qty').val() > 1) {
                $('.qty').val(parseInt($('.qty').val()) - 1)
            } else {
                return false;
            }

        });

        // Toggle garlic, chili and nuts when hover or click on.

        $(' [data-toggle="tooltip"].garlic').tooltip({
            title: 'Garlic',
            html: true
        });

        $(' [data-toggle="tooltip"].chili').tooltip({
            title: 'Chili',
            html: true
        });

        $(' [data-toggle="tooltip"].nuts').tooltip({
            title: 'Nuts',
            html: true
        });

    </script>

@endsection
