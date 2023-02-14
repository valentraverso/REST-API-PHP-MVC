<?php
class Connection{
    private String $host = 'host';
    private String $user = 'username';
    private String $password = 'password';
    private String $dbName = 'databasename';
    
    protected $con;

    function __construct(){
        $this->con = new PDO('mysql:host='.$this->host.';dbname='.$this->dbName, $this->user, $this->password);
    }
}
?>