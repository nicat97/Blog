<?php

class Ana_Səhifə extends Database{
    public function __construct(){
        parent::__construct();

        include 'app/lib/mainPage.php';
    }

    public function __destruct(){

        parent::__destruct();

    }
}

?>