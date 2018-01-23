<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
        parent::__construct();
		
	} 
	
	public function index()
	{
		if ($this->session->userdata('login_data'))
		{
			$user = $this->session->userdata('login_data');
			if ($user->ur_approved == 'no')
			{
				# view login form
				$data['message']='User belum di aktivasi, silakan hubungi Admin';
				$data['title'] = $this->session->userdata('title');
				$this->load->view('user/login', $data);
			} else {
				$data['sidebar'] = 'usr_register';
				$data['main_sidebar'] = 'user';
				redirect('user/login/profile/'.$user->id_user);
			}
		}
		else
		{
			# view login form
			$data['message']='';
			$this->load->view('user/login', $data);
		}
	}
	
	public function authenticate()
	{
		$this->load->model('user_model');
		
		$username = $this->input->post('login');
		$password = $this->encrypt->sha1($this->input->post('password'),'encrypted');
		
		$data = $this->user_model->get_user($username, $password);
		$this->session->set_userdata('login_data', $data);
		
		redirect('user/login/index');
	}
	
	public function register()
	{
		#if ( ! $this->session->userdata('login_data'))
    	#{ 
    	#	redirect('user/login');
   		#}
		
		$data['sidebar'] = 'usr_register';
		$data['main_sidebar'] = 'user';
		$this->load->view('user/register',$data);
	}
	
	public function new_user()
	{
		$this->load->model('user_model');
		$user = array(
				'ur_nama' => $this->input->post('nama'),
				'ur_username' => $this->input->post('username'),
				'ur_password' => $this->encrypt->sha1($this->input->post('password'),'encrypted'),
				'ur_telpon' => $this->input->post('telp'),
				'ur_email' => $this->input->post('emailValid'),
				'ur_position' => $this->input->post('jabatan')
			);
			
		$this->user_model->new_user($user);
		redirect('user/login/list_user');
	}
	
	public function list_user()
	{
		if ( ! $this->session->userdata('login_data'))
    	{ 
    		redirect('user/login');
   		}
		$this->load->model('user_model');
		
		$data['user_list'] = $this->user_model->list_user();
		
		$data['sidebar'] = 'usr_list';
		$data['main_sidebar'] = 'user';
		$this->load->view('user/list_user', $data);
	}
	
	public function profile()
	{
		if ( ! $this->session->userdata('login_data'))
    	{ 
    		redirect('user/login');
   		}
		
		$this->load->model('user_model');
		
		$data['sidebar'] = 'usr_profile';
		$data['main_sidebar'] = 'user';
		$data['profile'] = $this->session->userdata('login_data');
		
		$this->load->view('profile', $data);
	}
	
	public function update_user()
	{
		if ( ! $this->session->userdata('login_data'))
    	{ 
    		redirect('user/login');
   		}
		
		$this->load->model('user_model');
		$session = $this->session->userdata('login_data');
		$id_user = $session->id_user;
		if ($this->input->post('password') == NULL)
		{
			$user = array(
					'ur_nama' => $this->input->post('nama'),
					'ur_username' => $this->input->post('username'),
					'ur_email' => $this->input->post('email'),
					'ur_telpon' => $this->input->post('telp'),
				);
		} else {
			$user = array(
					'ur_nama' => $this->input->post('nama'),
					'ur_username' => $this->input->post('username'),
					'ur_email' => $this->input->post('email'),
					'ur_telpon' => $this->input->post('telp'),
					'ur_password' => $this->encrypt->sha1($this->input->post('password'),'encrypted'),
				);
		}
		
		$this->user_model->update_profile($id_user, $user);
		
		redirect('user/login/profile/success');
	}
	
	public function approve()
	{
		if ( ! $this->session->userdata('login_data'))
    	{ 
    		redirect('user/login');
   		}
		
		$this->load->model('user_model');
		$id_user = $this->uri->segment(4);
		$this->user_model->approve($id_user);
		
		redirect('user/login/list_user');
	}
	
	public function disable()
	{
		if ( ! $this->session->userdata('login_data'))
    	{ 
    		redirect('user/login');
   		}
		
		$this->load->model('user_model');
		$id_user = $this->uri->segment(4);
		$this->user_model->disable($id_user);
		
		redirect('user/login/list_user');
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('user/login');
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */