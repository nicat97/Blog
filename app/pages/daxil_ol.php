<?php

class Daxil_ol extends Database{
    public function __construct(){
        parent::__construct();

        if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
            //artıq daxil olubsa
            header("Location: Hesab");
            exit();

        }else{
            //daxil olma
            if(isset($_POST['email']) && !empty($_POST['email']) &&
                isset($_POST['password']) && !empty($_POST['password'])){

                $array = $this->login($_POST['email'], $_POST['password']);

                if($array['NOTFOUND'] == false && $array['PASSWORDMATCH'] == true){
                    //əgər şifrə və epoçt düzdürsə
                    $_SESSION['user_id'] = $array['USERID'];
                    header("Location: Hesab");
                    exit();

                }elseif($array['NOTFOUND'] == true && $array['PASSWORDMATCH'] == false){
                    //ad yanlışdırsa
                    $_ERROR = '"' . htmlspecialchars($_POST['email'], ENT_QUOTES|ENT_HTML5, 'UTF-8') . '" e-poçtu bazada yoxdur.';
                    include 'app/lib/login.php';

                }else{
                    //ad doğru şifrə yanlışdırsa
                    //(NOTFOUND && PASSWORDMATCH) == false
                    $_ERROR = 'Şifrə yanlışdır.';
                    include 'app/lib/login.php';

                }

            }elseif(isset($_POST['re-password'])){ //qeydiyyat

            }else{
                include 'app/lib/login.php';
            }
        }
    }

    public function __destruct(){

        parent::__destruct();

    }
}