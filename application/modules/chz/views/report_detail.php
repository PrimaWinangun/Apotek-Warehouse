<?php include('wp-content/themes/apt-whz/modules/apt/templates/header.php'); ?>
 <!-- Content -->
    <div class="content">
    	<div class="title"><h5>Transaction Code <?php echo $trans_detail->pay_code;?></h5></div>
       <!-- Form begins -->
        <form action="<?php echo base_url()?>chz/transaction/input_next_data" method="post" accept-charset="utf-8" class="mainForm">
        
        	<!-- Input text fields -->
            <fieldset>
                <div class="widget" style="margin:0">
                    <div class="head"><h5 class="iList">Detail Transaction</h5></div>
                        <div class="rowElem noborder"><label>Payment Code:</label><div class="formLeft"><?php echo $trans_detail->pay_code;?></div></div>
                        <div class="rowElem noborder"><label>Transaction By:</label><div class="formLeft"><?php echo ucfirst($trans_detail->transaction_by);?></div></div>
                        <div class="fix"></div>

                </div>
            </fieldset>
		</form>
		<table cellpadding="0" cellspacing="0" width="100%" class="tableMod">
            	<thead>
                	<tr>
                       <td width="5%">No</td>
                        <td width="20%">Barcode</td>
                        <td width="20%">Nama</td>
                        <td>Jumlah</td>
                        <td>Harga ( per satuan jumlah)</td>
                        <td>Discount</td>
                        <td width="20%">Total</td>
                    </tr>
                </thead>
				<tbody>
				<?php 
				$total = 0;
				$jumlah = 0;
				$no = 1;
				foreach($trans_item as $item) {
				$discount = 0;
					if ($item->aptd_disc == 0)
					{
						$discount = $item->aptd_disc_rp;
					} else 
					if ($item->aptd_disc_rp == 0)
					{
						$discount = $item->aptd_disc * $item->obt_jual / 100;
					}?>
					<tr>
                        <td align="center" width="5%"><?php echo $no++;?></td>
                        <td align="center" width="20%"><?php echo $item->aptd_code_obat;?></td>
                        <td align="center" width="20%"><?php echo $item->obt_name;?></td>
                        <td align="center"><?php echo $item->aptd_jum;?></td>
                        <td align="right"><?php echo number_format($item->obt_jual,2,',','.');?></td>
                        <td width="20%"align="right"><?php echo number_format($discount,2,',','.');?></td>
                        <td width="20%"align="right"><?php echo number_format(($item->obt_jual*$item->aptd_jum)- $discount,2,',','.') ;?></td>
						<?php 
							$total = $total + ($item->obt_harga*$item->aptd_jum);
							$jumlah = $jumlah + $item->aptd_jum;
						?>
                    </tr>
				<?php } ?>
				</tbody>
				<tfoot>
					<tr>
                        <td colspan="6" align="center">Total</td>
                        <td><?php echo number_format($total,2,',','.');?></td>
                    </tr>
				
				</tfoot>
		</table>
		</div>
	</div>
	
    <div class="fix"></div>
</div>
<?php include('wp-content/themes/apt-whz/modules/apt/templates/footer.php'); ?>
