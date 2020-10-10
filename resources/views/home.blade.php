@extends('layouts.app')

@section('content')
@csrf
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <button type="button" class="btn btn-danger" onclick="purshase()">
                Purshase <span class="badge badge-light" id="itemsQtd">0</span>
            </button>
        </div>
        <div class="col-md-8">
            @foreach ($products as $product)
            <div class="card p-2" id="product{{$product->id}}">
                <div class="card-header">
                    <a href="/products/{{ $product->id }}">{{ $product->name }}</a>
                    <h4>Price: {{$product->price}}</h4>
                </div>
                <div class="card-body">
                    <div class="row ">
                        <button class="btn btn-primary col-3 p-1" onclick="addToCart( '{{ $product->id }}' )">Add to cart</a>
                            <button class="btn btn-warning col-3 p-1" onclick="removeFromCart( '{{$product->id}}' )">Remove from cart</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<script type="text/javascript">
    window.onload = function() {
        sessionStorage.cart = "[]"
        console.log("chamei")

    }

    function addToCart(id) {
        objList = JSON.parse(sessionStorage.cart);
        index = objList.indexOf(parseInt(id));
        if (index < 0) {
            objList.push(parseInt(id));
            qtd = objList.length;
            sessionStorage.cart = JSON.stringify(objList);
            document.getElementById("itemsQtd").textContent = qtd;
            obj = document.getElementById("product" + id)
            console.log(obj)
            obj.classList.toggle("text-white");
            obj.classList.toggle("bg-success");
            console.log('adicionou')
        }


    };

    function removeFromCart(id) {
        objList = JSON.parse(sessionStorage.cart);
        index = objList.indexOf(parseInt(id));
        if (index >= 0) {
            objList.splice(index, 1);
            qtd = objList.length;
            sessionStorage.cart = JSON.stringify(objList);
            document.getElementById("itemsQtd").textContent = qtd;
            obj = document.getElementById("product" + id)
            obj.classList.toggle("text-white");
            obj.classList.toggle("bg-success");
            console.log('removeu')
        }
    };

    function purshase() {

        (async () => {
            objList = JSON.parse(sessionStorage.cart);
            obj = JSON.stringify(objList);

            const rawResponse = await fetch('/purshase', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    items: obj,
                    _token: "{{ csrf_token() }}"
                })
            });
        })();
    }
</script>
@endsection