@extends('layouts.adminTemplate')
@section('title', 'Categories')

@section('content')

    <h2>{{'Edit Category'}}</h2>
    <form action="{{route('categories.update', $category->id)}}" method="post">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" @isset($category) value="{{$category->name}}" @endisset>
        </div>


        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" id="description" name="description" class="form-control" @isset($category) value="{{$category->description}}" @endisset>
        </div>

        <div class="form-group">
            <label for="card_img">Card Image</label>
            <input type="text" id="card_img" name="card_img" class="form-control" @isset($category) value="{{$category->card_img}}" @endisset>
        </div>

        <div class="form-group">
            <label for="title_img">Title Image</label>
            <input type="text" id="title_img" name="title_img" class="form-control" @isset($category) value="{{$category->title_img}}" @endisset>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Edit</button>
        </div>
    </form>
@endsection
