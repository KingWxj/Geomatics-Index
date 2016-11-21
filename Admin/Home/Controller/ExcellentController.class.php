<?php
namespace Home\Controller;
use Think\Controller;
/*
 * 这个是优秀展示控制器
 */
class ExcellentController extends Controller {
//	进行登录有效性验证
	public function _initialize(){
		if(!cookie('adminId') || !cookie('adminName') || cookie('adminLevel')==null){
    		$this->error('您的登录信息已失效，请重新登录！',U('Login/index'),1);
    	}
	}
    public function index(){
    	if($_POST['type']){
			if($_POST['limit']!=''){
				$db=M("excellent")->where(array('type'=>$_POST['type']))->order('date desc')->limit($_POST['limit'])->select();
				$this->assign('excellent',$db);
			}else{
				$db=M("excellent")->where(array('type'=>$_POST['type']))->order('date desc')->select();
				$this->assign('excellent',$db);
			}
		}
		$this->display();
    }
	public function addExcellent(){
		$this->display();
	}
	//执行添加的方法
	public function runAddExcellent(){
		$data=array();
		$data['title'] = trim($_POST['title']);
		$data['content'] = trim($_POST['content']);
		$data['info'] = trim($_POST['info']);
		$data['type'] = $_POST['type'];
		if(empty($data['content']) || empty($data['title']) || empty($data['type']) || empty($data['info']) ){
			$this->error('表单信息不完整！');
		}else{
			$upload=new \Think\Upload();
	//		限制大小3M
			$upload -> maxSize = 3145728;
	//		上传路径为Upload文件夹下的File文件夹下
			$upload -> savePath = 'Excellentpic/';
	//		自动创建子目录
			$upload -> autoSub = TRUE;
	//		文件重命名，防止重名，默认命名方式为时间戳+四位随机数
			$upload -> saveName = time().rand(1000, 9999);
	//		执行上传方法
			$route=$upload->upload();
	//		判断，如果上传成功，执行写入数据库，创建session
			if($route){
				$data['admin']=cookie('adminName');
	//			前端的文件上传表单写的是file
				$data['picroute']='/Uploads/'.$route['file']['savepath'].$route['file']['savename'];
				$data['date']=date("Y-m-d H:i:s");	
				
				if(M('excellent')->add($data)){
					$this->success('添加成功！');					
				}else{
					$this->error('未上传成功！');
				}
				
			}
		}
	}
	//删除的方法
	public function delExcellent(){
		$id=$_GET['id'];
		if(M('excellent')->where(array('id'=>$id))->delete()){
			$this->success('删除成功！',U('Excellent/index'),1);
		}else{
			$this->error('删除失败！',U('Excellent/index'),1);
		}
	}
	//修改
	public function updateExcellent(){
//		根据get的id查询数据库，筛选id值对应的数据
		$info=M('excellent')->where(array('id'=>$_GET['id']))->find();
		$this->assign('info',$info);
		$this->display();
	}
//	执行修改
	public function runUpdateExcellent(){
		$data=array();
		$data['title']=trim($_POST['title']);
		$data['info']=trim($_POST['info']);
		$data['content']=trim($_POST['content']);
		$data['type'] = $_POST['type'];
		if(empty($data['title']) || empty($data['info']) || empty($data['content'])){
			$this->error('表单未填写完整！');
		}else{
			$upload=new \Think\Upload();
	//		限制大小3M
			$upload -> maxSize = 3145728;
	//		上传路径为Upload文件夹下的File文件夹下
			$upload -> savePath = 'Excellentpic/';
	//		自动创建子目录
			$upload -> autoSub = TRUE;
	//		文件重命名，防止重名，默认命名方式为时间戳+四位随机数
			$upload -> saveName = time().rand(1000, 9999);
	//		执行上传方法
			$route=$upload->upload();
	//		判断，如果上传成功，执行写入数据库，创建session
			if($route){
				
	//			前端的文件上传表单写的是file
				$data['picroute']='/Uploads/'.$route['file']['savepath'].$route['file']['savename'];
				$data['date']=date("Y-m-d H:i:s");	
				if(M('excellent')->where(array('id'=>$_POST['hidden_id']))->save($data)){
					$this->success('修改成功！',U('Excellent/index'),1);
				}else{
					$this->error('您没有进行修改或遇到了网络故障');
				}
				
			}
		}
		
	}
}