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
                        <div class="rowElem noborder"><label>Barcode:</label><div class="formLeft">
						<?php echo form_input('barcode',$obat->obt_barcode);?></div><div class="fix"></div></div>
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
						<div class="rowElem"><label>Harga Per Satuan:</label><div class="formLeft onlyNums"><input type="text" name="harga" id="s3" value="<?php echo $obat->obt_harga?>"/></div><div class="fix"></div></div>
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
