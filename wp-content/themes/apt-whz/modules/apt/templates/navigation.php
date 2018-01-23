
<!-- Top navigation bar -->
<div id="topNav">
    <div class="fixed">
        <div class="wrapper">
		<?php
			$sess_data = $this->session->userdata('login_data');
		?>
            <div class="welcome"><a href="#" title=""><img src="<?php echo base_url()?>wp-content/themes/apt-whz/assets/images/userPic.png" alt="" /></a><span>Howdy, <?php echo ucfirst($sess_data->ur_nama)	?>!</span></div>
            <div class="userNav">
                <ul>
                    <li><a href="<?php echo base_url()?>user/login/profile" title=""><img src="<?php echo base_url()?>wp-content/themes/apt-whz/assets/images/icons/topnav/profile.png" alt="" /><span>Profile</span></a></li>
                    <li><a href="<?php echo base_url()?>user/login/logout" title=""><img src="<?php echo base_url()?>wp-content/themes/apt-whz/assets/images/icons/topnav/logout.png" alt="" /><span>Logout</span></a></li>
                </ul>
            </div>
            <div class="fix"></div>
        </div>
    </div>
</div>

<div style="margin-top:10px"></div>    

<!-- Content wrapper -->
<div class="wrapper">
	<?php 
		$userdata = $this->session->userdata('login_data');
	?>
	<!-- Left navigation -->
    <div class="leftNav">
    	<ul id="menu">
		<?php if ($userdata->ur_position == 'warehousing' or $userdata->ur_position == 'admin' or $userdata->ur_level == 'developer')
			{?>
        	<li class="dash"><a href="#" title="" <?php if($main_sidebar == 'warehousing'){ echo 'class="active"';} else {echo 'class="exp"';}?>><span>Warehousing</span></a>
				<ul class="sub">
                    <li><a href="<?php echo base_url()?>whz/admin/" title="" <?php if($sidebar=='whz_add_new'){ echo 'class="subactive"'; } else {echo '';} ?> >Add New</a></li>
                    <li><a href="<?php echo base_url()?>whz/admin/whz_list" title="" <?php if($sidebar=='whz_list'){ echo 'class="subactive"'; } else {echo '';}?>>List</a></li>
                    <li><a href="<?php echo base_url()?>whz/admin/report_daily" title="" <?php if($sidebar=='whz_report'){ echo 'class="subactive"'; } else {echo '';}?>>Daily Report</a></li>
                </ul>
			</li>
		<?php } ?>
		<?php if ($userdata->ur_position == 'cashier' or $userdata->ur_position == 'admin'  or $userdata->ur_level == 'developer')
			{?>
            <li class="typo"><a href="<?php echo base_url()?>chz/transaction/" title="" <?php if($main_sidebar == 'cashier'){ echo 'class="active"';} else {echo 'class="exp"';}?>><span>Cashier</span></a>
				<ul class="sub">
                    <li><a href="<?php echo base_url()?>chz/transaction/" title="" <?php if($sidebar=='chz_transaction'){ echo 'class="subactive"'; } else {echo '';} ?> >Transaction</a></li> 
					<li><a href="<?php echo base_url()?>chz/transaction/return_transaction" title="" <?php if($sidebar=='chz_return'){ echo 'class="subactive"'; } else {echo '';} ?> >Return Transaction</a></li>
                    <li><a href="<?php echo base_url()?>chz/transaction/report" title="" <?php if($sidebar=='chz_report'){ echo 'class="subactive"'; } else {echo '';}?>>Report</a></li>
                </ul>
			</li>
		<?php } ?>
			<li class="contacts"><a href="<?php echo base_url()?>user/login/profile" title="" <?php if($main_sidebar == 'user'){ echo 'class="active"';} else {echo 'class="exp"';}?>><span>User</span></a>
				<ul class="sub">
                    <li><a href="<?php echo base_url()?>user/login/profile" title="" <?php if($sidebar=='usr_profile'){ echo 'class="subactive"'; } else {echo '';} ?> >User Profile</a></li>
					<?php if ($userdata->ur_position == 'admin' or $userdata->ur_level == 'developer')
						{?>
                    <li><a href="<?php echo base_url()?>user/login/register" title="" <?php if($sidebar=='usr_register'){ echo 'class="subactive"'; } else {echo '';}?>>Register</a></li>
					<li><a href="<?php echo base_url()?>user/login/list_user" title="" <?php if($sidebar=='usr_list'){ echo 'class="subactive"'; } else {echo '';}?>>List User</a></li>
					<?php } ?>
                </ul>
			</li>
		<?php if ($userdata->ur_position == 'admin' or $userdata->ur_level == 'developer')
			{?>
			<li class="forms"><a href="<?php echo base_url()?>setting/application/supplier" title="" <?php if($main_sidebar == 'setting'){ echo 'class="active"';} else {echo 'class="exp"';}?>><span>Setting</span></a>
				<ul class="sub">
                    <li><a href="<?php echo base_url()?>setting/application/supplier" title="" <?php if($sidebar=='stg_supplier'){ echo 'class="subactive"'; } else {echo '';} ?> >Supplier</a></li>
                    <li><a href="<?php echo base_url()?>setting/application/price_rate" title="" <?php if($sidebar=='stg_pricerate'){ echo 'class="subactive"'; } else {echo '';}?>>Price Rate</a></li>
                </ul>
			</li>
		<?php } ?>
        </ul>
    </div>

