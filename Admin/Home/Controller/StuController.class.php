<?php
namespace Home\Controller;
use Think\Controller;
/*
 * 后台
 * 学生信息控制器
 * index学生的账户列表视图
 * checkStu学生账户注册审核
 * checkCertificate证书审核视图
 * certificateTrue审核通过方法
 * certificateFales审核未通过
 */
class StuController extends Controller {
//	进行登录有效性验证
	public function _initialize(){
		if(!cookie('adminId') || !cookie('adminName') || cookie('adminLevel')==null){
    		$this->error('您的登录信息已失效，请重新登录！',U('Login/index'),1);
    	}
	}
	//学生账户列表的视图
	public function index() {
		$this -> display();
	}
//	添加学生账户 
	public function addStu(){
		if(empty(trim($_POST['stuName'])) || empty(trim($_POST['stuId'])) || empty(trim($_POST['password']))){
			$this->error('信息不完整！');
		}else{
			$info=array();
			$info['stuName']=$_POST['stuName'];
			$info['password']=sha1($_POST['password']);
			$info['stuId']=$_POST['stuId'];
			if(M('stu')->where(array('stuId'=>$info['stuId']))->find()){
				$this->error('该学号对应的学生已存在！');
			}
			if(M('stu')->add($info)){
				$this->success('添加成功！',U('Stu/index'),1);
			}else{
				$this->error('添加失败！');
			}
		}
	}
//	搜索学生账户
	public function searchStu(){
		if(empty(trim($_POST['stuName'])) && empty(trim($_POST['stuId']))){
			$this->error('条件没有填写！');
		}elseif(empty(trim($_POST['stuName']))){
			$info=M('stu')->where(array('stuId'=>$_POST['stuId']))->select();
			$this->assign('stuList',$info);
			$this->display('index');
		}elseif(empty(trim($_POST['stuId']))){
			$map=array();
			$map['stuName']=array('like',"%".$_POST['stuName']."%");
			$info=M('stu')->where($map)->select();
			$this->assign('stuList',$info);
			$this->display('index');
		}else{
			$map=array();
			$map['stuName']=array('like',"%".$_POST['stuName']."%");
			$map['stuId']=array('eq',$_POST['stuId']);
			$info=M('stu')->where($map)->select();
			$this->assign('stuList',$info);
			$this->display('index');
		}
	}
//	禁用/启用学生账户 
	public function statusToggle(){
		$info=M('stu')->where(array('stuId'=>$_POST['stuId']))->find();
		if($info['avaliable']=='1'){
			M('stu')->where(array('stuId'=>$_POST['stuId']))->save(array('avaliable'=>'0'));
		}elseif($info['avaliable']=='0'){
			M('stu')->where(array('stuId'=>$_POST['stuId']))->save(array('avaliable'=>'1'));
		}
	}
//	删除学生账户
	public function delStu(){
		if(!cookie('adminId') || !cookie('adminName') || cookie('adminLevel')==null){
    		exit;
    	}
		M('stu')->where(array('stuId'=>$_POST['stuId']))->delete();
	}
//	批量Excel导入学生账户
//	上传方法
	public function uploadStu() {
		$upload = new \Think\Upload();
		//		限制大小100M
		$upload -> maxSize = 104857600;
		//		上传路径为Upload文件夹下的File文件夹下
		$upload -> savePath = 'Excel/';
		//		自动创建子目录
		$upload -> autoSub = TRUE;
		//		扩展名限制
		$upload -> exts = array('xls', 'xlsx');
		//		文件重命名，防止重名，默认命名方式为时间戳+四位随机数
		$upload -> saveName = time() . rand(1000, 9999);
		//		执行上传方法
		$info = $upload -> upload();
		//		判断，如果上传成功，执行写入数据库，创建session
		if ($info) {
			//如果出现权限问题，记得路径前面追加'.';
			$filename = './Uploads/' . $info['file']['savepath'] . $info['file']['savename'];
			$exts = $info['file']['ext'];
			//			echo $filename;
			$this -> excel_import($filename, $exts);
			//		如果上传失败，跳转到错误页面，输出错误信息
		} else {
			$this -> error($upload -> getError());
		}
	}

	//导入数据方法
	protected function excel_import($filename, $exts = 'xls') {
		//导入PHPExcel类库，因为PHPExcel没有用命名空间，只能inport导入
		import("Org.Util.PHPExcel");
		//创建PHPExcel对象，注意，不能少了\
		$PHPExcel = new \PHPExcel();
		//如果excel文件后缀名为.xls，导入这个类
		if ($exts == 'xls') {
			import("Org.Util.PHPExcel.Reader.Excel5");
			$PHPReader = new \PHPExcel_Reader_Excel5();
		} else if ($exts == 'xlsx') {
			import("Org.Util.PHPExcel.Reader.Excel2007");
			$PHPReader = new \PHPExcel_Reader_Excel2007();
		}

		//载入文件
		$PHPExcel = $PHPReader -> load($filename);
		//获取表中的第一个工作表，如果要获取第二个，把0改为1，依次类推
		$currentSheet = $PHPExcel -> getSheet(0);
		//获取总列数
		$allColumn = $currentSheet -> getHighestColumn();
		//获取总行数
		$allRow = $currentSheet -> getHighestRow();
		//循环获取表中的数据，$currentRow表示当前行，从哪行开始读取数据，索引值从0开始
		for ($currentRow = 1; $currentRow <= $allRow; $currentRow++) {
			//从哪列开始，A表示第一列
			for ($currentColumn = 'A'; $currentColumn <= $allColumn; $currentColumn++) {
				//数据坐标
				$address = $currentColumn . $currentRow;
				//读取到的数据，保存到数组$arr中
				$data[$currentRow][$currentColumn] = $currentSheet -> getCell($address) -> getValue();
			}

		}
//				print_r($data);
		$this -> save_import($data,$filename);
	}

	//保存数据到数据库
	public function save_import($data,$filename) {
		foreach ($data as $k => $v) {
			if ($k >= 2) {
//				防止科学计数法，有些导出带空格，现在去除
				//学号,复
				$stuId = $v['A'];
				$info[$k - 2]['stuId'] = trim(strval($stuId));
				//姓名
				$stuName = $v['B'];
				$info[$k - 2]['stuName'] = trim(strval($stuName));
				//初始密码,学号的sha1加密
				$info[$k-2]['password']=sha1(trim(strval($stuId)));
			}

		}
		foreach($info as $key=>$value){
			M('stu')->add($value);
		}
		unlink($filename);
		$this->success('导入完成！',U('Stu/index'),3);
	}
	
}