<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>后台登陆界面</title>
	<link rel="stylesheet" type="text/css" href="../style/bootstrap.min.css">
	<link rel="stylesheet" href="../style/main.css">
</head>
<body>
<input type="text" style="display: none">
<input type="password" style="display: none">
	<div class="login-box">
		<div class="login-head">
			后台系统登录
			<a href="../article.showlist.php">返回网站主页</a>
		</div>
		<div class="login-body">
			<form action="article.register.handle.php?type=1" method="post" name="formLogin" autocomplete="off">
				<div class="user-name">
					<span>用户名:</span>		
					<input type="text" name="name" placeholder="请输入用户名" maxlength="20" class="form-control" autocomplete="off">
				</div>
				<div class="user-password">
					<span>密码:</span>
					<input type="password" name="password" placeholder="请输入密码" maxlength="20" class="form-control" autocomplete="off">
				</div>
				<div class="remember-pwd">
					<input type="checkbox" name="remember"><span>记住密码</span>
				</div>
<!-- 				<div class="validate">
					<span>验证码:</span>
					<input type="text" name="validate" placeholder="请输入验证码" maxlength="4" class="form-control" autocomplete="off">
				</div> -->
				<div class="login-handle clearfix">
					<input type="submit" class="login-submit-btn form-control" value="登录" name="formLogin">
					<a href="javascript:;" class="register-btn">注册</a>
				</div>
			</form>
		</div>
	</div>
	<div class="error-tips">
		<div class="error-head">
			<span>登录有误</span>
			<a href="javascript:;" class="error-cancel">x</a>
		</div>
		<div class="error-body">
			<div class="error-text"></div>
			<a href="javascript:;" class="error-confirm">确认</a>
		</div>
	</div>
	<div class="modal-cover"></div>
	<div class="register-box">
		<div class="register-header">
			注册<a href="javascript:;" class="cancel-register close-register">x</a>
		</div>
		<div class="register-body">
			<form action="article.register.handle.php?type=2" method="post" name="formReg" autocomplete="off">
				<input type="text" name="name" placeholder="输入名称" class="form-control register-name" maxlength="20" autocomplete="off">
				<div class="register-tips"></div>
				<input type="password" name="password" placeholder="输入密码" class="form-control register-pwd" autocomplete="off">
				<div class="register-tips"></div>
				<input type="password" placeholder="确认密码" class="form-control confirm-pwd" autocomplete="off">
				<div class="register-tips"></div>
				<input type="submit" value="注册" class="confirm-register-btn form-control" name="formReg">
			</form>
			<p>已有账号！<a href="javascript:;" class="close-register" style="text-decoration: underline;">马上登录</a></p>
		</div>
	</div>
	<script type="text/javascript">
		window.onload=function(){
			var nameValue=getCookieValue("name");
			if(nameValue){
				userName.value=nameValue;
				userPwd.value=getCookieValue("pwd");
				remPwd.checked=true;
			}
		}
		//以下为登录框的内容
		//获取用户的账号和密码和验证码
		var userName=document.querySelector(".user-name>input");
		var userPwd=document.querySelector(".user-password>input");
		var validate=document.querySelector(".validate>input");
		//获取错误提示
		var errorTip=document.querySelector(".error-tips");
		//获取错误提示的文本
		var errorText=document.querySelector(".error-text");
		//给取消和确定绑定关闭事件
		var errorCancel=document.querySelector(".error-cancel");
		var errorConfirm=document.querySelector(".error-confirm");
		var errorTipClose=[errorCancel,errorConfirm];
		errorTipClose.forEach(function(child){
			child.onclick=function(){
				modalCover.className="modal-cover";
				errorTip.className="error-tips";
			}
		})
		//给注册按钮绑定事件
		var registerBtn=document.querySelector(".register-btn");
		registerBtn.onclick=function(){
			modalCover.className+=" fade";
			registerBox.className+=" fade";
		}
		//给登录按钮绑定事件
		var loginSubmit=document.querySelector(".login-submit-btn");
		loginSubmit.onclick=function(){
			// ||!validate.value.trim()
			// ||!validate.value.trim();
			if(!userName.value.trim()||!userPwd.value.trim()){
				var loginTarget=!userName.value.trim()||!userPwd.value.trim();
				switch(loginTarget){
					case !userName.value.trim():
					errorText.innerHTML="请输入用户名";
					errorTip.className+=" fade";
					modalCover.className+=" fade";
					userName.focus();
					return false;
					case !userPwd.value.trim():
					errorText.innerHTML="请输入密码";
					errorTip.className+=" fade";
					modalCover.className+=" fade";
					userPwd.focus();
					return false;
					// case !validate.value.trim():
					// errorText.innerHTML="请输入验证码";
					// errorTip.className+=" fade";
					// modalCover.className+=" fade";
					// validate.focus();
					// return false;
				}
			}
			else{
				var loginNameReg=/^\w{5,20}$/g;
				if(userName.value.trim().length<6||!userName.value.trim().match(loginNameReg)){
					errorText.innerHTML="请输入正确的用户名";
					errorTip.className+=" fade";
					modalCover.className+=" fade";
					userName.focus();
					return false;
				}
				else if(userPwd.value.trim().length<6){
					errorText.innerHTML="请输入正确的密码";
					errorTip.className+=" fade";
					modalCover.className+=" fade";
					userPwd.focus();
					return false;
				}
				// else if(validate.value.trim()!="隐藏域的验证值"){
				// 	errorText.innerHTML="请输入正确的验证码";
				// 	errorTip.className+=" fade";
				// 	modalCover.className+=" fade";
				// 	validate.focus();
				// 	return false;
				// }
				if(remPwd.checked){
					addCookie("name",userName,7,"/");
					addCookie("pwd",userPwd,7,"/");
				}
				else{
					deleteCookie("name","/");
					deleteCookie("pwd","/");
				}
			}
		}
		//是否记住密码
		var remPwd=document.querySelector(".remember-pwd input");


		//cookie
		function addCookie(name, value, days, path) { /**添加设置cookie**/
		    var name = escape(name);
		    var value = escape(value);
		    var expires = new Date();
		    expires.setTime(expires.getTime() + days * 3600000 * 24);
		    //path=/，表示cookie能在整个网站下使用，path=/temp，表示cookie只能在temp目录下使用  
		    path = path == "" ? "" : ";path=" + path;
		    //GMT(Greenwich Mean Time)是格林尼治平时，现在的标准时间，协调世界时是UTC  
		    //参数days只能是数字型  
		    var _expires = (typeof days) == "string" ? "" : ";expires=" + expires.toUTCString();
		    document.cookie = name + "=" + value + _expires + path;
		}

		function getCookieValue(name) { /**获取cookie的值，根据cookie的键获取值**/
		    //用处理字符串的方式查找到key对应value  
		    var name = escape(name);
		    //读cookie属性，这将返回文档的所有cookie  
		    var allcookies = document.cookie;
		    //查找名为name的cookie的开始位置  
		    name += "=";
		    var pos = allcookies.indexOf(name);
		    //如果找到了具有该名字的cookie，那么提取并使用它的值  
		    if (pos != -1) { //如果pos值为-1则说明搜索"version="失败  
		        var start = pos + name.length; //cookie值开始的位置  
		        var end = allcookies.indexOf(";", start); //从cookie值开始的位置起搜索第一个";"的位置,即cookie值结尾的位置  
		        if (end == -1) end = allcookies.length; //如果end值为-1说明cookie列表里只有一个cookie  
		        var value = allcookies.substring(start, end); //提取cookie的值  
		        return (value); //对它解码        
		    } else { //搜索失败，返回空字符串  
		        return "";
		    }
		}

		function deleteCookie(name, path) { /**根据cookie的键，删除cookie，其实就是设置其失效**/
		    var name = escape(name);
		    var expires = new Date(0);
		    path = path == "" ? "" : ";path=" + path;
		    document.cookie = name + "=" + ";expires=" + expires.toUTCString() + path;
		}




	    //以下为注册的内容
		//获取取消和关闭按钮
		var closeRegisterBtn=document.querySelectorAll(".close-register");
		//获取注册的姓名
		var registerName=document.querySelector(".register-name");
		//获取注册的密码
		var registerPwd=document.querySelector(".register-pwd");
		//获取确认的密码
		var registerConfirm=document.querySelector(".confirm-pwd");
		//获取提交按钮
		var registerSubmit=document.querySelector(".confirm-register-btn");
		//获取模态框和注册弹窗
		var modalCover=document.querySelector(".modal-cover");
		var registerBox=document.querySelector(".register-box");
		//给取消和关闭按钮绑定关闭事件
		closeRegisterBtn.forEach(function(child){
			child.onclick=function(){
				modalCover.className="modal-cover";
				registerBox.className="register-box";
			}
		})
		//给提交按钮绑定点击事件
		registerSubmit.onclick=function(){
			if(!registerName.value.trim()||!registerPwd.value.trim()||!registerConfirm.value.trim()){
				var target=!registerName.value.trim()||!registerPwd.value.trim()||!registerConfirm.value.trim();
				switch(target){
					case !registerName.value.trim():
					registerName.nextElementSibling.innerHTML="用户名为至少6位的英文字母数字和下划线";
					registerName.focus();
					return false;
					case !registerPwd.value.trim():
					registerPwd.nextElementSibling.innerHTML="请输入至少6位数的密码";
					registerPwd.focus();
					return false;
					case !registerConfirm.value.trim():
					registerConfirm.nextElementSibling.innerHTML="两次密码输入不一致";
					registerConfirm.focus();
					return false;
				}
			}
			else{
				var registerNameReg=/^\w{5,20}$/g;
				if(registerName.value.trim().length<6||!registerName.value.trim().match(registerNameReg)){
					registerName.nextElementSibling.innerHTML="用户名为至少6位的英文字母数字和下划线";
					registerName.focus();
					return false;
				}
				else if(registerPwd.value.trim().length<6){
					registerPwd.nextElementSibling.innerHTML="请输入至少6位数的密码";
					registerPwd.focus();
					return false;
				}
				else if(registerConfirm.value.trim()!=registerPwd.value.trim()){
					registerConfirm.nextElementSibling.innerHTML="两次密码输入不一致";
					registerConfirm.focus();
					return false;
				}
			}
		}
		//给输入框绑定事件清除提示
		var registerInput=[registerName,registerPwd,registerConfirm];
		registerInput.forEach(function(child){
			child.onkeyup=function(){
				child.nextElementSibling.innerHTML="";
			}
		})


		//为了避免浏览器自动填充账号密码
		// registerPwd
		// registerConfirm
		// userPwd
	</script>
</body>
</html>