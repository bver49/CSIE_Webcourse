<?php
    echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
    <link rel=\"stylesheet\" href=\"style.css\">
    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css\">
    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css\">
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js\"></script>
    <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js\"></script>
    <title>H34026246</title>";
    echo "<nav class=\"navbar navbar-inverse\">";
    echo    "<div class=\"container-fluid\">";
    echo        "<div class=\"navbar-header\">";
    echo            "<button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#myNavbar\">";
    echo                "<span class=\"icon-bar\"></span>";
    echo                "<span class=\"icon-bar\"></span>";
    echo                "<span class=\"icon-bar\"></span>";
    echo            "</button>";
    if($_SESSION['username'] == null){
        echo            "<a class=\"navbar-brand\" href=\"index.php\">書籤網</a>";
    }
    else{
        echo            "<a class=\"navbar-brand\" href=\"member.php\">書籤網</a>";
    }
    echo        "</div>";
    echo        "<div class=\"collapse navbar-collapse\" id=\"myNavbar\">";
    if($_SESSION['username'] == null){
        echo            "<ul class=\"nav navbar-nav navbar-right\">";
        echo                "<li><a href=\"register.php\"><span class=\"glyphicon glyphicon-user\"></span>註冊</a></li>";
        echo                "<li><a href=\"index.php\"><span class=\"glyphicon glyphicon-log-in\"></span>登入</a></li>";
        echo            "</ul>";
    }
    else{
        echo            "<ul class=\"nav navbar-nav navbar-right\">";
        echo                "<li><a href=\"link.php\">新增書籤</a></li>";
        echo                "<li><a href=\"search.php\">搜尋</a></li>";
        echo                "<li><a href=\"logout.php\">登出</a></li>";
        echo                "<li><a href=\"update.php\">修改資料</a></li>"; 
        echo            "</ul>";
    }
    echo       "</div>";
    echo    "</div>";
    echo "</nav>";
?>