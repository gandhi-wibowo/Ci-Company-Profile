<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login Form</title>
    <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/login.css">
  </head>
  <body>
    <div class="wrapper">
      <?php echo form_open("admin/Login/Login","class='form-signin'"); ?>
        <h2 class="form-signin-heading">Silahkan Login</h2>
        <input type="text" class="form-control" name="username" placeholder="User Name" required autofocus>
        <br>
        <input type="password" class="form-control" name="password" placeholder="Password" required>
        <br>
        <?php if($this->session->flashdata('alert')){ ?>
            <div class="alert alert-<?php echo $this->session->flashdata('class'); ?>">
              <strong><?php echo $this->session->flashdata('alert'); ?></strong> <?php echo $this->session->flashdata('value'); ?>
            </div>
        <?php } ?>
        <br>
        <button type="submit" class="btn btn-lg btn-primary btn-block" name="login">Login</button>
      </form>
    </div>

  </body>
</html>
