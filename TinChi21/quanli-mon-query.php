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
                alert(layTenKhoa());
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
                    $.post('quanli-mon-query.php', {'tenMon':form4.tenmon.value,'soTC':form4.sotc.value,'hocKy':form4.hocky.value,'uTien':dl,'tenKhoaCN':layTenKhoa()}, function(data) {$("#kquaSQL").html(data);});
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
    if(isset($_POST['tenMon']) && isset($_POST['soTC']) && isset($_POST['hocKy']) && isset($_POST['uTien']) && isset($_POST['tenKhoaCN']))
    {
        $ten=substr($_POST['uTien'],0,3);
        $sql="INSERT INTO `quanli_mon`.`ds_mon` 
        VALUES (NULL,
         '".$ten."',
          '".$_POST['tenMon']."',
           '".$_POST['soTC']."',
            '".$_POST['hocKy']."',
             '".$_POST['uTien']."',
             '".$_POST['tenKhoaCN']."');";
        $kqua=Data::TruyVanMon($sql);
        Data::capNhatMaMon($ten);
        echo 'Đã thêm vào cơ sở dữ liệu <img src="imgs/available.png" />';
    }
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
  		</tr>
<?php
        if($_POST['tenNganh']=="Tất cả")
            $sql="select * from ds_mon order by maMon asc";
        else
            $sql="select * from ds_mon where UuTien like '".$_POST['tenNganh']."%' order by maMon asc";
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
            echo '</tr>';
            $i++;
        }
    }
?>
</body>
</html>