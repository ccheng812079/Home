<?php
session_start();
$veri=rand(1000,9999);
$_SESSION['veri']=$veri;
echo"<font size='+3' color='#FF0000'>".$veri."</font>";
?>