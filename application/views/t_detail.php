<br>
<h1 class="container" style="text-align: center; color: white">Daftar Detail Barang</h1>
<br>
<div class="container">

	<table class="table table-hover">
		<thead>
		<tr style="color: white">
			<th scope="col">ID Barang</th>
			<th scope="col">Nomor Seri</th>
			<th scope="col">Status Detail</th>
			<th scope="col">Keterangan</th>
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
			<th scope="row" class="p-4"><?php echo $row->ID_BARANG;?></th>
			<td class="p-4"><?php echo $row->NOMOR_SERI_DETAIL;?></td>
			<td class="p-4"><?php echo $row->STATUS_DETAIL;?></td>
			<td class="p-4"><?php echo $row->KETERANGAN_DETAIL;?></td>
			<td>
				<a href="#" class="btn btn-warning">Edit</a>
			</td>
			<td>
				<a href="http://localhost:8080/TP3/welcome/deleton_detail/<?php echo $row->ID_DETAIL_BARANG;?>" class="btn btn-danger">Delete</a>
			</td>
		</tr>
		</tbody>

<?php
	}

?>
	</table>

</div>
