<?php
namespace Home\Controller;
use Think\Controller;
/*
 * 前端
 * 这个是User用户控制器（学生）
 * 登录页，注册页，登录注册退出方法
 */
class LoginController extends Controller {
	//User控制器的index方法
	public function index(){
		$this->display();
	}
	//User控制器里的login方法，用来实现数据库中用户名，密码，与前端post的表单数据进行验证登录的方法
	//写入session和cookie
	public function login(){
		if(check_verify($_POST['verify'],2)){
			$info=M('stu')->where(array('stuId'=>$_POST['stuId'],'password'=>sha1($_POST['password'])))->find();
			if($info){
				if($info['avaliable']==0){
					echo "unAvaliable";
				}else{
					cookie('stuId',$info['stuid']);
					cookie('stuName',$info['stuname']);
					echo 'infoTrue';
				}
			}elseif(!$info){
				echo "infoError";
			}
		}else{
			echo "imgError";
		}
	}
//	Ajax检查用户名和密码是否正确
	public function check(){
		$info=M('stu')->where(array('stuId'=>$_POST['stuId'],'password'=>sha1($_POST['password'])))->find();
		if($info){
			if($info['avaliable']==0){
				echo "unAvaliable";
			}else{
				echo 'infoTrue';
			}
		}elseif(!$info){
			echo "infoError";
		}
	}
	//User控制器的退出登录的方法，清除session和cookie，重新载入页面，退出登录
	public function logout(){
		cookie('stuId',null);
		cookie('stuName',null);
		redirect(U('Index/index'));
	}
//	验证码
	public function verifyImg(){
		$config=array(
			'codeSet'=>'234567890',
			 'fontSize'=>40, 
			'useNoise'=>false,
			'length'=>4,
			'useCurve'=>FALSE,
		);
		$verify=new \Think\Verify($config);
		$verify->entry(2);
	}
	//注册模块,接收注册表单post的数据，进行重复性验证，密码长度确认，对密码进行sha1加密，存入数据库
	//或许可以实现注册完成自动添加session和cookie进行登录，注册完成，跳转到主页
//	public function register(){
//		
//	}
	
}