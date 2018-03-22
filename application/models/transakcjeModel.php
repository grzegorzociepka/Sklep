<?php
  class transakcjeModel extends CI_Model
  {
    public function __construct()
    {
      parent::__construct();
      $this->load->database();
      $this->load->library('session');
      $this->load->model('productsModel');
      $this->load->helper('url_helper');
      $this->load->library('cart');
    }

    public function transakcja()
    {

      $this->db->trans_start();

     foreach ($this->cart->contents() as $item)
     {
       $id = $this->db->insert_id();

       $this->db->query('INSERT into elementy_transakcji (elementy_transakcjiID, transakcjeID, towaryID, ilosc,cena_brutto,wartosc,status_elementuID)
       values(NULL,'.$item['transID'].','.$item["id"].','.$item["qty"].','.$item["price"].','.$this->cart->format_number($item['price']).',1)');

     }
  //   $this->db->query('UPDATE transakcje SET status_transakcjiID '.$GLOBALS['j'].'');
     $this->db->query('INSERT into transakcje (transakcjeID, kontoID, data, status_transakcjiID) values(NULL, '.$this->session->userdata['userID'].', CURRENT_TIMESTAMP, 1)');

     $this->db->trans_complete();
    $this->cart->destroy();
    }

public function najnowszeID($userID)
{
  $query=$this->db->query('SELECT MAX(transakcjeID) as id FROM `transakcje` where kontoID='.$userID.'');
  $w=$query->row('id');

  return $w;
}

  }
