<?php
	if(isset($_POST['add_customer'])){
		unset($_POST['add_customer']);
		$_POST['customer_registered_by'] = $_SESSION['user'];
		$_POST['customer_registered_date'] = $timestamp;
		$_POST['customer_status'] = $active;
		$_POST['customer_code'] = "CST_".create_code('customer');
		$data = $_POST;
		if(create('customer',$data)){
			echo "<div class='alert alert-info text-center'>Customer added successfully</div>";
		}else{
			echo "<div class='alert alert-warning text-center'>Customer could not be added</div>";
		}
	}
	
	if(isset($_POST['btnEditUser'])){
		unset($_POST['btnEditUser']);
		$data = $_POST;
		if(update('user',$id,$data)){
			echo "<div class='alert alert-info text-center'>User updated successfully</div>";
		}else{
			echo "<div class='alert alert-warning text-center'>User could not be updated</div>";
		}
	}
	
	if(isset($_GET['d'])){
		$id = $_GET['d'];
		$id = ['id'=>$id];
		if(remove('user',$id)){
			echo "<div class='alert alert-info text-center'>User deleted successfully</div>";
		}else{
			echo "<div class='alert alert-warning text-center'>User could not be deleted</div>";
		}
	}
?>