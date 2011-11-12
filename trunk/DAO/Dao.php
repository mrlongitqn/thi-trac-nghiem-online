<?php
require_once '../library/DataProvider.php';
require_once '../DTO/Dto.php';

abstract class Dao {
    
    /**
     * @var string tên bảng kết nối để tạo lớp DTO
     */
    protected $_table;
    
    /**
     * @var Object DataProvider để kết nối mysql server
     */
    protected $_db;
    
    /**
     * Phương thức khởi tạo 
     * 
     * @param void
     * @return void
     */
    public function __construct() {
        $this->_db = new DataProvider();
        $this->init();
    }
    
    /**
     * Phương thức khởi tạo cho phép kế thừa
     * 
     * @param void
     * @return void
     */
    public function init() {
        
    }
    
    /**
     * Thêm đối tượng Dto vào cơ sở dữ liệu
     * 
     * @param Dto Object
     * @return bool
     */
    public function Insert(Dto $dtoOject = NULL){
        $query = "INSERT INTO $this->_table(";
        $temp =  "VALUES(";
        foreach($dtoOject as $key=>$value) {
            $query = $query."$key,";
            $temp = $temp."'$value',";
        }        
        $query = substr($query,0,-1).") ".substr($temp,0,-1).")";        
        $result = $this->_db->ExecuteQuery($query);
        return $result;
    }
    
    /**
     * Xóa dữ liệu trong cơ sở dữ liệu
     * 
     * @param int id
     * @return bool
     */
    public function Delete($id = 0) {
        $query = "DELETE FROM $this->_table WHERE ID=$id";
        $result = $this->_db->ExecuteQuery($query);
        return $result;
    }
    
    /**
     * Thay đỗi dữ liệu đã tồn tạo
     * 
     * @param int id của đối tượng muốn thay đổi
     * @param Dto dtoObject
     * @return bool
     */
    public function Update($id = 0, Dto $dtoObject = NULL) {
        $query = "UPDATE $this->_table
                  SET ";
        foreach($dtoObject as $key=>$value) {
            $query = $query."$key='$value',";
        }
        $query = substr($query,0, -1). " WHERE ID=$id";        
        return $this->_db->ExecuteQuery($query);
    }
}
?>