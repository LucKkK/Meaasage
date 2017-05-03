<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-Type" content="text/html" charset="utf-8">
	<title>登录界面</title>
	<style type="text/css">
		html{font-size: 12px;}
		fieldset{width: 250px;margin: 0 auto;}
		legend{font-weight: bold;font-size: 20px}
		.label{float: left;width: 70px;margin-left: 10px;}
		.left{margin-left: 80px;}
		.input{width: 150px;}
		span{color: #666;}
		a{text-decoration: none;}
	</style>
	<script type="text/javascript">
		function InputCheck(LoginForm){
			if (LoginForm.username.value == "") {
				alert("用户名不能为空");
				LoginForm.username.focus();
				return false;
			}
			if (LoginForm.password.value == "") {
				alert("密码不能为空");
				LoginForm.password.focus();
				return false;
			}
		}
	</script>
</head>
<body>
<div>
	<fieldset>
		<legend>登陆</legend>
		<form name="LoginForm" method="post" action="login.php" onSubmit="return InputCheck(this)">
			<p>
		<label for="username" class="label">用户名:</label>
		<input id="username" name="username" type="text" class="input" />
			<p/>
			<p>
		<label for="password" class="label">密 码:</label>
		<input id="password" name="password" type="password" class="input" />
			<p/>
			<p>
		<input type="submit" name="submit" value="  登 录  " class="left" />
		<a href="reg.html"><input type="button" href="reg.html" value="  注 册  " class="right" /></a>
			</p>
		</form>
	</fieldset>
</div>
</body>
</html>