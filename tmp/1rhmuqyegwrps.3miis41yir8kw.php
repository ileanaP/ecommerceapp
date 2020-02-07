	<?php if (isset($islogged) &&  $islogged): ?>
		
				</div>
				<!-- End of Main Content -->

			  <!-- Footer -->
			  <footer class="sticky-footer bg-white">
				<div class="container my-auto">
				  <div class="copyright text-center my-auto">
					<span>Copyright &copy; Your Website 2019</span>
				  </div>
				</div>
			  </footer>
			  <!-- End of Footer -->

			</div>
			<!-- End of Content Wrapper -->

		  </div>
		  <!-- End of Page Wrapper -->

		  <!-- Scroll to Top Button-->
		  <a class="scroll-to-top rounded" href="#page-top">
			<i class="fas fa-angle-up"></i>
		  </a>

		  <!-- Logout Modal-->
		  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
			  <div class="modal-content">
				<div class="modal-header">
				  <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
				  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				  </button>
				</div>
				<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
				<div class="modal-footer">
				  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				  <a class="btn btn-primary" href="/logout">Logout</a>
				</div>
			  </div>
			</div>
		  </div>

		  <script>
			  var isClient = <?= ($isClient? "1" : "0") ?>;
		  </script>
		
	<?php endif; ?>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!--DataTable Select CSS-->
  <script src="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"></script> 
  <script src="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css"></script> 
  <script src="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css"></script>
  <script src="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css"></script>
	
 

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  
  <!-- DataTable JS -->
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script src="<?= ($jsPath) ?>common.js"></script>
  <?php if (isset($islogged) &&  $islogged): ?>
		
			<!-- Page level custom scripts -->
			<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>
		
  <?php endif; ?>
  
  <!-- Load scripts on demand -->
  <?php if (isset($loadJs) &&  $loadJs): ?>
	<?php foreach (($loadJs?:[]) as $ikey=>$jsfile): ?>
		<script type="text/javascript" src="<?= ($jsfile) ?>"></script>
	<?php endforeach; ?>	
  <?php endif; ?>
  <?php echo $this->render('app/view/modals/modal_edit_ticket.html',NULL,get_defined_vars(),0); ?>
  <?php echo $this->render('app/view/modals/modal_ticket_delete.html',NULL,get_defined_vars(),0); ?>
  <?php echo $this->render('app/view/modals/modal_view_ticket_content.html',NULL,get_defined_vars(),0); ?>
</body>

</html>
