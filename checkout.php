<?php session_start();
if(isset($_SESSION['car'])){}
else{header("Location:../index.php");}
?>
        	<div class="checkout">
            <h2>Checkout</h2>
			<div  class="block">
                <div class="inline">Fullname</div>
                <div class="inline"><input id="name" required type="text"></div>
            </div>
            <div  class="block">
                <div class="inline">Email</div>
                <div class="inline"><input id="email" required type="email"></div>
            </div>
            <div  class="block">
                <div class="inline">Complete address</div>
                <div class="inline"><input id="address" required type="text"></div>
            </div>
        	<div  class="block">
                <div class="inline">Amount you have to pay $</div>
                <div class="inline amt"></div>
            </div>
            <div class="block">
            	<button id="checkout" onClick="checkout()">Checkout</button>
            </div>
            </div>