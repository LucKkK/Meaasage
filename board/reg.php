<?php
	include('item.php');
	class Reg extends DB{
		function __construct(){
			parent::__construct();
			$this->receiveForm();
			$this->showForm();
		}
		function receiveForm(){
			if (isset($_POST['reg'])) {
							if ($_POST['user_pass'] == $_POST['repass']) {
				$this->regValidation($_POST['user_name'],$_POST['user_pass'],date("Y-m-d h:i:s",time()));
			}else{
				echo "两次输入的密码不一样";
			}
			}
		}
		function regValidation($name,$pass,$time){
			$pass=md5($pass);
			$name=addslashes($name);		
			$result = mysqli_query($this->database,"SELECT user_name FROM `user` WHERE user_name='".$name."';");
			if (mysqli_num_rows($result)) {
				echo "该用户已存在";
			}else{
				mysqli_query($this->database,"INSERT INTO `user`(`user_name`,`user_pass`,`regdate`)
					VALUES('".$name."','".$pass."','".$time."');");
					echo "注册成立";
				Header("Location: login.php "); 
					exit; 				
			}
		}
		function showForm(){
			include('reg.html');
		}
	}
	$os = new Reg;
