<?php  session_start();
if(isset($_SESSION['car'])){
	echo"1";
	}
else{
	echo"0";
	}
?>