<?php 


class DBController {

    protected $host = 'localhost';
    protected $utilizator = 'root';
    protected $parola = '';
    protected $bazaDate = 'biofooddb';


    // proprietatea de conexiune con
    public $con = null;

    public function __construct(){
        $this->con = mysqli_connect($this->host, $this->utilizator, $this->parola, $this->bazaDate);
        if($this->con->connect_error){
            echo "Fail".$this->con->connect_error;
        }
    }

    public function __destruct(){
        $this->inchideConexiune();
    }

    protected function inchideConexiune(){
        if($this->con != null){
            $this->con->close();
            $this->con = null;
        }
    }
} 



?>