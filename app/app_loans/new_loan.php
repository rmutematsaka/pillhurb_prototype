<?php
	require_once('../../functions/initialise.php');
	$pageTitle = 'Create Loan';
	include(SHARED_PATH.'header.php');
	if(isset($_GET['s'])){
		$customer = $_GET['s'];
	}
	$give_access_to = [ADMIN,AGENT];
	redirect_to($session_user_role,$give_access_to);	
?>

<?php include('includes/loan_btns.php');?>

  <div class="container my-5">
		<form id="form-sellforex" action="" method="POST">
			<div class="">
				<?php
					require_once(PROJECT_PATH.'/controllers/loan_controller.php');
				?>
			</div>
<div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Customer Details
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne">
      <div class="accordion-body">
        <div class="table-responsive">
				<table class="table table-responsive table-condensed table-bordered table-hover">
				<tbody>
					<?php
						$data = ["customer_code"=>$customer];
						$customer = select_all('customer',$data);
					foreach($customer as $key => $value){
					?>
					<input type="hidden" name="customer_code" value="<?php echo $value["customer_code"];?>"/>
					<tr>
						<th width="20%">Name</th>
						<td><?php echo $value['customer_name']. ' ' . $value['customer_surname'];?></td>
					</tr>
					<tr>
						<th width="20%">Customer ID</th>
						<td><?php echo $value['customer_code'];?></td>
					</tr>
					<tr>
						<th width="20%">National ID No</th>
						<td><?php echo $value['customer_nat_id'];?></td>
					</tr>
					<tr>
						<th width="20%">Address</th>
						<td><?php echo $value['customer_address1'].', '.$value['customer_address2'].', '.$value['customer_address3'].', '.$value['customer_country'];?></td>
					</tr>
					<?php } ?>
				</tbody>
				</table>
		</div>
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        Next of Kin Details
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo">
      <div class="accordion-body">
	  <div class="my-2">
	  <button class="btn btn-dark" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdropCollateral"><i class="bi bi-tag"></i> Assign</button>
	  <button class="btn btn-outline-dark" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdropAddNoK"><i class="bi bi-person-add"></i> Register</button>
	  </div>
	  
	<?php
		require_once(PROJECT_PATH.'/controllers/nok_controller.php');
	?>
	  
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        Loan Details
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
	  <div class="my-2">
		<div class="row">
			<div id="msg" class=""></div>
			<div class="col">
				<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
					 <select name="loan_plan" class="form-control" id="loan_plan">
						<option value="" hidden selected>--Select Plan--</option>
						<?php 
							$plans = select_all('loan_plan');
							foreach($plans as $key=>$plan){
						?>
						<option value="<?php echo $plan['months'];?>"><?php echo $plan['months'];?> month(s) @ <?php echo $plan['interest_percentage'];?>%</option>
						<?php
							}
						?>
					 </select>
					<label for="loan_plan">Plan:</label>
				</div>
			</div>
			<div class="col">
				<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
					 <select name="loan_type" id="loan_type" class="form-control">
						<option value="" hidden selected>--Select Type--</option>
						<?php 
							$types = select_all('loan_types');
							foreach($types as $key=>$type){
						?>
						<option value="<?php echo $type['id'];?>"><?php echo $type['type_name'];?></option>
						<?php
							}
						?>
					 </select>
					<label for="loan_type">Type:</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
					<input type="number" name="loan_amount" class="form-control prc" id="loan_amount" placeholder="Receiver National ID..." step="0.1">
					<label for="loan_amount">Amount:</label>
				</div>
			</div>
			<div class="col">
				<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
					<input type="number" name="loan_repayment_total" class="form-control" id="loan_repayment_total" placeholder="Receiver National ID..." step="0.1" readonly>
					<label for="loan_repayment_total">Total Due:</label>
				</div>
			</div>
			<div class="col">
				<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
					<input type="number" name="loan_repayment_amount" class="form-control" id="loan_repayment_amount" placeholder="Receiver National ID..." step="0.1" readonly>
					<label for="loan_repayment_amount">Monthly Payment:</label>
				</div>
			</div>
			<div class="col">
				<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
					<input type="number" name="loan_penalty_amount" class="form-control" id="loan_penalty_amount" placeholder="Receiver National ID..." step="0.1" readonly>
					<label for="loan_penalty_amount">Penalty:</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
					<textarea type="text" id="loan_purpose" name="loan_purpose" class="form-control" placeholder="Purpose..."></textarea>
					<label for="loan_purpose">Purpose:</label>
				</div>
			</div>
		</div>		
	  </div>
	  
	<?php
		//require_once(PROJECT_PATH.'/controllers/nok_controller.php');
	?>
	  
    </div>
    </div>
  </div>
</div>

<div class="row mt-3">
	<div class="col">
		<button class="btn btn-dark" type="submit" name="create_loan"><i class="bi bi-save"></i> Apply</button>
	</div>
</div>

		</form>		
  </div>
