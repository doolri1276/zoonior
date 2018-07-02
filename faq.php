<?php 

	include "notice/db.php";

  //페이지 관리 시작..

  $pageNum=($_GET['page'])?$_GET['page']:1;
  $list=($_GET['list'])?$_GET['list']:10;//한페이지에 나오는 글 갯수
  $by=($_GET['by'])?$_GET['by']:0;//0: 최신순, 1: 조회수


  $b_pageNum_list=10;//
  $block=ceil($pageNum/$b_pageNum_list);

  $b_start_page=(($block-1)*$b_pageNum_list)+1;
  $b_end_page=$b_start_page+$b_pageNum_list-1;

  
  
  $cnt=mq('select count(*) as cnt from faq');
  $cntresult=$cnt->fetch_array();

  $total_count=$cntresult['cnt'];
  $total_page=ceil($total_count/$list);

  if($b_end_page>$total_page)
    $b_end_page=$total_page;

  $limit=($pageNum-1)*$list;

 ?>

 <!DOCTYPE html>
 <html lang="ko">
 <head>
 	<meta charset="utf-8">
 	<title>FAQ</title>
 	<link rel="stylesheet" type="text/css" href="notice/index_tw.css"
 	media="(min-width:661px)">

 	<link rel="stylesheet" type="text/css" href="notice/index_m.css" media="(max-width:660px)">

  <link rel="stylesheet" type="text/css" href="sy/zoo_write.css">

 	<script src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

  <script src="index.js"></script>

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
<div id="page">

  <?php 
      include "header.php";
      include "nav.php";
  ?> 

 	<article>
 		<h2>FAQ</h2>


 		<div id="top">

 			<div id="notice_cnt">
 				<p class="top">게시물 : </p>
 				<p class="top" id="notice_cnt"><?=$total_count?></p>
 				<p class="top">개</p>
 			</div>

 			<div id="show">
 				<ul>
 					<li><a href="faq.php?by=<?echo(0)?>" class="top" >최신순</a></li>
 					<li class="top"><a href="#">|</a></li>
 					<li class="top"><a href="faq.php?by=<?echo(1)?>">조회수</a></li>
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
          


          if($by==0){
            $sql=mq("select * from faq order by faqNO desc limit $limit, $list");
          }else if($by==1){
            $sql=mq("select * from faq order by visited desc limit $limit, $list");
          }
          
 					while ($board=$sql->fetch_array()) {
 						$title=$board[title];
 						if(strlen($title)>30){

 							$title=str_replace($board[title],mb_substr($board[title],0,30,"utf-8")."...",$board[title]);
 						}
 					
 				 ?>

 				 <!-- <tbody> -->
 				 	<div class="tr">
 				 		<span class="s1">
 				 			<span class="noticeNO stxt"><?php echo "$board[faqNO]"; ?></span>
 				 			<span class="title"><a href="detail.php?no=<?php echo $board[faqNO];?>"><?php echo "$title"; ?></a></span>
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

    <div class="paging">
      <ul>
      <?php 
      if($pageNum <= 1){?><!-- 페이지 번호가 1보다 작거나 같다면 -->
        <li class="page page_start"><a href="#">처음</a></li>

       <?}else{?>
        <li class="page page_start"><a href="faq.php?page=&list=<?=$list?>&by=<?=$by?>">처음</a></li>
      <?}

      if($block <= 1){?><!-- block이 1보다 작거나 같으면 -->
      <!-- 거꾸로 못가니까 아무 표시도 안함. -->

      <?}else{?><!-- block이 1보다 크다면.. -->
        <li class="page page_prev"><a href="faq.php?page=<?=$b_start_page-1?>&list=<?=$list?>&by=<?=$by?>">이전</a></li>
      <?}

      //$b_start_page를 $j의 초기값으로 설정
      //$b_end_page보다 작거나 같을 때까지 for문 돌리기
      //$j하나씩 증가시키기

      for($j=$b_start_page;$j<=$b_end_page;$j++){
        if($pageNum==$j){//pageNum과 j가 같으면 현재 페이지 이므로
      ?>
        <li class="page current"><?=$j?></li><!-- 링크 걸지 않고 그냥 현재 페이지만 출력 -->
      <?}else{?><!-- 서로 다르다면.. -->
        <li class="page"><a href="faq.php?page=<?=$j?>&list=<?=$list?>&by=<?=$by?>"><?=$j?></a></li>
        <?
        }
      }

      $total_block=ceil($total_page/$b_pageNum_list);

      if($block >= $total_block){?><!-- block과 총 block개수가 값이 같다면.. -->
      <!-- 맨 마지막 블럭이므로 다음 링크 버튼이 필요 없어서 보여주지 않는다. -->

      <?}else{?><!-- 그게 아니라면?!?!? -->
        <li class="page page_next"><a href="faq.php?page=<?=$b_end_page+1?>&list=<?=$list?>&by=<?=$by?>">다음</a></li>
      <?}

      if($pageNum >= $total_page){?>
        <li class="page page_end"><a href="#">끝</a></li>
      <?}else{?>
        <li class="page page_end"><a href="faq.php?page=<?=$total_page?>&
          list=<?=$list?>&by=<?=$by?>">끝</a></li>
      <?}

      ?>
    </div>
 	</article>

  <?
    include "footer.php";
  ?>

</div>
 </body>
 </html>