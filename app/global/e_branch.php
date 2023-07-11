<?php 
	require_once('../../functions/initialise.php');
	$pageTitle = 'Edit | Branch';
	require_once(SHARED_PATH.'/header.php');
	$table = 'branch';
	if(isset($_GET['e'])){
		$id = $_GET['e'];
		//$e_branch = select_one('Branch',["branch_id"=>$id]);
		$sql = "SELECT * FROM branch 
				join branch_type on branch_type.branch_type_id = branch.branch_type 
				join country on branch.country = country.country_id
				where branch_id = '$id'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$branch = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
	}

foreach($branch as $key=>$value){ ?>
<div class="container my-5">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h3 class="h3"><i class="bi bi-geo"></i> <?php echo $pageTitle . $value['name'];?></h3>
	<div class="btn-toolbar mb-2 mb-md-0">
	  <div class="btn-group me-2">
				<button type="button" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdropUser">
				  <i class="bi bi-person-add"></i> Add Branch
				</button>
	  </div>
	  <!--<button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
		<span data-feather="calendar"></span>
		This week
	  </button>-->
	</div>
	</div>
	<form id="form-users-edit" action="" method="POST">
		<div class="row">
		<div class="">
			<?php
				require_once(PROJECT_PATH.'/controllers/branch_controller.php');
			?>
		</div>
      <div class="row">
		<div class="col">
			<div class="row">
			<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
				<input type="hidden" name = "branch_id" class="form-control" id="floatingAmountSold" placeholder="Name" value="<?php echo $value['branch_id'];?>">
				<input type="text" name = "name" class="form-control" id="floatingAmountSold" placeholder="Name" value="<?php echo $value['name'];?>">
				<label for="floatingAmountSold">Name:</label>
			</div>
			</div>
			<div class="row">
			<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
				<input type="text" name = "identifier" class="form-control" id="floatingAmountPaid" placeholder="Name" value="<?php echo $value['identifier'];?>">
				<label for="floatingAmountPaid">Identifier</label>
			</div>
			</div>
			<div class="row">
			<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
				<input type="text" name = "address" class="form-control" id="floatingAmountPaid" placeholder="Name" value="<?php echo $value['address'];?>">
				<label for="floatingAmountPaid">Address:</label>
			</div>
			</div>		
			<div class="row">
			<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
				<input type="text" name = "city" class="form-control" id="floatingAmountPaid" placeholder="Name" value="<?php echo $value['city'];?>">
				<label for="floatingAmountPaid">City:</label>
			</div>
			</div>
			<div class="row">
			<div class="form-floating col mb-3 mt-3 ml-auto gx-1">
				 <select name="country" class="form-control">
					<option value="<?php echo $value['country_id'];?>" hidden selected><?php echo $value['country_name'];?></option>
					<?php 
						$data = ["country_status"=>$active];
						$countries = select_all('country',$data);
						foreach($countries as $key=>$country){
					?>
					<option value="<?php echo $country['country_id'];?>"><?php echo $country['country_name'];?></option>
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
					<option value="<?php echo $value['branch_type_id'];?>" hidden selected><?php echo $value['branch_type_name'];?></option>
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
		
		<div class="form-group col-md-12">
			<input class="btn btn-dark" type="submit" name="btnEditBranch" value="Apply"/>
		</div>
	</form>
</div>
<?php } ?>
<?php require_once(SHARED_PATH.'/footer.php');?>
