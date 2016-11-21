<?php
namespace Home\Controller;
use Think\Controller;
class ListController extends Controller {
//	最新公告列表
    public function zxgg(){
    	if(!$_GET['p']){
    		$_GET['p']=1;
    	}
		$list=M('content')->where(array('type'=>'最新公告'))->field('id,title,date')->page($_GET['p'],13)->order('id asc')->select();
		$this->assign('list',$list);
		$count= M('content')->where(array('type'=>'最新公告'))->count();// 查询满足要求的总记录数
		$p= new \Think\Page($count,13);// 实例化分页类 传入总记录数和每页显示的记录数
		$show= $p->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
    	$this->display();
    }
	//	学院动态列表
    public function xydt(){
    	if(!$_GET['p']){
    		$_GET['p']=1;
    	}
		$list=M('content')->where(array('type'=>'学院动态'))->field('id,title,date')->page($_GET['p'],13)->order('id asc')->select();
		$this->assign('list',$list);
		$count= M('content')->where(array('type'=>'学院动态'))->count();// 查询满足要求的总记录数
		$p= new \Think\Page($count,13);// 实例化分页类 传入总记录数和每页显示的记录数
		$show= $p->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
    	$this->display();
    }
	//	校内新闻列表
    public function xnxw(){
    	if(!$_GET['p']){
    		$_GET['p']=1;
    	}
		$list=M('content')->where(array('type'=>'校内新闻'))->field('id,title,date')->page($_GET['p'],13)->order('id asc')->select();
		$this->assign('list',$list);
		$count= M('content')->where(array('type'=>'校内新闻'))->count();// 查询满足要求的总记录数
		$p= new \Think\Page($count,13);// 实例化分页类 传入总记录数和每页显示的记录数
		$show= $p->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
    	$this->display();
    }
	//	下载园地列表
    public function download(){
    	if(!$_GET['p']){
    		$_GET['p']=1;
    	}
		$list=M('down')->page($_GET['p'],13)->order('id asc')->select();
		$this->assign('list',$list);
		$count= M('down')->count();// 查询满足要求的总记录数
		$p= new \Think\Page($count,13);// 实例化分页类 传入总记录数和每页显示的记录数
		$show= $p->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
    	$this->display();
    }
//	优秀事迹的列表
	public function excellentEvent(){
		if(!$_GET['p']){
    		$_GET['p']=1;
    	}
		$list=M('excellent')->where(array('type'=>'优秀事迹'))->page($_GET['p'],5)->order('id desc')->select();
		foreach($list as $key=>$val){
			$list[$key]['content']=trimall(strip_tags($val['content']));
		}
		$this->assign('list',$list);
		$list2=M('excellent')->field('id,title')->where(array('type'=>'优秀学生'))->page($_GET['p'],10)->order('id desc')->select();
		$this->assign('list2',$list2);
		$count= M('excellent')->where(array('type'=>'优秀事迹'))->count();// 查询满足要求的总记录数
		$p= new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数
		$show= $p->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
    	$this->display();
	}
//	优秀学生的列表
	public function excellentStudent(){
		if(!$_GET['p']){
    		$_GET['p']=1;
    	}
		$list=M('excellent')->where(array('type'=>'优秀学生'))->page($_GET['p'],5)->order('id desc')->select();
		foreach($list as $key=>$val){
			$list[$key]['content']=trimall(strip_tags($val['content']));
		}
		$this->assign('list',$list);
		$list2=M('excellent')->field('id,title')->where(array('type'=>'优秀事迹'))->order('id desc')->limit(10)->select();
		$this->assign('list2',$list2);
		$count= M('excellent')->where(array('type'=>'优秀学生'))->count();// 查询满足要求的总记录数
		$p= new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数
		$show= $p->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
    	$this->display();
	}
}