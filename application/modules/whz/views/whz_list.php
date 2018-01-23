<?php include('wp-content/themes/apt-whz/modules/apt/templates/header.php'); ?>
 <!-- Content -->
    <div class="content">
        <div class="title"><h5>List of Database</h5></div>
		<div class="widgets">
			<div class="left" style="width:220px">
				<div class="mainForm noSearch formAuto searchWidgetnew" style="width:237px">
					<?php echo form_open('whz/admin/whz_jenis_search')?>
					<label>Jenis</label>
					 <select name="jenis" class="chzn-select" style="float:left">
						<?php foreach($jenis as $row) {?>
							<option value="<?php echo $row->apt_code;?>"><?php echo $row->apt_jenis;?></option>
						<?php } ?>
					  </select>
					  <input type="submit" value="" class="submitForm" />
					</form>
				</div>
			<div class="fix"></div>
		<!-- Search -->
                <div class="searchWidget" style="width:210px; float:right;">
				<?php echo form_open('whz/admin/whz_search')?>
                    	<input type="text" name="search" placeholder="Enter search text..." />
                        <input type="submit" value="" />
                    </form>
                </div>
			</div>
		<div class="middle" style="width:77%">
       <!-- Form begins --><!-- Static table -->
        <div class="widget first">
        	<div class="head"><h5 class="iFrames">Data</h5></div>
            <table cellpadding="0" cellspacing="0" width="100%" class="tableMod">
            	<thead>
                	<tr>
                        <td width="20%" rowspan="2">Nama</td>
                        <td width="20%" rowspan="2">Jenis</td>
                        <td rowspan="2">Jumlah</td>
                        <td colspan="3">Harga ( per satuan jumlah)</td>
                        <td colspan="2">Discount</td>
                        <td width="20%" rowspan="2">Expired</td>
                        <td width="20%" rowspan="2">Action</td>
                    </tr>
					<tr>
						<td></td><td>Beli</td><td>Jual</td>
						<td>%</td><td>Rp</td>
					</tr>
                </thead>
                <tbody>
				<?php 
				$today = date('-1 month');
				$font = '';
				foreach($obat as $row) {
				$expired = date('d-m-Y', strtotime($row->obt_expired));
				if (strtotime($row->obt_expired) <= $today){$font= '<font color="red">';} else {$font = '';}?>
                	<tr >
                        <td><?php echo $font.ucfirst($row->obt_name)?></td>
                        <td><?php echo $font.ucfirst($row->apt_jenis)?></td>
                        <td align="center"><?php echo $font.$row->obt_jumlah?></td>
                        <td><?php echo $font?>Rp.</td>
                        <td align="right"><?php echo $font.number_format($row->obt_harga,2,',','.')?></td>
                        <td align="right"><?php echo $font.number_format($row->obt_jual,2,',','.')?></td>
                        <td align="right"><?php echo $font.number_format($row->obt_discount,2,',','.')?></td>
                        <td align="right"><?php echo $font.number_format($row->obt_discount_rp,2,',','.')?></td>
                        <td align="right"><?php echo $font.date('d-m-Y', strtotime($row->obt_expired))?></td>
                        <td align="center"><?php echo anchor('whz/admin/edit_data/'.$row->id_obat,img(array('src'=>"wp-content/themes/apt-whz/assets/images/icons/color/pencil.png", 'alt'=>'Edit Data'))).' '. anchor('whz/admin/void_data/'.$row->id_obat,img(array('src'=>"wp-content/themes/apt-whz/assets/images/icons/color/cross.png", 'alt'=>'Void Data'))).' <a href="#openModal'.$row->id_obat.'">'.img(array('src'=>"wp-content/themes/apt-whz/assets/images/icons/color/plus.png", 'alt'=>'Tambah Stok')).'</a>';?>
						<div id="openModal<?php echo $row->id_obat?>" class="modalDialog">
							<div class="modal-header">
							<h4 class="modal-title">Tambah Stock <?php echo ucfirst($row->obt_name)?></h4>
							</div>
							<div class="modal-body">
								<?php 
									echo form_open('whz/admin/add_stock/'.$row->id_obat);
									echo form_input('jumlah');
									echo form_submit('tambah','Add');
									echo form_close();
								?>
							</div>
							<div class="modal-footer">
								<a href="#close"><input type="button" class="redBtn" value="&nbsp;X&nbsp;" id="popup_ok"></a>
							</div>
						</div></td>
                    </tr>
				<?php } ?>
                </tbody>
				<tfoot>
				<tr><td colspan="10" align="center">
					<div class="pagination"><?php echo $this->pagination->create_links();?></div>
				</td></tr>
				<tr>
					<td colspan="10" style="text-align:right"> <?php
						if ($this->uri->segment(3) == 'whz_jenis_search')
						{
							echo anchor('whz/admin/export_pdf_jenis', 'export to pdf &nbsp');
						} else {
							echo anchor('whz/admin/export_pdf_all', 'export to pdf &nbsp');
						}
					?></td>
				</tr>
				</tfoot>
            </table>
        </div>
		</div>
		</div>
	</div>
    <div class="fix"></div>
</div>
<?php include('wp-content/themes/apt-whz/modules/apt/templates/footer.php'); ?>
