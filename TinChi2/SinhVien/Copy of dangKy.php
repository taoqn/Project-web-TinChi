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
    if(isset($_SESSION['ma']) && isset($_SESSION['id']) && isset($_SESSION['name']) && isset($_SESSION['mk']) && isset($_SESSION['subname']))
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
            <table align="center" border="1" style="border-collapse: collapse;" width="90%">
                <tr style="background-color: lightskyblue;">
                    <th>STT</th>
                    <th>Tên Môn</th>
                    <th>Giáo Viên</th>
                    <th>Số Tín Chỉ</th>
                    <th>Thứ 2</th>
                    <th>Thứ 3</th>
                    <th>Thứ 4</th>
                    <th>Thứ 5</th>
                    <th>Thứ 6</th>
                    <th>Thứ 7</th>
                    <th>Chủ Nhật</th>
                    <th></th>
                </tr>
<?php
    $sql="SELECT * FROM  `".$masv."` where dangKy='DangHoc'";
    $kqua=Data::TruyVanDiem($sql);
    $i=1;
    while($row=mysqli_fetch_array($kqua))
    {
        echo '<tr>';
        echo '<td align="center">'.$i.'</td>';
        echo '<td>'.$row['Dsach'].'</td>';
        $sql1="Select * from giaovien where maGV='".substr($row['maHP'],6,4)."' ";
        $kqua1=Data::TruyVanGV($sql1);
        if($row1=mysqli_fetch_array($kqua1)){echo '<td>'.$row1['tenGV'].'</td>';}
        echo '<td align="center">'.$row['soTC'].'</td>';
        echo '<td align="center">'.$row['T2'].'</td>';
        echo '<td align="center">'.$row['T3'].'</td>';
        echo '<td align="center">'.$row['T4'].'</td>';
        echo '<td align="center">'.$row['T5'].'</td>';
        echo '<td align="center">'.$row['T6'].'</td>';
        echo '<td align="center">'.$row['T7'].'</td>';
        echo '<td align="center">'.$row['CN'].'</td>';
        echo '<td align="center"><a href="javascript:xoaLich(\''.$row['maHP'].'\')">Xóa</a></td>';
        echo '</tr>';
        $i++;
    }
?>
            </table>
        </form>
    </label>
    <label class="span1" id="span1">
        <table border="1" class="bang" style="border-collapse:collapse;" width="100%">
  	     <tr bgcolor="#C93">
    	       <th>Tên Môn</th>
    	       <th>Mã Môn</th>
                <th></th>
  	     </tr>
    <?php
        $hk=Data::layHK($khoa);
		$sql="select * from `".$masv."` where HK='".$hk."' or HK='".($hk+1)."' or DTB<5 order by Dsach asc";
        $kqua=Data::TruyVanDiem($sql);
        while($row=mysqli_fetch_array($kqua))
        {
            echo '<td>'.$row['Dsach'].'</td>';
            echo '<td>'.$row['maMon'].'</td>';
            if($row['DTB']<4 and $row['DTB']!="")
                echo '<td align="center"><a href="javascript:chonLich(\''.$row['maMon'].'\')">Học Lại</a></td>';
            elseif($row['DTB']<5 and $row['DTB']!="")
                echo '<td align="center"><a href="javascript:chonLich(\''.$row['maMon'].'\')">Cải Thiện</a></td>';
            else
                echo '<td align="center"><a href="javascript:chonLich(\''.$row['maMon'].'\')">Chọn</a></td>';
            echo '</tr>';
        }
    ?>
        </table>
    </label>
    <label class="span4" id="span4">
        <center>
            <input type="button" name="chonLichdk" id="chonLichdk" value="Đăng Ký" style=" margin: 10px;" />
        </center>
    </label>
    <label class="span2" id="span2">
    	<form name="form1" style="margin:20px;" id="form1">
        </form>
    </label>
</div>
<script>
	function layHocPhan(){
	   for(var i=0;i<form1.chLich.length;i++)
       {
            if(form1.chLich[i].checked==true)
                return form1.chLich[i].value;
       }
	}
    function xoaLich(hp){
        var dy = confirm("Bạn thật sự muốn xóa ?");
        if(dy==true)
        {
            var maSV = $("#layMaSV").text();
            $("#form2").html("<center><img src=\"imgs/2ajax-loader.gif\" /></center>");
            $.post('dangKy-label-1.php', {'maSV':maSV,'maHPxoa':hp}, function(data) {
                $("#form2").html(data);
                $("#form1").html("");
            });
        }
    }
    function xemDK(hp1){
        id=hp1.substr(0,6);
        var ur = "xemAi.php?id="+id;
        window.open(ur, "Xem Lịch", "width=800,height=500");
    }
	function chonLich(ma){
	   $("#form1").html("<center><img src=\"imgs/2ajax-loader.gif\" /></center>");
	   $.post('dangKy-label-1.php', {'maChon':ma}, function(data) {$("#form1").html(data);});
	}
    $("#chonLichdk").click(function(event){
        var maSV = $("#layMaSV").text();
        $.post('dangKy-label-1.php', {'maSV':maSV,'maLayHP':layHocPhan()}, function(data) {
            if(data=="trung"){alert("Đã trùng lịch !");}
            else if(data=="dadk"){alert("Đã đăng ký môn này, xóa môn này ở trên rồi chọn lại !");}
            else
            {
                $.post('dangKy-label-2.php', {'maSV':maSV,'maLayHP':layHocPhan()}, function(data) {
                    $("#form2").html(data);
                    $("#form1").html("");
                });
            }
        });
    })
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
</body>
</html>