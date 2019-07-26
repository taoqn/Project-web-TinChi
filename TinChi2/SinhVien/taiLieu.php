<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" href="imgs/LOGO DHQN.jpg" type="image/x-icon" />
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
<style>
	.TR1{
		width:100%;
		background-color:#FFF;
	}
	.span1{
		width:22%;
		overflow:auto;
		height:400px;
		float:left;
        margin-top: 40px;
	}
	.span2{
		width:77%;
		overflow:auto;
		height:400px;
		float:right;
		border:1px solid #000;
	}
    .span3{
		width:100%;
		border:1px solid #000;
        float: right;
    }
    span{
        font-weight: bold;
    }
   	#div-v1{
		color:#096;
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
    <center>
        <h2><b>Tìm tài liệu theo tên tài liệu hoặc mã số</b></h2>
        <form name="form1" style="margin:20px;">
            <span style="font-weight: bold;">Tìm tài liệu : </span>
            <input type="text" name="timTL" id="timTL" onkeyup="hienThiTL(this.value)" />
        </form>
    </center>
        <span id="kQuaTim"></div>
	<script>
        var k = "";
		function hienThiTL(tl){
            if(tl.length < 1)
                return;
            k=tl;
            hienThi(0,10);
		}
		function hienThi(viTri,soLuong){
	   		//var kqTim = form1.timTL.value;
            $.post('taiLieu-label.php', {'viTri':viTri,'soLuong':soLuong,'kqTim':k}, function(data) {$("#kQuaTim").html(data);});
		}
	</script>
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