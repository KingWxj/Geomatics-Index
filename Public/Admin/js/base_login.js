$().ready(function(){
//	验证码的点击刷新
	$("#verifyImg").click(function(){
		var imgSrc=$(this).attr('src');
		$(this).attr('src',imgSrc+'/?r='+Math.random());
	});
//	Ajax验证用户名是否正确
	$(".pwd").focusout(function(){
		$("#tips").html('');
		$.post($("#form_login").attr('action'),{'username':$(".username").val(),'password':$(".pwd").val()},function(data){
			if(data=='statusError'){
				$("#tips").css('color','red');
				$("#tips").text('账户已禁用！');
			}else if(data=='infoError'){
				$("#tips").css('color','red');
				$("#tips").text('用户名或者密码错误！');
			}else if(data=='infoTrue'){
				$("#tips").css('color','green');
				$("#tips").text('账户信息正确！');
			}
		});
	});
});
//点击时执行Ajax验证
function ajaxLogin($url){
	var imgSrc=$('#verifyImg').attr('src');
	$.post($url,{'username':$(".username").val(),'password':$(".pwd").val(),'verify':$(".verify").val()},function(data){
		if(data=='imgError'){
			alert('验证码错误！');
		}else if(data=='statusError'){
			alert('您的账户已被禁用,请联系同级或更高级的管理员');
			location.reload(true);
		}else if(data=='infoError'){
			alert('您的账户或密码错误，请检查后重试！');
			$(".verify").val('');
			$("#verifyImg").attr('src',imgSrc+'/?r='+Math.random());
		}else{
			window.location.href=data;
		}
	});
}
