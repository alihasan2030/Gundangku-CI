<center><h1 class="section-title">Update Product</h1></center>
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-1">
            <div class="jumbotron">

                <form method="post" action="<?php echo site_url('parts/proses_update_barang'); ?>">

                    <div class="row">
                        <label class="col-md-5 offset-1 control-label">Nama Barang</label>
                        &nbsp;
                        <label class="col-md-5 control-label">Merk Barang</label>
                    </div>
                    <div class="row">
                        <input type="hidden" name="id" class="form-control col-md-5 offset-1"
                               value="<?php echo $barang->id_barang ?>" required>
                        <input type="hidden" name="stok" class="form-control col-md-5 offset-1"
                               value="<?php echo $barang->stok_barang ?>" required>
                        <input type="text" name="nama" class="form-control col-md-5 offset-1"
                               value="<?php echo $barang->nama_barang ?>" required>
                        &nbsp;
                        <select class="custom-control custom-select col-md-5" name="kategori" required>
                            <?php foreach ($kategori as $row) : ?>
                                <?php if ($barang->xid_kategori == $row->id_kategori) { ?>
                                    <option value="<?php echo $row->id_kategori ?>"
                                            selected><?php echo $row->nama_kategori ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $row->id_kategori ?>"><?php echo $row->nama_kategori ?></option>
                                <?php } ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <br>

                    <div class="row">
                        <label class="col-md-5 offset-1 control-label">Jenis Barang</label>
                        &nbsp;
                        <label class="col-md-5 control-label">Harga Barang</label>
                    </div>
                    <div class="row">
                        <input type="text" name="merk" class="form-control col-md-5 offset-1"
                               value="<?php echo $barang->merk_barang ?>" required>
                        &nbsp;
                        <input type="text" name="harga" class="form-control col-md-5"
                               value="<?php echo $barang->harga_barang ?>" required>
                    </div>
                    <br>

                    <div class="row">
                        <label class="col-md-5 offset-1 control-label">Link Gambar</label>
                    </div>
                    <div class="row">
                        <input type="text" name="link" class="form-control col-md-10 offset-1"
                               value="<?php echo $barang->image_barang ?>" required>
                    </div>
                    <br>

                    <input type="hidden" name="id_spek" value="<?php echo $spesifikasi->id_spesifikasi; ?>">

                    <div class="row">
                        <label class="col-md-5 offset-1 control-label">Spesfifikasi</label>
                    </div>
                    <div class="row">
            <textarea rows="5" cols="50" name="spek" class="form-control col-md-10 offset-1" type="text"
                      required><?php echo $spesifikasi->rincian_spesifikasi ?>
            </textarea>
                    </div>
                    <br>

                    <br>
                    <div class="row" align="center">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-success col-md-6">Update Product
                                </button>
                            </div>
                        </div>
                    </div>

                </form>
                <div class="row" align="center">
                    <div class="col-md-12">
                        <a href="<?php echo base_url('parts/detail_barang/') . $barang->id_barang ?>">
                            <button class="btn btn-warning col-md-6">Cancel</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>


</body>
</html>