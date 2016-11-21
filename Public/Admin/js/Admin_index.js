function ajaxSwapAvaliable($url,$id){
	$.post($url,{'id':$id},function(){
		location.reload(true);
	});
}
function ajaxDelAdmin($url,$id){
	$.post($url,{'id':$id},function(){
		location.reload(true);
	});
}
