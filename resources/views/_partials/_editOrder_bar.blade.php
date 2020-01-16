

<!-- "Edit your cart" btn will appear in the application when customer clicked on "edit order" btn -->

<div class="container fixed-bottom mb-5 mb-sm-5 pb-4 col-8 col-sm-5 ">
        <a href="{{route('editCart.show')}}" class=" w-100 btn rounded-pill text-white" style="background-color: #9dcd53">
            Edit your order <span class="badge badge-pill badge-light">{{session()->get('editCart')->totalQty}}
            </span>
        </a>
</div>
