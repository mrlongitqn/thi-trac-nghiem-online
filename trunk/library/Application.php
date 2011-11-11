<?php
class Application{
    
    private $baseUrl="";
    private $config="";
    
    public function Application($config=NULL) {
        $this->baseUrl = $this->baseUrl();
        $this->config = $config;
    }
    
    public function baseUrl() {       
        $proto = explode("/", $_SERVER['SERVER_PROTOCOL']);
        $proto = strtolower($proto[0]);
        $url = $proto.'://'.$_SERVER['HTTP_HOST'];
        return $url;
    }
    
    public function run() {
        require_once '../GUI/index.php';
    }
}
?>
