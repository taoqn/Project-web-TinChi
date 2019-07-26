<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
    $ma="";
    if(isset($_SESSION['ma']) && isset($_SESSION['id']) && isset($_SESSION['name']) && isset($_SESSION['subname']))
    {
        $ma=$_SESSION['ma'];
        $sql="Select * from newsv where ten='".$_SESSION['name']."' and ho='".$_SESSION['subname']."' and masv='".$_SESSION['ma']."' ";
        $kqua=Data::TruyVanSV($sql);
        if($num=mysqli_num_rows($kqua) > 0)
        {
            require 'top.php';
			while($row=mysqli_fetch_array($kqua))
			{	
?>
<div class="TR1" >
  <table align="center" border="1" width="80%" style="font-weight:bold;font-size: 15px;border-collapse: collapse;">
  <tr>
    <th colspan="3" style="font-weight:bold; color: black; background-color:#39F;">Thông Tin</th>
    <td rowspan="7" align="center">
        <form action="main.php" method="post" style="margin: 50px;">
            <table border="1" style="font-weight:bold;border-collapse: collapse;">
                <tr>
	               <th colspan="2">Đổi Mật Khẩu</th>
                </tr>
                <tr>
	               <td>Mật khẩu cũ :</td>
	               <td><input type="password" name="mkc" id="mkc" size="20" maxlength="50" /></td>
                </tr>
                <tr>
	               <td>Mật khẩu mới :</td>
	               <td><input type="password" name="mkm" id="mkm" size="20" maxlength="50" /></td>
                </tr>
                <tr>
	               <td>Nhập lại mật khẩu mới:</td>
	               <td><input type="password" name="remkm" id="remkm" size="20" maxlength="50" /></td>
                </tr>
            </table>
            <input type="submit" value="Đổi mật khẩu" />
            <input type="reset" value="Reset" /><br />
        </form>
    </td>
  </tr>
  <tr>
  	<td>Họ và Tên:</td>
    <td style="font-weight: bold;color: red;"><?php echo $_SESSION['subname'].$_SESSION['name']; ?></td>
  </tr>
  <tr>
    <td>Ngành:</td>
    <td style="font-weight: bold;color: red;"><?php echo $row['nganh']; ?></td>
  </tr>
  <tr>
    <td>Mã số:</td>
    <td style="font-weight: bold;color: red;"><?php echo $row['masv']; ?></td>
  </tr>
  <tr>
    <td>Lớp:</td>
    <td style="font-weight: bold;color: red;"><?php echo $row['lop']; ?></td>
  </tr>
  <tr>
    <td>Ngày Sinh:</td>
    <td style="font-weight: bold;color: red;"><?php echo $row['ngaysinh']; ?></td>
  </tr>
  <tr>
    <td>Tỉnh/Thành Phố:</td>
    <td style="font-weight: bold;color: red;"><?php echo $row['thanhPho']; ?></td>
  </tr>
</table>
</div>
<?php
			}
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
<center>
<span style="font-weight:bold; color: red;">
            <?php
                if(isset($_POST['mkc']) && isset($_POST['mkm']) && isset($_POST['remkm']))
                {
                    $mk1=$_POST['mkm'];
                    $mk2=$_POST['remkm'];
                    $sql="Select matkhau from newsv where masv='".$ma."' and matkhau='".$_POST['mkc']."' ";
                    $kqua=Data::TruyVanSV($sql);
                    $num=mysqli_num_rows($kqua);
                    if($num == 0)
                        {echo "Mật khẩu sai !";}
                    else
                    {
                        $sql="UPDATE  `quanli_sinhvien`.`newsv` SET  `matkhau` =  '".$_POST['remkm']."' WHERE  masv='".$_SESSION['ma']."' ;";
                        $kq=Data::TruyVanSV($sql);
                        echo "Đổi mật khẩu thành công !";
                    }
                }
            ?>
</span>
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