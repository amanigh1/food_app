@extends('layouts.app')
@section('title', 'Cart')

@section('css')
    <link href="{{ asset('/css/navBar.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">

@endsection

@section('content')

    <!-- Back Icon -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light shadow-none" style="background-color: transparent">
        <div class="container">
            <div class="col-5 backIcon">
                <a href="{{route('home')}}">
                    <img src="../Icons/icons8-back-arrow-100 (2).png" height="50px" width="50px"/>
                </a>
            </div>
        </div>
    </nav>


    <div class="container menuItem my-5 py-4 ">
        @if($cart)
        <div class="card mb-3 pb-0">
            <div class="card-body p-0 ">
            @foreach($cart->items as $item)


                <!-- Item -->
                    <div class=" p-2 mb-2 mb-sm-4">
                        <div class="row text-center">

                            <!-- image column -->
                            <div class="col-4 col-sm-3">
                                <div class="itemPicCart d-flex align-items-center">
                                    <img src="{{asset('FoodPics/'.$item['img'])}}"/>
                                </div>
                            </div>

                        <!-- Description column -->
                            <div class="col-8 col-sm-8 text-center pr-0">

                                <!-- Item's name -->
                                <h6 class="card-title pricing-card-title text-left">{{$item['name']}}</h6>

                                <!-- Item's quantity section -->
                                <div class="align-self-end" style="margin-top: auto;">
                                    <div class="row d-flex align-content-between justify-content-sm-between">
                                        <div class="d-inline col-6 col-sm-4 text-left pr-0">
                                            <!-- reduce by one btn -->
                                            <a href="{{route('product.reduceByOne',$item['id'] )}}" class="sub badge badge-pill func-btn text-white">
                                                <span> - </span>
                                            </a>

                                            <!-- Item's quantity -->
                                            <button type="button" class=" badge badge-pill btn-circle m-1 " id="quantity">
                                                <input type="text" name="qty" class="qty w-100 border-0 px-auto text-center" value="{{$item['qty']}}" readonly>
                                            </button>

                                            <!-- increase by one btn -->
                                            <a href="{{route('product.increaseByOne',$item['id'] )}}" class="add badge badge-pill func-btn text-white">
                                                <span> + </span>
                                            </a>
                                        </div>

                                        <!-- Item's price -->
                                        <div class="col-3 col-sm-4 btmBtn  d-inline m-0 pb-sm-4">
                                        <span class="badge-pill price-btn cart-price px-md-3 py-2">{{$item['price']}} SR</span>
                                        </div>

                                        <!-- Delete btn -->
                                        <div class="col-1 btmBtn  d-inline m-0 pb-sm-4 ml-1">
                                            <form onsubmit="return confirm('Do you really want to delete {{$item['name']}}?')" action="{{route('product.remove', $item['id'])}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn cart-price rounded-pill btn-danger mr-auto">x</button>
                                            </form>
                                        </div>
                                    </div>


                                </div>

                            </div>

                        </div>


                    </div>

                @endforeach

            </div>
        </div>

            <!-- Payment -->
        <div class="card mb-2">
            <div class="row">
                <img class="mr-2" src="{{asset('Icons/icons8-wallet-100.png')}}" width="25" height="25">
                <span>Payment Options:</span>
                <img class="ml-auto mr-4" src="{{asset('Icons/icons8-visa-100.png')}}" width="25" height="25">
            </div>
        </div>

            <!-- Coupon -->
        <div class="card mb-2">
            <div class="row d-flex align-items-center coupon">
                <img class="mr-2" src="{{asset('Icons/icons8-coupon-150.png')}}" width="25" height="25">
                <label class="m-0" for="coupon">Apply Coupon:</label>
                <input type="text" name="coupon" id="coupon" class="rounded-pill form-control w-50  py-0 mx-auto">
            </div>
        </div>

            <!-- Shipping -->
        <div class="card mb-2">
            <div class="row d-flex align-items-center ">
                <img class="mr-2" src="{{asset('Icons/icons8-address-100.png')}}" width="25" height="25">
                <span>Shipping Address:</span>
            </div>
            <!-- Google map -->
            <div class="row d-flex align-items-center justify-content-center mt-3">
                <div class="col-6">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3622.9184619284356!2d46.75990301563621!3d24.763984655214887!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f011e725249d5%3A0xb9458720b6aa899c!2sKhalid%20Ibn%20Al%20Walid%20St%2C%20Riyadh!5e0!3m2!1sen!2ssa!4v1579101473963!5m2!1sen!2ssa" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>

                <!-- location description -->
                <div class="col-6 small">
                   <div>Riyadh</div>
                   <div>Qurtuba</div>
                   <div>Khaled Ibn Al Walid St</div>
                     </div>
            </div>
        </div>

            <!-- Estimated delivery -->
        <div class="card mb-2 ">
            <div class="row d-flex align-items-center ">
                <img class="mr-2" src="{{asset('Icons/icons8-clock-64.png')}}" width="25" height="25">
                <span>Estimated Delivery:</span>
                <span class="mx-auto brownish">43 minutes</span>
            </div>
        </div>

            <!-- cart's details -->
        <div class="card mb-4">
            <div class="row d-flex align-items-center mb-2">
                <img class="mr-2" src="{{asset('Icons/icons8-cash-100.png')}}" width="25" height="25">
                <span>Cart Totals:</span>
            </div>

            <table class=" ml-3 table table-sm table-borderless text-secondary">
                <tr>
                    <td>Subtotal</td>
                    <td>{{$cart->totalPrice}} SR</td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>14 SR</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>{{$cart->totalPrice*5/100}} SR</td>
                </tr>
                <tr class="brownish">
                    <td>Total</td>
                    <td>{{$cart->totalPrice + 14 + ($cart->totalPrice*5/100) }}</td>
                </tr>
            </table>
        </div>

            <!-- Checkout btn -->
        <a href="{{route('orderReceived')}}" class="btn btn-block rounded-pill w-50 mx-auto btn-danger text-white">Checkout</a>

     @else
        <p>Your cart is empty!</p>
     @endif
    </div>

@endsection


