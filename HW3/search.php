<?php 
 	session_start();
 	if($_SESSION['username'] == null){     
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
    }
    include "./menu.php";
    include "./simple_html_dom.php";
?>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<h1 class="text-center">搜尋</h1>
			<form action="" method=post style="text-align:center">
				<input type="text" name="query"/>
				<input type="submit" name="submit" value="搜尋" class="btn btn-primary"/>
			</form>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
<?php 
 	if (isset($_POST['submit'])) { 
 		
		$url1="https://www.google.com.tw/search?q=";
		$url2="https://tw.search.yahoo.com/search?q=";
		$search1=$url1.$_POST['query']."&ie=UTF-8";
		$search2=$url2.$_POST['query'];
		$html1 = file_get_html($search1);
		$html2 = file_get_html($search2);
	}

?>
<h3 class="text-center">你搜尋的內容是: <?php echo $_POST['query'] ?></h3><br>
<?php
 	if (isset($_POST['submit'])) { 
		$url1="https://www.google.com.tw/search?q=";
		$url2="https://tw.search.yahoo.com/search?q=";
		$search1=$url1.$_POST['query']."&ie=UTF-8";
		$search2=$url2.$_POST['query'];
		$html1 = file_get_html($search1);
		$html2 = file_get_html($search2);
		echo "<div class=\"panel panel-default\"><div class=\"panel-heading\">Google search</div><ul class=\"list-group\">";
		foreach($html1->find('h3.r a') as $element1){
				$element1->plaintext=iconv("big5","UTF-8",$element1->plaintext);
       			echo "<li class=\"list-group-item\"><a href=\"http://www.google.com".$element1->href."\" target=\"_blank\">".$element1->plaintext."</a></li>";
    	}
    	echo "</ul></div>";
		echo "<div class=\"panel panel-default\"><div class=\"panel-heading\">Yahoo search</div><ul class=\"list-group\">";
    	foreach($html2->find('a.td-u') as $element2) 
       			echo "<li class=\"list-group-item\"><a href=\"".$element2->href."\" target=\"_blank\">".$element2->plaintext."</a></li>";
    	echo "</ul></div>";
	}

?>


		</div>
	</div>
</div>
