@extends('layouts.adminTemplate')
@section('title', 'Menu')

@section('content')

    <h2>{{'Create Item'}}</h2>
    <form action="{{route('menu.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <!-- new item's name -->
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" @isset($article) value="{{$article->title}}" @endisset>
        </div>

            <!-- new item's description -->
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" id="description" name="description" class="form-control" @isset($article) value="{{$article->title}}" @endisset>
        </div>

            <!-- new item's price -->
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" id="price" name="price" class="form-control" @isset($article) value="{{$article->title}}" @endisset>
        </div>

            <!-- new item's img -->
        <div class="form-group">
            <label for="img">Image</label>
            <input type="file" id="img" name="img"  @isset($article) value="{{$article->title}}" @endisset>
        </div>

            <!-- new item's category -->
        <div class="form-group">
            <select name="category_id" id="category_id">
            @foreach($categories as $id => $description)
                    <option value="{{$id}}">{{$description}}</option>
            @endforeach
            </select>
        </div>


            <!-- save btn -->
        <div class="form-group">
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </form>
@endsection
