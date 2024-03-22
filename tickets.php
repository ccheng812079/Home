<?php
session_start();
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$phone=$_POST['phone'];
$pd=$_POST['pd'];
$veri=$_POST['veri'];
if($veri<>$_SESSION['veri']){
    echo"<script>alert('驗證碼錯誤');</script>";
    $_SESSION['tt']+=1;
    if($_SESSION['tt']>=3){
        header("location:error.php");
    }else{
        echo"<script>document.location.href='tickets.html';</script>";
    }
}
date_default_timezone_set("Asia/Taipei");
$date=date("Y-m-d H:i:s");
$conn=new mysqli("127.0.0.1","admin","1234","db");
$sql="INSERT INTO tickets value('','$fname','$lname','$phone','$pd','$date')";
mysqli_query($conn,$sql);
header("location:home.html");
?>