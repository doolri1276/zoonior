<?php
	require_once("zoonior.php");

	
	if(isset($_GET['no'])) {
		$no = $_GET['no'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Zoonior</title>
	
</head>
<body>
	<article class="boardArticle">
		<h3>글삭제</h3>
		<?php
			if(isset($no)) {
				$sql = 'select count(no) as cnt from board_post where no = ' . $no;
				$result = $db->query($sql);
				$row = $result->fetch_assoc();
				if(empty($row['cnt'])) {
		?>
		<script>
			alert('글이 존재하지 않습니다.');
			history.back();
		</script>
		<?php
			exit;
				}
				
				$sql = 'select title from board_post where no = ' . $no;
				$result = $db->query($sql);
				$row = $result->fetch_assoc();
		?>
		<div id="boardDelete">
			<form action="./delete_update.php" method="post">
				<input type="hidden" name="no" value="<?php echo $no?>">
				<table>
					
	
					<tbody>
						<tr>
							<th scope="row">글 제목</th>
							<td><?php echo $row['title']?></td>
						</tr>
						<tr>
							<th scope="row"><label for="password">비밀번호</label></th>
							<td><input type="password" name="paw" id="paw"></td>
						</tr>
					</tbody>
				</table>

				<div class="btnSet">
					<button type="submit" class="btnSubmit btn">삭제</button>
					<a href="./index.php" class="btnList btn">목록</a>
				</div>
			</form>
		</div>
	<?php
		//$bno이 없다면 삭제 실패
		} else {
	?>
		<script>
			alert('정상적인 경로를 이용해주세요.');
			history.back();
		</script>
	<?php
			exit;
		}
	?>
	</article>
</body>
</html>