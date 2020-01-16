@extends('layouts.app')
@section('title', 'Review Order')

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

    <div class="container menuItem my-5 ">
        @if($editCart)
            <div class="card mb-3 pb-0">
                <div class="card-body p-0 ">
                @foreach($editCart->items as $item)


                    <!-- row for each item -->
                        <div class=" p-2 mb-2 mb-sm-4">
                            <div class="row text-center">

                                <!-- quanity column -->
                                <div class="col-2 col-sm-2 pr-0">
                                    <div class="d-flex align-items-center justify-content-center">
                                        @if($item['qty'] > 0)
                                        <span class="badge badge-pill ligntGray">{{$item['qty']}}</span>
                                        @else
                                        <!-- show canceled badge if qty = 0 -->
                                            <span class="badge btn-danger badge-pill ">Canceled</span>

                                        @endif
                                    </div>
                                </div>


                                <!-- Item's name -->
                                <div class="col-8 col-sm-8 text-center pl-0">
                                    <h6 class="card-title pricing-card-title text-left">{{$item['name']}}</h6>
                                </div>
                            </div>

                        </div>

                @endforeach
                </div>

                <!-- Total row -->
                <div class="row mb-3">
                    <div class="col-6">
                        Total:
                    </div>
                    <div id="amount" class="col-6 text-right">
                        {{$cartTotal}} SR
                    </div>
                </div>
            </div>

    </div>

            <div class="container menuItem ">
                        <div class="card shadow-none">
                            <div class="row">

                                <!-- Edit order btn -->
                        <a href="{{route('editCart.show')}}" class=" col-4 col-sm-2 p-0 btn btn-sm border-bottom">Edit Order</a>

                                <!-- cancel order btn -->
                        <a id="cancelLink" href="{{route('cancelOrder')}}" class=" cancelOrder col-4 col-sm-2 p-0 btn btn-sm border-bottom ml-auto">Cancel Order</a>
                    </div>
            </div>
            </div>


<!-- Logo img -->
    <div class="logo">
        <img  src="../Icons/organic-restaurant-logo-D34AC3E788-seeklogo.com.png" height="100px"
              width="100px"/>
    </div>


    @else
        <p>Your cart is empty!</p>
    @endif


@endsection


@section('footer')
    @include('_partials._bottom_bar')
@endsection

@section('script')
<script>

    // Cancel confirmation alerts
    $('.cancelOrder').click( function(e) {
        e.preventDefault();
        let x =confirm('Your order is being processed.\n By canceling you will be charged 20% as {{$cartTotal * 20 /100}} SR. ');
        if (x) {
            var y = window.confirm("Are you sure you want to cancel your order?");
            if (y) {
                window.location.href = "/cancelOrder";
            }else
                return false;
        }
        else
            return false;
         } );


</script>
@endsection
