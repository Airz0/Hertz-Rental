<?php
session_start();
if (isset($_POST['car'])){
	$carname=$_POST['car'];
	$countrows=count($_SESSION['car']);
	for($i=0;$i<$countrows;){
		if ($carname==$_SESSION['car'][$i][0]){
			$found=$i;
			}
		$i++;}
		for($j=$found;$j<$countrows;){
				if($countrows>1){
					$_SESSION['car'][$j]=$_SESSION['car'][$j+1]; 
					unset($_SESSION['car'][$countrows-1]);
					echo $j;}
				else{session_destroy();}
			$j++;}
	}
?>