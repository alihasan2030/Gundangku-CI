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
            <a class="nav-link" href='<?php echo base_url('welcome/admin')?>'>Admin</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-md-0" action='<?php echo base_url('welcome/result')?>'>
          <input class="form-control mr-sm-2" type="text" placeholder="Cari Properti">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>  
        </form>
      </div>
    </nav>

<section class="head">
    <div class="container">
        <h2 style="text-align: center; color: white" ><span>Search Result </span></a></h2>
    </div>
</section>
<div class="clearfix"></div>
<section class="search-box">
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
        <a href='<?php echo base_url('welcome/detail')?>'>
          <div class="media">
            <div class="fav-box"><i class="fa fa-heart-o" aria-hidden="true"></i></div>
              <img class="d-flex align-self-start" src='<?php echo $key->gambar; ?>' alt="Generic placeholder image">
              <div class="media-body pl-3">
                <div class="price"><?php echo $key->harga; ?><small><?php echo $key->nama; ?></small></div>
                <div class="stats">
                    <span><i class="fa fa-arrows-alt"></i>1678 Sq ft</span>
                    <span><i class="fa fa-bath"></i>2 Beadrooms</span>
                </div>
              <div class="address"><?php echo $key->deskripsi; ?></div>
            </div>
          </div>          
        </a>
        <?php } ?>


<!--         <a href="#">
          <div class="media">
            <div class="fav-box"><i class="fa fa-heart-o" aria-hidden="true"></i></div>
              <img class="d-flex align-self-start" src="https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg?h=350&auto=compress&cs=tinysrgb" alt="Generic placeholder image">
              <div class="media-body pl-3">
                <div class="price">$506,400<small>New York</small></div>
                <div class="stats">
                    <span><i class="fa fa-arrows-alt"></i>1678 Sq ft</span>
                    <span><i class="fa fa-bath"></i>2 Beadrooms</span>
                </div>
              <div class="address">4062 Walnut Hill Drive Cincinnati</div>
            </div>
          </div>
        </a>
        <a href="#">
          <div class="media">
            <div class="fav-box"><i class="fa fa-heart-o" aria-hidden="true"></i></div>
              <img class="d-flex align-self-start" src="https://images.pexels.com/photos/358636/pexels-photo-358636.jpeg?h=350&auto=compress&cs=tinysrgb" alt="Generic placeholder image">
              <div class="media-body pl-3">
                <div class="price">$506,400<small>New York</small></div>
                <div class="stats">
                    <span><i class="fa fa-arrows-alt"></i>1678 Sq ft</span>
                    <span><i class="fa fa-bath"></i>2 Beadrooms</span>
                </div>
              <div class="address">4062 Walnut Hill Drive Cincinnati</div>
            </div>
          </div>
        </a>
        <a href="#">
          <div class="media">
            <div class="fav-box"><i class="fa fa-heart-o" aria-hidden="true"></i></div>
              <img class="d-flex align-self-start" src="https://images.pexels.com/photos/186077/pexels-photo-186077.jpeg?h=350&auto=compress&cs=tinysrgb" alt="Generic placeholder image">
              <div class="media-body pl-3">
                <div class="price">$799,000<small>New York</small></div>
                <div class="stats">
                    <span><i class="fa fa-arrows-alt"></i>1678 Sq ft</span>
                    <span><i class="fa fa-bath"></i>2 Beadrooms</span>
                </div>
              <div class="address">4062 Walnut Hill Drive Cincinnati</div>
            </div>
          </div>
        </a>
        <a href="#">
          <div class="media">
            <div class="fav-box"><i class="fa fa-heart-o" aria-hidden="true"></i></div>
              <img class="d-flex align-self-start" src="https://images.pexels.com/photos/186077/pexels-photo-186077.jpeg?h=350&auto=compress&cs=tinysrgb" alt="Generic placeholder image">
              <div class="media-body pl-3">
                <div class="price">$799,000<small>New York</small></div>
                <div class="stats">
                    <span><i class="fa fa-arrows-alt"></i>1678 Sq ft</span>
                    <span><i class="fa fa-bath"></i>2 Beadrooms</span>
                </div>
              <div class="address">4062 Walnut Hill Drive Cincinnati</div>
            </div>
          </div>
        </a>
        <a href="#">
          <div class="media">
            <div class="fav-box"><i class="fa fa-heart-o" aria-hidden="true"></i></div>
              <img class="d-flex align-self-start" src="https://images.pexels.com/photos/186077/pexels-photo-186077.jpeg?h=350&auto=compress&cs=tinysrgb" alt="Generic placeholder image">
              <div class="media-body pl-3">
                <div class="price">$799,000<small>New York</small></div>
                <div class="stats">
                    <span><i class="fa fa-arrows-alt"></i>1678 Sq ft</span>
                    <span><i class="fa fa-bath"></i>2 Beadrooms</span>
                </div>
              <div class="address">4062 Walnut Hill Drive Cincinnati</div>
            </div>
          </div>
        </a> -->
    </div>
  </div>
</div>
</section>
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
