<?php
namespace app\index\controller;
use think\Db;
use think\Controller;
use think\Session;

class Sel extends Controller
{
    public function index()
    {
    	// echo 1;die;
    	return $this->fetch("sel");
    }

    public function search()
    {
    	$post=$_GET;


    	print_R($post);
    }

}
