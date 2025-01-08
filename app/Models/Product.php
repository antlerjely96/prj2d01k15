<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    //function lấy dữ liệu từ DB
    public function index(): \Illuminate\Support\Collection
    {
        //Viết query builder lấy dữ liệu từ DB
        $products = DB::table('products')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->select('products.*', 'brands.name AS brand_name')
            ->get();
        //Trả về dữ liệu đã lấy được
        return $products;
    }

    //function lưu dữ liệu lên DB
    public function createProduct(): void
    {
        //Query builder để lưu dữ liệu lên DB
        DB::table('products')
            ->insert([
                'name' => $this->name,
                'price' => $this->price,
                'quantity' => $this->quantity,
                'brand_id' => $this->brand_id,
            ]);
    }

    //function update dữ liệu
    public function updateProduct(): void
    {
        //Query builder update
        DB::table('products')
            ->where('id', $this->id)
            ->update([
                'name' => $this->name,
                'price' => $this->price,
                'quantity' => $this->quantity,
                'brand_id' => $this->brand_id,
            ]);
    }

    //function xóa dữ liệu
    public function deleteProduct(): void
    {
        //Query builder xóa
        DB::table('products')
            ->where('id', $this->id)
            ->delete();
    }
}
