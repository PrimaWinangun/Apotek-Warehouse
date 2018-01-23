<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bukti Keluar Barang Incoming | PT Dharma Bandar Mandala Batam</title>
<style type="text/css">
html {
	margin : 0px;
}
table.gridtable {
	font-family: times,arial,sans-serif;
	font-size:9px;
	width: 6.700cm; 
	
}
table.gridtable td {
	padding: 0px;
	text-align: left;
}
</style>

</head>
<body>
<table class="gridtable">
<?php foreach($detail as $row)
{ ?>
	<tr>
		<td colspan="3" style="font-size:250%" align="center" width="6.700cm"><strong>Apotek Kamaduk</strong></td>
	</tr>
	<tr>
		<td colspan="3" align="center">Rumah Sakit Sanglah Denpasar</td>
	</tr>
	<tr>
		<td colspan="3" align="center"><hr/></td>
	</tr>
	<tr>
		<td colspan="3" align="center">Bukti Pembayaran</td>
	</tr>
	<tr>
		<td colspan="3" align="center"><?php echo $trans_detail->pay_code?></td>
	</tr>
	<tr>
		<td colspan="3" align="center"><hr/></td>
	</tr>
	<tr>
		<td colspan="3"></td>
	</tr>
	
	<tr>
		<td>Tanggal</td><td colspan="2">: <?php echo date('d-m-Y', strtotime($trans_detail->paid_date));?></td>
	</tr>
    <tr>
    	<td>Kasir</td><td colspan="2">: <?php echo $trans_detail->transaction_by;?></td>
    </tr>
<?php } ?>
</table>	
	
<table class="gridtable">
	<tr>
		<td colspan="5"><center><hr/></center></td>
	</tr>
	<tr>
		<td rowspan="3">No</td>
		<td rowspan="3">Jumlah</td>
		<td colspan="3"><center>Item</center></td>
	</tr>
	<tr>
		<td colspan="3"><center><hr/></center></td>
	</tr>
	<tr>
		<td width="23%">AKTUAL</td>
		<td>PxLxT</td>
		<td>VOL</td>
	</tr>
	
	<tr>
		<td><?php echo "TOTAL"; ?></td>
		<td><?php echo $total_koli ?></td>
		<td><?php echo $total_berat; ?></td>
		<td><?php echo "0x0x0"; ?></td>
		<td><?php echo "0"; ?></td>
	</tr>
	<tr>
		<td colspan="5"><center><hr/></center></td>
	</tr>
    <tr>
		<td colspan="5">&nbsp;</td>
	</tr>
    <tr>
		<td colspan="5">Petugas Inbound</td>
	</tr>
    <tr>
		<td colspan="5">&nbsp;</td>
	</tr>
    <tr>
		<td colspan="5"><?php echo $row_berat->indtb_update_by; ?></td>
	</tr>
</table>
</body>
</html>
