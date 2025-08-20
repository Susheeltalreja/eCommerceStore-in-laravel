@extends('admin.dashboard')

@section('show_product')
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    </head>

    <body>
        <div class="container">
            <h1>All product</h1>
            <a href="/check_product"><button class="btn btn-dark">Add product</button></a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Product_id</th>
                        <th scope="col">product_name</th>
                        <th scope="col">product_image</th>
                        <th scope="col">product_category</th>
                        <th scope="col">product_sku</th>
                        <th scope="col">product_price</th>
                        <th scope="col">product_desc</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <th scope="row">{{ $product->Product_id}}</th>
                            <td>{{ $product->product_name }}</td>
                            <td> <img src="uploads/product/{{ $product->product_image }}" width="80px"
                                    style="border-radius: 50%;" alt="{{ $product->product_image }}"> </td>
                            <td>{{ $product->product_category }}</td>
                            <td>{{ $product->product_sku }}</td>
                            <td>{{ $product->product_price }}</td>
                            <td>{{ $product->product_desc }}</td>
                            <td>
                                <a href="/edit/{{ $product->Product_id }}"><button class="btn btn-primary">Edit</button></a>
                                <form action="/delete/{{ $product->Product_id }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                                <!-- <a href="/edit/{{ $product->Product_id }}"><button class="btn btn-danger">Delete</button></a> -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
            crossorigin="anonymous"></script>
    </body>

    </html>
@endsection