<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Goods;
use App\Model\Category;
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
                return view('allshopstwo',['goods_data'=>$goods_data]);
            }else{
                $category_id=$this->cateInfoPid($cate_data,$cate_id);
                $goods_data=$goods_model->whereIn('cate_id',$category_id)->get();
                return view('allshopstwo',['goods_data'=>$goods_data]);
            }
        }else{
            $goods_data=$goods_model->where('goods_name','like',"%$content%")->get();
            return view('allshopstwo',['goods_data'=>$goods_data]);
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
}
