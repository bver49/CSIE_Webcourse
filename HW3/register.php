<?php
    include "./menu.php";
?>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1 class="text-center">註冊帳號</h1>
            <form name="form" method="post" action="userctrl.php" class="form-horizontal">
            帳號：<input type="text" name="username" class="form-control" /><br> 
            密碼：<input type="password" name="password" class="form-control" /><br> 
            再一次輸入密碼：<input type="password" name="password2" class="form-control" /><br> 
            email：<input type="text" name="email" class="form-control" /><br>
            <input type="submit" name="regist" value="確定" class="btn btn-primary" id="button"/>
            </form>
        </div>
    </div>
</div>
