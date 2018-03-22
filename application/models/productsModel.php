<?php
  class productsModel extends CI_Model
  {
    public function __construct()
    {
      parent::__construct();
      $this->load->database();
    }

    public function wyswietl($data)
    {
      //$query=$this->db->get('towary');
      $query = $this->db->query('SELECT * FROM towary t
                                  left join podkategorie pk
                                  on t.podkategorieID=pk.podkategorieID

                                  ');
      return $query->result();

    }

    public function allKategorie()
    {
      $query = $this->db->get('kategorie');
      return $query->result();
    }
    public function updatezamowienia()
    {
      $this->db->set('status_transakcjiID',$data['status_transakcjiID']);
      $this->db->where('transakcjeID', $data['transakcjeID']);
      $this->db->update('transakcje');

      header('Location: /CI/index.php');
    }

    public function zamowienia()
    {
      $query = $this->db->query('SELECT * FROM `transakcje` ');
      return $query->result();
    }

    public function podKategorie($idKat)
    {
      $query = $this->db->query('SELECT * FROM `podkategorie` WHERE `kategorieID` = '.$idKat.' ');
      return $query->result();
    }

    public function dodkat($data)
    {
    	$this->db->insert('kategorie', $data);
      header('Location: /CI/index.php');
  }
  public function dodpodkat($data)
  {
    $this->db->insert('podkategorie', $data);
    header('Location: /CI/index.php');
}
public function spis($data)
{  $f=$this->session->userdata['userID'];

  $query = $this->db->query('SELECT *,SUM(et.wartosc) as sumaa   FROM elementy_transakcji et
Inner join transakcje t
ON t.transakcjeID=et.transakcjeID
inner join towary tt
on tt.towaryID=et.towaryID
inner join status_transakcji st
ON st.status_transakcjiID=t.status_transakcjiID
WHERE kontoID='.$f.'
group by et.transakcjeID');
$w=$query->result();
  return $w;
}

public function konkretnyproduct($data)
{
  $query = $this->db->query('SELECT * FROM towary t left join podkategorie pk
  on t.podkategorieID=pk.podkategorieID where t.podkategorieID='.$data['podkategorieID'].'');
  $w=$query->result();

  return $w;
}
public function dodprodukt($data)
{
  $this->db->insert('towary', $data);
}

public function productIMG($name, $podKat)
{
  $query = $this->db->query("SELECT * FROM `towary` WHERE `nazwa` = '".$name."' AND `podkategorieID`='".$podKat."' ");
  return $query->row('towaryID');
}
public function addLinkProductIMG($imgName, $link)
{
  $this->db->set('imageLink',$link);
  $this->db->where('towaryID', $imgName);
  $this->db->update('towary');
}
public function edytujk($data)
{
  $this->db->set('nazwa',$data['nazwa']);
  $this->db->where('kategorieID', $data['kategorieID']);
  $this->db->update('kategorie');

  header('Location: /CI/index.php');
}

public function edytujpk($data)
{
  $this->db->set('nazwapk',$data['nazwapk']);
  $this->db->where('podkategorieID', $data['podkategorieID']);
  $this->db->update('podkategorie');

  header('Location: /CI/index.php');
}
public function edytujprodukt($data)
{
  $this->db->set('nazwa',$data['nazwa']);
  $this->db->set('opis',$data['opis']);
  $this->db->set('imageLink',$data['imageLink']);
  $this->db->set('podkategorieID',$data['podkategorieID']);
  $this->db->set('cena_netto',$data['cena_netto']);
  $this->db->set('stawka_vat',$data['stawka_vat']);
  $this->db->set('cena_brutto',$data['cena_brutto']);

  $this->db->where('towaryID', $data['towaryID']);
  $this->db->update('towary');


}
public function edytujstatus($data)
{
  $this->db->set('status_transakcjiID',$data['status_transakcjiID']);
  $this->db->where('transakcjeID', $data['zamowienieID']);
  $this->db->update('transakcje');

  header('Location: /CI/index.php');
}

public function single()
{
  $query = $this->db->query("SELECT t.towaryID,t.podkategorieID,t.nazwa,t.opis,t.cena_brutto,t.imageLink,t.cena_netto,t.stawka_vat  FROM towary t

  WHERE t.towaryID = '".($_GET["sid"])."'");
$w= $query->result_array();
return $w;
}

}
?>
