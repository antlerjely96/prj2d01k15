<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Brand extends Model
{
    use HasFactory;

    //Function lấy dữ liệu từ DB
    public function index(): \Illuminate\Support\Collection
    {
        //Viết query bulider lấy dữ liệu
        $brands = DB::table('brands')->get();
        //Gửi dữ liệu về controller
        return $brands;
    }
}
