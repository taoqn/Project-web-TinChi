<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Admin</title>
	<link rel="stylesheet" href="Style-main.css" />
    <script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
    <script>
	function layCongViec(cv){
		$.post('quanli-gv-query.php', {'cv':cv}, function(data) {$("#form1").html(data);});
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
<div class="TR1" id="TR1">
    <div id="div-1">
		<span>Chọn Công Việc : </span>
        <select name="selcectCV" onChange="layCongViec(this.value)">
            <option>------------</option>
            <option>Thêm Giáo Viên theo Khoa</option>
            <option>Xóa Giáo Viên</option>
        </select>
        <form id="form1" name="form1">
		</form>
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