<?php
require_once 'Dao.php';

class Answer_Dao implements Dao{
    
    public function Insert(Dto $obj){
        return $obj;
    }
    
    public function Delete($id=0){
        
    }
    
    public function Update($id, $data = array()){
        
    }
    
    public function Find($id=0){
        
    }
    
    public function ListAll(){
        
    }
}
?>