<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Smu_log {
	
	public function record($user, $smu, $btb, $status)
	{
		$CI =& get_instance();
		$CI->load->database();
		$data = array(
			'sl_user' => $user,
			'sl_smu' => $smu,
			'sl_btb' => $btb,
			'sl_status' => $status
		);
		$CI->db->insert('wmsd_smu_log',$data);
	}
	
	public function retrieve_log($smu)
	{
		$CI =& get_instance();
		$CI->load->database();
		$CI->load->helper('array');
		$CI->load->helper('url');
		
		$CI->db->where('sl_smu', $ua_sub_module);
		$CI->db->order_by('id_smu_log', 'ASC');
		$smu = $CI->db->get('wmsd_smu_log');
		return $smu;
	}
}

/* End of file Someclass.php */