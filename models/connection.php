<?php
class Connection{
    private String $host = 'HOST';
    private String $user = 'USERNAME';
    private String $password = 'PASSWORD';
    private String $dbName = 'DATABASE NAME';
    
    protected $con;

    public function __construct(){
        $this->con = new PDO('mysql:host='.$this->host.';dbname='.$this->dbName, $this->user, $this->password);
        $this->con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }

    protected function getColumnsDB($table, $columns){
        $getColumnsQuery = $this->con->prepare("SELECT COLUMN_NAME as item FROM information_schema.columns WHERE table_schema = '$this->dbName' AND table_name = '$table'");
        $getColumnsQuery->execute();
        $validateTable = $getColumnsQuery->fetchAll(PDO::FETCH_ASSOC);

        if(empty($validateTable)){
            $error = array('error', 'The table doesn\'t exists');
            return $error;
        }else{
            if($columns[0] === '*'){
                array_shift($columns);
            }

            $sum = 0;

            foreach($validateTable as $key => $value){
                $sum += in_array($value['item'], $columns);
            }

            if($sum !== count($columns)){
                $error = array(
                    'status' => 'error', 
                    'results' => 'A column doesn\'t exists'
                );
                return $error;
            }
        }

    }
}