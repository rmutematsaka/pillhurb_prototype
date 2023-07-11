<?php
	require_once('../../functions/initialise.php');
	$pageTitle = 'Loan Plans';
	$table = 'loan_plan';
	include(SHARED_PATH.'header.php'); 
	$give_access_to = [ADMIN];
	redirect_to($session_user_role,$give_access_to);
?>

<?php include('includes/loan_btns.php');?>

  <div class="container my-5">
<?php include(PROJECT_PATH.'/controllers/loan_controller.php');?>
		<div class="table-responsive mt-5">
			<table id="tbl-plans" class="table table-responsive table-condensed table-striped table-hover table-bordered">
				<thead>
					<th style="width: 10%;">#</th>
					<th>Months</th>
					<th>Interest</th>
					<th>Penalty</th>
					<th>Action</th>
				<thead>
				<tbody>
					<?php 
						$plans = select_all($table);
						foreach($plans as $key=>$plan){
					?>
					<tr>
					  <td><?php echo $key+1; ?></td>
					  <td class="text-center"><?php echo $plan['months']." months"; ?></td>
					  <td class="text-center"><?php echo $plan['interest_percentage']." %"; ?></td>
					  <td class="text-center"><?php echo $plan['penalty_rate']." %"; ?></td>
					  <td>
						<a class="btn btn-outline-dark btn-sm" href="e_plan.php?e=<?php echo $plan['id'];?>"><i class="bi bi-pencil"></i></a>
						<a class="btn btn-outline-danger btn-sm" href="?d=<?php echo $plan['id'];?>" onclick="return confirm('Are you sure you want to delete <?php echo $table;?>?')"><i class="bi bi-trash"></i></a>
					  </td>
					</tr>
					<?php } ?> 
				</tbody>
			</table>
		</div>
  </div>
<?php include(SHARED_PATH.'/footer.php');?>
<!-- Modal Add Plan -->
<div class="modal fade" id="staticBackdropPlan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
			</div>
			<div class="row">
				<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
					<input type="text" name = "months" class="form-control" id="floatingAmountSold" placeholder="Name" required>
					<label for="floatingAmountSold">Months:</label>
				</div>
				<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
					<input type="text" name = "interest_percentage" class="form-control" id="floatingAmountSold" placeholder="Name" required>
					<label for="floatingAmountSold">Interest:</label>
				</div>
				<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
					<input type="text" name = "penalty_rate" class="form-control" id="floatingAmountSold" placeholder="Name" required>
					<label for="floatingAmountSold">Penalty:</label>
				</div>
			</div>
		</div>		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Close</button>
        <button type="submit" name="add_plan" class="btn btn-dark"><i class="bi bi-save"></i> Apply</button>
      </div>
  </form>
    </div>
  </div>
</div>
