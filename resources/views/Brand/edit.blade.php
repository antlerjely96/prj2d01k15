<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit a brand</title>
</head>
<body>
    <p>Edit a brand</p>
    <form action="{{ route('brands.update', $brand->id) }}" method="post">
        @method('PUT')
        @csrf
        ID: <input type="text" name="id" readonly value="{{ $brand->id }}"> <br>
        Name: <input type="text" name="name" value="{{ $brand->name }}"><br>
        Country: <input type="text" name="country" value="{{ $brand->country }}"><br>
        <button>Update</button>
    </form>
</body>
</html>
