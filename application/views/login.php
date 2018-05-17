<!DOCTYPE html>
<html>
<head>
	<title>GUDANG BARANG</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/css/bootstrap.min.css">
	
	<style type="text/css">
		body{
	        background-image : url("<?php echo base_url() ?>asset/back2.jpg");
	        background-repeat: no-repeat;
	        background-size : cover;
	        background-position:center;
	      }
	    li{
	    	font-size: 13pt;
	    }
	    nav{
	    	background-image : url("<?php echo base_url() ?>asset/back-nav.png");
	        background-repeat: no-repeat;
	        background-size : 100%;
	        align-content: center;
	    }
	    label{
	    	color: white;
	    	font-size: 13pt;
	    }
	</style>

</head>
<body>
	
	<nav class="navbar navbar-expand-lg navbar-dark">
		<div class="container">

		  <a class="navbar-brand" href="<?php echo base_url() .'utama/beranda'; ?>">GUDANG BARANG</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		</div>
	</nav>

	<br>
	<br>
	<br>
	<div class="container">
		<div class="col-md-6 offset-3">
			<div class="jumbotron" style="background-color: rgba(000, 000, 000, 0.6);">

				<h1 align="center" style="color: white;">MASUK</h1>

				<form method="post" action="<?php echo site_url('Utama/prosesLoginAdmin'); ?>">
					
					<br>
					<div class="row">
						<div class="col-md-10 offset-1">
							<div class="form-group">
								<label class="col-md-3 control-label">Username</label>
								<div class="col-md-12">
									<input type="text" name="User" class="form-control" id="inputUser" placeholder="Username" autofocus>
								</div>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-10 offset-1">
							<div class="form-group">
								<label class="col-md-3 control-label">Password</label>
								<div class="col-md-12">
									<input type="password" name="Pass" class="form-control" id="inputPass" placeholder="Password" autofocus>
								</div>
							</div>
						</div>
					</div>

					<br>
					<br>
					<div class="row">
						<div class="col-md-6 offset-3">
							<button type="submit" name="submit" class="btn btn-block btn-success">Masuk</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>

=======
<br>
<!-- <section class="head">
<form action="<?php echo('http://localhost/Gundangku-CI/welcome/search'); ?>" method="post";">
    <div class="container">
        <h2 style="text-align: center; color: white" ><span>Search</span>
        <input type="text" name="search">
        <br><br>
        <input type="submit" name="submit" class="btn btn-info">
        </h2>
    </div>
</form>
</section> -->

<div class="container">
  <a style="color: white;" href="<?php echo base_url() .'welcome/tambah'; ?>">
  <button type="button" class="btn btn-primary">Tambah Data</button>
  </a>
  <br>
  <br>
</div>

<div class="clearfix"></div>
<div class="search-box">
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
        <?php foreach ($barang as $row) {?> 

        <a href='<?php echo base_url('welcome/detail_log')?>'>
          <div class="media" style="padding-bottom: 10px;">
            <div class="fav-box"><i class="fa fa-heart-o" aria-hidden="true"></i>
            </div>
              <img class="d-flex align-self-start" src='<?php echo $row->image_barang; ?>' alt="Generic placeholder image">
              <div class="media-body pl-4" style="border: 0px; padding-bottom: 10px;">
                <div class="price"><?php echo $row->nama_barang; ?><small><?php echo $row->merk_barang; ?></small></div>
              <div class="address" style="color: red"><b>Harga: </b><?php echo $row->harga_barang; ?></div>
              <div class="address" style="color: black">
                <a href="<?php echo site_url('welcome/update/'.$row->id_barang); ?>"><span class="btn btn-outline-primary">Update</span></a>
                <a href="<?php echo site_url('welcome/deleteBarang/'.$row->id_barang); ?>"><span class="btn btn-outline-danger">Hapus</span></a>
              </div>
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