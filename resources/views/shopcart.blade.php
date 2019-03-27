<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>购物车</title>
    <meta content="app-id=518966501" name="apple-itunes-app" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <link href="{{url('css/comm.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('css/cartlist.css')}}" rel="stylesheet" type="text/css" />
</head>
<body id="loadingPicBlock" class="g-acc-bg">
<input name="hidUserID" type="hidden" id="hidUserID" value="-1" />
<div>
    <!--首页头部-->
    <div class="m-block-header">
        <a href="/" class="m-public-icon m-1yyg-icon"></a>
        <a href="/" class="m-index-icon">编辑</a>
    </div>
    <!--首页头部 end-->
    <div class="g-Cart-list">
        <ul id="cartBody">
            <input type="hidden" id="_token" value="{{csrf_token()}}">

        @foreach($goods as $v)
            <li class="del" cart_id={{$v->cart_id}}>
                <s class="xuan current" cart_id={{$v->cart_id}}></s>
                <a class="fl u-Cart-img"  href="{{url('shop/shopcontent')}}/{{$v->goods_id}}">
                    <img src="{{url('/goodsLogo\\')}}{{$v->goods_img}}" border="0" alt="">
                </a>
                <div class="u-Cart-r">
                    <a href="" class="gray6">{{ $v->goods_name}}</a>

                    <span class="gray9">
                            <em></em>
                        </span>
                    <div>
                        <input type="text" class="pric" value={{$v->self_price}}>
                    </div>
                    <div class="num-opt">
                        <em class="num-mius dis min"><i></i></em>
                        <input class="text_box"  name="num" maxlength="6" type="text" value="{{$v->buy_num}}" codeid="12501977">
                        <em class="num-add add"><i></i></em>
                    </div>
                    <a href="javascript:;" name="delLink" cid="12501977" isover="0" class="z-del"  ><s class="delcart" goods_id={{$v->goods_id}}></s></a>
                </div>
            </li>
                @endforeach
        </ul>
        <div id="divNone" class="empty "  style="display: none"><s></s><p>您的购物车还是空的哦~</p><a href="https://m.1yyg.com" class="orangeBtn">立即潮购</a></div>
    </div>
    <div id="mycartpay" class="g-Total-bt g-car-new" style="">
        <dl>

            <dt class="gray6">
                <s class="quanxuan current"></s>全选
                <p class="money-total">合计<em class="orange total"><span>￥{{$price}}</span></em></p>


            </dt>
            <dd>
                <a href="javascript:;" id="a_payment"   class="remove" class="orangeBtn w_account remove">删除</a>
                <a href="javascript:;" id="a_payment" class="payment" class="orangeBtn w_account">去结算</a>
            </dd>

        </dl>
    </div>

    <div class="footer clearfix">
        <ul>
            <li class="f_home"><a href="{{url('index/index')}}" class="hover"><i></i>潮购</a></li>
            <li class="f_announced"><a href="{{url('all/allshop')}}" ><i></i>所有商品</a></li>
            <li class="f_car"><a id="btnCart" href="{{url('shop/shopcart')}}" ><i></i>购物车</a></li>
            <li class="f_personal"><a href="{{url('user/userpage')}}" ><i></i>我的潮购</a></li>
        </ul>
    </div>
    <script src="{{url('js/jquery-1.8.3.min.js')}}"></script>
    <script src="{{url('layui/layui.js')}}"></script>
    <!---商品加减算总数---->
    <script type="text/javascript">
        $(function () {
            $(".add").click(function () {
                var t = $(this).prev();
                t.val(parseInt(t.val()) + 1);
                GetCount();
            })
            $(".min").click(function () {
                var t = $(this).next();
                if(t.val()>1){
                    t.val(parseInt(t.val()) - 1);
                    GetCount();
                }
            })
        })
    </script>
    <script>
        // 全选
        $(".quanxuan").click(function () {
            if($(this).hasClass('current')){
                $(this).removeClass('current');

                $(".g-Cart-list .xuan").each(function () {
                    if ($(this).hasClass("current")) {
                        $(this).removeClass("current");
                    } else {
                        $(this).addClass("current");
                    }
                });
                GetCount();
            }else{
                $(this).addClass('current');

                $(".g-Cart-list .xuan").each(function () {
                    $(this).addClass("current");
                    // $(this).next().css({ "background-color": "#3366cc", "color": "#ffffff" });
                });
                GetCount();
            }


        });
        // 单选
        $(".g-Cart-list .xuan").click(function () {
            if($(this).hasClass('current')){
                $(this).removeClass('current');
            }else{
                $(this).addClass('current');
            }
            if($('.g-Cart-list .xuan.current').length==$('#cartBody li').length){
                $('.quanxuan').addClass('current');

            }else{
                $('.quanxuan').removeClass('current');
            }
            // $("#total2").html() = GetCount($(this));
            GetCount();
            //alert(conts);
        });
        //点击删除按钮
        $(document).on('click','.delcart',function(){
            var goods_id=$(this).attr('goods_id');
            var _token=$('#_token').val();
            $.post(
                "{{url('shop/delcart')}}",
                {goods_id:goods_id,_token:_token},
                function(res){
                    if(res==1){
                        alert('删除成功');
                        // layer.msg('删除成功',{icon:1,time:3000},function(){
                            history.go(0);
                        // })
                    }else{
                        // layer.msg('删除失败',{icoon:2})
                    }
                }
            )
        })
        //批删
        $('.remove').click(function(){
            var _li=$("s[class='xuan current']").parent('li');
            var _token=$('#_token').val();
            var goods_id='';
            _li.each(function (index) {
                goods_id+=$(this).attr('cart_id')+',';
            })
            $.post(
                "{{url('shop/somedel')}}",
                {cart_id:goods_id,_token:_token},
                function(res){
                    if(res==1){
                        alert('删除成功');
                        history.go(0);
                        //location.href="shopcart";
                    }else {
                        alert('删除失败');
                        //location.href="";
                    }
                }
            )
        })
        // 已选中的总额
        function GetCount() {
            var conts = 0;
            var aa = 0;
            var prices=0
            $(".g-Cart-list .xuan").each(function () {
                if ($(this).hasClass("current")) {
                    for (var i = 0; i < $(this).length; i++) {
                        conts += parseInt($(this).parents('li').find('input.text_box').val());
                        prices += parseInt($(this).parents('li').find('input.pric').val());
                        // aa += 1;
                    }
                }
            });

            $(".total").html('<span>￥</span>'+(conts)*(prices).toFixed(2));
        }
        //结算
        $('.payment').click(function(){
            var cart_id='';
            $('.current').each(function(){
                cart_id+=$(this).attr('cart_id')+',';
            })

            $.post(
                "/shop/pay",
                {_token:'{{csrf_token()}}',cart_id:cart_id},
                function(res){
                    console.log(res);

                    location.href='/shop/payment/'+res;

                }
            )
        })
        GetCount();
    </script>
</body>
</html>
