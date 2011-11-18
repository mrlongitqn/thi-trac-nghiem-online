<?php
require_once 'BUS/Table.php';
class Application {
    
    const ADMIN = 1;
    const GUEST = 0;
    private $baseUrl;
    private $page = "default";
    private $action = "index";
    
    public function __construct() {
        $this->baseUrl = $this->getBaseUrl();
        if(isset($_GET['page'])) {
            $this->page = $_GET['page'];
        }
        if(isset($_GET['action'])) {
            $this->action = $_GET['action'];
        }
    }
    
    public function main() {
        session_start();
        
        //Permission for page admin
        if($this->page == "admin") {
            if(!isset($_SESSION['user'])) {
                $this->action = "login";
            }else{
                $id = $_SESSION['user']['id'];
                $busUser = new BUS_Table('users');
                $user = $busUser->Find("id= '$id'");
                if($user->level != self::ADMIN) {
                    $this->action = "login";
                }
            }
        }
        
        //Permission for page default
        
        $filename = WEB_ROOT. "/app/GUI/".$this->page."/".$this->action.".php";
        if(file_exists($filename)) {
            require_once $filename;
        }else{
            require_once WEB_ROOT.'/app/GUI/default/error.php';
        }
        
        /*session_destroy();*/
    } 
    
    public function getBaseUrl() {
        $proto = explode('/',$_SERVER['SERVER_PROTOCOL']);
        $self = str_replace("index.php", "", $_SERVER['PHP_SELF']);
        $url = strtolower($proto[0])."://".$_SERVER['HTTP_HOST'].$self;
        return $url;
    }   
}
?>