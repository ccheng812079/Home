
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./bootstrap/bootstrap.css" class="rel">
    <link rel="stylesheet" href="./bootstrap/jquery/jquery-ui.css" class="rel">
    <script src="./bootstrap/jquery/jquery.js"></script>
    <script src="./bootstrap/bootstrap.js"></script>
    <script src="./bootstrap/jquery/jquery-ui.js"></script>
    <style>
        body {
            width: 1920px;
            height: 1080px;
        }

        a:link {
            color: #FFC;
            text-decoration: none;
        }

        a:visited {
            text-decoration: none;
            color: #FF9;
        }

        a:hover {
            text-decoration: none;
            color: #FFC;
        }

        a:active {
            text-decoration: none;
            color: #FFC;
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td align="center" valign="middle">
                    <h1><a href="home.html">| H o m e |</a></h1>
                </td>
                <td align="center" valign="middle">
                    <h1><a href="news.html">| N e w s |</a></h1>
                </td>
                <td align="center" valign="middle">
                    <h1><a href="home.html"><img src="./04-01/01.png" width="200" height="226"></a></h1>
                </td>
                <td align="center" valign="middle">
                    <h1><a href="discover.html">| Discover |</a></h1>
                </td>
                <td align="center" valign="middle">
                    <h1><a href="tickets.html">| Tickets |</a></h1>
                </td>
            </tr>
        </table>
    </nav><br>

<center><br>
<h1>購票成功資訊區</h1><br><hr>
<form action="?ok=1" method="post">
  <h2>輸入電話查詢：
    <input type="text" name="phone" />
    <input type="submit" value="查詢" />
    <input type="reset" value="取消"/>
  </h2>
</form>
<br />

<table border="2" width="70%">
<tr><td align="center" valign="middle"><h3>編號</h3></td><td align="center" valign="middle"><h3>名字</h3></td><td align="center" valign="middle"><h3>姓氏</h3></td><td align="center" valign="middle"><h3>電話</h3></td><td align="center" valign="middle"><h3>購票時間</h3></td></tr>
<?php
$conn = new mysqli("127.0.0.1", "admin", "1234", "db");
$ok = @$_GET['ok'];
if($ok == 1){
	$phone = $_POST['phone'];
	$sql = "select * from tickets where phone like '%$phone%' ";
} else {
	$sql = "select * from tickets";	
}
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)){
	echo "<tr><td>".$row['id']."</td><td>".$row['fname']."</td><td>".$row['lname']."</td><td>".$row['phone']."</td><td>".$row['date']."</td></tr>";
}

?>
</center>

<div class="fixed-bottom w-20 text-center">
        <h3 text-center>活動資訊區</h3>
        <footer>dsiofipoawerfgpore&copy;bhguhi</footer>
    </div>
</body>

</html>