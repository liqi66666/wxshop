<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tools\Captcha;
class CaptchaController extends Controller
{
    public function create()
    {
        //验证码
        $verify=new Captcha();
        $code=$verify->getCode();
        $res=session(['verifycode'=>$code]);
        return $verify->doimg();
    }
}
