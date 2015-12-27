<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<?php
        include "./mysql_connect.inc.php";
        include "./menu.php";
?>


<div class="container">
        <div class="row">
                <div class="col-md-4 col-md-offset-4">
<?php
if($_SESSION['username'] != null)
{
        $username = $_SESSION['username'];
        $sql = "SELECT * FROM member WHERE username='$username'";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);    
        echo "<form name=\"form\" method=\"post\" action=\"userctrl.php\" class=\"form-horizontal\">";
        echo "<p>帳號：".$row[0]."(此項目無法修改)</p>";
        echo "密碼：<input type=\"password\" name=\"password\" value=\"\" class=\"form-control\"/><br><br>";
        echo "再一次輸入密碼：<input type=\"password\" name=\"password2\" value=\"\" class=\"form-control\" /> <br><br>";
        echo "email：<input type=\"text\" name=\"email\" value=\"$row[3]\" class=\"form-control\" /> <br><br>";
        echo "<input type=\"submit\" name=\"update\" value=\"確定\" class=\"btn btn-primary\" id=\"button\"/>";
        echo "</form>";
}
else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>
                </div>
        </div>
</div>