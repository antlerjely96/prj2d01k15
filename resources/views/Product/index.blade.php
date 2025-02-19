<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product List</title>
</head>
<body>
    <a href="{{ route('products.create') }}">Add a product</a>
    <table border="1px" cellspacing="0" cellpadding="0" width="50%">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Price</td>
            <td>Quantity</td>
            <td>Description</td>
            <td>Brand</td>
            <td></td>
            <td></td>
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
                    {{ $product->description }}
                </td>
                <td>
                    {{ $product->brand->name }}
                </td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                </td>
                <td>
                    <form action="{{ route('products.destroy', $product->id) }}" method="post">
                        @csrf
                        @method("DELETE")
                        <button>Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>
