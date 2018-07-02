<meta charset="utf-8">
<?php 

	$id=$_POST['id'];

	if(!$id){
		echo "아이디를 입력하세요.";
	}else{
		include "../notice/db.php";
		$sql=mq("SELECT * from user where id='$id'");

		$num_record=mysql_num_rows($sql);

		if($num_record){
			echo "아이디가 중복됩니다.<br>";
			echo "다른 아이디를 사용하세요.<br>";
		}else{
			echo "사용가능한 아이디입니다.";
		}

		mysqli_close();
	}

?>