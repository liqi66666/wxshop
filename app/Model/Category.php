<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'shop_category';
    public $timestamps = false;
    protected $primaryKey = 'cate_id';
}
