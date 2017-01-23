<?php

class Hesab extends Database{
    public function __construct(){
        parent::__construct();

        if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){

            $this->issetNewPost();
            print_r($_POST);
            print_r($_FILES);
            $categories = $this->getCategories();
            include 'app/lib/newArticle.php';

        }else{
            header("Location: Daxil_Ol");
        }
    }

    public function issetNewPost(){

        if(isset($_POST['title']) && !empty($_POST['title']) &&
            isset($_POST['category']) && !empty($_POST['category']) &&
            isset($_POST['content']) && !empty($_POST['content']) &&
            isset($_POST['keywords']) && !empty($_POST['keywords']) &&
            isset($_FILES['image']) && !empty($_FILES['image']) &&
            $_FILES['image']['error'] == 0){

            //Şəkilin yoxlanılması
            $mimeType = mime_content_type($_FILES['image']['tmp_name']);

            $extensions = array(
                "image/jpg",
                "image/jpeg",
                "image/png",
                "image/bmp",
            );

            if(in_array($mimeType, $extensions)){
                $imageStatus = true;
                $extension = "." . substr($mimeType, 6);
            }else {
                $imageStatus = false;
            }

            #FIXME:kateqoriyanın uyğun id olduğunu yoxla

            //XSS-ə qarşı qorunma
            /*$title    = htmlspecialchars($_POST['title'], ENT_QUOTES|ENT_HTML5, "UTF-8");
            $content  = htmlspecialchars($_POST['content'], ENT_QUOTES|ENT_HTML5, "UTF-8");
            $keywords = htmlspecialchars($_POST['keywords'], ENT_QUOTES|ENT_HTML5, "UTF-8");*/

            include 'app/Methods.php';

            $Methods = new Methods();
            $randomLink = $Methods->randomLink($extension);

            if($imageStatus){
                move_uploaded_file($_FILES['image']['tmp_name'], 'app/uploads/images/' . $randomLink);

                $this->addArticle($_POST['title'], $_POST['content'], $_POST['category'], $randomLink, $_POST['keywords']);

                header("Location: " . $_SERVER['REQUEST_URI']);
            }

        }

    }




    public function __destruct(){
        parent::__destruct();
    }
}