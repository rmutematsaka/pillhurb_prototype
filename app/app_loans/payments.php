<?php 
	require_once('../../functions/initialise.php');
	$pageTitle = 'Payment';
	$icon = 'bi bi-cash-coin';
	require_once(SHARED_PATH.'/header.php');
	$table = 'loan_list';
	if(isset($_GET['p'])){
		$id = $_GET['p'];
		$sql = "select * from loan_list
					join customer on customer.customer_code = loan_list.customer_code
					join nok on nok.nok_code = loan_list.nok_code
					join loan_plan on loan_plan.months = loan_list.loan_plan
					join loan_types on loan_types.id = loan_list.loan_type
					join loan_status on loan_status.loan_status = loan_list.status
					where loan_list.reference='$id'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$e_loan = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
	}else{
		header('location: search_to_pay.php');
	}
?>
<?php
foreach($e_loan as $key=>$value){ ?>
<?php include('includes/loan_btns.php');?>
<div class="container my-5">
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
								<input type="hidden" name="reference" value="<?php echo $value['reference'];?>"/>
								<input type="hidden" name="customer_code" value="<?php echo $value['customer_code'];?>"/>
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
									<th width="20%">Repayment Amount</th>
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
									<td><?php echo display_date($value['date_created']);?></td>
								</tr>
								<tr>
									<th width="20%">Released</th>
									<td><?php echo display_date($value['date_released']);?></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
						<input id="repayment_amount" type="number" class="form-control" placeholder="repayment_amount" name="repayment_amount" required />
						<label for="repayment_amount">Payment Amount:</label>
					</div>
			</div>
		</div>
		<div class="form-group col-md-12">
			<input class="btn btn-dark" type="submit" name="btnPayLoan" value="Update"/>
		</div>
	</form>
</div>
</div>
<?php } ?>
<?php require_once(SHARED_PATH.'/footer.php');?>
