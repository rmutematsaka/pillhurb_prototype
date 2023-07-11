<?php
	if(isset($_POST['btnPurchase'])){
		unset($_POST['btnPurchase']);
		unset($_POST['purchase_mode']);
		$_POST['forex_purchase_timestamp'] = $timestamp;
		$_POST['forex_purchase_transaction_agent'] = $session_user;
		$_POST['forex_purchase_code'] = "FXP_".create_code('forex_purchase');
		if(!empty($_POST['forex_purchase_amount_paid'])){
			$data = $_POST;
			if($id = create('forex_purchase',$data)){
				echo "<div class='alert alert-info text-center'>Purchase added successfully</div>";
				header('location: ../../receipts/rcpt_fx_purchase.php?rcpt='.$id);
			}else{
				echo "<div class='alert alert-warning text-center'>Purchase could not be added</div>";
			}
		}else{
			echo "<div class='alert alert-warning text-center'>Calculate exchange value before proceeding</div>";
		}
	}

	if(isset($_POST['btnEstimatePurchase'])){
		unset($_POST['btnEstimatePurchase']);
		$settlement = $_POST['settlement_mode'];
		$payment = $_POST['payment_mode'];
		$amount = $_POST['forex_purchase_amount_sold'];
		if(!empty($settlement) && !empty($payment)){
			$calculation = ($amount*$settlement)*$payment;
		}
	}