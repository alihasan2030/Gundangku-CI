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

</body>
</html>