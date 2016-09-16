@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1>Images of "{{$product->name}}"</h1>
                <table class="table table-bordered table-responsive">
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Extension</th>
                        <th>#</th>
                    </tr>
                    @foreach($product->images as $image)
                        <tr>
                            <td>{{$image->id}}</td>
                            <td><img src="{{url("uploads/{$image->id}.{$image->extension}")}}" width="100" alt=""></td>
                            <td>{{$image->extension}}</td>
                            <td>
                                <a href="{{route('product.images.destroy', $image->id)}}" class="btn btn-danger btn-xs">Remove</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <a href="{{route('product.images.create', $product->id)}}" class="btn btn-primary">Add new Image</a>
                <a href="{{route('product.index', $product->id)}}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>
@endsection