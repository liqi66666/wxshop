﻿@extends('master')
@section('title')
	李琦的商城
@endsection

@section('content')
	<div class="marginB" id="loadingPicBlock">
		<!--首页头部-->
		<div class="m-block-header" style="display: none">
			<div class="search"></div>
			<a href="/" class="m-public-icon m-1yyg-icon"></a>
		</div>
		<!--首页头部 end-->

		<!-- 关注微信 -->
		<div id="div_subscribe" class="app-icon-wrapper" style="display: none;">
			<div class="app-icon">
				<a href="javascript:;" class="close-icon"><i class="set-icon"></i></a>
				<a href="javascript:;" class="info-icon">
					<i class="set-icon"></i>
					<div class="info">
						<p>点击关注666潮人购官方微信^_^</p>
					</div>
				</a>
			</div>
		</div>

		<!-- 焦点图 -->
		<div class="hotimg-wrapper">
			<div class="hotimg-top"></div>
			<section id="sliderBox" class="hotimg">
				<ul class="slides" style="width: 600%; transition-duration: 0.4s; transform: translate3d(-828px, 0px, 0px);">
					<li style="width: 414px; float: left; display: block;" class="clone">
						<a href="http://weixin.1yyg.com/v27/products/23559.do?pf=weixin">
							<img src="https://img.1yyg.net/Poster/20170227170302909.png" alt="">
						</a>
					</li>
					<li class="" style="width: 414px; float: left; display: block;">
						<a href="http://weixin.1yyg.com/v40/GoodsSearch.do?q=%E5%B0%8F%E7%B1%B36&amp;pf=weixin">
							<img src="https://img.1yyg.net/Poster/20170609151005929.jpg" alt="">
						</a>
					</li>
					<li style="width: 414px; float: left; display: block;" class="flex-active-slide">
						<a href="http://weixin.1yyg.com/v40/GoodsSearch.do?q=%E6%B8%85%E5%87%89%E4%B8%80%E5%A4%8F&amp;pf=weixin"><img src="https://img.1yyg.net/Poster/20170605084728556.jpg" alt="">
						</a>
					</li>
					<li style="width: 414px; float: left; display: block;" class="">
						<a href="http://weixin.1yyg.com/v40/GoodsSearch.do?q=%E6%96%B0%E9%B2%9C%E6%B0%B4%E6%9E%9C&amp;pf=weixin"><img src="https://img.1yyg.net/Poster/20170518163741543.jpg" alt=""></a>
					</li>
					<li style="width: 414px; float: left; display: block;" class="">
						<a href="http://weixin.1yyg.com/v27/products/23559.do?pf=weixin">
							<img src="https://img.1yyg.net/Poster/20170227170302909.png" alt="">
						</a>
					</li>
					<li class="clone" style="width: 414px; float: left; display: block;">
						<a href="http://weixin.1yyg.com/v40/GoodsSearch.do?q=%E5%B0%8F%E7%B1%B36&amp;pf=weixin">
							<img src="https://img.1yyg.net/Poster/20170609151005929.jpg" alt="">
						</a>
					</li>
				</ul>
			</section>
		</div>

        <!--导航-->
        <div class="success-tip">
        	<div class="left-icon"></div>
        	<ul class="right-con">
				<li>
					<span style="color: #4E555E;">
						<a href="./index.php?i=107&amp;c=entry&amp;id=10&amp;do=notice&amp;m=weliam_indiana" style="color: #4E555E;">恭喜<span class="username">李琦</span>获得了<span>iphone7 红色 128G 闪耀你的眼</span></a>
					</span>
				</li>
				<li>
					<span style="color: #4E555E;">
						<a href="./index.php?i=107&amp;c=entry&amp;id=10&amp;do=notice&amp;m=weliam_indiana" style="color: #4E555E;">恭喜<span class="username">李琦</span>获得了<span>iphone8 红色 128G 闪耀你的眼</span></a>
					</span>
				</li>
				<li>
					<span style="color: #4E555E;">
						<a href="./index.php?i=107&amp;c=entry&amp;id=10&amp;do=notice&amp;m=weliam_indiana" style="color: #4E555E;">恭喜<span class="username">李琦</span>获得了<span>iphone9 红色 128G 闪耀你的眼</span></a>
					</span>
				</li>
			</ul>
        </div>

        <!-- 猜你喜欢 -->
        <div class="line guess">
        	<div class="hot-content">
        		<i></i>
        		<span>猜你喜欢</span>
        		<div class="l-left"></div>
        		<div class="l-right"></div>
        	</div>
        </div>
        <!--商品列表-->
        <div class="goods-wrap marginB">
            <ul id="ulGoodsList" class="goods-list clearfix">
				@foreach($res as $v)
            	<li id="23558" codeid="12751965" goodsid="23558" codeperiod="28436">
            		<a href="{{url('shop/shopcontent')}}/{{$v->goods_id}}" class="g-pic" >
            			<img class="lazy" name="goodsImg"  src="{{url('/goodsLogo\\')}}{{$v->goods_img}}"/>
					</a>
            		<p class="g-name">{{$v->goods_name}}</p>
            		<ins class="gray9">价值：￥{{$v->self_price}}</ins>
            		<div class="Progress-bar">
            			<p class="u-progress">
            				<span class="pgbar" style="width: 96.43076923076923%;">
            					<span class="pging"></span>
            				</span>
            			</p>

            		</div>
            		<div class="btn-wrap" name="buyBox" limitbuy="0" surplus="58" totalnum="1625" alreadybuy="1567">
            			<a href="javascript:;" class="buy-btn" codeid="12751965">立即潮购</a>
            			<div class="gRate" codeid="12751965" goods_id="{{$v->goods_id}}" canbuy="58" >
            				<a href="javascript:;"></a>
            			</div>
		</div>
            	</li>
				@endforeach
                    <input type="hidden" id="_token" name="_token" value="<?php echo csrf_token()?>">

            </ul>
            <div class="loading clearfix"><b></b>正在加载</div>
            <input type="hidden" id="_token" name="_token" value="<?php echo csrf_token()?>">
        </div>  
