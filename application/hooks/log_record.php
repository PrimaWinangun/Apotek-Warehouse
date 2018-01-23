<?php
	class Log_record{
		
		function __construct()
		{
			$this->CI = & get_instance();
		}
		
		function app_log_record()
		{
			$user = $this->CI->session->userdata('login_data');
			$log_data = $this->CI->session->all_userdata();
			
			if($user == NULL)
			{
				$username = 'guest';
			} else {
				$username = $user->ur_username;
			}
			
			$data = array(
					'al_user' => $username,
					'al_url' => $this->CI->uri->uri_string,
					'al_ip_address' => $log_data['ip_address']
				);
			
			$this->CI->db->insert('app_log', $data);
		}
	}

?>