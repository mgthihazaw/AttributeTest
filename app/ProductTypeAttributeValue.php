<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductTypeAttributeValue extends Model
{
    protected $table='product_type_attribute_values';
    protected $fillable=[
        'name','description','product_type_attribute_id'
    ];
    public function productTypeAttribute(){
        return $this->belongsTo(ProductTypeAttribute::class);    
    }
    public function products(){
        return $this->belongsToMany(Product::class,'product_values','product_id','attribute_value_id');
    }
}
