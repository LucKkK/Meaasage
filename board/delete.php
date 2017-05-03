<?php
include('item.php');
class Delete extends DB{
	function __construct(){
		parent::__construct();
		$this->shanchu();
	}
	function shanchu(){
		$rid = $_GET['d'];
		$s = (int)$rid;
		$a = $_GET['a'];
		$b = $_GET['b'];
		$c = $_GET['c'];
		mysqli_query($this->database,"DELETE FROM `replay` WHERE `replay_id`='".$s."';"); 
		Header("Location: details.php?aa=".$a."&&bb=".$b."&&cc=".$c.""); 
	}
}
$hs = new DELETE;