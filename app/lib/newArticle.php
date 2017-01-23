<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- meta teqləri yaz və glyphicon-ları bootstrapda öz url-ivə uyğun yaz -->
    <title>Sən də bil! | Yeni məqalə</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Custom CSS -->
    <style>
        <?php include 'app/lib/css/hesab.css'; ?>
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="Ana_Səhifə">Sən də bil!</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="#">Tənzimləmələr</a>
                </li>
                <li>
                    <a href="Çıxış">Çıxış</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-md-9">
            <div class="well">
                <h2>Yeni məqalə yaz <span class="glyphicon glyphicon-pencil" style="font-size: 20px;"></span></h2>
                <hr>
                <!-- new article start-->
                <form method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class=" col-md-9 form-group">
                            <label for="title">Başlıq:</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <label id="imagePicker" class="col-md-3 btn btn-default btn-file">
                            Başlıq şəkli seç <input type="file" name="image" accept="image/*" class="hidden">
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="category">Kateqoriya:</label>
                        <select class="form-control" name="category">
                            <option selected>Kateqoriya seçin</option>
                            <?php
                            while($row = $categories->fetch()){
                                echo '<option value="' . $row['category_id'] . '">' . $row['category_name'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="content">Məzmun:</label>
                        <br />
                        <!--BBCodes start-->
                        <div id="BBCodes" class="btn-group">
                            <button bbBefore="<b>" bbAfter="</b>" type="button" class="btn btn-primary"><b>B</b></button>
                            <button bbBefore="<i>" bbAfter="</i>" type="button" class="btn btn-primary"><i>I</i></button>
                            <button bbBefore="<u>" bbAfter="</u>" type="button" class="btn btn-primary"><u>U</u></button>
                            <button bbBefore="<s>" bbAfter="</s>" type="button" class="btn btn-primary"><s>S</s></button>
                            <button bbBefore="<a href='Keçid'>" bbAfter="</a>" type="button" class="btn btn-primary"><a style="color: black;"><u>Bağlantı</u></a></button>
                            <button bbBefore="<mark>" bbAfter="</mark>" type="button" class="btn btn-primary"><mark>Vurğulanmış</mark></button>
                            <button bbBefore="<abbr title='Bura açıqlamanı yazın'>" bbAfter="</abbr>" type="button" class="btn btn-primary"><abbr title="Mausu üzərinə gətirəndə əlavə məlumat verir.">Açıqlama</abbr></button>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                    Siyahılar <span class="caret"></span></button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#" id="ul" bbBefore="<ul><li>Birinci element</li>" bbAfter="<li>İkinci element</li> və s.</ul>">Adi</a></li>
                                    <li><a href="#" id="ol" bbBefore="<ol style='list-style-type:circle'><li>Birinci element</li>" bbAfter="<li>İkinci element</li> və s.</ol>">Düyməli</a></li>
                                    <li><a href="#" id="nl" bbBefore="<ol type='1'><li>Birinci element</li>" bbAfter="<li>İkinci element</li> və s.<ol>">Nömrələnmiş</a></li>
                                </ul>
                            </div>
                            <button type="button" bbBefore="<kbd>" bbAfter="</kbd>" class="btn btn-primary"><kbd>CTRL+C</kbd></button>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                    Kod <span class="caret"></span></button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#" id="code" bbBefore="<code>" bbAfter="</code>"><code>İşarələnmiş açar söz</code></a></li>
                                    <li><a href="#" id="highlighted" bbBefore="<highlighted class='dilin adı'>" bbAfter="</highlighted>">Kod sətri</a></li>
                                </ul>
                                <button type="button" class="btn btn-primary" bbBefore="<img src='Keçidi bura əlavə edin'" bbAfter="</img>"><span class="glyphicon glyphicon-picture"></span></button>
                                <button type="button" class="btn btn-primary" bbBefore="<video>Hələ ki, işləmir :(" bbAfter="</video>"><span class="glyphicon glyphicon-facetime-video"></span></button>
                                <button type="button" class="btn btn-primary" bbBefore="<iframe width='420' height='345' src='https://www.youtube.com/embed/{YouTube video ID-sini bura əlavə edin}" bbAfter="'></iframe>"><i class="fa fa-youtube-play" aria-hidden="true"></i></button>
                            </div>
                        </div>
                        <!--BBCodes end-->
                    </div>
                    <textarea id="contentArea" name="content" class="form-control" rows="5"></textarea>
                    <div class="form-group" style="padding-top: 1%;">
                        <label for="title">Açar sözlər <small>(Boşluq ilə ayırın. Məs.: php c++ proqramlaşdırma linux və s.)</small>:</label>
                        <input type="text" name="keywords" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-default" style="width: 100%; background-color: #3498db; color: white;"><b>Göndər</b> <span class="glyphicon glyphicon-ok"></span></button>
                </form>
            </div>
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-3">

            <!-- Blog Search Well -->
            <div class="well">
                <h4 class="text-center">Xoş gəldin, ad!</h4>
                <center>
                    <img src="500.jpeg" width="100" class="img-circle">
                </center>
                <hr>
                <p>Yazdığım məqalələr: 5</p>
                <p>Bildirişlər: <span class="badge">5</span></p>
                <!-- /.input-group -->
            </div>


        </div>
        <!-- /.row -->
    </div>

</div>

</div>
<!-- /.row -->

<!-- Footer -->
<footer>
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <p>Bütün hüquqlar qorunur &copy; Sən də bil! 2017</p>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</footer>

</div>
<!-- /.container -->

<script src="https://use.fontawesome.com/7a943709cb.js"></script>

<script>
    <?php include 'app/lib/js/jquery.selection.js'; ?>
</script>

<script>
    $(document).ready(function(){
        $('#BBCodes button, #ul, #ol, #nl, #code, #highlighted').on('click', function(e){
            e.preventDefault();

            $('#contentArea')
                .selection('insert', {text: $(this).attr("bbBefore"), mode: 'before'})
                .selection('insert', {text: $(this).attr("bbAfter"), mode: 'after'});
        })
    });
</script>

</body>

</html>
