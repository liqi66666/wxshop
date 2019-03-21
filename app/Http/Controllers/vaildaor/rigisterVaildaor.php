<?php

$validator = Validator::make($request->all(), [
    'rigiter_tel' => 'required|digits:11|numeric|unique:shop_rigister',
    'rigiter_pwd' => 'required',
    'rigiter_yan' => 'required'
],[
    'rigiter_tel.required' => '请输入手机号',
    'rigiter_tel.digits' => '手机号必须为11位的纯数字',
    'rigiter_tel.numeric' => '手机号必须为11位的纯数字',
    'rigiter_tel.unique' => '手机号已存在',
    'rigiter_pwd.required' => '请输入密码',
    'rigiter_yan.required' => '请输入验证码',
]);
if($validator->fails()){
    $error=$validator->errors()->getMessages();
    $errors=[];
    foreach($error as $k=>$v){
        $errors=$v[0];
    }
    return $errors;
}