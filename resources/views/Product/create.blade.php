<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add a product</title>
</head>
<body>
    <form action="{{ route('products.store') }}" method="post">
        @csrf
        Name: <input type="text" name="name"><br>
        Price: <input type="text" name="price"><br>
        Quantity: <input type="text" name="quantity"><br>
        Description: <input type="text" name="description"><br>
        Brand: <select name="brand_id">
            @foreach($brands as $brand)
                <option value="{{ $brand->id }}">
                    {{ $brand->name }}
                </option>
            @endforeach
        </select><br>
        <button>Add</button>
    </form>
</body>
</html>
