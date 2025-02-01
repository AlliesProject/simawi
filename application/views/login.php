<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>SIMAWI</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="<?php echo base_url() ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="<?php echo base_url() ?>assets/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">

  <div>
    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <form id="formadmin" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url() ?>login/authenticate" method="post" name="formadmin" target="_self">
            <h1>Login Sistem</h1>
            <div>
              <input type="email" class="form-control" name="email" placeholder="Email" required="" />
            </div>
            <div>
              <input type="password" class="form-control" name="password" placeholder="Password" required="" />
            </div>
            <div>
              <button name="submit" class="btn btn-success" type="submit">Login</button>
              <button type="reset" class="btn btn-danger">Batal</button>
            </div>

            <div class="clearfix"></div>

          </form>
        </section>
      </div>

    </div>
  </div>
</body>

</html>