<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class User_access {

	public function level()
    {
		$CI =& get_instance();
		$CI->load->database();
		$CI->load->helper('array');
		$CI->load->helper('url');
		
		$ua_nipp = $CI->session->userdata['logged_in']['ui_nipp'];
		$ua_module = $CI->uri->segment(1);
		$ua_sub_module = $CI->uri->segment(2);
		
		$query = "	SELECT ua_roles FROM user_access 
					WHERE ua_nipp = '". $CI->encrypt->sha1($ua_nipp) ."'
					AND ua_module = '$ua_module'
					AND ua_sub_module = '$ua_sub_module'
					AND ( ua_end = '0000-00-00 00:00:00'  OR  ua_end > '".date("Y-m-d H:i:s")."' )
				";
		$user_level = $CI->db->query($query);
		
			if($user_level->num_rows() > 0)
			{
				foreach($user_level->result() as $items):
					$ua_roles = $items->ua_roles;
				endforeach;
				return $ua_roles;
			}
			else
			{
				$ua_roles = 0;
				return $ua_roles;
			}
    }
	
	
	public function module_active()
	{
		$CI =& get_instance();
		$CI->load->database();
		$CI->load->helper('array');
		$CI->load->helper('url');
		
		$ua_module = $CI->uri->segment(1);
		$ua_sub_module = $CI->uri->segment(2);
		
		$CI->db->where('vm_active', 'y');
		$CI->db->where('vm_name', $ua_module);
		$CI->db->where('vm_sub_module', $ua_sub_module);
		$module_active = $CI->db->get('var_module');
		if($module_active->num_rows() > 0){return TRUE;}else{return FALSE;}
	}
	
	public function module_hide($data)
	{
		$CI =& get_instance();
		$CI->load->database();
		$CI->load->helper('array');
		$CI->load->helper('url');
		
		$ua_module = $data['ua_module'];
		$ua_sub_module = $data['ua_sub_module'];
		
		$CI->db->where('vm_hide', 'y');
		$CI->db->where('vm_name', $ua_module);
		$CI->db->where('vm_sub_module', $ua_sub_module);
		$module_hide = $CI->db->get('var_module');
		if($module_hide->num_rows() > 0){return TRUE;}else{return FALSE;}
	}
}

/* End of file Someclass.php */