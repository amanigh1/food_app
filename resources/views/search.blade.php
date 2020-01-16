@extends('layouts.app')
@section('title', 'Search')

@section('css')
    <link href="{{ asset('/css/navBar.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
@endsection

@section('content')

    <!--  X icon  -->
    <div class="container mt-3">
        <div class="col-5 backIcon">
            <a href="{{route('home')}}">
                <img class="shadow rounded-pill" src="../Icons/icons8-xbox-x-100 (1).png" height="50px"
                     width="50px"/>
            </a>
        </div>
    </div>

    <!--  Search Input  -->
    <div class="container search menuItem mt-5  ">
        <input id="search" type="text" name="search" class=" form-control mb-3 text-light" placeholder="&#xF002; Search"
               style="font-family:Arial, FontAwesome">

        <!--  Search result for each item -->
        <div id="allItems">
            @forelse($menu as $item)

                <div class="record card p-2 mb-4 position-relative">
                    <div class="row">
                        <!-- image column ----->

                        <div class="col-6 col-sm-4">
                            <div class="itemSearchPic d-flex align-items-center position-relative">
                                <div class="badge badge-pill badge-danger itemBadge">New</div>

                                <img src="{{asset('FoodPics/'.$item->img)}}"/>
                            </div>
                        </div>
                        <!-- Description column ----->

                        <div class="col-6 col-sm-7 text-center p-0"
                             onclick="location.href='{{route("productPage",$item->id)}}';" style="cursor: pointer;">
                            <div class="card-body ">

                            <!-- Item's name -->

                                <h6 class="card-title pricing-card-title">{{$item->name}}</h6>

                                <!-- Item's description -->

                                <p class="card-text text-secondary small item-description">
                                    {{$item->description}}
                                </p>


                                <div class="align-self-end" style="margin-top: auto;">
                                    <div class="row">

                                        <!-- Chili, Garlic and Nuts -->
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

                                        <!-- Item's price -->
                                        <div class="col-4 btmBtn price d-inline m-0">
                                            <button
                                                class="mobile-btn btn btn-block price-btn rounded-pill text-white">{{$item->price}}
                                                SR
                                            </button>
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
    </div>
    <!-- Logo img -->

        <div class="logo">
            <img src="../Icons/organic-restaurant-logo-D34AC3E788-seeklogo.com.png" height="100px"
                 width="100px"/>
        </div>
        @endsection

        @section('footer')
            @include('_partials._bottom_bar')
        @endsection

        @section('script')
            <script>

                $(document).ready(function () {

                    //---- Searching
                    $('#allItems').hide();

                    $('input[name=search]').on('keyup', function () {
                        $('#allItems').show();
                        if ($(this).val()) {
                            let val = $(this).val().toLowerCase();

                            $('.record').each(function () {
                                let text = $(this).find('.card-title').text().toLowerCase();

                                if (text.indexOf(val) != -1) {
                                    $(this).show();
                                } else {
                                    $(this).hide();
                                }
                            });

                        } else {
                            $('#allItems').hide();

                        }

                    });


                    //---- Chili, Garlic and Nuts Icons

                    $('[data-toggle="tooltip"]').tooltip({
                        title: '<img class="small-icon m-2 ml-auto" src="../Icons/icons8-almond-100 copy.png"/><span class="mr-auto">Nuts</span> <br/>' +
                            '<img class="small-icon m-2 ml-auto" src="../Icons/icons8-chili-pepper-100 copy.png"/><span class="mr-auto">Chili</span> <br/>' +
                            '<img class="small-icon m-2 ml-auto" src="../Icons/icons8-garlic-100 copy.png"/><span class="mr-auto">Garlic</span>',
                        html: true
                    });


                });
            </script>
@endsection


