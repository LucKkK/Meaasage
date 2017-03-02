<?php
	include_once('item.php');
	class MeaasgeBoard extends DB{
		var $messages = array();

		function __construct(){
			parent::__construct();
			$this->receiveMessage();//接收信息
			$this->loadData();//读取
			$this->showAllMessages();
			$this->showForm();
		}
		function receiveMessage(){
			if (count($_POST) != 0) {
			$this->saveData($_POST['username'],date("Y-m-d h:i:s",time()),$_POST['content']);//1:保存到数据库
			}
		}
		function saveData($u,$t,$c){//2
			$u=filter_var($u,FILTER_SANITIZE_STRIPPED);
			// $c=filter_var($t,FILTER_SANITIZE_STRIPPED);

			mysqli_query($this->database,"INSERT INTO `all_messages`(`name`, `time`, `content`) VALUES ('".htmlentities($u)."','".$t."','".htmlentities($c)."');");
		}
		function loadData(){//3
			$result = mysqli_query($this->database,"SELECT * FROM `all_messages`;");
			while ($row = mysqli_fetch_array($result)) {
				$temp = new Message($row['name'],$row['time'],$row['content']);
				array_push($this->messages, $temp);
			}
		}
		function showAllMessages(){//4
			foreach ($this->messages as $m) {
				$m->show();
			}
		}
		function showForm(){//5
			echo "<form action='' method='POST'>";
			echo "Name:"."<input type='text' name='username'>"."<br>";
			echo "Content:"."<input type='text' name='content'>";
			echo "<input type='submit'>";
			echo "</form>";
		}
	}
	$mb = new MeaasgeBoard();
?>