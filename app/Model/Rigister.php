<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Rigister extends Model
{
    protected $table = 'shop_rigister';
    public $timestamps = false;
    protected $primaryKey = 'rigister_id';
}
