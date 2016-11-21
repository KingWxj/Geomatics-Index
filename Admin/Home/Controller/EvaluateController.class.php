<?php
namespace Home\Controller;
use Think\Controller;
/*
 * 这个是后台的评优评先内容控制器
 * 和素质拓展分评分控制器
 */
class EvaluateController extends Controller {
//	进行登录有效性验证
	public function _initialize(){
		if(!cookie('adminId') || !cookie('adminName') || cookie('adminLevel')==null){
    		$this->error('您的登录信息已失效，请重新登录！',U('Login/index'),1);
    	}
	}
//	评优评先发布文章首页
    public function index(){
    	if(!cookie('adminId') || !cookie('adminName'))	redirect(U('Login/index'));
		$info=M('evaluate')->where(array('id'=>'1'))->find();
		$this->assign('info',$info);
		$this->display();
    }
//	执行发布与更新的方法
	public function update(){
		if(empty(trim($_POST['content'])) || empty(trim($_POST['date'])) || empty(trim($_POST['title'])) || empty(trim($_POST['info']))){
			$this->error('信息不完整！');
		}
		$info=array();
		$info['title']=$_POST['title'];
		$info['info']=$_POST['info'];
		$info['date']=$_POST['date'];
		$info['content']=$_POST['content'];
		$update=M('evaluate')->where(array('id'=>$_POST['id']))->save($info);
		if($update){
			$this->success('更新成功！',U('Evaluate/index'),1);
		}else{
			$this->error('更新失败！',U('Evaluate/index'),1);
		}
	}
//	查看已上传证书学生的列表，素质拓展分
	public function showStuCer(){
		$map['verify']=array('lt','2');
		$stuList=M('certificate')->where($map)->field('stuId')->distinct(TRUE)->order('stuId asc')->select();
		foreach($stuList as $key=>$val){
			$info=M('stu')->where(array('stuId'=>$stuList[$key]['stuid'],'verify'=>'1'))->find();
			$count1=M('certificate')->where(array('stuId'=>$stuList[$key]['stuid'],'verify'=>'1'))->count();
			$count01=M('certificate')->where(array('stuId'=>$stuList[$key]['stuid'],$map))->count();
			$allScore=M('certificate')->field('score')->where(array('stuId'=>$stuList[$key]['stuid'],'verify'=>'1'))->select();
			foreach($allScore as $k=>$v){
				if(trim($v['score'])!=null){
					$stuList[$key]['scoreCount']+=intval($v['score']);
				}
			}
			$stuList[$key]['count1']=$count1;
			$stuList[$key]['count01']=$count01;
			$stuList[$key]['name']=$info['stuname'];
		}
//		dump($stuList);
//		die;
		$this->assign('stuList',$stuList);
		$this->display();
	}
//	查看某个学生的详细证书信息，填写分数，需要传入学生的学号stuId，评优评先
	public function showCertificate(){
		$map['verify']=array('lt','2');
		$map['stuId']=$_GET['stuId'];
		$allCertiflcate=M('certificate')->where($map)->select();
		$this->assign('allCertificate',$allCertiflcate);
		$this->display();
	}
//	执行评分，收集后台的打分，并判断权限，更新分数详情
	public function runEvaluateCer(){
		$level=M('certificate')->where(array('id'=>$_POST['id']))->find();
//		如果管理员的等级低于当前的评分等级,4是未评分
		if($level['scorelevel']<cookie('adminLevel')){
			echo '抱歉，该证书已经通过更高级别的管理员的评分，您无权修改！';
		}elseif(!cookie('adminId') || !cookie('adminName') || cookie('adminLevel')==null){
			$this->error('您的登录信息已失效，请重新登录！',U('Login/index'),1);
		}else{
			if($_POST['id']!=null && trim($_POST['score'])!=null){
				$fix=M('certificate')->where(array('id'=>$_POST['id']))->save(array('verify'=>'1','score'=>$_POST['score'],'scoreLevel'=>cookie('adminLevel')));
				echo $fix ? '评分成功！' : '评分失败！';
			}else{
				echo '您未填写评分！';
			}
		}
	}

	//	查看已上传证书学生的列表，德育分
	public function showStuCha(){
		$map['verify']=array('lt','2');
		$stuList=M('character')->where($map)->field('stuId')->distinct(TRUE)->order('stuId asc')->select();
		foreach($stuList as $key=>$val){
			$info=M('stu')->where(array('stuId'=>$stuList[$key]['stuid'],'verify'=>'1'))->find();
			$count1=M('character')->where(array('stuId'=>$stuList[$key]['stuid'],'verify'=>'1'))->count();
			$count01=M('character')->where(array('stuId'=>$stuList[$key]['stuid'],$map))->count();
			$allScore=M('character')->field('score')->where(array('stuId'=>$stuList[$key]['stuid'],'verify'=>'1'))->select();
			foreach($allScore as $k=>$v){
				if(trim($v['score'])!=null){
					$stuList[$key]['scoreCount']+=intval($v['score']);
				}
			}
			$stuList[$key]['count1']=$count1;
			$stuList[$key]['count01']=$count01;
			$stuList[$key]['name']=$info['stuname'];
			$syuList[$key]['count'];
		}
//		dump($stuList);
//		die;
		$this->assign('stuList',$stuList);
		$this->display();
	}
//	查看某个学生的详细证书信息，填写分数，需要传入学生的学号stuId，德育分
	public function showCharacter(){
		$map['verify']=array('lt','2');
		$map['stuId']=$_GET['stuId'];
		$allCertiflcate=M('character')->where($map)->select();
		$this->assign('allCertificate',$allCertiflcate);
		$this->display();
	}
//	执行评分，收集后台的打分，并判断权限，更新分数详情
	public function runEvaluateCha(){
		$level=M('character')->where(array('id'=>$_POST['id']))->find();
//		如果管理员的等级低于当前的评分等级,4是未评分
		if($level['scorelevel']<cookie('adminLevel')){
			echo '抱歉，该证书已经通过更高级别的管理员的评分，您无权修改！';
		}else{
			if($_POST['id']!=null && trim($_POST['score'])!=null){
				$fix=M('character')->where(array('id'=>$_POST['id']))->save(array('verify'=>'1','score'=>$_POST['score'],'scoreLevel'=>cookie('adminLevel')));
				echo $fix ? '评分成功！' : '评分失败！';
			}else{
				echo '您未填写评分！';
			}
		}
	}
}