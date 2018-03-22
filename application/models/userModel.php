<?php
  class userModel extends CI_Model
  {
    public function __construct()
    {
      parent::__construct();
      $this->load->database();
      $this->load->library('session');
    }

    public function allUser()
    {
      $query = $this->db->get('konta');
      return $query->result();
    }

    public function allUserCount()
    {
      $query = $this->db->query("SELECT count(*) AS liczba FROM uzytkownicy");
      return $query->row('liczba');
    }

    public function pageUser($fIndex)
    {
      $query = $this->db->query("SELECT * FROM uzytkownicy LIMIT 4 OFFSET $fIndex");
      return $query->result();
    }
    public function skryptrej($data)
    {
      $this->db->insert('konta', $data);
      $this->db->query('INSERT into elementy_transakcji (elementy_transakcjiID, transakcjeID, towaryID, ilosc,cena_brutto,wartosc,status_elementuID)
      values(NULL,1,1,1,1,1,1)');
$jk=$this->uid();
      $this->db->query('INSERT into transakcje (transakcjeID, kontoID, data, status_transakcjiID) values(NULL, '.$jk.', CURRENT_TIMESTAMP, 1)');

      header('Location: ./');
    }
public function uid()
  {
    $query=$this->db->query('SELECT MAX(kontoID) as id FROM `konta` ');
    $h=$query->row('id');

    return $h;
  }

    public function wylogowanieskrypt()
    {
      $this->session->unset_userdata('username');
      $this->session->unset_userdata('logged_in');
      header('Location: ./');
    }

    public function skryptlog($data)
    {

      $query = $this->db->query("SELECT * FROM konta where
      login='".$data["login"]."' AND
       haslo='".$data["haslo"]."'");

$row = $query->row();

 echo $row->imie;

   if ( $query->num_rows() > 0 )
   {
     $newdata = array(
      'username'  => $row->login,
      'userID' => $row->kontoID,
      'logged_in' => TRUE
);
$this->session->set_userdata($newdata);
header('Location: ./');
   }

   else {
     echo "Zle dane";
   }
    }

  }
?>
