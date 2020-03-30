<?php
class model extends CI_Model
{
    public function InsertDataNazionale($array){
        
        $errore = NULL;
        $this->db->query("delete from andamentonazionale");
        $this->db->trans_start();
        foreach($array as $vet)
        {
            $vet = array_slice($vet,0,12);
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
        //$this->db->query("delete from province");
        for ($i = 0; $i <128; $i++)
        {
            $prov[$i] = array();
            $prov[$i] = $array[$i];
        }
        //$prec = array_slice($array[1],1,8);

        $this->db->trans_start();
        foreach($prov as $vet)
        {
            //$vet = array_slice($vet,1,8);
            
            //$dat
            $d=array();
            $d[0] = $vet['codice_provincia'];
            $d[1] = $vet['stato'];
            $d[2] = $vet['codice_regione'];
            $d[3] = $vet['denominazione_provincia'];
            $d[4] = $vet['sigla_provincia'];
            $d[5] = $vet['lat'];
            $d[6] = $vet['long'];
            $query = $this->db->query("insert into provincia values (?,?,?,?,?,?,?)",$d);
            

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
        $this->db->query("delete from regione");
        
        //$reg = array_slice($array[1],1,8);

        for ($i = 0; $i <21; $i++)
        {
            $reg[$i] = array();
            $reg[$i] = $array[$i];
        }
        //$reg = array_slice($array[1],1,8);

        $this->db->trans_start();
        foreach($reg as $vet)
        {   
            $d=array();
            $d[0] = $vet['codice_regione'];
            $d[1] = $vet['denominazione_regione'];
            $d[2] = $vet['stato'];                             
            $d[3] = $vet['lat'];
            $d[4] = $vet['long'];
            $query = $this->db->query("insert into regione values (?,?,?,?,?)",$d);

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