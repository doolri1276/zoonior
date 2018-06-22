<?php 

	include "../notice/db.php";

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>KIND</title>
 	<link rel="stylesheet" type="text/css" href="index.css">

 	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"
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

 	<h2>동물사전</h2>

 	<div id="top">
 		<div class="kind_cnt">
 			<p class="top">게시물 : </p>
 			<p class="top kind_cnt">5</p>
 			<p class="top">개</p>
 		</div>
 	</div>

 	<div id="board_area">
 		<div class="list_table">
 			<!--  -->
 			<div class="thr">
 				<span class="s1">
 					<span class="kindNO th">NO</span>
 					<span class="pic th">PHOTO</span>
 					<span class="kind th">KIND</span>
 				</span>

 				<span class="s2">
 					<span class="name th">NAME</span>
 					<span class="visited th">VISITED</span>
 				</span>
 			</div>
 			<!--  -->

 			<?php

 				$sql= mq("select * from kind order by kindNO desc");

 				while($board=$sql->fetch_array()){
 					$title= $board[type];
 					if(strlen($title)>30){

 						$title=str_replace($board[type], mb_substr($border[type], 0, 30, "utf-8")."...", $board[type]);
 					}

 			?>

 			<!-- <tbody> -->
 				<div class="tr">
 					<span class="s1">
 						<span class="kindNO"><?php echo "$board[kindNO]";?></span>
 						<span class="pic"><img width="50%" src="<?php echo $board[pic]?>" ></span>
 						<span class="title"><a href="detail.php?no=<?php echo $board[kindNO];?>"><?php echo "$title"; ?></a></span>
 					</span>

 					<span class="s2">
 						<span class="name"><?php echo "운영자";?></span>
 						<span class="visited"><?php echo "$board[visited]";?></span>
 					</span>
 				</div>


 			<?php	} ?>

			</div>
 		</div>
 	</div>

 	
 
 </body>
 </html>