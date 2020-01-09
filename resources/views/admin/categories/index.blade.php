@extends('layouts.adminTemplate')
@section('title', 'Categories')

@section('content')

    <h2 class="text-center">Categories</h2>
    <hr class="w-25">


    <div class="col-md-6 my-3">
        <a href="{{url('/categories/create')}}"><button class="btn green">Add new category</button></a>
    </div>

    <div class="col-12">
        <div class="card">

            <div class="card-body">
                <input type="text" name="quick-finder" class="form-control" placeholder="Search">

                <div class="table-responsive text-center table-hover table-striped mt-3">
                    <table class="table">
                        <thead>
                        <th>id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                        </thead>
                        <tbody>
                        @forelse($categories as $category)
                        <tr class="record">
                            <td>{{$category->id}}</td>
                            <td >{{$category->name}}</td>
                            <td>{{$category->description}}</td>
                            <td class="d-flex text-center justify-content-center">
                                <a href="{{route('categories.show',$category['id'])}}" class="text-info"><i class="fa fa-eye"></i></a>
                                <a href="{{route('categories.edit',$category['id'])}}" class="text-dark"><i class="fa fa-edit"></i></a>
                                <form onsubmit="return confirm('{{'Do you really want to delete'}} {{$category['description']}}?')" method="post" action="{{route('categories.destroy',$category['id'])}}" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button style="border:none; background-color: transparent"><i class="fa fa-trash text-danger"></i></button>
                                </form>
                            </td>

                        </tr>

                        @empty
                        <p>There are no categories yet.</p>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
