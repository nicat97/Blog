<?php

class Bootstrap{
    public function init($ROUTE){

        $ROUTE = str_replace("I", "ı", $ROUTE);
        //PHP I hərfini kiçildəndə İngilis böyük i (I) ilə qarışdırır və nəticədə i qaytarır.
        $ROUTE = mb_strtolower($ROUTE, "UTF-8");
        //strtolower() metodu yalnız ASCII cədvəlindəki hərfləri kiçildir. mb_convert_case($string, MB_CASE_LOWER, "UTF-8")
        //metodu da yuxarıdakı ilə eyni işi görür. Əlavə məlumat: http://php.net/manual/en/function.strtolower.php

        if(isset($ROUTE) && !empty($ROUTE) && $ROUTE != "index.php"){

            $ROUTE = trim($ROUTE, "/");
            $ROUTE = explode("/", $ROUTE);

            return $ROUTE;

        }else{
            $ROUTE = array(
                0 => 'ana_səhifə'
            );

            return $ROUTE;
        }

    }
}

?>

