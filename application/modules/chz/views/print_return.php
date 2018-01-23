<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title; ?></title>
<style type="text/css">
html {
	margin : 0px;
}
table.gridtable {
	font-family: times,arial,sans-serif;
	font-size:9px;
	width: 6.800cm; 
	
}
table.gridtable td {
	padding: 0px;
	text-align: left;
}
</style>

</head>
<body>
<table class="gridtable">
	<tr>
		<td colspan="3" align="center"  style="font-size:200%" ><strong>Apotek Kamaduk</strong></td>
	</tr>
	<tr>
		<td colspan="3" align="center" >Rumah Sakit Sanglah - Denpasar</td>
	</tr>
	<tr>
		<td colspan="3" align="center" >Telp :(0361) </td>
	</tr>
	<tr>
		<td colspan="3" align="center" ></td>
	</tr>
</table>
<table class="gridtable">
	<tr>
		<td colspan="4" align="center" ><hr/></td>
	</tr>
    <tr>
		<td width="30%">No. Struk</td><td width="10%">:</td><td colspan="2"><?php echo $trans_detail->pay_code; ?></td>
	</tr> 
	<tr>
		<td width="30%">Pembeli</td><td width="10%">:</td><td colspan="2"><?php echo $trans_detail->bill_name; ?></td>
	</tr> 
	<tr>
		<td>Kasir</td><td>:</td><td colspan="2"><?php echo ucfirst($trans_detail->transaction_by); ?></td>
	</tr>
	<tr>
		<td>Tanggal</td><td>:</td><td colspan="2"><?php echo date('d-m-Y', strtotime($trans_detail->paid_date)); ?></td>
	</tr>
</table>
<table class="gridtable">
	<tr>
		<td colspan="5"></td>
	</tr>
	<tr>
		<td align="center" width="10%">NO</td>
		<td align="center" width="26%">PRODUK</td>
		<td align="center" width="12%">JML</td>
		<td align="center" width="22%">HARGA</td>
		<td align="center" width="28%">SUBTOTAL</td>
	</tr>
	<tr>
		<td align="center" colspan="5"><hr/></td>
	</tr>
	<?php 
	$no = 1;
	foreach($detail as $item) { ?>
	<tr>
		<td align="center" width="10%"><?php echo $no++?></td>
		<td align="center" width="26%"><?php echo $item->obt_name?></td>
		<td align="center" width="12%"><?php echo $item->aptd_jum?></td>
		<td align="right" width="24%"><?php echo number_format($item->aptd_harga,2,',','.')?></td>
		<td align="right" width="28%"><?php echo number_format($item->aptd_harga*$item->aptd_jum,2,',','.')?></td>
	</tr>	
	<?php } ?>
	<tr>
		<td colspan="5" align="center"></td>
	</tr>
	<tr>
		<td colspan="5" align="center"><hr></td>
	</tr>
	<tr>
		<td colspan="4">Discount</td>
		<td align="right"><?php echo number_format($trans_detail->discount,2,',','.')?></td>
	</tr><tr>
		<td colspan="4">Total</td>
		<td align="right"><?php echo number_format($trans_detail->total-$trans_detail->discount,2,',','.')?></td>
	</tr><tr>
		<td colspan="4">Bayar</td>
		<td align="right"><?php echo number_format($trans_detail->paid_amount,2,',','.')?></td>
	</tr>
	<tr>
		<td colspan="5" align="center"><hr></td>
	</tr><tr>
		<td colspan="4">Kembalian</td>
		<td align="right"><?php echo number_format($trans_detail->paid_amount-$trans_detail->total+$trans_detail->discount,2,',','.')?></td>
	</tr>
</table>
<table class="gridtable">
	
    <tr>
		<td colspan="6">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="6" height="10px"></td>
	</tr>
	<tr>
		<td colspan="6" align="center">Terima Kasih Atas Kunjungan Anda</td>
	</tr>
</table>
</body>
</html>