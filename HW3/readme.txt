index.php - 登入頁面
member.php - 登入後的畫面
connect.php - 驗證登入是否成功的php
logout.php - 處理登出的php
link.php - 顯示書籤的頁面
linkctrl.php -處理書籤新增和刪除的php
menu.php - 用來印出上方menu的php
mysql_connect.inc.php - mysql相關設定
update.php - 更新用戶資料的頁面
userctrl.php - 處理用戶註冊和更新資料的php
register.php - 會員註冊的表單

資料庫
Table:member
欄位1:username
欄位2:password
欄位3:password2
欄位4:email
欄位5:id

Table:link
欄位1:title
欄位2:url
欄位3:user_id
欄位4:id

藍為順序不能變不然會有error