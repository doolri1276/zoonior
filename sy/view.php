<?php
	require_once("zoonior.php");
	$no = $_GET['no'];



	$sql = 'select * from board_post where no = ' . $no;
	$result = $db->query($sql);
	$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>상세보기</title>

		<link rel="stylesheet" type="text/css" href="../notice/index_tw.css"
 	media="(min-width:661px)">

 	<link rel="stylesheet" type="text/css" href="../notice/index_m.css" media="(max-width:660px)">

</head>
<body>
	<div class="inner_page">
		<h2>상세 분양 정보</h2>

		
		<!-- <div id="boardView"> -->
			<div class="thr"></div>

			<div id="boardInfo" class="tr">
				<span class="noticeNO  stxt"><?php echo $row['no']?></span>
				<span class="title th">
					<?php echo $row['title']?>
				</span>
			</div>

			<div class="tr">
				<span class="s3  stxt"><?php echo $row['id']?></span>
				<span class="s3 center  stxt"><?php echo $row['date']?></span>
				<span class="s3 right  stxt">12</span>
			</div>

			<div class="tr">
				<span class="text">
					<span class="text stxt">
						전화번호
					</span>
					<span class="input" id="boardTel">
						<?php echo $row['tel']?>
					</span>
				</span>
				<span class="text">
					<span class="text stxt">
						장소
					</span>
					<span class="input" id="boardLocal">
						<?php echo $row['local']?>
					</span>
				</span>
				</div>

				<div class="tr">
				<span class="text">
					<span class="text stxt">
						동물 종류
					</span>
					<span class="input" id="boardKind1">
						<?php echo $row['kind']?>
					</span>
				</span>
				<span class="text">
					<span class="text stxt">
						품종
					</span>
					<span class="input" id="boardKind2">
						<?php echo $row['kinds']?>
					</span>
				</span>
				</div>

				<div class="tr">

				<span class="text">
					<span class="text stxt">
						성별
					</span>
					<span class="input" id="boardSex">
						<?php echo $row['rgsex']?>
					</span>
				</span>
				<span class="text">
					<span class="text stxt">
						나이
					</span>
					<span class="input" id="boardLife">
						<?php echo $row['life']?>
					</span>
				</span>

			</div>

				<div class="tr">

				<span class="text">
					<span class="text stxt">
						책임비
					</span>
					<span class="input" id="boardRes">
						<?php echo $row['rgr']?>
					</span>
				</span>
				<span class="text">
					<span class="text stxt">
						유기동물 유/무
					</span>
					<span class="input" id="boardRes2">
						<?php echo $row['life']?>
					</span>
				</span>
			</div>




			<div class="tr" id="boardContent">
				<div class="img">
					<img id="boardPic" src="<?php echo $row['pic'] ?>">
				</div>
				<!-- <span id="title">상세정보</span><br> -->
				<span class="contents" id="exp"><?php echo $row['exp']?></span>
			</div>

			<div class="btnSet tr">
				<a href="zoo_write.php?no=<?php echo $no?>">수정</a>
				<a href="delete.php?no=<?php echo $no?>">삭제</a>
				<a href="./">목록</a>
			</div>

		</div>

	<!-- </div> -->

		
		




</body>
</html>












