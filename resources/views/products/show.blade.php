@extends('layouts.app')

@section('content')
<div>
    <form>
        @csrf
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
            <div class="col-md-6">
                <input disabled="disabled" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $product->name }}" required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="price" class="col-md-4 col-form-label text-md-right">Price</label>
            <div class="col-md-6">
                <input disabled="disabled" id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $product->price }}" required autocomplete="price" autofocus>
                @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="cost" class="col-md-4 col-form-label text-md-right">Cost</label>
            <div class="col-md-6">
                <input disabled="disabled" id="cost" type="text" class="form-control @error('cost') is-invalid @enderror" name="cost" value="{{ $product->cost }}" required autocomplete="cost" autofocus>
                @error('cost')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="quantity" class="col-md-4 col-form-label text-md-right">Quantity</label>
            <div class="col-md-6">
                <input disabled="disabled" id="quantity" type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ $product->quantity }}" required autocomplete="quantity" autofocus>
                @error('quantity')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="activated" class="col-md-4 col-form-label text-md-right">Activated</label>
            <div class="col-md-6">
                <input disabled="disabled" checked id="activated" type="checkbox" class="form-control @error('activated') is-invalid @enderror" name="activated" autofocus>
                @error('activated')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

    </form>
</div>
<script type="text/javascript">
    window.onload = function() {
        const value = "{{ $product->activated }}";
        if (value == 1) {
            document.getElementById('activated').checked = true;
        } else {
            document.getElementById('activated').checked = false;
        }
    }
</script>
@endsection