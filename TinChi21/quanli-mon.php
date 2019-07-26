<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Quản Lí Môn và Điểm</title>
	<link rel="stylesheet" href="Style-main.css" />
    <script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
    <script>
	function layCongViec(cv){
		$.post('quanli-mon-query.php', {'cv':cv}, function(data) {$("#form1").html(data);});
	}
	function layChon(str){
		if(str==1)
		{
			$("#A1").attr("style","background-color:yellow;");
			$("#A2").attr("style","background-color:white;");
			var tr = "<span>Chọn Công Việc : </span>";
			tr += "<select name=\"selcectCV\" onChange=\"layCongViec(this.value)\">";
			tr += "<option>------------</option>";
			tr += "<option>Thêm Môn</option>";
			tr += "<option>In Danh Sách Môn</option></select>";
			tr += "<form id=\"form1\" name=\"form1\">";
			tr += "</form>";
			document.getElementById("div-1").innerHTML=tr;
		}
		else
		{
			$("#A2").attr("style","background-color:yellow;");
			$("#A1").attr("style","background-color:white;");
			var tr = "<span>Chọn Công Việc : </span>";
			tr += "<select name=\"selcectCV\" onChange=\"layCongViec(this.value)\">";
			tr += "<option>------------</option>";
			tr += "<option>ddddd</option>";
			tr += "<option>11111111111111</option>";
			tr += "</select>";
			tr += "<form id=\"form1\" name=\"form1\">";
			tr += "</form>";
			document.getElementById("div-1").innerHTML=tr;
		}
	}
    </script>
    <style>
	body{
		font-weight:bold;
	}
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
    #A1{
        border: 1px solid black;
		height:100px;
		width:100px;
		font-size:20px;
		font-weight:bold;
    }
	#A1 a{
		margin:30px;
	}
    #A2{
        border: 1px solid black;
		height:100px;
		width:100px;
		font-size:20px;
		font-weight:bold;
    }
	#A2 a{
		margin:30px;
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
<div>
	<span id="A1"><a href="javascript:layChon(1)">Quản lí môn</a></span>
	<span id="A2"><a href="javascript:layChon(2)">Quản lí lịch học và điểm</a></span>
</div>
<div class="TR1" id="TR1">
    <div id="div-1">
    	<span>Hãy Chọn ở trên !</span>
    </div>
</div>
<script>
</script>
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