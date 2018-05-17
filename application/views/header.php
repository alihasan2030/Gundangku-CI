<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="css/style2.css">
<link href="https://v4-alpha.getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style2.css">


<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<!-- Include the above in your HEAD tag -->

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

  <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">GudangKompi</a>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href='<?php echo base_url('welcome/')?>'>Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"><?php echo $maman['0']->NAMA;?> </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href='<?php echo base_url('welcome/keluar')?>'>Logout</a>
          </li>
        </ul>
      </div>
    </nav>