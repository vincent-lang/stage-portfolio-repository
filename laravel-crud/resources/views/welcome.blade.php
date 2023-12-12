<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/app.css">
    <title>Laravel</title>
</head>

<body class="antialiased">
    <div class="flex">
        <h1 class="homepage">welcome to the homepage.</h1>
        <h2 class="homepage">choose which page you want to visit</h2>
        <a class="homepage" href="{{route('product.index')}}">Product page</a>
        <a class="homepage" href="{{route('shop.index')}}">Shop page</a>
    </div>
</body>

</html>