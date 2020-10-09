@extends('layouts.app')

@section('content')
<div>
    <form action="{{ route('destroy_product', ['id' => $product->id]) }}" method="post">
        @csrf
        <div class="container">
            <h2>Click the buttom below to confirm remove the product <strong>{{$product->name}}</strong></h2>
            <h2>Are you sure?</h2>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Confirm
                </button>
            </div>
        </div>

    </form>
</div>
@endsection