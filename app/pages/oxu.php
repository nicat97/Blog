<?php

class Bil extends Database{
    public function __construct($articleID){

        parent::__construct();

        if(is_numeric($articleID) && !empty($articleID)){

            $result = $this->viewArticle($articleID);
            $row = $result->fetch(PDO::FETCH_ASSOC);

            if(isset($row) && !empty($row)){

                include 'app/lib/viewPost.php';

            }else{
                include "app/lib/404.php";
            }


        }else{
            include "app/lib/404.php";
        }
    }

    public function __destruct(){
        parent::__destruct();
    }
}

?>
