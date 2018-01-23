<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Apotek Kamaduk | List Item</title>

<style type="text/css">
html {
	margin : 10px;
}

table.gridtable {
	font-family: times,arial,sans-serif;
	font-size:14px;
	color:#333333;
	border-width: 1px;
	border-color: #666666;
	border-collapse: collapse;
	margin-top:10px;
	margin-bottom:2px;
	border-top: 1px solid;
	height:auto;
	
}
table.gridtable th {
	border-width: 1px;
	padding: 4px;
	border-style: solid;
	border-color: #666666;
	background-color: #eee;
	height:auto;
	border-bottom:1px solid;
	border-top:1px solid;
}
table.gridtable td {
	border-width: 1px;
	padding: 2px;
	border-style: solid;
	border-color: #666666;
	border-bottom: 1px solid;
	background-color: #ffffff;
	text-align: left;
	height:auto;
}
</style>


</head>
<body>
	<table>
        <tr>
			<td width="40%" colspan="3"><strong>Apotek Kamaduk</strong></td>
		</tr>
		<tr>
            <td><strong>List Item</strong></td><td> : </td><td><strong><?php echo $jenis?></strong></td>
		</tr>
	</table>				
	<table class="gridtable" width="100%">
			<tr>
				<th rowspan="2">No</th>
				<th rowspan="2">Nama</th>
				<th rowspan="2">Jenis</th>
				<th rowspan="2">Jumlah</th>
				<th colspan="2">Discount</th>
				<th colspan="3">Harga (per Satuan Jumlah)</th>
				<th rowspan="2">Supplier</th>
			</tr>
			<tr>
				<th>%</th><th>Rp</th>
				<th></th><th>Beli</th><th>Jual</th>
			</tr>
		<?php
		$no = 1;
		foreach($obat as $row) {?>
                	<tr>
						<td><div align="center"><?php echo $no++?></div></td>
                        <td><div align="center"><?php echo ucfirst($row->obt_name)?></div></td>
                        <td><div align="center"><?php echo ucfirst($row->apt_jenis)?></div></td>
                        <td><div align="right" style="margin-right:10px"><?php echo $row->obt_jumlah?></div></td>
                        <td><div align="right" style="margin-right:10px"><?php echo number_format($row->obt_discount,2,',','.')?></div></td>
                        <td><div align="right" style="margin-right:10px"><?php echo number_format($row->obt_discount_rp,2,',','.')?></div></td>
                        <td>Rp.</td>
                        <td><div align="right" style="margin-right:10px"><?php echo number_format($row->obt_harga,2,',','.')?></div></td>
                        <td><div align="right" style="margin-right:10px"><?php echo number_format($row->obt_jual,2,',','.')?></div></td>
                        <td><div align="right" style="margin-right:10px"><?php echo ucfirst($row->obt_supplier)?></div></td>
                        
                    </tr>
				<?php } ?>
    </table>
</body>
</html>
