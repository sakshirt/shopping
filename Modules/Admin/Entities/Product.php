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

     public function saveProduct($data)
     {
         $product = $data->id?Product::where('id', $data->id)->first():new Product();
         $product->fill($data);
         $product->slug = str_slug($data->name);
         $product->save();
         return $product->id;
     }

     public function grtList()
     {
         return Product::all();
     }
}
