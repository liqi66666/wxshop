﻿<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>登录</title>
    <meta content="app-id=984819816" name="apple-itunes-app" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <link href="{{url('css/comm.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('css/login.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('css/vccode.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{url('js/jquery-1.8.3.min.js')}}" language="javascript" type="text/javascript"></script>
</head>
<body>
<!--触屏版内页头部-->
<div class="m-block-header" id="div-header">
    <strong id="m-title">登录</strong>
    <a href="javascript:history.back();" class="m-back-arrow"><i class="m-public-icon"></i></a>
    <a href="/" class="m-index-icon"><i class="home-icon"></i></a>
</div>

<div class="wrapper">
    <div class="registerCon">
        <div class="binSuccess5">
            <ul>
                <li class="accAndPwd">
                    <dl>
                        <div class="txtAccount">
                            <input id="txtAccount" type="text" name="rigister_tel" class="txtAccount" placeholder="请输入您的手机号码/邮箱"><i></i>
                        </div>
                        <cite class="passport_set" style="display: none"></cite>
                    </dl>
                    <dl>
                        <input id="txtPassword" type="password" name="rigister_pwd" class="txtPassword" placeholder="密码" value="" maxlength="20" /><b></b>
                    </dl>
                    <dl>
                        <input id="txtCode" type="text" name="login_yan" class="txtYan" placeholder="验证" value="" maxlength="4" /><b></b>
                        <img src="{{url('/verify/create')}}"  id="img" alt="">
                    </dl>
                </li>
            </ul>
            <a id="btnLogin" href="javascript:;" class="orangeBtn loginBtn">登录</a>
        </div>
        <div class="forget">
            <a href="https://m.1yyg.com/v44/passport/FindPassword.do">忘记密码？</a><b>

            </b>
            {{--<a href="https://m.1yyg.com/v44/passport/register.do?forward=https%3a%2f%2fm.1yyg.com%2fv44%2fmember%2f">新用户注册</a>--}}
            <a href="{{url('rigister/rigister')}}">新用户注册</a>
        </div>
    </div>
    <div class="oter_operation gray9" style="display: none;">
        <p>登录666潮人购账号后，可在微信进行以下操作：</p>
        1、查看您的潮购记录、获得商品信息、余额等<br />
        2、随时掌握最新晒单、最新揭晓动态信息
    </div>
</div>
        
<div class="footer clearfix" style="display:none;">
    <ul>
        <li class="f_home"><a href="/v44/index.do" ><i></i>潮购</a></li>
        <li class="f_announced"><a href="/v44/lottery/" ><i></i>最新揭晓</a></li>
        <li class="f_single"><a href="/v44/post/index.do" ><i></i>晒单</a></li>
        <li class="f_car"><a id="btnCart" href="/v44/mycart/index.do" ><i></i>购物车</a></li>
        <li class="f_personal"><a href="/v44/member/index.do" ><i></i>我的潮购</a></li>
    </ul>
</div>
</body>
</html>

<script>
    //验证
    $(function(){
        $(document).on('click','#btnLogin',function(){
            var rigister_tel=$('#txtAccount').val();
            var rigister_pwd=$('#txtPassword').val();
            var login_code=$('#txtCode').val();
            if(rigister_tel==''){
                alert('请输入账号');
                return false;
            }
            if(rigister_pwd==''){
                alert('请输入密码');
                return false;
            }
            if(login_code==''){
                alert('请输入验证码');
                return false;
            }
            $.get(
                "{{url('login/logindo')}}",
                {rigister_tel:rigister_tel,rigister_pwd:rigister_pwd,login_code:login_code},
                function(res){
                    if(res==1){
                        alert('用户名不存在');
                    }else if(res==2){
                        alert('密码错误');
                    }else if(res==3){
                        alert('登录成功');
                        location.href="{{url('index/index')}}";
                    }else if(res==4){
                        alert('验证码错误');
                    }

                }
            )
        })
    })
    //点击图片
    $('#img').click(function(){
        $(this).attr('src',"{{url('/verify/create')}}"+"?"+Math.random());
    });
</script>

