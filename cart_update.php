<?php 
session_start();
if (isset($_SESSION['car'])){
echo "Cart (".count($_SESSION['car'])." items)";}
else{
	echo "Cart";
	}
 ?>