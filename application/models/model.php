<?php
class model extends CI_Model
{
    public function InsertDataNazionale($array){
        $errore = NULL;
        $this->db->query("delete from andamentonazionale");
        $this->db->trans_start();
        foreach($array as $vet)
        {
            $query = $this->db->query("insert into andamentonazionale values (?,?,?,?,?,?,?,?,?,?,?,?)",$vet);

            $e = $this->db->error();
            if($e['code'] != 0)
            {
              $errore = $e['message'];
            }
        }
        $this->db->trans_complete();
        return $errore;
    }

    public function InsertDataProvincia($array){
        $errore = NULL;
        $this->db->query("delete from province");

        $this->db->trans_start();
        foreach($array as $vet)
        {
            $query = $this->db->query("insert into province(data,stato,codice_regione,denominazione_regione,codice_provincia,denominazione_provincia,sigla_provincia,latitudine,longitudine,totale_casi) values (?,?,?,?,?,?,?,?,?,?)",$vet);

            $e = $this->db->error();
            if($e['code'] != 0)
            {
              $errore = $e['message'];
            }
        }
        $this->db->trans_complete();
        return $errore;
    }

    public function InsertDataRegioni($array){
        $errore = NULL;
        $this->db->query("delete from regioni");

        $this->db->trans_start();
        foreach($array as $vet)
        {
            $query = $this->db->query("insert into regioni(data,stato,codice_regione,denominazione_regione,latitudine,longitudine,ricoverati_con_sintomi,terapia_intensiva,totale_ospedalizzati,isolamento_domiciliare,totale_attualmente_positivi,nuovi_attualmente_positivi,dimessi_guariti,deceduti,totale_casi,tamponi) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",$vet);

            $e = $this->db->error();
            if($e['code'] != 0)
            {
              $errore = $e['message'];
            }
        }
        $this->db->trans_complete();
        return $errore;
    }

    public function GetDataNazione()
    {
        $query = $this->db->query("select * from andamentonazionale");
        return $query->result();
    }

    public function GetDataProvince()
    {
        $query = $this->db->query("select * from province");
        return $query->result();
    }
    public function GetProvince()
    {
        $query = $this->db->query("select denominazione_provincia from province GROUP by codice_provincia order by denominazione_provincia;");
        return $query->result();
    }

    public function GetDataProvincia($provincia)
    {
        $sql ="select * from province where denominazione_provincia = ?";
        $result = $this->db->query($sql,array($provincia));
        return $result->result();

    }

    public function GetRegioni()
    {
        $query = $this->db->query("select denominazione_regione from regioni GROUP by codice_regione order by denominazione_regione;");
        return $query->result();
    }

    public function GetDataRegione($regione)
    {
        $sql ="select * from regioni where denominazione_regione = ?";
        $result = $this->db->query($sql,array($regione));
        return $result->result();

    }
}



?>