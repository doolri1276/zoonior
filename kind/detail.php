<?php 

	require_once("../notice/db.php");
	$kindNO= $_GET['no'];

	$sql= mq("select * from kind where kindNO='$kindNO'");
	$row= $sql->fetch_array();

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>상세보기</title>

 	<link rel="stylesheet" type="text/css" href="index.css"
 	media="(min-width:661px)">

 	<!-- <link rel="stylesheet" type="text/css" href="../notice/index_m.css" media="(max-width:660px)"> -->

 	<script src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

  <style type="text/css">
  	#borderContent{
  		word-wrap: break-word;
  	}
  </style>
 </head>
 <body>

 	<div id="inner_page">
 		<h2>백과사전</h2>
 		<div id="board_area">
 			<div class="thr">
 				
 			</div>
 			<div class="tr">
 				<span class="kindNO stxt"><?php echo $kindNO?></span>
 				<span class="title th"><?php echo $row['type']?></span>
 			</div>
 			<div class="tr">
 				<span class="s3 stxt"><?php echo "운영자"; ?></span>
 				<span class="s3 center stxt"><?php echo $row['visited']?></span>
 			</div>

 			<div class="tr">
 				<center><img src="<?php echo $row['pic']?>" ></center><br><hr><br>
 				<span class="contents"><?php echo nl2br($row['page'])?></span>
 			</div>
 		</div>
 	</div>
 
 </body>
 </html>