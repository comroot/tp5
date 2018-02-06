<?php
namespace app\Admin\controller;

use think\Db;
use think\Controller;
use think\Session;
class Login extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function sign()
    {
    	$name=$_POST["user"];
    	$pwd=$_POST['pwd'];
    	// print_r($pwd);die;
		$user=Session::get("user");

		if($user['num']==3)
		{
			$map['error']=4;
		}
		else
		{
		 $user_data= Db::table('user')
	    ->where('username',$name)
	    ->where('pwd',$pwd)
	    ->find();

		  		

		  	if($user_data)
		  	{
		  		$user["num"]=0;
		  		$user["lasttime"]=0;
		  		$user["username"]=$name;
		  		//判断是否为当天
		  		
				Session::set("user",$user);
				//随机字符串
				
				

				$map['error']=0;	
		  	}
		  	else
		  	{
		  		
				$user=Session::get("user");
				if(date('Y-m-d',$user['lasttime'])!=date('Y-m-d'))
		  		{
					$user["num"]=0;
		  			$user["lasttime"]=0;
		  			Session::set("user",$user);

		  			$map['error']=1;
				}	
				if($user['num']==3)
				{
					$map['error']=4;
				}
				else
				{
					$arr["num"]=$user['num']+1;
					$arr['lasttime']=time();
					Session::set("user",$arr);
					$map['error']=1;
				}
		  	}
		}
		echo json_encode($map);
    }
}
