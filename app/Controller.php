<?php

class Controller{

    public function detectRoute(array $ROUTE){

        $fileName = __DIR__ . "/pages/" . $ROUTE[0] . ".php";

        if(file_exists($fileName)){

            include "pages/" . $ROUTE[0] . ".php";

            $ROUTE[1] = isset($ROUTE[1]) ? $ROUTE[1] : null; //Əgər massivin 1 nömrəli (ikinci) elementi yoxdursa xəta verməsin.
            $callClass = new $ROUTE[0]($ROUTE[1]); //Axtarılan səhifənin sinifini çağırır

        }else{
            include "app/lib/404.php";
        }
    }

}

?>