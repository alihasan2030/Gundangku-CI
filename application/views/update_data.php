<br>
<br>
<div class="container">
  <div class="row">
    <div class="col-md-10 offset-1">
      <div class="jumbotron">
        
        <form method="post" action="<?php echo site_url('parts/proses_update_barang'); ?>">

          <div class="row">
            <label class="col-md-5 offset-1 control-label">ID Barang</label>
            &nbsp;
            <label class="col-md-5 control-label">Kategori</label>
          </div>
          <div class="row">
            <input type="text" name="id" class="form-control col-md-5 offset-1" value="<?php echo $barang->id_barang ?>" required>
            &nbsp;
            <select class="custom-control custom-select col-md-5" name="kategori" required>
              <?php foreach ($kategori as $row) : ?>
                <?php if ($barang->xid_kategori == $row->id_kategori){ ?>
                  <option value="<?php echo $row->id_kategori ?>" selected><?php echo $row->nama_kategori ?></option>
                <?php } else { ?>
                  <option value="<?php echo $row->id_kategori ?>"><?php echo $row->nama_kategori ?></option>
                <?php } ?>
              <?php endforeach; ?>
            </select>
          </div>
          <br>

          <div class="row">
            <label class="col-md-5 offset-1 control-label">Nama Barang</label>
            &nbsp;
            <label class="col-md-5 control-label">Merk Barang</label>
          </div>
          <div class="row">
            <input type="text" name="nama" class="form-control col-md-5 offset-1" value="<?php echo $barang->nama_barang ?>" required>
            &nbsp;
            <input type="text" name="merk" class="form-control col-md-5" value="<?php echo $barang->merk_barang ?>" required>
          </div>
          <br>

          <div class="row">
            <label class="col-md-5 offset-1 control-label">Harga Barang</label>
            &nbsp;
            <label class="col-md-5 control-label">Stok Barang</label>
          </div>
          <div class="row">
            <input type="number" name="harga" class="form-control col-md-5 offset-1" value="<?php echo $barang->harga_barang ?>" required>
            &nbsp;
            <input type="number" name="stok" class="form-control col-md-5" value="<?php echo $barang->stok_barang ?>" required>
          </div>
          <br>

          <div class="row">
            <label class="col-md-5 offset-1 control-label">Link Gambar</label>
          </div>
          <div class="row">
            <input type="text" name="link" class="form-control col-md-10 offset-1" value="<?php echo $barang->image_barang ?>" required>
          </div>
          <br>

          <input type="hidden" name="id_spek" value="<?php echo $spesifikasi->id_spesifikasi; ?>">

          <div class="row">
            <label class="col-md-5 offset-1 control-label">Spesfifikasi</label>
          </div>
          <div class="row">
            <input type="text" name="spek" class="form-control col-md-10 offset-1" value="<?php echo $spesifikasi->rincian_spesifikasi ?>" required>
          </div>
          <br>
          
          <br>
          <div class="row" align="center">
            <div class="col-md-12">
              <div class="form-group">
                <button type="submit" name="submit" class="btn btn-success col-md-6">Update Barang</button>
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