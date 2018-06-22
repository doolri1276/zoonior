<?php 
	header('Content-Type:text/html; charset=utf-8');
	require_once("zoonior.php");

	if(isset($_POST['no'])){
		$no = $_POST['no'];	
	}

	$paw = $_POST['paw'];

	
	if(isset($no)){
		$sql = 'select count(paw) as cnt from board_post where paw="'.$paw.'" and no = ' . $no;
		$result = $db->query($sql);
		$row = $result->fetch_assoc();

		if($row['cnt']){
			$sql = 'delete from board_post where no = ' . $no;
			//틀리다면 메시지 출력 후 이전화면으로
		} else {
			$msg = '비밀번호가 맞지 않습니다.';
		?>
			<script>
				alert("<?php echo $msg?>");
				history.back();
			</script>
		<?php
			exit;
		}
	}
	
	$result = $db->query($sql);
	
	if($result) {
	$msg = '정상적으로 글이 삭제되었습니다.';
	$replaceURL = './index.php';
	} else {
	$msg = '글을 삭제하지 못했습니다.'; 

?>
	<script>
		alert("<?php echo $msg?>");
		history.back();
	</script>
	
<?php } ?>
<script>
	alert("<?php echo $msg?>");
	location.replace("<?php echo $replaceURL?>");
</script>


