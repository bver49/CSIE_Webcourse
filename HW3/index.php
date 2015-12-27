<?php
    include "./menu.php";
?>
<div class="container" id="login">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" id="loginbox">
            <h1 class="text-center">歡迎來到書籤網</h1><br>
            <form name="form" method="post" action="userctrl.php" class="form-horizontal">
                帳號：<input type="text" name="username" class="form-control" /><br> 
                密碼：<input type="password" name="password" class="form-control" /><br>
                <input type="submit" name="login" value="登入" class="btn btn-primary" id="button"/>&nbsp;&nbsp;
            </form>
        </div>
    </div>
</div>