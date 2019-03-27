<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Goods;
use App\Model\Category;
use Illuminate\Support\Facades\DB;

    class AllController extends Controller
{
        public function allshop(Request $request)
        {
            $res=Goods::get();
            $cate_id=$request->cate_id;
            $data=Category::get();
            return  view('allshops',['res'=>$res,'data'=>$data]);
        }

        public function allshopdo(Request $request){
            $cate_id=$request->cate_id;
            $goods_model=new Goods;
            $category_model=new category;
            $cate_data=$category_model->get();
            $cate_id=$request->cate_id;
            $content=$request->content;
            if(empty($content)){
                if($cate_id==0){
                    $goods_data=$goods_model->get();
                    return view('allshopstwo',['res'=>$goods_data]);
                }else{
                    $category_id=$this->cateInfoPid($cate_data,$cate_id);
                    $goods_data=$goods_model->whereIn('cate_id',$category_id)->get();
                    return view('allshopstwo',['res'=>$goods_data]);
                }
            }else{
                $goods_data=$goods_model->where('goods_name','like',"%$content%")->get();
                return view('allshopstwo',['res'=>$goods_data]);
            }
        }
        private function cateInfoPid($info,$pid){
                static $data=[];
                foreach($info as $v){
                    if($v['pid']==$pid){
                        $data[]=$v['cate_id'];
                        $this->cateInfoPid($info,$v['cate_id']);
                    }
                }
                return $data;
            }
        //价格
        public function price(Request $request)
        {

            $type=$request->type;
            if($type==1){
                $res=DB::table("shop_goods")->orderBy("self_price","desc")->get();

            }else{
                $res=DB::table("shop_goods")->orderBy("self_price","asc")->get();
            }
            //print_r($cate);die;
            return view("allshopstwo",['res'=>$res]);
        }
        //最新
        public function isnew()
        {
            $data=DB::table("shop_goods")->where("is_new","=","1")->get();
            //print_r($cate);die;
            return view("allshopstwo",['res'=>$data]);
        }

    }
