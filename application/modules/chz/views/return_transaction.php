<?php include('wp-content/themes/apt-whz/modules/apt/templates/header.php'); ?>

 <!-- Content -->
    <div class="content">
    	<div class="title"><h5>Return Item</h5></div>
       <!-- Form begins -->
        <form action="<?php echo base_url()?>chz/transaction/search_transaction" method="post" accept-charset="utf-8" class="mainForm">
        
        	<!-- Input text fields -->
            <fieldset>
                <div class="widget" style="margin:0">
                    <div class="head"><h5 class="iList">Input Form</h5></div>
						<div class="rowElem noborder"><label>Transaction ID :</label><div class="formLeft">
						<input type="text" name="trans_id" placeholder="enter transaction id" style="width:80.5%"/>
                        <input type="submit" value="Search" class="greyishBtn submitForm"/></div><div class="fix"></div></div>
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
				$return = '';
				$time = date('Y-m-d', now());
				if($transaction != NULL)
				{
					foreach($transaction as $item) {
						$discount = 0;
						if ($item->aptd_disc == 0)
						{
							$discount = $item->aptd_disc_rp;
						} else 
						if ($item->aptd_disc_rp == 0)
						{
							$discount = $item->aptd_disc * $item->obt_jual / 100;
						}
						$cashback = ($item->obt_jual*$item->aptd_jum)- $discount;
						if ($item->aptd_return_status == 'yes')
						{
							$return = ' <b>(return)</b>';
						}
						if(date('Y-m-d', strtotime($item->paid_date)) != $time)
						{
							$cashback = $cashback - ($cashback/10);
						}?>
						<tr>
							<td align="center" width="5%"><?php echo $no++;?></td>
							<td align="center" width="20%"><?php echo $item->aptd_code_obat.$return;?></td>
							<td align="center" width="20%"><?php echo $item->obt_name;?></td>
							<td align="center"><?php echo $item->aptd_jum;?></td>
							<td align="right"><?php echo number_format($item->obt_jual,2,',','.');?></td>
							<td width="20%"align="right"><?php echo number_format($discount,2,',','.');?></td>
							<td width="20%"align="right"><?php echo number_format($cashback,2,',','.') ;?></td>
							<td align="center">
							<?php if ($item->aptd_return_status == 'no'){ ?><?php echo '<a href="#openModal'.$item->id_apt_dtl.'">'.img(array('src'=>"wp-content/themes/apt-whz/assets/images/icons/color/plus.png", 'alt'=>'Return Item')).'</a>';?>
						<div id="openModal<?php echo $item->id_apt_dtl?>" class="modalDialog">
							<div class="modal-header">
							<h4 class="modal-title">Return Stock <?php echo ucfirst($item->obt_name)?></h4>
							</div>
							<div class="modal-body">
								<?php 
									echo form_open('chz/transaction/return_item/'.$item->id_apt_dtl);
									echo form_input('jumlah');
									echo form_submit('return','Return');
									echo form_close();
								?>
							</div>
							<div class="modal-footer">
								<a href="#close"><input type="button" class="redBtn" value="&nbsp;X&nbsp;" id="popup_ok"></a>
							</div>
						</div></td>
							<?php 
								$total = $total + ($item->obt_jual*$item->aptd_jum) - $discount;
								$jumlah = $jumlah + $item->aptd_jum;
								$tot_discount = $tot_discount + $discount;
							}?>
						</tr>
				<?php } } ?>
				</tbody>
				<tfoot>
					<tr>
                        <td colspan="6" align="center">Total</td>
                        <td colspan="2"><?php echo number_format($total,2,',','.');?></td>
                    </tr>
				</tfoot>
		</table>
		</div>
	</div>
	
    <div class="fix"></div>
</div>
<?php include('wp-content/themes/apt-whz/modules/apt/templates/footer.php'); ?>
