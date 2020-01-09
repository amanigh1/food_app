<div class="container menuItem mt-5 pt-4">
@forelse($menu as $item)


    <!-- Item 1 -->
        <div class="card">

            <div class="itemPic">

                <img src="{{asset('FoodPics/'.$item->img)}}" width="180px" height="150px"/>

            </div>

            <h5 class="card-title text-center"> Card title </h5>
            <p class="card-text">
                " Nothing beats a simple hamburger on a warm summer evening! Ground beef is blended with an easy to
                prepare bread crumb mixture. Pile these burgers with your favorite condiments, pop open a cool drink
                and enjoy! "
            </p>

            <div class="container">

                <div class="row">

                    <div class="col-2 btmBtn">

                        <img src="../Icons/icons8-garlic-100 (1).png" height="25px" width="25 px"/>

                    </div>

                    <div class="col-2 btmBtn">

                        <img src="../Icons/chili.png" height="25px" width="25px"/>

                    </div>

                    <div class="col-2 btmBtn">

                        <img src="../Icons/icons8-almond-100 (1).png" height="25px" width="25px"/>

                    </div>

                    <div class="col-6 btmBtn">

                        <a href="product.html" class="btn btn-outline-success btn-block">Buy 23 SR</a>

                    </div>


                </div>

            </div>
        </div>


    @empty


    @endforelse
</div>
