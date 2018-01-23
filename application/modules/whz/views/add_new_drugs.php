<?php include('wp-content/themes/apt-whz/modules/apt/templates/header.php'); ?>

 <!-- Content -->
    <div class="content">
    	<div class="title"><h5>Add New Item</h5></div>
       <!-- Form begins -->
	   <div class="twoOneLeft">
        <form action="<?php echo base_url()?>whz/admin/input_whz" method="post" accept-charset="utf-8" class="mainForm">
        	<!-- Input text fields -->
            <fieldset>
                <div class="widget first">
                    <div class="head"><h5 class="iList">Input Form</h5></div>
                        <div class="rowElem"><label>Jenis:</label>
						<div class="formLeft noSearch">
                        <select name="jenis" class="chzn-select">
						<?php foreach($jenis as $row) {?>
                            <option value="<?php echo $row->apt_code;?>"><?php echo $row->apt_jenis;?></option>
						<?php } ?>
                        </select>
                        </div><div class="fix"></div></div>
                        <div class="rowElem"><label>Nama:</label><div class="formLeft"><input type="text" name="name" placeholder="nama item"/></div><div class="fix"></div></div> 
						<div class="rowElem"><label>Kode:</label><div class="formLeft"><input type="text" name="code" placeholder="kode item"/></div><div class="fix"></div></div>
                        <div class="rowElem"><label>Jumlah:</label><div class="formLeft onlyNums"><input type="text" name="jumlah"/></div><div class="fix"></div></div>
						<div class="rowElem"><label>Expired:</label><div class="formLeft"><input type="text" class="maskDate" id="maskDate" name="expired" value="value" /></div><div class="fix"></div></div>
						<div class="rowElem"><label>Harga Beli Per Satuan:</label><div class="formLeft onlyNums"><input type="text" name="harga" id="s3"/></div><div class="fix"></div></div>
                        <div class="rowElem"><label>Discount:</label><div class="formLeft"><input type="text" name="disc" style="width:15%"/> % &nbsp <input type="text" name="disc_rp" style="width:76%" placeholder="discount dalam rupiah"/></div><div class="fix"></div></div>
                        <div class="rowElem"><label>Supplier:</label>
						<div class="formLeft searchDrop">
                        <select name="supplier" class="chzn-select">
						<?php foreach($supplier as $row) {?>
                            <option value="<?php echo $row->sup_name;?>"><?php echo $row->sup_name;?></option>
						<?php } ?>
						</select>
						</div><div class="fix"></div></div>
                        <div class="rowElem"><label>Barcode:</label><div class="formLeft"><?php echo form_input('barcode');?></div><div class="fix"></div></div>
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
