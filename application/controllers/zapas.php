<?php

	class userController extends CI_Controller 
	{

	  	public function __construct()
	    {
	    	parent::__construct();
	        $this->load->model('userModel');
	        $this->load->helper('url_helper');
	    }

		public function index()
		{

			if(!isset($_GET['per_page']))
	    	{
	    		$_GET['per_page']=0;
	    	}	    	

			$this->load->library('pagination');
			$config['base_url'] = './index.php';			
			$config['total_rows'] = $this->userModel->allUserCount();
			$config['per_page'] = 4;
			$config['page_query_string'] = TRUE;
			$this->pagination->initialize($config);
			
			$data['uzytkownicy'] = $this->userModel->pageUser($_GET['per_page']);
						
			$this->load->view('userView',$data);			
		}
	}
?>