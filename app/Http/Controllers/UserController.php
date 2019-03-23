<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Rigister;

class UserController extends Controller
{
    public function userpage(Request $request)
    {
        $rigister_id=session('id');
        $rigister_tel=session('rigister_tel');
        $res=Rigister::get();
        return  view('userpage',['res'=>$res]);
    }
    public function writeaddr()
    {
        return view('writeaddr');
    }


}
