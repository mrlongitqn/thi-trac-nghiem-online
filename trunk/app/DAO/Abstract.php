<?php
require_once "/../DataProvider.php";
require_once "/../DTO/Table.php";

abstract class DAO_Abstract {
    
    /**
     * Name for table
     * @var string $_name table
     */
    protected $_name;
    
    /**
     * Initialize method for class DAO_Talbe
     * @param string $name
     * @return void
     */
    public function __construct($name){
        $this->_name = $name;
    }
    
    /**
     * Insert DTO Object into table $_name
     * 
     * @param Dto|Array $data
     * @return int $id generated  from previous INSERT
     */
    public function Insert($dto) {        
        $fields = ""; $values = "";
        foreach($dto as $key=>$value) {
            if(!empty($value)) {
                $fields = $fields.$key.",";
                $values = $values."'".$value."',";
            }
        }
        $fields = substr($fields, 0, -1);
        $values = substr($values, 0, -1);
        $query = "INSERT INTO $this->_name($fields) VALUES($values)";
        $db = new DataProvider();
        $result = $db->Query($query);
        if($result) {
            $result = $db->getInsertId();
        }
        $db->Close();
        return $result;
    }
    
    /**
     * Delete rows in table
     * 
     * @param string $where
     * @return bool
     */
    public function Delete($where = "") {
        $query = "DELETE FROM $this->_name";
        if(!empty($where)) {
            $query = $query." WHERE ".$where;
        }        
        $db = new DataProvider();
        $result = $db->Query($query);
        if(!empty($where)) {
            $db->Query("ALTER TABLE {$this->_name} AUTO_INCREMENT =1");
        }
        $db->Close();
        return $result;
    }
    
    /**
     * Update for table
     * 
     * @param Dto|Array $dto data need update
     * @param string $where
     * @return bool
     */
    public function Update($dto, $where = "1=1") {        
        $set = "";
        $temp = array();
        foreach($dto as $key => $value) {
            if(!empty($value)) {
                $temp[] = "{$key} = '{$value}'";
            }
        }
        $set = implode(',',$temp);
        $query = "UPDATE {$this->_name}
                  SET {$set}
                  WHERE {$where}";
        $db = new DataProvider();
        $result = $db->Query($query);
        $db->Close();
        return $result;
    }
    
    /**
     * Find data in table
     * 
     * @param string $where
     * @param string $limit
     * @param string $order
     * @return array DTO_Object
     */
    public function Find($where = "", $limit="", $order="") {
        $query = "SELECT *
                  FROM {$this->_name}";       
        if(!empty($where)) {
            $query.=" WHERE {$where}";
        }
        if(!empty($limit)) {
            $query.=" LIMIT {$limit}";
        }
        if(!empty($order)) {
            $query.= " ORDER BY {$order}";
        }
        $db = new DataProvider();
        $result = $db->Query($query);
        $db->Close();
        $listDTO = new ArrayObject();
        while($obj = mysql_fetch_object($result)) {
            $dto = new DTO_Talbe($this->_name,$obj);
            $listDTO[] = $dto;
        }
        
        if(mysql_num_rows($result) == 0) {
            return NULL;
        }
        
        if(mysql_num_rows($result) == 1) {
            return $listDTO[0];
        }
        return $listDTO;
    }
    
    /**
     * count number of row in the table
     * 
     * @param void
     * @return int
     */
    public function TotalRow() {
        $query = "SELECT * FROM $this->_name";
        $db = new DataProvider();
        $result = $db->Query($query);
        $db->Close();
        return $db->NumRow($result);
    }
}
?>