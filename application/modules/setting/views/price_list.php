<?php include('wp-content/themes/apt-whz/modules/apt/templates/header.php'); ?>
 <!-- Content -->
    <div class="content">
        <div class="title"><h5>List of Price Rate</h5></div>
		<div class="widgets">
			<div class="left">
			<form action="<?php echo base_url()?>setting/application/input_price" method="post" accept-charset="utf-8" class="mainForm">
            <fieldset>
				 <div class="widget first">
                    <div class="head"><h5 class="iList">Input Form</h5></div>
                        <div class="rowElem"><label>Minimal:</label><div class="formLeft" style="width:53%"><input type="text" name="min" placeholder="enter your placeholder text here"/></div><div class="fix"></div></div>
                        <div class="rowElem"><label>Maximal:</label><div class="formLeft" style="width:53%"><input type="text" name="max"/></div><div class="fix"></div></div>
						<div class="rowElem"><label>Rate:</label><div class="formLeft onlyNums" style="width:53%"><input type="text" name="rate" /></div><div class="fix"></div></div>
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
                        <td>Minimal</td>
                        <td>Maximal</td>
                        <td>Rate (%)</td>
                        <td width="20%">Action</td>
                    </tr>
                </thead>
                <tbody>
				<?php foreach($price as $row) {?>
                	<tr>
                        <td align="right"><?php echo number_format($row->price_start,2,',','.')?></td>
                        <td align="right"><?php echo number_format($row->price_end,2,',','.')?></td>
                        <td align="center"><?php echo $row->price_rate?></td>
                        <td align="center"><?php echo anchor('setting/application/edit_data/'.$row->id_price,'edit').' | '. anchor('setting/application/void_data/'.$row->id_price,'void');?>
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
