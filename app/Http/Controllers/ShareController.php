<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Goods;
class ShareController extends Controller
{
    public function willshare()
    {
        return  view('willshare');
    }
    public function share()
    {
        return  view('share');
    }
}
