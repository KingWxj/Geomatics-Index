<?php
namespace Home\Controller;
use Think\Controller;
class ContentController extends Controller {
//	进行登录有效性验证
	public function _initialize(){
		if(!cookie('adminId') || !cookie('adminName') || cookie('adminLevel')==null){
    		$this->error('您的登录信息已失效，请重新登录！',U('Login/index'),1);
    	}
	}
	public function index(){
		if($_POST['type']){
			if($_POST['limit']!=''){
				$db=M("content")->where(array('type'=>$_POST['type']))->order('date desc')->limit($_POST['limit'])->select();
				$this->assign('content',$db);
			}else{
				$db=M("content")->where(array('type'=>$_POST['type']))->order('date desc')->select();
				$this->assign('content',$db);
			}
		}
		$this->display();
	}
	//后台News控制器中添加新公告的视图
	public function addContent(){
		$this->display();
	}
	//执行添加的方法
	public function runAddContent(){
		if(empty(trim($_POST['content'])) || empty(trim($_POST['title'])) || empty(trim($_POST['type']))){
			$this->error('信息不完整！');
		}
		$data=$_POST;
		$data['date']=date("Y-m-d H:i:s");
		$data['admin']=cookie('adminName');
		if(M('content')->add($data)){
			redirect(U('Content/index'));
		}else{
			$this->error("添加失败");
		}
	}
	//删除的方法
	public function delContent(){
		$id=$_GET['id'];
		if(M('content')->where(array('id'=>$id))->delete()){
			$this->success('删除成功！',U('Content/index'),1);
		}else{
			$this->error('删除失败！',U('Content/index'),1);
		}
	}
	//修改
	public function updateContent(){
//		根据get的id查询数据库，筛选id值对应的数据
		$info=M('content')->where(array('id'=>$_GET['id']))->find();
		$this->assign('info',$info);
		$this->display();
	}
//	执行修改
	public function runUpdateContent(){
		if(empty(trim($_POST['content'])) || empty(trim($_POST['title']))){
			$this->error('信息不完整！');
		}
		$data=array();
		$data['title']=$_POST['title'];
		$data['info']=$_POST['info'];
		$data['content']=$_POST['content'];
		if(M('content')->where(array('id'=>$_POST['hidden_id']))->save($data)){
			$this->success('修改成功！',U('Content/index'),1);
		}else{
			$this->error('您没有进行修改或者网络故障');
		}
	}
}
		