<?php include('wp-content/themes/apt-whz/modules/apt/templates/header.php'); ?>
 <!-- Content -->
    <div class="content">
        <div class="title"><h5>List of Supplier</h5></div>
		<div class="widgets">
			<div class="left">
			<form action="<?php echo base_url()?>setting/application/input_supplier" method="post" accept-charset="utf-8" class="mainForm">
            <fieldset>
				 <div class="widget first">
                    <div class="head"><h5 class="iList">Input Form</h5></div>
                        <div class="rowElem"><label>Nama:</label><div class="formLeft" style="width:53%"><input type="text" name="name" placeholder="enter your placeholder text here"/></div><div class="fix"></div></div>
                        <div class="rowElem"><label>Alamat:</label><div class="formLeft" style="width:53%"><input type="text" name="alamat"/></div><div class="fix"></div></div>
						<div class="rowElem"><label>No Telp:</label><div class="formLeft onlyNums" style="width:53%"><input type="text" name="telp" /></div><div class="fix"></div></div>
                       <input type="submit" value="Submit form" class="greyishBtn submitForm" />
                        <div class="fix"></div>

                </div>
			</fieldset>
			</form>
			</div>
		<div class="middle">
       <!-- Form begins --><!-- Static table -->
        <div class="widget first">
        	<div class="head"><h5 class="iFrames">Data</h5></div>
            <table cellpadding="0" cellspacing="0" width="100%" class="tableStatic">
            	<thead>
                	<tr>
                        <td>Nama</td>
                        <td>Alamat</td>
                        <td>No. Telp</td>
                        <td width="20%">Action</td>
                    </tr>
                </thead>
                <tbody>
				<?php foreach($supplier as $row) {?>
                	<tr>
                        <td><?php echo ucfirst($row->sup_name)?></td>
                        <td><?php echo ucfirst($row->sup_alamat)?></td>
                        <td align="center"><?php echo $row->sup_telp?></td>
                        <td align="center"><?php echo anchor('setting/application/edit_data/'.$row->id_supplier,'edit').' | '. anchor('setting/application/void_data/'.$row->id_supplier,'void');?>
						</td>
                    </tr>
				<?php } ?>
                </tbody>
				<tfoot>
				<tr><td colspan="4" align="center">
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
