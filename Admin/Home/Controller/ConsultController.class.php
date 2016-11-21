<?php
namespace Home\Controller;
use Think\Controller;
/*
 * 这个是后台的咨询小屋，也就是留言板（带回复功能）
 * 设置回复的匿名状态（是否匿名）
 * 删除留言
 */
class ConsultController extends Controller {
//	进行登录有效性验证
	public function _initialize(){
		if(!cookie('adminId') || !cookie('adminName') || cookie('adminLevel')==null){
    		$this->error('您的登录信息已失效，请重新登录！',U('Login/index'),1);
    	}
	}
//	后台咨询小屋模块的管理前端页面
	public function index(){
		$status=M('setting')->where(array('code'=>'noName'))->find();
		$this->assign('status',$status);
		$allTheme=M('Consult')->where(array('rootid'=>'0'))->order('date desc')->select();
		$this->assign('allTheme',$allTheme);
		$this->display();
	}
//	后台修改是否允许匿名的表单的处理者
	public function noName(){
		$status=$_POST['status'];
		if($status==null){
			redirect(U('Consult/index'));
		}
		if(M('setting')->where(array('code'=>'noName'))->save(array('value'=>$status))){
			$this->success('修改成功！',U('Consult/index'),1);
		}else{
			$this->error('修改失败！请重试',U('Consult/index'),1);
		}
	}
	public function showFull(){
		$root=M('Consult')->where(array('id'=>$_GET['id']))->find();
		if($root['uid']!=null){
			$rootInfo=M('stu')->where(array('stuId'=>$root['uid']))->find();
			$root['name']=$rootInfo['stuname'];
		}
		$this->assign('root',$root);
		$floor=M('Consult')->where(array('rootid'=>$_GET['id']))->select();
		$this->assign('floor',$floor);
		$this->display();
	}
	public function delData(){
		$info=M('consult')->where(array('id'=>$_GET['id']))->find();
		if($info['rootid']!='0'){
			$delfloor=M('consult')->where(array('id'=>$_GET['id']))->delete();
			if($delfloor){
				$this -> success('删除成功！', U('Consult/showFull',array('id'=>$info['rootid'])), 1);
			}else{
				$this -> error('删除失败！', U('Consult/showFull',array('id'=>$info['rootid'])), 1);
			}
		}elseif($info['rootid']=='0'){
			$delroot=M('consult')->where(array('id'=>$_GET['id']))->delete();
			$delfloor=M('consult')->where(array('rootid'=>$_GET['id']))->delete();
			if($delroot){
				$this -> success('删除成功！', U('Consult/index'), 1);
			}else{
				$this -> error('删除失败！', U('Consult/index'), 1);
			}
		}
	}
}
	