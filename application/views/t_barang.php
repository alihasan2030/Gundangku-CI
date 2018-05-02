
<div class="container">

	<table class="table table-hover">
		<thead>
		<tr>
			<th scope="col">Nama Barang</th>
			<th scope="col">Merek</th>
			<th scope="col">Harga</th>
			<th scope="col">Stok</th>
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
				<a href="http://localhost:8080/tp/index.php/Home/deluser/<?php echo $row->username;?>" class="btn btn-danger">Delete</a>
			</td>
		</tr>
		</tbody>



<?php
	}

?>
	</table>

</div>
