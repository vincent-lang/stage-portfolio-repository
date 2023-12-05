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
        <h1>Create a Shop</h1>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
        <form method="post" action="{{route('shop.store')}}">
            @csrf
            @method('post')
            <div>
                <label for="name">Name:</label>
                <input class="edit" type="text" name="name" placeholder="Name">
            </div>
            <div>
                <label for="adress">Adress:</label>
                <input class="edit" type="text" name="adress" placeholder="Adress">
            </div>
            <div>
                <label for="country">Country:</label>
                <input class="edit" type="text" name="country" placeholder="Country">
            </div>
            <div>
                <input type="submit" value="Save a New Shop">
            </div>
        </form>
    </div>
</body>

</html>