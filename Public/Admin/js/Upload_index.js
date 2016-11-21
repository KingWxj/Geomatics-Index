function ajaxDelFile($url,$id){
	$.post($url,{'id':$id},function(data){
		if(data=='delSuccess'){
			alert('删除成功！');
		}else if(data=='delDbError'){
			alert('删除数据失败！');
		}else if(data=='delFileError'){
			alert('删除文件失败！');
		}
		location.reload(true);
	})
}
