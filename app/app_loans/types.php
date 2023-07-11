<?php
	require_once('../../functions/initialise.php');
	$pageTitle = 'Loan Types';
	$table = 'loan_types';
	include(SHARED_PATH.'header.php'); 
	$give_access_to = [ADMIN];
	redirect_to($session_user_role,$give_access_to);
?>
	<?php include('includes/loan_btns.php');?>
  <div class="container my-5">
	<?php include(PROJECT_PATH.'/controllers/loan_controller.php');?>
		<div class="table-responsive mt-5">
			<table id="tbl-types" class="table table-responsive table-condensed table-striped table-hover table-bordered">
				<thead>
					<th style="width: 10%;">#</th>
					<th>Type</th>
					<th>Description</th>
					<th>Action</th>
				<thead>
				<tbody>
					<?php 
						$types = select_all($table);
						foreach($types as $key=>$type){
					?>
					<tr>
					  <td><?php echo $key+1; ?></td>
					  <td><?php echo $type['type_name']; ?></td>
					  <td><?php echo $type['description']; ?></td>
					  <td>
						<a class="btn btn-outline-dark btn-sm" href="e_user.php?e=<?php echo $user['user_id'];?>"><i class="bi bi-pencil"></i></a>
						<a class="btn btn-outline-danger btn-sm" href="?d=<?php echo $user['user_id'];?>" onclick="return confirm('Are you sure you want to delete <?php echo $table;?>?')"><i class="bi bi-trash"></i></a>
					  </td>
					</tr>
					<?php } ?> 
				</tbody>
			</table>
		</div>
  </div>
<?php include(SHARED_PATH.'/footer.php');?>
<!-- Modal Add Plan -->
<div class="modal fade" id="staticBackdropType" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
  <form action="" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropUserLabel"><i class="bi bi-person-add"></i> Add Customer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
		<div class="col">
			<div class="row">
				<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
					<input type="text" name = "type_name" class="form-control" id="floatingAmountSold" placeholder="Name" required>
					<label for="floatingAmountSold">Type:</label>
				</div>
			</div>
			<div class="row">
				<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
					<input type="text" name = "description" class="form-control" id="floatingAmountSold" placeholder="Name" required>
					<label for="floatingAmountSold">Description:</label>
				</div>
			</div>
		</div>		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Close</button>
        <button type="submit" name="add_type" class="btn btn-dark"><i class="bi bi-save"></i> Apply</button>
      </div>
  </form>
    </div>
  </div>
</div>
