<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ZOONIOR</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="index.css">

	<link rel="stylesheet" type="text/css" href="index_w.css" media="(min-width:1296px)">

	<link rel="stylesheet" type="text/css" href="index_t.css" media="(max-width:1295px)">

	<link rel="stylesheet" type="text/css" href="index_m.css" media="(max-width:600px)">

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

  <script src="index.js"></script>

</head>
<body onresize="iframeLoaded()">

	<div id="page">

		<?php 
			include "header.php";
			include "nav.php";
		 ?>
		
		<article>
		<!-- 	<div id="article_contents"> -->
				<iframe id="iframe"name="iframe" scrolling="no" onload="autoResize(this)" src="jw/f_picture.html" target="iframe">
				
			</iframe>
			<!-- </div> -->
			

		</article>

		<?
			include "footer.php";
		?>

		
	</div>


</body>
</html>