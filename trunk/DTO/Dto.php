<?php
require_once '../library/DataProvider.php';

abstract class Dto {
    
    /**
     * Tên bảng muốn kết nối và khở tạo Dto
     * @var string
     */
    protected $_table;
    
    /**
     * Phương thức khởi tạo kết nối và tạo 
     * các thuộc tính cho đối tượng Dto
     * 
     * @param void
     * @return void
     */
    public function Dto() {
        $query = "SELECT * FROM $this->_table";
        $mysql = new DataProvider();
        $result = $mysql->ExecuteQuery($query);
        while($fields = mysql_fetch_field($result)) {
            if($fields->numeric) {
                $this->{$fields->name} = 0;
            }else{
                $this->{$fields->name} = "";
            }
        }
        $mysql->Close();
        $this->init();
    }
    
    /**
     * Phương thức này cho phép kế thừa
     * 
     * @param void
     * @return
     */
    public function init() {
        
    }
    
    public function __set($key, $value){
        $this->{$key} = $value;
    }
    
    public function __get($key) {
        if(property_exists($this,$key)){
            return $this->{$key};
        }
        return null;
    }
    
    public function getTableName(){
        return $this->_table;
    }
}
?>