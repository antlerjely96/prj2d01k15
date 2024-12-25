<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Support\Facades\Redirect;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        //Tạo đối tượng của Model
        $obj = new Brand();
        //Nhận dữ liệu từ Model: gọi function từ Model
        $brands = $obj->index();
        //Gửi dữ liệu lên view
        return view('Brand.index', [
            'brands' => $brands
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        //Hiển thị view create
        return view('Brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request): \Illuminate\Http\RedirectResponse
    {
        //Tạo đối tượng của model
        $obj = new Brand();
        //Lấy dữ liệu từ form gán vào đối tượng
        $obj->name = $request->name;
        $obj->country = $request->country;
        //Gọi function trong model để lưu dữ liệu
        $obj->addBrand();
        //Quay lại danh sách
        return Redirect::route('brands.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        //Hiển thị form edit
        return view('Brand.edit', [
            'brand' => $brand,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand): \Illuminate\Http\RedirectResponse
    {
        //Lấy dữ liệu từ form và gán vào đối tượng
        $brand->id = $request->id;
        $brand->name = $request->name;
        $brand->country = $request->country;
        //Gọi function update trong model
        $brand->updateBrand();
        //Quay về Danh sách
        return Redirect::route('brands.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand): \Illuminate\Http\RedirectResponse
    {
        //Gọi đến function xóa trong model
        $brand->deleteBrand();
        //Quay lại danh sách
        return Redirect::route('brands.index');
    }
}
