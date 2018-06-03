	

	<?php echo form_open_multipart('http://localhost:8080/TP3/parts/editon');?>	
		<div class="container">
			<div class="row justify-content-center p-2">
				<div class="col-6 text-center">
					<h1 style="text-align: center; color: white">Edit Barang</h1>
				</div>
			</div>
			<div class="row justify-content-center p-2">
				<div class="col-1 text-center" style="color: white">
					Harga
				</div>
				<div style="text-align: center;">
					<input type="text" name="judul" required>
				</div>
			</div>
			<div class="row justify-content-center p-2">
				<div class="col-1 text-center" style="color: white">
					Stok
				</div>
				<div style="text-align: center;">
					<input type="text" name="jenis" required>
				</div>
			</div>
				<div style="text-align: center;">
					<input type="Submit" name="submit" class="btn btn-success">
				</div>
			</div>
		</div>
	</form>
