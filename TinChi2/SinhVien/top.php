<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="icon" href="imgs/LOGO DHQN.jpg" type="image/x-icon" />
    <title>Chào Mừng Sinh Viên</title>
<style>
.menu{
    font-size: 30px;
    border: 1px solid black;
	font-weight:bold;
}
</style>
</head>
<div style="margin-bottom:7%;" >
<span style=" text-align:right; font-weight:bold;" >
 	<form action="top.php" method="get">
		<?php
			echo "Chào <label style=\" color:#F00;\">".$_SESSION['subname']." ".$_SESSION['name'].".</label> ";
			if(isset($_GET['out']))
			{
				session_start();
				session_destroy();
				header('location:index.php');
			}
		?>
		<button type="submit" name="out">Thoát</button>
    </form>
</span>
<center>
    <a href="main.php">
    <img src="imgs/LOGO DHQN.jpg" width="150px" height="150px" style="margin-bottom:2%;" /><br />
    </a>
    <div class="menu">
        <span><a href="HocPhan.php">Học Phần</a></span>
        <span>|<a href="dangKy.php">Đăng Kí</a></span>
        <span>|<a href="xemDiem.php">Xem Điểm</a></span>
        <span>|<a href="lichHoc.php">Lịch Học</a></span>
        <span>|<a href="taiLieu.php">Tài Liệu</a></span>
    </div>
</center>
</div>