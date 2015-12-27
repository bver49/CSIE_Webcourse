<?php 
    session_start(); 
    include "./mysql_connect.inc.php";
    if($_SESSION['username'] == null){     
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
    }
    $username = $_SESSION['username'];
    $sql1 = "SELECT * FROM `member` WHERE username = '$username'";
    $result1=mysql_query($sql1);
    $row1 = mysql_fetch_row($result1);
    $sql2 = "SELECT * FROM `link` WHERE user_id = '$row1[4]'";
    $result2=mysql_query($sql2);

    include "./menu.php";
?>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1 class="text-center">新增書籤</h1>
            <form name="form" method="post" action="linkctrl.php" class="form-horizontal">
            名稱：<input type="text" name="title" class="form-control" /><br> 
            連結：<input type="text" name="url" class="form-control" /><br> 
            	 <input type="submit" name="add" value="新增" class="btn btn-primary" id="button" />
            </form><br><br>
            <form name="form" method="post" action="" class="form-horizontal">
            搜尋:<input type="text" name="keyword" class="form-control" /><br> 
                 <input type="submit" name="search" value="送出" class="btn btn-primary" id="button"/>
            </form>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center">
        <?php 
            if(isset($_POST['search'])){
                $searchq = $_POST['keyword'];
                $searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
                $query = mysql_query("SELECT * FROM link WHERE title LIKE '%$searchq%'");
                $count = mysql_num_rows($query);
                if($count == 0 ){
                        echo "<h1 class=\"text-center\">查詢內容:".$_POST['keyword']." 查無符合項目</h1>";
                        echo "<a href=\"link.php\" class=\"btn btn-default\">取消搜尋</a>";
                }
                else{
                    echo "<h1 class=\"text-center\">查詢內容:".$_POST['keyword']." 查詢結果:".$count."筆</h1>";
                    echo "<table class=\"table table-striped\">";
                    while($row2 = mysql_fetch_array($query)){
                        echo "<tr><td><form action=\"linkctrl.php\" method=\"post\">
                        <input type=\"hidden\" name=\"link_id\" value=\"".$row2[3]."\">
                        <input type=\"submit\" name=\"del\" value=\"刪除\" class=\"btn btn-default\">
                        </form></td><td><a href=\"$row2[1]\">".$row2[0]."</a></td></tr>";
                    }
                    echo "<tr><td class=\"text-center\" colspan=\"2\"><a href=\"link.php\" class=\"btn btn-default\">取消搜尋</a></td></tr>";
                    echo "</table>";
                }
            }
            else{
                echo "<h1 class=\"text-center\">我的書籤</h1>";
                echo "<table class=\"table table-striped\">";
                while($row2 = mysql_fetch_row($result2)){
                    echo "<tr><td><form action=\"linkctrl.php\" method=\"post\">
                    <input type=\"hidden\" name=\"link_id\" value=\"".$row2[3]."\">
                    <input type=\"submit\" name=\"del\" value=\"刪除\" class=\"btn btn-default\">
                    </form></td><td>"."<a href=\"$row2[1]\" target=\"_blank\">".$row2[0]."</a></td></tr>";
                }
                echo "</table>";
            }
        ?>
        </div>
    </div>
</div>
