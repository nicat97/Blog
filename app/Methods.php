<?php

class Methods{

    public function randomLink($extension){

        $symbols = "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890_";
        $link = null;
        $status = false;

        while($status == false){
            for($i = 0; $i < 10; $i++){

                $s = rand(0, 62);
                $link .= $symbols[$s];

            }

            $name = $link . $extension;
            if(file_exists("app/uploads/images/" . $name)){
                $status = false;
                $link = null;
            }else{
                $status = true;
            }

        }

        return $name;

    }

}


?>