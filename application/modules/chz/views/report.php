<?php include('wp-content/themes/apt-whz/modules/apt/templates/header.php'); ?>
 <!-- Content -->
    <div class="content">
        <div class="title"><h5>List of Database</h5></div>
		<div class="widgets">
			<div class="left">
		<!-- Search -->
                <div class="searchWidget" style="margin-top:25px;">
				<?php echo form_open('chz/transaction/chz_search')?>
                    	<input type="text" name="search" placeholder="Kode Pembayaran" />
                        <input type="submit" value="" />
                    </form>
                </div>
			</div>
		<div class="middle">
       <!-- Form begins --><!-- Static table -->
        <div class="widget first">
        	<div class="head"><h5 class="iFrames">Data</h5></div>
            <table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
            	<thead>
                	<tr>
                        <td>Tanggal</td>
                        <td>Kode Pembayaran</td>
                        <td>Jumlah Barang</td>
                        <td>Total Transaksi</td>
                        <td>Kasir</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
				<?php foreach($transaction as $row) {?>
                	<tr>
                        <td align="right"><?php echo date('d-m-Y', strtotime($row->paid_date));?></td>
                        <td align="right"><?php echo $row->pay_code?></td>
                        <td align="center"><?php echo $row->quantity?></td>
                        <td align="right"><?php echo number_format($row->total,2,',','.')?></td>
                        <td align="right"><?php echo ucfirst($row->transaction_by)?></td>
                        <td align="center"><?php echo anchor('chz/transaction/detail/'.$row->id_bill,'detail') ?>
						<!-- .' | '. anchor('chz/transaction/void_data/'.$row->id_bill,'void');?> -->
						</td>
                    </tr>
				<?php } ?>
                </tbody>
				<tfoot>
				<tr><td colspan="6" align="center">
					<div class="pagination"><?php echo $this->pagination->create_links();?></div>
				</td></tr>
				</tfoot>
            </table>
        </div>
		</div>
		</div>
	</div>
    <div class="fix"></div>
</div>
<?php include('wp-content/themes/apt-whz/modules/apt/templates/footer.php'); ?>
