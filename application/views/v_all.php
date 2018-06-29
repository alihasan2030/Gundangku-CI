<div id="products" class="content-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="section-title">Products</h1>
            </div> <!-- /.col-md-12 -->
        </div> <!-- /.row -->
        <form method="GET" action="<?php echo base_url('parts/all') ?>" class="form-inline">
            <input class="form-control mr-2" type="text" name="query" placeholder="Cari..." required>
            <button type="submit" class="btn btn-success"><span class="fa fa-search"></span></button>
        </form>
        <div class="text-right">
            <a class="btn btn-success" href="<?php echo base_url('parts/tambah') ?>">Tambah Produk Baru</a>
        </div>
        <br>
        <div class="row">

            <?php foreach ($barang as $row) { ?>
                <div class="col-md-3 col-sm-6">
                    <div class="product-item">
                        <div class="item-thumb">
                            <div class="overlay">
                                <div class="overlay-inner">
                                    <?php $id = $row->id_barang ?>
                                    <a href='<?php echo base_url('parts/detail_barang/') . $id ?>' class="view-detail">Detail</a>
                                    <!-- click ke detail -->
                                </div>
                            </div> <!-- /.overlay -->
                            <img style="object-fit: cover" width="230px" height="230px"
                                 src='<?php echo $row->image_barang; ?>' alt="">
                        </div> <!-- /.item-thumb -->
                        <h3><?php echo $row->nama_barang; ?></h3>
                        <span>Merek: <?php echo $row->merk_barang; ?></span><br>
                        <span>Harga: <?php echo $row->harga_barang; ?></span><br>
                        <span>Stok: <?php echo $row->stok_barang; ?></span><br>
                    </div> <!-- /.product-item -->
                </div> <!-- /.col-md-3 -->
            <?php } ?>
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div> <!-- /#products -->
</body>
</html>