<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>
    <link href="<?php echo base_url(); ?>bootstrap/css/heroic-features.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.min.css') ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('bootstrap/datatables/dataTables.bootstrap.css') ?>"/>
</head>
<body>
  <script src="<?php echo base_url(); ?>bootstrap/js/jquery.js"></script>
  <script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>admin/Kegiatan"> <span class="glyphicon glyphicon-home"></span> Company</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <?php if($this->session->userdata('login_status')==1){ ?>
                <ul class="nav navbar-nav navbar-left nav-login">
                    <li class="dropdown drop-login">
                      <?php echo anchor('admin/Kegiatan',"<span class='glyphicon glyphicon-book'></span> <strong> Kegiatan</strong>","class='dropdown-toggle'") ?>
                    </li>
                    <li class="dropdown drop-login">
                      <?php echo anchor('admin/Kontak',"<span class='glyphicon glyphicon-phone-alt'></span> <strong> Kontak</strong>","class='dropdown-toggle'") ?>
                    </li>
                    <li class="dropdown drop-login">
                      <?php echo anchor('admin/Profil',"<span class='glyphicon glyphicon-picture'></span> <strong> Profil</strong>","class='dropdown-toggle'") ?>
                    </li>
                    <li class="dropdown drop-login">
                      <?php echo anchor('admin/User',"<span class='glyphicon glyphicon-user'></span> <strong> User</strong>","class='dropdown-toggle'") ?>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right nav-login">
                    <li class="dropdown drop-login">
                      <?php echo anchor('admin/Login/Logout',"<span class='glyphicon glyphicon-log-out'></span> <strong> Logout</strong>","class='dropdown-toggle'") ?>
                    </li>
                </ul>
                <?php } ?>
            </div>
            </div>
        </div>
    </nav>
    <br>
    <?php if($this->session->flashdata('alert')){ ?>
      <div class="container">
        <div class="alert alert-<?php echo $this->session->flashdata('class'); ?>">
          <strong><?php echo $this->session->flashdata('alert'); ?></strong> <?php echo $this->session->flashdata('value'); ?>
        </div>
      </div>
    <?php } ?>
    <?php echo $contents; ?>
    <footer>
        <div class="navbar navbar-inverse navbar-fixed-bottom">
          <div class="container">
            <p class="navbar-text pull-left"> Code with <span class="glyphicon glyphicon-heart-empty"></span></p>
          </div>
        </div>
      </footer>
    </div>

  </body>
</html>
