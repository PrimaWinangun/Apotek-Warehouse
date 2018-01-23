<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Application extends CI_Controller {

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
		
		if ( ! $this->session->userdata('login_data'))
    	{ 
        	# function allowed for access without login
			$allowed = array('');
        
			# other function need login
			if (! in_array($this->router->method, $allowed)) 
			{
    			redirect('user/login');
			}
   		}
	} 
	
	public function index()
	{
		$this->load->model('setting_model');
		
		$data['sidebar'] = 'stg_supplier';
		$data['main_sidebar'] = 'setting';
		$data['jenis'] = $this->setting_model->get_data_jenis();
		$this->load->view('add_new_drugs', $data);
	}
	
	public function supplier()
	{
		$this->load->model('setting_model');
		
		$data['sidebar'] = 'stg_supplier';
		$data['main_sidebar'] = 'setting';
		
		# Pagination Config
		$config['base_url'] = base_url().'setting/application/supplier'; //set the base url for pagination
		$config['total_rows'] = $this->setting_model->count_supplier(); //total rows
		$config['per_page'] = 10; //the number of per page for pagination
		$config['uri_segment'] = 4; //see from base_url. 3 for this case
		$this->pagination->initialize($config);
		$pagination = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		
		$data['supplier'] = $this->setting_model->get_data_supplier($config['per_page'], $pagination);
		$this->load->view('supplier_list', $data);
	}
	
	public function input_supplier()
	{
		$this->load->model('setting_model');
		$profile = $this->session->userdata('login_data');
		$data = array(
					'sup_name' => $this->input->post('name'),
					'sup_alamat' => $this->input->post('alamat'),
					'sup_telp' => $this->input->post('telp'),
					'sup_update_by' => $profile->ur_nama,
				);
		$this->setting_model->input_supplier($data);
		
		redirect('setting/application/supplier');
	}
	
	public function input_edit_supplier()
	{
		$this->load->model('setting_model');
		$length = strlen($this->input->post('harga'));
		$harga = substr($this->input->post('harga'),3,$length-6);
		$harga = str_replace(',','',$harga);
		$id_obat = $this->uri->segment(4);
		$data = array(
					'obt_barcode' => $this->input->post('barcode'),
					'obt_name' => $this->input->post('name'),
					'obt_jenis' => $this->input->post('jenis'),
					'obt_jumlah' => $this->input->post('jumlah'),
					'obt_harga' => $harga,
					'obt_update_by' => 'admin',
				);
		$this->setting_model->update_data($id_obat, $data);
		
		redirect('whz/admin/index');
	}
	
	public function price_rate()
	{
		$this->load->model('setting_model');
		
		$data['sidebar'] = 'stg_pricerate';
		$data['main_sidebar'] = 'setting';
		
		# Pagination Config
		$config['base_url'] = base_url().'setting/application/price_list'; //set the base url for pagination
		$config['total_rows'] = $this->setting_model->count_price(); //total rows
		$config['per_page'] = 10; //the number of per page for pagination
		$config['uri_segment'] = 4; //see from base_url. 3 for this case
		$this->pagination->initialize($config);
		$pagination = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		
		$data['price'] = $this->setting_model->get_data_price($config['per_page'], $pagination);
		
		#print_r($data);
		
		$this->load->view('price_list', $data);
	}
	
	public function input_price()
	{
		$this->load->model('setting_model');
		$profile = $this->session->userdata('login_data');
		
		$check = $this->setting_model->price_check($this->input->post('min'));
		if ($this->input->post('min') >= $this->input->post('max'))
		{
			redirect('setting/application/price_rate/invalid');
		}
		if ($check == NULL)
		{
			$data = array(
						'price_start' => $this->input->post('min'),
						'price_end' => $this->input->post('max'),
						'price_rate' => $this->input->post('rate'),
						'price_update_by' => $profile->ur_nama,
					);
			$this->setting_model->input_price($data);
			
			redirect('setting/application/price_rate');
		} else {
			redirect('setting/application/price_rate/failed');
		}
	}
	
	public function whz_search()
	{
		$this->load->model('setting_model');
		
		$data['sidebar'] = 'whz_list';
		$data['main_sidebar'] = 'warehousing';
		
		# Search Input Post
		if ($this->input->post('search') != NULL)
		{
			$this->session->set_flashdata('search', $this->input->post('search'));
			$search = $this->input->post('search');
		} else { 
			$search = $this->session->flashdata('search');
			$this->session->keep_flashdata('search');
		}
		
		# Pagination Config
		$config['base_url'] = base_url().'whz/admin/whz_search/'; //set the base url for pagination
		$config['total_rows'] = $this->setting_model->count_search_obat($search); //total rows
		$config['per_page'] = 10; //the number of per page for pagination
		$config['uri_segment'] = 4; //see from base_url. 3 for this case
		$this->pagination->initialize($config);
		$pagination = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		
		$data['obat'] = $this->setting_model->get_search_data_obat($search, $config['per_page'], $pagination);
		$data['jenis'] = $this->setting_model->get_data_jenis();
		
		$this->load->view('whz_list', $data);
		
	}
	
	public function whz_jenis_search()
	{
		$this->load->model('setting_model');
		
		$data['sidebar'] = 'whz_list';
		$data['main_sidebar'] = 'warehousing';
		
		# Search Input Post
		if ($this->input->post('jenis') != NULL)
		{
			$this->session->set_flashdata('jenis', $this->input->post('jenis'));
			$search = $this->input->post('jenis');
		} else { 
			$search = $this->session->flashdata('jenis');
			$this->session->keep_flashdata('jenis');
		}
		
		# Pagination Config
		$config['base_url'] = base_url().'whz/admin/whz_jenis_search/'; //set the base url for pagination
		$config['total_rows'] = $this->setting_model->count_search_jenis($search); //total rows
		$config['per_page'] = 10; //the number of per page for pagination
		$config['uri_segment'] = 4; //see from base_url. 3 for this case
		$this->pagination->initialize($config);
		$pagination = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		
		$data['obat'] = $this->setting_model->get_search_jenis_obat($search, $config['per_page'], $pagination);
		$data['jenis'] = $this->setting_model->get_data_jenis();
		
		$this->load->view('whz_list', $data);
	}
	
	public function edit_data()
	{
		$this->load->model('setting_model');
		
		$data['sidebar'] = 'whz_list';
		$data['main_sidebar'] = 'warehousing';
		$data['obat'] = $this->setting_model->get_detail_obat($this->uri->segment(4));
		$data['jenis'] = $this->setting_model->get_data_jenis();
		
		$this->load->view('edit_data', $data);
	}
	
	public function void_data()
	{
		$this->load->model('setting_model');
		
		$this->setting_model->void_data($this->uri->segment(4));
		
		redirect('whz/admin/whz_list');
	}
	
	public function add_stock()
	{
		$this->load->model('setting_model');
		
		$obat = $this->setting_model->get_detail_obat($this->uri->segment(4));
		
		$new_total = $obat->obt_jumlah + $this->input->post('jumlah');
		$this->setting_model->update_stock($this->uri->segment(4),$new_total);
		
		redirect('whz/admin/whz_list');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */