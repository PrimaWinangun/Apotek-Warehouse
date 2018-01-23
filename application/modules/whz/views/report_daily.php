<?php include('wp-content/themes/apt-whz/modules/apt/templates/header.php'); ?>
 <!-- Content -->
    <div class="content">
        <div class="title"><h5>Daily Report</h5></div>
		<div class="widgets">
			
       <!-- Form begins --><!-- Static table -->
        <div class="widget first">
        	<div class="head"><h5 class="iFrames">Data</h5></div>
            <table cellpadding="0" cellspacing="0" width="100%" class="tableMod">
            	<thead>
                	<tr>
						<td width="5%">No</td>
                        <td>Nama</td>
                        <td>Jenis</td>
                        <td>Jumlah</td>
                    </tr>
                </thead>
                <tbody>
				<?php 
				$num=1;
				foreach($report as $row) {?>
                	<tr >
						<td><?php echo $num++; ?></td>
                        <td><?php echo ucfirst($row->obt_name)?></td>
                        <td><?php echo ucfirst($row->apt_jenis)?></td>
                        <td align="center"><?php echo $row->jumlah?></td>
                    </tr>
				<?php } ?>
                </tbody>
				<tfoot>
				<tr>
					<td colspan="10" style="text-align:right"> <?php echo anchor('whz/admin/export_daily_report', 'export to pdf &nbsp');	?></td>
				</tr>
				</tfoot>
            </table>
        </div>
		</div>
		</div>
    <div class="fix"></div>
</div>
<?php include('wp-content/themes/apt-whz/modules/apt/templates/footer.php'); ?>
