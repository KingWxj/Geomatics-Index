//同意修改
function ajaxFixTrue($url,$id){
	$.post($url,{'id':$id,'status':'ok'},function(){
		location.reload(true);
	})
}
//拒绝修改
function ajaxFixFalse($url,$id){
	$.post($url,{'id':$id,'status':'ko'},function(){
		location.reload(true);
	})
}
