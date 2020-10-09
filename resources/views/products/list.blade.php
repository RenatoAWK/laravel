@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($products as $product)
    <ul>
        <li>
            <a href="/products/{{ $product->id }}">{{ $product->name }}</a>
            <div class="row ">
                <a class="btn btn-primary col-3 p-1" href="/products/{{ $product->id }}" role="button">Details</a>
                <a class="btn btn-primary col-3 p-1" href="/products/edit/{{ $product->id }}" role="button">Edit</a>
                <a class="btn btn-primary col-3 p-1" href="/products/delete/{{ $product->id }}" role="button">Remove</a>
            </div>
        </li>
    </ul>
    @endforeach
</div>
@endsection