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
        <h1>Edit a Shop</h1>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
        <form method="post" action="{{route('shop.update', ['shop' => $shop])}}">
            @csrf
            @method('put')
            <div>
                <label for="name">Name:</label>
                <input class="edit" type="text" name="name" placeholder="Name" value="{{$shop->name}}">
            </div>
            <div>
                <label for="adress">Adress:</label>
                <input class="edit" type="text" name="adress" placeholder="Adress" value="{{$shop->adress}}">
            </div>
            <div>
                <label for="country">Country:</label>
                <input class="edit" type="text" name="country" placeholder="Country" value="{{$shop->country}}">
            </div>
            <div>
                <input type="submit" value="Update">
            </div>
        </form>
    </div>
</body>

</html>