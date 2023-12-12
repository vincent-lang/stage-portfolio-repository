<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="1">
        <thead>
            <tr>
                <th>shop name</th>
                <th>location</th>
                <th>product name</th>
                <th>article number</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{$product->shop->shop_name}}</td>
                <td>{{$product->shop->location}}</td>
                <td>{{$product->product_name}}</td>
                <td>{{$product->artikel_nr}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>