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
        <h1>Shop</h1>
        <div>
            @if(session()->has('succes'))
            <div>
                {{session('succes')}}
            </div>
            @endif
        </div>
        <div>
            <div>
                <a href="{{route('shop.create')}}">Create a Shop</a>
            </div>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Adress</th>
                    <th>Country</th>
                    <th>Edit</th>
                    <th class="right">Delete</th>
                </tr>
                @foreach($shops as $shop)
                <tr>
                    <td>{{$shop->id}}</td>
                    <td>{{$shop->name}}</td>
                    <td>{{$shop->adress}}</td>
                    <td>{{$shop->country}}</td>
                    <td>
                        <a href="{{route('shop.edit', ['shop' => $shop])}}">Edit</a>
                    </td>
                    <td class="right">
                        <form method="post" action="{{route('shop.delete', ['shop' => $shop])}}">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>

</html>