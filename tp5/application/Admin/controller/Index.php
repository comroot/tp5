<?php
namespace app\Admin\controller;

use think\Db;
use think\Controller;
use think\Session;
class Index extends Controller
{
    public function Index()
    {
        $user=Session::get('user');
     
     return $this->fetch('index',["data"=>$user]);
       
    }
    public function head()
    {
        return view('head');
    }
    public function left()
    {
        return view('left');
    }
    public function main()
    {
        return view('main');
    }
}
