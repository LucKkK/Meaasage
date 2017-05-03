<?php
	class Message{
		var $article_title;//文章标题
		var $article_author;//文章作者
		var $article_content;//文章内容
		var $article_time;//文章发布时间
		var $article_id;//文章id

		function __construct($title,$author,$content,$time,$id){
			$this->article_title = $title;
			$this->article_author = $author;
			$this->article_content = $content;
			$this->article_time = $time;
			$this->article_id = $id;

		}
		function show(){
			$a = $this->article_id;
			$b = $this->article_title;
			$c = $_GET['c'];
			echo "主题:<a href=details.php?aa=".$a."&&bb=".$b."&&cc=".$c.">".$b."</a></br>";
			echo "作者:".$this->article_author."</br>";
			echo "内容:".$this->article_content."</br>";
			echo "发布时间".$this->article_time."</br>";
			echo "======================="."</br>";
		}
	}
	class Replay{
		var $replay_content;//回复内容
		var $replay_author;//回复者
		var $replay_time;//回复时间\
		var $replay_id;

		function __construct($content,$author,$time,$id){
			$this->replay_content = $content;
			$this->replay_author = $author;
			$this->replay_time = $time;
			$this->replay_id = $id;

		}
		function show(){
			$a = $_GET['aa'];
			$b = $_GET['bb'];
			$c = $_GET['cc'];
			echo "回复内容:".$this->replay_content."</br>";
			echo "回复人:".$this->replay_author."</br>";
			echo "回复时间:".$this->replay_time."</br>";
			echo "ID:".$this->replay_id."</br>";
			$c = $_GET['cc'];
			if ($this->replay_author == $c){
				echo "<a href='delete.php?a=".$a."&&b=".$b."&&c=".$c."&&d=".$this->replay_id."'><input type='submit' value='删除'></a>"."</br>";
			}
			echo "====================================="."</br>";
		}

	}

	class DB{
		var $database = null;

		function __construct(){
			ini_set('date.timezone','Asia/ShangHai');
			$this->database = mysqli_connect('localhost','root','luc','M');
			mysqli_set_charset($this->database,'utf8');
		}
		function __destruct(){
			mysqli_close($this->database);
		}
	}
	$db = new DB();