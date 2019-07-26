<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
<title>Chào Mừng Giảng Viên</title>
<style>
	.TR1{
		width:100%;
		background-color:#FFF;
	}
</style>
</head>
<body>
<?php
    ini_set('upload_max_filesize', '10M');
    ini_set('post_max_size', '10M');
    ini_set('max_execution_time', 300);
    require 'AD.php';
    session_start();
    if(isset($_SESSION['id']) && isset($_SESSION['name']) && isset($_SESSION['mk']))
    {
        $sql="Select * from giaovien where matKhau='".$_SESSION['mk']."' and tenGV='".$_SESSION['name']."' ";
        $kqua=Data::TruyVanGV($sql);
        if($num=mysqli_num_rows($kqua) > 0)
        {
            require 'top.php';
            $time=1;
            if($time==1)
            {
  		$ma="";$maGV="";
		$sql="Select * from giaovien where matKhau='".$_SESSION['mk']."' and tenGV='".$_SESSION['name']."' ";
        $kqua=Data::TruyVanGV($sql);
		if($row=mysqli_fetch_array($kqua)){$ma=$row['khoa'];$maGV=$row['maGV'];}
?>
<div class="TR1" >
    <label class="span3" id="span3">
        <table align="center" width="80%">
        	<tr align="center">
            	<td><a href="javascript:layCV('1')"><img src="imgs/tim.png" height="50px" width="150px" /></a></td>
                <td><a href="javascript:layCV('2')"><img src="imgs/file.png" height="50px" width="150px" /></a></td>
                <td><a href="javascript:layCV('3')"><img src="imgs/uploads.png" height="50px" width="150px" /></a></td>
            </tr>
        </table>
    </label>
    <center><span>-------------------------------------------------------------</span></center><br />
    <label class="span2" id="span2">
        <center>
            <label style="font-weight: bold;margin-bottom: 10px;">Mã Giáo Viên : 
            <span id="layMaGV" style="color: red;"><?php echo $maGV; ?></span></label>
        </center>
        <div id="kQua"></div>
    </label>
</div>
<script>
    function layCV(ma)
    {
        var maGV = $('#layMaGV').text();
        $.post('taiLieu-label.php', {'cv':ma,'magv':maGV}, function(data) {$("#kQua").html(data);});
    }
</script>
<?php
            }
            else
                echo "<center>Hết thời hạn đăng ký !</center>";
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