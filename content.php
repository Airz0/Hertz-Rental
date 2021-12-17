<?php
        $xml=simplexml_load_file("../db/cars.xml") or die("Error: Cannot create object");
		$sizearray= count($xml);
		for($i=0;$i<$sizearray;){?>
            <section class="car-card" <?php if($xml->car[$i]->availability=='N'){echo "style='opacity:.5;'";}?>>
                <div class="car-image-wrapper">
                    <img src="images/<?php echo $xml->car[$i]->carimage;?>.jpg">
                </div>
                <div class="car-detail-wrapper">
                    <div class="text-wrapper"><h2><strong><?php echo $xml->car[$i]->brand . '-' . $xml->car[$i]->model . '-'. $xml->car[$i]->modelyear;?></strong></h2></div>
                    <div class="text-wrapper">
                    	<div class="title">Category: </div>
                        <div class="title-text"><?php echo $xml->car[$i]->category;?></div>
                    </div>
                    <div class="text-wrapper">
                    	<div class="title">Mileage: </div>
                        <div class="title-text"><?php echo $xml->car[$i]->mileage;?></div>
                    </div>
                    <div class="text-wrapper">
                    	<div class="title">Fuel type: </div>
                        <div class="title-text"><?php echo $xml->car[$i]->fuel;?></div>
                    </div>
                    <div class="text-wrapper">
                    	<div class="title">Seats: </div>
                        <div class="title-text"><?php echo $xml->car[$i]->seats; ?></div>
                    </div>
                    <div class="text-wrapper">
                    	<div class="title">Rent: </div>
                        <div class="title-text">$ <?php echo $xml->car[$i]->rent;?> / day</div>
                    </div>
                    <div class="text-wrapper">
                    	<p><strong><?php echo $xml->car[$i]->description;?></strong></p>
                    </div>
                    <div class="text-wrapper">
                    	<div class="add-to-cart-button" onClick="addtocart('<?php echo $xml->car[$i]->carimage;?>')">+Add to cart</div>
                    </div>
                </div>
            </section>
                    <?php	$i++;}	?>