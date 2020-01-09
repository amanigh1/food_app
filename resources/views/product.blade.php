@extends('layouts.app')
@section('title', $item->name)

@section('css')
    <link href="{{ asset('/css/navBar.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/product.css') }}" rel="stylesheet">
@endsection

@section('content')
    <nav class="navbar fixed-top navbar-expand-lg navbar-light" style="background: #71051A;">

        <div class="container">

            <div class="col-6 backIcon">
                <a href="{{url('/itemsPage/'.$item->category->id)}}">
                    <img src="{{asset('Icons/icons8-back-arrow-100 (3).png')}}" height="50px" width="50px"/>
                </a>
            </div>

            <div class="col-6 titleHeader">
                <h5> {{$item->category->description}} </h5>
            </div>
        </div>

    </nav>

    <!-- Topics -->

    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <h2 class="mailName"> {{$item->name}} </h2>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <h2 class="price"> {{$item->price}} SR </h2>
            </div>
        </div>
    </div>
    <br>

    <!-- Image -->
    <div class = "imageSection" >
        <img class="showImage" src="{{asset('FoodPics/'.$item->img)}}"/>
    </div>

    <br>

    <!-- show info -->
    <div class="info">
        <button
            id = "firstIcon"
            type="button"
            class="btn btn-secondary"
            data-container="body"
            data-toggle="popover"
            data-placement="top"
            data-trigger = "focus"
            data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
            <img class="icon" src="{{asset('Icons/chili.png')}}"/>
        </button>
    </div>
    <br>

    <!-- Quantity -->

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="btns">
                    <button class="btn btn-success btn-circle m-1">
                        <i class="fa fa-check"> + </i>
                    </button>
                    <button class="btn btn-circle m-1" id="quantity">
                        <i class="fa fa-check" > 1 </i>
                    </button>
                    <button class="btn btn-success btn-circle m-1">
                        <i class="fa fa-check"> - </i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <br>

    <!-- cart button -->
    <div class="cartBtn">
        <button type="button" class="btn btn-lg btn-block text-white"> Add to your Cart </button>
    </div>

    <br>

    <!-- descreption -->
    <div class="desc">
        <p>
            {{$item->description}}
        </p>
    </div>

    <br>

    <!-- Add notes -->
    <div class="form-group">
        <form>
            <div class="form-group">
                <label for="exampleFormControlTextarea1"> Notes </label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
        </form>
    </div>

@endsection


@section('footer')
    @include('_partials._bottom_bar')
@endsection
