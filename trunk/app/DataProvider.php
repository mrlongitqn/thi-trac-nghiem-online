<?php
class DataProvider {
    
    /**
     * var resource
     */
    private $connect;
    
    /**
     * Initialize method for class DataProvider
     * 
     * @param void
     * @return void
     */
    public function __construct() {
        $fileConfig = realpath(dirname(__FILE__))."/config.ini";
        if(!file_exists($fileConfig)) {
            echo "$fileConfig is not exist!";
            return;
        }
        $configs = parse_ini_file($fileConfig, true);
        $mysql = $configs['mysql'];   
        foreach($mysql as $key => $value) {
            $this->{$key} = $value;
        }  
        $this->connect = mysql_connect($this->server, $this->username, $this->password) or
            die("Could not connect to server!");        
        mysql_select_db($mysql['dbname']) or die("Error: ".mysql_error($this->connect));        
        $this->Query("SET NAMES 'utf8'");
    }
    
    /**
     * Query database
     * 
     * @param string $query
     * @return resource $result
     */
    public function Query($query) {
        $result = mysql_query($query, $this->connect) or die("Error: ".mysql_error($this->connect));
        return $result;
    }
    
    /**
     * Get the ID generated from the prevous INSERT operation
     * 
     * @param void
     * @return int $id
     */
    public function getInsertId() {
        return mysql_insert_id($this->connect);
    }
        
    /**
     * Count number of row in table
     * 
     * @param resource $result
     * @return int $number
     */
    public function NumRow($result) {
        $count = mysql_num_rows($result) or die("Error: ".mysql_error($this->connect));
        return $count;
    }
    

    /**
     * Close connect
     * 
     * @param void
     * @return bool true | false
     */
    public function Close() {
        if($this->connect) {
            return mysql_close($this->connect) or die("Error: ".mysql_error($this->connect));
        }
        return NULL;
    }

}

?>