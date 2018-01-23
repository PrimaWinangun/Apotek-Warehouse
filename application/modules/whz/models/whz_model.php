<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Whz_model extends CI_Model {

	/**
	 * PT Gapura Angkasa
	 * Warehouse Management System.
	 * ver 3.0
	 * 
	 * App id : 
	 * App code : wmsdps
	 *
	 * weighing model
	 *
	 * url : http://dom.wms.dps.gapura.co.id/
	 * design : SIGAP Team
	 * project head : mantara@gapura.co.id
	 *
	 * developer : panca dharma wisesa (pandhawa digital)
	 * phone : 0361 853 2400
	 * email : pandhawa.digital@gmail.com
	 *
	 * copyright by panca dharma wisesa (pandhawa digital)
	 * Do not copy, modified, share or sell this script 
	 * without any permission from developer
	 */
	 
	 ## INSERT DATA ##
	 
	 public function input_data($data)
	 {
		$this->db->insert('apt_obat', $data); 
	 }
	 
	 ## GET DATA ##
	 
	 public function get_data_jenis()
	 {
		$this->db->where('apt_void_status','no');
		$query = $this->db->get('apt_jenis');
		return $query->result();
	 } 
	 
	 public function get_data_supplier()
	 {
		$this->db->where('sup_void','no');
		$query = $this->db->get('apt_supplier');
		return $query->result();
	 } 
	 
	 public function get_data_rate()
	 {
		$this->db->where('price_void','no');
		$query = $this->db->get('apt_price_setting');
		return $query->result();
		
	 }
	 
	 public function get_data_obat($num, $offset)
	 {
		$this->db->join('apt_jenis', 'obt_jenis = apt_code', 'LEFT');
		$this->db->where('obt_void_status','no');
		$this->db->limit($num, $offset);
		$query = $this->db->get('apt_obat');
		return $query->result();
	 }
	 
	 public function get_data_obat_all()
	 {
		$this->db->join('apt_jenis', 'obt_jenis = apt_code', 'LEFT');
		$this->db->where('obt_void_status','no');
		$query = $this->db->get('apt_obat');
		return $query->result();
	 }
	 
	 public function get_detail_obat($search)
	 {
		$this->db->join('apt_jenis', 'obt_jenis = apt_code', 'LEFT');
		$this->db->where('obt_void_status','no');
		$this->db->where('id_obat', $search);
		$query = $this->db->get('apt_obat');
		return $query->row();
	 }
	 
	 public function get_search_data_obat($search, $num, $offset)
	 {
		$query = "SELECT * FROM (`apt_obat`) LEFT JOIN `apt_jenis` ON `obt_jenis` = `apt_code` 
				  WHERE `obt_void_status` = 'no' AND (`obt_name` LIKE '%$search%' OR `obt_barcode` LIKE '%$search%')
				  LIMIT $offset, $num";
		$query = $this->db->query($query);
		return $query->result();
	 } 
	 
	 public function get_search_jenis_obat($search, $num, $offset)
	 {
		$this->db->join('apt_jenis', 'obt_jenis = apt_code', 'LEFT');
		$this->db->like('obt_jenis',$search);
		$this->db->where('obt_void_status','no');
		$this->db->limit($num, $offset);
		$query = $this->db->get('apt_obat');
		return $query->result();
	 } 
	 
	 public function get_search_jenis($search)
	 {
		$this->db->join('apt_jenis', 'obt_jenis = apt_code', 'LEFT');
		$this->db->like('obt_jenis',$search);
		$this->db->where('obt_void_status','no');
		$query = $this->db->get('apt_obat');
		return $query->result();
	 }
	 
	 public function get_daily_report($date)
	 {
		$this->db->select('aptd_code_obat,aptd_code,SUM(aptd_jum) as jumlah, obt_name, apt_jenis');
		$this->db->join('apt_bill_detail', 'apt_bill_detail.id_bill = apt_bill.id_bill', 'LEFT');
		$this->db->join('apt_obat', 'aptd_code_obat = obt_barcode OR aptd_code = obt_code','LEFT');
		$this->db->join('apt_jenis','obt_jenis = apt_code','LEFT');
		$this->db->where('paid_date', $date);
		$this->db->group_by('aptd_code_obat,aptd_code');
		$query = $this->db->get('apt_bill');
		return $query->result();
	 }
	 
	 ## COUNT DATA ##
	 
	 public function count_obat()
	 {
		$this->db->where('obt_void_status','no');
		$query = $this->db->get('apt_obat');
		return $query->num_rows();
	 }
	 
	 public function count_search_obat($search)
	 {
		$this->db->like('obt_name',$search);
		$this->db->where('obt_void_status','no');
		$query = $this->db->get('apt_obat');
		return $query->num_rows();
	 } 
	 
	 public function count_search_jenis($search)
	 {
		$this->db->like('obt_jenis',$search);
		$this->db->where('obt_void_status','no');
		$query = $this->db->get('apt_obat');
		return $query->num_rows();
	 }
	 
	 ## VOID
	 
	 public function void_data($id)
	 {
		$this->db->where('id_obat', $id);
		$this->db->update('apt_obat', array('obt_void_status' => 'yes'));
	 }
	 
	 ## UPDATE
	 public function update_data($id, $data)
	 {
		$this->db->where('id_obat', $id);
		$this->db->update('apt_obat', $data);
	 }
	 
	 public function update_stock($id, $data)
	 {
		$this->db->where('id_obat', $id);
		$this->db->update('apt_obat', array('obt_jumlah'=>$data));
	 }
	 
}

/* end of reservation_model.php */