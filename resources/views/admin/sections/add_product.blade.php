@extends('admin.dashboard')

@section('add_product')
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <style>
        .container{
            width: 75vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        form{
            width: 50vw;
            box-shadow: 3px 4px 20px gray;
            padding: 10px;
            border-radius: 10px;
        }
        button{
            width: 100%
        }
    </style>
        </head>

    <body>
        <div class="container">
            <form action="/post" method="post" enctype="multipart/form-data">
                <h1>Add Product</h1>
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="name" name="product_name" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Product category</label>
                    <input type="Text" class="form-control" id="category" name="category" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="sku" class="form-label">Product SKU</label>
                    <input type="Text" class="form-control" id="sku" name="sku" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Product Price</label>
                    <input type="Text" class="form-control" id="price" name="price" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label">Product Description</label>
                    <input type="Text" class="form-control" id="desc" name="desc" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Product Image</label>
                    <input type="file" class="form-control" id="image" name="image" aria-describedby="emailHelp">
                </div>
                <button class="btn btn-dark">
                    ADD
                </button>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
            crossorigin="anonymous"></script>
    </body>

    </html>


@endsection