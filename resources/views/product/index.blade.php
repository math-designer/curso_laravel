@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Products</h1>
                <table class="table table-bordered table-responsive">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Recommend</th>
                        <th>Featured</th>
                        <th>#</th>
                    </tr>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>R$ {{$product->price}}</td>
                            <td>{{$product->recommend}}</td>
                            <td>{{$product->featured}}</td>
                            <td>
                                <a href="{{route('product.destroy', $product->id)}}" class="btn btn-danger btn-xs">Remove</a>
                                <a href="{{route('product.edit', $product->id)}}"
                                   class="btn btn-default btn-xs">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <a href="{{route('product.create')}}" class="btn btn-primary">Add new Product</a>
            </div>
        </div>
    </div>
@endsection