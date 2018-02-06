<?php
namespace app\index\controller;
use think\Db;
use think\Controller;
use think\Session;

class Index extends Controller
{
    public function index()
    {
    	$data=Db::query('select * from (house left join house_type on house.house_type=house_type.house_type) left join td on house.house_td=td.house_td
');
    	
    	foreach ($data as $key => $value) {
    		$data[$key]["td_name"]=explode("|",$value["td_name"]);

    		// print_R($wdw);
    	}
    	
    	return $this->fetch("index",["data"=>$data]);
    }

    public function search()
    {
    	$post=$_GET;


    	print_R($post);
    }

}
