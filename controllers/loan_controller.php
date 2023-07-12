<?php
if(isset($_POST['btnSearchCustomer'])){
	($_POST['btnSearchCustomer']);
	$search_phrase = $_POST['search_customer'];
	$senders = select_all('customer',["customer_nat_id"=>$search_phrase]);
	if(count($senders,COUNT_RECURSIVE)){
		include(APP_PATH.'app_loans/lists/customer_listing.php');
	}else{
		echo "<div class='alert alert-danger text-center'>Sorry, ID number: <b>($search_phrase)</b> does not exist</div>";
	}
}

if(isset($_POST['btnSearchReference'])){
	unset($_POST['btnSearchReference']);
	$search_phrase = $_POST['search_reference'];
	$loans = select_all('loan_list',["reference"=>$search_phrase]);
	if(count($loans,COUNT_RECURSIVE)){
		include(APP_PATH.'app_loans/lists/loan_listing.php');
	}else{
		echo "<div class='alert alert-danger text-center'>Sorry, the reference <b>($search_phrase)</b> does not exist</div>";
	}
}

if(isset($_POST['add_plan'])){
	unset($_POST['add_plan']);
	$data = $_POST;
	if(create('loan_plan',$data)){
		echo "<div class='alert alert-info text-center'>Loan plan created successfully</div>";
	}else echo "<div class='alert alert-warning text-center'>Loan plan could not be created</div>";
}

if(isset($_POST['add_type'])){
	unset($_POST['add_type']);
	$data = $_POST;
	if(create('loan_types',$data)){
		echo "<div class='alert alert-info text-center'>Loan type created successfully</div>";
	}else echo "<div class='alert alert-warning text-center'>Loan type could not be created</div>";
}

if(isset($_GET['d'])){
	$id = $_GET['d'];
	$data = ["id"=>$id];
	if(remove($table,$data)){
		echo "<div class='alert alert-info text-center'>Record deleted successfully</div>";
	}else echo "<div class='alert alert-warning text-center'>Record could not be deleted</div>";
	
}

if(isset($_POST['create_loan'])){
	unset($_POST['create_loan']);
	$_POST['date_created'] = $timestamp;
	$_POST['status'] = $active;
	//$_POST['reference'] = create_reference();
	$_POST['loan_list_code'] = "PH_".create_code('loan_list');
	$data = $_POST;
	if($id=create('loan_list',$data)){
		header('location: '.url_for('receipts/rcpt_new_loan.php?rcpt='.$id));
		//echo "<div class='alert alert-info text-center'>Loan created successfully</div>";
	}else echo "<div class='alert alert-warning text-center'>Loan could not be created</div>";
}

if(isset($_POST['btnEditLoan'])){
	unset($_POST['btnEditLoan']);
	$id = $_POST['id'];
	unset($_POST['id']);
	if($_POST['status'] == 2){
		$_POST['date_released'] = $timestamp;
	}
	$data = $_POST;
	if(update('loan_list',$id,$data)){
		echo "<div class='alert alert-info text-center'>Loan updated successfully</div>";
	}else echo "<div class='alert alert-warning text-center'>Loan could not be updated</div>";
}

if(isset($_POST['btnPayLoan'])){
	unset($_POST['btnPayLoan']);
	$_POST['date_created'] = $timestamp;
	$data = $_POST;
	//dd($data);
	if(create('payments',$data)){
		echo "<div class='alert alert-info text-center'>Loan repayment successful</div>";
	}else echo "<div class='alert alert-warning text-center'>Loan repayment not successful</div>";
}