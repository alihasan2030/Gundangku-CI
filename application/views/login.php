<section class="head">
<form action="<?php echo('http://localhost:8080/TP3/welcome/search'); ?>" method="post";">
    <div class="container">
        <h2 style="text-align: center; color: white" ><span>Search</span>
        <input type="text" name="search">
        <br><br>
        <input type="submit" name="submit" class="btn btn-info">
        </h2>
    </div>
</form>
</section>

<div class="clearfix"></div>
<div class="search-box">
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
        <?php foreach ($query as $key) {?> 
        <a href='<?php echo base_url('welcome/detail_log')?>'>
          <div class="media">
            <div class="fav-box"><i class="fa fa-heart-o" aria-hidden="true"></i></div>
              <img class="d-flex align-self-start" src='<?php echo $key->IMAGE; ?>' alt="Generic placeholder image">
              <div class="media-body pl-3">
                <div class="price"><?php echo $key->NAMA_BARANG; ?><small><?php echo $key->MERK_BARANG; ?></small></div>
              <div class="address" style="color: red"><b>Harga: </b><?php echo $key->HARGA_BARANG; ?></div>
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
