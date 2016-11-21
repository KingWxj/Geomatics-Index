<?php
namespace Home\Controller;
use Think\Controller;
/*
 * 后台管理员控制器Admin
 * 对管理员进行管理
 */
class AdminController extends Controller {
//	进行登录有效性验证
	public function _initialize(){
		if(!cookie('adminId') || !cookie('adminName') || cookie('adminLevel')==null){
    		$this->error('您的登录信息已失效，请重新登录！',U('Login/index'),1);
    	}
	}
	//显示管理员列表
	public function index() {
		$limit=array();
		$limit['level']=array('egt',cookie('adminLevel'));
		$db = M('admin')->where($limit)->order('level asc') -> select();
		$this -> assign('adminList', $db);
		$this -> display();
	}

	//添加管理员视图
	public function addAdmin() {
		$this -> display();
	}

	//执行添加管理员
	public function runAddAdmin() {
		$add = array();
		$add['name'] = $_POST['name'];
		$add['password'] = sha1($_POST['password']);
		$add['level'] = $_POST['level'];
		$add['avaliable']=$_POST['avaliable'];
		if($add['level']<cookie('adminLevel')){
			$this->error('非法添加！',U('Admin/addAdmin'),1);
		}
		if ( M('admin') -> where(array('name' => $_POST['name'])) -> find()) {
			$this -> error("用户名已存在！", U('Admin/addAdmin'), 3);
		} else {
			if ( M('admin') -> add($add)) {
				redirect(U('Admin/index'));
			} else {
				$this -> error("添加管理员失败！", U("Admin/addAdmin"), 3);
			}
		}

	}
//	ajax修改管理员账户的禁用状态
	public function swapAvaliable(){
		$info=M('admin')->where(array('id'=>$_POST['id']))->find();
		if($info['avaliable']==1){
			M('admin')->where(array('id'=>$_POST['id']))->save(array('avaliable'=>0));
		}else{
			M('admin')->where(array('id'=>$_POST['id']))->save(array('avaliable'=>1));
		}
	}
//	ajax传来id，删除管理员
	public function delAdmin(){
		$info=M('admin')->where(array('id'=>$_POST['id']))->delete();
	}
//	修改管理员密码的视图
	public function fixAdminPass(){
		$this->display();
	}
//	执行修改密码的方法
	public function runFixAdminPass(){
		if($_POST['newPassword']=='' || $_POST['rePassword']==''){
			$this->error('密码不能为空!');
		}
		if($_POST['newPassword']!=$_POST['rePassword']){
			$this->error('两次输入密码不一致!');
		}else{
			$info=M('admin')->where(array('id'=>cookie('adminId')))->save(array('password'=>sha1($_POST['newPassword'])));
			if($info){
				cookie('adminId',null);
				cookie('adminName',null);
				cookie('adminLevel',null);
				$this->success('密码修改成功,请使用新密码重新登录!',U('Login/index'),3);
			}else{
				$this->error('密码修改失败,可能您输入的密码与原密码相同!');
			}
		}
	}

}
