<?php
include('item.php');
class Details extends DB{
	var $message = array();
	function __construct(){
		parent::__construct();
		$this->loadArticle();
		$this->receiveReplay();
		$this->loadReplay();
		$this->showReplay();
		$this->showForm();
	}
	function loadArticle(){
		$a=$_GET['aa'];
		$result = mysqli_query($this->database,"SELECT * FROM article WHERE article_id='".$a."';");
		while ($row = mysqli_fetch_array($result)) {
			echo "标题:".$row['article_title']."</br>";
			echo "作者:".$row['article_author']."</br>";
			echo "内容:".$row['article_content']."</br>";
			echo "发布时间:".$row['article_time']."</br>";
			echo "====================================="."</br>";	
		}
	}
	function receiveReplay(){//接收回复信息
		if (count($_POST != 0)) {
			if (isset($_POST['replay'])) {
				session_start();
			$this->saveReplay($_POST['replay_content'],$_SESSION['user_name']);
			}
		}
	}
	function saveReplay($content,$author){//将回复信息保存到数据库
		$content = addslashes($content);
		$author = addslashes($author);
		$b = $_GET['bb'];//获得文章标题
		$id = $_GET['aa'];//获得文章id
		$title = addslashes($b);
		$time = date("Y-m-d h:i:s",time());
		mysqli_query($this->database,"INSERT INTO `replay`(`article_title`,`reply_content`,`replay_author`,`replay_time`,`article_id`)VALUES('".$title."','".$content."','".$author."','".$time."','".$id."');");
	}

	function loadReplay(){//加载回复
		$result = mysqli_query($this->database,"SELECT * FROM replay;");
		while ($row = mysqli_fetch_array($result)) {
				$temp = new Replay($row['reply_content'],$row['replay_author'],$row['replay_time'],$row['replay_id']);
				array_push($this->message, $temp);
			}		
	}
	function showReplay(){//输出回复
		foreach ($this->message as $m) {
			$m->show();
		}
	}
	function deleteReplay(){
		
	}
	function showForm(){//发表回复
		echo "<form action='' method='POST'>";
		echo "<input type='hidden' name='replay'>";
		echo "回复内容:<input type='textarea' name='replay_content'></br>";
		echo "<input type='submit'>";
		echo "</form>";
	}
}
$d=new Details();