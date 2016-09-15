@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Product "{{$product->name}}"</h1>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {!! Form::open(['route' => ['product.update', $product->id], 'method'=> 'PUT']) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name', $product->name, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('description', 'Description:') !!}
                    {!! Form::textarea('description', $product->description, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('category_id', 'Category:') !!}
                    {!! Form::select('category_id', $categories, $product->category->id, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('price', 'Price:') !!}
                    {!! Form::text('price', $product->price, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('recommend', 'Recommend:') !!}
                    {!! Form::radio('recommend', 1, $product->recommend == 1) !!} Yes
                    {!! Form::radio('recommend', 0, $product->recommend == 0) !!} No
                </div>

                <div class="form-group">
                    {!! Form::label('featured', 'Featured:') !!}
                    {!! Form::radio('featured', 1, $product->featured == 1) !!} Yes
                    {!! Form::radio('featured', 0, $product->featured == 0) !!} No
                </div>
                <div class="form-group">
                    {!! Form::submit('Save Product', ['class'=> 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection