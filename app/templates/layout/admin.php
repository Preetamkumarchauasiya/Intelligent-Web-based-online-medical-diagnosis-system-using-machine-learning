
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken')); ?>
    <title>
        <?= $cakeDescription = 'Admin Panel: MedicineShoppee'; ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <!-- Google Font: Source Sans Pro and Ionicons -->
    <?= $this->Html->css(['fonts.googleapis.css','ionicons.min.css','font-awesome.min.css','font-awesome.css']) ?>
    <?= $this->Html->css(['fontawesome-free/css/all.min.css','bootstrap-4.min.css', 'icheck-bootstrap.min.css', 'adminlte.min.css', 'OverlayScrollbars.min.css', 'daterangepicker.css', 'summernote-bs4.min.css', 'select2.min.css', 'select2-bootstrap4.min.css', 'bs-stepper.min.css', 'dropzone.min.css']) ?>

    <?= $this->Html->script(['jquery.min.js', 'jquery-ui.min.js', 'Chart.min.js', 'moment.min.js', 'daterangepicker.js', 'bootstrap-4.min.js','js/adminlte.js','bootstrap/js/bootstrap.bundle.min.js','bootstrap.bundle.min.js','select2.full.min.js', 'jquery.inputmask.min.js', 'dropzone.min.js','jquery.overlayScrollbars.min.js', 'OverlayScrollbars.min.js', 'jquery.validate.js', 'slimselect.min.js']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center" style="background-color:#10847e;">
            <?= $this->Html->image("Icon.png", ["class" => "animation__shake", "height" => "60", "width" => "60"]);?>
        </div>
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
                <?= $this->Html->link('<i class="fas fa-bars"></i>','#',['class' => 'nav-link','data-widget' => 'pushmenu', 'role' => 'button', 'escape'=>false]);?>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <?= $this->Html->link('Home','#',['class' => 'nav-link']);?>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
              
            </li>
          </ul>
          <!-- Right navbar links -->
          <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <?= $this->Html->link('<i class="fa fa-comments"></i><span class="badge badge-danger navbar-badge">3</span>','#',['class' => 'nav-link', 'data-toggle' => 'dropdown', 'escape'=>false]);?>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <?= $this->Html->link('','/#/',['class' => 'dropdown-item']);?>
                <div class="dropdown-divider"></div>
                <?= $this->Html->link('','/#/home',['class' => 'dropdown-item']);?>
                <div class="dropdown-divider"></div>
                <?= $this->Html->link('See All Messages','/#/',['class' => 'dropdown-item dropdown-footer']);?>
              </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <?= $this->Html->link('<i class="far fa-bell"></i><span class="badge badge-warning navbar-badge">5</span>','#',['class' => 'nav-link', 'data-toggle' => 'dropdown', 'escape'=>false]);?>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <?= $this->Html->link('<i class="fas fa-envelope mr-2"></i> 4 new messages<span class="float-right text-muted text-sm">3 mins</span>','/#/',['class' => 'dropdown-item', 'escape'=>false]);?>
                <div class="dropdown-divider"></div>
                <?= $this->Html->link('See All Notifications','#',['class' => 'dropdown-item dropdown-footer']);?>
              </div>
            </li>
            <li class="nav-item">
                <?= $this->Html->link('<i class="fas fa-expand-arrows-alt"></i>','#',['class' => 'nav-link', 'data-widget' => 'fullscreen', 'role' => 'button', 'escape'=>false]);?>
            </li>
            <li class="nav-item dropdown">
                <?= $this->Html->link('<i class="fa-solid fas fa-user"></i>','#',['class' => 'nav-link', 'data-toggle' => 'dropdown', 'escape'=>false]);?>
              <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                <div class="media d-flex px-3">
                <?php
                    if ($this->Identity->isLoggedIn()) {
                        echo $this->Html->link(__('<i class="fas fa-sign-out-alt fa-lg"></i> Logout'), ['prefix' => false, 'controller'=>'Users','action' => 'logout'], ['class' => 'dropdown-item', 'escape'=>false]);
                    }else{
                        echo $this->Html->link('<i class="fas fa-sign-out-alt fa-lg"></i> Login','/users/login',['class' => 'dropdown-item', 'escape'=>false]);
                    }?>
                </div>
              </div>
            </li>
          </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
          <!-- Brand Logo -->
          <a href="#" class="brand-link">
            <?= $this->Html->image("Icon.png", ["class" => "brand-image img-circle elevation-3",'alt' => 'AdminLTELogo', "height" => "60", "width" => "60", "style" => "opacity: .8"]);?>
            <span class="brand-text font-weight-light">Admin</span>
          </a>

          <!-- Sidebar -->
          <div class="sidebar">
            <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <?= $this->Html->link('<i class="nav-icon fas fa-tachometer-alt"></i><p>Dashboard</p>',['controller' => 'users', 'action' => 'dashboard'],['class' => 'nav-link', 'escape'=>false]);?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('<i class="nav-icon fas fa-desktop"></i><p>User Home Screen</p>','/',['class' => 'nav-link', 'escape'=>false]);?>
                </li>
                <li class="nav-item">
                  <?= $this->Html->link('<i class="nav-icon fab fa-first-order-alt"></i><p>Manage Order</p>',['controller' => 'orders', 'action' => 'summary'],['class' => 'nav-link', 'escape'=>false]);?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('<i class="nav-icon fas fa-users"></i><p>Manage Users<i class="right fas fa-angle-left"></i></p>','#',['class' => 'nav-link', 'escape'=>false]);?>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <?= $this->Html->link('<i class="far fa-circle nav-icon"></i><p>Add Sub-Admin</p>',['controller' => 'users', 'action' => 'index'],['class' => 'nav-link', 'escape'=>false]);?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link('<i class="far fa-circle nav-icon"></i><p>Summary</p>',['controller' => 'users', 'action' => 'summary'],['class' => 'nav-link', 'escape'=>false]);?>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('<i class="nav-icon fa fa-list-alt"></i><p>Category<i class="right fas fa-angle-left"></i></p>','#',['class' => 'nav-link', 'escape'=>false]);?>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <?= $this->Html->link('<i class="far fa-circle nav-icon"></i><p>Add Category</p>',['controller' => 'categories', 'action' => 'add'],['class' => 'nav-link', 'escape'=>false]);?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link('<i class="far fa-circle nav-icon"></i><p>Export Category Data</p>','#',['class' => 'nav-link', 'escape'=>false]);?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link('<i class="far fa-circle nav-icon"></i><p>Import Category Data</p>','#',['class' => 'nav-link', 'escape'=>false]);?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link('<i class="far fa-circle nav-icon"></i><p>Summery</p>',['controller' => 'categories', 'action' => 'summary'],['class' => 'nav-link', 'escape'=>false]);?>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('<i class="nav-icon fas fa-project-diagram"></i><p>Product<i class="right fas fa-angle-left"></i></p>','#',['class' => 'nav-link', 'escape'=>false]);?>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <?= $this->Html->link('<i class="far fa-circle nav-icon"></i><p>Add Product</p>',['controller' => 'products', 'action' => 'add'],['class' => 'nav-link', 'escape'=>false]);?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link('<i class="far fa-circle nav-icon"></i><p>Export Product Data</p>','#',['class' => 'nav-link', 'escape'=>false]);?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link('<i class="far fa-circle nav-icon"></i><p>Import Product Data</p>','#',['class' => 'nav-link', 'escape'=>false]);?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link('<i class="far fa-circle nav-icon"></i><p>Summery</p>',['controller' => 'products', 'action' => 'index'],['class' => 'nav-link', 'escape'=>false]);?>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
            <!-- /.sidebar-menu -->
          </div>
          <!-- /.sidebar -->
        </aside>
    


        <div class="content-wrapper">
            <main class="main">
                <div class="container-fluid p-0" id="main">
                    <?= $this->Flash->render() ?>
                    <?= $this->fetch('content') ?>
                </div>
            </main>
        </div><!-- /.content-wrapper -->

        <footer class="main-footer">
          <strong>Copyright &copy; 2023 <a href="#">Admin</a>.</strong>
          All rights reserved.
          <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.2.0
          </div>
        </footer>
    </div> <!-- ./wrapper -->
</body>
</html>
