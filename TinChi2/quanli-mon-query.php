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
        if($_POST['cv']=="Thêm Môn")
        {
?>
        <br>
        <span style="color:#F00; font-size:18px;">Chú ý: Chỉ chọn ô "Chọn ngành" 1 lần duy nhất, nếu chọn lại vui lòng ấn F5 để chọn lại !</span>
	   <br>
        <form name="form4">
        <span>Chọn ngành : </span>
        <select id="nganh" name="nganh" onChange="camChon(this.value)">
    	   <option>-------</option>
            <?php Data::dsNganh(); ?>
        </select>
        <span> | Chọn Khoa : </span>
        <select id="tenKhoa" name="tenKhoa">
    	   <option>-------</option>
            <?php Data::dsTenKhoa(); ?>
        </select>
        <span> | Tên môn :</span>
        <input name="tenmon" type="text" size="30" maxlength="200">
        <span> | Số tín chỉ :</span>
        <input name="sotc" type="text" size="1" maxlength="1">
        <span> | Học kỳ :</span>
        <input name="hocky" type="text" size="1" maxlength="1">
        <br>
        <span>-----------------------------------------------</span>
        <br>
        <span>Các ngành được phép học : </span>
        <br>
        <table width="60%" border="1" align="center" class="bang">
  		    <tr bgcolor="#C93">
    		  <th>STT</th>
    		  <th>Tên ngành</th>
    		  <th>Viết tắt</th>
    		  <th>Mã ngành</th>
              <th>
                <a href="javascript:chonAll(1)">Check All</a> / 
                <a href="javascript:chonAll(0)">Reset</a>
              </th>
  		    </tr>
<?php
	       $sql="select * from ds_nganh order by nganh asc";
	       $kqua=Data::TruyVanMon($sql);
	       $i=1;
	       while($row=mysqli_fetch_array($kqua))
	       {
		      echo '<tr id="'.$row['ma'].'" name="'.$row['nganh'].'">';
		      echo '<td align="center">'.$i.'</td>';
		      echo '<td>'.$row['nganh'].'</td>';
		      echo '<td>'.$row['rutgon'].'</td>';
		      echo '<td align="center">'.$row['ma'].'</td>';
		      echo '<td align="center"><input type="checkbox" id="chonNganh" name="chonNganh[]" value="'.$row['ma'].'" /></td>';
		      echo '</tr>';
		      $i++;
	       }
?>
        </table>
        </form>
        <form name="formR" id="formR">
        <center>
        <br>
        <span>Môn yêu cầu :</span>
        <select id="rangBuoc" name="rangBuoc">
    	   <option value="">-------</option>
           <?php Data::dsMon() ?>
        </select>
        </center>
        </form>
        <br>
        <center>
            <input name="done" type="button" id="them" value="Thêm vào" />
            <span id="kquaSQL"><img src="imgs/not-available.png" /></span>
        </center>
    <script type="text/javascript">
        function layNganh(){
            for(var i=0;i<form4.nganh.length;i++)
            {
                if(form4.nganh[i].selected==true)
                    return form4.nganh[i].value;
            }
        }
        function camChon(nganh){
            document.getElementById(nganh).innerHTML="";
            $("#nganh").attr("disabled","disabled");
        }
        function layTenKhoa(){
            for(var i=0;i<form4.tenKhoa.length;i++)
            {
                if(form4.tenKhoa[i].selected==true)
                    return form4.tenKhoa[i].value;
            }
        }
        function layRangBuoc(){
            for(var i=0;i<formR.rangBuoc.length;i++)
            {
                if(formR.rangBuoc[i].selected==true)
                    return formR.rangBuoc[i].value;
            }
        }
        function chonAll(dk){
            if(dk==1)
            {
                for(var i=0;i<form4.chonNganh.length;i++)
                {
                    form4.chonNganh[i].checked=true;
                }
            }
            else
            {
                for(var i=0;i<form4.chonNganh.length;i++)
                {
                    form4.chonNganh[i].checked=false;
                }
            }
        }
        $(document).ready(function() {
            $("#them").click(function(event){
                if(layNganh()=="-------"){alert("Chưa chọn ngành !");}
                else if(form4.tenmon.value==""){alert("Chưa nhập tên môn !");}
                else if(layTenKhoa()=="-------"){alert("Chưa chọn khoa !");}
                else if(form4.sotc.value==""){alert("Chưa nhập số tín chỉ !");}
                else if(form4.hocky.value==""){alert("Chưa nhập học kỳ !");}
                else
                {
                    
                    $("#kquaSQL").html("<img src=\"imgs/ajax-loader.gif\" />");
                    var dl="";
                    for(var i=0;i<form4.chonNganh.length;i++)
                    {
                        if(form4.chonNganh[i].checked==true)
                            dl=dl+form4.chonNganh[i].value+"-";
                    }
                    dl=layNganh()+"-"+dl;
                    dl=dl.substr(0,dl.length-1)
                    $.post('quanli-mon-query.php', {'tenMon':form4.tenmon.value,'soTC':form4.sotc.value,'hocKy':form4.hocky.value,'uTien':dl,'tenKhoaCN':layTenKhoa(),'rangBuoc':layRangBuoc()}, function(data) {
                        $("#kquaSQL").html(data);
                        $.post('quanli-mon-query.php', {'Reset':form4.tenmon.value}, function(data) {
                            $("#formR").html(data);
                        });
                    });
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
                    <option>------</option>
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
        if($_POST['cv']=="Cập Nhập Điểm cho Sinh Viên")
        {
?>
        <br>
        <form name="form4">
            <span>Chọn Lớp Học Phần : </span>
            <input name="tenHP" type="text" size="30" maxlength="200">
            <input name="chonHP" type="button" id="chonHP" value="Chọn" />
            <br>
            <span>-----------------------------------------------</span>
        </form>
        <form name="formD">
            <span id="kquaSQL"></span>
        </form>
        <script>
            function layChuyenCan()
            {
                var ck = "";
                for(var i =0;i<formD.chuyenCan.length;i++)
                {
                    ck+=formD.chuyenCan[i].value+"-";
                }
                return ck.substr(0,ck.length-1);
            }
            function layGiuaKy()
            {
                var ck = "";
                for(var i =0;i<formD.giuaKy.length;i++)
                {
                    ck+=formD.giuaKy[i].value+"-";
                }
                return ck.substr(0,ck.length-1);
            }
            function layCuoiKy()
            {
                var ck = "";
                for(var i =0;i<formD.cuoiKy.length;i++)
                {
                    ck+=formD.cuoiKy[i].value+"-";
                }
                return ck.substr(0,ck.length-1);
            }
            $("#chonHP").click(function(event){
                $("#chonHP").attr("value","Chọn");
                $.post('quanli-mon-query.php', {'tenHP':form4.tenHP.value}, function(data) {
                    $("#kquaSQL").html(data);
                    $("#hoanThanhHP").click(function(event){
                        $("#chonHP").attr("value","Sửa");
                        $.post('quanli-mon-query.php', {'tenHP':form4.tenHP.value,'chuyenCan':layChuyenCan(),'giuaKy':layGiuaKy(),'cuoiKy':layCuoiKy()}, function(data) {
                            $("#kquaSQL").html(data);
                        });
                    });
                });
            })
        </script>
<?php
        }
        if($_POST['cv']=="Xem Phòng Học")
        {
?>
        <br>
        <form name="form4">
            <span>Chọn Dãy Nhà: </span>
            <select onchange="layDay(this.value)">
                <option>-------------</option>
                <option value="all">Tất cả</option>
                <?php Data::dsDayPhong(); ?>
            </select>
        </form>
        <span>-----------------------------------------------</span>
        <br>
        <form name="formD">
            <span id="kquaSQL"></span>
        </form>
        <script>
            function layDay(ma)
            {
                $.post('quanli-mon-query.php', {'dayNha':ma}, function(data) {
                    $("#kquaSQL").html(data);
                });
            }
            $("#chonHP").click(function(event){
                $("#chonHP").attr("value","Chọn");
                $.post('quanli-mon-query.php', {'tenHP':form4.tenHP.value}, function(data) {
                    $("#kquaSQL").html(data);
                    $("#hoanThanhHP").click(function(event){
                        $("#chonHP").attr("value","Sửa");
                        $.post('quanli-mon-query.php', {'tenHP':form4.tenHP.value,'chuyenCan':layChuyenCan(),'giuaKy':layGiuaKy(),'cuoiKy':layCuoiKy()}, function(data) {
                            $("#kquaSQL").html(data);
                        });
                    });
                });
            })
        </script>
<?php
        }
    }
    if(isset($_POST['tenMon']) && isset($_POST['soTC']) && isset($_POST['hocKy']) && isset($_POST['uTien']) && isset($_POST['tenKhoaCN']) && isset($_POST['rangBuoc']))
    {
        $ten=substr($_POST['uTien'],0,3);
        $sql="INSERT INTO `quanli_mon`.`ds_mon` 
        VALUES (NULL,
         '".$ten."',
          '".$_POST['tenMon']."',
           '".$_POST['soTC']."',
            '".$_POST['hocKy']."',
             '".$_POST['uTien']."',
             '".$_POST['rangBuoc']."',
             '".$_POST['tenKhoaCN']."');";
        $kqua=Data::TruyVanMon($sql);
        Data::capNhatMaMon($ten,$_POST['tenMon']);
        echo 'Đã thêm vào cơ sở dữ liệu <img src="imgs/available.png" />';
    }//#1
    if(isset($_POST['tenNganh']))
    {
?>
    <table width="100%" border="1" align="center" class="bang">
  		<tr bgcolor="#C93">
    		<th>STT</th>
    		<th>Tên Môn</th>
    		<th>Mã Môn</th>
            <th>Thuộc Khoa</th>
    		<th>Số Tín Chỉ</th>
            <th>Học Kỳ</th>
            <th>Các ngành được phép học</th>
            <th>Môn Bắt Buộc</th>
  		</tr>
<?php
        if($_POST['tenNganh']=="Tất cả")
            $sql="select * from ds_mon order by maMon asc";
        else
            $sql="select * from ds_mon where UuTien like '".$_POST['tenNganh']."%' order by tenMon asc";
        $kqua=Data::TruyVanMon($sql);
        $i=1;
        while($row=mysqli_fetch_array($kqua))
        {
            $mang1=explode('-',$row['UuTien']);
            $day="";
            foreach($mang1 as $key=>$value)
            {
                $s="select * from ds_nganh";
                $d=Data::TruyVanMon($s);
                while($k=mysqli_fetch_array($d))
                {
                    if($k['ma']==$value)
                        $day.=$k['nganh']." - ";
                }
            }
            $day=substr($day,0,strlen($day)-2);
            echo '<tr>';
            echo '<td align="center">'.$i.'</td>';
            echo '<td>'.$row['tenMon'].'</td>';
            echo '<td align="center">'.$row['maMon'].'</td>';
            echo '<td>'.$row['khoa'].'</td>';
            echo '<td align="center">'.$row['soTC'].'</td>';
            echo '<td align="center">'.$row['HK'].'</td>';
            echo '<td width="50%">'.$day.'</td>';
            echo '<td align="center">'.$row['rangBuoc'].'</td>';
            echo '</tr>';
            $i++;
        }
    }//#1
    if(isset($_POST['Reset']))
    {
        echo '<center><br><span>Môn yêu cầu :</span>';
        echo '<select id="rangBuoc" name="rangBuoc"><option value="">-------</option>';
        Data::dsMon();
        echo '</select></center>';
    }//#1
    if(isset($_POST['tenHP']))
    {
        $uutien="";
        $sql="SELECT * FROM  ds_mon where maMon = '".substr($_POST['tenHP'],0,6)."' ";
        $kqua=Data::TruyVanMon($sql);
        if($row=mysqli_fetch_array($kqua))
        {
            $uutien=$row['UuTien'];
            echo "<center>Danh sách sinh viên lớp <label style=\"color:red;\">".$_POST['tenHP']."</label> - Môn : <label style=\"color:red;\">".$row['tenMon']."</label></center>";
        }
?>
        <table align="center" border="1" style="border-collapse: collapse; margin-top: 10px" width="100%">
        <tr style="background-color: lawngreen;">
            <th>STT</th>
            <th>Sinh Viên</th>
            <th>Mã Sinh Viên</th>
            <th>Ngành</th>
            <th>Chuyên Cần</th>
            <th>Giữa Kỳ</th>
            <th>Cuối Kỳ</th>
            <th>DTB</th>
        </tr>
<?php
    $mang=explode("-",$uutien);
    $k=0;
    for($i=0;$i<(count($mang));$i++)
    {
        $tennganh="";
        $sql="SELECT * FROM ds_nganh where ma='".$mang[$i]."' order by ma asc";
        $kqua=Data::TruyVanMon($sql);
        if($row=mysqli_fetch_array($kqua)){$tennganh=$row['nganh'];}
        
        $sql="SELECT * FROM newsv where nganh='".$tennganh."' order by masv asc";
        $kqua=Data::TruyVanSV($sql);
        while($row=mysqli_fetch_array($kqua))
        {
            $sql1="SELECT * FROM  `".$row['masv']."` where maHP = '".$_POST['tenHP']."' and maMon = '".substr($_POST['tenHP'],0,6)."' order by sott desc";
            $kqua1=Data::TruyVanDiem($sql1);
            if($row1=mysqli_fetch_array($kqua1))
            {
                if($row1['dangKy']=="DangHoc" || $row1['dangKy']=="hoanThanh")
                {
                    echo '<tr>';
                    echo '<td align="center">'.($k+1).'</td>';
                    echo '<td>'.$row['ho'].' '.$row['ten'].'</td>';
                    echo '<td align="center">'.$row['masv'].'</td>';
                    echo '<td align="center">'.$row['nganh'].'</td>';
                    if(isset($_POST['chuyenCan']) && isset($_POST['giuaKy']) && isset($_POST['cuoiKy']))
                    {
                        $mangCC=explode("-",$_POST['chuyenCan']);
                        $mangGK=explode("-",$_POST['giuaKy']);
                        $mangCK=explode("-",$_POST['cuoiKy']);
                        $dtb=(float)$mangCC[$k]*0.1 + (float)$mangGK[$k]*0.2 + (float)$mangCK[$k]*0.7;
                        $themDiem="UPDATE  `quanli_diem`.`".$row['masv']."` SET  `chuyenCan` =  '".$mangCC[$k]."',
                                `giuaKy` =  '".$mangGK[$k]."',
                                `cuoiKy` =  '".$mangCK[$k]."',
                                `dangKy` =  'hoanThanh',
                        `DTB` =  '".$dtb."' WHERE  `".$row['masv']."`.`sott` =".$row1['sott'].";";
                        $ht=Data::TruyVanDiem($themDiem);
                        $ktrong="Select * from `".$row['masv']."` where dangKy is null and maHP is null and maMon = '".substr($_POST['tenHP'],0,6)."' ";
                        $kRong = Data::TruyVanDiem($ktrong);
                        $num1=mysqli_num_rows($kRong);
                        if($dtb<5)
                        {
                            if($num1!=1)
                            {
                                $hoclai="INSERT INTO  `quanli_diem`.`".$row['masv']."` VALUES (
                                NULL ,  
                                '".$row1['Dsach']."',  
                                '".$row1['maMon']."', NULL ,  
                                '".$row1['soTC']."',  
                                '".$row1['HK']."', 
                                NULL , NULL , NULL , NULL , NULL , NULL , NULL , NULL , NULL , NULL , NULL , '".$dtb."' , NULL ,  '', NULL);";
                                $ht=Data::TruyVanDiem($hoclai);
                            }
                        }
                        else
                        {
                            if($num1==1)
                            {
                                $xoaDiem="DELETE FROM `quanli_diem`.`".$row['masv']."` 
                                WHERE dangKy is null and maHP is null and maMon = '".substr($_POST['tenHP'],0,6)."' ;";
                                $ht=Data::TruyVanDiem($xoaDiem);
                            }
                        }
                        
                        echo '<td align="center">'.$mangCC[$k].'</td>';
                        echo '<td align="center">'.$mangGK[$k].'</td>';
                        echo '<td align="center">'.$mangCK[$k].'</td>';
                        echo '<td align="center">'.$dtb.'</td>';
                    }
                    else
                    {
                        echo '<td align="center"><input name="chuyenCan" type="text" size="4" maxlength="5" value="'.$row1['chuyenCan'].'"></td>';
                        echo '<td align="center"><input name="giuaKy" type="text" size="4" maxlength="5" value="'.$row1['giuaKy'].'"></td>';
                        echo '<td align="center"><input name="cuoiKy" type="text" size="4" maxlength="5" value="'.$row1['cuoiKy'].'"></td>';
                        echo '<td align="center">'.$row1['DTB'].'</td>';
                    }
                    echo '</tr>';
                    $k++;
                }
            }
        }
    }
?>
    </table>
    <center>
        <input name="hoanThanhHP" type="button" id="hoanThanhHP" value="Hoàn Thành" style="margin-top: 10px;" />
    </center>
<?php
    }//#2
    if(isset($_POST['dayNha']))
    {
?>
    <table width="100%" border="1" align="center" class="bang">
  		<tr bgcolor="#F25648">
    		<th width="2%">STT</th>
    		<th width="30%%">Phòng</th>
            <th width="10%">Lớp Học Phần</th>
    		<th width="53%">Ghi Chú</th>
  		</tr>
<?php
        if($_POST['dayNha']=="all")
            $sql="select * from phonghoc order by phong asc";
        else
            $sql="select * from phonghoc where dayPhong='".$_POST['dayNha']."' order by phong asc";
        $kqua=Data::TruyVan($sql);
        $i=1;
        while($row=mysqli_fetch_array($kqua))
        {
            echo '<tr>';
            echo '<td align="center">'.$i.'</td>';
            echo '<td align="center">'.$row['phong'].'</td>';
            echo '<td align="center"><a href="javascript:">DanhSach</a></td>';
            echo '<td>'.$row['ghiChu'].'</td>';
            echo '</tr>';
            $i++;
        }
    }//#2
?>
</body>
</html>