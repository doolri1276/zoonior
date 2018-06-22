<?php 
	require_once("zoonior.php");

	if(isset($_GET['no'])){
		$no = $_GET['no'];
		
		'delete_update.php?no=<?php echo $no?>';
	}

	if(isset($no)){
		$sql = 'select title, id, tel, exp  from board_post where no = ' . $no;
		$result = $db->query($sql);
		$row = $result->fetch_assoc();
	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>분양글 등록하기</title>

	<link rel="stylesheet" type="text/css" href="../notice/index_tw.css"
 	media="(min-width:661px)">

 	<link rel="stylesheet" type="text/css" href="../notice/index_m.css" media="(max-width:660px)">

	<script type="text/javascript">
		
				var kinds = new Array();
				kinds[0] = new Array('골든리트리버','그레이트덴','그레이트피레니즈','그레이하운드','꼬똥드툴레아','뉴펀들랜드','닥스훈트','달마시안','도고아르젠티노','도베르만','라브라도 리트리버','라사압소','라이카','로트와일러','마리노이즈','마스티프','말티즈','미니핀','바센지','바셋하운드','바이마리너','버니즈마운틴독','베들링턴 테리어','보더콜리','보스톤테리어','복서','볼조시','불개','불독','불테리어','브러쉘그리폰','브리타니','비글','비숑프리제','비어디드콜리','비즐라','빠삐용','사모예드','삽살이','샤페이','세이트버나드','세퍼트','셰틀랜드쉽독','슈나우저','스탠다들 푸들','시바견','시베리안허스키','시츄','아메리카코커스파니엘','아이리쉬세타','아키타','아프간하운드','알래스카 말라뮤트','에어데일 테리어','오브차카','올드 잉글리쉬 쉽독','와이어 폭스테리어','요크셔테리어','웰쉬코기 카디건','잉글리쉬코카스파니엘','잭 러셀 테리어','저패니즈스피츠','진돗개','차우차우','치와와','친(chin)','케인코르소','콜리','킹찰스스파니엘','토이푸들','퍼그','페키니즈','펨브록 웰시 코기','포메라니안','포인터','푸들','풍산개','프랜치불독','핏불테리어','화이트테리어','기타');
				kinds[1] = new Array('노르웨이 숲','뱅갈','버만','버미즈','버밀라','브리티쉬 숏헤어','사바나캣','샴','스코티쉬 폴드','스핑크스','아메리칸 밥테일','아메리칸 숏헤어','아비시니안','엑죠틱 숏헤어','이집트 마우','재패니스 밥테일','친칠라','터키쉬 밴','터키쉬 앙고라','페르시안','하바나','한국고양이','히말라야','기타');
				kinds[2] = new Array('스키니','실키','아메리칸','아비시니안','코로넷','크레스티드','테디','텍셀','페루비안','기타');
				kinds[3] = new Array('로보로스키','블루사파이어','스노우화이트','정글리안','푸딩','크림사파이어','펄','펄짱','헤태르그레이','화이트 로보로스키','기타');
				kinds[4] = new Array('스노우샴페인','스탠다드','시나몬','실버차콜','아프리콧 화이트초코','알비노','얼룩말핀토','초콜릿','크릭','플라타나','핀토','화이트샴페인','화이트초코','기타');
				kinds[5] = new Array('뉴질랜드화이트','더치','드워프','라이언헤드','렉스','롭이어','앙고라','친칠라','할리퀸','히말리얀','기타');
				kinds[6] = new Array('다크실버미트','라이트세이블','라이트실버미트','마크드화이트','마크드화이트블랙아이','버터스카치','브라치나','브레이즈','브레이즈블랙미트','블랙미트','샴페인포인트','세이블','솔리드블랙세이블','스털링실버미트','시나몬','실버미트','알비노','앙고라페릿','초코렛포인트','랜다','팬다브레이츠','포인트세이블','화이트블랙아이','기타');
				kinds[7] = new Array('기타');

				function ItemChange(key){
				
					var a = document.getElementById('kinds');
					

					a.innerHTML = null;
					

					if(key =="강아지"){
						kind =0;	
					}else if(key == "고양이"){
						kind =1;
					}else if(key == "기니피그"){
						kind =2;
					}else if(key == "햄스터"){
						kind =3;
					}else if(key == "고슴도치"){
						kind =4;
					}else if(key == "토끼"){
						kind =5;
					}else if(key == "페럿"){
						kind =6;
					}else if(key == "기타동물"){
						kind =7;
					}



					for(var i=0;i<kinds[kind].length;i++){
						a.innerHTML += "<option value="+kinds[kind][i]+">"+kinds[kind][i]+"</]option>";
					}//for
			}//function
	</script>
	
	<link rel="stylesheet" type="text/css" href="zoo_write.css">

</head>
<body>
	<div id="inner_page">
	<form action="zoo_write_update.php" method="post" enctype="multipart/form-data">
		<?php 
			if(isset($no)){
				echo '<input type="hidden" name="no" value="'. $no . '">';
			}
		 ?>


		
			<h2>*분양글 등록하기*</h2>
			<div class="thr"></div>

			<div id="title" class="tr">
				<span class="text">
					<label>한마디 제목</label>
				</span>
				<span class="input">
					<?php 
					if(isset($no)){
						echo '<input type="text" name="title" value="'. $row['title'] . '">';
					}else{
					?>
					<input type="text" name="title">	
					<?php  } ?>
				</span>
			</div>


			<div id="id" class="tr">
				<span class="text">
					<label for="id">등록인</label>
				</span>
				<span class="input">
					<?php 
						if(isset($no)){
							echo '<input type="text" name="id" value="'. $row['id'] .'">';
						}else{
						?>
						<input type="text" name="id">	
					<?php  } ?>	
				</span>		
			</div>

			<div id="password" class="tr">
				<span class="text">
					<label for="id">비밀번호</label>
				</span>
				<span class="input">
					<input type="password" name="paw">	
				</span>		
			</div>

			<div class="tr">
				<span class="text">
					<label for="tel">전화번호</label>
				</span>
				<span class="input">
					<?php 
						if(isset($no)){
							echo '<input type="tel" name="tel" value="'. $row['tel'] .'">';
						}else{
						?>
						<input type="tel" name="tel">	
					<?php  } ?>
				</span>		
			</div>


			<div class="tr">
				<span class="text">
					<label for="local">지역 </label>
				</span>
				<span class="input">
					<select  name="local" id="local">
						<option value="전체지역">전체지역</option>
						<option value="전국분양">전국분양</option>
						<option value="서울시">서울시</option>
						<option value="부산시">부산시</option>
						<option value="대전시">대전시</option>
						<option value="광주시">광주시</option>
						<option value="울산시">울산시</option>
						<option value="인천시">인천시</option>
						<option value="대구시">대구시</option>
						<option value="세종시">세종시</option>
						<option value="경기도">경기도</option>
						<option value="강원도">강원도</option>
						<option value="충청남도">충청남도</option>
						<option value="충청북도">충청북도</option>
						<option value="전라남도">전라남도</option>
						<option value="전라북도">전라북도</option>
						<option value="경상남도">경상남도</option>
						<option value="경상북도">경상북도</option>
						<option value="제주도">제주도</option>
					</select>	
				</span>
			</div>


			<div class="tr">
				<span class="text">
					<label for="kind">동물종류</label>
				</span>
				<span class="input">
					<select name="kind" id="kind" onchange="ItemChange(this.value)">
							<option value="선택">-선택-</option>
							<option value="강아지">강아지</option>
							<option value="고양이">고양이</option>
							<option value="기니피그">기니피그</option>
							<option value="햄스터">햄스터</option>
							<option value="고슴도치">고슴도치</option>
							<option value="토끼">토끼</option>
							<option value="페릿">페릿</option>
							<option value="기타동물">기타동물</option>
						</select>
				</span>
			</div>


			<div class="tr">
				<span class="text">
					<label>품종</label>
				</span>
				<span class="input">
					<select name="kinds" id="kinds">
						<option value="선택">-동물종류선택-</option>
					</select>
				</span>
			</div>

			
			<div class="tr">
				<span class="text">
					<label>성별</label>
				</span>
				<span class="input">
					<label class="cb"><input type="radio" name="rgsex" value="남아" checked="checked">남아</label>
				 	<label class="cb"><input type="radio" name="rgsex" value="여아">여아</label>
				</span>
			</div>
			<div class="tr">
				<span class="text">
					<label for="life">개월수</label>
				</span>
				<span class="input">
					<select name="life" id="life">
						<script type="text/javascript">
							for(var i =1;i<36;i++){
								document.write("<option value"+i+"개월>"+i+"개월</option>");
							}
							for(var i = 3;i<100;i++){
								document.write("<option value"+i+"살>"+i+"살</option>");
							}
						</script>
					</select>
				</span>
			</div>	

			<div class="tr">
				<span class="text">
					<label>책임비</label>
				</span>
				<span class="input">
					<label class="cb"><input type="radio" name="rgrespond" value="무료분양" checked="checked">무료분양</label>
					<label class="cb"><input type="radio" name="rgrespond" value="1만원">1만원</label>
					<label class="cb"><input type="radio" name="rgrespond" value="3만원">3만원</label>
					<label class="cb"><input type="radio" name="rgrespond" value="5만원">5만원</label>
				</span>
			</div>
			
			<div class="tr">
				<span class="text">
					<label>유기동물 유/무</label>
				</span>
				<span class="input">
					<label class="cb"><input type="radio" name="rgyou" value="yu">O</label>
						<label class="cb"><input type="radio" name="rgyou" value="mu" checked="checked">X</label>
				</span>
			</div>

			<div class="tr">
				<span class="text">
					<label>사진</label>
				</span>
				<span class="input">
					<input type="file" name="pic" accept="image/png">
				</span>
			</div>

			<div class="tr">
				<span class="text">
					<label>상세설명</label>
				</span>
				<div>
					<?php 
						if(isset($no)){
							echo '<textarea id="exp" name="exp">'. $row['exp'] .'</textarea>';
						}else{
						?>
						<textarea id="exp" name="exp"></textarea>
					<?php  } ?>
				</div>
			</div>

			
		<div id="buttonsub">

				<span id="btnsub">
					<button type="submit"><?php echo isset($no)?'수정':'작성'?></button>
					<button><a href="./index.php">목록</a></button>
				</span>
				

		
		</div>
		
	</form>
</div>	



</body>
</html>
