<br>
<h1 class="container" style="text-align: center; color: white">Daftar Barang</h1>
<br>
<div class="container">

	<table class="table table-hover">
		<thead>
		<tr style="color: white">
			<th scope="col">Nama Barang</th>
			<th scope="col">Merek</th>
			<th scope="col">Harga</th>
			<th scope="col">Stok</th>
			<th scope="col">Edit</th>
			<th scope="col">Delete</th>
		</tr>
	</thead>

<?php

	foreach ($query as $row)
	{

?>

		<tbody>
		<tr class="table-info">
			<th scope="row" class="p-4"><?php echo $row->NAMA_BARANG;?></th>
			<td class="p-4"><?php echo $row->MERK_BARANG;?></td>
			<td class="p-4"><?php echo $row->HARGA_BARANG;?></td>
			<td class="p-4"><?php echo $row->STOK_BARANG;?></td>
			<td>
				<a href="#" class="btn btn-warning">Edit</a>
			</td>
			<td>
				<a href="http://localhost:8080/TP3/parts/deleton/<?php echo $row->ID_BARANG;?>" class="btn btn-danger">Delete</a>
			</td>
		</tr>
		</tbody>

<?php
	}

?>
	</table>

</div>
