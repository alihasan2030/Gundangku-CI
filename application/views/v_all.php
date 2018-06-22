<!--     <meta name="viewport" content="width=device-width">

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/normalize.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/animate.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/templatemo_misc.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/templatemo_style.css') ?>"> -->

 </head>
 <body background="../images/bg.png">
 <div id="products" class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="section-title">Products</h1>
                </div> <!-- /.col-md-12 -->
            </div> <!-- /.row -->
            <a href="<?php echo base_url('parts/tambah') ?>"><button class="btn btn-success">Add New Product</button>
                <br><br>
            <div class="row">

                <?php foreach ($barang as $row) {?> 
                <div class="col-md-3 col-sm-6">
                    <div class="product-item">
                        <div class="item-thumb">
                            <div class="overlay">
                                <div class="overlay-inner">
                                    <?php $id = $row->id_barang ?>
                                    <a href='<?php echo base_url('parts/detail_barang/').$id?>' class="view-detail">Detail</a> <!-- click ke detail -->
                                </div>
                            </div> <!-- /.overlay -->
                            <img style="object-fit: cover" width="230px" height="230px" src='<?php echo $row->image_barang; ?>' alt="">
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