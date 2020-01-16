@extends('layouts.app')
@section('title', 'Home')

@section('css')
    <link href="{{ asset('/css/navBar.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/mainPage.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container ">

        <!-- Logo Bar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-light">
            <div class="container">
                <div class="brandBox col-12">
                    <a href="{{url('/')}}">
                        <img id="xIcon" src="{{ asset('Icons/organic-restaurant-logo-D34AC3E788-seeklogo.com.png')}}"
                             height="90px" width="90px">
                    </a>
                </div>
            </div>
        </nav>
    </div>


    <div class="container mt-5 pt-5 mb-5 pb-5">
        <h5 class="text-center mt-4 text-secondary">International Kitchens</h5>
        <hr class="w-50">
        <div class="row">

            <!-- Card for each kitchen -->

            @forelse($categories as $category)
                <div class=" col-sm-12 col-md-6 col-lg-4 p-2">
                    <div class="card category_img"
                         style="background-image: url({{url('FoodPics/Header/'.$category->card_img)}})">
                        <a href="{{url('itemsPage/'.$category->id)}}">
                            <div class="card-img-overlay">


                            @if(!empty($category->title_img))
                                <!--  if category has a flag  -->
                                    <div class="category_title_w_img">
                                        <!--  category's img  -->
                                        <div style="background-image: url({{asset('flags/'.$category->title_img)}})"
                                             class="flag"></div>
                                        <!--  category's name  -->
                                        <div class="category_name">{{$category->description}}</div>
                                    </div>

                            @else
                                <!--  if category does't have a flag  -->
                                    <div class="category_title_no_img">
                                        <!--  category's name  -->
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


@endsection


@section('footer')


    @if(session()->has('cart') && !session()->get('cart')->checkout && !session()->has('isEditing'))
        @include('_partials._viewOrder_bar')

    @elseif(session()->has('isEditing') && session()->get('isEditing'))
        @include('_partials._editOrder_bar')
    @endif

    @include('_partials._bottom_bar')
@endsection
