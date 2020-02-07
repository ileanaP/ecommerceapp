<!-- Sidebar -->
<?php if (isset($islogged) &&  $islogged): ?>
  
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="/"><i class="fas fa-fw fa-tachometer-alt"></i><span>Dashboard</span></a>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">General</div>
          <a class="nav-link" href="/tickets"><i class="fas fa-fw fa-ticket-alt"></i><span>Tickets</span></a>
    
    <?php if (isset($isClient) && $isClient): ?>
      <?php else: ?>
          <div class="sidebar-heading">Admin</div>
            <a class="nav-link" href="/plugins"><i class="fas fa-fw fa-users"></i><span>Plugins</span></a>
            <a class="nav-link" href="/users"><i class="fas fa-fw fa-users"></i><span>Users</span></a>
      
    <?php endif; ?>
    
  </li>

      

    </ul>
    <!-- End of Sidebar -->
  
  <?php endif; ?>