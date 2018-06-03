<center><h1 class="section-title">Update Stock</h1></center>
<div class="container">
  <div class="row">
    <div class="col-md-10 offset-1">
      <div class="jumbotron">
<<<<<<< HEAD
=======
        <?php print_r($detail) ?>
>>>>>>> 820239f04db15ed8f2a14415dfa65b123bda763b
        <form method="post" action="<?php echo site_url('parts/proses_update_detail'); ?>">
          <div>
            <label class="offset-1 control-label">ID Stock</label>
          </div>
          <div>
<<<<<<< HEAD
            <input type="text" name="id_detail" class="form-control offset-1" value="<?php echo $detail->id_detail_barang; ?>" style="width: 700px" readonly>
=======
            <input type="text" name="id_detail" class="form-control offset-1" value="<?php echo $detail->id_detail_barang; ?> style="width: 700px" readonly>
>>>>>>> 820239f04db15ed8f2a14415dfa65b123bda763b
          </div>

          <div>
            <label class="offset-1 control-label">ID Product</label>
          </div>
          <div>
<<<<<<< HEAD
            <input type="text" name="id_product" class="form-control offset-1" value="<?php echo $detail->id_barang; ?>" style="width: 700px" readonly>
=======
            <input type="text" name="id_product" class="form-control offset-1" value="<?php echo $barang->id_barang; ?>" style="width: 700px" readonly>
>>>>>>> 820239f04db15ed8f2a14415dfa65b123bda763b
          </div>

          <div>
            <label class="offset-1 control-label">Nomor Seri Product</label>
          </div>
          <div>
<<<<<<< HEAD
            <input type="text" name="no_seri" class="form-control offset-1" value="<?php echo $detail->nomor_seri_detail; ?>" style="width: 700px" readonly>
=======
            <input type="text" name="no_seri" class="form-control offset-1" value="<?php echo $detail->nomor_seri_detail; ?> style="width: 700px" readonly>
>>>>>>> 820239f04db15ed8f2a14415dfa65b123bda763b
          </div>  

          <div>
            <label class="offset-1 control-label">Status Product</label>
          </div>
          <div>
<<<<<<< HEAD
            <input type="text" name="status" class="form-control offset-1" value="<?php echo $detail->status_detail; ?>" style="width: 700px" required>
=======
            <input type="number" name="status" class="form-control offset-1" style="width: 700px" required>
>>>>>>> 820239f04db15ed8f2a14415dfa65b123bda763b
          </div>

          <div>
            <label class="offset-1 control-label">Keterangan</label>
          </div>
          <div>
<<<<<<< HEAD
            <input type="text" name="ket" class="form-control col-md-10 offset-1" value="<?php echo $detail->keterangan_detail; ?>" style="width: 700px" required>
=======
            <input type="text" name="ket" class="form-control col-md-10 offset-1" style="width: 700px" required>
>>>>>>> 820239f04db15ed8f2a14415dfa65b123bda763b
          </div>
          
          <div class="row" align="center">
            <div class="col-md-12">
              <div class="form-group">
<<<<<<< HEAD
                <button type="submit" name="submit" class="btn btn-success col-md-6">Update</button>
                <br>
                <br>
                <a href="<?php echo base_url('parts/detail_crud/').$detail->id_barang; ?>">
=======
                <button type="submit" name="submit" class="btn btn-success col-md-6">Add</button>
                <br>
                <br>
                <a href="<?php echo base_url('parts/detail_crud/').$barang->id_barang; ?>">
>>>>>>> 820239f04db15ed8f2a14415dfa65b123bda763b
                  <button type="button" class="btn btn-warning col-md-6">Cancel</button>
                </a>
              </div>
            </div>
          </div>

        </form>
<<<<<<< HEAD
=======
        <div class="row" align="center">
          <div class="col-md-12">
            <a href="<?php echo base_url('parts/detail_barang/').$barang->id_barang ?>"><button class="btn btn-warning col-md-6">Cancel</button></a>
          </div>
        </div>
>>>>>>> 820239f04db15ed8f2a14415dfa65b123bda763b
      </div>
    </div>
  </div>
</div>
<br>
<br>


</body>
</html>