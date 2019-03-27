<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Rigister;
use App\Model\Address;
class UserController extends Controller
{
    public function userpage(Request $request)
    {
        $rigister_id=session('id');
        if(empty($rigister_id)) {
            return view('login');
        }
        $rigister_tel=session('rigister_tel');
        $res=Rigister::get();
        return  view('userpage',['res'=>$res]);
    }
    //添加列表
    public function writeaddr()
    {

        return view('writeaddr');
    }
    //添加地址
    public function writeaddrdo(Request$request){

        $data=$request->obj;
        $rigister_id=session('id');
        $data['rigister_id']=$rigister_id;
        if($data['is_default']==1){
            //开启事务
            DB::beginTransaction(); //开启事务
            $result = Address::where('rigister_id',session("id"))->update(['is_default' => 2]);//改
            $res = Address::insert($data);//添

            if ($result !== false && $res) {
                DB::commit();  //提交
                echo 1;
            } else {
                DB::rollback();  //回滚
                echo 2;
            }
        }else{
            $res=Address::insert($data);
            if($res){
                echo 1;
            }else{
                echo 2;die;
            }
        }

    }
    //地址列表
    public function address()
    {

        $rigister_id=session('id');
        $res=Address::get();
        return view('address',['res'=>$res]);
    }
    //删除地址
    public function addressdel(Request $request)
    {
        $address_id=$request->address_id;
        $data=Address::where('address_id','=',$address_id)->delete();
        if($data){
            echo 1;
        }else{
            echo 2;
        }
    }
    //修改地址
    public function addressup(Request $request)
    {
        $address_id=$request->id;
        $res=Address::where('address_id',$address_id)->first();

      return view('addressup',['res'=>$res]);
    }
    //修改执行
    public function addressupdo(Request $request)
    {
        $data=$request->obj;
        $rigister_id=session('id');
        $data['rigister_id']=$rigister_id;
        $where=[
            'address_id'=>$data['address_id'],
            'rigister_id'=>$rigister_id
        ];
        if($data['is_default']==1){
            //开启事务
            DB::beginTransaction(); //开启事务
            $result=Address::where('rigister_id',session("id"))->update(['is_default' => 2]);//改
            $res =Address::where($where)->update($data);//添

            if ($result !== false && $res) {
                DB::commit();  //提交
                echo 1;
            } else {
                DB::rollback();  //回滚
                echo 2;
            }
        }else{
            $res=Address::where($where)->update($data);

            if($res){
                echo 1;
            }else{
                echo 2;die;
            }
        }

    }
    //修改默认
    public function addressmoren(Request $request)
    {
        $address_id=$request->address_id;
        $rigister_id=session('id');
        $where=[
            'address_id'=>$address_id,
            'rigister_id'=>$rigister_id
        ];
        $res2=Address::where('rigister_id',$rigister_id)->update(['is_default'=>2]);
        $res=Address::where($where)->update(['is_default'=>1]);
//        echo $address_id;
    }
}
