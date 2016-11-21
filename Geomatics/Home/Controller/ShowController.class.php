<?php
namespace Home\Controller;
use Think\Controller;
/*
 * 显示公告的控制器
 */
class ShowController extends Controller {
//	直接显示主页三大板块的文章
    public function index(){
    	$id=$_GET['id'];
		$info=M('content')->where(array('id'=>$id))->find();
		$this->assign('info',$info);
		$this->display();
    }
//	判断点击的导航栏是列表还是文章
	public function showNav() {
		$map = $_GET['id'];
		$type = M('Nav')->where(array('id'=>$map))->getField('type');
		if($type=='列表'){
			redirect(U('Show/showNavList',array('id'=>$map)));
		}elseif($type='文章'){
			redirect(U('Show/showNavArt',array('id'=>$map)));
		}
		
	}
//	显示优秀展示的文章
	public function excellent(){
    	$id=$_GET['id'];
		$info=M('excellent')->where(array('id'=>$id))->find();
		$this->assign('info',$info);
		$this->display();
    }
//	显示导航里的文章
	public function showNavArt(){
    	$id=$_GET['id'];
		$info=M('nav')->where(array('id'=>$id))->find();
		$this->assign('info',$info);
		$this->display();
    }
//	显示导航栏列表项里的文章
	public function showNavListArt(){
    	$id=$_GET['id'];
		$info=M('navlist')->where(array('id'=>$id))->find();
		$this->assign('info',$info);
		$this->display();
    }
//	显示导航栏里的列表项
	public function showNavList(){
		if(!$_GET['p']){
    		$_GET['p']=1;
    	}
		$id=$_GET['id'];
		$root=M('nav')->where(array('id'=>$id))->getfield('root');
		$this->assign('root',$root);
		$brother=M('nav')->where(array('root'=>$root))->field('id,title')->select();
//		dump($brother);
//		die;
		$this->assign('brother',$brother);
		$title=M('nav')->where(array('id'=>$id))->getfield('title');
		$this->assign('title',$title);
		$list=M('navlist')->where(array('root'=>$title))->field('id,title,date')->page($_GET['p'],13)->order('date desc')->select();
		$this->assign('list',$list);
		$count= M('navlist')->where(array('root'=>$title))->count();// 查询满足要求的总记录数
		$p= new \Think\Page($count,13);// 实例化分页类 传入总记录数和每页显示的记录数
		$show= $p->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
    	$this->display();
	}
}