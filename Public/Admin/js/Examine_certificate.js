function ajaxAgree($url,$id){
	$.post($url,{'id':$id,'status':'ok'},function(){
//		alert(data);
		location.reload(true);
	});
}
function ajaxDisAgree($url,$id){
	$.post($url,{'id':$id,'status':'ko'},function(data){
		if(data){
			alert(data);
		}
		location.reload(true);
	});
}
