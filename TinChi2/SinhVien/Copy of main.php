<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chào Mừng Giảng Viên</title>
<style>
	.TR1{
		width:100%;
		border:1px solid #000;
		background-color:#FFF;
	}
</style>
</head>
<body>
<?php
    require 'AD.php';
    session_start();
    if(isset($_SESSION['ma']) && isset($_SESSION['id']) && isset($_SESSION['name']) && isset($_SESSION['subname']) && isset($_SESSION['mk']))
    {
        $sql="Select * from newsv where matkhau='".$_SESSION['mk']."' and ten='".$_SESSION['name']."' and ho='".$_SESSION['subname']."' and masv='".$_SESSION['ma']."' ";
        $kqua=Data::TruyVanSV($sql);
        if($num=mysqli_num_rows($kqua) > 0)
        {
            require 'top.php';
?>

<div class="TR1" >
    	<table align="center" width="100%" height="50%" border="0">
  <tr>
    <th colspan="3" style="font-size:30px; font-weight:bold; color:#F00; background-color:#36F;">Thông Tin</th>
  </tr>
  <tr align="center" class="bang12">
  </tr>
  <tr align="center">
  </tr>
</table>
</div>
<?php
        }
        else
        {
            echo "<center>Đăng nhập lỗi ! <a href=\"index.php\">Đăng Nhập</a></center>";
        }
    }
    else
        {
            echo "<center>Vui lòng đăng nhập ! <a href=\"index.php\">Đăng Nhập</a></center>";
        }
?>
<div style="font-weight:bold; margin-top:7%;">
<span>Địa chỉ: 170 An Dương Vương, Tp. Quy Nhơn</span>
<br>
<span>Điện thoại: 01202 621 675 </span>
<span>| Email: dhqn@qnu.edu.vn | Tổ chức: web@qnu.edu.vn </span>
<span>| Website: www.qnu.edu.vn</span>
<br>
<span>----------------------------------------------------------</span>
</div>
</body>
</html>