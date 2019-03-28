<!DOCTYPE html>
<html lang="en">
<head>
    <title>商品列表</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta content="app-id=518966501" name="apple-itunes-app" />
    <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no" name="viewport" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <link rel="stylesheet" href="{{url('css/mui.min_1.css')}}">
        <link href="{{url('css/comm.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('css/goods.css')}}" rel="stylesheet" type="text/css" />
</head>

<body class="g-acc-bg" fnav="0" style="position: static">
<div class="page-group">
    <div id="page-infinite-scroll-bottom" class="page" id="seacr">
    
        <!--触屏版内页头部-->
        <div class="m-block-header" id="div-header" style="display: none">
            <strong id="m-title"></strong>
            <a href="javascript:history.back();" class="m-back-arrow"><i class="m-public-icon"></i></a>
            <a href="/" class="m-index-icon"><i class="m-public-icon"></i></a>
        </div>

        <div class="pro-s-box thin-bor-bottom" id="divSearch">

            <input type="text" name="search" placeholder="输入“汽车”试试" id="search" style="width: 500px" value="{{$search}}" />
            <input type="button"   id="btn" value="搜索">

        </div>
        <div class="all-list-wrapper">

            <div class="menu-list-wrapper" id="divSortList">

                <ul id="goods_data" class="list"><li sortid='0' class='current'>
                        <span class='items'>全部商品</span></li>
                    @foreach($data as $v)
                    <li sortid='100' reletype='1' linkaddr=''>
                        <span  class='items' cate_id="{{$v->cate_id}}">{{$v->cate_name}}
                        </span></li>
                    @endforeach
                    <input type="hidden" id="_token" name="_token" value="<?php echo csrf_token()?>">
                </ul>
            </div>


        <div class="good-list-wrapper">
            <div class="good-menu thin-bor-bottom">
                <ul class="good-menu-list" id="ulOrderBy">
                    <li orderflag="20" id="is_new" ><a href="javascript:;">新品</a>
                        <span class="i-wrap" >
                                <i class="up"  ></i>
                                <i class="down"  ></i></span></li>
                    <li orderflag="30">
                        <a href="javascript:;" id="self_price">价值</a>
                        <span class="i-wrap"><i class="up"></i>
                                <i class="down"></i></span></li>
                    <!--价值(由高到低30,由低到高31)-->
                </ul>
            </div>
                <div id="data">
                <div class="good-list-inner">
                    <div id="pullrefresh" class="good-list-box  mui-content mui-scroll-wrapper">
                        <div class="goodList mui-scroll">
                            <ul id="ulGoodsList" class="mui-table-view mui-table-view-chevron">
                                @foreach($res as $v)
                                <li id="23468">
                                    <span class="gList_l fl">
                                    <a href="{{url('shop/shopcontent')}}/{{$v->goods_id}}" ></a>
                                       <img class="lazy" name="goodsImg"  src="{{url('/goodsLogo\\')}}{{$v->goods_img}}" >
                                    </span>
                                    <div class="gList_r">
                                        <h3 class="gray6">{{$v->goods_name}}</h3>
                                        </a>
                                        <em class="gray9">价值：￥{{$v->self_price}}</em>
                                        <div class="gRate">
                                            <div class="Progress-bar">
                                                <p class="u-progress">
                                                    <span style="width: 91.91286930395593%;" class="pgbar">
                                                        <span class="pging"></span>
                                                    </span>
                                                </p>
                                                <ul class="Pro-bar-li">
                                                    <li class="P-bar01"><em>7342</em>已参与</li>
                                                    <li class="P-bar02"><em>7988</em>总需人次</li>
                                                    <li class="P-bar03"><em>646</em>剩余</li>
                                                </ul>
                                            </div>
                                            <a codeid="12785750" class="gRate" canbuy="646"  goods_id="{{$v->goods_id}}"><s class="gRate"></s></a>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                    <input type="hidden" id="_token" name="_token" value="<?php echo csrf_token()?>">
                            </ul>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
<div class="footer clearfix">
            <ul>
                <li class="f_home"><a href="{{url('index/index')}}" ><i></i>潮购</a></li>
                <li class="f_announced"><a href="/v41/lottery/" class="hover"><i></i>全部商品</a></li>
                <li class="f_car"><a id="btnCart" href="{{url('shop/shopcart')}}" ><i></i>购物车</a></li>
                <li class="f_personal"><a href="{{url('user/userpage')}}" ><i></i>我的潮购</a></li>
            </ul>
        </div>
    </div>
<script src="{{url('js/jquery-1.11.2.min.js')}}"></script>
<script src="{{url('layui/layui.js')}}"></script>
<script src="{{url('js/lazyload.min.js')}}"></script>
<script src="{{url('js/mui.min.js')}}"></script>
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
    //最新
    $(document).on('click',"#is_new",function(){
        var _token=$("#_token").val();
        $(this).css("color",'red');
        $("#self_price").css("color",'');
        $.post(
            "{{url('all/isnew')}}",
            {_token:_token},
            function(res){
                $(".good-list-inner").html(res);
            }
        )
    });
    //价格
    $(document).on('click',"#self_price",function(){
        var _token=$("#_token").val();
        var self_price=$(this).next().html();
        $("#is_new").css("color",'');
        var type='';
        if(self_price=='↑'){
            type=1;
            $(this).next().html("↓");
        }else{
            type=2;
            $(this).next().html("↑");
        }
        $(this).css("color",'red');
        $.post(
            "{{url('all/price')}}",
            {_token:_token,type:type},
            function(res){
                $(".good-list-inner").html(res);
            }
        )
    });
    // 搜索
    $('#btn').click(function () {
       var search=$('#search').val();
      $.ajax({
          url:"/all/allshop",
          type:'get',
          data:{search:search,_token:'{{csrf_token()}}'},
          success:function (res) {
            $(".page").html(res)
          }
          })
    })
