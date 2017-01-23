<?php
class çıxış{
    public function __construct(){
        if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){

            unset($_SESSION['user_id']);
            header('Location: Ana_Səhifə');

        }else{

            header('Location: Ana_Səhifə');

        }
    }

    public function __destruct(){
        parent::__destruct();

    }
}


?>