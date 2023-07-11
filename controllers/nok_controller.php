<?php	
	if(isset($_POST['add_nok'])){
		unset($_POST['add_nok']);
		$_POST['nok_registered_by'] = $_SESSION['user'];
		$_POST['nok_registered_date'] = $timestamp;
		$_POST['nok_status'] = $active;
		$_POST['nok_code'] = "NOK_".create_code('nok');
		$data = $_POST;
		if(create('nok',$data)){
			echo "<div class='alert alert-info text-center'>Next of Kin added successfully</div>";
		}else{
			echo "<div class='alert alert-warning text-center'>Next of Kin could not be added</div>";
		}
	}
	
	if(isset($_POST['assign_nok'])){
		$nok_nat_id = $_POST['nok_nat_id'];
		$data = ["nok_nat_id"=>$nok_nat_id];
		$nok = select_all('nok',$data);
		if(count($nok,COUNT_RECURSIVE)){
			include(APP_PATH.'/app_loans/lists/nok_details.php');
		}else{
			echo "<div class='alert alert-danger text-center'>Next of Kin is not registered</div>";
		}
	}