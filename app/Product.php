<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $fillable=[
        'name','description','product_type_id','price'
    ];
    public function productType(){
        return $this->belongsTo(ProductType::class);
    }
    public function productTypeAttributeValues(){
        return $this->belongsToMany(ProductTypeAttributeValue::class, 'product_values','product_id','attribute_value_id');
    }
}
