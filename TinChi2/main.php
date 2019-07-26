<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Admin</title>
	<link rel="stylesheet" href="Style-main.css" />
    <script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
    <style>
	.TR1{
		width:100%;
		border:1px solid #000;
		background-color:#FFF;
	}
	.TR2{
		width:100%;
		position:fixed;
		bottom:0;
		background-color:#000;
		color:#FFF;
	}
    .bottom1{
		margin-top:10%;
		background-color:#FFF;
		background-color:#9C3;
		color:#009;
		font-weight:bold;
	}
    </style>
</head>
<body>
<?php
session_start();
if(isset($_SESSION['name']))
{
	require 'top.php';
?>
<div class="TR1" >
    	<table align="center" width="100%" height="50%" border="0">
  <tr>
    <th colspan="3" style="font-size:30px; font-weight:bold; color:#F00; background-color:#9C3;">Lựa Chọn Mục</th>
  </tr>
  <tr align="center" class="bang12">
    <td>
    	<label style=" font-weight:bold; font-size:15px">Quản lí Môn</label>
    </td>
    <td>
    	<label style=" font-weight:bold; font-size:15px">Quản lí Giáo Viên</label>
    </td>
    <td>
    	<label style=" font-weight:bold; font-size:15px">Quản lí Sinh Viên</label>
    </td>
  </tr>
  <tr align="center">
    <td>
    	<a href="quanli-mon.php"><img src="imgs/Cake.png" width="180" height="180" /></a>
    </td>
    <td>
    	<a href="quanli-gv.php"><img src="imgs/css.jpg" width="180" height="180" /></a>
    </td>
    <td>
    	<a href="quanli-sv.php"><img src="imgs/no.png" width="180" height="180" /></a>
    </td>
  </tr>
</table>
</div>
<div class="bottom1">
<span>Địa chỉ: 170 An Dương Vương, Tp. Quy Nhơn</span>
<br>
<span>Điện thoại: 01202 621 675 </span>
<span>| Email: dhqn@qnu.edu.vn | Tổ chức: web@qnu.edu.vn </span>
<span>| Website: www.qnu.edu.vn</span>
<br>
<span>----------------------------------------------------------</span>
</div>
<?php
}
else
{
	echo '<center>';
	echo "Sorry! Bạn Chưa Đăng Nhập ";
	echo '<a href="login.php">Quay Lại</a>';
	echo '</center>';
}
?>
</div>
<div class="TR2">
	<label><marquee>© Copy Right 2015 by Nguyễn Đình Tạo</marquee></label>
</div>
</center>
</body>
</html>