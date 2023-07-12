<?php
ob_start();
function url_for($script_path){
	//add the leading '/' if not present
	if($script_path[0] != '/'){
		$script_path = "/" . $script_path;
	}
	return WWW_ROOT . $script_path;
}

function login($username,$password){
	global $conn;
	$query = "select username, password, fullname, admin_branch, country_name, admin_role 
				from user 
				join branch on user.admin_branch = branch.branch_code
				join country on country.country_id = branch.country
				where username='$username' && password='$password'";
	$result = mysqli_query($conn,$query);

	$msg = "";
		if(mysqli_num_rows($result)==1){
		while($row = mysqli_fetch_assoc($result)){
		$fullname = $row['fullname'];
		$role = $row['admin_role'];
		$user_branch = $row['admin_branch'];
		$branch_country = $row['country_name'];
		SESSION_START();
			$_SESSION['fullname'] = $fullname;
			$_SESSION['user'] = $username;
			$_SESSION['role'] = $role;
			$_SESSION['password'] = $password;
			$_SESSION['user_branch'] = $user_branch;
			$_SESSION['branch_country'] = $branch_country;
			$fullname = $_SESSION['fullname'];
			$username = $_SESSION['user'];
			$password = $_SESSION['password'];
			$user_branch = $_SESSION['user_branch'];
			$token = $username.$password;
		}
			//redirect_to($_SESSION['role'],$give_access_to);
			return $token;
		}
}

function start_session(){
		$session = SESSION_START();
		return $session;
}

function redirect_to($role,$access){
	switch($role){
		case 1:
			if(!in_array($role,$access)){
				$url = header('location: app/app_mta/');
				return $url;
			}
		break;
		case 2:
			if(!in_array($role,$access)){
				$url = header('location: app/app_mta/');
				return $url;
			}
		break;
		case 3:
			if(!in_array($role,$access)){
				$url = header('location: reports.php');
				return $url;
			}
		break;
	}
}

function dd($value){
	echo "<pre>" . print_r($value,true) . "</pre>";
	die();
}

function generateTFCode($shortDate){
	$number = uniqid();
	$varray = str_split($number);
	$len = sizeof($varray);
	$otp = array_slice($varray, $len - 8, $len);
	$otp = implode("",$otp);
	$otp = str_replace(',','',$otp);
	$tfCode = date('md').(strtoupper($otp));

	return $tfCode;
	exit();
}

function create_code($table){
	global $conn, $str_pad_len, $str_pad_char;
	$field = $table."_code";
	$sql = "select * from $table order by $field desc limit 1";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$records = $stmt->get_result()->fetch_assoc();
	if(!empty($records[$field])){
		$record = $records[$field];
	}else $record = 0;
	$empcode = str_pad(substr($record,4),$str_pad_len,$str_pad_char,STR_PAD_LEFT);
	$empcode++;
	$empcode = str_pad($empcode,$str_pad_len,$str_pad_char,STR_PAD_LEFT);
	return $empcode;
}


function create_reference(){
	$reference = mt_rand(1,99999999);
	$i= 1;
	while($i==1){
		$check = select_one('loan_list',["reference"=>$reference]);
		if($check > 0){
			$reference = mt_rand(1,99999999);
		}else{
			$i = 0;
		}
	}
	return $reference;
}
function strip_timestamp($timestamp){
	$dateOnly = substr($timestamp,0,10);
	return $dateOnly;
}

function execute_query($sql,$data){
	global $conn;
	$stmt = $conn->prepare($sql);
	$values = array_values($data);
	$types = str_repeat('s',count($values));
	$stmt->bind_param($types, ...$values);
	$stmt->execute();
	return $stmt;
}

function select_one($table,$conditions){
	global $conn;
	$sql = "select * from $table";
	$i = 0;
	foreach($conditions as $key => $value){
		if($i===0){
			$sql = $sql . " where $key=?";
		}else{
			$sql = $sql . " and $key=?";
		}
		$i++;
	}
	$sql = $sql . " limit 1";
	$stmt = execute_query($sql,$conditions);
	$records = $stmt->get_result()->fetch_assoc();
	return $records;
}

function create($table,$data){
	global $conn;
	$sql = "insert into $table set";
	
	$i = 0;
	foreach($data as $key => $value){
		if($i===0){
			$sql = $sql . " $key=?";
		}else{
			$sql = $sql . ", $key=?";
		}
		$i++;
	}
	//dd($sql);
	$stmt = execute_query($sql,$data);
	$id = $stmt->insert_id;
	return $id;
}	

