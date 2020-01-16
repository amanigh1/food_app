@extends('layouts.adminTemplate')
@section('title', 'Menu')

@section('content')

    <h2>{{'Edit Item'}}</h2>
    <form action="{{route('menu.update', $menu->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <!-- edit item's name -->
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" @isset($menu) value="{{$menu->name}}" @endisset>
        </div>

            <!-- edit item's description -->
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" id="description" name="description" class="form-control" @isset($menu) value="{{$menu->description}}" @endisset>
        </div>


            <!-- edit item's price -->
            <div class="form-group">
            <label for="price">Price</label>
            <input type="number" id="price" name="price" class="form-control" @isset($menu) value="{{$menu->price}}" @endisset>
        </div>

            <!-- edit item's img -->
            <div class="form-group">
            <label for="img">Image</label>
            <input type="file" id="img" name="img"  @isset($menu) value="{{$menu->img}}" @endisset>
        </div>

            <!-- edit item's category -->
            <div class="form-group">
            <select name="category_id" id="category_id">
            @foreach($categories as $id => $description)
                    <option value="{{$id}}" @if(isset($menu) && $menu->category_id == $id) selected  @endif>{{$description}}</option>
            @endforeach
            </select>
        </div>


            <!-- edit btn -->
            <div class="form-group">
            <button type="submit" class="btn btn-success">Edit</button>
        </div>
    </form>
@endsection
