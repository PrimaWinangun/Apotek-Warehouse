<?php
	$userdata = $this->session->userdata('logged_in'); 
	
	if (isset($user_access_role)){$access_role = $user_access_role;}
	else {$access_role = 0; }
?> 
 <!-- left nav -->
  <div class="left-nav">
   
    <!-- side nav -->
    <div id="side-nav">
      
      <!-- nav -->
      <ul id="nav">
        
        <li> <a href="#"> <i class="fa fa-home fa-lg"></i> DBM - Warehouse System</a> </li>
        
   			<?php if( ($access_role >= 40) OR ($userdata['ui_jabatan'] == 'btb') OR ($userdata['ui_jabatan'] == 'outbound') OR ($userdata['ui_jabatan'] == 'management') OR ($userdata['ui_jabatan'] == 'supervisor') OR ($userdata['ui_jabatan'] == 'admin') ){ ?>
			<!-- weighing -->
			<li <?php if(isset($menu_weighing)){echo $menu_weighing;} ?>> <a href="#"> <i class="fa fa-arrow-up"></i> Weighing </a>
				<ul class="sub-menu">
					<li <?php if(isset($view_input_btb)){echo $view_input_btb;} ?> ><?php echo anchor('weighing/btb', '<i class="fa fa-anchor"></i> Input BTB'); ?></li>
					<li <?php if(isset($view_list_btb)){echo $view_list_btb;} ?> ><?php echo anchor('weighing/btb/list_btb', '<i class="fa fa-book"></i> List BTB'); ?></li>
				</ul>
			</li>
			<!-- end of weighing -->
			<?php } ?>
			
			<?php if( ($access_role >= 40) OR ($userdata['ui_jabatan'] == 'outbound') OR ($userdata['ui_jabatan'] == 'management') OR ($userdata['ui_jabatan'] == 'supervisor') OR ($userdata['ui_jabatan'] == 'admin') ){ ?>
			<!-- outbound -->
			<li <?php if(isset($menu_outbound)){echo $menu_outbound;} ?>> <a href="#"> <i class="fa fa-arrow-up"></i> Outbound </a>
				<ul class="sub-menu">
					<li <?php if(isset($view_outbound_manifest)){echo $view_outbound_manifest;} ?> ><?php echo anchor('outbound/manifest', '<i class="fa fa-files-o"></i> Manifest Outbound'); ?></li>
					<li <?php if(isset($view_outbound_stockopname)){echo $view_outbound_stockopname;} ?> ><?php echo anchor('outbound/manifest/stock_opname_out', '<i class="fa fa-dropbox"></i> Stock Opname Outbound'); ?></li>
				</ul>
			</li>
			<!-- end of outbound -->
			<?php } ?>
			
			<?php if( ($access_role >= 40) OR ($userdata['ui_jabatan'] == 'administrasi') OR ($userdata['ui_jabatan'] == 'kasir') OR ($userdata['ui_jabatan'] == 'management') OR ($userdata['ui_jabatan'] == 'supervisor') OR ($userdata['ui_jabatan'] == 'admin') ){ ?>
			<!-- cashier -->
			<li <?php if(isset($menu_cashier)){echo $menu_cashier;} ?>> <a href="#"> <i class="fa fa-money"></i> Cashier </a>
				<ul class="sub-menu">
					<li <?php if(isset($view_new_payment)){echo $view_new_payment;} ?> ><?php echo anchor('cashier/payment', '<i class="fa fa-dollar"></i> New Payment'); ?></li>
					<li <?php if(isset($view_bkb)){echo $view_bkb;} ?> ><?php echo anchor('cashier/payment/list_bkb', '<i class="fa fa-dollar"></i> List BKB'); ?></li>
					<li <?php if(isset($view_my_transaction)){echo $view_my_transaction;} ?> ><?php echo anchor('cashier/payment/my_balance', '<i class="fa fa-pencil"></i> My Transaction'); ?></li>
					<li <?php if(isset($view_my_detail_transaction)){echo $view_my_detail_transaction;} ?> ><?php echo anchor('cashier/payment/my_balance_detail', '<i class="fa fa-pencil"></i> My Detail Transaction'); ?></li>
					<li <?php if(isset($view_list_db)){echo $view_list_db;} ?> ><?php echo anchor('cashier/payment/list_db', '<i class="fa fa-shopping-cart"></i>List Delivery Bill'); ?></li>
					
				</ul>
			</li>
			<!-- end of cashier -->
			<?php } ?>
			
			<?php if( ($access_role >= 40) OR ($userdata['ui_jabatan'] == 'inbound') OR ($userdata['ui_jabatan'] == 'management') OR ($userdata['ui_jabatan'] == 'supervisor') OR ($userdata['ui_jabatan'] == 'admin') ){ ?>
			<!-- inbound -->
			<li <?php if(isset($menu_inbound)){echo $menu_inbound;} ?>> <a href="#"> <i class="fa fa-arrow-down"></i> Inbound </a>
				<ul class="sub-menu">
				<li <?php if(isset($view_inbound_manifest)){echo $view_inbound_manifest;} ?>><?php echo anchor('inbound/manifest', '<i class="fa fa-files-o"></i> Manifest'); ?></li>
				<li <?php if(isset($view_inbound_instore)){echo $view_inbound_instore;} ?>><?php echo anchor('inbound/instore', '<i class="fa fa-arrow-circle-right"></i> Instore'); ?></li>
				<li <?php if(isset($view_data_instore)){echo $view_data_instore;} ?>><?php echo anchor('inbound/instore/list_data_instore', '<i class="fa fa-list-ol"></i> Data Stock Opname'); ?></li>
				<li <?php if(isset($view_inbound_btb)){echo $view_inbound_btb;} ?>><?php echo anchor('inbound/btb', '<i class="fa fa-list-ol"></i> AWB List'); ?></li>
				<li <?php if(isset($view_inbound_listbtb)){echo $view_inbound_listbtb;} ?>><?php echo anchor('inbound/btb/list_btb', '<i class="fa fa-list-ol"></i> BKB List'); ?></li>
				<li <?php if(isset($view_inbound_pickup)){echo $view_inbound_pickup;} ?>><?php echo anchor('inbound/btb/get_btb_pickup', '<i class="fa fa-archive"></i> PickUp'); ?></li>
				</ul>
			</li>
			<!-- end of inbound -->
			<?php } ?>
			
			<?php if( ($access_role >= 40) OR ($userdata['ui_jabatan'] == 'inbound') OR ($userdata['ui_jabatan'] == 'administrasi') OR ($userdata['ui_jabatan'] == 'management') OR ($userdata['ui_jabatan'] == 'supervisor') OR ($userdata['ui_jabatan'] == 'admin') ){ ?>
			<!-- report -->
			<li <?php if(isset($menu_report)){echo $menu_report;} ?>> <a href="#"> <i class="fa fa-clipboard"></i> Report </a>
				<ul class="sub-menu">
					<li <?php if(isset($view_inbound_report)){echo $view_inbound_report;} ?> ><?php echo anchor('report/daily/inbound', '<i class="fa fa-arrow-circle-down"></i> Inbound Report'); ?></li>
					<li <?php if(isset($view_outbound_report)){echo $view_outbound_report;} ?> ><?php echo anchor('report/daily/outbound', '<i class="fa fa-arrow-circle-up"></i> Outbound Report'); ?></li>
					<li <?php if(isset($view_report_comodity_inbound)){echo $view_report_comodity_inbound;} ?> ><?php echo anchor('report/operasional/comodity_inbound', '<i class="fa fa-arrow-circle-down"></i> Comodity Inbound Report'); ?></li>
					<li <?php if(isset($view_report_comodity_outbound)){echo $view_report_comodity_outbound;} ?> ><?php echo anchor('report/operasional/comodity_outbound', '<i class="fa fa-arrow-circle-up"></i> Comodity Outbound Report'); ?></li>
					<li <?php if(isset($view_summary)){echo $view_summary;} ?> ><?php echo anchor('cashier/payment/summary', '<i class="fa fa-tasks"></i>Summary Report'); ?></li>
					<li <?php if(isset($view_report_operation_inbound)){echo $view_report_operation_inbound;} ?> ><?php echo anchor('report/operasional/operation_inbound', '<i class="fa fa-arrow-circle-o-down"></i> Operasional Inbound'); ?></li>
					<li <?php if(isset($view_report_operation_outbound)){echo $view_report_operation_outbound;} ?> ><?php echo anchor('report/operasional/operation_outbound', '<i class="fa fa-arrow-circle-o-up"></i> Operasional Outbound'); ?></li>
				</ul>
			</li>
			<!-- end of report -->
			<?php } ?>
			
			<?php if( ($access_role >= 40) OR ($userdata['ui_jabatan'] == 'inbound') OR ($userdata['ui_jabatan'] == 'kasir') OR ($userdata['ui_jabatan'] == 'administrasi') OR ($userdata['ui_jabatan'] == 'management') OR ($userdata['ui_jabatan'] == 'supervisor') OR ($userdata['ui_jabatan'] == 'admin') ){ ?>
			<!-- setting -->
			<li <?php if(isset($menu_setting)){echo $menu_setting;} ?>> <a href="#"> <i class="fa fa-gear"></i> Setting </a>
				<ul class="sub-menu">
				<?php if( ($access_role >= 40) OR ($userdata['ui_jabatan'] == 'inbound') OR ($userdata['ui_jabatan'] == 'kasir') OR ($userdata['ui_jabatan'] == 'administrasi') OR ($userdata['ui_jabatan'] == 'management') OR ($userdata['ui_jabatan'] == 'supervisor') OR ($userdata['ui_jabatan'] == 'admin') ){ ?>
				<li <?php if(isset($view_setting_agent)){echo $view_setting_agent;} ?>><?php echo anchor('setting/agent', '<i class="fa fa-group"></i> Agent'); ?></li>
				<?php } ?>
				<?php if( ($access_role >= 40) OR ($userdata['ui_jabatan'] == 'inbound') OR ($userdata['ui_jabatan'] == 'administrasi') OR ($userdata['ui_jabatan'] == 'management') OR ($userdata['ui_jabatan'] == 'supervisor') OR ($userdata['ui_jabatan'] == 'admin') ){ ?>
				<li <?php if(isset($view_setting_airline)){echo $view_setting_airline;} ?>><?php echo anchor('setting/airline', '<i class="fa fa-plane"></i> Airline'); ?></li>
				<li <?php if(isset($view_setting_commodity)){echo $view_setting_commodity;} ?>><?php echo anchor('setting/commodity', '<i class="fa fa-folder"></i> Commodity'); ?></li>
				<li <?php if(isset($view_setting_destination)){echo $view_setting_destination;} ?>><?php echo anchor('setting/destination', '<i class="fa fa-road"></i> Destination'); ?></li>
				<li <?php if(isset($view_setting_goods)){echo $view_setting_goods;} ?>><?php echo anchor('setting/goods', '<i class="fa fa-rub"></i> Goods'); ?></li>
				<li <?php if(isset($view_setting_payment)){echo $view_setting_payment;} ?>><?php echo anchor('setting/payment', '<i class="fa fa-credit-card"></i> Payment'); ?></li>
				<li <?php if(isset($view_setting_rate)){echo $view_setting_rate;} ?>><?php echo anchor('setting/rate', '<i class="fa fa-ticket"></i> Rate'); ?></li>
				<li <?php if(isset($view_setting_type_agent)){echo $view_setting_type_agent;} ?>><?php echo anchor('setting/type_agent', '<i class="fa fa-circle-o"></i> Type Agent'); ?></li>
				<?php } ?>
				</ul>
			</li>
			<!-- end of setting -->
			<?php } ?>

			<?php if( ($access_role >= 40) OR ($userdata['ui_jabatan'] == 'supervisor') OR  ($userdata['ui_jabatan'] == 'admin')  ){ ?>
			<!-- menu admin -->
			<li <?php if(isset($menu_admin)){echo $menu_admin;} ?>> <a href="#"> <i class="fa fa-eye"></i> ADMIN </a>
				<ul class="sub-menu">
				<li <?php if(isset($view_admin_module)){echo $view_admin_module;} ?>><?php echo anchor('admin/module', '<i class="fa fa-book"></i> Module'); ?></li>
				<li <?php if(isset($view_admin_user)){echo $view_admin_user;} ?>><?php echo anchor('admin/user', '<i class="fa fa-users"></i> User'); ?></li>
				</ul>
			</li>
			<!-- end of admin -->
			<?php } ?>

