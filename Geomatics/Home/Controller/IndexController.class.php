<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$zxgg=M('content')->where(array('type'=>'最新公告'))->field('id,title,date')->order('date desc')->limit(5)->select();
		$this->assign('zxgg',$zxgg);
		$xnxw=M('content')->where(array('type'=>'校内新闻'))->field('id,title,date')->order('date desc')->limit(5)->select();
		$this->assign('xnxw',$xnxw);
		$xydt=M('content')->where(array('type'=>'学院动态'))->field('id,title,date')->order('date desc')->limit(8)->select();
		$this->assign('xydt',$xydt);
		$down=M('down')->field('id,title,route,date')->order('date desc')->limit(5)->select();
		$this->assign('down',$down);
		$imgtoggle = M('Imgtoggle')->order('id desc')->limit(4)->select();
		$this->assign('image' , $imgtoggle);
    	$this->display();
    }
}