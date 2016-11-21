<?php
namespace Home\Controller;
use Think\Controller;
class CertificateController extends Controller {
//	德育分视图
    public function index(){
    	if(!cookie('stuName') || !cookie('stuId')){
    		$this->error('您还没有登陆，请登陆之后查看此板块');
    	}else{
			if(!$_GET['p']){
				$_GET['p']=1;
			}
			$stuList=M('character')->where(array('verify'=>'1'))->field('stuId')->distinct(TRUE)->order('stuId asc')->page($_GET['p'],18)->select();
			foreach($stuList as $key=>$val){
				$info=M('stu')->where(array('stuId'=>$stuList[$key]['stuid'],'verify'=>'1'))->find();
				$count=M('character')->where(array('stuId'=>$stuList[$key]['stuid'],'verify'=>'1'))->count();
				$listCount=M('character')->count();
				$allScore=M('character')->field('score')->where(array('stuId'=>$stuList[$key]['stuid'],'verify'=>'1'))->select();
				foreach($allScore as $k=>$v){
					if(trim($v['score'])!=null){
						$stuList[$key]['scoreCount']+=intval($v['score']);
					}
				}
				$stuList[$key]['count']=$count;
				$stuList[$key]['name']=$info['stuname'];
				$syuList[$key]['count'];
			}
			$p= new \Think\Page($listCount,18);// 实例化分页类 传入总记录数和每页显示的记录数
			$show= $p->show();// 分页显示输出
			$this->assign('page',$show);// 赋值分页输出
			$this->assign('stuList',$stuList);
	    	$this->display();
    	}
    }
//	素质拓展分视图
	public function certificate(){
		if(!cookie('stuName') || !cookie('stuId')){
    		$this->error('您还没有登陆，请登陆之后查看此板块');
    	}else{
			if(!$_GET['p']){
				$_GET['p']=1;
			}
			$stuList=M('certificate')->where(array('verify'=>'1'))->field('stuId')->distinct(TRUE)->order('stuId asc')->page($_GET['p'],18)->select();
			foreach($stuList as $key=>$val){
				$info=M('stu')->where(array('stuId'=>$stuList[$key]['stuid'],'verify'=>'1'))->find();
				$count=M('certificate')->where(array('stuId'=>$stuList[$key]['stuid'],'verify'=>'1'))->count();
				$listCount=M('certificate')->count();
				$allScore=M('certificate')->field('score')->where(array('stuId'=>$stuList[$key]['stuid'],'verify'=>'1'))->select();
				foreach($allScore as $k=>$v){
					if(trim($v['score'])!=null){
						$stuList[$key]['scoreCount']+=intval($v['score']);
					}
				}
				$stuList[$key]['count']=$count;
				$stuList[$key]['name']=$info['stuname'];
				$syuList[$key]['count'];
			}
			$p= new \Think\Page($listCount,18);// 实例化分页类 传入总记录数和每页显示的记录数
			$show= $p->show();// 分页显示输出
			$this->assign('page',$show);// 赋值分页输出
			$this->assign('stuList',$stuList);
	    	$this->display();
    	}
	}
	public function showCer(){
		$info=M('certificate')->where(array('stuId'=>$_GET['stuId'],'verify'=>'1'))->select();
		$this->assign('info',$info);
		$this->display();
	}
	public function showCha(){
		$info=M('character')->where(array('stuId'=>$_GET['stuId'],'verify'=>'1'))->select();
		$this->assign('info',$info);
		$this->display();
	}
}