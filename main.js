$(document).ready(function(e) {
	$('.content-wrapper').load("php/content.php")
	$('.cart-button').load("php/cart_update.php")
	var sum = 0;
	$('.total-cost').each(function() {
		$('.totalamount').html(sum += parseFloat($(this).text()));
	});
});
$('.content-wrapper-cart .cart-items-container tr td input').change(function() {
	var x = $(this).parent().parent().index()
	var days = $(this).val()
	var cost = $('.content-wrapper-cart .cart-items-container tr:eq(' + x + ') .cost').html()
	var total = days * cost;
	$('.content-wrapper-cart .cart-items-container tr:eq(' + x + ') .total-cost').html(total)
	/*----------------------------------------*/
	var sum = 0;
	$('.total-cost').each(function() {
		$('.totalamount').html(sum += parseFloat($(this).text()));
	});
})

function addtocart(value) {
	$.ajax({
		url: "php/check_availability.php?",
		type: 'POST',
		data: { car: value },
		success: function(result) {
			if (result == 0) {
				alert("Sorry, the car is not available now. Please try other cars");
			}
			else if (result == 1) {
				alert("Add to the cart successfully");
				$('.cart-button').load("php/cart_update.php")
			}
			else if (result == 2) {
				alert("Already in cart");
			}
			else {
				alert("there is something wrong" + result)
			}
		}
	});
}
$('.cart-button').click(function() {
	$.ajax({
		url: "php/check_cart.php?",
		type: 'POST',
		success: function(result) {
			if (result == 1) { window.location.replace("cart.php"); }
			else { alert("Cart is empty"); }
		}
	})
})

function deletefromcart(carname) {
	$.ajax({
		url: "php/delete_cart.php?",
		type: 'POST',
		data: { car: carname },
		success: function(result) {
			location.reload()
		}
	})
}
var tablelen = $('.cart-items-container tr').length
var end = tablelen - 2;
var store_vehicle = []
var store_price = []
var store_totalcost = []
var store_days = []
var grandtotal = 0;
$('#bookbutton').click(function() {
	var grandtotal = $('.totalamount').html()
	for (i = 0; i < end; i++) {
		store_vehicle[i] = $('.cart-items-container tr:eq(' + (i + 1) + ') .vehicle').html()
		store_price[i] = $('.cart-items-container tr:eq(' + (i + 1) + ') .cost').html()
		store_days[i] = $('.cart-items-container tr:eq(' + (i + 1) + ') input').val()
		store_totalcost[i] = $('.cart-items-container tr:eq(' + (i + 1) + ') .total-cost').html()
	}
	$('.content-wrapper-cart').load('php/checkout.php');
	setTimeout(function() { $('.amt').html(grandtotal) }, 500)
})

function checkout() {
	var name = $('#name').val()
	var email = $('#email').val()
	var address = $('#address').val()
	$.ajax({
		type: "POST",
		data: { vehicle: store_vehicle, price: store_price, totalcost: store_totalcost, days: store_days, grandtotal: grandtotal },
		url: "php/compile_message.php",
		success: function(msg) {
			$.ajax({
				type: "POST",
				data: { msg: msg, name: name, email: email, address: address },
				url: "php/send_mail.php",
				success: function(result) {
					if (result == 0) { alert("Please check entered details"); }
					else if (result == 1) {
						alert("Thank you for your purchase")
						location.reload();
					}
					else if (result == 2) { alert("Please check email format"); }
					else { alert("Unknown Error"); }
				}
			});
		}
	});
}
