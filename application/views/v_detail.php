<div class="container">
    <h1 class="section-title text-center">Detail Product</h1>
    <a href="<?php echo base_url('parts/all') ?>">
        <button class="btn btn-warning">Back</button>
    </a>
    <br>
    <br>
    <div class="card">
        <div class="container-fliud">
            <div class="wrapper row">
                <div class="preview col-md-6">
                    <div class="preview-pic tab-content">
                        <div class="tab-pane active" id="pic-1">
                            <img style="object-fit: cover"
                                 src="<?php echo $result->image_barang; ?>"
                                 height="450px"
                                 width="500px"/>
                        </div>
                    </div>

                </div>
                <div class="details col-md-6">
                    <br>
                    <br>
                    <h3 class="product-title">
                        <?php echo $result->nama_barang; ?>
                    </h3>

                    <h4 class="product-title">
                        <?php echo $result->merk_barang; ?>
                    </h4>

                    <p class="specification">
                        <?php echo $spesifikasi->rincian_spesifikasi; ?>
                    </p>

                    <h4 class="price">Harga:
                        <span><?php echo $result->harga_barang; ?></span>
                    </h4>
                    <h4 class="price">Stok :
                        <span><?php echo $result->stok_barang; ?></span>
                    </h4>
                    <br>
                    <div class="row">
                        <div class="col-md">
                            <a class="btn btn-primary" href="<?php echo base_url('parts/update/') . $result->id_barang ?>">
                                Update Product
                            </a>
                            <a class="btn btn-success" href="<?php echo base_url('parts/detail_crud/') . $result->id_barang ?>">
                                Detail Stok
                            </a>
                        </div>
                        <div class="col-md-4">
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteConfirmation">
                                Hapus Barang
                            </button>
                            <div class="modal fade" id="deleteConfirmation" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteConfirmationTitle">Konfirmasi</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Anda yakin ingin menghapus barang ini?<br>
                                            Semua data stok dan spesifikasi tentang barang ini juga akan hilang
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                            <a class="btn btn-danger" href="<?php echo base_url('parts/proses_hapus_barang/') . $result->id_barang ?>">
                                                Hapus
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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