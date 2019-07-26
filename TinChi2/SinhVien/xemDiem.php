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
            $time=1;
            if($time==1)
            {
          		$khoa="";$masv="";
                $kqua=Data::TruyVanSV($sql);
		          if($row=mysqli_fetch_array($kqua)){$khoa=$row['khoa'];$masv=$row['masv'];}
?>
<div class="TR1" >
        <form name="form3" style="margin:20px;" id="form3">
            <center>
                <h2>Xem Điểm Học Phần</h2>
                <label style="font-weight: bold;">Mã Sinh Viên : <span id="layMaSV" style="color: red;"><?php echo $_SESSION['ma']; ?></span></label>
            </center>
        </form>
    	<form name="form2" style="margin:20px;" id="form2">
        <center>
            <span>Chọn Khóa Học :</span>
            <select name="chonHK" id="chonHK" onchange="layChon(this.value)">
                <option>------------ ------------</option>
                <option value="all">-------- Tất cả --------</option>
     <?php
            $hk=Data::layHK($khoa);
            for($i=1;$i<=$hk;$i++)
            {
                echo '<option value="HocKy-'.$i.'">Học kỳ '.$i.' - Năm '.(int)(($i+1)/2).' </option>';
                if($i%2==0)
                    echo '<option value="He-'.$i.'">Học kỳ hè '.$i.' - Năm '.($i/2).' </option>';
            }
     ?>
            </select>
        </center>
        </form>
        <span id="span1"></span>
</div>
<script>
    var maSV = $("#layMaSV").text();
	function layChon(hk){
		if(hk=="------------ ------------"){alert('Chọn Khóa Học Lỗi!');}
        else
        {
            $.post('xemDiem-label.php', {'maSVhienThi':maSV,'hocKy':hk}, function(data) {
                $("#span1").html(data);
            });
        }
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