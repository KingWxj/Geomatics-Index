<?php

function check_verify($code, $id = '') {
	$verify = new \Think\Verify();
	return $verify -> check($code, $id);
}
function trimall($str)//删除空格
{
    $qian=array(" ","　","\t","\n","\r");$hou=array("","","","","");
    return str_replace($qian,$hou,$str);    
}
?>