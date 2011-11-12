<?php
require_once '../DAO/Dao.php';

class Question_Dao extends Dao {
    
    protected $_table = "question";
    
    public function init() {
        //Khởi tạo phương thức ở đây
    }
    
    /**
     * Tìm dữ liệu khi biết id
     * 
     * @param int id
     * @return  Object
     */
    public function Find($id=0) {
        $query = "SELECT *
                  FROM $this->_table
                  WHERE ID=$id";
        $result = $this->_db->ExecuteQuery($query);
        if($result) {
            $obj = new Question_Dto();
            $row = mysql_fetch_array($result, MYSQL_ASSOC);
            foreach($row as $key=>$value) {
                $obj->$key = $value;
            }
            return $obj;
        }
        return $result;  
        
    }
    
    /**
     * Lấy toàn bộ dữ liệu trong cơ sở dữ liệu
     * 
     * @param void
     * @return arrayObject Dto
     */
    public function ShowAll() {
        $query = "SELECT *
                  FROM $this->_table";
        $result = $this->_db->ExecuteQuery($query);
        $arrayObj = new ArrayObject();
        while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
            $temp = new Question_Dto();
            foreach($row as $key=>$value) {
                $temp->$key = $value;
            }
            $arrayObj[] = $temp;
        }
        return $arrayObj;
    }
    
    /**
     * Lấy dữ liệu theo giới hạn định ra bằng $start và $offset
     * 
     * @param int start vị trí bắt đầu
     * @param int offset số lượng dòng muốn lấy
     * @return arrayObject Dto
     */
    public function ShowPage($start = 0, $offset = 0) {
        return NULL;
    }
}
?>