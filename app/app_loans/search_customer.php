<?php
	require_once('../../functions/initialise.php');
	$pageTitle = 'Create Loan';
	//$subTitle = 'Search Sender';
	include(SHARED_PATH.'header.php'); 
	$give_access_to = [ADMIN,AGENT];
	redirect_to($session_user_role,$give_access_to);
?>

<?php include('includes/loan_btns.php');?>

  <div class="container my-5">
		<form id="form-sellforex" action="" method="POST">
			<div class="row">
			<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
				<input type="text" class="form-control" id="floatingName" name="search_customer" placeholder="Name" autofocus>
				<label for="floatingName">National ID Number</label>
			</div>
				<input type="hidden" name="btnSearchCustomer">
			</div>
			<div class="row">
				<?php
					require_once(PROJECT_PATH.'/controllers/loan_controller.php');
				?>
			</div>
		</form>
  </div>
<?php include(SHARED_PATH.'/footer.php');?>
<!-- Modal Add Customer -->
<div class="modal fade" id="staticBackdropCustomer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
					<input type="text" name = "customer_name" class="form-control" id="floatingAmountSold" placeholder="Name" required>
					<label for="floatingAmountSold">Name(s):</label>
				</div>
				<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
					<input type="text" name = "customer_surname" class="form-control" id="floatingAmountSold" placeholder="Name" required>
					<label for="floatingAmountSold">Surname:</label>
				</div>
			</div>
			<div class="row">
				<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
					<input type="text" name = "customer_nat_id" class="form-control" id="floatingAmountSold" placeholder="Name" required>
					<label for="floatingAmountSold">National ID/Passport:</label>
				</div>
				<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
					<input type="text" name = "customer_address1" class="form-control" id="floatingAmountSold" placeholder="Name" required>
					<label for="floatingAmountSold">Address:</label>
				</div>
			</div>
			<div class="row">
				<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
					<input type="text" name = "customer_address2" class="form-control" id="floatingAmountSold" placeholder="Name" required>
					<label for="floatingAmountSold">Suburb:</label>
				</div>
				<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
					<input type="text" name = "customer_address3" class="form-control" id="floatingAmountSold" placeholder="Name" required>
					<label for="floatingAmountSold">City:</label>
				</div>
			</div>
			<div class="row">
				<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
					<input type="text" name = "customer_phone" class="form-control" id="floatingAmountSold" placeholder="Name" required>
					<label for="floatingAmountSold">Phone:</label>
				</div>
				<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
					<input type="text" name = "customer_email" class="form-control" id="floatingAmountSold" placeholder="Name">
					<label for="floatingAmountSold">Email:</label>
				</div>
			</div>
			<div class="row">
			<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
				 <select name="customer_country" class="form-control" required>
					<option hidden selected>--Select Country--</option>
					<?php 
						$data = ["country_status"=>$active];
						$countries = select_all('country',$data);
						foreach($countries as $key=>$value){
					?>
					<option value="<?php echo $value['country_id'];?>"><?php echo $value['country_name'];?></option>
					<?php
						}
					?>
				 </select>
				<label for="floatingAmountPaid">Country:</label>
			</div>
			</div>
		</div>		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Close</button>
        <button type="submit" name="add_customer" class="btn btn-dark"><i class="bi bi-save"></i> Apply</button>
      </div>
  </form>
    </div>
  </div>
</div>
