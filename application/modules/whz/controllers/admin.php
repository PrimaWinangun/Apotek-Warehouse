<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		$this->load->model('whz_model');
		
		$data['sidebar'] = 'whz_add_new';
		$data['main_sidebar'] = 'warehousing';
		$data['jenis'] = $this->whz_model->get_data_jenis();
		$data['supplier'] = $this->whz_model->get_data_supplier();
		$data['rate'] = $this->whz_model->get_data_rate();
		$this->load->view('add_new_drugs', $data);
	}
	
	public function calculate()
	{
		$this->load->model('whz_model');
		
	}
	
	public function input_whz()
	{
		$this->load->model('whz_model');
		$length = strlen($this->input->post('harga'));
		$harga = substr($this->input->post('harga'),3,$length-6);
		$harga = str_replace(',','',$harga);
		$rate = $this->whz_model->get_data_rate();
		foreach ($rate as $row)
		{
			if ($harga >= $row->price_start AND $harga <= $row->price_end)
			{
				$jual = $harga + (($harga * $row->price_rate) / 100);
			} 
		}
		if ($harga > $row->price_end)
			{
				$jual = $harga + (($harga * $row->price_rate) / 100);
			} 
			
		if ($this->input->post('disc') == NULL AND $this->input->post('disc_rp') == NULL)
		{
			$disc = 0;
			$disc_rp = 0;
		} else 
		if ($this->input->post('disc_rp') == NULL)
		{
			$disc = $this->input->post('disc');
			$disc_rp = $harga * $disc / 100;
		} else 
		if ($this->input->post('disc') == NULL)
		{
			$disc_rp = $this->input->post('disc_rp');
			$disc = 0;			
		} else 
		if ($this->input->post('disc') != NULL AND $this->input->post('disc_rp') != NULL)
		{
			$disc = $this->input->post('disc');
			$disc_rp = $harga * $disc / 100;
		}
		
		$expired = str_replace('/','-',$this->input->post('expired'));
		
		$expired = mdate('%Y-%m-%d',strtotime($expired));
		
		$data = array(
					'obt_barcode' => $this->input->post('barcode'),
					'obt_code' => $this->input->post('code'),
					'obt_name' => $this->input->post('name'),
					'obt_jenis' => $this->input->post('jenis'),
					'obt_expired' => $expired,
					'obt_jumlah' => $this->input->post('jumlah'),
					'obt_harga' => $harga,
					'obt_discount' => $disc,
					'obt_discount_rp' => $disc_rp,
					'obt_jual' => $jual,
					'obt_supplier' => $this->input->post('supplier'),
					'obt_update_by' => 'admin',
				);
		$this->whz_model->input_data($data);
		//print_r($data);
		redirect('whz/admin/index');
	}
	
	public function input_edit()
	{
		$this->load->model('whz_model');
		$length = strlen($this->input->post('harga'));
		$harga = substr($this->input->post('harga'),3,$length-6);
		$harga = str_replace(',','',$harga);
		$id_obat = $this->uri->segment(4);
		if ($this->input->post('disc') == NULL AND $this->input->post('disc_rp') == NULL)
		{
			$disc = 0;
			$disc_rp = 0;
		} else 
		if ($this->input->post('disc_rp') == NULL)
		{
			$disc = $this->input->post('disc');
			$disc_rp = $harga * $disc / 100;
		} else 
		if ($this->input->post('disc') == NULL)
		{
			$disc_rp = $this->input->post('disc_rp');
			$disc = 0;			
		} else 
		if ($this->input->post('disc') != NULL AND $this->input->post('disc_rp') != NULL)
		{
			$disc = $this->input->post('disc');
			$disc_rp = $harga * $disc / 100;
		}
		$expired = str_replace('/','-',$this->input->post('expired'));
		
		$expired = mdate('%Y-%m-%d',strtotime($expired));
		$data = array(
					'obt_barcode' => $this->input->post('barcode'),
					'obt_name' => $this->input->post('name'),
					'obt_jenis' => $this->input->post('jenis'),
					'obt_jumlah' => $this->input->post('jumlah'),
					'obt_expired' => $expired,
					'obt_harga' => $harga,
					'obt_discount' => $disc,
					'obt_discount_rp' => $disc_rp,
					'obt_jual' => $this->input->post('jual'),
					'obt_supplier' => $this->input->post('supplier'),
					'obt_update_by' => 'admin',
				);
				
		print_r($data);
		$this->whz_model->update_data($id_obat, $data);
		
		redirect('whz/admin/whz_list');
	}
	
	public function whz_list()
	{
		$this->load->model('whz_model');
		
		$data['sidebar'] = 'whz_list';
		$data['main_sidebar'] = 'warehousing';
		
		# Pagination Config
		$config['base_url'] = base_url().'whz/admin/whz_list/'; //set the base url for pagination
		$config['total_rows'] = $this->whz_model->count_obat(); //total rows
		$config['per_page'] = 10; //the number of per page for pagination
		$config['uri_segment'] = 4; //see from base_url. 3 for this case
		$this->pagination->initialize($config);
		$pagination = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		
		$data['obat'] = $this->whz_model->get_data_obat($config['per_page'], $pagination);
		$data['jenis'] = $this->whz_model->get_data_jenis();
		
		#print_r($data);
		
		$this->load->view('whz_list', $data);
	}
	
	public function whz_search()
	{
		$this->load->model('whz_model');
		
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
		$config['total_rows'] = $this->whz_model->count_search_obat($search); //total rows
		$config['per_page'] = 10; //the number of per page for pagination
		$config['uri_segment'] = 4; //see from base_url. 3 for this case
		$this->pagination->initialize($config);
		$pagination = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		
		$data['obat'] = $this->whz_model->get_search_data_obat($search, $config['per_page'], $pagination);
		$data['jenis'] = $this->whz_model->get_data_jenis();
		
		$this->load->view('whz_list', $data);
		
	}
	
	public function whz_jenis_search()
	{
		$this->load->model('whz_model');
		
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
		$config['total_rows'] = $this->whz_model->count_search_jenis($search); //total rows
		$config['per_page'] = 10; //the number of per page for pagination
		$config['uri_segment'] = 4; //see from base_url. 3 for this case
		$this->pagination->initialize($config);
		$pagination = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		
		$data['obat'] = $this->whz_model->get_search_jenis_obat($search, $config['per_page'], $pagination);
		$data['jenis'] = $this->whz_model->get_data_jenis();
		
		$this->load->view('whz_list', $data);
	}
	
	public function edit_data()
	{
		$this->load->model('whz_model');
		
		$data['sidebar'] = 'whz_list';
		$data['main_sidebar'] = 'warehousing';
		$data['obat'] = $this->whz_model->get_detail_obat($this->uri->segment(4));
		$data['supplier'] = $this->whz_model->get_data_supplier();
		$data['jenis'] = $this->whz_model->get_data_jenis();
		
		$this->load->view('edit_data', $data);
	}
	
	public function void_data()
	{
		$this->load->model('whz_model');
		
		$this->whz_model->void_data($this->uri->segment(4));
		
		redirect('whz/admin/whz_list');
	}
	
	public function add_stock()
	{
		$this->load->model('whz_model');
		
		$obat = $this->whz_model->get_detail_obat($this->uri->segment(4));
		
		$new_total = $obat->obt_jumlah + $this->input->post('jumlah');
		$this->whz_model->update_stock($this->uri->segment(4),$new_total);
		
		redirect('whz/admin/whz_list');
	}
	
	public function export_pdf_jenis()
	{
		$this->load->model('whz_model');
		
		$search = $this->session->flashdata('jenis');
		$this->session->keep_flashdata('jenis');
		
		$data['obat'] = $this->whz_model->get_search_jenis($search);
		$data['jenis'] = $search;
		
		$html = '';
		$html .= $this->load->view('whz/print_list',$data, true);
		//$this->load->view('whz/print_list',$data);
		
		# Load Helper PDF
		$this->load->helper('sigap_pdf');
		
		# PDF Maker
		$stream = TRUE; 
		$papersize = 'A4'; 
		$orientation = 'landscape';
		$filename = 'List-Item-'.$search;
		$data['filename'] = $filename . '.pdf';
		pdf_create($html, $filename, $stream, $papersize, $orientation, '');
		
	}
	
	public function export_pdf_all()
	{
		$this->load->model('whz_model');
		
		$data['obat'] = $this->whz_model->get_data_obat_all();
		$data['jenis'] = 'ALL';
		
		$html = '';
		$html .= $this->load->view('whz/print_list',$data, true);
		//$this->load->view('whz/print_list',$data);
		
		# Load Helper PDF
		$this->load->helper('sigap_pdf');
		
		# PDF Maker
		$stream = TRUE; 
		$papersize = 'A4'; 
		$orientation = 'landscape';
		$filename = 'List-Item-All';
		$data['filename'] = $filename . '.pdf';
		pdf_create($html, $filename, $stream, $papersize, $orientation, '');
		
	}
	
	public function report_daily()
	{
		$this->load->model('whz_model');
		
		$time = date('Y-m-d', now());
		
		$data['sidebar'] = 'whz_report';
		$data['main_sidebar'] = 'warehousing';
		$data['report'] = $this->whz_model->get_daily_report($time);
		
		$this->load->view('report_daily', $data);
	}
	
	public function export_daily_report()
	{
		$this->load->model('whz_model');
		
		$time = date('Y-m-d', now());
		$data['time'] = date('d F Y', now());
		$data['report'] = $this->whz_model->get_daily_report($time);
		
		$html = '';
		$html .= $this->load->view('whz/report_list',$data, true);
		//$this->load->view('whz/print_list',$data);
		
		# Load Helper PDF
		$this->load->helper('sigap_pdf');
		
		# PDF Maker
		$stream = TRUE; 
		$papersize = 'A4'; 
		$orientation = 'landscape';
		$filename = 'Daily-Report-'.$time;
		$data['filename'] = $filename . '.pdf';
		pdf_create($html, $filename, $stream, $papersize, $orientation, '');
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */