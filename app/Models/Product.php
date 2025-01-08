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
}
