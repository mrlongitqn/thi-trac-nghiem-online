<?php
require_once "/../DAO/Table.php";
require_once "/../DTO/Table.php";

abstract class BUS_Abstract {
    
    protected $_name;
    
    private $DAO;
    
    /**
     * Initialize method for class BUS_Talbe
     * @param string $name
     * @return void
     */
    public function __construct($name) {
        $this->_name = $name;
        $this->DAO = new DAO_Table($this->_name);
    }
    
    /**
     * Insert data into database
     * 
     * @param array|object $data is an array or an object 
     * match with database table
     * @return bool
     */
    public function Insert($data) {
        //Khoi tao dto
        $dto = new DTO_Talbe($this->_name, $data);
        //Insert
        return $this->DAO->Insert($dto);
    }
    
    public function Delete($where="") {
        return $this->DAO->Delete($where);
    }
    
    public function Update($data, $where = "1=1") {
        return $this->DAO->Update($data, $where);       
    }
    
    public function Find($where = "", $limit="", $order="") {
        return $this->DAO->Find($where, $limit, $order);
    }
}
?>