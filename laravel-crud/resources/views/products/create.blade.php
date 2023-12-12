<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">
    <title>Document</title>
</head>

<body>
    <div class="flex">
        <h1>Create a Product</h1>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
        <form method="post" action="{{route('product.store')}}">
            @csrf
            @method('post')
            <div>
                <label for="name">Name:</label>
                <input class="edit" type="text" name="name" placeholder="Name">
            </div>
            <div>
                <label for="qty">Qty:</label>
                <input class="edit" type="text" name="qty" placeholder="Qty">
            </div>
            <div>
                <label for="price">Price:</label>
                <input class="edit" type="text" name="price" placeholder="Price">
            </div>
            <div>
                <label for="description">Description:</label>
                <input class="edit" type="text" name="description" placeholder="Description">
            </div>
            <div>
                <input type="submit" value="Save a New Product">
            </div>
        </form>
    </div>
</body>

</html>