<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include "./mysql_connect.inc.php";

        if(isset($_POST['add'])){
                $username = $_SESSION['username'];
                $sql = "SELECT * FROM member WHERE username='$username'";
                $result = mysql_query($sql);
                $row = mysql_fetch_row($result);  

                $title = $_POST['title'];
                $url = $_POST['url'];
                $userid = $row[4];

                if($title != null && $url != null ){

                        $sql = "INSERT INTO link (title, url, user_id) VALUES ('$title','$url','$userid')";
                        if(mysql_query($sql)){
                                echo '新增成功!';
                                echo '<meta http-equiv=REFRESH CONTENT=2;url=link.php>';
                        }
                        else{
                                echo '新增失敗!';
                                echo '<meta http-equiv=REFRESH CONTENT=2;url=link.php>';
                        }       
                }
                else{
                        echo '新增失敗,資料不完全!';
                        echo '<meta http-equiv=REFRESH CONTENT=2;url=link.php>';
                }
        }

        if(isset($_POST['del'])){
                $id = $_POST['link_id'];
                if($id != null ){
                        $sql = "DELETE FROM link WHERE id='$id'";
                        if(mysql_query($sql)){
                                echo '刪除成功!';
                                echo '<meta http-equiv=REFRESH CONTENT=2;url=link.php>';
                        }
                        else{
                                echo '刪除失敗!';
                                echo '<meta http-equiv=REFRESH CONTENT=2;url=link.php>';
                        }
                }
        }

?>
