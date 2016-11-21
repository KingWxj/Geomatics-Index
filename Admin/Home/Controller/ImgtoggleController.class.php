<?php
namespace Home\Controller;
use Think\Controller;
/*
 * 这个是后台的轮播管理器
 */
class ImgtoggleController extends Controller {
//	进行登录有效性验证
	public function _initialize(){
		if(!cookie('adminId') || !cookie('adminName') || cookie('adminLevel')==null){
    		$this->error('您的登录信息已失效，请重新登录！',U('Login/index'),1);
    	}
	}
    public function index(){
    	$data=array();
		$imgtoggle = M('Imgtoggle');
		$this->assign('data', $imgtoggle->order('id desc')->select());
    	$this->display();
    }
	
//	上传方法:添加新轮播和内容
	public function runAdd(){
		$upload=new \Think\Upload();
//		限制大小3M
		$upload -> maxSize = 3145728;
//		上传路径为Upload文件夹下的File文件夹下
		$upload -> savePath = 'Imgtoggle/';
//		自动创建子目录
		$upload -> autoSub = TRUE;
//		文件重命名，防止重名，默认命名方式为时间戳+四位随机数
		$upload -> saveName = time().rand(1000, 9999);
//		执行上传方法
		$info=$upload->upload();
//		判断，如果上传成功，执行写入数据库，创建session
		if($info){
			$data=array();
			$data['title']=$_POST['title'];
			$data['sort']='100';
//			前端的文件上传表单写的是file
			$data['route']='/Uploads/'.$info['file']['savepath'].$info['file']['savename'];
			$data['date']=date("Y-m-d H:i:s");
//			var_dump($info);
			M('Imgtoggle')->add($data);
			$this->success('添加成功！',U('Imgtoggle/index'));
//		如果上传失败，跳转到错误页面，输出错误信息
		}else{
			$this->error($upload->getError());
		}
	}
//	执行轮播管理：排序
	public function sortImg(){
			$map=array();
			$map['id']=array('gt',$_POST['id']);
			$info=M('imgtoggle')->where($map)->find();
			if(!$info){
				exit;
			}
			M('imgtoggle')->where(array('id'=>$_POST['id']))->save(array('id'=>'0'));
			M('imgtoggle')->where(array('id'=>$info['id']))->save(array('id'=>$_POST['id']));
			M('imgtoggle')->where(array('id'=>'0'))->save(array('id'=>$info['id']));
	}
//	执行轮播管理：删除
	public function delImg(){
		$info=M('imgtoggle')->where(array('id'=>$_GET['id']))->find();
		$delFile=unlink(".".$info['route']);
		$delDb=M('imgtoggle')->where(array('id'=>$_GET['id']))->delete();
		if($delFile && $delDb){
			$this->success('删除成功！',U('Imgtoggle/index'),1);
		}else{
			$this->error('删除失败',U('Imgtoggle/index'),2);
		}
	}
}