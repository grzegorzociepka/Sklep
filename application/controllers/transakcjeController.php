<?php

	class transakcjeController extends CI_Controller
	{

	  	public function __construct()
	    {
	    	parent::__construct();
	        $this->load->model('transakcjeModel');
	        $this->load->helper('url_helper');
					$this->load->library('cart');
					$this->load->helper('form');
					$this->load->library('session');
	    }
public function kup()
{
		$this->transakcjeModel->transakcja();
	  header('Location: /CI');
}

}
