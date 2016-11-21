$().ready(function(){
//	点击刷新验证码
	$verifyURL=$("#verifyImg").attr('src');
	$("#verifyImg").click(function(){
		$(this).attr('src',$verifyURL+"/?r="+Math.random());
	});
//	password失去焦点之后检查用户名和密码,并提示
	$("#password").focusout(function(){
		$.post($("#form_login").attr('action'),{'stuId':$("#stuId").val(),'password':$("#password").val()},function(data){
			if(data=='unAvaliable'){
				$("#stuId").css('background','pink');
				$("#password").css('background','pink')
			}else if(data=='infoError'){
				$("#stuId").css('background','pink');
				$("#password").css('background','pink')
			}else if(data=='infoTrue'){
				$("#stuId").css('background','lightgreen');
				$("#password").css('background','lightgreen')
			}
		});
	});
	$("#verify").focusin(function(){
		$.post($("#form_login").attr('action'),{'stuId':$("#stuId").val(),'password':$("#password").val()},function(data){
			if(data=='unAvaliable'){
				$("#stuId").css('background','pink');
				$("#password").css('background','pink')
			}else if(data=='infoError'){
				$("#stuId").css('background','pink');
				$("#password").css('background','pink')
			}else if(data=='infoTrue'){
				$("#stuId").css('background','lightgreen');
				$("#password").css('background','lightgreen')
			}
		});
	});
});
function ajaxLogin($url){
	var imgSrc=$('#verifyImg').attr('src');
	$.post($url,{'stuId':$("#stuId").val(),'password':$("#password").val(),'verify':$("#verify").val()},function(data){
		if(data=="imgError"){
			alert("验证码错误！");
		}else if(data=="infoError"){
			alert("学号或密码错误，请检查！");
			$("#verify").val('');
			$("#verifyImg").attr('src',imgSrc+'/?r='+Math.random());
		}else if(data=="unAvaliable"){
			alert("您的账户因违规已被管理员禁用，请联系老师！");
			location.reload(true);
		}else{
			location.reload(true);
		}
	});
}