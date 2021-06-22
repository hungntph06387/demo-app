<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-center">
        <h3 style="color: #3498db; ">List Products</h3>
    </div>
    <a href="/add" class="btn btn-primary" role="button" aria-pressed="true">Add Product</a>
    @if(\Session::get('msg'))
        <div class="alert alert-success">
            {{ Session::get('msg') }}
        </div>
    @endif
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Desc</th>

            <th scope="col"></th>

        </tr>
        </thead>
        <tbody>
        @foreach ($data as $product)
        <tr>
            <th scope="row">{{$product->id}}</th>
            <td><a href="/product/{{$product->id}}">{{$product->name}}</a></td>
            <td>{{$product->price}}</td>

            <td>
                <img src="/images/{{$product->image}}">
            </td>
            <td>
                <a href="/product/{{$product->id}}/edit" class="btn btn-success btn-block" role="button" aria-pressed="true">Edit</a>
                <a href="/delete/{{$product->id}}" class="btn btn-warning btn-block" role="button" aria-pressed="true">Delete</a>
            </td>
        </tr>
        @endforeach
        </tbody>

    </table>
</div>
</body>
</html>
