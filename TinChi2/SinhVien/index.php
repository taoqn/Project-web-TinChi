<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chào Mừng Sinh Viên</title>
<link rel="icon" href="imgs/LOGO DHQN.jpg" type="image/x-icon" />
<style>
#name{
	font-size:30px;
	font-weight:bold;
	color:#06F;
	background-color:#CF3;
}
#form1{
	width:50%;
	height:200px;
	border:1px solid #003;
}
</style>
</head>
<body>
<center>
	<img src="imgs/LOGO DHQN.jpg" width="150px" height="150px" style="margin-bottom:7%;" />
    <form>
<?php
if(isset($_POST['username']) && isset($_POST['password']))
{
    $taikhoan=$_POST['username'];
    $matkhau=$_POST['password'];
    $conn=mysqli_connect("localhost","root","");
    mysqli_select_db($conn,"quanli_sinhvien");
    mysqli_query($conn,"set names 'utf8' ");
    $sql="select * from newsv where masv='".$taikhoan."' ";
    $kqua=mysqli_query($conn,$sql);
    if($num = mysqli_num_rows($kqua) <= 0 )
    {
        echo 'Mã Số không tồn tại <a href="javascript:history.go(-1)">Quay Lại</a>';
    }
    if($row=mysqli_fetch_array($kqua))
    {
        if($row['matkhau']!=$matkhau)
            echo 'Sai mật khẩu <a href="javascript:history.go(-1)">Quay Lại</a>';
        else
            {
                echo 'Đăng Nhập thành công !';
				session_start();
                $_SESSION['id'] = $row['sott'];
                $_SESSION['ma'] = $row['masv'];
                $_SESSION['subname'] = $row['ho'];
				$_SESSION['name'] = $row['ten'];
                $_SESSION['mk'] = $row['matkhau'];
                header('location:main.php');
            }
    }
}
else
{
?>
    </form>
    <form id="form1" method="post" action="index.php">
	<table width="80%" id="bang" style="margin-top:10%; font-weight:bold; color:#36F;">
  		<tr>
    		<td>Mã Sinh Viên :</td>
    		<td><input name="username" type="text" /></td>
  		</tr>
  		<tr>
    		<td>Mật khẩu :</td>
    		<td><input name="password" type="password" /></td>
  		</tr>
	</table>
    <input type="submit" value="Đăng Nhập" style="margin-top:5%;" /><br />
    </form>
<?php
}
?>
</center>
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