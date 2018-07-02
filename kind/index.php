<?php 

	include "../notice/db.php";

	$pageNum= ($_GET['page'])?$_GET['page']:1;
	$list= ($_GET['list'])?$_GET['list']:10;

	$b_pageNum_list= 10;
	$block= ceil($pageNum/$b_pageNum_list);

	$b_start_page=(($block-1)*$b_pageNum_list)+1;
	$b_end_page  = $b_start_page+$b_pageNum_list-1;



	$cnt= mq('SELECT count(*) AS cnt FROM kind');
	$cntresult= $cnt->fetch_array();

	$total_count= $cntresult['cnt'];
	$total_page= ceil($total_count/$list);

	if($b_end_page>$total_page) $b_end_page= $total_page;

	$limit= ($pageNum-1)*$list;


?>


 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>KIND</title>
 	<link rel="stylesheet" type="text/css" href="index.css">
 	<link rel="stylesheet" type="text/css" href="../sy/zoo_write.css">

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

 				if($by==0){
 					$sql= mq("select * from kind order by kindNO desc limit $limit, $list");
 				}elseif($by==1){
 					$sql= mq("select * from kind order by visited desc limit $limit, $list");
 				}

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

		 <div class="paging">
      <ul>
      <?php 
      if($pageNum <= 1){?>
        <li class="page page_start"><a href="#">처음</a></li>

       <?}else{?>
        <li class="page page_start"><a href="index.php?page=&list=<?=$list?>&by=<?=$by?>">처음</a></li>
      <?}

      if($block <= 1){?>

      <?}else{?><!-- block이 1보다 크다면.. -->
        <li class="page page_prev"><a href="index.php?page=<?=$b_start_page-1?>&list=<?=$list?>&by=<?=$by?>">이전</a></li>
      <?}


      for($j=$b_start_page;$j<=$b_end_page;$j++){
        if($pageNum==$j){//pageNum과 j가 같으면 현재 페이지 이므로
      ?>
        <li class="page current"><?=$j?></li>
      <?}else{?>
        <li class="page"><a href="index.php?page=<?=$j?>&list=<?=$list?>&by=<?=$by?>"><?=$j?></a></li>
        <?
        }
      }

      $total_block=ceil($total_page/$b_pageNum_list);

      if($block >= $total_block){?>

      <?}else{?><!-- 그게 아니라면?!?!? -->
        <li class="page page_next"><a href="index.php?page=<?=$b_end_page+1?>&list=<?=$list?>&by=<?=$by?>">다음</a></li>
      <?}

      if($pageNum >= $total_page){?>
        <li class="page page_end"><a href="#">끝</a></li>
      <?}else{?>
        <li class="page page_end"><a href="index.php?page=<?=$total_page?>&
          list=<?=$list?>&by=<?=$by?>">끝</a></li>
      <?}

      ?>
    </div>

		
		
 	</div>
			
 
 </body>
 </html>
