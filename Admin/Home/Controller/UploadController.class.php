<?php
namespace Home\Controller;
use Think\Controller;
/*
 * 上传控制器，主要用于下载园地模块
 */
class UploadController extends Controller {
//	进行登录有效性验证
	public function _initialize(){
		if(!cookie('adminId') || !cookie('adminName') || cookie('adminLevel')==null){
    		$this->error('您的登录信息已失效，请重新登录！',U('Login/index'),1);
    	}
	}
	//上传后台视图，Upload->index,已上传的文件的列表(下载园地)
    public function index(){
//  	倒序筛选数据库中的已上传文件列表，输出到前端
    	$db=M('down')->order('date desc')->select();
		$this->assign('fileList',$db);
		$this->display();
    }
	//执行upload，上传文件（执行）
	public function runUpload(){
		$upload=new \Think\Upload();
//		限制大小100M
		$upload -> maxSize = 104857600;
//		上传路径为Upload文件夹下的File文件夹下
		$upload -> savePath = 'Files/';
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
			$data['name']=$info['file']['savename'];
			$data['size']=$info['file']['size']/1024;
//			前端的文件上传表单写的是file
			$data['route']='/Uploads/'.$info['file']['savepath'].$info['file']['savename'];
			$data['date']=date("Y-m-d H:i:s");
//			var_dump($info);
			M('down')->add($data);
			redirect(U('Upload/index'));
//		如果上传失败，跳转到错误页面，输出错误信息
		}else{
			$this->error($upload->getError());
		}
	}
	public function delFile(){
//		这个方法用来删除文件
//		首先，根据Ajaxpost来的id值来查询数据库，找到对应的数据
		$db=M('down')->where(array('id'=>$_POST['id']))->find();
//		然后，尝试删除文件
		$delFile=unlink('./'.$db['route']);
//		如果文件上删除成功
		if($delFile){
//			删除文件对应的数据库
			$delDb=M('down')->where(array('id'=>$_POST['id']))->delete();
//			判断，如果数据库也删除成功
			if($delDb){
//				给前端返回delSuccess，删除成功
				echo 'delSuccess';
			}else{
//				否则，给前端返回delDbError，提示删除数据库失败
				echo 'delDbError';
			}
//		如果文件删除失败，给出提示，给前端Ajax返回delFileError，提示删除文件失败
		}else{
			echo 'delFileError';
		}
	}
}