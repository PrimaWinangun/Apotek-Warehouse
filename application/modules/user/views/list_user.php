<?php include('wp-content/themes/apt-whz/modules/apt/templates/header.php'); ?>
 <!-- Content -->
    <div class="content">
    	<div class="title"><h5>User List</h5></div>
       <!-- Form begins -->
        <table cellpadding="0" cellspacing="0" width="100%" class="tableMod">
            	<thead>
                	<tr>
                        <td width="5%">No</td>
                        <td width="20%">Nama</td>
                        <td width="20%">Username</td>
                        <td>Posisi</td>
                        <td>Email</td>
                        <td>No. Telp</td>
                        <td width="5%">Action</td>
                    </tr>
                </thead>
				<tbody>
				<?php 
				$no = 1;
				foreach($user_list as $user) {?>
					<tr>
                        <td align="center"><?php echo $no++?></td>
                        <td><?php echo $user->ur_nama?></td>
                        <td><?php echo $user->ur_username?></td>
                        <td><?php echo $user->ur_position?></td>
                        <td><?php echo $user->ur_email?></td>
                        <td><?php echo $user->ur_telpon?></td>
						<?php if ($user->ur_approved == 'no') {?>
                        <td><?php echo anchor('user/login/approve/'.$user->id_user, 'approve')?></td>
						<?php } else { ?>
                        <td><?php echo anchor('user/login/disable/'.$user->id_user, 'disable')?></td>
						<?php } ?>
                    </tr>
				<?php } ?>
				</tbody>
				<tfoot>
					<tr>
                    </tr>
				<?php echo form_close();?>
				</tfoot>
		</table>
	</div>
	
    <div class="fix"></div>
</div>
<?php include('wp-content/themes/apt-whz/modules/apt/templates/footer.php'); ?>
