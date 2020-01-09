@extends('layouts.adminTemplate')
@section('title', 'Menu')

@section('content')

    <h2>{{'Create Item'}}</h2>
    <form action="{{route('menu.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" @isset($article) value="{{$article->title}}" @endisset>
        </div>


        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" id="description" name="description" class="form-control" @isset($article) value="{{$article->title}}" @endisset>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" id="price" name="price" class="form-control" @isset($article) value="{{$article->title}}" @endisset>
        </div>

        <div class="form-group">
            <label for="img">Image</label>
            <input type="file" id="img" name="img"  @isset($article) value="{{$article->title}}" @endisset>
        </div>

        <div class="form-group">
            <select name="category_id" id="category_id">
            @foreach($categories as $id => $description)
                    <option value="{{$id}}">{{$description}}</option>
            @endforeach
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </form>
@endsection
