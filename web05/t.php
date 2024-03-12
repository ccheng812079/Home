<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>新一代設計展（YODEX）</title>

<style>

input {

	font-size: 24px;

	}


</style>

</head>

<body>

<table width="100%" border="0">
  <tr>
    <td width="21%" height="250" align="center" valign="middle"><img src="01_LOGO/01_LOGO.jpg" width="229" height="241" /></td>
    <td width="20%" height="250" align="center" valign="middle"><h1><a href="index.php">Home</a></h1></td>
    <td width="20%" height="250" align="center" valign="middle"><h1><a href="news.php">News</a></h1></td>
    <td width="20%" height="250" align="center" valign="middle"><h1><a href="discover.php">Discover</a></h1></td>
    <td width="19%" height="250" align="center" valign="middle"><h1><a href="tickets.php">Tickets</a></h1></td>
  </tr>  
  <tr> 
    <td colspan="5" align="center" valign="top"> 
    <hr />   
    <h2>【購票區】</h2>





<?php

session_start();

date_default_timezone_set("Asia/Taipei");  //設定為亞洲地區

$a = @$_GET['a'];

if ($a == 1){

	if ($_POST['num']  <> $_SESSION['num']) {

		echo "<script>alert('驗證碼錯誤')</script>;";	
		$_SESSION['error'] = $_SESSION['error'] + 1;
		
		if($_SESSION['error'] >= 3){
			
			header("location:error.php");
			
		}
		
	} else {
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$phone = $_POST['phone'];
		$pd = $_POST['pd'];
		$dd = date("Y-m-d");
		$tt = date("h:i:s");
		
		$conn = new mysqli("127.0.0.1", "admin", "1234", "db");
		$sql = "insert into tk value('', '$fname', '$lname', '$phone', '$pd', '$dd', '$tt')";
		mysqli_query($conn, $sql);
		
		header("location:index.php");
		

	}

}


$num = rand(1000,9999);

$_SESSION['num'] = $num;


?>



<h2>●購票資訊區●</h2>

      <form method="post" action="?a=1">

        <p>☉名字(First name)：<input type="text" name="fname" /></p>

        <p>☉姓氏(Last name)：<input type="text" name="lname" /></p>

        <p>☉手機號碼(Phone)：<input type="text" name="phone" /></p>

        <p>☉會員密碼(Password)：<input type="password" name="pd" /></p>

        <p>☉數字驗證(Verification)：<input type="text" name="num" /> <h3>亂數：<?=$num ?></h3></p>

      <input type="reset" value="資料清空"/>　

      <input type="submit" value="資料送出" />

      </form>



      <h2>●購票查詢區●</h2>
      <form id="form1" name="form1" method="post" action="?a=2">
      
      購票手機號碼：<input type="text" name="phone" />
      
      購票密碼：<input type="password" name="pd" />　
      
      <input type="reset" value="清空" />　
      
      <input type="submit" value="送出查詢" />
      
      </form>
      <br /><br />
<table border="1" width="70%">
<tr><td>名字</td><td>姓氏</td><td>電話</td><td>日期</td><td>時間</td></tr>
<?php
if($a == 2){
	$phone = $_POST['phone'];
	
	
	$conn = new mysqli("127.0.0.1", "admin", "1234", "db");
	$sql = "select * from tickets where phone = '$phone'  ";
	$result = mysqli_query($conn, $sql);
	
	while ($row = mysqli_fetch_assoc($result)){
	    echo "<tr><td>".$row['fname']."</td><td>".$row['lname']."</td><td>".$row['phone']."</td></tr>";
	}
}
?>
</table>
      <h2>&nbsp;</h2>
<h2>【社群媒體分享資訊區】</h2>
<p><a href="http://facebook.com" target="_blank"><img src="fb.png" width="200" height="202" /></a>　 　 <a href="http://google.com" target="_blank"><img src="google+.png" width="200" height="206" /></a>　　 <a href="http://instagram.com" target="_blank"><img src="ig.png" width="200" height="198" /></a></p></td>

  </tr>

  <tr>

    <td height="130" colspan="5" align="center" valign="middle">Copyright © 2023 YODEX All Rights Reserved</td>

  </tr>

</table>

</body>

</html>