@extends('layouts.adminTemplate')
@section('title', 'Categories')

@section('content')

    <h2>{{'Create Category'}}</h2>
    <form action="{{route('categories.store')}}" method="post">
        @csrf

        <!-- new category's name -->
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" @isset($article) value="{{$article->title}}" @endisset>
        </div>

            <!-- new category's description -->
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" id="description" name="description" class="form-control" @isset($article) value="{{$article->title}}" @endisset>
        </div>

            <!-- new category's background card img -->
        <div class="form-group">
            <label for="card_img">Card Image</label>
            <input type="text" id="card_img" name="card_img" class="form-control" @isset($article) value="{{$article->title}}" @endisset>
        </div>

            <!-- new category's title img "flag" -->
        <div class="form-group">
            <label for="title_img">Title Image</label>
            <input type="text" id="title_img" name="title_img" class="form-control" @isset($article) value="{{$article->title}}" @endisset>
        </div>

            <!-- save btn -->
        <div class="form-group">
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </form>
@endsection
