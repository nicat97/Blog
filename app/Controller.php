<?php

class Controller{

    public function detectRoute($status, array $ROUTE){

        if(!$status){
            include "app/lib/404.php";
        }else{

            include "pages/" . $ROUTE[0] . ".php";

            $ROUTE[1] = isset($ROUTE[1]) ? $ROUTE[1] : null; //Əgər massivin 1 nömrəli (ikinci) elementi yoxdursa xəta verməsin.
            $callClass = new $ROUTE[0]($ROUTE[1]); //_construct metoduna parametr verir

        }
    }

}

?>
