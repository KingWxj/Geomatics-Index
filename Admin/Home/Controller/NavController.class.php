<?php
namespace Home\Controller;
use Think\Controller;
/*
 * 这个是前端导航栏链接内容的管理器
 */
class NavController extends Controller {
//	进行登录有效性验证
	public function _initialize(){
		if(!cookie('adminId') || !cookie('adminName') || cookie('adminLevel')==null){
    		$this->error('您的登录信息已失效，请重新登录！',U('Login/index'),1);
    	}
	}
//	显示导航栏列表
	public function index() {
		$info = array();
		//将每一个不同的root筛选出来，赋给$root二维数组
		$root = M('Nav') -> field('root') -> distinct(true) -> select();
		for ($i = 0; $i < count($root); $i++) {
			//将root相同的项筛选出来，赋给$info，使$info成为一个二维数组
			$info[] = M('Nav') -> where(array('root' => $root[$i]['root'])) -> select();
		}
		$this -> assign('info', $info);
		$this -> display();
	}
//	修改文章的视图
	public function mgrNavArt() {
		//根据传回来的id值，来对应需要更改的记录
		$info = M('Nav') -> where(array('id' => $_GET['id'])) -> find();
		$this -> assign('info', $info);
		$this -> display();
	}

//	管理列表的视图
	public function mgrNavList() {
		if(!$_GET['p']){
    		$_GET['p']=1;
    	}
		$root = M('Nav') -> where(array('id' => $_GET['id'])) ->getField('title');
		$this->assign('root',$root);
		$rootid = $_GET['id'];
		$this->assign('rootid',$rootid);
		$list=M('navlist')->order('date desc')->where(array('root'=>$root))->page($_GET['p'],20)->select();
		$this -> assign('list', $list);
		$count= M('navlist')->where(array('root'=>$root))->count();// 查询满足要求的总记录数
		$p= new \Think\Page($count,20);// 实例化分页类 传入总记录数和每页显示的记录数
		$show= $p->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
		$this -> display();
	}

//	修改链接的视图
	public function mgrNavLink() {
		$info = M('Nav') -> where(array('id' => $_GET['id'])) -> find();
		$this -> assign('info', $info);
		$this -> display();
	}
//	修改文章内容后提交到此控制器
	public function runUpdateNav() {
		if(empty(trim($_POST['content'])) || empty(trim($_POST['info']))){
			$this->error('信息不完整！');
		}
		//接受表单中传过来的内容
		$data = array();
		$data['info'] = $_POST['info'];
		$data['date'] = date('Y-m-d H:i:s');
		$data['content'] = $_POST['content'];
		//设置查询时的条件，条件应为其点开的修改所在的id
		$map['id'] = $_POST['hid_id'];
		$upd = M('Nav') -> where($map) -> save($data);
		//如果更改数据成功，则跳转
		if ($upd) {
			$this -> success('修改成功！', U('Nav/index'));
			//		如果修改失败，跳转到错误页面，输出错误信息
		} else {
			$this -> error('您未进行修改或者修改失败，请重试');
		}
	}
//	删除列表项中一项
	public function delListItem() {
		$del = M('navlist')->where(array('id'=>$_GET['id']))->delete();
		if ($del) {
			$this->success('删除成功');
		} else {
			$this->error('删除失败,请刷新后重新操作');
		}
	}
//	修改列表项中的文章内容的视图
	public function updateListView() {
		$info = M('navlist')->where(array('id'=>$_GET['id']))->field('id,title,info,content')->find();
		$this->assign('info',$info);
		$this->assign('rootid',$_GET['rootid']);
		$this->display();
	}
//	更新文章并提交后，写入数据库
	public function updateListItem() {
		$content = trim($_POST['content']);
		$title = trim($_POST['title']);
		$info = trim($_POST['info']);
		if(empty($content) || empty($title) || empty($info)){
			$this->error('信息不完整！');
		}
		$data = array();
		$data['title'] = $title;
		$data['info'] = $title;
		$data['content'] = $content;
		$updateitem = M('navlist')->where(array('id'=>$_POST['hidden_id']))->save($data);
		if ($updateitem) {
			$this->success('修改成功！',U('Nav/mgrNavList',array('id'=>$_POST['rootid'])));
		} else {
			$this->error('您未进行修改或修改失败，请重试！');
		}
	}
//	添加列表项中的文章内容的视图
	public function addListView() {
//		根据传回来的root值，来对应需要更改的记录
		$root = $_GET['root'];
		$this -> assign('root', $root);
		$this -> display();
	}
//	添加列表项中的文章内容，写入数据库
	public function addListItem() {
		$data = array();
		$data['root'] = $_POST['root'];
		$data['title'] = $_POST['title'];
		$data['info'] = $_POST['info'];
		$data['content'] = $_POST['content'];
		$data['date'] = date('Y-m-d H:i:s');
		if (trim($data['title']) =='' ||trim($data['info']) =='' ||trim($data['content']) ==''){
		$this->error('添加内容不完整！');
		}else{
			$updateitem = M('navlist')->add($data);
			if ($updateitem) {
				$this->success('添加成功！',U('Nav/mgrNavList',array('id'=>$_POST['rootid'])));
			} else {
				$this->error('添加失败，请重试！');
			}
		}
		
	}
}
