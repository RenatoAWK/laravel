@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($products as $product)
    <div class="card p-2 mb-5" id="product{{$product->id}}">
        <div class="card-header">
            <a href="/products/{{ $product->id }}">{{ $product->name }}</a>
            <h4>Price: {{$product->price}}</h4>
        </div>
        <div class="card-body">
            <div class="row ">
                <a class="btn btn-primary col-3 p-1 m-2" href="/products/{{ $product->id }}" role="button">Details</a>
                <a class="btn btn-warning col-3 p-1 m-2" href="/products/edit/{{ $product->id }}" role="button">Edit</a>
                <a class="btn btn-danger col-3 p-1 m-2" href="/products/delete/{{ $product->id }}" role="button">Remove</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection