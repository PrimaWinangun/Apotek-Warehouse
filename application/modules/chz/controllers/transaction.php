<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaction extends CI_Controller {

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
		$this->load->model('chz_model');
		
		$data['sidebar'] = 'chz_transaction';
		$data['main_sidebar'] = 'cashier';
		
		$this->load->view('new_transaction', $data);
	}
	
	public function input_data()
	{
		$this->load->model('chz_model');
		$profile = $this->session->userdata('login_data');
		
		$item = $this->chz_model->search_item($this->input->post('barcode'));
		if ($item == NULL)
		{
			redirect('chz/transaction/index/not_found');
		} else {
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
			if ($item->obt_jumlah < $this->input->post('jumlah'))
			{
				$jumlah = $item->obt_jumlah;
				$copy = $this->input->post('jumlah') - $item->obt_jumlah;
				$resep = 'yes';
			} else {
				$jumlah = $this->input->post('jumlah');
				$copy = 0;
				$resep = 'no';
			}
			$id_bill = $this->chz_model->new_transaction();
			$data = array(
						'id_bill' => $id_bill,
						'aptd_obt_id' => $item->id_obat,
						'aptd_code_obat' => $item->obt_barcode,
						'aptd_code' => $item->obt_code,
						'aptd_jum' => $jumlah,
						'aptd_resep' => $resep,
						'aptd_copy' => $copy,
						'aptd_harga' => $item->obt_jual,
						'aptd_tax' => ($item->obt_jual * 0.1),
						'aptd_disc' => $disc,
						'aptd_disc_rp' => $disc_rp,
						'aptd_update_by' => $profile->ur_username
					);
			$this->chz_model->input_detail($data);
			$this->session->set_userdata('transaction_id', $id_bill);
			redirect('chz/transaction/cont_transaction/'.$id_bill);
		}
	}
	
	public function input_next_data()
	{
		$this->load->model('chz_model');
		$profile = $this->session->userdata('login_data');
		
		$item = $this->chz_model->search_item($this->input->post('barcode'));
		
		if ($item == NULL)
		{
			redirect('chz/transaction/index/not_found');
		} else {
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
			if ($item->obt_jumlah < $this->input->post('jumlah'))
			{
				$jumlah = $item->obt_jumlah;
				$copy = $this->input->post('jumlah') - $item->obt_jumlah;
				$resep = 'yes';
			} else {
				$jumlah = $this->input->post('jumlah');
				$copy = 0;
				$resep = 'no';
			}
			$id_bill = $this->session->userdata('transaction_id');
			$data = array(
						'id_bill' => $id_bill,
						'aptd_obt_id' => $item->id_obat,
						'aptd_code_obat' => $item->obt_barcode,
						'aptd_code' => $item->obt_code,
						'aptd_jum' => $jumlah,
						'aptd_resep' => $resep,
						'aptd_copy' => $copy,
						'aptd_harga' => $item->obt_jual,
						'aptd_tax' => ($item->obt_jual * 0.1),
						'aptd_disc' => $disc,
						'aptd_disc_rp' => $disc_rp,
						'aptd_update_by' => $profile->ur_username
					);
			$this->chz_model->input_detail($data);
			$this->session->set_userdata('transaction_id', $id_bill);
			redirect('chz/transaction/cont_transaction/'.$id_bill);
		}
	}
	
	
	public function cont_transaction()
	{
		$this->load->model('chz_model');
		
		$trans_id = $this->session->userdata('transaction_id');
		$data['trans_detail'] = $this->chz_model->get_detail_trans($trans_id);
		$data['trans_item'] = $this->chz_model->get_item_trans($trans_id);
		
		$data['sidebar'] = 'chz_transaction';
		$data['main_sidebar'] = 'cashier';
		
		$this->load->view('cont_transaction', $data);
	}
	
	public function pay_transaction()
	{
		$this->load->model('chz_model');
		
		$trans_id = $this->session->userdata('transaction_id');
		$check = $this->chz_model->check_paid($trans_id);
		
		if ($check == 'paid')
		{
			redirect('chz/transaction/cont_transaction/'.$trans_id.'/paid');
		} else {
			$paid = array(
					'quantity' => $this->input->post('jumlah'),
					'total' => $this->input->post('total'),
					'status' => 'closed',
					'discount' => $this->input->post('discount'),
					'paid_amount' => $this->input->post('bayar'),
					'paid_date' => date('Y-m-d'),
				);
			if ($this->input->post('bayar') >= $this->input->post('total'))
			{
				$this->chz_model->update_paid($trans_id, $paid);
				$detail = $this->chz_model->get_item_trans($trans_id);
				
				foreach($detail as $item)
				{
					$jumlah = $item->aptd_jum;
					$data = $this->chz_model->search_item($item->aptd_code_obat);
					$new_jumlah = $data->obt_jumlah - $jumlah;
					$this->chz_model->update_stock($item->aptd_code_obat, $new_jumlah);
				}
				
				redirect('chz/transaction/print_transaction');
			} else {
				redirect('chz/transaction/cont_transaction/'.$trans_id.'/failed');
			}
		}
	}
	
	public function void_detail()
	{
		$this->load->model('chz_model');
		
		$trans_id = $this->session->userdata('transaction_id');
		$check = $this->chz_model->check_paid($trans_id);
		
		if ($check == 'paid')
		{
			redirect('chz/transaction/cont_transaction/'.$trans_id.'/paid');
		} else {
			$this->chz_model->void_detail_transaction($this->uri->segment(4));
			redirect('chz/transaction/cont_transaction/'.$trans_id);
		}
		
	}
	
	public function print_transaction()
	{
		
		$this->load->model('chz_model');
		
		$trans_id = $this->session->userdata('transaction_id');
		$data['detail'] = $this->chz_model->get_item_trans($trans_id);
		$data['trans_detail'] = $this->chz_model->get_detail_trans($trans_id);
		
		$this->load->view('print_out', $data);
		$html = '';
		$html .= $this->load->view('print_out',$data, true);
		
		$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
		
		$pdf->SetTitle('Apotek Kamaduk');
		$pdf->SetAutoPageBreak(false);
		$pdf->SetAuthor('Prima Winangun');
		$pdf->SetDisplayMode('real', 'default');
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetMargins(0, 0, 0);
		$pdf->AddPage();
		
		$pdf->writeHTML($html, true, false, true, false, '');
			
		$pdf->lastPage();
		$pdf->Output('Payment-Bill.pdf', 'I');
		$pdf->Output('Payment-Bill.pdf', 'I');
		redirect('chz/transaction/index');
	}
	
	
	public function report()
	{
		$this->load->model('chz_model');
		
		$user = $this->session->userdata('login_data');
		
		$data['sidebar'] = 'chz_report';
		$data['main_sidebar'] = 'cashier';
		
		if($user->ur_level == 'developer' or $user->ur_position == 'admin')
		{
			$user = 'all';
		} else 
		{
			$user = $user->ur_username;
		}
		
		# Pagination Config
		$config['base_url'] = base_url().'chz/transaction/report'; //set the base url for pagination
		$config['total_rows'] = $this->chz_model->count_report($user); //total rows
		$config['per_page'] = 10; //the number of per page for pagination
		$config['uri_segment'] = 4; //see from base_url. 3 for this case
		$this->pagination->initialize($config);
		$pagination = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		
		$data['transaction'] = $this->chz_model->get_data_transaction($user, $config['per_page'], $pagination);
		
		#print_r($data['transaction']);
		$this->load->view('report', $data);
	}
	
	public function print_report()
	{
		$this->load->model('chz_model');
		
		$user = $this->session->userdata('login_data');
		
		$time = date('Y-m-d', now());
		$data['time'] = date('d F Y', now());
		
		if($user->ur_level == 'developer' or $user->ur_position == 'admin')
		{
			$user = 'all';
		} else 
		{
			$user = $user->ur_username;
		}
		
		$data['transaction'] = $this->chz_model->get_data_all_transaction($user, $time);
		
		$html = '';
		$html .= $this->load->view('chz/report_list',$data, true);
		# Load Helper PDF
		$this->load->helper('sigap_pdf');
		
		# PDF Maker
		$stream = TRUE; 
		$papersize = 'A4'; 
		$orientation = 'landscape';
		$filename = 'Transaction-Report-'.$time;
		$data['filename'] = $filename . '.pdf';
		pdf_create($html, $filename, $stream, $papersize, $orientation, '');
	}
	
	public function detail()
	{
		$this->load->model('chz_model');
		
		$data['sidebar'] = 'chz_report';
		$data['main_sidebar'] = 'cashier';
		
		$trans_id = $this->uri->segment(4);
		$data['trans_detail'] = $this->chz_model->get_detail_trans($trans_id);
		$data['trans_item'] = $this->chz_model->get_item_trans($trans_id);
		
		$this->load->view('report_detail',$data);
	}
	
	public function input_edit()
	{
		$this->load->model('chz_model');
		$profile = $this->session->userdata('login_data');
		
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
					'obt_update_by' => $profile->ur_username,
				);
		$this->chz_model->update_data($id_obat, $data);
		
		redirect('chz/admin/index');
	}
	
	public function chz_list()
	{
		$this->load->model('chz_model');
		
		$data['sidebar'] = 'chz_list';
		$data['main_sidebar'] = 'warehousing';
		
		# Pagination Config
		$config['base_url'] = base_url().'chz/admin/chz_list/'; //set the base url for pagination
		$config['total_rows'] = $this->chz_model->count_obat(); //total rows
		$config['per_page'] = 10; //the number of per page for pagination
		$config['uri_segment'] = 4; //see from base_url. 3 for this case
		$this->pagination->initialize($config);
		$pagination = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		
		$data['obat'] = $this->chz_model->get_data_obat($config['per_page'], $pagination);
		$data['jenis'] = $this->chz_model->get_data_jenis();
		
		#print_r($data);
		
		$this->load->view('chz_list', $data);
	}
	
	public function chz_search()
	{
		$this->load->model('chz_model');
		
		$data['sidebar'] = 'chz_report';
		$data['main_sidebar'] = 'cashier';
		
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
		$config['base_url'] = base_url().'chz/admin/chz_search/'; //set the base url for pagination
		$config['total_rows'] = $this->chz_model->count_report_search($search); //total rows
		$config['per_page'] = 10; //the number of per page for pagination
		$config['uri_segment'] = 4; //see from base_url. 3 for this case
		$this->pagination->initialize($config);
		$pagination = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		
		$data['transaction'] = $this->chz_model->get_data_transaction_search($search, $config['per_page'], $pagination);
		
		$this->load->view('report', $data);
		
	}
	
	public function chz_jenis_search()
	{
		$this->load->model('chz_model');
		
		$data['sidebar'] = 'chz_list';
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
		$config['base_url'] = base_url().'chz/admin/chz_jenis_search/'; //set the base url for pagination
		$config['total_rows'] = $this->chz_model->count_search_jenis($search); //total rows
		$config['per_page'] = 10; //the number of per page for pagination
		$config['uri_segment'] = 4; //see from base_url. 3 for this case
		$this->pagination->initialize($config);
		$pagination = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		
		$data['obat'] = $this->chz_model->get_search_jenis_obat($search, $config['per_page'], $pagination);
		$data['jenis'] = $this->chz_model->get_data_jenis();
		
		$this->load->view('chz_list', $data);
	}
	
	public function edit_data()
	{
		$this->load->model('chz_model');
		
		$data['sidebar'] = 'chz_list';
		$data['main_sidebar'] = 'warehousing';
		$data['obat'] = $this->chz_model->get_detail_obat($this->uri->segment(4));
		$data['jenis'] = $this->chz_model->get_data_jenis();
		
		$this->load->view('edit_data', $data);
	}
	
	public function void_data()
	{
		$this->load->model('chz_model');
		
		$this->chz_model->void_data($this->uri->segment(4));
		
		redirect('chz/admin/chz_list');
	}
	
	public function return_transaction()
	{
		$data['transaction'] = NULL;
		$data['sidebar'] = 'chz_return';
		$data['main_sidebar'] = 'cashier';
		$this->load->view('return_transaction', $data);
	}
	
	public function search_transaction()
	{
		$this->load->model('chz_model');
		# Search Input Post
		if ($this->input->post('trans_id') != NULL)
		{
			$this->session->set_flashdata('transaction_code', $this->input->post('trans_id'));
			$search = $this->input->post('trans_id');
		} else { 
			$search = $this->session->flashdata('transaction_code');
			$this->session->keep_flashdata('transaction_code');
		}
		
		$data['transaction'] = $this->chz_model->search_transaction($search);
		
		$data['sidebar'] = 'chz_return';
		$data['main_sidebar'] = 'cashier';
		$this->load->view('return_transaction', $data);
	}
	
	public function return_item()
	{
		$this->load->model('chz_model');
		$time = date('Y-m-d', now());
		$item = $this->chz_model->get_return_item_detail($this->uri->segment(4));
		if ($this->input->post('aptd_jum') <= $item->obt_jumlah)
		{
			$cashback = ($item->obt_jual*$this->input->post('jumlah'))- $item->discount;
			if(date('Y-m-d', strtotime($item->paid_date)) != $time)
			{
				$cashback = $cashback - ($cashback/10);
			}
			
			$stock = $item->obt_jumlah + $this->input->post('jumlah');
			
			//$this->chz_model->return_item($this->uri->segment(4),$this->input->post('jumlah'), $item->id_obat, $stock);
			//$this->chz_model->detail_return_item($item, $this->session->flashdata('transaction_code'), $cashback);
			$this->session->keep_flashdata('transaction_code');
			redirect('chz/transaction/print_return/');
		}
		$this->session->keep_flashdata('transaction_code');
		//redirect('chz/transaction/return_transaction/');
	}
	
	public function print_return()
	{
		
		$this->load->model('chz_model');
		
		$trans_id = $this->session->flashdata('transaction_code');
		$data['transaction'] = $this->chz_model->search_transaction($trans_id);
		
		$this->load->view('print_return', $data);
		$html = '';
		/*$html .= $this->load->view('print_return',$data, true);
		
		$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
		
		$pdf->SetTitle('The Banjar Bali');
		$pdf->SetAutoPageBreak(false);
		$pdf->SetAuthor('Prima Winangun');
		$pdf->SetDisplayMode('real', 'default');
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetMargins(0, 0, 0);
		$pdf->AddPage();
		
		$pdf->writeHTML($html, true, false, true, false, '');
			
		$pdf->lastPage();
		$pdf->Output('Payment-Bill.pdf', 'I');
		redirect('chz/transaction/index');*/
	}
	
	}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */