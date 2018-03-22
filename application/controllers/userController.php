<?php

	class userController extends CI_Controller
	{

	  	public function __construct()
	    {
	    	parent::__construct();
	        $this->load->model('userModel');
	        $this->load->helper('url_helper');
	         $this->load->helper('url');
	    }

		public function rejestracja()
		{
			$data['header'] = $this->load->view('header','',TRUE);
			$this->load->view('rejestracjaView',$data);
		}
		public function logowanie()
		{
			$data['header'] = $this->load->view('header','',TRUE);
			$this->load->view('logowanieView',$data);
		}
		public function skryptrejestracja()
		{
			$data = array(
				'imie' => $this->input->post('imie'),
				'nazwisko' => $this->input->post('nazwisko'),
				'miejscowosc' => $this->input->post('miejscowosc'),
				'adres' => $this->input->post('adres'),
				'kod_pocztowy' => $this->input->post('kodpocztowy'),
				'poczta' => $this->input->post('poczta'),
				'wiek' => $this->input->post('wiek'),
				'województwo' => $this->input->post('woj'),
				'login' => $this->input->post('login'),
				'haslo' => $this->input->post('haslo'));

				 $this->userModel->skryptrej($data);
		}

		public function wyloguj()
		{
			$this->userModel->wylogowanieskrypt();
		}

		public function skryptlogowanie()
		{
			$data = array(
				'login' => $this->input->post('login'),
				'haslo' => $this->input->post('haslo'));
				//print_r($data['login']);
				 $this->userModel->skryptlog($data);
		}
	}
?>
