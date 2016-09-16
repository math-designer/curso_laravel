@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Create Image</h1>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {!! Form::open(['route' => ['product.images.store', $product->id], 'files' => true]) !!}
                <div class="form-group">
                    {!! Form::label('image', 'Image:') !!}
                    {!! Form::file('image', null) !!}
                </div>


                <div class="form-group">
                    {!! Form::submit('Upload Image', ['class'=> 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection