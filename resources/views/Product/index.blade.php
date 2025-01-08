<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product List</title>
</head>
<body>
    <table border="1px" cellspacing="0" cellpadding="0" width="50%">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Price</td>
            <td>Quantity</td>
            <td>Brand</td>
        </tr>
        @foreach($products as $product)
            <tr>
                <td>
                    {{ $product->id }}
                </td>
                <td>
                    {{ $product->name }}
                </td>
                <td>
                    {{ $product->price }}
                </td>
                <td>
                    {{ $product->quantity }}
                </td>
                <td>
                    {{ $product->brand_name }}
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>
