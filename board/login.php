<?php
	include('item.php');
	class Login extends DB{
		function __construct(){
			parent::__construct();//初始化父类构造方法，连接数据库
			$this->showForm();
			$this->receiveForm();
		}
		function receiveForm(){
			if (count($_POST != 0)) {
				if (isset($_POST['login'])){
				$this->AccountValidation($_POST['user_name'],$_POST['user_pass']);
				}
			}
		}
		function AccountValidation($name,$pass){//用户账号密码验证
			$name=addslashes($name);
			$pass=md5($pass);			
			$result = mysqli_query($this->database,"SELECT user_name FROM `user` WHERE (user_name='".$name."') AND (user_pass='".$pass."');");
				session_start();
				$_SESSION['user_name']= $name;
			if (mysqli_num_rows($result)) {
				Header("Location: Message.php?c=".$_SESSION['user_name']." "); 
			}else{
				echo "失败";
			}

		}
		function showForm(){
			include('login.html');
		}
	}
	$hk = new Login();
