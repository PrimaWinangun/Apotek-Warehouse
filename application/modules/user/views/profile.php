<?php include('wp-content/themes/apt-whz/modules/apt/templates/header.php'); ?>
 <!-- Content -->
    <div class="content">
    	<div class="title"><h5>User Profile</h5></div>
       <!-- Form begins -->
	   <div class="twoOneLeft">
        <form action="<?php echo base_url()?>user/login/update_user" method="post" accept-charset="utf-8" class="mainForm">
        
        	<!-- Input text fields -->
            <fieldset>
                <div class="widget first">
                    <div class="head"><h5 class="iList">Input Form</h5></div>
                        <div class="rowElem"><label>Nama:</label><div class="formLeft"><input type="text" name="nama" value="<?php echo $profile->ur_nama?>"/></div><div class="fix"></div></div>
                        <div class="rowElem"><label>Username:</label><div class="formLeft"><input type="text" name="username" value="<?php echo $profile->ur_username?>"/></div><div class="fix"></div></div>
                        <div class="rowElem"><label>Password:</label><div class="formLeft"><input type="password" name="password"/></div><div class="fix"></div></div>
                        <div class="rowElem"><label>Email:</label><div class="formLeft">
                        <input type="text" class="validate[required,custom[email]]" name="email" id="email" value="<?php echo $profile->ur_email?>"/></div><div class="fix"></div></div>
                        <div class="rowElem"><label>Nomor Telp:</label><div class="formLeft onlyNums"><input type="text" name="telp" value="<?php echo $profile->ur_telpon?>"/></div><div class="fix"></div></div>
						<?php if ($profile->ur_level == 'admin')
						{ ?>
							<div class="rowElem"><label>Jabatan:</label><div class="formLeft"><input type="text" name="jabatan" value="<?php echo $profile->ur_nama?>"/></div><div class="fix"></div></div>
						<?php }?>
                        <input type="submit" value="Edit" class="greyishBtn submitForm" />
                        <div class="fix"></div>

                </div>
            </fieldset>
		</form>
		</div>
	</div>
	
    <div class="fix"></div>
</div>
<?php include('wp-content/themes/apt-whz/modules/apt/templates/footer.php'); ?>
