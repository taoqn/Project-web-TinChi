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
    <label class="span3" id="span3">
        <form name="form3" style="margin:20px;" id="form3">
            <center>
                <label style="font-weight: bold;">Mã Sinh Viên : <span id="layMaSV" style="color: red;"><?php echo $_SESSION['ma']; ?></span></label>
            </center>
        </form>
    	<form name="form2" style="margin:20px;" id="form2">
            <table border="1" class="bang" style="border-collapse:collapse;" width="100%">
                <tr bgcolor=" yellow">
                    <th>STT</th>
                    <th>Tên Môn</th>
                    <th>Mã Môn</th>
                    <th>Số Tín Chỉ</th>
                    <th>Học Kỳ</th>
                    <th>Môn Yêu Cầu</th>
                    <th></th>
                </tr>
<?php
    $sql="select * from `".$masv."` order by HK,Dsach,sott asc";
    $kqua=Data::TruyVanDiem($sql);
    $i=1;$ma="";$tongTC=0;$soTC=0;
    while($row=mysqli_fetch_array($kqua))
    {
        if($ma!=$row['maMon'])
        {
            $ma=$row['maMon'];
            echo '<tr>';
            echo '<td align="center">'.$i.'</td>';
            echo '<td>'.$row['Dsach'].'</td>';
            echo '<td align="center">'.$row['maMon'].'</td>';
            echo '<td align="center">'.$row['soTC'].'</td>';
            echo '<td align="center">'.$row['HK'].'</td>';
            echo '<td align="center">'.$row['rangBuoc'].'</td>';
            if($row['dangKy']=='hoanThanh')
            {
                $soTC+=$row['soTC'];
                echo '<td align="center">Đã Học</td>';
            }
            echo '</tr>';
            $tongTC+=$row['soTC'];
            $i++;
        }
    }
    echo '<tr>';
    echo '<td align="right" colspan="3" style="font-weight: bold;color: red;">Tổng số tín chỉ đã học :</td>';
    echo '<td align="center" style="font-weight: bold;color: red;">'.$soTC.'/'.$tongTC.'</td>';
    echo '<td align="right" colspan="3"></td>';
    echo '</tr>';
?>
            </table>
        </form>
    </label>
</div>
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
</body>
</html>