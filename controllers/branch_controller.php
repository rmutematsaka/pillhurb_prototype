<?php
	if(isset($_POST['add_branch'])){
		unset($_POST['add_branch']);
		$_POST['created'] = $timestamp;
		$_POST['branch_code'] = "BRH_".create_code('branch');
		$data = $_POST;
		if(create('branch',$data)){
			echo "<div class='alert alert-info text-center'>Branch added successfully</div>";
		}else{
			echo "<div class='alert alert-warning text-center'>Branch could not be added</div>";
		}
	}

	if(isset($_POST['add_branch_type'])){
		unset($_POST['add_branch_type']);
		$_POST['branch_type_code'] = "BRT_".create_code('branch_type');
		$data = $_POST;
		if(create('branch_type',$data)){
			echo "<div class='alert alert-info text-center'>Branch type added successfully</div>";
		}else{
			echo "<div class='alert alert-warning text-center'>Branch type could not be added</div>";
		}
	}

	if(isset($_POST['btnEditBranch'])){
		$id = $_POST['branch_id'];
		unset($_POST['btnEditBranch']);
		unset($_POST['branch_id']);
		$data = $_POST;
		if(update('branch',$id,$data)){
			echo "<div class='alert alert-info text-center'>Branch updated successfully</div>";
		}else{
			echo "<div class='alert alert-warning text-center'>Branch could not be updated</div>";
		}
	}

	if(isset($_GET['d'])){
		$id = $_GET['d'];
		$id = ['id'=>$id];
		if(remove('branch',$id)){
			echo "<div class='alert alert-info text-center'>Branch deleted successfully</div>";
		}else{
			echo "<div class='alert alert-warning text-center'>Branch could not be deleted</div>";
		}
	}