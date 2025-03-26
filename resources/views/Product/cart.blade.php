<table border="1px" cellpadding="0" cellspacing="0">
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Price</td>
        <td>Quantity</td>
        <td>Image</td>
        <td></td>
    </tr>
    <form method="post" action="{{ route('products.updateCart') }}">
        @csrf
        @foreach($cart as $id => $product)
            <tr>
                <td>{{ $id }}</td>
                <td>{{ $product['name'] }}</td>
                <td>{{ $product['price'] }}</td>
                <td>
                    <input type="text" name="product[{{$id}}]" value="{{ $product['quantity'] }}">
                </td>
                <td>
                    <img src="{{ asset(\Illuminate\Support\Facades\Storage::url('Admin/') . $product['image']) }}" width="50px" height="50px">
                </td>
                <td>
                    <a href="{{ route('products.deleteAProduct', $id) }}">Delete</a>
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="6">
                <button>Update Cart</button>
            </td>
        </tr>
    </form>
    <tr>
        <td colspan="6">
            <a href="{{ route('products.deleteAllProducts') }}">Delete All Product</a>
        </td>
    </tr>
</table>
