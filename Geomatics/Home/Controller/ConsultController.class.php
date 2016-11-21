<?php
namespace Home\Controller;
use Think\Controller;
/*
 * 这个是前端的咨询小屋，也就是留言板（带回复功能）
 * 首先，需要有一个前端页面index方法
 * 然后，有对post的数据进行处理，写入数据库的方法
 * 留言需要相互关联，一个话题需要有本身的id，pId和rootId均为0
 * 回复的留言要包含本身的id，回复的总话题的id作为rootid，发起者的uid，被回复留言的id作为pid
 */
class ConsultController extends Controller {
	//	咨询小屋主页
//	链接数据库判断匿名回复是否已经开启，并可将结果发到前端
	public function index() {
		$noName = M('setting') -> where(array('code' => 'noName')) -> find();
		$this -> assign('noName', $noName['value']);
		$this -> display();
	}
	//	咨询小屋执行添加新话题
//	判断是否允许匿名，如果允许，判断用户是否勾选匿名，如果勾选，就不记录学号
	public function addTheme() {
		if(trim($_POST['title'])==null || trim($_POST['content'])==null){
			$this->error('您的问题描述未填完整！请检查……');
		}
		$noName = M('setting') -> where(array('code' => 'noName')) -> find();
		if ($noName['value'] == '1') {

			if ($_POST['noName'] == '1') {
				$title = $_POST['title'];
				$content = $_POST['content'];
				$date = date('Y-m-d H:i:s');
				$add = M('consult') -> add(array('rootid' => '0', 'title' => $title, 'content' => $content, 'date' => $date));
				if ($add) {
					$this -> success('主题发布成功！', U('Consult/allTheme'), 1);
				}
			} else {
				$title = $_POST['title'];
				$content = $_POST['content'];
				$date = date('Y-m-d H:i:s');
				if (cookie('stuId') == null || cookie('stuName') == null) {
					$this -> error('您的登录已失效，请登录之后执行操作！', U('Index/index'), 3);
				}
				$add = M('consult') -> add(array('rootid' => '0', 'uid' => cookie('stuId'), 'title' => $title, 'content' => $content, 'date' => $date));
				if ($add) {
					$this -> success('主题发布成功！', U('Consult/allTheme'), 1);
				}
			}

		} else {

			$title = $_POST['title'];
			$content = $_POST['content'];
			$date = date('Y-m-d H:i:s');
			if (cookie('stuId') == null || cookie('stuName') == null) {
				$this -> error('您的登录已失效，请登录之后执行操作！', U('Index/index'), 3);
			}
			$add = M('consult') -> add(array('rootid' => '0', 'uid' => cookie('stuId'), 'title' => $title, 'content' => $content, 'date' => $date));
			if ($add) {
				$this -> success('主题发布成功！', U('Consult/allTheme'), 1);
			}

		}
	}

	//	所有话题的视图
//	在数据库里筛选出所有rootid为0 的条目，输出至前端
	public function allTheme() {
		if(!$_GET['p']){
    		$_GET['p']=1;
    	}
		$allTheme=M('Consult')->where(array('rootid'=>'0'))->order('date desc')->page($_GET['p'],15)->select();
		$this->assign('allTheme',$allTheme);
		$count=M('Consult')->where(array('rootid'=>'0'))->count();
		$p= new \Think\Page($count,15);// 实例化分页类 传入总记录数和每页显示的记录数
		$show= $p->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
		$this -> display();
	}
//	显示话题内容的视图
	public function showTheme(){
		$root=M('Consult')->where(array('id'=>$_GET['id']))->find();
		if($root['uid']!=null){
			$rootInfo=M('stu')->where(array('stuId'=>$root['uid']))->find();
			$root['name']=$rootInfo['stuname'];
		}
		$noName = M('setting') -> where(array('code' => 'noName')) -> find();
		$floor=M('Consult')->where(array('rootid'=>$_GET['id']))->order('id asc')->select();
		$fl=array();
		foreach($floor as $key=>$value){
			$fl[$key]['rootid']=$value['rootid'];
			if($value['uid']!=null){
				$info=M('stu')->where(array('stuId'=>$value['uid']))->find();
				$fl[$key]['name']=$info['stuname'];
			}
			$fl[$key]['content']=$value['content'];
			$fl[$key]['date']=$value['date'];
		}
		$this -> assign('noName', $noName['value']);
		$this->assign('root',$root);
		$this->assign('floor',$fl);
		$this->display();
	}
	//	回复话题的方法
	public function answer() {
		if(cookie('stuId')==null || cookie('stuName')==null){
			$this->error('您需要登录之后进行操作！',U('Index/index'),2);
		}
		if(trim($_POST['content'])==''){
			$this->error('您没有填写回复的内容！');
		}
		$noName = M('setting') -> where(array('code' => 'noName')) -> find();
		if ($noName['value'] == '1') {

			if ($_POST['noName'] == '1') {
				$rootid = $_POST['rootid'];
				$content = $_POST['content'];
				$date = date('Y-m-d H:i:s');
				$add = M('consult') -> add(array('rootid' => $rootid, 'content' => $content, 'date' => $date));
				if ($add) {
					$this -> success('回复成功！', U('Consult/showTheme',array('id'=>$rootid)), 1);
				}
			} else {
				$rootid = $_POST['rootid'];
				$content = $_POST['content'];
				$date = date('Y-m-d H:i:s');
				if (cookie('stuId') == null || cookie('stuName') == null) {
					$this -> error('您的登录已失效，请登录之后执行操作！', U('Index/index'), 3);
				}
				$add = M('consult') -> add(array('rootid' => $rootid, 'uid' => cookie('stuId'),  'content' => $content, 'date' => $date));
				if ($add) {
					$this -> success('回复成功！', U('Consult/showTheme',array('id'=>$rootid)), 1);
				}
			}

		} else {
				$rootid = $_POST['rootid'];
				$content = $_POST['content'];
				$date = date('Y-m-d H:i:s');
			if (cookie('stuId') == null || cookie('stuName') == null) {
				$this -> error('您的登录已失效，请登录之后执行操作！', U('Index/index'), 3);
			}
			$add = M('consult') -> add(array('rootid' => $rootid, 'uid' => cookie('stuId'),  'content' => $content, 'date' => $date));
			if ($add) {
				$this -> success('回复成功！', U('Consult/showTheme',array('id'=>$rootid)), 1);
			}

		}
	}
}
