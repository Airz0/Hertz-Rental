<?php 
if(isset($_POST['vehicle']) && isset($_POST['price']) && isset($_POST['totalcost']) && isset($_POST['days']) && isset($_POST['grandtotal']) ){
		$vehicle=$_POST['vehicle'];
		$price=$_POST['price'];
		$totalcost=$_POST['totalcost'];
		$days=$_POST['days'];
		$grandtotal=$_POST['grandtotal'];
		
		$countrows=count($vehicle);
					echo "Thanks for your purchase <br></hr>";		
			for($i=0;$i<$countrows;$i++){
			echo 'Car-  '.$vehicle[$i].' <br>  Cost per day- ' .$price[$i].' <br>  No.of days- '.$days[$i].' <br>   Total cost of car '.$totalcost[$i].' <br><hr><br>' ;
			}
			echo "<h2>Total Amount Payable $".$grandtotal."</h2>";
		}
    ?>