<?php 

	$db=mysqli_connect("localhost","zoonior","wnsldjemf5","zoonior");
	$db->set_charset("utf8");

	function mq($sql){
		global $db;
		return $db->query($sql);
	}

 ?>