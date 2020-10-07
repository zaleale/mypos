<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pos Indonesia | Omnichannel</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Data Tables -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-yellow sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="<?= site_url('dashboard') ?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>m</b>P</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>POS</b>&nbsp; Indonesia</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Tasks: style can be found in dropdown.less -->
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- <i class="fa fa-flag-o"></i>
                                <span class="label label-danger">9</span> -->
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 9 tasks</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Design some buttons
                                                    <small class="pull-right">20%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">20% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!-- end task item -->
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">View all tasks</a>
                                </li>
                            </ul>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?= base_url() ?>assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?= ucfirst($this->fungsi->user_login()->username) ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?= base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                    <p>
                                        <?= ucfirst($this->fungsi->user_login()->name) ?>
                                        <small> <?= ucfirst($this->fungsi->user_login()->address) ?></small>
                                    </p>
                                </li>

                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?= site_url('auth/logout') ?>" class="btn btn-default btn-flat bg-red">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?= base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p> <?= ucfirst($this->fungsi->user_login()->username) ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- search form -->
                <!-- <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form> -->
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
                        <a href="<?= site_url('dashboard') ?>">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <!--<li <?= $this->uri->segment(1) == 'supplier' ? 'class="active"' : '' ?>>
                        <a href="<?= site_url('supplier') ?>">
                            <i class="fa fa-truck"></i> <span>Suppliers</span>
                        </a>
                    </li>                     <li <?= $this->uri->segment(1) == 'customer' ? 'class="active"' : '' ?>>
                        <a href="<?= site_url('customer') ?>">
                            <i class="fa fa-users"></i> <span>Customers</span>
                        </a>
                    </li> -->

                    <li class="treeview <?= $this->uri->segment(1) == 'category' || $this->uri->segment(1) == 'unit' || $this->uri->segment(1) == 'alamat_email' ||
                                            $this->uri->segment(1) == 'batas_pengaduan' || $this->uri->segment(1) == 'gantirugi_dn' ||
                                            $this->uri->segment(1) == 'posgiro_mobile'  || $this->uri->segment(1) == 'posgiro_mobile'  ||
                                            $this->uri->segment(1) == 'complainhandling_pgm' ||  $this->uri->segment(1) == 'bantuansosial_tunai'  ||
                                            $this->uri->segment(1) == 'qposin_aja'  ||   $this->uri->segment(1) == 'complainhandling_qposinaja'  ||
                                            $this->uri->segment(1) == 'q9'  ||  $this->uri->segment(1) == 'e_commerce'  ||
                                            $this->uri->segment(1) == 'e_tilang'  || $this->uri->segment(1) == 'weselpos_dn'  ||
                                            $this->uri->segment(1) == 'weselpos_instan'  || $this->uri->segment(1) == 'weselpos_prima'  ||
                                            $this->uri->segment(1) == 'weselpos_kemitraan_dn'  || $this->uri->segment(1) == 'cashaccount_dn'  ||
                                            $this->uri->segment(1) == 'weselpos_ln'  || $this->uri->segment(1) == 'remitansi_bni'  ||
                                            $this->uri->segment(1) == 'firecash_bca'  || $this->uri->segment(1) == 'moneygram'  ||
                                            $this->uri->segment(1) == 'tranfast'  || $this->uri->segment(1) == 'btn_ebatarapos'  ||
                                            $this->uri->segment(1) == 'pobox'  || $this->uri->segment(1) == 'linkaja'  ||
                                            $this->uri->segment(1) == 'tamasia'  ? 'active' : '' ?>">

                        <a href="#">
                            <i class="fa fa-archive"></i> <span>Products Knowledge</span>
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?= $this->uri->segment(1) == 'category' ? 'class="active"' : '' ?>><a href="<?= site_url('category') ?>"><i class="fa fa-circle-o"></i> Kiriman Domestik</a></li>
                            <li <?= $this->uri->segment(1) == 'unit' ? 'class="active"' : '' ?>><a href="<?= site_url('unit') ?>"><i class="fa fa-circle-o"></i> Kiriman Internasional</a></li>
                            <li <?= $this->uri->segment(1) == 'alamat_email' ? 'class="active"' : '' ?>><a href="<?= site_url('alamat_email') ?>"><i class="fa fa-circle-o"></i> Alamat Email Kiriman Impor</a></li>
                            <!-- contoh -->
                            <li <?= $this->uri->segment(1) == 'batas_pengaduan' ? 'class="active"' : '' ?>><a href="<?= site_url('batas_pengaduan') ?>"><i class="fa fa-circle-o"></i> Batas Pengaduan Kiriman</a></li>
                            <li <?= $this->uri->segment(1) == 'gantirugi_dn' ? 'class="active"' : '' ?>><a href="<?= site_url('gantirugi_dn') ?>"><i class="fa fa-circle-o"></i> Ganti Rugi Kir.Dalam Negeri</a></li>
                            <li <?= $this->uri->segment(1) == 'posgiro_mobile' ? 'class="active"' : '' ?>><a href="<?= site_url('posgiro_mobile') ?>"><i class="fa fa-circle-o"></i> Pos Giro Mobile</a></li>
                            <li <?= $this->uri->segment(1) == 'complainhandling_pgm' ? 'class="active"' : '' ?>><a href="<?= site_url('complainhandling_pgm') ?>"><i class="fa fa-circle-o"></i> Complain Handling <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PGM / MAgenpos</a></li>
                            <li <?= $this->uri->segment(1) == 'bantuansosial_tunai' ? 'class="active"' : '' ?>><a href="<?= site_url('bantuansosial_tunai') ?>"><i class="fa fa-circle-o"></i> BST (Bantuan Sosial Tunai)</a></li>
                            <li <?= $this->uri->segment(1) == 'qposin_aja' ? 'class="active"' : '' ?>><a href="<?= site_url('qposin_aja') ?>"><i class="fa fa-circle-o"></i> QPOSin Aja</a></li>
                            <li <?= $this->uri->segment(1) == 'complainhandling_qposinaja' ? 'class="active"' : '' ?>><a href="<?= site_url('complainhandling_qposinaja') ?>"><i class="fa fa-circle-o"></i> Complain Handling <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; QPOSin AJA</a></li>
                            <li <?= $this->uri->segment(1) == 'q9' ? 'class="active"' : '' ?>><a href="<?= site_url('q9') ?>"><i class="fa fa-circle-o"></i> Q9</a></li>
                            <li <?= $this->uri->segment(1) == 'e_commerce' ? 'class="active"' : '' ?>><a href="<?= site_url('e_commerce') ?>"><i class="fa fa-circle-o"></i> E-Commerce</a></li>
                            <li <?= $this->uri->segment(1) == 'e_tilang' ? 'class="active"' : '' ?>><a href="<?= site_url('e_tilang') ?>"><i class="fa fa-circle-o"></i> E-Tilang</a></li>
                            <li <?= $this->uri->segment(1) == 'weselpos_dn' ? 'class="active"' : '' ?>><a href="<?= site_url('weselpos_dn') ?>"><i class="fa fa-circle-o"></i> Weselpos Dalam Negeri</a></li>
                            <li <?= $this->uri->segment(1) == 'weselpos_instan' ? 'class="active"' : '' ?>><a href="<?= site_url('weselpos_instan') ?>"><i class="fa fa-circle-o"></i> Weselpos Instan</a></li>
                            <li <?= $this->uri->segment(1) == 'weselpos_prima' ? 'class="active"' : '' ?>><a href="<?= site_url('weselpos_prima') ?>"><i class="fa fa-circle-o"></i> Weselpos Prima</a></li>
                            <li <?= $this->uri->segment(1) == 'weselpos_kemitraan_dn' ? 'class="active"' : '' ?>><a href="<?= site_url('weselpos_kemitraan_dn') ?>"><i class="fa fa-circle-o"></i> Weselpos Kemitraan <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dalam Negeri (Korporat)</a></li>
                            <li <?= $this->uri->segment(1) == 'cashaccount_dn' ? 'class="active"' : '' ?>><a href="<?= site_url('cashaccount_dn') ?>"><i class="fa fa-circle-o"></i> Cash to Account <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dalam Negeri (Korporat)</a></li>
                            <li <?= $this->uri->segment(1) == 'weselpos_ln' ? 'class="active"' : '' ?>><a href="<?= site_url('weselpos_ln') ?>"><i class="fa fa-circle-o"></i> Weselpos Luar Negeri <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (Western Union) </a></li>
                            <li <?= $this->uri->segment(1) == 'remitansi_bni' ? 'class="active"' : '' ?>><a href="<?= site_url('remitansi_bni') ?>"><i class="fa fa-circle-o"></i> Rementasi BNI</a></li>
                            <li <?= $this->uri->segment(1) == 'firecash_bca' ? 'class="active"' : '' ?>><a href="<?= site_url('firecash_bca') ?>"><i class="fa fa-circle-o"></i> Firecash BCA</a></li>
                            <li <?= $this->uri->segment(1) == 'moneygram' ? 'class="active"' : '' ?>><a href="<?= site_url('moneygram') ?>"><i class="fa fa-circle-o"></i> Moneygram</a></li>
                            <li <?= $this->uri->segment(1) == 'tranfast' ? 'class="active"' : '' ?>><a href="<?= site_url('tranfast') ?>"><i class="fa fa-circle-o"></i> Transfast</a></li>
                            <li <?= $this->uri->segment(1) == 'btn_ebatarapos' ? 'class="active"' : '' ?>><a href="<?= site_url('btn_ebatarapos') ?>"><i class="fa fa-circle-o"></i> BTN e-Batara Pos</a></li>
                            <li <?= $this->uri->segment(1) == 'pobox' ? 'class="active"' : '' ?>><a href="<?= site_url('pobox') ?>"><i class="fa fa-circle-o"></i> PO BOX</a></li>
                            <li <?= $this->uri->segment(1) == 'linkaja' ? 'class="active"' : '' ?>><a href="<?= site_url('linkaja') ?>"><i class="fa fa-circle-o"></i> Linkaja</a></li>
                            <li <?= $this->uri->segment(1) == 'tamasia' ? 'class="active"' : '' ?>><a href="<?= site_url('tamasia') ?>"><i class="fa fa-circle-o"></i> Tabungan Emas Indonesia <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (Tamasia) </a></li>
                        </ul>
                    </li>

                    <!-- <li class="treeview <?= $this->uri->segment(1) == 'stock' ? 'active' : '' ?>">
                        <a href="#">
                            <i class="fa fa-shopping-cart"></i> <span>Transaction</span>
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>

                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i> Sales</a></li>
                            <li <?= $this->uri->segment(1) == 'stock' && $this->uri->segment(2) == 'in' ? 'class="active"' : '' ?>>
                                <a href="<?= site_url('stock/in') ?>"><i class="fa fa-circle-o"></i> Stock In</a>
                            </li>
                            <li><a href="#"><i class="fa fa-circle-o"></i> Stock Out</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-pie-chart"></i> <span>Reports</span>
                            <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>

                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i> Sales</a></li>
                            <li><a href="#"><i class="fa fa-circle-o"></i> Stock</a></li>
                        </ul>
                    </li> -->
                    <?php if ($this->fungsi->user_login()->level == 1) { ?>
                        <li class="header">SETTINGS</li>
                        <li><a href="<?= site_url('user') ?>"><i class="fa fa-user"></i> <span>Users</span></a></li>
                    <?php } ?>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- jQuery 3 -->
        <script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>

        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <?php echo $contents ?>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b>
            </div>
            <strong>Copyright &copy; 2020 <a href="https://adminlte.io">Muhamad Rizal Naufal Ghazi</a>.</strong> All rights
            reserved.
        </footer>

    </div>
    <!-- ./wrapper -->

    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?= base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>

    <script src="<?= base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#table1').DataTable()
        })
    </script>

</body>

</html>