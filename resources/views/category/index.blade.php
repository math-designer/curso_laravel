@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1>Categories</h1>

                <table class="table table-responsive table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>#</th>
                    </tr>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->description}}</td>
                            <td>
                                <a href="{{route('category.destroy',['id' => $category->id])}}" class="btn btn-danger btn-xs">Remove</a>
                                <a href="{{route('category.edit',['id' => $category->id])}}" class="btn btn-default btn-xs">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <a href="{{route('category.create')}}" class="btn btn-primary">Add new Category</a>
            </div>
        </div>
    </div>

@endsection
