<?php
	if(isset($_POST['save_general'])){
		$id = $_POST['config_id'];
		unset($_POST['save_general']);
		unset($_POST['config_id']);
		unset($_POST['currency_id']);
		unset($_POST['tx_min_limit']);
		unset($_POST['tx_max_limit']);
		unset($_POST['monthly_limit']);
		unset($_POST['currency_buying_rate']);
		unset($_POST['currency_selling_rate']);
		if(isset($_POST['sms_delivery'])){
			$_POST['sms_delivery'] = "on";
		}else{
			$_POST['sms_delivery'] = "off";
		}
		$data = $_POST;
		if(update('config',$id,$data)){
			echo "<div class='alert alert-info text-center'>Settings saved successfully</div>";
		}else{
			echo "<div class='alert alert-warning text-center'>No changes detected, settings not saved</div>";
		}
	}

	if(isset($_POST['save_limits'])){
		$id = $_POST['config_id'];
		unset($_POST['save_limits']);
		unset($_POST['config_id']);
		unset($_POST['currency_id']);
		unset($_POST['open_time']);
		unset($_POST['close_time']);
		unset($_POST['show_overdue_after']);
		unset($_POST['currency_buying_rate']);
		unset($_POST['sms_delivery']);
		unset($_POST['currency_selling_rate']);
		$data = $_POST;
		if(update('config',$id,$data)){
			echo "<div class='alert alert-info text-center'>Settings saved successfully</div>";
		}else{
			echo "<div class='alert alert-warning text-center'>No changes detected, settings not saved</div>";
		}
	}
	
	if(isset($_POST['save_currencies'])){
		$id = $_POST['currency_id'];
		unset($_POST['save_currencies']);
		unset($_POST['config_id']);
		unset($_POST['sms_delivery']);
		unset($_POST['open_time']);
		unset($_POST['close_time']);
		unset($_POST['show_overdue_after']);
		unset($_POST['tx_min_limit']);
		unset($_POST['tx_max_limit']);
		unset($_POST['monthly_limit']);
		unset($_POST['currency_id']);
		$data = $_POST;
		if(update('currency',$id,$data)){
			echo "<div class='alert alert-info text-center'>Settings saved successfully</div>";
		}else{
			echo mysqli_error($conn);//"<div class='alert alert-warning text-center'>No changes detected, settings not saved</div>";
		}
	}

	if(isset($_POST['edit_country_status'])){
		unset($_POST['edit_country_status']);
		$id = $_POST['country_id'];
		unset($_POST['country_id']);
		$data = $_POST;
		//dd($data);
		if(update('country',$id,$data)){
			echo "<div class='alert alert-info text-center'>Country status saved successfully</div>";
		}else{
			echo "<div class='alert alert-warning text-center'>Country status could not be updated</div>";
		}
	}