<?php
session_start();
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$phone=$_POST['phone'];
$pd=$_POST['pd'];
$veri=$_POST['veri'];
if($veri<>$_SESSION['veri']){
    echo"<script>alert('驗證碼錯誤');document.location.href='tickets.html';</script>";
}else{
    date_default_timezone_set("Asia/Taipei");
    $date=date("Y-m-d H:i:s");
    $conn=new mysqli("127.0.0.1","admin","1234","db");
    $sql="INSERT INTO tickets value('','$fname','$lname','$phone','$pd','$date')";
    mysqli_query($conn,$sql);
    header("location:home.html");
}
?>











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
