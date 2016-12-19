<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Company</title>
    <link href="<?php echo base_url(); ?>bootstrap/css/heroic-features.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.min.css') ?>"/>
</head>
<body style="background-color:#f2f2f2;">
  <style>
  .gradient {
    margin-top: 15px;
    background-image: linear-gradient(90deg, #0e446b, #e3eded);
    color:white;
  }
  </style>
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
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-left nav-login">
                <li class="dropdown ">
                  <?php echo anchor(base_url(),"<span class=''></span> <strong> UPT BANDAR SERAI </strong>","class='navbar-brand'") ?>
                </li>
              </ul>
                <ul class="nav navbar-nav navbar-right nav-login" >
                  <li class="dropdown ">
                    <?php echo anchor(base_url(),"<span class='glyphicon glyphicon-home'></span> <strong> Beranda</strong>","") ?>
                  </li>
                  <li class="dropdown dropdown-login" >
                    <a href="#" class="dropdown-toggle" data-toggle='dropdown' aria-expanded='true'><span class="glyphicon glyphicon-menu-down"></span><strong> Visi & Misi</strong></a>
                    <ul class="dropdown-menu"  id='login'>
                      <li>
                        <?php echo anchor(base_url('Home/Visi'),"<span class='glyphicon glyphicon-info-sign'></span> <strong> Visi</strong>","class='dropdown-toggle'"); ?>
                      </li>
                      <li>
                        <?php echo anchor(base_url('Home/Misi'),"<span class='glyphicon glyphicon-screenshot'></span> <strong> Misi</strong>","class='dropdown-toggle'"); ?>
                      </li>
                    </ul>
                  </li>
                  <li class="dropdown dropdown-login">
                    <a href="#" class="dropdown-toggle" data-toggle='dropdown' aria-expanded='true'><span class="glyphicon glyphicon-menu-down"></span><strong> Tentang Kami</strong></a>
                    <ul class="dropdown-menu" id='login'>
                      <li>
                        <?php echo anchor(base_url('Home/Profil'),"<span class='glyphicon glyphicon-user'></span> <strong> Profil</strong>","class='dropdown-toggle'"); ?>
                      </li>
                      <li>
                        <?php echo anchor(base_url('Home/Kontak'),"<span class='glyphicon glyphicon-phone-alt'></span> <strong> Kontak</strong>","class='dropdown-toggle'"); ?>
                      </li>
                      <li>
                        <?php echo anchor(base_url('Home/Struktur'),"<span class='glyphicon glyphicon-object-align-top'></span> <strong> Struktur Organisasi</strong>","class='dropdown-toggle'"); ?>
                      </li>
                    </ul>
                  </li>
                  <li class="dropdown drop-login">
                    <?php echo anchor(base_url('Home/Sejarah'),"<span class='glyphicon glyphicon-repeat'></span> <strong> Sejarah</strong>","class='dropdown-toggle'") ?>
                  </li>
                </ul>
            </div>
            </div>
        </div>
    </nav>
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
