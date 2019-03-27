<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>填写收货地址</title>
    <meta content="app-id=984819816" name="apple-itunes-app" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <link href="{{url('css/comm.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{url('css/writeaddr.css')}}">
    <link rel="stylesheet" href="{{url('layui/css/layui.css')}}">
    <link rel="stylesheet" href="{{url('dist/css/LArea.css')}}">
</head>
<body>

<!--触屏版内页头部-->
<div class="m-block-header" id="div-header">
    <strong id="m-title">填写收货地址</strong>
    <a href="javascript:history.back();" class="m-back-arrow"><i class="m-public-icon"></i></a>
    <a href="#" id="save" class="m-index-icon">修改</a>
</div>
<div class=""></div>]
<!-- <form class="layui-form" action="">
  <input type="checkbox" name="xxx" lay-skin="switch">

</form> -->
<form class="layui-form" action="">
    <input type="hidden"  id="address_id" name="address_id"  value="{{$res['address_id']}}">
    <div class="addrcon">
        <ul>

            <li><em>收货人</em><input type="text" id="address_name" name="address_name" value="{{$res['address_name']}}" placeholder="请填写真实姓名"></li>
            <li><em>手机号码</em><input type="number"   id="address_tel"name="address_tel" value="{{$res['address_tel']}}" placeholder="请输入手机号"></li>
            <li><em>所在区域</em><input id="demo1" type="text"  class="city"  name="city"  value="{{$res['city']}}" placeholder="请选择所在区域"></li>
            <li class="addr-detail"><em>详细地址</em><input type="text" id="address_test"  value="{{$res['address_test']}}" name="address_test" placeholder="20个字以内" class="addr">

            </li>

        </ul>

        @if($res['is_default'   ]==1)
            <div class="setnormal"><span>已默认地址</span>
                <input type="checkbox" id="checked" name="is_default" checked lay-skin="switch">

            </div>
        @else
            <div class="setnormal"><span>设为默认地址</span>
                <input type="checkbox" id="checked" name="is_default" lay-skin="switch">  </div>
        @endif

    </div>
    <input type="hidden" id="_token" name="_token" value="<?php echo csrf_token()?>">
</form>

<!-- SUI mobile -->
<script src="{{url('dist/js/LArea.js')}}"></script>
<script src="{{url('dist/js/LAreaData1.js')}}"></script>
<script src="{{url('dist/js/LAreaData2.js')}}"></script>
<script src="{{url('js/jquery-1.11.2.min.js')}}"></script>
<script src="{{url('layui/layui.js')}}"></script>
<script>
    $(function(){
        $(document).on('click',"#save",function () {
            var obj={};
            obj.address_name = $("#address_name").val();
            obj.address_id = $("#address_id").val();
            obj.address_tel = $("#address_tel").val();
            obj.city = $(".city").val();
            obj.address_test = $("#address_test").val();
            var is_default = $("#checked").prop('is_default');
            var _token = $("#_token").val();
            var checked=$('#checked').prop('checked');
            if(checked==true){
                obj.is_default = 1;
            }else{
                obj.is_default = 2;
            }
            console.log(obj)
            $.get(
                "{{url('user/addressupdo')}}",
                {obj:obj,_token:_token},
                function(res){
                    if(res==1){
                        layer.msg('修改成功',{time:2000},function(){
                            location.href="{{url('user/address')}}";
                        });
                    }else{
                        layer.msg('修改失败', {icon: 2});
                    }
                }
            )
        })
    })
</script>
<script>
    //Demo
    layui.use('form', function(){
        var form = layui.form();

        //监听提交
        form.on('submit(formDemo)', function(data){
            layer.msg(JSON.stringify(data.field));
            return false;
        });

    });


    var area = new LArea();
    area.init({
        'trigger': '#demo1',//触发选择控件的文本框，同时选择完毕后name属性输出到该位置
        'valueTo':'#value1',//选择完毕后id属性输出到该位置
        'keys':{id:'id',name:'name'},//绑定数据源相关字段 id对应valueTo的value属性输出 name对应trigger的value属性输出
        'type':1,//数据源类型
        'data':LAreaData//数据源
    });


</script>


</body>
</html>
