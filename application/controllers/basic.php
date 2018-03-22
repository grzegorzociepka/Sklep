<?php

class basic extends CI_Controller {

  public function __construct()
          {
          parent::__construct();
          $this->load->model('basicmodel');
          $this->load->helper('url_helper');
          $this->load->library('pagination');
          $this->load->helper("url");
          }


  public function index()
  {
    $config=array();
    $config['base_url'] = '/CI/index.php/page/';
    $config['total_rows'] = $this->basicmodel->all();
    $config['per_page'] = 1;
    $config['display_pages'] = TRUE;
    $this->pagination->initialize($config);
           if(empty($this->uri->segment(2)))
           {
             $page=0;
           }
           else
           {
           $page=$this->uri->segment(2) ;
         }

           $data["sklep"] = $this->basicmodel->
           jeden( $page);
           $data["links"] = $this->pagination->create_links();
           $this->load->view("start", $data);
  }

}

?>
