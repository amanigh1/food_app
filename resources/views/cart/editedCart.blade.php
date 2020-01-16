@extends('layouts.app')
@section('title', 'Edit Cart')

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
        <!-- if there are items in cart -> show items | if cart is empty -> show message -->
        @if($editCart)
            @if(count($editCart->items) <= 0)
                <div class="my-3 text-center">There are no items in you cart.</div>

            @else

                <div class="card mb-3 pb-0">
                <div class="card-body p-0 ">
                @foreach($editCart->items as $item)


                    <!-- row for each item -->
                        <div class=" p-2 mb-2 mb-sm-4">
                            <div class="row text-center">

                                <!-- img column -->
                                <div class="col-4 col-sm-3">
                                    <div class="itemPicCart d-flex align-items-center">
                                        <img src="{{asset('FoodPics/'.$item['img'])}}"/>
                                    </div>
                                </div>


                            <!-- Description column -->
                                <div class="col-8 col-sm-8 text-center pr-0">

                                    <h6 class="card-title pricing-card-title text-left">{{$item['name']}}</h6>

                                    <div class="align-self-end" style="margin-top: auto;">
                                        <div class="row d-flex align-content-between justify-content-sm-between">

                                            <!-- Quantity controllers -->
                                            <div class="d-inline col-6 col-sm-4 text-left pr-0">

                                                <!-- reduce qty by one -->
                                                <a href="{{route('EditProduct.reduceByOne',$item['id'] )}}"
                                                   class="sub badge badge-pill func-btn text-white">
                                                    <span> - </span>
                                                </a>

                                                <!-- item's quantity -->
                                                <button type="button" class=" badge badge-pill btn-circle m-1 "
                                                        id="quantity">

                                                    <input type="text" name="qty"
                                                           class="qty w-100 border-0 px-auto text-center"
                                                           value="{{$item['qty']}}" readonly>

                                                </button>

                                                <!-- increase qty by one -->
                                                <a href="{{route('EditProduct.increaseByOne',$item['id'] )}}"
                                                   class="add badge badge-pill func-btn text-white">
                                                    <span> + </span>
                                                </a>
                                            </div>

                                            <!-- item's price -->
                                            <div class="col-3 col-sm-4 btmBtn  d-inline m-0 pb-sm-4">
                                                <span class="badge-pill price-btn cart-price px-md-3 py-2">{{$item['price']}} SR</span>
                                            </div>

                                            <!-- Delete btn -->
                                            <div class="col-1 btmBtn  d-inline m-0 pb-sm-4 ml-1">
                                                <form
                                                    onsubmit="return confirm('Do you really want to delete {{$item['name']}}?')"
                                                    action="{{route('EditProduct.remove', $item['id'])}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"
                                                            class="btn cart-price rounded-pill btn-danger mr-auto">x
                                                    </button>
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
        @endif


            <!-- Payment -->
            <div class="card mb-2 payment">
                <div class="row">
                    <img class="mr-2" src="{{asset('Icons/icons8-wallet-100.png')}}" width="25" height="25">
                    <span>Payment Options:</span>
                    <img class="ml-auto mr-4" src="{{asset('Icons/icons8-visa-100.png')}}" width="25" height="25">
                </div>
            </div>

                <!-- Coupon -->
            <div class="card mb-2 payment">
                <div class="row d-flex align-items-center coupon">
                    <img class="mr-2" src="{{asset('Icons/icons8-coupon-150.png')}}" width="25" height="25">
                    <label class="m-0" for="coupon">Apply Coupon:</label>
                    <input type="text" name="coupon" id="coupon" class="rounded-pill form-control w-50  py-0 mx-auto">
                </div>
            </div>

                <!-- Estimated Delivery -->
            <div class="card mb-2 payment">
                <div class="row d-flex align-items-center ">
                    <img class="mr-2" src="{{asset('Icons/icons8-clock-64.png')}}" width="25" height="25">
                    <span>Estimated Delivery:</span>
                    <span class="mx-auto brownish">43 minutes</span>
                </div>
            </div>

                <!-- cart's details -->
            <div class="card mb-4 invoice">
                <div class="row d-flex align-items-center mb-2">
                    <img class="mr-2" src="{{asset('Icons/icons8-cash-100.png')}}" width="25" height="25">
                    <span>Cart Totals:</span>
                </div>
                <div class="row mr-3 ml-2 ">
                <table class=" col-12 ml-3 pr-5 mr-5 w-100 table table-sm table-borderless text-secondary">
                    <tr>
                        <td>Subtotal</td>
                        <td>{{$editCart->totalPrice}} SR</td>
                    </tr>

                    <tr>
                        <td>Tax</td>
                        <td>{{$tax}} SR</td>
                    </tr>

                    <tr class="border-bottom">
                        <td>Paid</td>
                        <td>- {{$oldTotal}} SR</td>
                    </tr>

                    <tr class="brownish">
                        <td>Total <span id="credit" class="badge badge-pill badge-primary">Credit</span></td>
                        <td id="total">
                            {{$newTotal }} SR

                        </td>
                    </tr>
                </table>
                </div>
            </div>

                <!-- Edit btn & Checkout btn, if total less than paid -> Edit btn will appear |  if total more than paid -> Checkout btn will appear-->
            <a id="editOrder" href="{{route('editOrderReceived')}}" class="btn btn-block rounded-pill w-50 mx-auto btn-danger text-white">Edit
                Order</a>
            <a id="checkout" href="{{route('editOrderReceived')}}" class="btn btn-block rounded-pill w-50 mx-auto btn-danger text-white">Checkout</a>

        @else
            <p>Your cart is empty!</p>
        @endif
    </div>

@endsection

@section('script')

    <script>

        // if total less than paid -> Edit btn will appear |  if total more than paid -> Checkout btn will appear
        if(parseInt($('#total')[0].innerText) <= 0){
            $('.payment').hide();
            $('#checkout').hide();
            $('#editOrder').show();


        }else{
            $('#payment').show();
            $('#editOrder').hide();
            $('#checkout').show();

        }

        // if total less than 0, credit badge will appear
        if(parseInt($('#total')[0].innerText) < 0){
            $('#credit').show();
        }else {
            $('#credit').hide();
        }

    </script>
@endsection

