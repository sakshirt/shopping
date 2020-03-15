<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
     //--------------------------------------
     use SoftDeletes;
     //--------------------------------------
     protected $fillable = [
         'name',
         'sku',
         'price',
         'image_url',
         'description',
         'special_price'
     ];

     protected $appends = [
         'product_img'
     ];


     public function getProductImgAttribute() {
         return \URL::to("/").$this->image_url;
     }

     public static function saveProduct($data)
     {
         $product = !empty($data['id'])?Product::where('id', $data['id'])->first():new Product();
         $product->fill($data);
         $product->slug = str_slug($data['name']);
         $product->save();
         return $product->id;
     }

     public static function getList()
     {
         return Product::all();
     }
}
