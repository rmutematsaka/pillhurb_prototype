<?php
	if(isset($_POST['add_vault'])){
		unset($_POST['add_vault']);
		$_POST['vault_created'] = $timestamp;
		$_POST['vault_status'] = $active;
		$_POST['vault_code'] = "VLT_".create_code('vault');
		$data = $_POST;
		if(create('vault',$data)){
			echo "<div class='alert alert-info text-center'>Vault added successfully</div>";
		}else{
			echo "<div class='alert alert-warning text-center'>Vault could not be added</div>";
		}
	}
	
	if(isset($_POST['add_vault_transaction'])){
		unset($_POST['add_vault_transaction']);
		$_POST['vault_transaction_created'] = $timestamp;
		$_POST['vault_transaction_code'] = "VTX_".create_code('vault_transaction');
		$data = $_POST;
		$balance = calculateVaultBalance($_POST['vault_transaction_name'],$_POST['vault_transaction_currency']);
			//dd("True balance is ".$balance);
		if($_POST['vault_transaction_type']==1){
			if(create('vault_transaction',$data)){
				echo "<div class='alert alert-info text-center'>Transaction added successfully</div>";
			}else{
				echo "<div class='alert alert-warning text-center'>Vault could not be added</div>";
			}
		}elseif($_POST['vault_transaction_type']==2){
			if($balance >= $_POST['vault_transaction_amount']){
				if(create('vault_transaction',$data)){
					echo "<div class='alert alert-info text-center'>Transaction added successfully</div>";
				}else{
					echo "<div class='alert alert-warning text-center'>Vault could not be added</div>";
				}
			}else{
				echo "<div class='alert alert-danger text-center'>Insufficient funds</div>";
			}
		}

	}	
	
	/*
	if(isset($_POST['add_vault_transaction'])){
		unset($_POST['add_vault_transaction']);
		$_POST['vault_transaction_created'] = $timestamp;
		$_POST['vault_transaction_code'] = "VTX_".create_code('vault_transaction');
		$data = $_POST;
		$balance = calculateVaultBalance($_POST['vault_transaction_name'],$_POST['vault_transaction_currency']);

		if($balance >= $_POST['vault_transaction_amount']){
			if(create('vault_transaction',$data)){
				echo "<div class='alert alert-info text-center'>Transaction added successfully</div>";
			}else{
				echo "<div class='alert alert-warning text-center'>Vault could not be added</div>";
			}
		}else{
			echo "<div class='alert alert-danger text-center'>Insufficient funds</div>";
		}
	}
	*/