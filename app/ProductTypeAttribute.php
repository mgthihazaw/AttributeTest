<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductTypeAttribute extends Model
{
    protected $fillable=[
        'name','description','product_type_id'
    ];
    public function productType(){
        return $this->belongsTo(ProductType::class);
    }
    public function productTypeAttributeValues(){
        return $this->hasMany(ProductTypeAttributeValue::class);
    }
}
