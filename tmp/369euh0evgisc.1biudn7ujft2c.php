<script>
        var isClient = <?= ($isClient? "1" : "0") ?>;
    </script>
  
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

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