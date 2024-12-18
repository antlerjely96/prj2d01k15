<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
    <h1>Brand List</h1>
    <table border="1px" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Country</td>
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
            </tr>
        @endforeach
    </table>
</body>
</html>
