<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $fillable=[
        'name','description'
    ];
    public function products(){
        return $this->hasMany(Product::class);
    }
    public function productTypeAttributes(){
        return $this->hasMany(ProductTypeAttribute::class);
    }

}