function update($table,$id,$data){
	global $conn;
	$sql = "update $table set";
	$field = "id";
	$i = 0;
	
	foreach($data as $key => $value){
		if($i===0){
			$sql = $sql . " $key=?";
		}else{
			$sql = $sql . ", $key=?";
		}
		$i++;
	}
	
	$sql = $sql . " where $field=?";
	$data[$field] = $id;
	$stmt = execute_query($sql,$data);
	return $stmt->affected_rows;
}


function remove($table,$data){
	global $conn;
	$sql = "delete from $table where id=?";
	$stmt = execute_query($sql,$data);
	return $stmt->affected_rows;
}

function select_all($table,$conditions=[]){
	global $conn;
	$sql = "select * from $table";
	if(empty($conditions)){
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
	return $records;
	}else{
		$i = 0;
		foreach($conditions as $key => $value){
			if($i===0){
				$sql = $sql . " where $key=?";
			}else{
				$sql = $sql . " and $key=?";
			}
			$i++;
		}
		//dd($sql);
	$stmt = execute_query($sql,$conditions);
	$records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
	return $records;
	}
}

function select_all_users($table,$conditions=[]){
	global $conn;
	$sql = "select * from $table";
	$sql = $sql . " join branch on $table".".admin_branch = branch.branch_code";
	$sql = $sql . " join role on $table".".admin_role = role.role_id";
	if(empty($conditions)){
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
	return $records;
	}else{
		$i = 0;
		foreach($conditions as $key => $value){
			if($i===0){
				$sql = $sql . " where $key=?";
			}else{
				$sql = $sql . " and $key=?";
			}
			$i++;
		}
	$stmt = execute_query($sql,$conditions);
	$records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
	return $records;
	}
}

function calculateCharges($commission,$amount){
	global $percent;
	$charges = ($commission/$percent)*$amount;
	return $charges;
}

function calculatePurchasePrice($x,$y,$z){
		if($x == 1 && $y == 1){
			$usd = select_all('config');
			foreach($usd as $key=>$value){
				$calculation = $z * $value['usd_selling_rate'];
				return $calculation;
			}
		}elseif($settlement == 1 && $payment == 2){
			$usd = select_all('config');
			foreach($usd as $key=>$value){
				$calculation = $amount * $value['usd_selling_rate'];
			}
		}
}

function calculateVaultBalance($vault,$currencyCode){
	$deposits = 0;
	$withdrawals = 0;
	$balance = 0;
	$currencies = select_all('currency');
	foreach($currencies as $key=>$currency){
		switch($currencyCode){
		case $currency['currency_code']:
			$conditions = ["vault_transaction_currency"=>$currency['currency_code'],"vault_transaction_name"=>$vault];
			$query = select_all('vault_transaction',$conditions);
			foreach($query as $keys=>$value){
				if($value['vault_transaction_type']=='1'){
					$deposits += $value['vault_transaction_amount'];
				}
				if($value['vault_transaction_type']=='2'){
					$withdrawals += $value['vault_transaction_amount'];
				}
			}
			$balance = $deposits - $withdrawals;
		break;
		}
	}
	return $balance;
}

function loan_status($value){
	$status = '';
	switch($value){
		case 0:
			$status = "<span class='badge bg-primary'>New</span>";
		break;
		case 1:
			$status = "<span class='badge bg-secondary'>Confirmed</span>";
		break;
		case 2:
			$status = "<span class='badge bg-dark'>Released</span>";
		break;
		case 3:
			$status = "<span class='badge bg-success'>Completed</span>";
		break;
		case 4:
			$status = "<span class='badge bg-danger'>Denied</span>";
		break;
	}
	return $status;
}


function collateral_category($value){
	$category = '';
	switch($value){
		case 1:
			$category = "Property";
		break;
		case 2:
			$category = "Vehicles";
		break;
		case 3:
			$category = "Gadgets";
		break;
	}
	return $category;
}

function show_status($value){
	$status = '';
	switch($value){
		case 0:
			$status = "<span class='badge bg-primary'>Unassigned</span>";
		break;
		case 1:
			$status = "<span class='badge bg-secondary'>Active</span>";
		break;
		case 2:
			$status = "<span class='badge bg-dark'>Inactive</span>";
		break;
		case 2:
			$status = "<span class='badge bg-danger'>Disposed</span>";
		break;
	}
	return $status;
}

function short_date($value){
	global $undefined;
	$value = substr($value,0,10);
	if($value == $undefined){
		$date = "-";
	}else{
		$date = substr($value,0,10);
	}
	return $date;
}

function display_date($date){
	global $undefined;
	if($date!=$undefined){
		$date = date("d M Y",strtotime(short_date($date)));
	}else{
		$date = "-";
	}
	return $date;
}