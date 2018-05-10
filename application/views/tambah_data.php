<br>
<div class="container">
  <a style="color: white;" href="<?php echo base_url() .'welcome/search'; ?>">
  <button type="button" class="btn btn-primary">Kembali</button>
  </a>
  <br>
  <br>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-10 offset-1">
      <div class="jumbotron">
        
        <?php if ($hasil != "0"){ ?>
          <label class="col-md-5 offset-1 control-label"><?php echo $hasil; ?></label>
        <?php } ?>

        <form method="post" action="<?php echo site_url('welcome/insertBarang'); ?>">

          <div class="row">
            <label class="col-md-5 offset-1 control-label">ID Barang</label>
            &nbsp;
            <label class="col-md-5 control-label">Kategori</label>
          </div>
          <div class="row">
            <input type="text" name="id" class="form-control col-md-5 offset-1" placeholder="ID Barang" required>
            &nbsp;
            <select class="custom-control custom-select col-md-5" name="kategori" required>
              <?php foreach ($kategori as $row) : ?>
                <option value="<?php echo $row->id_kategori ?>"><?php echo $row->nama_kategori ?></option>
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
            <input type="text" name="nama" class="form-control col-md-5 offset-1" placeholder="Nama Barang" required>
            &nbsp;
            <input type="text" name="merk" class="form-control col-md-5" placeholder="Merk Barang" required>
          </div>
          <br>

          <div class="row">
            <label class="col-md-5 offset-1 control-label">Harga Barang</label>
            &nbsp;
            <label class="col-md-5 control-label">Stok Barang</label>
          </div>
          <div class="row">
            <input type="number" name="harga" class="form-control col-md-5 offset-1" placeholder="Harga Barang" required>
            &nbsp;
            <input type="number" name="stok" class="form-control col-md-5" placeholder="Stok Barang" required>
          </div>
          <br>

          <div class="row">
            <label class="col-md-5 offset-1 control-label">Link Gambar</label>
          </div>
          <div class="row">
            <input type="text" name="link" class="form-control col-md-10 offset-1" placeholder="Link Gambar" required>
          </div>
          <br>

          <div class="row">
            <label class="col-md-5 offset-1 control-label">Nomor Seri</label>
            &nbsp;
            <label class="col-md-5 control-label">Status</label>
          </div>
          <div class="row">
            <input type="text" name="seri" class="form-control col-md-5 offset-1" placeholder="Nomor Seri" required>
            &nbsp;
            <select class="custom-control custom-select col-md-5" name="status" required>
              <option value="READY" selected>READY</option>
              <option value="PENDING">PENDING</option>
              <option value="DEFACED">DEFACED</option>
              <option value="RESERVED">RESERVED</option>
            </select>
          </div>
          <br>

          <div class="row">
            <label class="col-md-5 offset-1 control-label">Keterangan</label>
          </div>
          <div class="row">
            <input type="text" name="ket" class="form-control col-md-10 offset-1" placeholder="Keterangan" required>
          </div>
          <br>

          <div class="row">
            <label class="col-md-5 offset-1 control-label">Spesfifikasi</label>
          </div>
          <div class="row">
            <input type="text" name="spek" class="form-control col-md-10 offset-1" placeholder="Spesfifikasi" required>
          </div>
          <br>
          
          <br>
          <div class="row" align="center">
            <div class="col-md-12">
              <div class="form-group">
                <button type="submit" name="submit" class="btn btn-success col-md-6">Tambah Barang</button>
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