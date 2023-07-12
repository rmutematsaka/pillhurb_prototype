<?php	
	if(isset($_POST['add_collateral'])){
		unset($_POST['add_collateral']);
		$_POST['collateral_created'] = $timestamp;
		$_POST['status'] = $active;
		$_POST['collateral_code'] = "CLT_".create_code('collateral');
		$data = $_POST;
		if(create('collateral',$data)){
			echo "<div class='alert alert-info text-center'>Collateral added successfully</div>";
		}else{
			echo "<div class='alert alert-warning text-center'>Collateral could not be added</div>";
		}
	}
	
	if(isset($_POST['assign_collateral'])){
		$collateral_identifier = $_POST['chassis_serial'];
		$data = ["chassis_serial"=>$collateral_identifier];
		$collateral = select_all('collateral',$data);
		if(count($collateral,COUNT_RECURSIVE)){
			include(APP_PATH.'/app_loans/lists/collateral_details.php');
		}else{
			echo "<div class='alert alert-danger text-center'>Next of Kin is not registered</div>";
		}
	}