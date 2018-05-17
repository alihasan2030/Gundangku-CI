<!DOCTYPE html>
<html>
<head>
	<title>View</title>
</head>
<body>
	<table border="1">
		<thead>
			<tr>
				<td>ID BARANG</td>
				<td>ID KATEGORI</td>
				<td>ID PENGGUNA</td>
				<td>NAMA</td>
				<td>MERK</td>
				<td>HARGA</td>
				<td>STOK</td>
				<td>AKSI</td>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($mahasiswa as $value) { ?>
				<tr>
					<td><?php echo $value->id_barang; ?></td>
					<td><?php echo $value->xid_kategori; ?></td>
					<td><?php echo $value->xid_pengguna; ?></td>
					<td><?php echo $value->nama_barang; ?></td>
					<td><?php echo $value->merk_barang; ?></td>
					<td><?php echo $value->harga_barang; ?></td>
					<td><?php echo $value->stok_barang; ?></td>
					<td><a href="<?php echo site_url('mahasiswa/deleteBarang/'.$value->id_barang); ?>"><span class="btn btn-outline-primary">Hapus</span></a></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</body>
</html>