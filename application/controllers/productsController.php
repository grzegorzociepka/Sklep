<?php

	class productsController extends CI_Controller
	{

	  	public function __construct()
	    {
	    	parent::__construct();
	        $this->load->model('productsModel');
					$this->load->model('transakcjeModel');
	        $this->load->helper('url_helper');
					$this->load->library('cart');
					$this->load->helper('form');
					$this->load->library('session');
					$this->load->library('pagination');

					$this->load->library('pagination');

					$config['base_url'] = './';
					$config['total_rows'] = 4;
					$config['per_page'] = 1;
					$this->pagination->initialize($config);
	    }

		public function adminpanel()
		{

			if ($this->session->userdata['username']=='admin')
			{
			$data['header'] = $this->load->view('header','',TRUE);
			$data['kategorie'] = $this->kategorie();
			$data['podKategorie'] = '';
			$data['podKategorie'] = $this->podKategorie(1,FALSE);
			$data['zamowienia'] = $this->zamowienia();
			$data['status'] = '';
			$data['status'] = $this->statusy(1,FALSE);

			$this->load->view('menuView',$data);
		}
else{
	header('Location: ./');
}
	}

public function single()
{
	$data['header'] = $this->load->view('header','',TRUE);
	$this->load->view('header','');
	$dane=$this->productsModel->single();

	$data=$this->load->view('produktViewv2', $dane[0]);

$this->load->view('SingleView',$data);
}

			public function towary()
			{
				$dane=$this->productsModel->wyswietl();
				$data='';
				$this->load->view('header','');


				$data['kategorie'] = $this->kategorie();
				$data['podKategorie'] = '';
				$data['podKategorie'] = $this->podKategorie(1,FALSE);
				$this->load->view('menukatView',$data);

				$data='';

				for($i=0;$i<count($dane);$i++)
				{
					$data=$this->load->view('produktView', $dane[$i]);
				}
		$this->load->view('produktyView',$data);

			}

public function konkretnetowary()
{

	$data = array('podkategorieID' => $this->input->post('podKat')
	);

$dane=$this->productsModel->konkretnyproduct($data);

$this->load->view('header','');


$data['kategorie'] = $this->kategorie();
$data['podKategorie'] = '';
$data['podKategorie'] = $this->podKategorie(1,FALSE);
$this->load->view('menukatView',$data);

$data='';


for($i=0;$i<count($dane);$i++)
{
	$data=$this->load->view('produktView', $dane[$i]);
}
$this->load->view('produktyView',$data);

}

		public function kategorie()
		{
			$dane=$this->productsModel->allKategorie();
			//print_r($query->result());
			$data='';
			foreach ($dane as $kat)
			{
				$data=$data.'<option value="'.$kat->kategorieID.'">'.$kat->nazwa.'</option>';
			}
			return $data;
		}

		public function zamowienia()
		{
			$dane=$this->productsModel->zamowienia();
			$data='';
			foreach ($dane as $zam)
			{
				$data=$data.'<option value="'.$zam->transakcjeID.'">'.$zam->transakcjeID.'</option>';
			}
			return $data;
		}

public function edycjapr()
{
	$data['header'] = $this->load->view('header','',TRUE);
	$data['kategorie'] = $this->kategorie();
	$data['podKategorie'] = '';
	$data['podKategorie'] = $this->podKategorie(1,FALSE);

	$dane=$this->productsModel->single();

$this->load->view('edycjaView',$data);
$data['form']=$this->load->view('formedycjaproduktuView', $dane[0]);
}

		public function edycjaproduktu()
		{
			$dane=$this->productsModel->wyswietl();
			$data='';
			$this->load->view('header','');

			for($i=0;$i<count($dane);$i++)
			{
				$data=$this->load->view('produktedycjaView', $dane[$i]);
			}
	$this->load->view('edycjaproduktuView',$data);

		}

		public function statusy($idzam=1,$wys=TRUE)
		{

			if($wys)
			{
				$idzam=($this->uri->segment(2)) ? $this->uri->segment(2) : 0;;
			}
			$dane=$this->productsModel->zamowienia($idzam);
			$data='';
			foreach ($dane as $zam)
			{
				$data=$data.'<option value="'.$zam->status_transakcjiID.'">'.$zam->status_transakcjiID.'</option>';
			}
			if($wys)
			{
				echo $data;
			}
			else
			{
				return $data;
			}
		}
		public function podKategorie($idKat=1,$wys=TRUE)
		{
			if($wys)
			{
				$idKat=($this->uri->segment(2)) ? $this->uri->segment(2) : 0;;
			}
			$dane=$this->productsModel->podKategorie($idKat);
			$data='';
			foreach ($dane as $podKat)
			{
				$data=$data.'<option value="'.$podKat->podkategorieID.'">'.$podKat->nazwapk.'</option>';
			}
			if($wys)
			{
				echo $data;
			}
			else
			{
				return $data;
			}
		}

		public function dodZdj($name,$podKat)
		        {


		                if ($_FILES['zdj']['type'] != 'image/jpeg' && $_FILES['zdj']['type'] != 'image/png' && $_FILES['zdj']['type'] != 'image/bmp') {
		                    echo '<h2>Plik nie jest w odpowiednim formacie.</h2>';
												return 0;
		                }

		                $roz = substr($_FILES['zdj']['type'], 6);
		                $imgName = $this->productsModel->productIMG($name, $podKat);
		                $xamppDir='C:/xampp/';
		                //$xamppDir = 'D:/xampp/';//Tu zmienić jak zmieniasz serwer ak. komputer
		                $dirLocal = 'htdocs/CI/files/images/';
		                $lokalizacje = $xamppDir . $dirLocal . $imgName . '.' . $roz;  //$_FILES['zdj']['name']

		                $max_rozmiar = 2 * 1024 * 1024; //MB na bajty
		                if (is_uploaded_file($_FILES['zdj']['tmp_name'])) {
		                    if ($_FILES['zdj']['size'] > $max_rozmiar) {
		                        $data['content'] = '<h2>Błąd! Plik jest za duży!</h2>';
		                        return $data;
		                    } elseif (!move_uploaded_file($_FILES['zdj']['tmp_name'], $lokalizacje)) {
		                        $data['content'] = '<h2>Plik nie może zostac skopiowany do katalogu.</h2>';
		                        return $data;
		                    } else {
		                        //$link=base_url().'application/files/images/'.$imgName.'.'.$roz;
		                        $link = 'files/images/' . $imgName . '.' . $roz;
		                        $this->productsModel->addLinkProductIMG($imgName, $link);
		                        return 0;
		                    }
		                } else {
		                    $data['content'] = '<h2>Wystąpił problem podczas przesyłania pliku.</h2>';
		                    return $data;
		                }

		        }

		public function dodprodukt()
		{
			$br=$this->input->post('cenap')+$this->input->post('cenap')*($this->input->post('vatp')/100);
			$data = array(
				'nazwa' => $this->input->post('nazwap'),
				'opis' => $this->input->post('opisp'),
				'imageLink' => 'files/images/stack.jpg',
				'podkategorieID' => $this->input->post('podKat'),
				'cena_netto' => $this->input->post('cenap'),
				'stawka_vat' => $this->input->post('vatp'),
				'cena_brutto' => $br);

				 $this->productsModel->dodprodukt($data);

				 $this->dodZdj($this->input->post('nazwap'),$this->input->post('podKat'));
				 header('Location: /CI/index.php');
		}
		public function dodkat()
		{
			$data = array(
				'nazwa' => $this->input->post('kNazwa'));

				 $this->productsModel->dodkat($data);
		}
		public function dodpodkat()
		{
			$data = array(
				'nazwapk' => $this->input->post('pkNazwa'),
				'kategorieID' => $this->input->post('Katf'));

				 $this->productsModel->dodpodkat($data);
		}
		public function edytujk()
		{
			$data = array(
				'nazwa' => $this->input->post('nkatn'),
				'kategorieID' => $this->input->post('sKate'));

				 $this->productsModel->edytujk($data);
		}

		public function edytujpk()
		{
			$data = array(
				'nazwapk' => $this->input->post('npkatn'),
				'kategorieID' => $this->input->post('sKate'),
				'podkategorieID' => $this->input->post('spKate'));

				 $this->productsModel->edytujpk($data);
		}

		public function edytujstatus()
		{
			$data = array(
				'zamowienieID' => $this->input->post('zamowienie'),
				'status_transakcjiID' => $this->input->post('status'));
				 $this->productsModel->edytujstatus($data);
		}
		public function formep()
		{
			$br=$this->input->post('cenap')+$this->input->post('cenap')*($this->input->post('vatp')/100);
			$data = array(
				'nazwa' => $this->input->post('nazwap'),
				'opis' => $this->input->post('opisp'),
				'imageLink' => 'files/images/stack.jpg',
				'podkategorieID' => $this->input->post('podKat'),
				'cena_netto' => $this->input->post('cenap'),
				'stawka_vat' => $this->input->post('vatp'),
				'towaryID' => $this->input->post('towaryID'),
				'cena_brutto' => $br);

				 $this->productsModel->edytujprodukt($data);

				 $this->dodZdj($this->input->post('nazwap'),$this->input->post('podKat'));
				 header('Location: ./');
		}

		public function index()
		{
			$data['header'] = $this->load->view('header','',TRUE);
			$this->load->view('basicView',$data);
		}

		public function wyswietlanie()
		{
			$data['header'] = $this->load->view('header','',TRUE);
			$data['towary'] = $this->towary();
			$data['kategorie'] = $this->kategorie();
			$data['podKategorie'] = '';
			$data['podKategorie'] = $this->podKategorie(1,FALSE);


			$this->load->view('produktyView',$data);
		}

		public function SingleView()
		{
			$data['header'] = $this->load->view('header','',TRUE);
			$data['kategorie'] = $this->kategorie();
			$data['podKategorie'] = '';
			$data['podKategorie'] = $this->podKategorie(1,FALSE);
			//$data['towary'] = $this->towary();
			$data['single'] = $this->single();

			$this->load->view('SingleView',$data);
		}

		public function spis()
		{
			$data["dane"]=$this->session->userdata['userID'];
			$dane=$this->productsModel->spis($data);

			$data='';
			foreach ($dane as $spis)
			{ if($spis->transakcjeID==$spis->transakcjeID){
					$data=$data.'<tr>
        <th>'.$spis->transakcjeID.'</th>
        <td>'.$spis->nazwa.'</td>

        <td>'.$spis->nazwa_transakcji.'</td>
        <td>'.$spis->sumaa.' zł</td>
      </tr>';}
			else {echo "dupa";}
			}

			return $data;
		}
public function status()
{
	$data['header'] = $this->load->view('header','',TRUE);
	$data['zamowienie']=$this->spis();
	$this->load->view('statuszamowieniaView',$data);

}
		public function koszyk()
		{
			$data['header'] = $this->load->view('header','',TRUE);
			$this->load->view('koszyk',$data);
		}
		public function dodawanie()
		{
			$dane=$this->productsModel->single();

			$data = array(
				'rowid'		=>'1',
        'id'      => $_GET['sid'],
        'qty'     => 1,
        'price'   => ($dane[0]['cena_brutto']),
        'name'    => ($dane[0]['nazwa']),
        'options' => array('Opis' => ($dane[0]['opis'])),
				'transID' => $this->transakcjeModel->najnowszeID($this->session->userdata['userID'])
);

$this->cart->insert($data);
header('Location: /CI/index.php/SingleView?sid='.$_GET['sid'].'');

		}
		public function czysc()
		{
			$this->cart->destroy();
			header('Location: /CI/index.php/koszyk');
		}
	}
?>
