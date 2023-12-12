<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Without query and with laravel eloquent</h1>
    <table border="1">
        <thead>
            <tr>
                <th>id</th>
                <th>shop name</th>
                <th>location</th>
                <th>shop id</th>
                <th>product name</th>
                <th>artikel nummer</th>
            </tr>
        </thead>
        <tbody>
            @foreach($test->products as $products)
            <tr>
                <td>{{$test->id}}</td>
                <td>{{$test->shop_name}}</td>
                <td>{{$test->location}}</td>
                <td>{{$products->shop_id}}</td>
                <td>{{$products->product_name}}</td>
                <td>{{$products->artikel_nr}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <h1>still with query</h1>
    <table border="1">
        <thead>
            <tr>
                <th>id</th>
                <th>shop name</th>
                <th>location</th>
                <th>shop id</th>
                <th>product name</th>
                <th>artikel nummer</th>
            </tr>
        </thead>
        <tbody>
            @foreach($info as $fruits)
            <tr>
                <td>{{$fruits->id}}</td>
                <td>{{$fruits->shop_name}}</td>
                <td>{{$fruits->location}}</td>
                <td>{{$fruits->shop_id}}</td>
                <td>{{$fruits->product_name}}</td>
                <td>{{$fruits->artikel_nr}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>