<?php ob_start(); ?>
<?php   include "../../class/akun.php";
        include "../../class/produk.php";
        include "../../class/Transaksi.php";
        $produk= new Produk();
        $akun = new Akun();
        $transaksi = new Transaksi();
?>
<?php if($_GET['page']=="cetak_customer"){?>
<html>
<head>
	<title>Cetak Customer PDF</title>
	<style>
		table {
			border-collapse:collapse; 
			table-layout:fixed;width: 100%;
		}
		table td {
			word-wrap:break-word;
			
		}
	</style>
</head>
<body>
	
<h1 style="text-align: center;">Data Customer Ire Book</h1>
<table border="1" width="100%">
<tr>

	<th width="22px">NO</th>
	<th>Nama </th>
	<th>Email</th>
	<th >Status</th>
	<th>Alamat</th>
	<th>No. HP</th>
	<th>Kota</th>
	<th>Jenis Kelamin</th>
	<th>Kode Pos</th>
</tr>
<?php
$no=1;
    foreach ($akun->getDataCus() as $data_cus) :?>
    <tr>
            <td><?= $no++;?></td>
            <td><?= $data_cus['nama_cus']?></td>
            <td><?= $data_cus['email_cus']?></td>
            <td><?= $data_cus['status_cus']?></td>
            <td><?= $data_cus['alamat_cus']?></td>
            <td><?= $data_cus['nohp_cus']?></td>
            <td><?= $data_cus['kota_cus']?></td>
            <td><?= $data_cus['jk_cus']?></td>
            <td><?= $data_cus['kode_pos_cus']?></td>
    </tr>

    
<?php 
    endforeach;
// }else{ // Jika data tidak ada
//     echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
// }
?>
</table>

</body>
</html>
<?php

$html = ob_get_contents();
ob_end_clean();
        
require_once('html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('Laporan Customer.pdf', 'D');
}
?>




  
<html>
<head>
	<title>Cetak Customer PDF</title>
	<style>
		table {
			border-collapse:collapse; 
			table-layout:fixed;width: 100%;
		}
		table td {
			word-wrap:break-word;
			
		}
	</style>
</head>
<body>
	
<h1 style="text-align: center;">Data Penjualan Ire Book</h1><br>
    <table  width="100%" class="table">
        <theader>
    <tr>
    
        <th width="22px">NO</th>
        <th width="40px">Kode Beli</th>
        <th width="100px">Nama Cus </th>
        <th>Total QTY</th>
        <th width="55px">Bayar</th>
        <th>Total Bayar</th>
        <th>Tanggal order</th>
        <th>Status Beli</th>
        <th>Status Pengiriman</th>
    </tr>
    </theader>
    <?php
    $no=1;
        foreach ($transaksi->getAllDataTransaksi() as $data_tran) :?>
        <tr>
                <?php $data_usr=$akun->getDetailCus($data_tran['id_cus']); ?>
                <td><?= $no++;?></td>
                <td><?= $data_tran['kode_beli']?></td>
                <td><?= $data_usr['nama_cus']?></td>
                <td><?= $data_tran['qty_total']?></td>
                <td><?= $data_tran['bayar']?></td>
                <td><?= $data_tran['total_bayar']?></td>
                <td><?= $data_tran['tgl_order']?></td>
                <td><?= $data_tran['status_beli']?></td>
                <td><?= $data_tran['status_pengiriman']?></td>
                
        </tr>
    
        
    <?php 
        endforeach;?>
    </table>

</body>
</html>

?>