<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class modProducts extends Model
{
    protected $fillable = [
        'productName','productPrice','productCategoryId'
    ];
    protected $table ='products';
    protected $primaryKey ='id';

    public function productAssignedCategory(){
        return $this->hasOne(modProductCategories::class, 'id', 'productCategoryId');
    }
}
