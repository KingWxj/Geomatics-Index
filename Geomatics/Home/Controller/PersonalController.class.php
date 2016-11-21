<?php
namespace Home\Controller;

use Think\Controller;

/*
 * 前端
 * 这个是个人空间控制器
 * 账号登录之后，存储了cookie和session
 * 可以进行证书的上传，成绩的查询/修改
 */

class PersonalController extends Controller {
	public function _initialize() {
		if (!cookie('stuId') || !cookie('stuName')) {
//			redirect(U('Index/index'));
		}//判断有没有登录，如果没有登录，转到主页
	}
	
	//个人空间的主页  视图
	public function index() {
//		个人信息
		$info = M('stu')->where(array('stuId' => cookie('stuId')))->find();
		$this->assign('info', $info);
//		证书（素质拓展分）
//		$certificate = M('certificate')-> where(array('stuId' => cookie('stuId'))) -> select();
//		$this -> assign('certificate', $certificate);
		$cer_count = M('certificate')->where(array('stuId' => cookie('stuId')))->count();
		$this->assign('cer_count', $cer_count);
		$cer_pass = M('certificate')->where(array('stuId' => cookie('stuId'), 'verify' => '1'))->count();
		$this->assign('cer_pass', $cer_pass);
		$cer_list = M('certificate')->field('score')->where(array('stuId' => cookie('stuId'), 'verify' => '1'))->select();
		$cer_score = 0;
		foreach ($cer_list as $k => $v) {
			$cer_score = $cer_score + intval($v['score']);
		}
		$this->assign('cer_score', $cer_score);
//		证书（德育分）
//		$character = M('character')-> where(array('stuId' => cookie('stuId'))) -> select();
//		$this -> assign('character', $character);
		$cha_count = M('character')->where(array('stuId' => cookie('stuId')))->count();
		$this->assign('cha_count', $cha_count);
		$cha_pass = M('character')->where(array('stuId' => cookie('stuId'), 'verify' => '1'))->count();
		$this->assign('cha_pass', $cha_pass);
		$cha_list = M('character')->field('score')->where(array('stuId' => cookie('stuId'), 'verify' => '1'))->select();
		$cha_score = 0;
		foreach ($cha_list as $k => $v) {
			$cha_score = $cha_score + intval($v['score']);
		}
		$this->assign('cha_score', $cha_score);
//		显示视图
		$this->display();
	}
	
	//个人空间中上传素质拓展分证书的  视图
	public function certificate() {
		$certificate = M('certificate')->where(array('stuId' => cookie('stuId')))->order('date desc')->select();
		//		var_dump($certificate);
		$this->assign('certificate_list', $certificate);
		$this->display();
	}

//执行上传证书的方法，收到上传证书表单post的数据，上传图片，保存数据至数据库。
	public function uploadCertificate() {
		if (empty(trim($_POST['name']))) {
			$this->error('上传证书信息不完整！');
		}
		$upload = new \Think\Upload();
		//		限制大小3M
		$upload->maxSize = 3145728;
		//		上传路径为Upload文件夹下的Certificate文件夹下
		$upload->savePath = 'Certificate/';
		//		自动创建子目录
		$upload->autoSub = TRUE;
		$upload->subName = cookie('stuId');
		//		文件重命名，防止重名，默认命名方式为时间戳+四位随机数
		$upload->saveName = time() . rand(1000, 9999);
		//		执行上传方法
		$info = $upload->upload();
		//		判断，如果上传成功，执行写入数据库，创建session
		if ($info) {
			//			var_dump($info);
			$data = array();
			//			学号
			$data['stuId'] = cookie('stuId');
			//			证书名name
			$data['name'] = $_POST['name'];
			//			前端的文件上传表单写的是file
			$data['route'] = '/Uploads/' . $info['file']['savepath'] . $info['file']['savename'];
			//			证书上传时间
			$data['date'] = date("Y-m-d H:i:s");
			//			var_dump($info);
			M('certificate')->add($data);
			redirect(U('Personal/certificate'));
			//		如果上传失败，跳转到错误页面，输出错误信息
		} else {
			$this->error($upload->getError());
		}
	}


//个人空间中上传德育分证书的  视图
	public function character() {
		$character = M('character')->where(array('stuId' => cookie('stuId')))->order('date desc')->select();
		$this->assign('character_list', $character);
		$this->display();
	}

//	获取评分规则下拉菜单
	public function getScoreRules() {
		$level = $_POST['level'];
		switch ($level) {
			case 'root1':
				$data = M('dyfrule')->distinct(true)->field('root1')->select();
				break;
			case 'root2':
				$data = M('dyfrule')->where(array('root1' => $_POST['root1']))->distinct(true)->field('root2')->select();
				break;
			case 'root3':
				$data = M('dyfrule')->where(array('root1' => $_POST['root1'], 'root2' => $_POST['root2']))->distinct(true)->field('root3')->select();
				break;
			case 'root4':
				$data = M('dyfrule')->where(array('root1' => $_POST['root1'], 'root2' => $_POST['root2'], 'root3' => $_POST['root3']))->distinct(true)->field('root4')->select();
				break;
		}
		echo json_encode($data);
	}
	
