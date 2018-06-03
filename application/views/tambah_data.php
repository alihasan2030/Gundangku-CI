<center><h1 class="section-title">Add New Product</h1></center>
<div class="container">
  <div class="row">
    <div class="col-md-10 offset-1">
      <a href="<?php echo base_url() .'parts/all'; ?>"><button type="button" class="btn btn-warning">Back</button></a>
      <br><br>
      <div class="jumbotron">
        <form method="post" action="<?php echo site_url('parts/proses_insert_detail'); ?>">

          <div>
            <label class="offset-1 control-label">ID Barang</label>
          </div>
          <div>
            <input type="text" name="id" class="form-control offset-1" style="width: 700px" required>
          </div>

          <div>
            <label class="offset-1 control-label">Kategori</label>
            <select class="custom-control custom-select offset-1" style="width: 700px" name="kategori" required>
              <?php foreach ($kategori as $row) : ?>
                <option value="<?php echo $row->id_kategori ?>"><?php echo $row->nama_kategori ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <br>
          <div>
            <label class="offset-1 control-label">Nama Barang</label>
          </div>
          <div>
            <input type="text" name="nama" class="form-control offset-1" style="width: 700px" required>
          </div>

          <div>
            <label class="offset-1 control-label">Merk Barang</label>
          </div>
          <div>
            <input type="text" name="merk" class="form-control offset-1" style="width: 700px" required>
          </div>  

          <div>
            <label class="offset-1 control-label">Harga Barang</label>
          </div>
          <div>
            <input type="number" name="harga" class="form-control offset-1" style="width: 700px" required>
          </div>

          <div>
            <label class="offset-1 control-label">Link Gambar</label>
          </div>
          <div>
            <input type="text" name="link" class="form-control col-md-10 offset-1" style="width: 700px" required>
          </div>

          <div>
            <label class="offset-1 control-label">Spesfifikasi</label>
          </div>
          <div>
            <textarea rows="5" type="text" name="spek" class="form-control col-md-10 offset-1" style="width: 700px" required></textarea>
          </div>
          
          <div class="row" align="center">
            <div class="col-md-12">
              <div class="form-group">
                <button type="submit" name="submit" class="btn btn-success col-md-6">Add</button>
              </div>
            </div>
          </div>

        </form>

      </div>
    </div>
  </div>
</div>
<br>
<br>


</body>
</html>