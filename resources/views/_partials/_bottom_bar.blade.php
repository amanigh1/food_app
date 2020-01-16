

<!-- Bottom Bar -->
<nav class="navbar fixed-bottom navbar-expand-lg navbar-light bg-light">

    <div class="container d-flex align-items-center justify-content-center text-center">

        <!-- Kitchens -->
            <div class="brandBox col-3">
                <a href="{{route('home')}}" class="text-decoration-none">
                    <img src="{{asset('Icons/icons8-dining-room-150.png')}}" height="25px" width="25px"/>
                    <div  class=" badge badge-light">Kitchens</div>
                </a>
            </div>

        <!-- Orders -->
            <div class="brandBox col-3">
                <a href="{{route('reviewOrder')}}" class="text-decoration-none">
                    <img src="{{asset('Icons/icons8-purchase-order-100 (1).png')}}" height="25px" width="25px"/>
                    <div  class=" badge badge-light">Orders</div>
                </a>
            </div>

        <!-- Search -->
            <div class="brandBox col-3">
                <a href="{{route('search')}}" class="text-decoration-none">
                    <img  src="{{asset('Icons/icons8-search-100.png')}}" height="25px" width="25px"/>
                    <div  class=" badge badge-light">Search</div>
                </a>
            </div>

        <!-- Settings -->
            <div class="brandBox col-3">
                <a href="{{route('settings')}}" class=" text-decoration-none">
                    <img src="{{asset('Icons/icons8-settings-100.png')}}" height="25px" width="25px"/>
                    <div  class=" badge badge-light">Settings</div>
                </a>
            </div>


    </div>
</nav>



