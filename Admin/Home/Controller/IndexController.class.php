<?php
namespace Home\Controller;
use Think\Controller;
/*
 * 这个是后台的首页控制器
 */
class IndexController extends Controller {
    public function index(){
    	if(!cookie('adminId') || !cookie('adminName') || cookie('adminLevel')==null){
    		redirect(U('Login/index'));
    	}
		$this->display();
    }
}