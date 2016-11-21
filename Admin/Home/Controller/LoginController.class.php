<?php
namespace Home\Controller;
use Think\Controller;
use Think\Verify;
/*
 * 这个是后台登录页面的控制器
 */
class LoginController extends Controller {
    public function index(){
		$this->display();
    }
	//验证码
	public function verifyImg(){
		$config=array(
			'codeSet'=>'234567890',
			'useNoise'=>false,
			'length'=>4,
			'useCurve'=>FALSE,
		);
		$verify=new Verify($config);
		$verify->entry(1);
	}
	//这个是执行登录验证并写入session和cookie的方法
	public function login(){
		$info=array();
		$info['name']=$_POST['username'];
		$info['password']=sha1($_POST['password']);
		$info['verify']=$_POST['verify'];
		$db=M('admin')->where(array('name'=>$info['name'],'password'=>$info['password']))->find();
		if(!check_verify($info['verify'],1)){
			echo 'imgError';
		}elseif($db['avaliable']=='0'){
			echo 'statusError';
		}else{
			if(!$db){
				echo 'infoError';
			}else{
				$data=M('admin')->where(array('name'=>$info['name'],'password'=>$info['password']))->find();
				cookie('adminId',$data['id']);
				cookie('adminName',$data['name']);
				cookie('adminLevel',$data['level']);
				echo U('Index/index');
			}
		}
	}
	public function checkInfo(){
		$info=array();
		$info['name']=$_POST['username'];
		$info['password']=sha1($_POST['password']);
		$info['verify']=$_POST['verify'];
		$db=M('admin')->where(array('name'=>$info['name'],'password'=>$info['password']))->find();
		if($db['avaliable']=='0'){
			echo 'statusError';
		}elseif(!$db){
			echo 'infoError';
		}elseif($db){
			echo 'infoTrue';
		}
	}
	//登出选项，退出账号
	public function logout(){
		cookie('adminId',null);
		cookie('adminName',null);
		cookie('adminLevel',null);
		redirect(U('Login/index'));
//		var_dump($_SESSION);
	}
}
