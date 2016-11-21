<?php
namespace Home\Controller;
use Think\Controller;
/*
 * 后台
 * 控制数据库与excel文件相互转换的控制器
 */
class ImportController extends Controller {
//	进行登录有效性验证
	public function _initialize(){
		if(!cookie('adminId') || !cookie('adminName') || cookie('adminLevel')==null){
    		$this->error('您的登录信息已失效，请重新登录！',U('Login/index'),1);
    	}
	}
	//上传要导入的文件的视图
	public function index() {
		$subjectList = M('exam') -> order('subject asc') -> field('subject') -> distinct(true) -> select();
		$this -> assign('subjectList', $subjectList);
		$this -> display();
	}
	
//	直接添加成绩的方法
	public function addScore(){
		$info=array();
		$info['stuId']=$_POST['stuId'];
		$info['name']=$_POST['name'];
		$info['subject']=$_POST['subject'];
		$info['score']=$_POST['score'];
		foreach($info as $k=>$v){
			if($v==''){
				$this->error('表单没有填写完整!');
			}
		}
		$info['mark']=$_POST['mark'];
		if(M('exam')->add($info)){
			$this->success("添加成功！",U('Import/index'),2);
		}
	}	

	//上传方法
	public function upload() {
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
				$name = $v['B'];
				$info[$k - 2]['name'] = trim(strval($name));
				//学科
				$subject = $v['C'];
				$info[$k - 2]['subject'] = trim(strval($subject));
				//成绩
				$score = $v['D'];
				$info[$k - 2]['score'] = trim(strval($score));
				//备注
				$mark = $v['E'];
				$info[$k - 2]['mark'] = trim(strval($mark));
				
			}

		}
//		dump($info);
//		die;
		foreach($info as $key=>$value){
			M('exam')->add($value);
		}
		unlink($filename);
		$this->success('导入完成！',U('Import/index'),3);
	}

	//导出数据库为xls的方法
	public function export() {
		$data = M('exam') -> select();
		foreach($data as $key=>$val){
			$data[$key]['stuid']=' '.$val['stuid'];
		}
//		dump($data);
//		die;
		$headArr = array();
		foreach ($data['0'] as $key => $value) {
			$headArr[] = $key;
		}
		$fileName = time();
		//导入PHPExcel类库，因为PHPExcel没有用命名空间，只能inport导入
		import("Org.Util.PHPExcel");
		import("Org.Util.PHPExcel.Writer.Excel5");
		import("Org.Util.PHPExcel.IOFactory.php");

		$date = date("Y_m_d", time());
		$fileName .= "_{$date}.xls";

		//创建PHPExcel对象，注意，不能少了\
		$objPHPExcel = new \PHPExcel();
		//B 列为文本
//		$objPHPExcel->getActiveSheet()->getStyle('B')->getNumberFormat()->setFormatCode(\PHPExcel_Style_NumberFormat::FORMAT_TEXT);
		$objProps = $objPHPExcel -> getProperties();

		//设置表头
		$key = ord("A");
		//print_r($headArr);exit;
		foreach ($headArr as $v) {
			$colum = chr($key);
			$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue($colum . '1', $v);
			$objPHPExcel -> setActiveSheetIndex(0) -> setCellValue($colum . '1', $v);
			$key += 1;
		}

		$column = 2;
		$objActSheet = $objPHPExcel -> getActiveSheet();

		//print_r($data);exit;
		foreach ($data as $key => $rows) {//行写入
			$span = ord("A");
			foreach ($rows as $keyName => $value) {// 列写入
				$j = chr($span);
				$objActSheet -> setCellValue($j . $column, $value);
				$span++;
			}
			$column++;
		}

		$fileName = iconv("utf-8", "gb2312", $fileName);
		//重命名表
		//$objPHPExcel->getActiveSheet()->setTitle('test');
		//设置活动单指数到第一个表,所以Excel打开这是第一个表
		$objPHPExcel -> setActiveSheetIndex(0);
		header('Content-Type: application/vnd.ms-excel');
		header("Content-Disposition: attachment;filename=\"$fileName\"");
		header('Cache-Control: max-age=0');

		$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter -> save('php://output');
		//文件通过浏览器下载
		exit ;
	}

}
