@extends('layouts.app')

@section('content')
@csrf
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($orders as $order)
            <div class="card p-2 mb-5">
                <div class="card-header">
                    <a>{{ $order->created_at }}</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->items as $item)
                            <tr>
                                <th scope="row">{{$item->id}}</th>
                                <td>{{$item->price}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-primary" onclick="generatePDF('{{$order->id}}', '{{$order->items}}')">
                    Generate order PDF file
                </button>
            </div>
            @endforeach
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js" integrity="sha384-THVO/sM0mFD9h7dfSndI6TS0PgAGavwKvB5hAxRRvc0o9cPLohB0wb/PTA7LdUHs" crossorigin="anonymous"></script>
<script type="text/javascript">
    function generatePDF(id, items) {
        console.log('chamou')
        const doc = jsPDF();
        start = 90;
        doc.setFontSize(30);
        doc.text(30, 30, 'Order ' + id)
        doc.setFontSize(10);
        objList = JSON.parse(items);
        console.log(objList);
        objList.forEach(function(objItem) {
            doc.text(30, start, "ID");
            doc.text(60, start, String(objItem.id));
            start += 10;
            doc.text(30, start, "Price");
            doc.text(60, start, String(objItem.price));
            start += 25;
        })

        doc.save("order.pdf")

    };
</script>
@endsection