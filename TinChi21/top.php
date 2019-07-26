<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<style>
.table-top{
    width: 100%;
    height: 10%;
	border:2px solid #036;
	background-color:#FFF;
	margin-bottom:2%;
}
.table-top img{
    width: 100px;
    height: 100px;
	border:1px solid #0F9;
	padding:10px;
}
.table-td1{
    width: 100%;
    height: 60px;
    font-size: 36px;
    text-align: center;
    font-weight: bold;
	border:1px solid #036;
	background-color:#9C3;
}
.table-td2{
	font-weight:bold;
}
.table-td3{
    width: 30%;
	padding:5px;
	font-weight:bold;
}
.table-td3 label{
    color: red;
    font-weight: bold;
}
</style>
<body>
<table border="0" align="center" class="table-top">
    <tr>
        <td rowspan="2"><img src="imgs/LOGO DHQN.jpg"/></td>
        <td colspan="2" class="table-td1">Trường Đại Học Quy Nhơn</td>
    </tr>
    <tr>
        <td align="left" class="table-td2"><a href="main.php">Home</a></td>
        <td align="right" class="table-td3">
 			<form action="top.php" method="post">
				<?php
					echo "Chào <label>".$_SESSION['name'].".</label> ";
					if(isset($_POST['out']))
					{
						session_start();
						unset($_SESSION['name']);
						header('location:login.php');
					}
				?>
				<button type="submit" name="out">Thoát</button>
            </form>
        </td>
    </tr>
</table>
</body>
</html>