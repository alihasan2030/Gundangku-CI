<center><h1 class="section-title">Update Stock</h1></center>
<div class="container">
  <div class="row">
    <div class="col-md-10 offset-1">
      <div class="jumbotron">
        <form method="post" action="<?php echo site_url('parts/proses_update_detail'); ?>">

          <input type="text" name="id_detail" class="form-control offset-1" value="<?php echo $detail->id_detail_barang; ?>" style="width: 700px" hidden>

          <div>
            <label class="offset-1 control-label">ID Product</label>
          </div>
          <div>
            <input type="text" name="id_product" class="form-control offset-1" value="<?php echo $detail->id_barang; ?>" style="width: 700px" readonly>
          </div>

          <div>
            <label class="offset-1 control-label">Nomor Seri Product</label>
          </div>
          <div>
            <input type="text" name="no_seri" class="form-control offset-1" value="<?php echo $detail->nomor_seri_detail; ?>" style="width: 700px" readonly>
          </div>  

          <div>
            <label class="offset-1 control-label">Status Product</label>
          </div>
          <div>
            <select name="status" class="form-control offset-1" style="width: 700px">
              <option value="READY">READY</option>
              <option value="PENDING">PENDING</option>
              <option value="DEFACED">DEFACED</option>
              <option value="RESERVED">RESERVED</option>
            </select>
          </div>

          <div>
            <label class="offset-1 control-label">Keterangan</label>
          </div>
          <div>
            <input type="text" name="ket" class="form-control col-md-10 offset-1" value="<?php echo $detail->keterangan_detail; ?>" style="width: 700px" required>
          </div>
          
          <div class="row" align="center">
            <div class="col-md-12">
              <div class="form-group">
                <button type="submit" name="submit" class="btn btn-success col-md-6">Update</button>
                <br>
                <br>
                <a href="<?php echo base_url('parts/detail_crud/').$detail->id_barang; ?>">
                  <button type="button" class="btn btn-warning col-md-6">Cancel</button>
                </a>
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