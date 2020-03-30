<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		/*
		$json = file_get_contents('https://raw.githubusercontent.com/pcm-dpc/COVID-19/master/dati-json/dpc-covid19-ita-andamento-nazionale.json');
		$obj = json_decode($json,true);
		
		if($this->model->InsertDataNazionale($obj)!=NULL)
		{
			$this->load->view('errore');
		}
		*/	
		$json = file_get_contents('https://raw.githubusercontent.com/pcm-dpc/COVID-19/master/dati-json/dpc-covid19-ita-regioni.json');
		$obj = json_decode($json,true);
		
		if($this->model->InsertDataRegioni($obj)!=NULL)
		{
			$this->load->view('errore');
		}

		$json = file_get_contents('https://raw.githubusercontent.com/pcm-dpc/COVID-19/master/dati-json/dpc-covid19-ita-province.json');
		$obj = json_decode($json,true);
		
		if($this->model->InsertDataProvincia($obj)!=NULL)
		{
			$this->load->view('errore');
		}


		
		
		//preparo i dati per grafico donut
		$data = $this->model->GetDataNazione();
		$oggi =  end($data);
		
		$string = array(
			"dimessi_guariti" => $oggi->dimessi_guariti,
			"deceduti" => $oggi->deceduti,
			"totale_casi" => $oggi->totale_casi,
		);
		$x['data'] = (object)($string);
		
		$this->load->view('header');
		$this->load->view('home',$x);

		//dati per mappa
		$d['data'] = json_encode(file_get_contents('https://raw.githubusercontent.com/pcm-dpc/COVID-19/master/dati-json/dpc-covid19-ita-province.json'));
		//$this->load->view('header');
		$this->load->view('mappa',$d);
		$this->load->view('footer');
	}

	public function datiNazionale()
	{
		$data = $this->model->GetDataNazione();
		
		$x['data'] = json_encode($data);
		
		$this->load->view('header');
		$this->load->view('viewdataNazionale',$x);
		$this->load->view('footer');
	}

	public function datiProvice()
	{
		/*
		$data = $this->model->GetDataProvince();
		$x['data'] = json_encode($data);
		
		$this->load->view('header');
		$this->load->view('viewdataProvince',$x);*/

		//prendo tutte le province
		$data['dato'] = $this->model->GetProvince();
		$this->load->view('header');

		$this->load->view('selectProvincia',$data);
		$this->load->view('footer');
	}

	public function selectProvince()
	{
		$provincia = $this->input->post('provincia');

		$data = $this->model->GetDataProvincia($provincia);
		$x['data'] = json_encode($data);
		
		$this->load->view('header');
		$this->load->view('viewdataProvince',$x);
		$this->load->view('footer');

	}

	public function datiRegioni()
	{
		$data['dato'] = $this->model->GetRegioni();
		$this->load->view('header');
		$this->load->view('selectRegione',$data);
		$this->load->view('footer');

	}

	public function selectRegione()
	{
		
		$regione = $this->input->post('regione');
		
		$data = $this->model->GetDataRegione($regione);
			
		
		$x['data'] = json_encode($data);
		$this->load->view('header');
		$this->load->view('viewdataRegioni',$x);
		$this->load->view('footer');
	}
}
