
<?php 
	session_start();
    include "./mysql_connect.inc.php";
    if($_SESSION['username'] == null){     
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
    }
    include "./menu.php";
?>

<div class="container">
	<div class="row">
		<div class="col-md-6" style="text-align:center;">
			<h1>我的書籤</h1><br>
			<a href="link.php" ><img src="img/mark.png" width="300" height="300" ></a>
		</div>
		<div class="col-md-6" style="text-align:center;">
			<h1>搜尋</h1><br>
			<a href="search.php"><img src="img/mag.png" width="300" height="300"></a>
		</div>
	</div>
</div>