<?php 
/*
        	<!-- temporary supervisor -->
			<li <?php if(isset($menu_supervisor)){echo $menu_supervisor;} ?>> <a href="#"> <i class="fa fa-eye"></i> Supervisor </a>
				<ul class="sub-menu">
				<li <?php if(isset($view_supervisor_temporary)){echo $view_supervisor_temporary;} ?>><?php echo anchor('supervisor/spv', '<i class="fa fa-chain"></i> Temporary Supervisor'); ?></li>
				</ul>
			</li>
			<!-- end of temporary supervisor -->
	*/
?>
			
			<!-- user management -->
			<?php if(!$this->session->userdata('logged_in')) { ?>
            <li> <a href="#"> <i class="fa fa-lock"></i> Login </a>
              <ul class="sub-menu">
                <li><?php echo anchor('user/registration', '<i class="fa fa-user"></i> Register'); ?></li>
                <li><?php echo anchor('user/pin_login', '<i class="fa fa-lock"></i> Login'); ?></li>
              </ul>
            </li>
			<?php } else { ?>
			<li > <a href="#"> <i class="fa fa-user"></i> My Profile</a> 
				<ul class="sub-menu">
					<li><?php echo anchor('user/profile', '<i class="fa fa-user"></i> My Profile'); ?></li>
					<li><?php echo anchor('user/edit/change_password', '<i class="fa fa-lock"></i> Change Password'); ?></li>
					<li><?php echo anchor('user/logout', '<i class="fa fa-unlock"></i>  Logout'); ?></li>
				</ul>
			</li>
			<?php } ?>
     		<!-- user management -->
            
           
      
      </ul>
      <!-- nav -->
      
    </div>
  	<!-- side nav -->
    
  </div>
  <!-- left nav -->
