<center><h1 class="section-title">Detail Log</h1></center>
<div class="container">
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">ID Barang</th>
            <th scope="col">Nomor Seri</th>
            <th scope="col">Waktu</th>
            <th scope="col">Status Lama</th>
            <th scope="col">Status Baru</th>
        </tr>
    </thead>

<?php

    //var_dump($detail);
    foreach ($detail as $row){

?>

        <tbody>
        <tr class="table-info">
            <th scope="row" class="p-4"><?php echo $row->id_barang;?></th>
            <td class="p-4"><?php echo $row->nomor_seri_detail;?></td>
            <td class="p-4"><?php echo $row->waktu;?></td>
            <td class="p-4"><?php echo $row->status_lama;?></td>
            <td class="p-4"><?php echo $row->status_baru;?></td>
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