<?php include(SHARED_PATH.'/footer.php');?>
<!-- Modal Assign Receiver -->
<div class="modal fade" id="staticBackdropNoK" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
  <form action="" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropUserLabel"><i class="bi bi-person-add"></i> Assign Next of Kin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
		<div class="col">
			<div class="row">
				<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
					<input type="text" name="nok_nat_id" class="form-control" id="" placeholder="Receiver National ID...">
					<label for="">National ID/Passport:</label>
				</div>
			</div>
		</div>		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Close</button>
        <button type="submit" name="assign_nok" class="btn btn-dark"><i class="bi bi-save"></i> Apply</button>
      </div>
  </form>
    </div>
  </div>
</div>

<!-- Modal Add Customer -->
<div class="modal fade" id="staticBackdropAddNoK" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
  <form action="" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropUserLabel"><i class="bi bi-person-add"></i> Add Next of Kin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
		<div class="col">
			<div class="row">
				<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
					<input type="text" name = "nok_name" class="form-control" id="floatingAmountSold" placeholder="Name" required>
					<label for="floatingAmountSold">Name(s):</label>
				</div>
				<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
					<input type="text" name = "nok_surname" class="form-control" id="floatingAmountSold" placeholder="Name" required>
					<label for="floatingAmountSold">Surname:</label>
				</div>
			</div>
			<div class="row">
				<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
					<input type="text" name = "nok_nat_id" class="form-control" id="floatingAmountSold" placeholder="Name" required>
					<label for="floatingAmountSold">National ID/Passport:</label>
				</div>
				<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
					<input type="text" name = "nok_address1" class="form-control" id="floatingAmountSold" placeholder="Name" required>
					<label for="floatingAmountSold">Address:</label>
				</div>
			</div>
			<div class="row">
				<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
					<input type="text" name = "nok_address2" class="form-control" id="floatingAmountSold" placeholder="Name" required>
					<label for="floatingAmountSold">Suburb:</label>
				</div>
				<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
					<input type="text" name = "nok_address3" class="form-control" id="floatingAmountSold" placeholder="Name" required>
					<label for="floatingAmountSold">City:</label>
				</div>
			</div>
			<div class="row">
				<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
					<input type="text" name = "nok_phone" class="form-control" id="floatingAmountSold" placeholder="Name" required>
					<label for="floatingAmountSold">Phone:</label>
				</div>
				<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
					<input type="text" name = "nok_email" class="form-control" id="floatingAmountSold" placeholder="Name">
					<label for="floatingAmountSold">Email:</label>
				</div>
			</div>
			<div class="row">
			<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
				 <select name="nok_country" class="form-control" required>
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
        <button type="submit" name="add_nok" class="btn btn-dark"><i class="bi bi-save"></i> Apply</button>
      </div>
  </form>
    </div>
  </div>
</div>

<!-- Modal Assign Collateral -->
<div class="modal fade" id="staticBackdropCollateral" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
  <form action="" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropUserLabel"><i class="bi bi-person-add"></i> Assign Collateral</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
		<div class="col">
			<div class="row">
				<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
					<input type="text" name="nok_nat_id" class="form-control" id="" placeholder="Receiver National ID...">
					<label for="">Serial:</label>
				</div>
			</div>
		</div>		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Close</button>
        <button type="submit" name="assign_nok" class="btn btn-dark"><i class="bi bi-save"></i> Apply</button>
      </div>
  </form>
    </div>
  </div>
</div>

<!-- Modal Add Customer -->
<div class="modal fade" id="staticBackdropAddCollateral" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
  <form action="" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropUserLabel"><i class="bi bi-person-add"></i> Add Collateral</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
		<div class="col">
			<div class="row">
				<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
					<input type="text" name = "nok_name" class="form-control" id="floatingAmountSold" placeholder="Name" required>
					<label for="floatingAmountSold">Name(s):</label>
				</div>
				<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
					<input type="text" name = "nok_surname" class="form-control" id="floatingAmountSold" placeholder="Name" required>
					<label for="floatingAmountSold">Surname:</label>
				</div>
			</div>
			<div class="row">
				<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
					<input type="text" name = "nok_nat_id" class="form-control" id="floatingAmountSold" placeholder="Name" required>
					<label for="floatingAmountSold">National ID/Passport:</label>
				</div>
				<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
					<input type="text" name = "nok_address1" class="form-control" id="floatingAmountSold" placeholder="Name" required>
					<label for="floatingAmountSold">Address:</label>
				</div>
			</div>
			<div class="row">
				<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
					<input type="text" name = "nok_address2" class="form-control" id="floatingAmountSold" placeholder="Name" required>
					<label for="floatingAmountSold">Suburb:</label>
				</div>
				<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
					<input type="text" name = "nok_address3" class="form-control" id="floatingAmountSold" placeholder="Name" required>
					<label for="floatingAmountSold">City:</label>
				</div>
			</div>
			<div class="row">
				<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
					<input type="text" name = "nok_phone" class="form-control" id="floatingAmountSold" placeholder="Name" required>
					<label for="floatingAmountSold">Phone:</label>
				</div>
				<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
					<input type="text" name = "nok_email" class="form-control" id="floatingAmountSold" placeholder="Name">
					<label for="floatingAmountSold">Email:</label>
				</div>
			</div>
			<div class="row">
			<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
				 <select name="nok_country" class="form-control" required>
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
        <button type="submit" name="add_nok" class="btn btn-dark"><i class="bi bi-save"></i> Apply</button>
      </div>
  </form>
    </div>
  </div>
</div>

