<?php session_start();
if(isset($_SESSION['car'])){}
else{header("Location:index.php");}
if (isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['address'])&& isset($_POST['msg']) && $_POST['name']!="" && $_POST['email']!="" && $_POST['address']!="" &&  $_POST['msg']!=""){
	$textpat="/^[a-zA-Z][a-zA-Z\\s]+$/";
	$name=$_POST['name'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$msg=$_POST['msg'];
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)){echo "2";}
		else{
	
	$tempMail="noreply@hertzrental.service";
	$to =$email; 
	$email_subject = "Purchase Confirmation";
	$email_body = 'from'. $email. 'Message <br>'.$msg; 
	$headers = "From: $tempMail\n"; 
	$headers .= "Reply-To: $tempMail";
	$check=false;
	$check = mail($to,$email_subject,$email_body,$headers);
   if($check){
	   session_destroy();
   echo "1";
   }
	}
	}
else{echo 0;}
	function destroyallsessions(){
		session_destroy();
		header("LOCATION:index.php");
		}

?>
