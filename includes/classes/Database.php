<?php

class Database {

    public $db_host = "localhost";
    public $db_username = "root";
    public $db_parola = "";
    public $db_nume = "registru_documente";

    public function conectare(){
        return mysqli_connect($this->db_host, $this->db_username, $this->db_parola, $this->db_nume);
    }
}