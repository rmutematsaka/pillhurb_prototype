<?php 
	require_once('../../functions/initialise.php');
	$pageTitle = 'Users';
	require_once(SHARED_PATH.'/header.php');
	$table = 'user';
	$give_access_to = [ADMIN];
	redirect_to($session_user_role,$give_access_to);
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h5"><i class="bi bi-people"></i> <?php echo $pageTitle;?></h5>
<div class="btn-toolbar mb-2 mb-md-0">
  <div class="btn-group me-2">
		<button type="button" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdropUser">
		  <i class="bi bi-person-add"></i> Add User
		</button>
		<!--<button type="button" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdropRole">
		  <i class="bi bi-person-add"></i> Add Roles
		</button>-->
  </div>
</div>
</div>

<div class="container my-5">
	<form id="form-users" action="" method="POST">
		<div class="row">
		<div class="">
			<?php
				require_once(PROJECT_PATH.'/controllers/user_controller.php');
			?>
		</div>
      <div class="table-responsive">
        <table id="tbl-users" class="table table-striped table-sm table-bordered">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Username</th>
              <th scope="col">Branch</th>
              <th scope="col">Role</th>
              <th scope="col">Created</th>
              <th scope="col" width="10%">Actions</th>
            </tr>
          </thead>
          <tbody>
			<?php 
				$users = select_all_users($table);
				foreach($users as $key=>$user){
			?>
            <tr>
              <td><?php echo $key+1; ?></td>
              <td><?php echo $user['user_code']; ?></td>
              <td><?php echo $user['fullname']; ?></td>
              <td><?php echo $user['username']; ?></td>
              <td><?php echo $user['name']; ?></td>
              <td><?php echo $user['title']; ?></td>
              <td><?php echo strip_timestamp($user['admin_created']); ?></td>
              <td>
				<a class="btn btn-outline-dark btn-sm" href="e_user.php?e=<?php echo $user['user_id'];?>"><i class="bi bi-person-check"></i></a>
				<a class="btn btn-outline-danger btn-sm" href="?d=<?php echo $user['user_id'];?>" onclick="return confirm('Are you sure you want to delete <?php echo $table;?>?')"><i class="bi bi-trash"></i></a>
			  </td>
            </tr>
			<?php } ?> 
          </tbody>
        </table>
      </div>
			
		</div>
		
		<div class="form-group col-md-12">
			<input class="btn btn-primary" type="hidden" name="btnSend" value="Apply"/>
		</div>
	</form>
</div>

<!-- Modal Add User -->
<div class="modal fade" id="staticBackdropUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
  <form action="" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropUserLabel"><i class="bi bi-person-add"></i> Add User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
		<div class="col">
			<div class="row">
			<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
				<input type="text" name = "fullname" class="form-control" id="floatingAmountSold" placeholder="Name">
				<label for="floatingAmountSold">Full Name:</label>
			</div>
			</div>
			<div class="row">
			<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
				<input type="text" name = "national_id" class="form-control" id="floatingAmountPaid" placeholder="Name">
				<label for="floatingAmountPaid">ID / Passport Number:</label>
			</div>
			</div>		
			<div class="row">
			<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
				<input type="text" name = "username" class="form-control" id="floatingAmountPaid" placeholder="Name">
				<label for="floatingAmountPaid">Username:</label>
			</div>
			</div>		
			<div class="row">
			<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
				<input type="password" name = "password" class="form-control" id="floatingAmountPaid" placeholder="Name">
				<label for="floatingAmountPaid">Password:</label>
			</div>
			</div>		
			<div class="row">
			<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
				 <select name="admin_branch" class="form-control">
					<option hidden selected>--Select Branch--</option>
					<?php 
						$branches = select_all('branch');
						foreach($branches as $key=>$branch){
					?>
					<option value="<?php echo $branch['branch_code'];?>"><?php echo $branch['identifier'];?></option>
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
					<option hidden selected>--Select Role--</option>
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
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Close</button>
        <button type="submit" name="add_user" class="btn btn-primary"><i class="bi bi-save"></i> Apply</button>
      </div>
  </form>
    </div>
  </div>
</div>

<!-- Modal Edit User -->
<div class="modal fade" id="staticBackdropUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
  <form action="" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropUserLabel"><i class="bi bi-person-check"></i> Edit User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Close</button>
        <button type="submit" name="add_user" class="btn btn-primary"><i class="bi bi-save"></i> Apply</button>
      </div>
  </form>
    </div>
  </div>
</div>

<!-- Modal Add Roles -->
<div class="modal fade" id="staticBackdropRole" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
  <form action="" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropRoleLabel">Add Role</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
		<div class="col">
			<div class="row">
			<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
				<input type="text" name = "title" class="form-control" id="floatingAmountSold" placeholder="Name">
				<label for="floatingAmountSold">Role:</label>
			</div>
			</div>
			<div class="row">
			<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
				<input type="text" name = "description" class="form-control" id="floatingAmountPaid" placeholder="Name">
				<label for="floatingAmountPaid">Description:</label>
			</div>
			</div>	
		</div>		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Close</button>
        <button type="submit" name="add_role" class="btn btn-primary"><i class="bi bi-save"></i> Apply</button>
      </div>
  </form>
    </div>
  </div>
</div>


<?php require_once(SHARED_PATH.'/footer.php');?>
