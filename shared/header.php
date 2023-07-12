<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/pillhurb/functions/initialise.php');
require_once(SHARED_PATH.'connect.php');
if(isset($_SESSION['user']) && isset($_SESSION['role']) && isset($_SESSION['fullname']) && isset($_SESSION['user_branch']) && isset($_SESSION['branch_country'])){
$session_user = $_SESSION['user'];
$session_user_role = $_SESSION['role'];
$fullname = $_SESSION['fullname'];
$user_branch = $_SESSION['user_branch'];
$branch_country = $_SESSION['branch_country'];
}else{
	header('location: ../../');
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="Hugo 0.88.1">
    <title><?php echo $pageTitle;?></title>

    <link rel="icon" href="<?php url_for(PROJECT_PATH.'/assets/img/tarhill.png');?>">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">

	

    <!-- Datatables CSS -->
	<link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet" />
	<link href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.css rel="stylesheet" />
	<link href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css rel="stylesheet" />
	<link href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.foundation.css rel="stylesheet" />
	<link href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.foundation.min.css rel="stylesheet" />
	<link href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.jqueryui.css rel="stylesheet" />
	<link href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.jqueryui.min.css rel="stylesheet" />
	<link href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.semanticui.css rel="stylesheet" />
	<link href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.semanticui.min.css rel="stylesheet" />
	<link href="https://cdn.datatables.net/buttons/1.7.1/css/common.scss rel="stylesheet" />
	<link href="https://cdn.datatables.net/buttons/1.7.1/css/mixins.scss rel="stylesheet" />
	
	
    <!-- Bootstrap core CSS -->
<link href="<?php echo url_for('assets/css/bootstrap.min.css');?>" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link href="<?php echo url_for('assets/css/main.css');?>" rel="stylesheet">
<link href="<?php echo url_for('assets/css/pallete.css');?>" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="<?php echo url_for('assets/css/dashboard.css');?>" rel="stylesheet">
    <link href="<?php echo url_for('assets/css/dashboard.rtl.css');?>" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top btn-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href=""><?php echo $app_name;?></a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!--<input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">-->
  <div class="navbar-nav">
    <div class="nav-items text-nowrap">
      <a class="nav-link px-3" href="<?php echo url_for('logout.php');?>"><i class="bi bi-box-arrow-right"></i> Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
	<?php  require_once(SHARED_PATH.'/sidebar.php'); ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

