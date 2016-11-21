<?php
namespace Home\Controller;
use Think\Controller;
/*
 * 这个是后台的各种审核控制器
 * 素质拓展分证书上传审核
 * 成绩修改审核
 */
class ExamineController extends Controller {
//	进行登录有效性验证
	public function _initialize(){
		if(!cookie('adminId') || !cookie('adminName') || cookie('adminLevel')==null){
    		$this->error('您的登录信息已失效，请重新登录！',U('Login/index'),1);
    	}
	}
//	成绩修改审核视图
	public function score(){
    	$fixScore=M('exam')->where(array('verify'=>0))->select();
//		var_dump($fixScore);
//		die;
		$this->assign('fixList',$fixScore);
		$this->display();
    }
	public function fixScore(){
		$info=M('exam')->where(array('id'=>$_POST['id']))->find();
		if($_POST['status']=='ok'){
			M('exam')->where(array('id'=>$_POST['id']))->save(array('score'=>$info['fixscore'],'verify'=>'1','fixScore'=>null));
		}elseif($_POST['status']=='ko'){
			M('exam')->where(array('id'=>$_POST['id']))->save(array('verify'=>'2',));
		}
	}
	
	
	
	
//	素质拓展分证书的回收站视图
    public function certificateBin(){
//  	素质拓展分
    	$cer_info=M('certificate')->where(array('verify'=>'2'))->order('stuId asc')->select();
		$data_cer=array();
		foreach($cer_info as $key=>$value){
			$data_cer[$key]=$value;
			$stu_info=M('stu')->where(array('stuId'=>$value['stuid']))->find();
			$data_cer[$key]['stuname']=$stu_info['stuname'];
		}
		$this->assign('certificate_list',$data_cer);
		$this->display();
    }
//	素质拓展分证书是否通过
	public function verifyCertificate(){
		if($_POST['status']=='ok'){
			M('certificate')->where(array('id'=>$_POST['id']))->save(array('verify'=>'0','score'=>null,'scoreLevel'=>'4'));
		}elseif($_POST['status']=='ko'){
			$level=M('certificate')->where(array('id'=>$_POST['id']))->find();
			if($level['scorelevel']<cookie('adminLevel')){
				echo '抱歉，该证书已经通过更高级别的管理员的评分，您无权修改！';
			}else{
				M('certificate')->where(array('id'=>$_POST['id']))->save(array('verify'=>'2','score'=>null,'scoreLevel'=>'4'));
			}
		}
	}
	
	
	
	
	//	德育分证书的回收站视图
    public function characterBin(){
//  	素质拓展分
    	$cha_info=M('character')->where(array('verify'=>'2'))->order('stuId asc')->select();
		$data_cha=array();
		foreach($cha_info as $key=>$value){
			$data_cha[$key]=$value;
			$stu_info=M('stu')->where(array('stuId'=>$value['stuid']))->find();
			$data_cha[$key]['stuname']=$stu_info['stuname'];
		}
		$this->assign('character_list',$data_cha);
		$this->display();
    }
//	德育分证书是否通过的控制器
	public function verifyCharacter(){
		if($_POST['status']=='ok'){
			M('character')->where(array('id'=>$_POST['id']))->save(array('verify'=>'0','score'=>null,'scoreLevel'=>'4'));
		}elseif($_POST['status']=='ko'){
			$level=M('character')->where(array('id'=>$_POST['id']))->find();
			if($level['scorelevel']<cookie('adminLevel')){
				echo '抱歉，该证书已经通过更高级别的管理员的评分，您无权修改！';
			}else{
				M('character')->where(array('id'=>$_POST['id']))->save(array('verify'=>'2','score'=>null,'scoreLevel'=>'4'));
			}
		}
	}
}