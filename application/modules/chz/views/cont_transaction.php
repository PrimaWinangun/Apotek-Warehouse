<?php include('wp-content/themes/apt-whz/modules/apt/templates/header.php'); ?>
 <script>
	document.onload = function() {  
		document.getElementById("jumlah").focus();
	}
</script>
 <!-- Content -->
    <div class="content">
    	<div class="title"><h5>Transaction Code <?php echo $trans_detail->pay_code;?></h5></div>
       <!-- Form begins -->
        <form action="<?php echo base_url()?>chz/transaction/input_next_data" method="post" accept-charset="utf-8" class="mainForm">
        
        	<!-- Input text fields -->
            <fieldset>
                <div class="widget" style="margin:0">
                    <div class="head"><h5 class="iList">Input Form</h5></div>
                        <div class="rowElem noborder"><label>Jumlah:</label>
						<div class="formLeft" style="width:10%">
						<input type="text" name="jumlah" value="1"  id="jumlah" style="width:50%" autofocus/>
						</div><label>Discount:</label>
						<div class="formLeft" style="width:50%">
						<input type="text" name="disc" placeholder="enter barcode" style="width:10%" value="0"/> % &nbsp
						<input type="text" name="disc_rp" placeholder="enter barcode" style="width:40%" value="0"/>
						</div></div>
                        <div class="rowElem noborder"><label>Barcode/Code:</label><div class="formLeft">
						<input type="text" name="barcode" placeholder="enter barcode" style="width:80%"/>
                        <input type="submit" value="Add" class="greyishBtn submitForm"/></div><div class="fix"></div></div>
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
                        <td width="5%">Action</td>
                    </tr>
                </thead>
				<tbody>
				<?php 
				$total = 0;
				$tot_discount = 0;
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
					}
					if ($item->aptd_resep == 'yes')
					{
						$copy_receipt = 'yes';
					} else {
						$copy_receipt = 'no';
					}?>
					<tr>
                        <td align="center" width="5%"><?php echo $no++;?></td>
                        <td align="center" width="20%"><?php echo $item->aptd_code_obat;?></td>
                        <td align="center" width="20%"><?php echo $item->obt_name;?></td>
                        <td align="center"><?php echo $item->aptd_jum;?></td>
                        <td align="right"><?php echo number_format($item->obt_jual,2,',','.');?></td>
                        <td width="20%"align="right"><?php echo number_format($discount,2,',','.');?></td>
                        <td width="20%"align="right"><?php echo number_format(($item->obt_jual*$item->aptd_jum)- $discount,2,',','.') ;?></td>
                        <td align="center"><?php echo anchor('chz/transaction/void_detail/'.$item->id_apt_dtl,'Void');?></td>
						<?php 
							$total = $total + ($item->obt_jual*$item->aptd_jum) - $discount;
							$jumlah = $jumlah + $item->aptd_jum;
							$tot_discount = $tot_discount + $discount;
						?>
                    </tr>
				<?php } ?>
				</tbody>
				<tfoot>
					<tr>
                        <td colspan="6" align="center">Total</td>
                        <td colspan="2"><?php echo number_format($total,2,',','.');?></td>
                    </tr>
					<tr>
						<td colspan="6" align="right" style="padding:0"></td><td colspan="2" align="right"><a href="#openModal"><input type="submit" value="Bayar" class="greyishBtn submitForm" style="width:40%; margin:1px 16px;"/></a>
						<div id="openModal" class="modalDialog" style="padding-left:40%">
							<div class="modal-header">
							<h4 class="modal-title">Payment <?php echo ucfirst($trans_detail->pay_code)?></h4>
							</div>
							<div class="modal-body">
								<?php echo form_open('chz/transaction/pay_transaction/', 'target=_blank');
									  echo form_hidden('total', $total);
									  echo form_hidden('jumlah', $jumlah);
									  echo form_hidden('discount', $tot_discount);
									  echo form_hidden('copy', $copy_receipt);
									  #echo form_input('bayar');
									  echo '<input type="text" name="bayar" id="bayar" style=";padding:2px;" autofocus/>';
									  $options = array(
										  'CASH'  => 'CASH',
										  'CREDIT'    => 'CREDIT',
										);
									  echo form_dropdown('payment', $options, 'CASH');
									  echo form_submit('pay', 'bayar');
								?>
							</div>
							<div class="modal-footer">
								<a href="#close"><input type="button" class="redBtn" value="Cancel" id="popup_ok"></a>
							</div>
						</div></td>
					</tr>
				<?php echo form_close();?>
				</tfoot>
		</table>
		</div>
	</div>
	
    <div class="fix"></div>
</div>
<?php include('wp-content/themes/apt-whz/modules/apt/templates/footer.php'); ?>
