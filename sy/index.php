<?php 
	header('Content-Type:text/html; charset=utf-8');
	require_once("zoonior.php");



	//페이지 get 변수가 있다면 받아오고, 없다면 1페이지를 보여준다.
	if(isset($_GET['page'])) {
		$page = $_GET['page'];
	} else {
		$page = 1;
	}
	
	$sql = 'select count(*) as cnt from board_post';
	$result = $db->query($sql);
	$row = $result->fetch_assoc();
	
	$allPost = $row['cnt']; 
	
	$onePage = 10; 
	$allPage = ceil($allPost / $onePage); 
	
	if($page < 1 || ($allPage && $page > $allPage)) {
?>
		<script>
			alert("존재하지 않는 페이지입니다.");
			history.back();
		</script>
<?php
		exit;
	}

	$oneSection = 10; 
	$currentSection = ceil($page / $oneSection); 
	$allSection = ceil($allPage / $oneSection); 
	
	$firstPage = ($currentSection * $oneSection) - ($oneSection - 1);
	
	if($currentSection == $allSection) {
		$lastPage = $allPage; 
	} else {
		$lastPage = $currentSection * $oneSection; 
	}
	
	$prevPage = (($currentSection - 1) * $oneSection); 
	$nextPage = (($currentSection + 1) * $oneSection) - ($oneSection - 1); 
	
	$paging = '<ul>'; 
	

	if($page != 1) { 
		$paging .= '<li class="page page_start"><a href="index.php?page=1">처음</a></li>';
	}

	if($currentSection != 1) { 
		$paging .= '<li class="page page_prev"><a href="index.php?page=' . $prevPage . '">이전</a></li>';
	}
	
	for($i = $firstPage; $i <= $lastPage; $i++) {
		if($i == $page) {
			$paging .= '<li class="page current">' . $i . '</li>';
		} else {
			$paging .= '<li class="page"><a href="index.php?page=' . $i . '">' . $i . '</a></li>';
		}
	}
	
	
	if($currentSection != $allSection) { 
		$paging .= '<li class="page page_next"><a href="index.php?page=' . $nextPage . '">다음</a></li>';
	}
	
	
	if($page != $allPage) { 
		$paging .= '<li class="page page_end"><a href="index.php?page=' . $allPage . '">끝</a></li>';
	}
	$paging .= '</ul>';
	

	
	
	$currentLimit = ($onePage * $page) - $onePage;
	$sqlLimit = ' limit ' . $currentLimit . ', ' . $onePage;
	
	if(isset($_GET['kind'])){
		$kind = $_GET['kind'];
		$sql = 'select * from board_post where kind='.$kind.'order by no desc' . $sqlLimit; 
	
	}else{
		$sql = 'select * from board_post order by no desc' . $sqlLimit; 	
	}
	if(isset($_GET['local'])){
		$local = $_GET['local'];
		$sql = 'select * from board_post where local='.$local.' order by no desc' . $sqlLimit;  
	}
	$result = $db->query($sql);



?>

	

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>*분양 아이들 목록*</title>


 	<link rel="stylesheet" type="text/css" href="zoo_write.css">

 <link rel="stylesheet" type="text/css" href="../notice/index_tw.css"
 	media="(min-width:661px)">

 	<link rel="stylesheet" type="text/css" href="../notice/index_m.css" media="(max-width:660px)">

 </head>
 <body onload="loaded()">
 	
 	<div class="inner_page boardArticle">
 		<h2 id="one_board">분양 아이들 </h2>

 		<p id="write"><a href="zoo_write.php">분양등록하기</a></p>
 		<!-- <hr style="clear: both"> -->

 		<div id="boardCatalog">
 			<a href="./index.php">전국분양</a>
 			<a href="./index.php?local='서울시'">서울시</a>
 			<a href="./index.php?local='부산시'">부산시</a>
 			<a href="./index.php?local='대전시'">대전시</a>
 			<a href="./index.php?local='광주시'">광주시</a>
 			<a href="./index.php?local='울산시'">울산시</a>
 			<a href="./index.php?local='인천시'">인천시</a>
 			<a href="./index.php?local='대구시'">대구시</a>
 			<a href="./index.php?local='세종시'">세종시</a>
 			<a href="./index.php?local='경기도'">경기도</a>
 			<a href="./index.php?local='충청북도'">충청북도</a>
 			<a href="./index.php?local='충청남도'">충청남도</a>
 			<a href="./index.php?local='전라남도'">전라남도</a>
 			<a href="./index.php?local='전라북도'">전라북도</a>
 			<a href="./index.php?local='경상남도'">경상남도</a>
 			<a href="./index.php?local='경상북도'">경상북도</a>
 			<a href="./index.php?local='제주도'">제주도</a>
 		</div>

 		<div class="list_table" id="boardList">

 			


 				<?php 
 					header('Content-Type:text/html; charset=utf-8');
 					
 					while($row = $result->fetch_assoc()){
 				?>
 			
				<span class="s4">
	 				<div class="full stxt"><?php echo $row['no']?></div>
	 				<div class="pic_wrapper">
	 					<div class="pic">
	 						<img id="boardPic" width="50%" src="<?php echo $row['pic'] ?>">
	 					</div>
	 				</div>
	 				
	 				<div class="full"><a class="th" href="view.php?no=<?php echo $row['no']?>"><?php echo $row['title']?></a></div>
	 				<div class="half">
	 					<span class="half">
	 						<?php echo $row['kind']?>
	 					</span>
	 					<span class="half">
	 						<?php echo $row['kinds']?>
	 					</span>
	 				</div>

	 				<div class="half">
	 					<span class="half">
	 						<?php echo $row['local']?>
	 					</span>
	 					<span class="half">
	 						<?php echo $row['date']?>
	 					</span>
	 				</div>
	 			</span>
 				
 				<?php 
 				}
 				 ?>	


 		<div class="paging">
 			<?php echo $paging ?>
 		</div>

	</div>

 	</div>
 </body>
 </html>