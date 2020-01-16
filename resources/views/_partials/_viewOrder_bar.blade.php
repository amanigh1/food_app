
<!-- This "View your cart" btn will appear just if cart qty more than 0 -->
<div class="container fixed-bottom mb-5 mb-sm-5 pb-4 col-8 col-sm-5 ">
    @if(session()->has('cart') && session()->get('cart')->totalQty > 0)
        <a href="{{route('cart.show')}}" class=" w-100 btn rounded-pill text-white" style="background-color: #9dcd53">
            View your order <span class="badge badge-pill badge-light">{{ session()->has('cart') ? session()->get('cart')->totalQty : '0'}}</span>

        </a>
    @endif
</div>
