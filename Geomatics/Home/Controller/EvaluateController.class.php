<?php
namespace Home\Controller;
use Think\Controller;
class EvaluateController extends Controller {
    public function index(){
    	$info=M('evaluate')->where(array('id'=>'1'))->find();
		$this->assign('info',$info);
    	$this->display();
    }
}