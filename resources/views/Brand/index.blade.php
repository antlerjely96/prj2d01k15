<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
    <a href="{{ route('brands.create') }}">Add a brand</a>
    <h1>Brand List</h1>
    <table border="1px" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Country</td>
            <td></td>
            <td></td>
        </tr>
        @foreach($brands as $brand)
            <tr>
                <td>
                    {{ $brand->id }}
                </td>
                <td>
                    {{ $brand->name }}
                </td>
                <td>
                    {{ $brand->country }}
                </td>
                <td>
                    <a href="{{ route('brands.edit', $brand->id) }}">
                        Edit
                    </a>
                </td>
                <td>
                    <form action="{{ route('brands.destroy', $brand->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button>Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>
