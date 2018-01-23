<?php include('wp-content/themes/apt-whz/modules/apt/templates/header.php'); ?>
<script>
	document.onload = function() {  
		document.getElementById("jumlah").focus();
	}
</script>
 <!-- Content -->
    <div class="content">
    	<div class="title"><h5>New Transaction</h5></div>
       <!-- Form begins -->
        <form action="<?php echo base_url()?>chz/transaction/input_data" method="post" accept-charset="utf-8" class="mainForm">
        
        	<!-- Input text fields -->
            <fieldset>
                <div class="widget" style="margin:0">
                    <div class="head"><h5 class="iList">Input Form</h5></div>
						<div class="rowElem noborder"><label>Jumlah:</label>
						<div class="formLeft" style="width:10%">
						<input type="text" name="jumlah" id="jumlah" value="1" style="width:50%" autofocus/>
						</div><label>Discount:</label>
						<div class="formLeft" style="width:50%">
						<input type="text" name="disc" placeholder="enter barcode" style="width:10%" value="0"/> % &nbsp
						<input type="text" name="disc_rp" placeholder="enter barcode" style="width:40%" value="0"/>
						</div></div> 
						<div class="rowElem noborder" style="padding:0px 16px"><label>Nama:</label><div class="formLeft">
						<input type="text" name="nama" placeholder="Nama Pembeli" style="width:80.5%"/></div><div class="fix"></div></div>
                        <div class="rowElem noborder"><label>Barcode/Code:</label><div class="formLeft">
						<input type="text" name="barcode" placeholder="enter barcode" style="width:80.5%"/>
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
                        <td width="20%">Jumlah</td>
                        <td>Harga ( per satuan jumlah)</td>
                        <td width="20%">Total</td>
                        <td>Action</td>
                    </tr>
                </thead>
				<tbody>
				</tbody>
				<tfoot>
					<tr>
                        <td colspan="5" align="center">Total</td>
                        <td colspan="2">Total</td>
                    </tr>
				</tfoot>
		</table>
		</div>
	</div>
	
    <div class="fix"></div>
</div>
<?php include('wp-content/themes/apt-whz/modules/apt/templates/footer.php'); ?>
