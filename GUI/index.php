<?php
if(isset($_GET['page'])) {
    $this->page = $_GET['page'];
}
if(isset($_GET['action'])){
        $this->action = $_GET['action'];
}
$filename = '../GUI/'.$this->page.'/'.$this->action.'.php';
if(file_exists($filename)) {
    require_once $filename;
}else{
    require_once 'error.php';
}

?>
