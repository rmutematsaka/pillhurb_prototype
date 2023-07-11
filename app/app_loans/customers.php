<?php 
	require_once('../../functions/initialise.php');
	$pageTitle = 'Customers';
	require_once(SHARED_PATH.'/header.php');
	$table = 'customer';
	$give_access_to = [ADMIN];
	redirect_to($session_user_role,$give_access_to);
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h5"><i class="bi bi-people"></i> <?php echo $pageTitle;?></h5>
<div class="btn-toolbar mb-2 mb-md-0">
  <div class="btn-group me-2">
		<button type="button" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdropCustomer">
		  <i class="bi bi-person-add"></i> Add Customer
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
				require_once(PROJECT_PATH.'/controllers/customer_controller.php');
			?>
		</div>
      <div class="table-responsive">
        <table id="tbl-customers" class="table table-striped table-sm table-bordered">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">National ID</th>
              <th scope="col">Contact</th>
              <th scope="col" width="10%">Actions</th>
            </tr>
          </thead>
          <tbody>
			<?php 
				$customers = select_all($table);
				foreach($customers as $key=>$customer){
			?>
            <tr>
              <td><?php echo $key+1; ?></td>
              <td><?php echo $customer['customer_code']; ?></td>
              <td><?php echo $customer['customer_name'] . ' ' . $customer['customer_surname']; ?></td>
              <td><?php echo $customer['customer_nat_id']; ?></td>
              <td><?php echo $customer['customer_phone']; ?></td>
              <td>
				<a class="btn btn-outline-dark btn-sm" href="e_user.php?e=<?php echo $customer['user_id'];?>"><i class="bi bi-person-check"></i></a>
				<a class="btn btn-outline-danger btn-sm" href="?d=<?php echo $customer['user_id'];?>" onclick="return confirm('Are you sure you want to delete <?php echo $table;?>?')"><i class="bi bi-trash"></i></a>
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


<?php require_once(SHARED_PATH.'/footer.php');?>
