<center><h1 class="section-title">Detail Barang</h1></center>
<div class="container">
	<div class="button-group">
		<a href="<?php echo base_url('parts/detail_barang/').$barang->id_barang ?>"><button class="btn btn-warning">Back</button></a>
        <a href="<?php echo base_url('parts/tambah_detail/').$barang->id_barang?>"><button class="btn btn-success">Add New Stock</button></a>
	</div>
	<br><br>
	<table class="table table-hover">
		<thead>
		<tr>
			<th scope="col">ID Barang</th>
			<th scope="col">Nomor Seri</th>
			<th scope="col">Status Detail</th>
			<th scope="col">Keterangan</th>
			<th scope="col">Edit</th>
			<th scope="col">Delete</th>
		</tr>
	</thead>

<?php

	foreach ($detail as $row){

?>

		<tbody>
		<tr class="table-info">
			<th scope="row" class="p-4"><?php echo $row->id_detail_barang;?></th>
			<td class="p-4"><?php echo $row->nomor_seri_detail;?></td>
			<td class="p-4"><?php echo $row->status_detail;?></td>
			<td class="p-4"><?php echo $row->keterangan_detail;?></td>
			<td>
				<a href="<?php echo base_url('parts/update_detail/').$row->id_detail_barang ?>" class="btn btn-warning">Edit</a>
			</td>
			<td>
				<a href="<?php echo base_url('parts/proses_hapus_detail/').$row->id_detail_barang.'/'.$barang->id_barang ?>" class="btn btn-danger">Delete</a>
			</td>
		</tr>
		</tbody>

<?php
	}

?>
	</table>
	<br><br><br>
	<br><br><br>
	<br><br><br>
</div>
