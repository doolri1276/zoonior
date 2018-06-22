<?php 

	include "db.php";

 ?>

 <!DOCTYPE html>
 <html lang="ko">
 <head>
 	<meta charset="utf-8">
 	<title>NOTICE</title>
 	<link rel="stylesheet" type="text/css" href="index_tw.css"
 	media="(min-width:661px)">

 	<link rel="stylesheet" type="text/css" href="index_m.css" media="(max-width:660px)">

 	<script src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

  <script type="text/javascript">
  	$(document).ready(function(){
  		$('span.title a').on('mouseover',function(){
  			$(this).css('color','#CF1B26');
  		});

  		$('span.title a').on('mouseleave',function(){
  			$(this).css('color','');
  		});
  	});
  </script>

 </head>
 <body>

 	<div id="inner_page">
 		<h2>공지사항</h2>


 		<div id="top">

 			<div id="notice_cnt">
 				<p class="top">게시물 : </p>
 				<p class="top" id="notice_cnt">37</p>
 				<p class="top">개</p>
 			</div>

 			<div id="show">
 				<ul>
 					<li><a href="#" class="top" >최신순</a></li>
 					<li class="top"><a href="#">|</a></li>
 					<li class="top"><a href="#">조회수</a></li>
 				</ul>
 				
 			</div>
 			
 		</div>

 		<div id="board_area">
 			<div class="list_table">

 				<!-- <spanead> -->
 					<div class="thr">
 						<span class="s1">
 							<span class="noticeNO th">NO</span>
 							<span class="title th">TITLE</span>
 						</span>
 						
 						<span class="s2">
 							<span class="name th">NAME</span>
	 						<span class="date th">DATE</span>
	 						<span class="visited th">VISITED</span>
 						</span>
 						

 					</div>
 				<!-- </spanead> -->

 				<?php 

 					$sql=mq("select * from notice order by noticeNO desc");

 					while ($board=$sql->fetch_array()) {
 						$title=$board[title];
 						if(strlen($title)>30){

 							$title=str_replace($board[title],mb_substr($board[title],0,30,"utf-8")."...",$board[title]);
 						}
 					
 				 ?>

 				 <!-- <tbody> -->
 				 	<div class="tr">
 				 		<span class="s1">
 				 			<span class="noticeNO stxt"><?php echo "$board[noticeNO]"; ?></span>
 				 			<span class="title"><a href="detail.php?no=<?php echo $board[noticeNO];?>"><?php echo "$title"; ?></a></span>
 				 		</span>

 				 		<span class="s2">
 				 			<span class="name stxt"><?php echo "운영자"; ?></span>
							<span class="date stxt"><?php echo "$board[date]"; ?></span>
							<span class="visited stxt"><?php echo "$board[visited]"; ?></span>
 				 		</span>
 				 		
 				 	</div>
 				 <!-- </tbody> -->

 				<?php } ?>
 				
 			</div>

 			




				
			
 		</div>
 	</div>


 
 </body>
 </html>