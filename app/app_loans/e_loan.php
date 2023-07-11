<?php 
	require_once('../../functions/initialise.php');
	$pageTitle = 'Loan';
	require_once(SHARED_PATH.'/header.php');
	$table = 'loan_list';
	if(isset($_GET['e'])){
		$id = $_GET['e'];
		$sql = "select * from loan_list 
					join customer on customer.customer_code = loan_list.customer_code
					join nok on nok.nok_code = loan_list.nok_code
					join loan_plan on loan_plan.months = loan_list.loan_plan
					join loan_types on loan_types.id = loan_list.loan_type
					join loan_status on loan_status.loan_status = loan_list.status
					where loan_list.id='$id'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$e_loan = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
	}
foreach($e_loan as $key=>$value){ ?>
<div class="container my-5">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h3 class="h4"><i class="bi bi-pencil"></i> <?php echo $pageTitle . ' | ' .$value['reference'];?></h4>
	<div class="btn-toolbar mb-2 mb-md-0">
	  <!--<div class="btn-group me-2">
				<button type="button" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdropUser">
				  <i class="bi bi-person-add"></i> Add User
				</button>
				<button type="button" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdropRole">
				  <i class="bi bi-person-add"></i> Add Roles
				</button>
	  </div>-->
	</div>
	</div>
	<form id="form-loan-edit" action="" method="POST">
		<div class="row">
		<div class="">
			<?php
				require_once(PROJECT_PATH.'/controllers/loan_controller.php');
			?>
		</div>
		<div class="row">
			<div class="col">
					<div class="table-responsive">
						<table class="table table-responsive table-condensed table-bordered table-hover">
							<thead>
								<th></th>
								<th>Principal</th>
								<th>Next of Kin</th>
							</thead>
							<tbody>
								<input type="hidden" name="id" value="<?php echo $id;?>"/>
								<tr>
									<th width="20%">Name</th>
									<td><?php echo $value['customer_name']. ' ' . $value['customer_surname'];?></td>
									<td><?php echo $value['nok_name']. ' ' . $value['nok_surname'];?></td>
								</tr>
								<tr>
									<th width="20%">Customer ID</th>
									<td width="40%"><?php echo $value['customer_code'];?></td>
									<td width="40%"><?php echo $value['nok_code'];?></td>
								</tr>
								<tr>
									<th width="20%">National ID No</th>
									<td><?php echo $value['customer_nat_id'];?></td>
									<td><?php echo $value['nok_nat_id'];?></td>
								</tr>
								<tr>
									<th width="20%">Address</th>
									<td width="40%"><?php echo $value['customer_address1'].', '.$value['customer_address2'].', '.$value['customer_address3'].', '.$value['customer_country'];?></td>
									<td width="40%"><?php echo $value['nok_address1'].', '.$value['nok_address2'].', '.$value['nok_address3'].', '.$value['nok_country'];?></td>
								</tr>
								<tr>
									<th width="20%">Contact Phone</th>
									<td width="40%"><?php echo $value['customer_phone'];?></td>
									<td width="40%"><?php echo $value['nok_phone'];?></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="table-responsive">
						<table class="table table-responsive table-condensed table-bordered table-hover">
							<thead>
								<th colspan="2" width="20%">Repayment Details</th>
							</thead>
							<tbody>
								<tr>
									<th width="20%">Plan</th>
									<td><?php echo $value['loan_plan'] . " months";?></td>
								</tr>
								<tr>
									<th width="20%">Interest Rate</th>
									<td><?php echo $value['interest_percentage'] . " %";?></td>
								</tr>
								<tr>
									<th width="20%">Type</th>
									<td><?php echo $value['type_name'];?></td>
								</tr>
								<tr>
									<th width="20%">Amount Due</th>
									<td><?php echo "$ ".number_format($value['loan_repayment_total'],2);?></td>
								</tr>
								<tr>
									<th width="20%">Instalments</th>
									<td><?php echo "$ ".number_format($value['loan_repayment_amount'],2);?></td>
								</tr>
								<tr>
									<th width="20%">Penalty</th>
									<td><?php echo "$ ".number_format($value['loan_penalty_amount'],2);?></td>
								</tr>
								<tr>
									<th width="20%">Created</th>
									<td><?php echo short_date($value['date_created']);?></td>
								</tr>
								<tr>
									<th width="20%">Released</th>
									<td><?php echo short_date($value['date_released']);?></td>
								</tr>
							</tbody>
						</table>
					</div>
						<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
							 <select id="status" name="status" class="form-control">
								<option value="<?php echo $value['status'];?>" hidden selected><?php echo $value['status_name'];?></option>
								<?php 
									$statuses = select_all('loan_status');
									foreach($statuses as $key=>$status){
								?>
								<option value="<?php echo $status['loan_status'];?>"><?php echo $status['status_name'];?></option>
								<?php
									}
								?>
							 </select>
							<label for="loan_status">Status:</label>
						</div>
			</div>
		</div>
		<div class="form-group col-md-12">
			<input class="btn btn-dark" type="submit" name="btnEditLoan" value="Update"/>
		</div>
	</form>
</div>
</div>
<?php } ?>
<?php require_once(SHARED_PATH.'/footer.php');?>
