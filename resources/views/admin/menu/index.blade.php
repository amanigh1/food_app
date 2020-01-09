@extends('layouts.adminTemplate')
@section('title', 'Menu')

@section('content')

    <h2 class="text-center">Menu</h2>
    <hr class="w-25">


    <div class="col-md-6 my-3">
        <a href="{{url('/menu/create')}}"><button class="btn green">Add new item</button></a>
    </div>

    <div class="col-12">
        <div class="card">

            <div class="card-body">
                <input type="text" name="quick-finder" class="form-control" placeholder="Search">

                <div class="table-responsive text-center table-hover table-striped mt-3">
                    <table class="table">
                        <thead>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Actions</th>
                        </thead>
                        <tbody>
                        @forelse($menu as $item)
                        <tr class="record">
                            <td >{{$item->name}}</td>
                            <td>{{$item->description}}</td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->category->name}}</td>
                            <td class="d-flex text-center justify-content-center">
                                <a href="{{route('menu.show',$item['id'])}}" class="text-info"><i class="fa fa-eye"></i></a>
                                <a href="{{route('menu.edit',$item['id'])}}" class="text-dark"><i class="fa fa-edit"></i></a>
                                <form onsubmit="return confirm('{{'Do you really want to delete'}} {{$item['name']}}?')" method="post" action="{{route('menu.destroy',$item['id'])}}" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button style="border:none; background-color: transparent"><i class="fa fa-trash text-danger"></i></button>
                                </form>
                            </td>

                        </tr>

                        @empty
                        <p>There are no items yet.</p>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
