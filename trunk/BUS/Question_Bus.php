<?php
require_once '../DAO/Question_Dao.php';

class Question_Bus {
    
    public function Insert(Dto $dtoObject=NULL) {
        $QuestionDao = new Question_Dao();
        return $QuestionDao->Insert($dtoObject);
    }
    
    public function Delete($id = 0) {
        $QuestionDao = new Question_Dao();
        return $QuestionDao->Delete($id);
    }
    
    public function Update($id = 0, $dtoObject=NULL) {
        $QuestionDao = new Question_Dao();
        return $QuestionDao->Update($id, $dtoObject);
    }
    
    public function Find($id = 0) {
        $QuestionDao = new Question_Dao();
        return $QuestionDao->Find($id);
    }
    
    public function ShowAll() {
        $QuestionDao = new Question_Dao();
        return $QuestionDao->ShowAll();
    }
}

?>