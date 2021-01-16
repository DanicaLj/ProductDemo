<?php

class Connection{

    protected $host;
    protected $user;
    protected $pass;
    protected $database;

    public function __construct($host = 'localhost', $user = 'root', $pass = '', $database = 'test'){
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->database = $database;
    }

    public function dbConnect(){
        
        $pdo=new PDO('mysql:host='.$this->host.';dbname='.$this->database,$this->user,$this->pass);
        return $pdo;
    }
    
}
?>
