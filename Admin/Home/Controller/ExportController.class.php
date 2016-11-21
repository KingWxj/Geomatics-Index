<?php
namespace Home\Controller;
use Think\Controller;
/*
 * 后台
 * 控制数据库与excel文件相互转换的控制器
 */
class ExportController extends Controller {
	//导出任意数据库为xls的方法
	public function export($data) {
		if(!$data){
			$this->error('没有要导出的数据');
		}
//		给学号加空格
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
		//导入PHPExcel类库，因为PHPExcel没有用命名空间，只能import导入
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
	