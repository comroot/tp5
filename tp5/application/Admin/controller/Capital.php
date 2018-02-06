<?php
namespace app\Admin\controller;

use think\Db;
use think\Controller;
class Capital extends Controller
{
    public function Index()
    {
    	$user_data= Db::table('cap') ->select();
        return view('index',["data"=>$user_data]);
    }
     public function del()
     {
     	$id=$_GET["id"];
		$res=	Db::table('landlord')->where('landlord_id',$id)->delete();
		if($res)
    	{
    		$this->success("删除成功",'landlord/select_landlord');
    	}
    	else
    	{
    		$thid->error("删除失败");
    	}
     }


}




