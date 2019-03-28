<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Rigister;
use Illuminate\Support\Facades\Validator;
use App\common;
class RigisterController extends Controller
{
    //注册页面
    public function rigister()
    {
        return  view('rigister');
    }
    //注册执行
    public function rigisterdo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'rigister_tel' => 'required|digits:11|numeric|unique:shop_rigister',
            'rigister_pwd' => 'required'
        ],[
            'rigister_tel.required' => '请输入手机号',
            'rigister_tel.digits' => '手机号必须为11位的纯数字',
            'rigister_tel.numeric' => '手机号必须为11位的纯数字',
            'rigister_tel.unique' => '手机号已存在',
            'rigister_pwd.required' => '请输入密码',
        ]);
        if($validator->fails()){
            $error=$validator->errors()->getMessages();
            $errors=[];
            foreach($error as $k=>$v){
                $errors=$v[0];
            }
            return $errors;
        }else{
            $arr = $request->all();
            $rigister_name=$request->rigister_name;
            $rigister_pwd=encrypt($request->rigister_pwd);
            //dump($rigister_pwd);die;
            $rigister_pwd1=$request->rigister_pwd1;
            $rigister_tel=$request->rigister_tel;
            $arr['rigister_pwd']=$rigister_pwd;
            unset($arr['_token']);
                $res=rigister::insert($arr);
            if($res){
                echo 1;
            }else{
                echo 2;
            }
        }


    }
    // 手机验证码
    public function doregister(Request $request){
        $mobile=13131853261;
        $this->sendMobile($mobile);
    }
    // 手机验证码
    private function sendMobile($mobile)
    {
        $host = env("MOBILE_HOST");
        $path = env("MOBILE_PATH");
        $method = "POST";
        $appcode = env("MOBILE_APPCODE");
        $headers = array();
        array_push($headers, "Authorization:APPCODE " . $appcode);
        $querys = "content=【创信】你的验证码是：5810，3分钟内有效！&mobile=".$mobile;
        $bodys = "";
        $url = $host . $path . "?" . $querys;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, true);
        if (1 == strpos("$".$host, "https://"))
        {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        }
        var_dump(curl_exec($curl));
    }
}
