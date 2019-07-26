<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
.menu{
    font-size: 30px;
    border: 1px solid black;
	font-weight:bold;
}
</style>
</head>
<body>
<div style="margin-bottom:7%;" >
<span style=" text-align:right; font-weight:bold;" >
 	<form action="top.php" method="post">
		<?php
			echo "Chào <label style=\" color:#F00;\">".$_SESSION['name'].".</label> ";
			if(isset($_POST['out']))
			{
				session_start();
				unset($_SESSION['name']);
				session_destroy();
				header('location:index.php');
			}
		?>
		<button type="submit" name="out">Thoát</button>
    </form>
</span>
<center>
    <img src="imgs/LOGO DHQN.jpg" width="150px" height="150px" style="margin-bottom:2%;" /><br />
    <div class="menu">
        <span><a href="dangKy.php">Đăng Kí Lịch Dạy</a></span>
        <span>|<a href="#">Xem Lịch Dạy</a></span>
        <span>|<a href="#">Đỗi Mật Khẩu</a></span>
    </div>
</center>
</div>
</body>
</html>