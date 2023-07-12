<?php 
	require_once('../../functions/initialise.php');
	$pageTitle = 'Collateral';
	require_once(SHARED_PATH.'/header.php');
	$table = 'collateral';
	$give_access_to = [ADMIN];
	redirect_to($session_user_role,$give_access_to);
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h5"><i class="bi bi-boxes"></i> <?php echo $pageTitle;?></h5>
<div class="btn-toolbar mb-2 mb-md-0">
  <div class="btn-group me-2">
		<button type="button" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdropAddCollateral">
		  <i class="bi bi-boxes"></i> Add Collateral
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
				require_once(PROJECT_PATH.'/controllers/collateral_controller.php');
			?>
		</div>
      <div class="table-responsive">
        <table id="tbl-customers" class="table table-striped table-sm table-bordered">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">ID</th>
              <th scope="col">Category</th>
              <th scope="col">Collateral Item</th>
              <th scope="col">Status</th>
              <th scope="col" width="10%">Actions</th>
            </tr>
          </thead>
          <tbody>
			<?php 
				$collaterals = select_all($table);
				foreach($collaterals as $key=>$collateral){
			?>
            <tr>
              <td><?php echo $key+1; ?></td>
              <td><?php echo $collateral['collateral_code']; ?></td>
              <td><?php echo collateral_category($collateral['category']); ?></td>
              <td class="group-td">
				  <?php echo $collateral['type']."<br/>"; ?>
				  <?php echo "<b>Make:</b> ".$collateral['brand']." ".$collateral['make_model']." ".$collateral['reg_no']."<br/>"; ?>
				  <?php echo "<b>Serial:</b> ".$collateral['chassis_serial']."<br/>"; ?>
			  
			  </td>
              <td><?php echo show_status($collateral['status']); ?></td>
              <td>
				<a class="btn btn-outline-dark btn-sm" href="e_collateral.php?e=<?php echo $collateral['id'];?>"><i class="bi bi-pencil"></i></a>
				<a class="btn btn-outline-danger btn-sm" href="?d=<?php echo $collateral['id'];?>" onclick="return confirm('Are you sure you want to delete <?php echo $table;?>?')"><i class="bi bi-trash"></i></a>
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
<div class="modal fade" id="staticBackdropAddCollateral" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
  <form action="" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropUserLabel"><i class="bi bi-boxes"></i> Add Collateral</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
		<div class="col">
			<div class="row">
				<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
					 <select id="category" name="category" class="form-control" required>
						<option hidden selected>--Select Category--</option>
						<?php 
							$categories = select_all('category');
							foreach($categories as $key=>$category){
						?>
						<option value="<?php echo $category['id'];?>"><?php echo $category['category_name'];?></option>
						<?php
							}
						?>
					 </select>
					<label for="category">Category:</label>
				</div>
			</div>
			<div class="row">
				<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
					<input type="text" name = "type" class="form-control" id="type" placeholder="Name" required>
					<label for="type">Type:</label>
				</div>
				<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
					<input type="text" name = "color" class="form-control" id="color" placeholder="Name" required>
					<label for="color">Color:</label>
				</div>
			</div>
			<div class="row">
				<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
					<input type="text" name="brand" class="form-control" id="brand" placeholder="Name" required>
					<label for="brand">Brand:</label>
				</div>
				<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
					<input type="text" name = "make_model" class="form-control" id="make_model" placeholder="Name" required>
					<label for="make_model">Make/Model:</label>
				</div>
			</div>
			<div class="row">
				<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
					<input type="text" name = "chassis_serial" class="form-control" id="chassis_serial" placeholder="Name" required>
					<label for="chassis_serial">Chassis No/Serial No:</label>
				</div>
				<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
					<input type="text" name = "reg_no" class="form-control" id="reg_no" placeholder="Name">
					<label for="reg_no">Reg No:</label>
				</div>
			</div>
		</div>		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Close</button>
        <button type="submit" name="add_collateral" class="btn btn-dark"><i class="bi bi-save"></i> Apply</button>
      </div>
  </form>
    </div>
  </div>
</div>


<?php require_once(SHARED_PATH.'/footer.php');?>
