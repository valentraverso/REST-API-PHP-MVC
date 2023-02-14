<?php
class Connection{
    private String $host = '89.116.147.1';
    private String $user = 'u304217618_lirfe0505';
    private String $password = 'Pavon028';
    private String $dbName = 'u304217618_lirfe';
    
    protected $con;

    function __construct(){
        $this->con = new PDO('mysql:host='.$this->host.';dbname='.$this->dbName, $this->user, $this->password);
    }
}