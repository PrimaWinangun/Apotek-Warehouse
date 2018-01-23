<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Apotek Kamaduk | Report Daily <?php echo $time?></title>

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
            <td><strong>Report Transaction Daily </strong></td><td> : </td><td><strong><?php echo $time?></strong></td>
		</tr>
	</table>	
<table class="gridtable" width="100%">
            	<thead>
                	<tr>
                        <th>Tanggal</th>
                        <th>Kode Pembayaran</th>
                        <th>Jumlah Barang</th>
                        <th>Total Transaksi</th>
                        <th>Kasir</th>
                    </tr>
                </thead>
                <tbody>
				<?php foreach($transaction as $row) {?>
                	<tr>
                        <td><div align="center"><?php echo date('d-m-Y', strtotime($row->paid_date));?></td>
                        <td><div align="center"><?php echo $row->pay_code?></td>
                        <td><div align="center"><?php echo $row->quantity?></td>
                        <td><div align="right"><?php echo number_format($row->total,2,',','.')?></td>
                        <td><div align="center"><?php echo ucfirst($row->transaction_by)?></td>
						</td>
                    </tr>
				<?php } ?>
                </tbody>
            </table>

</body>
</html>
