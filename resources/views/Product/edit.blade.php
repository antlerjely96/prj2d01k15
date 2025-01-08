<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update a product</title>
</head>
<body>
    <form action="{{ route('products.update', $product->id) }}" method="post">
        @csrf
        @method("PUT")
        <input type="hidden" name="id" value="{{ $product->id }}">
        Name: <input type="text" name="name" value="{{ $product->name }}"><br>
        Price: <input type="text" name="price" value="{{ $product->price }}"><br>
        Quantity: <input type="text" name="quantity" value="{{ $product->quantity }}"><br>
        Brand: <select name="brand_id">
            @foreach($brands as $brand)
                <option value="{{ $brand->id }}"
                    @if($brand->id == $product->brand_id)
                        {{ 'selected' }}
                    @endif
                >
                    {{ $brand->name }}
                </option>
            @endforeach
        </select><br>
        <button>Update</button>
    </form>
</body>
</html>
