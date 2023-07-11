<?php 
	require_once('../functions/initialise.php');
	$pageTitle = 'Customers Report';
	require_once(SHARED_PATH.'/header_print.php');
	$table = 'customer';
	$give_access_to = [ADMIN];
	redirect_to($session_user_role,$give_access_to);
	
	//$customers = select_all_report_range($table,["customer_registered_date"=>$rep_from,"customer_status"=>$rep_to]);
	$sql = "SELECT * FROM customer 
			join country on customer.customer_country = country.country_id 
			WHERE customer_registered_date between '$rep_from' AND '$rep_to'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$customers = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h5"><?php echo $pageTitle;?> | <small><?php echo $_POST['rep_from'];?> to <?php echo $_POST['rep_to'];?></small></h5>
<div class="btn-toolbar mb-2 mb-md-0">
  <div class="btn-group me-2">
		<button type="button" class="btn btn-outline-dark btn-sm d-print-none" onclick="javascript:window.print();" data-abc="true">
		  <i class="bi bi-printer"></i> Print
		</button>
		<button type="button" class="btn btn-outline-dark btn-sm d-print-none" onclick="javascript:window.close();" data-abc="true">
		  <i class="bi bi-x-circle"></i> Close
		</button>
  </div>
</div>
</div>
<div class="container">
<div class="row">
  <div class="table-responsive">
	<table id="" class="table table-striped table-sm table-bordered">
	  <thead>
		<tr>
		  <th scope="col">#</th>
		  <th scope="col">Customer ID</th>
		  <th scope="col">Name</th>
		  <th scope="col">National ID</th>
		  <th scope="col">Contacts</th>
		  <th scope="col">Registered</th>
		  <th scope="col">Status</th>
		</tr>
	  </thead>
	  <tbody>
		<?php 
			foreach($customers as $key=>$value){
		?>
		<tr>
		  <td><?php echo $key+1; ?></td>
		  <td><?php echo $value['customer_code']; ?></td>
		  <td><?php echo $value['customer_name'].' '.$value['customer_surname']; ?></td>
		  <td><?php echo $value['customer_nat_id']; ?></td>
		  <td class="contact-info">
			<?php echo $value['customer_phone']; ?>	| <?php echo $value['customer_email']; ?><br/>
			<?php echo $value['customer_address1'].', '.$value['customer_address2'].', '.$value['customer_address3'].', '.$value['country_name']; ?>
		  </td>
		  <td><?php echo strip_timestamp($value['customer_registered_date']); ?></td>
		  <td><?php 
			switch($value['customer_status']){
				case 0:
					echo 'Active';
				break;
				case 1:
					echo 'Inactive';
				break;
			}
		  ?></td>
		</tr>
		<?php } ?> 
	  </tbody>
	</table>
  </div>
</div>
</div>