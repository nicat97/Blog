<?php

class Database{

    public $db;

    public function __construct(){
        $this->db = new PDO(
            'mysql:host=localhost;dbname=bloq',
            'root',
            '',
            array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4'
            )
        );
    }

    public function getUserDatas($userID){

        $result = $this->db->prepare("SELECT * FROM users WHERE user_id=?");
        $result->bindParam(1, $userID, PDO::PARAM_INT);
        $result->execute();

        return $result;

    }

    public function login($email, $password){

        $result = $this->db->prepare("SELECT user_id, user_email, user_password FROM users WHERE user_email=?;");
        $result->bindParam(1, $email, PDO::PARAM_STR);
        $result->execute();

        if($result->rowCount() != 0){ //axtarılan istifadəçi varsa

            $row = $result->fetch(PDO::FETCH_ASSOC);
            $_PASSWORD = $row['user_password']; //istifadəçinin öz şifrəsi
            $_USERID = $row['user_id'];

            if(password_verify($password, $_PASSWORD)){ //true və ya false qaytarır
                               //birinci parametr daxil olunna şifrədir
                return array(
                    "NOTFOUND" => false,
                    "PASSWORDMATCH" => true,
                    "USERID" => $_USERID
                );

            }else{ //əgər şifrə yanlışdırsa

                return array(
                    "NOTFOUND" => false,
                    "PASSWORDMATCH" => false
                );

            }

        }else{
            //istifadəçi yoxdursa
            return array(
                "NOTFOUND" => true,
                "PASSWORDMATCH" => false
            );

        }

    }

    public function viewArticle($articleID){
        $result = $this->db->prepare("SELECT * FROM articles WHERE article_id=?");
        $result->bindParam(1, $articleID, PDO::PARAM_INT);
        $result->execute();

        return $result;
    }

    public function getArticles(){
        $result = $this->db->prepare("SELECT * FROM articles WHERE article_status=1 ORDER BY articles.article_id ASC");
        $result->execute();

        return $result;

    }

    public function addArticle($title, $content, $category, $image, $keywords){
        $result = $this->db->prepare("INSERT INTO articles (article_title, article_content, category_id, article_image, article_keywords) VALUES (?, ?, ?, ?, ?)");
        $result->bindParam(1, $title, PDO::PARAM_STR);
        $result->bindParam(2, $content, PDO::PARAM_STR);
        $result->bindParam(3, $category, PDO::PARAM_INT);
        $result->bindParam(4, $image, PDO::PARAM_STR);
        $result->bindParam(5, $keywords, PDO::PARAM_STR);
        $result->execute();
    }

    public function getCategories(){
        $result = $this->db->prepare("SELECT * FROM categories");
        $result->execute();

        return $result;
    }

    public function __destruct(){
        $this->db = null;
    }
}

?>