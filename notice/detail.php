<?php 
	require_once("db.php");
	$noticeNO=$_GET['no'];

	//echo "$noticeNO";

	$sql=mq("select * from notice where noticeNO='$noticeNO'");
	$row=$sql->fetch_array();

 ?>

 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>상세보기</title>
	<!-- <link rel="stylesheet" href="normalize.css" />
	<link rel="stylesheet" href="board.css" /> -->

		<link rel="stylesheet" type="text/css" href="index_tw.css"
 	media="(min-width:661px)">

 	<link rel="stylesheet" type="text/css" href="index_m.css" media="(max-width:660px)">

 	<script src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

	<style type="text/css">
		#boardContent{
			word-wrap: break-word;
		}
	</style>
</head>
<body>
	<div id="inner_page">
		<h2>공지사항</h2>
		<div id="board_area">
			<div class="thr">

			</div>
			<div class="tr">
				<span class="noticeNO stxt"><?php echo $noticeNO?></span>
				<span class="title th"><?php echo $row['title']?></span>
			</div>
			<div class="tr">
				<span class="s3 stxt"><?php echo "운영자"; ?></span>
				<span class="s3 center stxt"><?php echo $row['date']?></span>
				<span class="s3 right stxt"><?php echo $row['visited']?></span>
			</div>

			<div class="tr">
				<span class="contents"><?php echo nl2br($row['contents'])?></span>
			</div>
		</div>

		
	</div>
	
</body>
</html>