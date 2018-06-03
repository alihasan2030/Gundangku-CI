  <div class="container">
  <center><h1 class="section-title">Detail Product</h1></center>
  <a href="<?php echo base_url('parts/all') ?>"><button class="btn btn-warning">Back</button></a>
  <br>
  <br>
    <div class="card">
      <div class="container-fliud">
        <div class="wrapper row">
          <div class="preview col-md-6">
            <div class="preview-pic tab-content">
            <div class="tab-pane active" id="pic-1"><img style="object-fit: cover" height="450px" width="500px" src="<?php echo $result->image_barang;?>"/></div>
            </div>
            
          </div>
          <div class="details col-md-6">
            <br>
            <br>
            <h3 class="product-title">
              <?php echo $result->nama_barang;?>
            </h3>
            
            <h4 class="product-title">
              <?php echo $result->merk_barang;?>
            </h4>

            <p class="specification">
              <?php echo $spesifikasi->rincian_spesifikasi;?>
            </p>

            <h4 class="price">Harga: 
              <span>
              <?php echo $result->harga_barang;?>
              </span></h4>
            <h4 class="price">Stok : 
              <span>
              <?php echo $result->stok_barang;?>
              </span>
            </h4>
						<br>
						<div class="action">
              <a href="<?php echo base_url('parts/update/').$result->id_barang ?>"><button class="btn btn-default" type="button">Update Product</button></a>
							<a href="<?php echo base_url('parts/detail_crud/').$result->id_barang ?>"><button class="btn btn-success" type="button">Update Stok</button></a>
						</div>			
            <br>
					</div>
				</div>
			</div>
		</div>
	</div>
  <br><br><br><br><br><br>
  </body>
</html>