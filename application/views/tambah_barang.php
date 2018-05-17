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
          background-position: center;
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
  </style>

</head>
<body>

<h1>Tambah Buku</h1>
<hr>
<br>
<br>
<br>

<div class="container">
  <div class="row">
    <div class="col-md-10 offset-1">
      <div class="jumbotron">

        <form method="post" action="<?php echo site_url('mahasiswa/insertBarang'); ?>">

          <div class="row">
            <label for="id" class="col-md-5 offset-1 control-label">ID Barang</label>
            &nbsp;&nbsp;&nbsp;
            <label for="judul" class="col-md-5 control-label">Kategori</label>
          </div>

          <div class="row">
            <input type="text" name="id" class="form-control col-md-5 offset-1" placeholder="ID Barang" required>
            &nbsp;&nbsp;&nbsp;
            <select class="custom-control custom-select col-md-5" name="kategori" required>
              <?php foreach ($kategori as $row) : ?>
                <option value="<?php echo $row->id_kategori ?>"><?php echo $row->nama_kategori ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <br>

          <div class="row">
            <label for="pengarang" class="col-md-5 offset-1 control-label">Nama Barang</label>
            &nbsp;&nbsp;&nbsp;
            <label for="pengarang" class="col-md-5 control-label">Merk Barang</label>
          </div>

          <div class="row">
            <input type="text" name="nama" class="form-control col-md-5 offset-1" placeholder="Nama Barang" required>
            &nbsp;&nbsp;&nbsp;
            <input type="text" name="merk" class="form-control col-md-5" placeholder="Merk Barang" required>
          </div>
          <br>

          <div class="row">
            <label for="pengarang" class="col-md-5 offset-1 control-label">Harga Barang</label>
            &nbsp;&nbsp;&nbsp;
            <label for="pengarang" class="col-md-5 control-label">Stok Barang</label>
          </div>

          <div class="row">
            <input type="number" name="harga" class="form-control col-md-5 offset-1" placeholder="Harga Barang" required>
            &nbsp;&nbsp;&nbsp;
            <input type="number" name="stok" class="form-control col-md-5" placeholder="Stok Barang" required>
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