	public function getFullScoreRule() {
		$data = M('Dyfrule')->where($_POST)->find();
		echo '<p id="score" style="color:red;">分值：' . $data['score'] . '分。备注：' . $data['note'] . '</p>';
	}
	
	//执行上传德育分证书的方法，收到上传证书表单post的数据，上传图片，保存数据至德育分数据库。
	public function uploadCharacter() {
//		判断证书名是否为空
		if (empty(trim($_POST['name']))) $this->error('上传证书信息不完整！');
//		判断select是否正常
		$map = $_POST;
		unset($map['name']);
		$rule = M('Dyfrule')->where($map)->find();
		if (!$rule) $this->error('参数异常，请刷新页面重试', U('Personal/character'), 3);
//		结束数据的判断
//		开始数据的写入和文件上传
		$upload = new \Think\Upload();
		//		限制大小3M
		$upload->maxSize = 3145728;
		//		上传路径为Upload文件夹下的Certificate文件夹下
		$upload->savePath = 'Certificate/';
		//		自动创建子目录
		$upload->autoSub = TRUE;
		$upload->subName = cookie('stuId');
		//		文件重命名，防止重名，默认命名方式为时间戳+四位随机数
		$upload->saveName = time() . rand(1000, 9999);
		//		执行上传方法
		$info = $upload->upload();
		//		判断，如果上传成功，执行写入数据库，创建session
		if ($info) {
			//			var_dump($info);
			$data = array();
			//			学号
			$data['stuId'] = cookie('stuId');
			//			证书名name
			$data['name'] = $_POST['name'];
			$data['grade'] = $_POST['grade'];
			//			前端的文件上传表单写的是file
			$data['route'] = '/Uploads/' . $info['file']['savepath'] . $info['file']['savename'];
			//			证书上传时间
			$data['date'] = date("Y-m-d H:i:s");
			//			var_dump($info);
			M('character')->add($data);
			redirect(U('Personal/character'));
			//		如果上传失败，跳转到错误页面，输出错误信息
		} else {
			$this->error($upload->getError());
		}
	}

//	账户设置，密码修改等
	public function setting() {
		$this->display();
	}
	
	//	个人空间里面的查看成绩视图
	//	需要判断是否已经审核或者是否审核通过
	public function score() {
		$score = M('exam')->where(array('stuId' => cookie('stuId')))->select();
		$this->assign('score', $score);
		$this->display();
	}
	//	个人空间里自己修改成绩的视图，前端传来id值，要修改的值，然后进行数据的修改
	//	同时重置审核状态
	//	Ajax实现
	public function scoreFix() {
		//		var_dump($_POST);
		foreach ($_POST as $key => $value) {
			$info = M('exam')->where(array('id' => $key))->find();
			if ($info['fixscore'] != $value) {
				M('exam')->where(array('id' => $key))->save(array('fixScore' => $value, 'verify' => 0,));
			}
		}
		redirect(U('Personal/score'));
	}
	
	//	个人中心
	//	修改密码
	public function fixPass() {
		$nowPassword = sha1($_POST['nowPassword']);
		$newPassword = sha1($_POST['newPassword']);
		$rePassword = sha1($_POST['rePassword']);
		if ($newPassword != $rePassword) {
			$this->error('您输入的两次密码不一致！', U('Personal/setting'), 3);
		}
		$info = M('stu')->where(array('stuId' => cookie('stuId'), 'password' => $nowPassword))->find();
		if (!$info) {
			$this->error('您输入的原密码不正确！请重新检查后输入！', U('Personal/setting'), 3);
		} else {
			$fix = M('stu')->where(array('stuId' => cookie('stuId'), 'password' => $nowPassword))->save(array('password' => $newPassword));
			if ($fix) {
				cookie('stuId', null);
				cookie('stuName', null);
				$this->success('修改成功，已注销，请使用新密码登录！', U('Index/index'), 3);
			} else {
				$this->error('修改失败，请重试！', U('Personal/setting'), 3);
			}
		}
	}
	
}
