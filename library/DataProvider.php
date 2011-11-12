<?php
require_once 'Application.php';

class DataProvider{
    
    private $connect;
    
    public function DataProvider() {
        //Read file config.ini
        $filename = realpath('../config.ini');
        $config = parse_ini_file($filename, true);
        $mysql = $config['mysql'];
        
        //Set property for class
        foreach($mysql as $key=>$value) {
            $this->{$key} = $value;
        }
        
        //Connect to server
        $this->connect = mysql_connect($this->hostname,$this->username. $this->password);
        if(!$this->connect) {
            die("Couldn't connect to server ".$this->hostname);
        }
        
        //Select database
        $select = mysql_selectdb($this->database_name,$this->connect);
        if(!$select){
            die("Error: ".mysql_error($this->connect));
        }
    }
    
    public function ExecuteQuery($query){
        mysql_query("SET NAMES 'utf8'");
        $result = mysql_query($query,$this->connect) or
                    die("Error: ".mysql_error());
        return $result;
    }
            
    public function Close() {
        $x = mysql_close($this->connect);
        if(!$x) {
            die("Error: ".mysql_error($this->connect));
        }
        return $x;
    }
}
?>