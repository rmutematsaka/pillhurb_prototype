<?php 
	require_once('../../functions/initialise.php');
	$pageTitle = 'Edit | ';
	require_once(SHARED_PATH.'/header.php');
	$table = 'user';
	if(isset($_GET['e'])){
		$id = $_GET['e'];
		$e_user = select_all_users('user',["user_id"=>$id]);
	}
foreach($e_user as $key=>$value){ ?>
<div class="container my-5">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h3 class="h3"><i class="bi bi-person-check"></i> <?php echo $pageTitle . $value['fullname'];?></h3>
	<div class="btn-toolbar mb-2 mb-md-0">
	  <div class="btn-group me-2">
				<button type="button" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdropUser">
				  <i class="bi bi-person-add"></i> Add User
				</button>
				<button type="button" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdropRole">
				  <i class="bi bi-person-add"></i> Add Roles
				</button>
	  </div>
	  <!--<button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
		<span data-feather="calendar"></span>
		This week
	  </button>-->
	</div>
	</div>
	<form id="form-users-edit" action="" method="POST">
		<div class="row">
		<div class="">
			<?php
				require_once(PROJECT_PATH.'/controllers/user_controller.php');
			?>
		</div>
      <div class="row">
		<div class="col">
			<div class="row">
			<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
				<input type="text" name = "fullname" class="form-control" id="" placeholder="Name" value="<?php echo $value['fullname'];?>">
				<label for="floatingAmountSold">Full Name:</label>
			</div>
			</div>
			<div class="row">
			<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
				<input type="text" name = "national_id" class="form-control" id="floatingAmountPaid" placeholder="Name" value="<?php echo $value['national_id'];?>">
				<label for="floatingAmountPaid">ID / Passport Number:</label>
			</div>
			</div>		
			<div class="row">
			<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
				<input type="text" name = "username" class="form-control" id="floatingAmountPaid" placeholder="Name" value="<?php echo $value['username'];?>">
				<label for="floatingAmountPaid">Username:</label>
			</div>
			</div>		
			<div class="row">
			<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
				 <select name="admin_branch" class="form-control">
					<option value="<?php echo $value['branch_code'];?>" hidden selected><?php echo $value['name'];?></option>
					<?php 
						$branches = select_all('branch');
						foreach($branches as $key=>$branch){
					?>
					<option value="<?php echo $branch['branch_code'];?>"><?php echo $branch['name'];?></option>
					<?php
						}
					?>
				 </select>
				<label for="floatingAmountPaid">Branch:</label>
			</div>
			</div>		
			<div class="row">
			<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
				 <select name="admin_role" class="form-control">
					<option value="<?php echo $value['role_id'];?>" hidden selected><?php echo $value['title'];?></option>
					<?php 
						$roles = select_all('role');
						foreach($roles as $key=>$role){
					?>
					<option value="<?php echo $role['role_id'];?>"><?php echo $role['title'];?></option>
					<?php
						}
					?>
				 </select>
				<label for="floatingAmountPaid">Role:</label>
			</div>
			</div>		
		</div>		
      </div>
			
		</div>
		
		<div class="form-group col-md-12">
			<input class="btn btn-primary" type="submit" name="btnEditUser" value="Apply"/>
		</div>
	</form>
</div>
<?php } ?>
<?php require_once(SHARED_PATH.'/footer.php');?>
