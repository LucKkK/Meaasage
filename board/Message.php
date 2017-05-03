<?php
	include('item.php');
	class MessageBoard extends DB{
		var $message = array();

		function __construct(){
			parent::__construct();//初始化父类构造方法，连接数据库
			$this->receiveMessage();
			$this->loadData();
			$this->showAllMessages();
			$this->deleteMessage();
			$this->showForm();
		}

		function receiveMessage(){//接收数据
			if (count($_POST) != 0) {
				$this->saveData($_POST['article_title'],$_POST['article_content'],date("Y-m-d h:i:s",time()));//保存到数据库
			}
		}

		function saveData($title,$content,$time){//数据库保存操作
			$title = addslashes($title);
			session_start();
			$author = $_SESSION['user_name'];
			$content = addslashes($content);
			mysqli_query($this->database,"INSERT INTO `article`(`article_title`,`article_author`,`article_content`,`article_time`)
				VALUES('".$title."','".$author."','".$content."','".$time."');");
		}

		function loadData(){//从数据库获取信息
			$result = mysqli_query($this->database,"SELECT * FROM `article`");
			while ($row = mysqli_fetch_array($result)) {
				$temp = new Message($row['article_title'],$row['article_author'],$row['article_content'],$row['article_time'],$row['article_id']);
				array_push($this->message, $temp);
			}
		}

		function showAllMessages(){//显示信息
			foreach ($this->message as $m) {
				$c = $_GET['c'];
				$m->show($c);
			}
		}

		function deleteMessage(){//删除文章

		}

		function showForm(){//发布文章
			echo "<form action='' method='POST'>";
			echo "主题:<input type='text' name='article_title'><br>";
			echo "内容:<input type='textarea' name='article_content'><br>";
			echo "<input type='submit'>";
			echo "</form>";
		}
	} 	
	$mv = new MessageBoard();













