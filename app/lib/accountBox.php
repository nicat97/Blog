<?php
//mainPage, viewPost, account fayllarına include olunur

if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){

    $result = $this->getUserDatas($_SESSION['user_id']);
    $row = $result->fetch(PDO::FETCH_ASSOC);

    $name = explode(" ", $row['user_fullname']);

    echo '
          <!-- account box -->
          <div class="well">
            <h4>Xoş gəldin, '.$name[0].'!</h4>
            <p>Yazdığım məqalələr: '.$row['user_articles'].'</p>
            <p><a href="../Hesab">Yeni məqalə yaz</a></p>
            <p><a href="../Çıxış">Çıxış</a></p>
          </div>    
    ';
}else{
    echo '
          <!-- account box -->
          <div class="well">
            <!-- tabs -->
            <ul class="nav nav-tabs nav-justified">
                <li class="active" id="loginTab"><a>Daxil ol</a></li>
                <li id="registerTab"><a >Üzv ol</a></li>
            </ul>
            <!-- login form -->         
            <form id="loginForm" method="post" action="../Daxil_Ol">
                <div class="input-group">
                    <input id="loginEmail" type="text" class="form-control" name="email" placeholder="E-poçt">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                </div>
                <div class="input-group">
                    <input id="loginPassword" type="password" class="form-control" name="password" placeholder="Şifrə">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                </div>
                <a id="reset" href="Şifrəmi_Unutdum">Şifrəni unutmusan?</a>
                <button id="login" type="submit" class="btn btn-default" style="float: right; margin-top: 1%;">Daxil ol</button>
            </form>
            <!-- register form -->
            <form id="registerForm" style="display: none;" method="post">
                <div class="input-group">
                    <input id="name" type="text" class="form-control" name="fullName" placeholder="Ad və Soyad">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                </div>
                <div class="input-group">
                    <input id="email" type="text" class="form-control" name="regEmail" placeholder="E-poçt">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                </div>
                <div class="input-group">
                    <input id="regPassword" type="password" class="form-control" name="regPassword" placeholder="Şifrə">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock" id="passIcon"></i></span>
                </div>
                <div class="input-group">
                    <input id="re-password" type="password" class="form-control" name="re-password" placeholder="Şifrə (təkrar):">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-question-sign" id="re-passIcon"></i></span>
                </div>
                <button id="registerSubmit" type="submit" class="btn btn-default">Təsdiqlə</button>
            </form>
          </div>    
    ';
}

?>