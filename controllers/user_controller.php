<?php
	if(isset($_POST['add_user'])){
		unset($_POST['add_user']);
		$_POST['admin_created'] = $timestamp;
		$_POST['admin_status'] = $active;
		$_POST['user_code'] = "USR_".create_code('user');
		$_POST['password'] = md5($_POST['password']);
		$data = $_POST;
		if(create('user',$data)){
			echo "<div class='alert alert-info text-center'>User added successfully</div>";
		}else{
			echo "<div class='alert alert-warning text-center'>User could not be added</div>";
		}
	}
	
	if(isset($_POST['add_role'])){
		unset($_POST['add_role']);
		$data = $_POST;
		if(create('role',$data)){
			echo "<div class='alert alert-info text-center'>Role added successfully</div>";
		}else{
			echo "<div class='alert alert-warning text-center'>Role could not be added</div>";
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