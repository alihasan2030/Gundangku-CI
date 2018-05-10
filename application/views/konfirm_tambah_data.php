<br>
<br>
<div class="container">
  <div class="row">
    <div class="col-md-10 offset-1">
      <div class="jumbotron">

        <label class="col-md-5 offset-1 control-label"><?php echo $hasilSpek ?></label>
        <label class="col-md-5 offset-1 control-label"><?php echo $hasilDetail ?></label>

        <!-- <form method="post" action="<?php echo site_url('welcome/insertBarang'); ?>"> -->

          <div class="row" align="center">
            <label style="font-size: 14pt;" class="col-md-10 offset-1 control-label">Data Berhasil Ditambahkan, Dengan Data : </label>
          </div>
          <br>
        
          <div class="row">
            <label class="col-md-5 offset-1 control-label">ID Barang : <?php echo $hasilBarang->id_barang ?></label>
            &nbsp;
            <label class="col-md-5 control-label">Kategori : <?php echo $hasilBarang->xid_kategori ?></label>
          </div>

          <div class="row">
            <label class="col-md-5 offset-1 control-label">Nama Barang : <?php echo $hasilBarang->nama_barang ?></label>
            &nbsp;
            <label class="col-md-5 control-label">Merk Barang : <?php echo $hasilBarang->merk_barang ?></label>
          </div>

          <div class="row">
            <label class="col-md-5 offset-1 control-label">Harga Barang : <?php echo $hasilBarang->harga_barang ?></label>
            &nbsp;
            <label class="col-md-5 control-label">Stok Barang : <?php echo $hasilBarang->stok_barang ?></label>
          </div>

          <div class="row">
            <label class="col-md-10 offset-1 control-label">Link Gambar : <?php echo $hasilBarang->image_barang ?></label>
          </div>

          <div class="row">
            <label class="col-md-5 offset-1 control-label">Nomor Seri : <?php echo $hasilDetail->nomor_seri_detail ?></label>
            &nbsp;
            <label class="col-md-5 control-label">Status : <?php echo $hasilDetail->status_detail ?></label>
          </div>

          <div class="row">
            <label class="col-md-5 offset-1 control-label">Keterangan : <?php echo $hasilDetail->keterangan_detail ?></label>
            &nbsp;
            <label class="col-md-5 control-label">Spesfifikasi : <?php echo $hasilSpek->rincian_spesifikasi ?></label>
          </div>
          
          <br>
          <div class="container">
            <a style="color: white;" href="<?php echo base_url() .'welcome/search'; ?>">
              <button type="button" class="btn btn-success col-md-6 offset-3">Kembali</button>
            </a>
          </div>
        
        <!-- </form> -->

      </div>
    </div>
  </div>
</div>
<br>
<br>


</body>
</html>