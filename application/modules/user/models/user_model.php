<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

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
	 
	 public function new_user($user)
	 {
		$this->db->insert('apt_user', $user);
		return $this->db->insert_id();
	 }
	 
	 public function input_detail($data)
	 {
		$this->db->insert('apt_bill_detail', $data); 
	 }
	 
	 ## GET DATA ##
	 public function get_user($username, $password)
	 {
		$this->db->where('ur_username', $username);
		$this->db->where('ur_password', $password);
		$query = $this->db->get('apt_user');
		return $query->row();
	 }
	 
	 public function get_item_trans($id)
	 {
		$this->db->where('id_bill', $id);
		$this->db->where('obt_void_status','no');
		$this->db->join('apt_obat', 'aptd_code_obat = obt_barcode', 'LEFT');
		$query = $this->db->get('apt_bill_detail');
		return $query->result();
	 }
	 
	 public function list_user()
	 {
		$query = $this->db->get('apt_user');
		return $query->result();
	 }
	 ## COUNT DATA ##
	 
	 public function count_report()
	 {
		$this->db->where('status','closed');
		$this->db->where('isvoid','no');
		$query = $this->db->get('apt_bill');
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
	 
	 public function update_profile($id, $data)
	 {
		$this->db->where('id_user', $id);
		$this->db->update('apt_user', $data);
	 }
	 
	 public function approve($id)
	 {
		$this->db->where('id_user', $id);
		$this->db->update('apt_user', array('ur_approved' => 'yes'));
	 }
	 
	 public function disable($id)
	 {
		$this->db->where('id_user', $id);
		$this->db->update('apt_user', array('ur_approved' => 'no'));
	 }
}

/* end of reservation_model.php */