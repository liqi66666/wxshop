<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Rigister;
class LoginController extends Controller
{
    public function login()
    {
        return  view('login');
    }
    public function logindo(Request $request)
    {
        $rigister_tel=$request->rigister_tel;
        $rigister_pwd=$request->rigister_pwd;
        $code=$request->login_code;
        $res=rigister::where('rigister_tel',$rigister_tel)->first();
        if(session('verifycode')!=$code){
            echo 4;
        }else{
            if(empty($res)){
                echo 1;
            }else{
                $pwd=decrypt($res['rigister_pwd']);
                if($rigister_pwd==$pwd){
                    session(['id'=>$res['rigister_id'],'rigister_tel'=>$rigister_tel]);
                    echo 3;
                }else{
                    echo 2;
                }
            }
        }
    }

}
