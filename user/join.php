<?php 

	session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>JOIN</title>
	<link rel="stylesheet" type="text/css" href="../notice/index_tw.css"
 	media="(min-width:661px)">

 	<link rel="stylesheet" type="text/css" href="../notice/index_m.css" media="(max-width:660px)">

 	<script type="text/javascript">
 		function check_id(){
 			window.open('check_id.php?id='+document.member_form.id.value,"IDcheck","left=200, top=200, width=200, height=60, scrollbars=no, resizable=yes");
 		}

 	</script>
</head>
<body>
	<div id="inner_page">
		<h2>JOIN</h2>

		<form name="join" method="post" action="insertUser.php">

			<div class="thr">
				회원가입
			</div>

			<div class="tr">
				<span class="text">
					<label for="id">*아이디</label>
				</span>
				<span class="input">
					<input type="text" name="id">
					<span class="btn" id="check_id" onclick="check_id()"><a href="">아이디 중복 확인</a></span><br>
					<span class="stxt">4~12자의 영문, 숫자와 특수기호(_)만 사용할 수 있습니다.</span>
				</span>
			</div>

			<div class="tr">
				<span class="text">
					<label for="psw1">*비밀번호</label>
				</span>
				<span class="input">
					<input type="password" name="psw1">
				</span>
			</div>

			<div class="tr">
				<span class="text">
					<label for="psw2">*비밀번호 확인</label>
				</span>
				<span class="input">
					<input type="password" name="psw2">
				</span>
			</div>

			<div class="tr">
				<span class="text">
					<label for="name">*이름</label>
				</span>
				<span class="input">
					<input type="text" name="name">
				</span>
			</div>

			<div class="tr">
				<span class="text">
					<label for="nick">*닉네임</label>
				</span>
				<span class="input">
					<input type="text" name="nick">
					<span class="btn" id="check_nick"><a href="">닉네임 중복 확인</a></span><br>
				</span>
			</div>

			<div class="tr">
				<span class="text">
					<label for="tel">*연락처</label>
				</span>
				<span class="input">
					<select class="tel" name="tel1">
						<option value="010">010</option>
						<option value="011">011</option>
						<option value="016">016</option>
						<option value="017">017</option>
						<option value="018">018</option>
						<option value="019">019</option>
						<option value="02">02</option>
						<option value="031">031</option>
					</select> - 
					<input type="text" class="tel" name="tel2"> - 
					<input type="text" class="tel" name="tel3">
				</span>
			</div>

			<div class="tr">
				<span class="text">
					<label for="name"> 이메일</label>
				</span>
				<span class="input">
					<input class="email" type="text" name="email1">@<input class="email" type="text" name="email2">
				</span>
			</div>

			<div class="tr">
				<span class="text"></span>
				<span class="input stxt">* 는 필수 입력 항목입니다.</span>
			</div>

			<div class="thr">
				<span class="full center">
					<span id="btn"><a href="">제출하기</a></span>
					<span id="btn"><a href="">취소하기</a></span>
				</span>
			</div>

		</form>

		
		
	</div>

</body>
</html>