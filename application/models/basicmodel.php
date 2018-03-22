<?php

class basicmodel extends CI_Model {

  public function __construct()
          {
                  parent::__construct();
                    $this->load->database();
          }

  public function all()
  {
     return $this->db->count_all("uzytkownicy");

  }
  public function jeden($page)
  {
     $query = $this->db->get('uzytkownicy');
     return $query->row($page);
  }

  public function fetch_countries($limit, $start) {
          $this->db->limit($limit, $start);
          $query = $this->db->get("uzytkownicy");

          if ($query->num_rows() > 0) {
              foreach ($query->result() as $row) {
                  $data[] = $row;
              }
              return $data;
          }
          return false;
     }

}

 ?>
