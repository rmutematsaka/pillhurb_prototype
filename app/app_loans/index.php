<?php
	require_once('../../functions/initialise.php');
	$pageTitle = 'Loan Details';
	//$subTitle = 'Search Sender';
	include(SHARED_PATH.'header.php'); 
	$give_access_to = [ADMIN,AGENT];
	redirect_to($session_user_role,$give_access_to);
?>

<?php include('includes/loan_btns.php');?>

  <div class="container my-5">
		<div class="table-responsive mt-5">
			<table id="tbl-loans" class="table table-responsive table-condensed table-striped table-hover table-bordered">
				<thead>
					<th>#</th>
					<th>Reference</th>
					<th>Customer</th>
					<th>Amount</th>
					<th>Plan</th>
					<th>Created</th>
					<th>Released</th>
					<th>Status</th>
					<th>Action</th>
				<thead>
				<tbody>
						<?php 
							$sql = "select * from loan_list
							join nok on nok.nok_code = loan_list.nok_code
							join customer on customer.customer_code = loan_list.customer_code";
							$stmt = $conn->prepare($sql);
							$stmt->execute();
							$loans = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
							$i = 1;
							foreach($loans as $key=>$loan){
						?>
						<tr>
							<td><?php echo $i;?></td>
							<td><?php echo $loan['reference'];?></td>
							<td><?php echo $loan['customer_name']." ".$loan['customer_surname'];?></td>
							<td class="text-end"><?php echo "$".number_format($loan['loan_amount'],2);?></td>
							<td><?php echo $loan['loan_plan']." months";?></td>
							<td><?php echo display_date($loan['date_created']);?></td>
							<td><?php echo display_date($loan['date_released']);?></td>
							<td><?php echo loan_status($loan['status']);?></td>
							<td>
								<a class="btn btn-outline-dark btn-sm" href="e_loan.php?e=<?php echo $loan['id'];?>"><i class="bi bi-pencil"></i></a>
								<a class="btn btn-outline-danger btn-sm" href="?d=<?php echo $loan['id'];?>" onclick="return confirm('Are you sure you want to delete <?php echo $table;?>?')"><i class="bi bi-trash"></i></a>
							</td>
						</tr>
						<?php
							$i++;
							}
						?>
				</tbody>
			</table>
		</div>
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
