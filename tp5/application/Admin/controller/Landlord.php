<?php
namespace app\Admin\controller;

use think\Db;
use think\Controller;
class Landlord extends Controller
{
    public function Index()
    {
        return view('index');
    }

    public function add()
    {
    	
    	$post=$_POST;
    	$post["create_time"]=time();
    	
    	// $post
    	$res=Db::name('Landlord')->insert($post);
    	if($res)
    	{
    		$this->success("添加成功",'landlord/select_landlord');
    	}
    	else
    	{
    		echo "添加失败";
    	}


    }
	public function select_landlord()
	{
		 $user_data= Db::table('landlord') ->select();
		 foreach ( $user_data as $key => $value) {
		 
		 	$user_data[$key]["create_time"]=date("Y-m-d",$value["create_time"]);
		 }

		return $this->fetch("select_landlord",["date"=>$user_data]);
	    
	   
	}

	public function del_landlord()
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
	public function u_landlord()
	{
		$id=$_GET["id"];
		return $this->fetch("updata",["data"=>$id]);
	}


	public function up_landlord()
	{
		// print_R();die;
		$id=$_POST["id"];
		$names=$_POST["names"];
		$phone=$_POST["phone"];
		$email=$_POST["email"];
		$res=	Db::table('landlord')
			   ->where('landlord_id', $id)
			   ->update(['names' => $names,'phone' =>$phone ,'email' =>$email ]);

		if($res)
    	{
    		$this->success("修改成功",'landlord/select_landlord');
    	}
    	else
    	{
    		$thid->error("修改失败");
    	}
	}
}
