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
            <a class="nav-link"><?php foreach ($maman as $key) { echo $key->email; }?> </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href='<?php echo base_url('welcome/keluar')?>'>Logout</a>
          </li>
        </ul>
      </div>
    </nav>

<section class="head">
    <div class="container">
        <h2 style="text-align: center; color: white" ><span>Search</span>
        <input type="text" name="search">
        <br><br>
        <input type="submit" name="submit" class="btn btn-info">
        </h2>
    </div>
</section>


<div class="clearfix"></div>
<div class="search-box">
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
        <!-- <?php 
        foreach ($req as $perreq) 
        {
            echo $perreq->nama;
            echo "<br>";
        }
         ?> --> 

        <?php foreach ($req as $key) {?> 
        <a href='<?php echo base_url('welcome/detail_log')?>'>
          <div class="media">
            <div class="fav-box"><i class="fa fa-heart-o" aria-hidden="true"></i></div>
              <img class="d-flex align-self-start" src='<?php echo $key->gambar; ?>' alt="Generic placeholder image">
              <div class="media-body pl-3">
                <div class="price"><?php echo $key->harga; ?><small><?php echo $key->nama; ?></small></div>
              <div class="address"><?php echo $key->deskripsi; ?></div>
            </div>
          </div>          
        </a>
        <?php } ?>
    </div>
  </div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>
<script>
    $(function(){
    $('.listing-block').slimScroll({
        height: '500px'
    });
});
</script>
</body>
</html>
