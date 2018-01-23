<?php include('wp-content/themes/apt-whz/modules/apt/templates/header.php'); ?>
 <!-- Content -->
    <div class="content">
    	<div class="title"><h5>Edit Detail</h5></div>
       <!-- Form begins -->
	   <div class="twoOneLeft">
        <form action="<?php echo base_url()?>whz/admin/input_edit/<?php echo $this->uri->segment(4)?>" method="post" accept-charset="utf-8" class="mainForm">
        	<!-- Input text fields -->
            <fieldset>
                <div class="widget first">
                    <div class="head"><h5 class="iList">Input Form</h5></div>
                        <div class="rowElem"><label>Jenis:</label>
						<div class="formLeft noSearch">
                        <select name="jenis" class="chzn-select">
						<?php foreach($jenis as $row) {?>
                            <option value="<?php echo $row->apt_code;?>" <?php if ($obat->obt_jenis == $row->apt_code){ echo 'selected=selected';}?>><?php echo $row->apt_jenis;?></option>
						<?php } ?>
                        </select>
                        </div><div class="fix"></div></div>
                        <div class="rowElem"><label>Nama:</label><div class="formLeft"><input type="text" name="name" placeholder="enter your placeholder text here" value="<?php echo $obat->obt_name?>"/></div><div class="fix"></div></div>
                        <div class="rowElem"><label>Jumlah:</label><div class="formLeft onlyNums"><input type="text" name="jumlah" maxlength="6" value="<?php echo $obat->obt_jumlah?>"/></div><div class="fix"></div></div>
						<div class="rowElem"><label>Expired:</label><div class="formLeft"><input type="text" class="maskDate" id="maskDate" name="expired" value="<?php echo date('d/m/Y', strtotime($obat->obt_expired))?>" /></div><div class="fix"></div></div>
						<div class="rowElem"><label>Harga Beli Per Satuan:</label><div class="formLeft onlyNums"><input type="text" name="harga" id="s3" value="<?php echo $obat->obt_harga?>"/></div><div class="fix"></div></div>
                        <div class="rowElem noborder"><label>Discount:</label><div class="formLeft"><input type="text" name="disc" style="width:15%" value="<?php echo $obat->obt_discount?>"/> % &nbsp <input type="text" name="disc_rp" style="width:76%" placeholder="discount dalam rupiah" value="<?php echo $obat->obt_discount_rp?>"/></div><div class="fix"></div></div>
						<div class="rowElem"><label>Harga Jual Per Satuan:</label><div class="formLeft"><input type="text" name="jual" id="s3" value="<?php echo $obat->obt_jual?>"/></div><div class="fix"></div></div> <div class="rowElem"><label>Supplier:</label>
						<div class="formLeft searchDrop">
                        <select name="supplier" class="chzn-select">
						<?php foreach($supplier as $row) {?>
                            <option value="<?php echo $row->sup_name;?>" <?php if ($obat->obt_supplier == $row->sup_name){ echo 'selected=selected';}?>><?php echo $row->sup_name;?></option>
						<?php } ?>
						</select>
						</div><div class="fix"></div></div>
                        <div class="rowElem noborder"><label>Barcode:</label><div class="formLeft">
						<?php echo form_input('barcode',$obat->obt_barcode);?></div><div class="fix"></div></div>
                        <input type="submit" value="Submit form" class="greyishBtn submitForm" />
                        <div class="fix"></div>

                </div>
            </fieldset>
		</form>
		</div>
	</div>
	
    <div class="fix"></div>
</div>
<?php include('wp-content/themes/apt-whz/modules/apt/templates/footer.php'); ?>
