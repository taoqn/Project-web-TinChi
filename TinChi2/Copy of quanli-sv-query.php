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
        if($_POST['cv']=="Thêm Danh Sách Sinh Viên theo Lớp")
        {
?>
            <br>
            <form name="form4">
            <span>Chọn Tên lớp : </span>
            <select id="nganh" name="nganh">
                <option>-------</option>
                <?php
				    $sql="select * from ds_nganh order by rutgon asc";
				    $kqua=Data::TruyVanMon($sql);
				    while($row=mysqli_fetch_array($kqua))
				    {
					   echo '<option value="'.$row['rutgon'].'">'.$row['rutgon'].' - '.$row['nganh'].'</option>';
				    }
				?>
            </select>
            <span> | Chon Khóa : </span>
            <select id="khoa" name="khoa">
                <option>-------</option>
                <?php Data::dsKhoa(); ?>
            </select>
            <span> | </span>
            <select id="phiaSau" name="phiaSau">
                <option value="">---</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
                <option value="F">F</option>
            </select>
            <span> | </span>
            <input name="Xong" type="button" id="Xong" value="Chấp Nhận">
            <br>
            <center><span id="duocVao"></span></center>
            <span>-----------------------------------------------</span>
        </form>
        <form name="form5" id="form5" >
            <table border=1 width="100%">
                <tr>
                    <td>Tên Sinh Viên : </td>
                    <td><input name="tenSV" id="tenSV" type="text" size="30" maxlength="200" disabled></td>
                    <td rowspan="5" align="center" width="70%">
                        <span id="soLanDaNhap"></span>
                    </td>
                </tr>
                <tr>
                    <td>Ngày Sinh : </td>
                    <td>
                        <input type="text" size="2" maxlength="2" id="ngaySinh" name="ngaySinh" disabled/>
                        /
                        <input type="text" size="2" maxlength="2" id="thangSinh" name="thangSinh" disabled/>
                        /
                        <select id="namSinh" name="namSinh" disabled>
                            <?php
             			        $namhientai=date("Y");
			                     for($i=$namhientai-18;$i>1900;$i--)
			                     {echo '<option value="'.$i.'">'.$i.'</option>';}
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Giới tính : </td>
                    <td>
                        <span>Nam</span><input type="radio" value="Nam" name="gt" checked="checked"/>
                        <span>Nữ</span><input type="radio" value="Nữ" name="gt"/>
                    </td>
                </tr>
                <tr>
                    <td>Tỉnh/Tp : </td>
                    <td>
                        <select name="tinh" id="tinh" disabled>
                            <?php Data::dsTinh() ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input name="themVao" type="button" id="themVao" value="Thêm" disabled>
                    </td>
                </tr>
            </table>
            <center>
                <span>----------------------------------------------</span><br>
                <input name="hoanThanh" id="hoanThanh" type="button" value="Hoàn Thành Công Việc" disabled><br>
                <span>----------------------------------------------</span><br>
                <span>Danh Sách lớp :</span><br>
                <span id="daThemVao"></span>
            </center>
        </form>
    <script type="text/javascript">
        function layNganh(){
            for(var i=0;i<form4.nganh.length;i++)
            {
                if(form4.nganh[i].selected==true)
                    return form4.nganh[i].value;
            }
        }
        function layKhoa(){
            for(var i=0;i<form4.khoa.length;i++)
            {
                if(form4.khoa[i].selected==true)
                    return form4.khoa[i].value;
            }
        }
        function layPhiaSau(){
            for(var i=0;i<form4.phiaSau.length;i++)
            {
                if(form4.phiaSau[i].selected==true)
                    return form4.phiaSau[i].value;
            }
        }
        function layTinh(){
            for(var i=0;i<form5.tinh.length;i++)
            {
                if(form5.tinh[i].selected==true)
                    return form5.tinh[i].value;
            }
        }
        function layNamSinh(){
            for(var i=0;i<form5.namSinh.length;i++)
            {
                if(form5.namSinh[i].selected==true)
                    return form5.namSinh[i].value;
            }
        }
        function layGT(){
            for(var i=0;i<form5.gt.length;i++)
            {
                if(form5.gt[i].checked==true)
                    return form5.gt[i].value;
            }
        }
        function XoaSV(so){
            $.post('quanli-sv-query.php', {'soThuTu':so}, function(data) {$("#daThemVao").html(data);});
        }
        var demSV=1;
        $(document).ready(function() {
            $("#Xong").click(function(event){
                if(layNganh()=="-------"){alert("Chưa chọn ngành !");}
                else if(layKhoa()=="-------"){alert("Chưa chọn khóa !");}
                else
                {
                    $("#duocVao").html("<img src=\"imgs/widget_loading.gif\" />");
                    var dl=layNganh()+" "+layKhoa()+layPhiaSau();
                    $.post('quanli-sv-query.php', {'tenLop':dl}, function(data) {
                        $("#duocVao").html(data);
                        var s = data.substr(309,data.length-20);
                        s=s.substr(0,s.length-14);
                        if(s=="Tạo Lớp thành công, Hãy nhập thông tin ở phía dưới !")
                        {
                            $("#Xong").attr("disabled","disabled");
                            $("#nganh").attr("disabled","disabled");
                            $("#khoa").attr("disabled","disabled");
                            $("#phiaSau").attr("disabled","disabled");
                            $("#soLuong").attr("disabled","disabled");
                            
                            $("#tenSV").removeAttr("disabled");
                            $("#ngaySinh").removeAttr("disabled");
                            $("#thangSinh").removeAttr("disabled");
                            $("#namSinh").removeAttr("disabled");
                            $("#tinh").removeAttr("disabled");
                            $("#themVao").removeAttr("disabled");
                            $("#hoanThanh").removeAttr("disabled");
                        }
                    });
                }
            });
            $("#themVao").click(function(event){
                if(form5.tenSV.value==""){alert("Bạn chưa nhập tên !");}
                else if(form5.ngaySinh.value==""){alert("Chưa nhập ngày sinh !");}
                else if(form5.thangSinh.value==""){alert("Chưa nhập tháng sinh !");}
                else
                {
                    var dl=layNganh()+" "+layKhoa()+layPhiaSau();
                    $("#soLanDaNhap").html("<b>Bạn đã thêm "+demSV+" Sinh viên !</b>");
                    $("#daThemVao").html("<img src=\"imgs/2ajax-loader.gif\" />");
                    var d = form5.ngaySinh.value+"/"+form5.thangSinh.value+"/"+layNamSinh();
                    $.post('quanli-sv-query.php', {'tenSV':form5.tenSV.value,'nSinh':d,'gioiTinh':layGT(),'tinh':layTinh(),'tenLopSH':dl}, function(data) {$("#daThemVao").html(data);});
                    demSV++;
                }
            });
            $("#hoanThanh").click(function(event){
                var kt = confirm("Bạn đã thực sự hoàn thành công việc ?");
                if(kt==true)
                {
                    $("#form5").html("<center><img src=\"imgs/2ajax-loader.gif\" /></center>");
                    var dl=layNganh()+" "+layKhoa()+layPhiaSau();
                    $.post('quanli-sv-query.php', {'tenLopSHhoanThanh':dl}, function(data) {$("#form5").html(data);});
                }
                else
                    alert("Hãy nhập tiếp !");
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
    if(isset($_POST['tenLop']))
    {
		$sql="select lop from newsv where lop='".$_POST['tenLop']."'";
		$kqua=Data::TruyVanSV($sql);
		if($row=mysqli_fetch_array($kqua) > 0 )
		  {echo "Đã có lớp ".$_POST['tenLop']." trong cơ sở dữ liệu, hãy nhập tên lớp khác ! <img src=\"imgs/not-available.png\" />";}
		else
		{
		  echo 'Tạo Lớp thành công, Hãy nhập thông tin ở phía dưới !';
		}
    }
    if(isset($_POST['tenSV']) 
    && isset($_POST['nSinh']) 
    && isset($_POST['gioiTinh']) 
    && isset($_POST['tinh']) 
    && isset($_POST['tenLopSH']))
    {
?>
        <table width="100%" border="1" align="center" class="bang">
  		    <tr bgcolor="#C93">
    		  <th>STT</th>
    		  <th colspan="2">Tên Sinh Viên</th>
    		  <th>Giới tính</th>
    		  <th>Mã SV</th>
              <th>Ngành</th>
              <th>Lớp</th>
    		  <th>Ngày Sinh</th>
              <th>Tỉnh/Thành Phố</th>
              <th>Khóa</th>
              <th></th>
  		    </tr>
<?php
        $mang=explode(' ',$_POST['tenLopSH']);$arr=array();
        foreach($mang as $key=>$value){$arr[]=$value;}
        $tennganh=$arr[0];//Tên ngành
        $sokhoa=$arr[1];//Số khóa
        $soLop=0;//Chia Lớp
        if(strlen($sokhoa)==3)
        {
            $k=substr($sokhoa,2,1);$sokhoa=substr($sokhoa,0,2);
            if($k=="A") $soLop=1;
            elseif($k=="B") $soLop=2;
            elseif($k=="C") $soLop=3;
            elseif($k=="D") $soLop=4;
            elseif($k=="E") $soLop=5;
            else
                $soLop=6;
        }//Xử lí lớp
        
        $mang1=explode(' ',$_POST['tenSV']);$arr1=array();
        foreach($mang1 as $key=>$value){$arr1[]=$value;}
        $ten=$arr1[(count($mang1)-1)];$ho="";
        for($i=0;$i<(count($mang1)-1);$i++){$ho.=$arr1[$i]." ";}
        //Xử lí tên
        
        $maSV=$sokhoa;
        $sql="select * from ds_nganh where rutgon='".$tennganh."'";
        $kqua=Data::TruyVanMon($sql);
        if($row=mysqli_fetch_array($kqua))
        {
            $tennganh=$row['nganh'];$maSV.=$row['ma'];
        }$maSV.=$soLop; //Xử lí mã số sinh viên
        
        $sql="INSERT INTO `quanli_sinhvien`.`newsv` 
        VALUES (NULL,
         '".$ho."',
          '".$ten."',
           '".$_POST['gioiTinh']."',
            '".$maSV."', '".$tennganh."',
             '".$_POST['tenLopSH']."',
              '".$_POST['nSinh']."',
               '".$_POST['nSinh']."',
                '".$_POST['tinh']."',
                 '".$sokhoa."');";
        $MySQL=Data::TruyVanSV($sql);
        Data::capNhatMASV($_POST['tenLopSH']);
        
        $sql="SELECT * FROM  `newsv` where lop='".$_POST['tenLopSH']."' order by masv asc";
        $kqua=Data::TruyVanSV($sql);
        $i=1;
        while($row=mysqli_fetch_array($kqua))
        {
            echo '<tr>';
            echo '<td align="center">'.$i.'</td>';
            echo '<td>'.$row['ho'].'</td>';
            echo '<td>'.$row['ten'].'</td>';
            echo '<td align="center">'.$row['gioiTinh'].'</td>';
            echo '<td align="center">'.$row['masv'].'</td>';
            echo '<td>'.$row['nganh'].'</td>';
            echo '<td align="center">'.$row['lop'].'</td>';
            echo '<td align="center">'.$row['ngaysinh'].'</td>';
            echo '<td align="center">'.$row['thanhPho'].'</td>';
            echo '<td align="center">'.$row['khoa'].'</td>';
            echo '<td align="center"><a href="javascript:XoaSV(\''.$row['sott'].'\')">Xóa</a></td>';
            echo '</tr>';
            $i++;
        }
    }
    if(isset($_POST['soThuTu']))
    {
        $tenLopHP="";
        $sql="SELECT * FROM  `newsv` where sott= ".$_POST['soThuTu']." ";
        $kqua1=Data::TruyVanSV($sql);
        if($row=mysqli_fetch_array($kqua1))
        {$tenLopHP=$row['lop'];}
        
        $sql="DELETE FROM `quanli_sinhvien`.`newsv` WHERE `newsv`.`sott` = ".$_POST['soThuTu'].";";
        $kqua=Data::TruyVanSV($sql);//Xóa Sinh Viên
?>
        <table width="100%" border="1" align="center" class="bang">
  		    <tr bgcolor="#C93">
    		  <th>STT</th>
    		  <th colspan="2">Tên Sinh Viên</th>
    		  <th>Giới tính</th>
    		  <th>Mã SV</th>
              <th>Ngành</th>
              <th>Lớp</th>
    		  <th>Ngày Sinh</th>
              <th>Tỉnh/Thành Phố</th>
              <th>Khóa</th>
              <th></th>
  		    </tr>
<?php
        $sql="SELECT * FROM  `newsv` where lop='".$tenLopHP."' order by masv asc";
        $kqua=Data::TruyVanSV($sql);
        $i=1;
        while($row=mysqli_fetch_array($kqua))
        {
            echo '<tr>';
            echo '<td align="center">'.$i.'</td>';
            echo '<td>'.$row['ho'].'</td>';
            echo '<td>'.$row['ten'].'</td>';
            echo '<td align="center">'.$row['gioiTinh'].'</td>';
            echo '<td align="center">'.$row['masv'].'</td>';
            echo '<td>'.$row['nganh'].'</td>';
            echo '<td align="center">'.$row['lop'].'</td>';
            echo '<td align="center">'.$row['ngaysinh'].'</td>';
            echo '<td align="center">'.$row['thanhPho'].'</td>';
            echo '<td align="center">'.$row['khoa'].'</td>';
            echo '<td align="center"><a href="javascript:XoaSV(\''.$row['sott'].'\')">Xóa</a></td>';
            echo '</tr>';
            $i++;
        }
    }
    if(isset($_POST['tenLopSHhoanThanh']))
    {
?>
        <table width="100%" border="1" align="center" class="bang">
  		    <tr bgcolor="#C93">
    		  <th>STT</th>
    		  <th colspan="2">Tên Sinh Viên</th>
    		  <th>Giới tính</th>
    		  <th>Mã SV</th>
              <th>Ngành</th>
              <th>Lớp</th>
    		  <th>Ngày Sinh</th>
              <th>Tỉnh/Thành Phố</th>
              <th>Khóa</th>
  		    </tr>
<?php
        $sql="SELECT * FROM  `newsv` where lop='".$_POST['tenLopSHhoanThanh']."' order by masv asc";
        $kqua=Data::TruyVanSV($sql);
        $i=1;
        while($row=mysqli_fetch_array($kqua))
        {
            $bang="CREATE TABLE IF NOT EXISTS `".$row['masv']."` (
  `sott` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Dsach` varchar(220) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `maMon` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `magv` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `soTC` int(11) NOT NULL,
  `HK` int(11) NOT NULL,
  `T2` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T3` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T4` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T5` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T6` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T7` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `CN` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoigian` date DEFAULT NULL,
  `chuyenCan` float DEFAULT NULL,
  `giuaKy` float DEFAULT NULL,
  `cuoiKy` float DEFAULT NULL,
  `DTB` float DEFAULT NULL,
  `dangKy` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `loai` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;";
            $ht=Data::TruyVanDiem($bang);//Tạo Bảng
            
            $mang=explode(' ',$row['lop']);$arr=array();
            foreach($mang as $key=>$value){$arr[]=$value;}
            $ma=$arr[0];//Tên ngành
            
            $sql1="select * from ds_nganh where rutgon='".$ma."'";
            $kqua1=Data::TruyVanMon($sql1);
            if($row1=mysqli_fetch_array($kqua1))
            {
                $ma=$row1['ma'];
            } //Xử lí lấy tên ngành
            
            $sql2="select * from ds_mon";
            $kqua2=Data::TruyVanMon($sql2);
            while($row2=mysqli_fetch_array($kqua2))
            {
                $dk=0;
                $mang1=explode('-',$row2['UuTien']);
                foreach($mang1 as $key=>$value)
                {
                    if($value==$ma) $dk=1;
                }
                if($dk==1)
                {
                    $sql3="INSERT INTO `quanli_diem`.`".$row['masv']."` 
                    VALUES (NULL,
                     '".$row2['tenMon']."',
                      '".$row2['maMon']."',
                       '".$row2['soTC']."',
                        '".$row2['HK']."',
                         NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);";
                    $sql4="INSERT INTO `quanli_diem`.`".$row['masv']."` 
                    VALUES (NULL,
                     '".$row2['tenMon']."',
                      '".$row2['maMon']."',
                       NULL,
                        '".$row2['soTC']."',
                         '".$row2['HK']."',
                          NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);";
                    $kiop=Data::TruyVanDiem($sql4);
                }
            }
            echo '<tr>';
            echo '<td align="center">'.$i.'</td>';
            echo '<td>'.$row['ho'].'</td>';
            echo '<td>'.$row['ten'].'</td>';
            echo '<td align="center">'.$row['gioiTinh'].'</td>';
            echo '<td align="center">'.$row['masv'].'</td>';
            echo '<td>'.$row['nganh'].'</td>';
            echo '<td align="center">'.$row['lop'].'</td>';
            echo '<td align="center">'.$row['ngaysinh'].'</td>';
            echo '<td align="center">'.$row['thanhPho'].'</td>';
            echo '<td align="center">'.$row['khoa'].'</td>';
            echo '</tr>';
            $i++;
        }
    }
?>
</body></html>