<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Goods;
use App\Model\Cart;
class ShopController extends Controller
{

    public function shopcontent($goods_id)
    {

        $res=Goods::where('goods_id',$goods_id)->first();

        return  view('shopcontent',['res'=>$res]);
    }
    //添加购物车
    public function cartadd(Request $request)
    {
        $rigister_id=session('id');
        //echo $rigister_id;die;//23
        if(empty($rigister_id)) {
            echo 3;exit;
        }
        $goods_id=$request->goods_id;
        $onegoods=Cart::where(['goods_id'=>$goods_id,'rigister_id'=>$rigister_id])->first();
        if($onegoods!=''){
            $data=[
                'buy_num'=>$onegoods['buy_num']+1
            ];
            $res=Cart::where('goods_id',$goods_id)->update($data);
            }else{
                //echo $rigister_id;die;
            $data=[
                'rigister_id'=>$rigister_id,//1
                'goods_id'=>$goods_id
            ];
//            dump($data);die;
            $res=Cart::insert($data);
        }

        if($res){
            echo 1;
        }else{
            echo 2;exit;
        }

    }
    //购物车展示
    public function shopcart()
    {
        $rigister_id=session('id');
        if(empty($rigister_id)){
            return view('login');
        }else{
            $goods=Goods::join('shop_cart','shop_goods.goods_id','=','shop_cart.goods_id')->where('rigister_id',$rigister_id)->get();
            //dd($goods);
            $price=0;
            foreach($goods as $v){
                $price+=$v['self_price']*$v['buy_num'];
            }
        }
        return view('shopcart',['goods'=>$goods,'price'=>$price]);
    }
    //
    public function delcart(Request $request)
    {
        $goods_id=$request->goods_id;

        $data=Cart::where('goods_id','=',$goods_id)->delete();
        if($data){
            echo 1;
        }else{
            echo 2;
        }
}
        //批删
    public function somedel(Request $request)
    {
        $cart_id=explode(',',rtrim($request->cart_id,','));
        $res=Cart::whereIn('cart_id',$cart_id)->delete();
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }



}
