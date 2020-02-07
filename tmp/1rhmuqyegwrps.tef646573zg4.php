<!DOCTYPE html>
<html lang="en">
    <head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <meta name="description" content="">
	    <meta name="author" content="">
        <title><?= ($pageTitle) ?></title>
        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css"/>
        <!--DataTable Select CSS-->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" >
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css" >
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" >
        <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css" >
        <!-- Custom styles for this template-->
        <link rel="stylesheet" href="css/sb-admin-2.min.css" />
        <link rel="stylesheet" href="css/style.css" >
    </head>
    <body id="page-top" class="bg-gradient-primary"></body>
        <div id="wrapper">
            <?php echo $this->render('app/view/sidebar.html',NULL,get_defined_vars(),0); ?>
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <?php echo $this->render('app/view/topbar.html',NULL,get_defined_vars(),0); ?>
                    
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <?php echo $this->render('app/view/'.$content,NULL,get_defined_vars(),0); ?>
    				</div>
				    <!-- End of Main Content -->

                    <footer class="sticky-footer bg-white">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto">
                                <span>Copyright &copy; Your Website 2019</span>
                            </div>
                        </div>
                    </footer>
                </div>
		  </div>

		  <!-- Scroll to Top Button-->
		  <a class="scroll-to-top rounded" href="#page-top">
			<i class="fas fa-angle-up"></i>
		  </a>

          <!-- Scripts -->
          <?php echo $this->render('app/view/scripts.html',NULL,get_defined_vars(),0); ?>

        </div>

        <!-- Modals-->
        <?php echo $this->render('app/view/modals/modal_logout.html',NULL,get_defined_vars(),0); ?>
        <?php echo $this->render('app/view/modals/modal_edit_ticket.html',NULL,get_defined_vars(),0); ?>
        <?php echo $this->render('app/view/modals/modal_ticket_delete.html',NULL,get_defined_vars(),0); ?>
        <?php echo $this->render('app/view/modals/modal_view_ticket_content.html',NULL,get_defined_vars(),0); ?>

    </body>
</html>


