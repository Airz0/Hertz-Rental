<?php session_start();
if(isset($_SESSION['car'])){}
else{header("Location:index.php");}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Car Rental System</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="all-wrapper">
        <header>
            <div class="site-identity"><h1>Car Rental System</h1></div>
            <div class="menu-wrapper"><a href="index.php" class="goback-button">Return</a></div>
        </header>
        <div class="content-wrapper-cart">
        	<h2>Reservation Cart</h2>
            <table class="cart-items-container">
            	<tr>
                	<td>Thumbnail</td>
                	<td>Vehicle</td>
                    <td>Price per Day</td>
                    <td>Rental Days</td>
                    <td>Total Amount</td>
                    <td>Action</td>
                </tr>
                <?php
				$countrows= count($_SESSION["car"]);
				$xml=simplexml_load_file("db/cars.xml") or die("Error: Cannot create object");
				$sizearray= count($xml);
				for($i=0;$i<$countrows;$i++){
					for($j=0;$j<$sizearray;$j++){
							if($_SESSION['car'][$i][0]==$xml->car[$j]->carimage){$indexdata=$j;}}
						?>
                <tr>
                	<td><img src="images/<?php echo $xml->car[$indexdata]->carimage; ?>.jpg"></td>
                    <td class="vehicle"><?php echo $xml->car[$indexdata]->brand." ".$xml->car[$indexdata]->model." ".$xml->car[$indexdata]->modelyear;?></td>
                    <td class="cost"><?php echo $xml->car[$indexdata]->rent;?></td>
                    <td><input min="1" max="10" class="days" type="number" value="1"></td>
                    <td class="total-cost"><?php echo $xml->car[$indexdata]->rent;?></td>
                    <td><button onClick="deletefromcart('<?php echo $xml->car[$indexdata]->carimage; ?>')">DELETE</button></td>
                 </tr>
                 <?php }?>
                 <tr>
                 	<td></td>
                    <td></td>
                    <td></td>
                    <td>Total Amount-</td>
                    <td class="totalamount"></td>
                    <td><button id="bookbutton">Book Cars</td>
                 </tr>
            </table>
        </div>
</div>
<script src="js/main.js"></script>
</body>
</html>