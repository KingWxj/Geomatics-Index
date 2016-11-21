<?php
namespace Home\Controller;
use Think\Controller;
/*
 * 后台
 * 成绩查看，检索，导出的控制器
 */
class ScoreController extends Controller {
//	进行登录有效性验证
	public function _initialize(){
		if(!cookie('adminId') || !cookie('adminName') || cookie('adminLevel')==null){
    		$this->error('您的登录信息已失效，请重新登录！',U('Login/index'),1);
    	}
	}
	public function index() {
		$subjectList = M('exam') -> order('subject asc') -> field('subject') -> distinct(true) -> select();
		$this -> assign('subjectList', $subjectList);
		$this -> display();
	}

	//	条件筛选
	public function selectCondition() {
		cookie('selectMap',null);
		//		以下代码用来生成查询条件map
		//		判断表单发送来的数据，如果name不为空
		if (trim($_POST['name']) != '') {
			$map['name'] = array('like', '%' . trim($_POST['name']) . '%');
		}
		//				如果分数段的值不为空，智能判断
		if (trim($_POST['score_min']) != '' || trim($_POST['score_max']) != '') {
			if (trim($_POST['score_min']) != '' && trim($_POST['score_max']) == '') {
				//			如果只填了最低分
				$map['score'] = array('egt', $_POST['score_min']);

			} elseif (trim($_POST['score_min']) == '' && trim($_POST['score_max']) != '') {
				//			如果只填了最高分
				$map['score'] = array('elt', $_POST['score_max']);
			} else {
				//			如果两个都填了
				$map['score'] = array('between', array($_POST['score_min'], $_POST['score_max']));
			}
		}
		if (trim($_POST['stuId']) != '') {
			$map['stuId'] = array('eq', $_POST['stuId']);
		}
		//		判断是否已经选择科目
		if (trim($_POST['subject']) != '') {
			$map['subject'] = array('eq', $_POST['subject']);
		}
		//		以上代码用来生成查询条件map
//		设置cookie存储检索条件，也利于结果的excel导出
		cookie('scoreSelectMap',json_encode($map));
		//		调用查询函数，输出结果（分页）
		$this -> selectList();
	}
//	分页显示检索结果
	public function selectList() {
		$map=json_decode(cookie('scoreSelectMap'));
		if(!$_GET['page']){
			$page=1;
		}else{
			$page=$_GET['page'];
		}
//		每页显示的数目
		$limit = 20;
		$list=M('exam')->where($map)->order('stuId asc')->page($_GET['page'],$limit)->select();
		$count = M('exam') -> where($map) -> count();
		// 分页显示输出
		$this->assign('list',$list);
		$this->assign('pageLimit',$limit);
		$this->assign('page',$page);
		$this->assign('count',$count);
		$this->assign('pageCount',ceil($count/$limit));
		$this -> display('selectCondition');
	}
	public function export(){
		$map=json_decode(cookie('scoreSelectMap'));
		$data=M('exam')->where($map)->order('stuId asc')->select();
		$export=A('Export');
		$export->export($data);
	}
	
//	管理员修改成绩
	public function ajaxFixScore(){
		if(trim($_POST['score'])!='' && trim($_POST['id'])!=''){
			if(M('exam')->where(array('id'=>$_POST['id']))->save(array('score'=>$_POST['score']))){
				echo "修改成功";
			};
		}
	}
//	管理员删除成绩
	public function ajaxDelScore(){
		if(trim($_POST['id'])!=''){
			if(M('exam')->where(array('id'=>$_POST['id']))->delete()){
				echo "删除成功！";
			};
		}
	}

}
