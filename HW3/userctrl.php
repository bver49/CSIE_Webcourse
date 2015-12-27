<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include "./mysql_connect.inc.php";

$username = $_POST['username'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$email = $_POST['email'];

if(isset($_POST['login'])){
        $sql = "SELECT * FROM `member` WHERE username = '$username'";
        $result=mysql_query($sql);
        $row = @mysql_fetch_row($result);

        if($username != null && $password != null && $row[0] == $username && $row[1] == $password){
                $_SESSION['username'] = $username;
                echo '登入成功!';
                echo '<meta http-equiv=REFRESH CONTENT=1;url=member.php>';
        }
        else{
                echo '登入失敗!';
                echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
        }
}        

if(isset($_POST['update'])){

        if($_SESSION['username'] != null && $password != null && $password2 != null && ($password == $password2)){

                $id = $_SESSION['username'];
                $sql = "UPDATE `member` SET `password`='$_POST[password]',`email`='$_POST[email]' WHERE `username`='$username'";
                if(mysql_query($sql)){
                        echo '修改成功!';
                        echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
                }
                else{
                        echo '修改失敗!';
                        echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
                }
        }

        else{
                echo '修改失敗!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
        }
}

if(isset($_POST['regist'])){
        if($username != null && $password != null && $password2 != null && ($password == $password2)){
                $sql = "INSERT INTO member (username, password, email) VALUES ('$_POST[username]','$_POST[password]','$_POST[email]')";
                if(mysql_query($sql)){
                        echo '註冊成功!';
                        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
                }
                else{
                        echo '註冊失敗!';
                        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
                }
        }

        else{
                echo '註冊失敗!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';   
        }

}


?>