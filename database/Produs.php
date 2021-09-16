<?php 
require_once "conexiune.php";

class Produs{

    public $db = null;

    public function __construct(DBController $db){
        if(!isset($db->con)) return null;
        $this->db = $db;

    }

    // preluare date produs folosind metoda getData
    public function getData($tabela){
        $rezultat = $this->db->con->query(query:"select * from $tabela");


        $listaRezultata = array();

        //fetch data una cate una
        while($data = mysqli_fetch_array($rezultat, MYSQLI_ASSOC)){
            $listaRezultata[]=$data;
        }

        return $listaRezultata;

    }
    
    
}
?>