@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Create Product</h1>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {!! Form::open(['route' => 'product.store']) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('description', 'Description:') !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('category_id', 'Category:') !!}
                    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('price', 'Price:') !!}
                    {!! Form::text('price', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('recommend', 'Recommend:') !!}
                    {!! Form::radio('recommend', 1, true) !!} Yes
                    {!! Form::radio('recommend', 0) !!} No
                </div>

                <div class="form-group">
                    {!! Form::label('featured', 'Featured:') !!}
                    {!! Form::radio('featured', 1, true) !!} Yes
                    {!! Form::radio('featured', 0) !!} No
                </div>
                <div class="form-group">
                    {!! Form::submit('Add Product', ['class'=> 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection