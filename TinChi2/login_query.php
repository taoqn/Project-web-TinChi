<?php
    require 'AD.php';
	if($_POST['user']!="" && $_POST['pass']!="")
	{
		$matkhau=$_POST['pass'];
		$sql="select sott,user,matkhau,ten from quantri where user='".$_POST['user']."'";
		$kqua=Data::TruyVan($sql);
		if($m=mysqli_num_rows($kqua) <= 0 )
			echo "User chưa đăng ký !";
		if($row=mysqli_fetch_array($kqua))
		{
			if($matkhau != $row['matkhau'])
				echo "Mật Khẩu Sai!";
			else
			{
				session_start();
				$_SESSION['name'] = $row['ten'];
				echo "Đăng Nhập Thành Công !";
			}
		}
	}
    else
        echo "Sorry, Chưa đầy đủ thông tin !";
?>