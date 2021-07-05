<?php
if(@$_GET){
	switch($_GET['p']){
		case "register";
			include "user/register.php";
		break;
		case "profil";
			include "user/profil.php";
		break;
		case "login";
			include "user/login.php";
		break;
		case "logout";
			include "user/logout.php";
		break;
		case "delete";
			include "user/deleteaccount.php";
		break;
		case "success";
			include "user/success.php";
		break;
		case "single";
			include "page/single.php";
		break;
		case "tentangkami";
			include "page/tentangkami.php";
		break;
		case "home";
			include "page/home.php";
		break;
		case "paket";
			include "page/paket.php";
		break;
		case "portofolio";
			include "page/portofolio.php";
		break;
		case "carapemesanan";
			include "page/carapemesanan.php";
		break;
		case "productbrand";
			include "page/productbrand.php";
		break;
		case "pesanan";
			include "cart/pesanan.php";
		break;
		case "formpemesanan";
			include "cart/form_pemesanan.php";
		break;
		case "invoice";
			include "cart/invoice.php";
		break;
		case "konfirmasipembayaran";
			include "cart/konfirmasipembayaran.php";
		break;
		case "order_detail";
			include "cart/order_detail.php";
		break;
		case "feedback";
			include "cart/feedback.php";
		break;
		case "listfeedback";
			include "cart/listfeedback.php";
		break;
		case "checkout";
			include "cart/checkout.php";
		break;
		default:
			echo '<div class="container">
							<div class="row">
								<div class="col-md-12">
									<h2 class="text-center text1">Page was not found</h2>
								</div>
							</div>
					</div>';
		break;
	}
}else{
	include "page/home.php";
}
?>