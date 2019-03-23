<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Goods;
use App\Model\Category;
class IndexController extends Controller
{
    public function index()
    {
        $res = Goods::get();
        $data = Category::get();
        return  view('index',['res'=>$res,'data'=>$data]);
    }
    public function indexlist()
    {
        $res=Goods::get();
    }
}