<!--底部-->
	<div class="footer clearfix">
    <ul>
        <li class="f_home"><a href="{{url('index/index')}}" class="hover"><i></i>潮购</a></li>
        <li class="f_announced"><a href="{{url('all/allshop')}}" ><i></i>所有商品</a></li>
        <li class="f_car"><a id="btnCart" href="{{url('shop/shopcart')}}" ><i></i>购物车</a></li>
        <li class="f_personal"><a href="{{url('user/userpage')}}" ><i></i>我的潮购</a></li>
    </ul>
</div>
	<div id="div_fastnav" class="fast-nav-wrapper">
    <ul class="fast-nav">
        <li id="li_menu" isshow="0">
            <a href="javascript:;"><i class="nav-menu"></i></a>
        </li>
        <li id="li_top" style="display: none;">
            <a href="javascript:;"><i class="nav-top"></i></a>
        </li>
    </ul>
    <div class="sub-nav four" style="display: none;">
        <a href="#"><i class="announced"></i>最新揭晓</a>
        <a href="#"><i class="single"></i>晒单</a>
        <a href="#"><i class="personal"></i>我的潮购</a>
        <a href="#"><i class="shopcar"></i>购物车</a>
    </div>
</div>
</div>
    <script src="{{url('js/jquery-1.8.3.min.js')}}"></script>
    <script>
		//添加购物车
        $(function(){
            layui.use('layer',function(){
                var layer=layui.layer;
                $(document).on('click','.gRate',function(){
                    var goods_id=$(this).attr('goods_id');
                    var _token=$('#_token').val();
                    $.post(
                        "{{url('shop/cartadd')}}",
                        {goods_id:goods_id,_token:_token},
                        function(res){
                            if(res==1){
                                layer.msg('添加购物车成功',{icon:1})
                            }else if(res==2){
                                layer.msg('添加购物车失败',{icon:2})
                            }else if(res==3){
                                layer.msg('请先登录',{icon:2,time:3000},function(){
                                    location.href="{{url('login/login')}}"
                                })
                            }
							//console.log(res)
                        }
                    )
                })
            })
        })

    </script>
		@endsection
		@section('my-js')

            $(function () {
                $('.hotimg').flexslider({
                    directionNav: false,   //是否显示左右控制按钮
                    controlNav: true,   //是否显示底部切换按钮
                    pauseOnAction: false,  //手动切换后是否继续自动轮播,继续(false),停止(true),默认true
                    animation: 'slide',   //淡入淡出(fade)或滑动(slide),默认fade
                    slideshowSpeed: 3000,  //自动轮播间隔时间(毫秒),默认5000ms
                    animationSpeed: 150,   //轮播效果切换时间,默认600ms
                    direction: 'horizontal',  //设置滑动方向:左右horizontal或者上下vertical,需设置animation: "slide",默认horizontal
                    randomize: false,   //是否随机幻切换
                    animationLoop: true   //是否循环滚动
                });
                setTimeout($('.flexslider img').fadeIn());
            });

    jQuery(document).ready(function() {
	   $("img.lazy").lazyload({
		   placeholder : "images/loading2.gif",
		   effect: "fadeIn",
	   });

	   // 返回顶部点击事件
	   $('#div_fastnav #li_menu').click(
		   function(){
			   if($('.sub-nav').css('display')=='none'){
				   $('.sub-nav').css('display','block');
			   }else{
				   $('.sub-nav').css('display','none');
			   }
			   
		   }
	   )
	   $("#li_top").click(function(){ 
		   $('html,body').animate({scrollTop:0},300);
		   return false; 
	   }); 

	   $(window).scroll(function(){
		   if($(window).scrollTop()>200){
			   $('#li_top').css('display','block');
		   }else{
			   $('#li_top').css('display','none');
		   }
		   
	   })
   });

		@endsection
