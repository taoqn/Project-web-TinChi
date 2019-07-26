<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
    <style>
	.bang{
		border-collapse:collapse;
		font-weight:bold;
	}
	.bang td,tr{
		border:1px solid #09C;
	}
	</style>
</head>
<body>
<?php
    require 'AD.php';
    if(isset($_POST['cv']))
    {
        if($_POST['cv']=="Thêm Giáo Viên theo Khoa")
        {
?>
        <br>
        <form name="form4">
            <span>Chọn Khoa : </span>
            <select id="tenKhoa" name="tenKhoa">
    	       <option>-------</option>
                <?php Data::dsTenKhoa(); ?>
            </select>
            <table width="40%" height="250px" align="center" style="font-weight: bold;">
                <tr>
                    <td>Tên Giáo Viên</td>
                    <td><input id="tenGV" name="tenGV" type="text" /></td>
                </tr>
                <tr>
                    <td>Chức vụ</td>
                    <td><input id="chucVuGV" name="chucVuGV" type="text" /></td>
                </tr>
                <tr>
                    <td>Ngày Sinh</td>
                    <td><input id="ngaySinhGV" name="ngaySinhGV" type="text" /></td>
                </tr>
                <tr>
                    <td>Tỉnh/Thành Phố</td>
                    <td>
                        <select id="tenTinh" name="tenTinh">
                            <?php Data::dsTinh(); ?>
                        </select>
                    </td>
                </tr>
                <tr align="center">
                    <td colspan="2"><input id="themGV" name="themGV" type="button" value="Thêm" />
                    <span id="kquaSQL"><img src="imgs/not-available.png" /></span></td>
                </tr>
            </table>
        </form>
    <script type="text/javascript">
        function layTenKhoa(){
            for(var i=0;i<form4.tenKhoa.length;i++)
            {
                if(form4.tenKhoa[i].selected==true)
                    return form4.tenKhoa[i].value;
            }
        }
        function layTinh(){
            for(var i=0;i<form4.tenTinh.length;i++)
            {
                if(form4.tenTinh[i].selected==true)
                    return form4.tenTinh[i].value;
            }
        }
        $(document).ready(function() {
            $("#themGV").click(function(event){
                if(layTenKhoa()=="-------"){alert("Chưa chọn Khoa !");}
                else if(form4.tenGV.value==""){alert("Chưa nhập tên Giáo Viên !");}
                else if(form4.chucVuGV.value==""){alert("Chưa nhập chức vụ !");}
                else if(form4.ngaySinhGV.value==""){alert("Chưa nhập ngày sinh !");}
                else
                {
                    $("#kquaSQL").html("<img src=\"imgs/ajax-loader.gif\" />");
                    $.post('quanli-gv-query.php', {'tenGV':form4.tenGV.value,'chucVuGV':form4.chucVuGV.value,'ngaySinhGV':form4.ngaySinhGV.value,'tinhGV':layTinh(),'khoaGV':layTenKhoa()}, function(data) {$("#kquaSQL").html(data);});
                }
            });
        });
    </script>
<?php
        }
		if($_POST['cv']=="In Danh Sách Môn")
        {
?>
	       <br>
            <form name="form4">
                <span>Chon ngành : </span>
                <select id="nganh" name="nganh" onChange="hienThiDS(this.value)">
                    <option>Tất cả</option>
                    <?php Data::dsNganh(); ?>
                </select>
                <br>
            </form>
            <span id="kquaSQL"></span>
        <script>
            function hienThiDS(ds){
                $.post('quanli-mon-query.php', {'tenNganh':form4.nganh.value}, function(data) {$("#kquaSQL").html(data);});
        }
        </script>
<?php
		}
    }
    if(isset($_POST['tenGV']))
    {
        $ma="";
        $sql="select * from ds_khoa where tenKhoa='".$_POST['khoaGV']."' ";
        $kqua=Data::TruyVanMon($sql);
        if($row=mysqli_fetch_array($kqua)) {$ma=$row['maKhoa'];}
        
        $sql="INSERT INTO `quanli_giaovien`.`giaovien` 
        VALUES (NULL,
         '".$_POST['tenGV']."',
          '".$ma."',
           '".$_POST['khoaGV']."',
            '".$_POST['chucVuGV']."',
             '".$_POST['ngaySinhGV']."',
              '".$_POST['tinhGV']."',
              '".$_POST['ngaySinhGV']."' );";
        $kqua=Data::TruyVanGV($sql);
        Data::capNhatMaGV($_POST['khoaGV'],$ma);
        
        echo 'Đã thêm '.$_POST['tenGV'].' ! <img src="imgs/available.png" />';
    }
?>
</body>
</html>