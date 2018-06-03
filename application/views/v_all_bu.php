<br>
<div class="container">
  <a style="color: white;" href="<?php echo base_url() .'parts/tambah'; ?>">
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

        <a href='<?php echo site_url('parts/detail_barang/'.$row->id_barang)?>'>
          <div class="media" style="padding-bottom: 10px;">
            <div class="fav-box"><i class="fa fa-heart-o" aria-hidden="true"></i>
            </div>
              <img class="d-flex align-self-start" src='<?php echo $row->image_barang; ?>' alt="Generic placeholder image">
              <div class="media-body pl-4" style="border: 0px; padding-bottom: 10px;">
                <div class="price"><?php echo $row->nama_barang; ?><small><?php echo $row->merk_barang; ?></small></div>
              <div class="address" style="color: red"><b>Harga: </b><?php echo $row->harga_barang; ?></div>
              <div class="address" style="color: black">
                <a href="<?php echo site_url('parts/update/'.$row->id_barang); ?>"><span class="btn btn-outline-primary">Update</span></a>
                <a href="<?php echo site_url('parts/deleteDetail/'.$row->id_barang); ?>"><span class="btn btn-outline-danger">Hapus</span></a>
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
</body>
</html>
