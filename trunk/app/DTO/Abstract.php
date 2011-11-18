<?php
require_once "/../DataProvider.php";

abstract class DTO_Abstract{  
    /**
     * Name for table
     * @var string $name
     */
    protected $_name;
    
    /**
     * Initialize for class Table
     * 
     * @param string $name table
     * @param array | object content data to init for this class
     * @return void
     */
    public function __construct($name, $data=NULL) {
        $this->_name = $name;
        $db = new DataProvider();
        $result = $db->Query("SELECT * FROM $this->_name");
        while($field = mysql_fetch_field($result)) {
            $this->{$field->name} = NULL;
        }
        $db->Close();
        
        if(!empty($data)) {
            foreach($data as $key => $value) {
                if(property_exists($this,$key)) {
                    $this->{$key} = $value;
                }
            }
        }
    }
}
?>