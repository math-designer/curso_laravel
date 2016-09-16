@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1>Products</h1>
                <table class="table table-bordered table-responsive">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>#</th>
                    </tr>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>R$ {{$product->price}}</td>
                            <td>{{$product->category->name}}</td>
                            <td>
                                <a href="{{route('product.destroy', $product->id)}}" class="btn btn-danger btn-xs">Remove</a>
                                <a href="{{route('product.edit', $product->id)}}"
                                   class="btn btn-default btn-xs">Edit</a>
                                <a href="{{route('product.images', $product->id)}}" class="btn btn-info btn-xs">images</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                {!! $products->render() !!}
                <br>
                <a href="{{route('product.create')}}" class="btn btn-primary">Add new Product</a>
            </div>
        </div>
    </div>
@endsection