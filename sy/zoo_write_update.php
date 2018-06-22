<?php 
	
	header('Content-Type:text/html; charset=utf-8');
	require_once("zoonior.php");

	if(isset($_POST['no'])){
		$no = $_POST['no'];

	}

	if(empty($no)){
		$id = $_POST['id'];
		$date = date('Y-m-d H:i:s');
	}

	$paw = $_POST['paw'];
	$title = $_POST['title'];
	$tel = $_POST['tel'];
	$local = $_POST['local'];
	$kind = $_POST['kind'];
	$kinds = $_POST['kinds'];
	$rgsex = $_POST['rgsex'];
	$life = $_POST['life'];
	$rgr = $_POST['rgrespond'];
	$rgy = $_POST['rgyou'];
	$exp = $_POST['exp'];



	$srcFileName=$_FILES['pic']['name'];
	$tmpFileName=$_FILES['pic']['tmp_name'];

	$dstFileName="upload/".date(Ymdhid).".png";


	if(move_uploaded_file($tmpFileName, $dstFileName)){
		$msgpic = "사진등록성공";
	}else{
		$msgpic = "사진등록실패";
	}


?>	
	<script type="text/javascript">
		alert("<?php echo $msgpic?>");
 		
	</script>

<?php
	
	if(isset($no)) {
	
	$sql = 'select count(paw) as cnt from board_post where paw="'.$paw.'" and no =' . $no;
	$result = $db->query($sql);
	$row = $result->fetch_assoc();
	
	
	if($row['cnt']) {
		$sql = 'update board_post set title="' . $title . '", tel="' . $tel . '", local="' . $local . '", kind="' . $kind . '", kinds="' . $kinds . '", rgsex="' . $rgsex . '",life="' . $life . '",rgr="' . $rgr . '",rgy="' . $rgy . '",exp="' . $exp . '" where no = ' . $no;
		$msgState = '수정';
	
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
	
//글 등록
	} else {	

		$sql = "insert into board_post (no,title,id,paw,tel,local,kind,kinds,rgsex,life,rgr,rgy,pic,exp,date) values(null,'$title','$id','$paw','$tel','$local','$kind','$kinds','$rgsex','$life','$rgr','$rgy','$dstFileName','$exp','$date')";
		$msgState = '등록';
	}

if(empty($msg)) {

	$result = $db->query($sql);

	if($result){
		$msg = "정상적으로 글이 ".$msgState."되었습니다.";
		if(empty($no)) {
			$no = $db->insert_id;
		}
		$replaceURL = './view.php?no=' . $no;

	}else{
		$msg="글을 ".$msgState."하지 못했습니다.";

 ?>	
 	<script type="text/javascript">
 		alert("<?php echo $msg?>");
 		history.back();
 	</script>

<?php 
	}
 }
 ?>

 <script type="text/javascript">
 	alert("<?php echo $msg ?>");
 	location.replace("<?php echo $replaceURL?>");

 </script>




























