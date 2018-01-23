<?php include('wp-content/themes/apt-whz/modules/apt/templates/header.php'); ?>
 <!-- Content -->
    <div class="content">
    	<div class="title"><h5>User Register</h5></div>
       <!-- Form begins -->
	   <div class="twoOneLeft">
        <form action="<?php echo base_url()?>user/login/new_user" method="post" accept-charset="utf-8" class="mainForm">
        
        	<!-- Input text fields -->
            <fieldset>
                <div class="widget first">
                    <div class="head"><h5 class="iList">Input Form</h5></div>
                        <div class="rowElem"><label>Nama:</label><div class="formLeft"><input type="text" name="nama"/></div><div class="fix"></div></div>
                        <div class="rowElem"><label>Username:</label><div class="formLeft"><input type="text" name="username"/></div><div class="fix"></div></div>
                        <div class="rowElem noborder"><label>Password:</label><div class="formLeft"><input type="password" class="validate[required]" name="password" id="password" /></div><div class="fix"></div></div>
                        <div class="rowElem"><label>Jabatan:</label><div class="formLeft">
                        <?php 
						$options = array(
							  'cashier'     => 'Kasir',
							  'warehousing' => 'Gudang',
							);
						echo form_dropdown('jabatan', $options);?></div><div class="fix"></div></div>
                        <div class="rowElem"><label>Email:</label><div class="formLeft">
                        <input type="text" value="" class="validate[required,custom[email]]" name="emailValid" id="emailValid"/></div><div class="fix"></div></div>
                        <div class="rowElem"><label>Nomor Telp:</label><div class="formLeft onlyNums"><input type="text" name="telp"/></div><div class="fix"></div></div>
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
