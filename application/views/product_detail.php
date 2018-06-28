  <br>
  <br>
	<br>
  <div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img src="<?php foreach ($barang as $key) {
               if ($id == $key->id_barang) {
                 echo $key->image_barang;
               }
              } ?>" /></div>
						</div>
						
					</div>
					<div class="details col-md-6">
            <br>
            <br>
						<h3 class="product-title">
            <?php foreach ($barang as $key) {
               if ($id == $key->id_barang) {
                 echo $key->nama_barang;
               }
              } ?>
            </h3>
						
						<p class="product-title">
            <?php foreach ($barang as $key) {
               if ($id == $key->id_barang) {
                 echo $key->merk_barang;
               }
              } ?></p>
						<h4 class="price">Harga: 
              <span>
              <?php foreach ($barang as $key) {
               if ($id == $key->id_barang) {
                 echo $key->harga_barang;
               }
              } ?>
              </span></h4>
						<h4 class="price">Stok : 
              <span>
              <?php foreach ($barang as $key) {
               if ($id == $key->id_barang) {
                 echo $key->stok_barang;
               }
              } ?>
              </span>
            </h4>
						<br>
						<div class="action">
              <button class="btn btn-default" type="button">Add</button>
							<button class="btn btn-default" type="button">Update</button>
						</div>			
					</div>
				</div>
			</div>
		</div>
	</div>
  </body>
</html>