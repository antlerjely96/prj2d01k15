<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        /* Query builder */
//        //Tạo đối tượng của Model
//        $obj = new Product();
//        //Gọi function từ model
//        $products = $obj->index();
//        //Hiển thị view và gửi dữ liệu lên view
//        return view('product.index', [
//            'products' => $products
//        ]);
        /* ORM Eloquent */
        //Lấy toàn bộ product
        $products = Product::with('brand')->get();
        //Hiển thị view và gửi dữ liệu lên view
        return view('product.index', [
            'products' => $products
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        /* Query Builder */
//        //Lấy dữ liệu từ bảng Brand
//        //Tạo đối tượng của model Brand
//        $objBrand = new Brand();
//        //Gọi function ở model Brand
//        $brands = $objBrand->index();
//        //Gọi view thêm, truyền brands
//        return view('Product.create', [
//            'brands' => $brands
//        ]);
        /* ORM Eloquent */
        //Lấy brand
        $brands = Brand::all();
        //Gọi view thêm, truyền brands
        return view('Product.create', [
            'brands' => $brands
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request): \Illuminate\Http\RedirectResponse
    {
        /* Query builder */
//        //Tạo đối tượng của model Product
//        $obj = new Product();
//        //Lấy dữ liệu từ form và gán cho đối tượng
//        $obj->name = $request->name;
//        $obj->price = $request->price;
//        $obj->quantity = $request->quantity;
//        $obj->brand_id = $request->brand_id;
//        //Gọi function trong model
//        $obj->createProduct();
//        //Quay lại danh sách
//        return Redirect::route('products.index');

        /* Eloquent */
        //Lưu dữ liệu trong form lên db
        $imageName = $request->file('image')->getClientOriginalName();
        if(!Storage::exists('public/Admin/'.$imageName)){
            Storage::putFileAs('public/Admin/', $request->file('image'), $imageName);
        }
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'brand_id' => $request->brand_id,
            'image' => $imageName
        ]);
        //Quay lại danh sách
        return Redirect::route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        /* Query Builder */
//        //Lấy brand
//        $objBrand = new Brand();
//        $brands = $objBrand->index();
//        //trả về view form update
//        return view('Product.edit', [
//           'product' => $product,
//            'brands' => $brands
//        ]);
        /* ORM Eloquent */
        //Lấy toàn bộ brand
        $brands = Brand::all();
        //trả về view form update
        return view('Product.edit', [
           'product' => $product,
            'brands' => $brands
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product): \Illuminate\Http\RedirectResponse
    {
        /* Query Builder */
//        //Tạo đối tượng của Model
//        $objProduct = new Product();
//        //Lấy dữ liệu từ form gán cho đối tượng
//        $objProduct->id = $request->id;
//        $objProduct->name = $request->name;
//        $objProduct->price = $request->price;
//        $objProduct->quantity = $request->quantity;
//        $objProduct->brand_id = $request->brand_id;
//        //Gọi function update
//        $objProduct->updateProduct();
//        //Quay về danh sách
//        return Redirect::route('products.index');
        /* ORM Eloquent */
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'brand_id' => $request->brand_id
        ]);
        //Quay về danh sách
        return Redirect::route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): \Illuminate\Http\RedirectResponse
    {
//        //Gọi function ở model để xóa
//        $product->deleteProduct();
//        //Quay về danh sách
//        return Redirect::route('products.index');
        /* ORM Eloquent */
        $product->delete();
        //Quay về danh sách
        return Redirect::route('products.index');
    }

    public function addToCart(Product $product): \Illuminate\Http\RedirectResponse
    {
        //Nếu cart tồn lại trên session thì lấy về, còn chưa thì tạo 1 mảng mới
        $cart = session()->get('cart', []);
        //Kiểm tra trên cart đã có snar phẩm được chọn chưa
        if(isset($cart[$product->id])){
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price,
                'description' => $product->description,
                'brand_id' => $product->brand_id,
                'image' => $product->image
            ];
        }
        //Lưu cart lên session
        session()->put('cart', $cart);
        return Redirect::route('products.cart');
    }

    public function cart(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $cart = session()->get('cart', []);
        return view('Product.cart', [
            'cart' => $cart
        ]);
    }

    public function updateCart(\Illuminate\Http\Request $request): \Illuminate\Http\RedirectResponse
    {
        //Lấy sản phẩm có id và số lượng muốn cập nhật
        $products = $request->product;
        //Lấy cart
        $cart = session()->get('cart', []);
        foreach ($products as $id => $quantity) {
//            dd($id);
            $cart[$id]['quantity'] = $quantity;
        }
        session()->put('cart', $cart);
        return Redirect::route('products.cart');
    }

    public function deleteAProduct(Product $product): \Illuminate\Http\RedirectResponse
    {
        //Lấy cart
        $cart = session()->get('cart', []);
        unset($cart[$product->id]);
        session()->put('cart', $cart);
        return Redirect::route('products.cart');
    }

    public function deleteAllProducts(): \Illuminate\Http\RedirectResponse
    {
        //Xóa cart
        session()->forget('cart');
        return Redirect::route('products.cart');
    }
}