</script>

<script>
    // 点击切换类别
    $('#sortListUl li').click(function(){
        $(this).addClass('current').siblings('li').removeClass('current');
    })
    $(function(){
        $(document).on('click','.items',function(){
            var id=$(this).attr('cate_id');
            console.log(id);
            console.log(id);
            $.get(
                "{{url('all/allshopdo')}}",
                {cate_id:id},
                function(res){
                    console.log(res);
                    $('#data').html(res);
                }
            )
        })
    })
</script>
<script>
    mui.init({
        pullRefresh: {
            container: '#pullrefresh',
            down: {
                contentdown : "下拉可以刷新",//可选，在下拉可刷新状态时，下拉刷新控件上显示的标题内容
                contentover : "释放立即刷新",//可选，在释放可刷新状态时，下拉刷新控件上显示的标题内容
                contentrefresh : "正在刷新...",
                callback: pulldownRefresh
            },
            up: {
                contentrefresh: '正在加载...',
                callback: pullupRefresh
            }
        }
    });
    /**
     * 下拉刷新具体业务实现5
     */
    function pulldownRefresh() {
        setTimeout(function() {
            var table = document.body.querySelector('.mui-table-view');
            var cells = document.body.querySelectorAll('.mui-table-view-cell');
            for (var i = cells.length, len = i + 3; i < len; i++) {
                var li = document.createElement('li');
                var str='';
                // li.className = 'mui-table-view-cell';
                str += '<span class="gList_l fl">';        
                str += '<img class="lazy" data-original="https://img.1yyg.net/GoodsPic/pic-200-200/20160908104402359.jpg" src="https://img.1yyg.net/GoodsPic/pic-200-200/20160908104402359.jpg" style="display: block;"/>';
                str += '</span>';
                str += '<div class="gList_r">';
                str += '<h3 class="gray6">(第'+i+'云)苹果（Apple）iPhone 7 Plus 256G版 4G手机</h3>';        
                str += '<em class="gray9">价值：￥7988.00</em>';
                str += '<div class="gRate">';           
                str += '<div class="Progress-bar">'    
                str += '<p class="u-progress">';
                str += '<span style="width: 91.91286930395593%;" class="pgbar">';
                str += '<span class="pging"></span>';
                str += '</span>';
                str += '</p>';                
                str += '<ul class="Pro-bar-li">';
                str += '<li class="P-bar01"><em>7342</em>已参与</li>';
                str += '<li class="P-bar02"><em>7988</em>总需人次</li>';
                str += '<li class="P-bar03"><em>646</em>剩余</li>';
                str += '</ul>';            
                str += '</div>';           
                str += '<a codeid="12785750" class="" canbuy="646"><s></s></a>';        
                str += '</div>';    
                str += '</div>';
                //下拉刷新，新纪录插到最前面；
                li.innerHTML = str;
                table.insertBefore(li, table.firstChild);
            }
            mui('#pullrefresh').pullRefresh().endPulldownToRefresh(); //refresh completed
        }, 1500);
    }
    var count = 0;
    /**
     * 上拉加载具体业务实现
     */
    function pullupRefresh() {
        setTimeout(function() {
            mui('#pullrefresh').pullRefresh().endPullupToRefresh((++count > 2)); //参数为true代表没有更多数据了。
            var table = document.body.querySelector('.mui-table-view');
            var cells = document.body.querySelectorAll('.mui-table-view-cell');
            for (var i = cells.length, len = i + 20; i < len; i++) {
                var li = document.createElement('li');
                // li.className = 'mui-table-view-cell';
                var str='';
                str += '<span class="gList_l fl">';        
                str += '<img class="lazy" data-original="https://img.1yyg.net/GoodsPic/pic-200-200/20160908104402359.jpg" src="https://img.1yyg.net/GoodsPic/pic-200-200/20160908104402359.jpg" style="display: block;"/>';
                str += '</span>';
                str += '<div class="gList_r">';
                str += '<h3 class="gray6">(第'+i+'云)苹果（Apple）iPhone 7 Plus 256G版 4G手机</h3>';        
                str += '<em class="gray9">价值：￥7988.00</em>';
                str += '<div class="gRate">';           
                str += '<div class="Progress-bar">'    
                str += '<p class="u-progress">';
                str += '<span style="width: 91.91286930395593%;" class="pgbar">';
                str += '<span class="pging"></span>';
                str += '</span>';
                str += '</p>';                
                str += '<ul class="Pro-bar-li">';
                str += '<li class="P-bar01"><em>7342</em>已参与</li>';
                str += '<li class="P-bar02"><em>7988</em>总需人次</li>';
                str += '<li class="P-bar03"><em>646</em>剩余</li>';
                str += '</ul>';            
                str += '</div>';           
                str += '<a codeid="12785750" class="" canbuy="646"><s></s></a>';        
                str += '</div>';    
                str += '</div>';
                li.innerHTML = str;
                table.appendChild(li);
            }
        }, 1500);
    }
    // if (mui.os.plus) {
    //     mui.plusReady(function() {
    //         setTimeout(function() {
    //             mui('#pullrefresh').pullRefresh().pullupLoading();
    //         }, 1000);

    //     });
    // } 
    // else {
    //     mui.ready(function() {
    //         mui('#pullrefresh').pullRefresh().pullupLoading();
    //     });
    // }
    $(function(){
        layui.use('layer',function(){
            var layer=layui.layer;
            $('#items').click(function(){
                var id=$('#cate').val();
                $.get(
                    '{{url('exam/indexdel')}}',
                    {goods_id:goods_id},
                    function(res){
                    }
                )
            })
        })

    })
</script>

</body>
</html>

