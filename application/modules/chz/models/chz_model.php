<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chz_model extends CI_Model {

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
	 
	 public function new_transaction()
	 {
		$user = $this->session->userdata('login_data');
		$data = array(
				'pay_code' => date('Ymdhis'),
				'transaction_by' => $user->ur_username,
				'bill_name' => $this->input->post('nama'),
				'status' => 'open',
				'paid_date' => '0000-00-00',
				'update_by' => $user->ur_username
			);
		
		$this->db->insert('apt_bill', $data);
		return $this->db->insert_id();
	 }
	 
	 public function input_detail($data)
	 {
		$this->db->insert('apt_bill_detail', $data); 
	 }
	 
	 public function detail_return_item($item, $paycode, $price)
	 {
		
		$user = $this->session->userdata('login_data');
		$data = array(
				'aptr_paycode' => $paycode,
				'aptr_item_id' => $item->id_apt_dtl,
				'aptr_jumlah' => $item->aptd_jum,
				'aptr_price' => $price,
				'aptr_update_by' => $user->ur_username
		);
		$this->db->insert('apt_return_item', $data);
	 }
	 
	 ## GET DATA ##
	 
	 public function search_item($search)
	 {		
		$item = "SELECT * FROM (`apt_obat`) JOIN `apt_jenis` ON `obt_jenis` = `apt_code` WHERE `obt_void_status` = 'no' AND (`obt_barcode` = '$search' or `obt_code` = '$search')";
		$query = $this->db->query($item);
		return $query->row();
	 }
	 
	 public function get_detail_trans($id)
	 {
		$this->db->where('id_bill', $id);
		$this->db->where('isvoid', 'no');
		$query = $this->db->get('apt_bill');
		return $query->row();
	 }
	 
	 public function get_data_transaction($user, $num, $offset)
	 {if ($user != 'all')
		{
			$this->db->where('transaction_by', $user);
		}
		$this->db->where('status','closed');
		$this->db->where('isvoid','no');
		$this->db->order_by('id_bill','DESC');
		$this->db->limit($num, $offset);
		$query = $this->db->get('apt_bill');
		return $query->result();
	 }
	 
	 public function get_data_all_transaction($user, $time)
	 {if ($user != 'all')
		{
			$this->db->where('transaction_by', $user);
		}
		$this->db->where('status','closed');
		$this->db->where('isvoid','no');
		$this->db->where('paid_date', $time);
		$this->db->order_by('id_bill','DESC');
		$query = $this->db->get('apt_bill');
		return $query->result();
	 }
	 
	 public function get_data_transaction_search($search, $num, $offset)
	 {if ($search != 'all')
		{
			$this->db->like('pay_code', $search);
		}
		$this->db->where('status','closed');
		$this->db->where('isvoid','no');
		$this->db->limit($num, $offset);
		$this->db->order_by('id_bill','DESC');
		$query = $this->db->get('apt_bill');
		return $query->result();
	 }
	 
	 public function get_item_trans($id)
	 {
		$this->db->where('id_bill', $id);
		$this->db->where('obt_void_status','no');
		$this->db->where('aptd_void','no');
		$this->db->join('apt_obat', 'aptd_code_obat = obt_barcode', 'LEFT');
		$query = $this->db->get('apt_bill_detail');
		return $query->result();
	 }
	 
	 public function get_return_item_detail($id)
	 {
		$this->db->like('id_apt_dtl', $id);
		$this->db->join('apt_bill','apt_bill.id_bill = apt_bill_detail.id_bill','LEFT');
		$this->db->join('apt_obat', 'aptd_obt_id = id_obat', 'LEFT');
		$this->db->where('status','closed');
		$this->db->where('obt_void_status','no');
		$this->db->where('isvoid','no');
		$query = $this->db->get('apt_bill_detail');
		return $query->row();
	 }
	 
	 public function search_transaction($search)
	 {
		$this->db->like('pay_code', $search);
		$this->db->join('apt_bill','apt_bill.id_bill = apt_bill_detail.id_bill','LEFT');
		$this->db->join('apt_obat', 'aptd_obt_id = id_obat', 'LEFT');
		$this->db->where('obt_void_status','no');
		$this->db->where('status','closed');
		$this->db->where('isvoid','no');
		$query = $this->db->get('apt_bill_detail');
		return $query->result();
	 }
	 
	 public function check_paid($id)
	 {
		$transaction = 'paid';

		$this->db->where('id_bill', $id);
		$this->db->where('isvoid', 'no');
		$query = $this->db->get('apt_bill');
		$data = $query->row();
		
		if ($data->status == 'open')
		{
			$transaction = 'not_paid';
		}
		
		return $transaction;
	 }
	 ## COUNT DATA ##
	 
	 public function count_report($user)
	 {
		if ($user != 'all')
		{
			$this->db->where('transaction_by', $user);
		}
		$this->db->where('status','closed');
		$this->db->where('isvoid','no');
		$query = $this->db->get('apt_bill');
		return $query->num_rows();
	 } 
	 
	 public function count_report_search($search)
	 {
		if ($search != 'all')
		{
			$this->db->like('pay_code', $search);
		}
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
	 
	 public function void_detail_transaction($id)
	 {
		$this->db->where('id_apt_dtl', $id);
		$this->db->update('apt_bill_detail', array('aptd_void' => 'yes'));
	 }
	 
	 ## UPDATE
	 public function update_data($id, $data)
	 {
		$this->db->where('id_obat', $id);
		$this->db->update('apt_obat', $data);
	 }
	 
	 public function update_stock($search, $data)
	 {
		$this->db->where('obt_barcode', $search);
		$this->db->where('obt_void_status','no');
		$this->db->update('apt_obat', array('obt_jumlah'=>$data));
	 }
	 
	 public function update_paid($id, $data)
	 {
		$this->db->where('id_bill', $id);
		$this->db->update('apt_bill', $data);
	 }
	 
	 public function return_item($id,$jumlah, $obat, $stock)
	 {
		$this->db->where('id_apt_dtl', $id);
		$this->db->update('apt_bill_detail', array('aptd_return_status'=>'yes', 'aptd_return_item'=>$jumlah));
		
		$this->db->where('id_obat', $obat);
		$this->db->update('apt_obat', array('obt_jumlah'=>$stock));
	 }
}

/* end of reservation_model.php */