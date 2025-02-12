<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Brand extends Model
{
    use HasFactory;
    protected $table = 'brands';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'country'];
    public $timestamps = false;

    //Function lấy dữ liệu từ DB
//    public function index(): \Illuminate\Support\Collection
//    {
//        //Viết query builder lấy dữ liệu
//        $brands = DB::table('brands')->get();
//        //Gửi dữ liệu về controller
//        return $brands;
//    }
//
//    //Function lưu dữ liệu lên DB
//    public function addBrand(): void
//    {
//        //Query Builder lưu dữ liệu lên DB
//        DB::table('brands')
//            ->insert([
//                'name' => $this->name,
//                'country' => $this->country,
//            ]);
//    }
//
//    //Function update dữ liệu
//    public function updateBrand(): void
//    {
//        //Query builder update dữ liệu
//        DB::table('brands')
//            ->where('id', $this->id)
//            ->update([
//                'name' => $this->name,
//                'country' => $this->country,
//            ]);
//    }
//
//    //Function xóa dữ liệu
//    public function deleteBrand(): void
//    {
//        //Query builder xóa dữ liệu
//        DB::table('brands')
//            ->where('id', $this->id)
//            ->delete();
//    }
}
