<?php
ob_start();
	if(isset($_POST['btnSell'])){
		unset($_POST['btnSell']);
		unset($_POST['sale_mode']);
		$_POST['forex_sale_timestamp'] = $timestamp;
		$_POST['forex_sale_transaction_agent'] = $session_user;
		$_POST['forex_sale_code'] = "FXP_".create_code('forex_sale');
		if(!empty($_POST['forex_sale_amount_paid'])){
			$data = $_POST;
			//dd($data);
			if($id = create('forex_sale',$data)){
				echo "<div class='alert alert-info text-center'>Sale added successfully</div>";
				header('location: ../../receipts/rcpt_fx_sale.php?rcpt='.$id);
			}else{
				echo "<div class='alert alert-warning text-center'>Sale could not be added</div>";
			}
		}else{
			echo "<div class='alert alert-warning text-center'>Calculate exchange value before proceeding</div>";
		}
	}

	if(isset($_POST['btnEstimateSell'])){
		unset($_POST['btnEstimateSell']);
		$settlement = $_POST['settlement_mode'];
		$payment = $_POST['payment_mode'];
		$amount = $_POST['forex_sale_amount_sold'];
		if(!empty($settlement) && !empty($payment)){
			$calculation = ($payment/$settlement)*$amount;
		}
	}
?>