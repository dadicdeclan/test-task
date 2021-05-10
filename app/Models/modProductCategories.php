<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class modProductCategories extends Model
{
    protected $fillable = [
        'categoryName','isActive'
    ];
    protected $table ='categories';
    protected $primaryKey ='id';
}
