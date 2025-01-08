<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        //Tạo đối tượng của Model
        $obj = new Product();
        //Gọi function từ model
        $products = $obj->index();
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
        //Lấy dữ liệu từ bảng Brand
        //Tạo đối tượng của model Brand
        $objBrand = new Brand();
        //Gọi function ở model Brand
        $brands = $objBrand->index();
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
        //Tạo đối tượng của model Product
        $obj = new Product();
        //Lấy dữ liệu từ form và gán cho đối tượng
        $obj->name = $request->name;
        $obj->price = $request->price;
        $obj->quantity = $request->quantity;
        $obj->brand_id = $request->brand_id;
        //Gọi function trong model
        $obj->createProduct();
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
        //Lấy brand
        $objBrand = new Brand();
        $brands = $objBrand->index();
        //trả về view form update
        return view('Product.edit', [
           'product' => $product,
            'brands' => $brands
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //Tạo đối tượng của Model
        $objProduct = new Product();
        //Lấy dữ liệu từ form gán cho đối tượng
        $objProduct->id = $request->id;
        $objProduct->name = $request->name;
        $objProduct->price = $request->price;
        $objProduct->quantity = $request->quantity;
        $objProduct->brand_id = $request->brand_id;
        //Gọi function update
        $objProduct->updateProduct();
        //Quay về danh sách
        return Redirect::route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): \Illuminate\Http\RedirectResponse
    {
        //Gọi function ở model để xóa
        $product->deleteProduct();
        //Quay về danh sách
        return Redirect::route('products.index');
    }
}
