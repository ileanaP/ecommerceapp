<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SB Admin 2 - Dashboard</title>
	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css"/>
	<!-- Custom styles for this template-->
	<link rel="stylesheet" href="css/sb-admin-2.min.css">
	<link rel="stylesheet" href="css/style.css">
<?php if (isset($islogged) &&  $islogged): ?>
	
			<title>SB Admin 2 - Dashboard</title>
			<meta name="viewport" content="width=device-width, initial-scale=1">
		</head>
			<body id="page-top">
					<!-- Page Wrapper -->
						<div id="wrapper">
					<?php echo $this->render('app/view/sidebar.html',NULL,get_defined_vars(),0); ?>
						<!-- Content Wrapper -->
							<div id="content-wrapper" class="d-flex flex-column">
								<!-- Main Content -->
								<div id="content">
								<?php echo $this->render('app/view/topbar.html',NULL,get_defined_vars(),0); ?>
								<!-- Begin Page Content -->
									<div class="container-fluid">
	
	<?php else: ?>
		<title>SB Admin 2 - Login</title>
		</head>
			<body class="bg-gradient-primary">
	
<?php endif; ?>
