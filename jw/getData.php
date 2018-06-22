<?php  

	header('Content-Type: text/html; charset=utf-8');


	$imgDst = $_GET['imgDst']; 
	
	
	 

	echo "$imgDst<br>";
	echo "<img src=$imgDst>";

?>