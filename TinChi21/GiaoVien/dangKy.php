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
	.span1{
		width:22%;
		overflow:auto;
		height:400px;
		float:left;
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
?>
<div class="TR1" >
    <label class="span3" id="span3">
    	<form name="form2" style="margin:20px;" id="form2">
        </form>
    </label>
    <label class="span1" id="span1">
    	<?php require 'dangKy-label-1.php'; ?>
    </label>
    <label class="span2" id="span2">
    	<form name="form1" style="margin:20px;">
            <span style="color: red; font-weight: bold; font-size: 25px;">Mã Giáo Viên : </span>
            <span id="maGV" style="color: black; font-weight: bold; font-size: 25px;"><?php echo $maGV; ?></span>
            <br />
            <span style="color: red; font-weight: bold; font-size: 25px;">Mã Môn : </span>
            <span id="maSo" name="maSo" style="color: Black; font-weight: bold; font-size: 25px;">Chọn mã môn bên phải</span>
            <br />
    		<span>Số Lượng tối đa : </span>
    		<span><input name="toiDa" id="toiDa" type="text" /></span>
            <br />
            <span>----------------------------------</span>
            <table border="1" width="100%" height="150px" style="border-collapse:collapse;">
  				<tr>
    				<th>Thứ 2</th>
    				<th>Thứ 3</th>
    				<th>Thứ 4</th>
    				<th>Thứ 5</th>
    				<th>Thứ 6</th>
    				<th>Thứ 7</th>
    				<th>Chủ Nhật</th>
  				</tr>
  				<tr align="center">
    				<td>
                    <span>Tiết</span><br />
                    <input name="thuNgay" id="thuNgay" type="text" />
                    </td>
    				<td>
                    <span>Tiết</span><br />
                    <input name="thuNgay" id="thuNgay" type="text" />
                    </td>
    				<td>
                    <span>Tiết</span><br />
                    <input name="thuNgay" id="thuNgay" type="text" />
                    </td>
    				<td>
                    <span>Tiết</span><br />
                    <input name="thuNgay" id="thuNgay" type="text" />
                    </td>
    				<td>
                    <span>Tiết</span><br />
                    <input name="thuNgay" id="thuNgay" type="text" />
                    </td>
    				<td>
                    <span>Tiết</span><br />
                    <input name="thuNgay" id="thuNgay" type="text" />
                    </td>
    				<td>
                    <span>Tiết</span><br />
                    <input name="thuNgay" id="thuNgay" type="text" />
                    </td>
  				</tr>
			</table>
            <span style="color:#F00; font-size:25px; font-weight:bold;">Ví Dụ: ô Thứ 2 có thể nhập : 1-2 </span>
            <br />
            <span>----------------------------------</span>
            <br />
            <center><input type="button" name="themMon" id="themMon" value="Thêm" /></center>
        </form>
    </label>
</div>
<script>
	function chonLich(ma){
	   document.getElementById("maSo").innerHTML=ma;
	}
    function layTiet(){
        var lich = "";
        for(var i=0;i<form1.thuNgay.length;i++)
        {
            if(form1.thuNgay[i].value!="")
            {
                lich+="t"+(i+2)+" "+form1.thuNgay[i].value+"$";
            }
        }
        lich=lich.substr(0,lich.length-1);
        return lich;
    }
    function ktTiet(){
        for(var i=0;i<form1.thuNgay.length;i++)
        {
            if(form1.thuNgay[i].value!="")
                return false;
        }
        return true;
    }
    $("#themMon").click(function(event){
        var maMon = $("#maSo").text();
        var maGiaoVien = $("#maGV").text();
        if(form1.toiDa.value==""){alert("Bạn chưa nhập số lượng tối đa !");}
        else if(maMon=="Chọn mã môn bên phải"){alert("Chưa Chọn Môn !");}
        else if(ktTiet()==true){alert("Chưa nhập lịch cho thứ nào !");}
        else
        {
            $.post('dangKy-label-2.php', {'maGV':maGiaoVien,'maMon':maMon,'soLuong':form1.toiDa.value,'tiet':layTiet()}, function(data) {$("#form2").html(data);});
        }
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