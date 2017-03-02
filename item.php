<?php
	class Message{
		var $name;
		var $content;		
		var $time;

		function __construct($n,$t,$c){
			$this->name=$n;
			$this->time=$t;
			$this->content=$c;
		}
		function show(){
			echo "Name:".$this->name."<br>";
			echo "Time:".$this->time."<br>";
			echo "Content:".$this->content."<br>";
			echo "=========================================="."<br>";
		}
	}
	class DB{
		var $database = null;

		function __construct(){
			//连接数据库
			$dbhost="localhost";
			$account="root";
			$password="luc";
			$db="db_messages";


			$this->database=mysqli_connect($dbhost,$account,$password,$db);
		
		}
		function __destruct(){
			//关闭连接
			mysqli_close($this->database);	
		}
	}
	$db = new DB;
?>