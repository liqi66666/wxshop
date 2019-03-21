<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Goods;

class UserController extends Controller
{
    public function userpage()
    {

        return  view('userpage');
    }


}
