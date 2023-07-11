<?php 
	require_once('../../functions/initialise.php');
	$pageTitle = 'Branches';
	require_once(SHARED_PATH.'/header.php');
	$table = 'branch';
	$give_access_to = [ADMIN];
	redirect_to($session_user_role,$give_access_to);
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h5"><i class="bi bi-geo"></i> <?php echo $pageTitle;?></h5>
<div class="btn-toolbar mb-2 mb-md-0">
  <div class="btn-group me-2">
				<button type="button" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdropBranch">
				  <i class="bi bi-house-add"></i> Add Branch
				</button>
				<button type="button" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdropType">
				  <i class="bi bi-node-plus"></i> Add Type
				</button>
  </div>
</div>
</div>

<div class="container my-5">
	<form id="form-branches" action="" method="POST">
		<div class="row">
		<div class="">
				<?php require_once(PROJECT_PATH.'/controllers/branch_controller.php');?>
		</div>
      <div class="table-responsive">
        <table id="tbl-branches" class="table table-striped table-sm table-bordered">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Code</th>
              <th scope="col">Name</th>
              <th scope="col">Identifier</th>
              <th scope="col">Address</th>
              <th scope="col">Created</th>
              <th scope="col" width="10%">Actions</th>
            </tr>
          </thead>
          <tbody>
			<?php 
				$branches = select_all('branch');
				foreach($branches as $key=>$branch){
			?>
            <tr>
              <td><?php echo $key+1; ?></td>
              <td><?php echo $branch['branch_code']; ?></td>
              <td><?php echo $branch['name']; ?></td>
              <td><?php echo $branch['identifier']; ?></td>
              <td><?php echo $branch['address'] . ', ' . $branch['city']; ?></td>
              <td><?php echo substr($branch['created'],0,10); ?></td>
              <td>
				<a class="btn btn-outline-dark btn-sm" href="e_branch.php?e=<?php echo $branch['branch_id'];?>"><i class="bi bi-pencil-square"></i></a>
				<a class="btn btn-outline-dark btn-sm" href="?d=<?php echo $branch['branch_id'];?>" onclick="return confirm('Are you sure you want to delete <?php echo $table;?>?')"><i class="bi bi-trash"></i></a>
			  </td>
            </tr>
			<?php } ?> 
          </tbody>
        </table>
      </div>
			
		</div>
		
		<div class="form-group col-md-12">
			<input class="btn btn-dark" type="hidden" name="btnSend" value="Apply"/>
		</div>
	</form>
</div>


<!-- Modal -->
<div class="modal fade" id="staticBackdropType" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
  <form action="" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropType">Add Type</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
		<div class="col">
			<div class="row">
			<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
				<input type="text" name = "branch_type_name" class="form-control" id="floatingAmountSold" placeholder="Name">
				<label for="floatingAmountSold">Type:</label>
			</div>
			</div>
			<div class="row">
			<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
				<input type="text" name = "branch_type_description" class="form-control" id="floatingAmountPaid" placeholder="Name">
				<label for="floatingAmountPaid">Description:</label>
			</div>
			</div>	
		</div>		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Close</button>
        <button type="submit" name="add_branch_type" class="btn btn-dark"><i class="bi bi-save"></i> Apply</button>
      </div>
  </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdropBranch" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
  <form action="" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Branch</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
		<div class="col">
			<div class="row">
			<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
				<input type="text" name = "name" class="form-control" id="floatingAmountSold" placeholder="Name">
				<label for="floatingAmountSold">Name:</label>
			</div>
			</div>
			<div class="row">
			<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
				<input type="text" name = "identifier" class="form-control" id="floatingAmountPaid" placeholder="Name">
				<label for="floatingAmountPaid">Identifier</label>
			</div>
			</div>
			<div class="row">
			<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
				<input type="text" name = "address" class="form-control" id="floatingAmountPaid" placeholder="Name">
				<label for="floatingAmountPaid">Address:</label>
			</div>
			</div>		
			<div class="row">
			<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
				<input type="text" name = "city" class="form-control" id="floatingAmountPaid" placeholder="Name">
				<label for="floatingAmountPaid">City:</label>
			</div>
			</div>		
			<div class="row">
			<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
				 <select name="country" class="form-control">
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
			<div class="row">
			<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
				 <select name="branch_type" class="form-control">
					<option hidden selected>--Select Type--</option>
					<?php 
						$types = select_all('branch_type');
						foreach($types as $key=>$type){
					?>
					<option value="<?php echo $type['branch_type_id'];?>"><?php echo $type['branch_type_name'];?></option>
					<?php
						}
					?>
				 </select>
				<label for="floatingAmountPaid">Branch Type:</label>
			</div>
			</div>		
		</div>		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Close</button>
        <button type="submit" name="add_branch" class="btn btn-dark"><i class="bi bi-save"></i> Apply</button>
      </div>
  </form>
    </div>
  </div>
</div>

<?php require_once(SHARED_PATH.'/footer.php');?>
