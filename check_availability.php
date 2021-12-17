<?php
ob_start();
session_start();
$check=0;
if(isset($_POST['car'])){$car=$_POST['car'];
	$xml=simplexml_load_file("cars.xml") or die("Error: Cannot create object");
		$sizearray= count($xml);
		for($i=0;$i<$sizearray;$i++){
			if($xml->car[$i]->carimage==$car){
				if($xml->car[$i]->availability=="N"){echo"0";}
				else{
						if(isset($_SESSION["car"])){
							$sessionsize =count($_SESSION["car"]);
							for ($a=0;$a<$sessionsize;$a++){
									if($_SESSION["car"][$a][0]==$car){$check=1;}
							}
							if($check==1){echo "2";}
									else{savetosession($car, 1 ,$sessionsize); $a=$sessionsize;}
						}
						else{$sessionsize=0; savetosession($car, 1 ,$sessionsize);}	
				}
				}
			else{}
		}
	}
function savetosession($carname,$cardays, $sessionsize){
		$_SESSION["car"][$sessionsize][0] = "$carname";
		$_SESSION["car"][$sessionsize][1] = "1";//nos days
		echo "1";
	}
?>
