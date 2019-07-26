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
<?php
		$ma="";$maGV="";
		$sql="Select * from giaovien where matKhau='".$_SESSION['mk']."' and tenGV='".$_SESSION['name']."' ";
        $kqua=Data::TruyVanGV($sql);
		if($row=mysqli_fetch_array($kqua)){$ma=$row['khoa'];$maGV=$row['maGV'];}
        
        $bang1="CREATE TABLE IF NOT EXISTS `".$maGV."` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `dsMon` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `maHP` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `soTC` int(11) DEFAULT NULL,
  `hocKy` int(11) DEFAULT NULL,
  `T2` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T3` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T4` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T5` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T6` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T7` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `CN` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phong` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `toiDa` int(11) DEFAULT NULL,
  `soLuong` int(11) DEFAULT NULL,
  `thoiGian` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;";
    $kqua=Data::TruyVanGV($bang1);
?>
    <table align="center" border="1" style="border-collapse: collapse;" width="80%">
        <tr style="background-color: yellow;">
            <th>STT</th>
            <th>Tên Môn</th>
            <th>Mã Học Phần</th>
            <th>Số Lượng</th>
            <th>Thứ 2</th>
            <th>Thứ 3</th>
            <th>Thứ 4</th>
            <th>Thứ 5</th>
            <th>Thứ 6</th>
            <th>Thứ 7</th>
            <th>Chủ Nhật</th>
            <th></th>
            <th></th>
        </tr>
<?php
    $sql="SELECT * FROM  `".$maGV."` order by maHP asc";
    $kqua=Data::TruyVanGV($sql);
    $i=1;
    while($row=mysqli_fetch_array($kqua))
    {
        echo '<tr>';
        echo '<td align="center">'.$i.'</td>';
        echo '<td>'.$row['dsMon'].'</td>';
        echo '<td align="center">'.$row['maHP'].'</td>';
        echo '<td align="center">'.$row['toiDa'].'</td>';
        echo '<td align="center">'.$row['T2'].'</td>';
        echo '<td align="center">'.$row['T3'].'</td>';
        echo '<td align="center">'.$row['T4'].'</td>';
        echo '<td align="center">'.$row['T5'].'</td>';
        echo '<td align="center">'.$row['T6'].'</td>';
        echo '<td align="center">'.$row['T7'].'</td>';
        echo '<td align="center">'.$row['CN'].'</td>';
        echo '<td align="center"><a href="javascript:xemDK(\''.$row['maHP'].'\')">Xem Ai Đã Đăng ký</a></td>';
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
               <th>TC</th>
                <th></th>
  	     </tr>
    <?php
		$sql="select * from ds_mon where khoa='".$ma."' order by tenMon asc";
        $kqua=Data::TruyVanMon($sql);
        $i=1;
        while($row=mysqli_fetch_array($kqua))
        {
            echo '<td>'.$row['tenMon'].'</td>';
            echo '<td>'.$row['maMon'].'</td>';
            echo '<td align="center">'.$row['soTC'].'</td>';
            echo '<td align="center"><a href="javascript:chonLich(\''.$row['maMon'].'\')">Chọn</a></td>';
            echo '</tr>';
            $i++;
        }
    ?>
        </table>
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
  				<tr style="background-color: lightskyblue;">
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
                        <select name="thu2first" id="thu2first">
                            <option>-</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                        -
                        <select name="thu2last" id="thu2last">
                            <option>-</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                    </td>
    				<td>
                    <span>Tiết</span><br />
                        <select name="thu3first" id="thu3first">
                            <option>-</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                        -
                        <select name="thu3last" id="thu3last">
                            <option>-</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                    </td>
    				<td>
                    <span>Tiết</span><br />
                        <select name="thu4first" id="thu4first">
                            <option>-</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                        -
                        <select name="thu4last" id="thu4last">
                            <option>-</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                    </td>
    				<td>
                    <span>Tiết</span><br />
                        <select name="thu5first" id="thu5first">
                            <option>-</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                        -
                        <select name="thu5last" id="thu5last">
                            <option>-</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                    </td>
    				<td>
                    <span>Tiết</span><br />
                        <select name="thu6first" id="thu6first">
                            <option>-</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                        -
                        <select name="thu6last" id="thu6last">
                            <option>-</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                    </td>
    				<td>
                    <span>Tiết</span><br />
                        <select name="thu7first" id="thu7first">
                            <option>-</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                        -
                        <select name="thu7last" id="thu7last">
                            <option>-</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                    </td>
    				<td>
                    <span>Tiết</span><br />
                        <select name="thu8first" id="thu8first">
                            <option>-</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                        -
                        <select name="thu8last" id="thu8last">
                            <option>-</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                    </td>
  				</tr>
			</table>
            <br />
            <span>----------------------------------</span>
            <br />
            <center><input type="button" name="themMon" id="themMon" value="Thêm" /></center>
        </form>
    </label>
</div>
<script>
    function xoaLich(hp){
        var dy = confirm("Bạn thật sự muốn xóa ?");
        if(dy==true)
        {
            var maGiaoVien = $("#maGV").text()
            $("#form2").html("<center><img src=\"imgs/2ajax-loader.gif\" /></center>");
            $.post('dangKy-label-1.php', {'maGV':maGiaoVien,'maHPxoa':hp}, function(data) {$("#form2").html(data);});
        }
    }
    function xemDK(hp1){
        id=hp1.substr(0,6);
        var ur = "xemAi.php?id="+id;
        window.open(ur, "Xem Lịch", "width=800,height=500");
    }
	function chonLich(ma){
	   document.getElementById("maSo").innerHTML=ma;
	}
    function layTiet(){
        var lich = "";
        var t2 = form1.thu2first.value+"-"+form1.thu2last.value;
        var t3 = form1.thu3first.value+"-"+form1.thu3last.value;
        var t4 = form1.thu4first.value+"-"+form1.thu4last.value;
        var t5 = form1.thu5first.value+"-"+form1.thu5last.value;
        var t6 = form1.thu6first.value+"-"+form1.thu6last.value;
        var t7 = form1.thu7first.value+"-"+form1.thu7last.value;
        var t8 = form1.thu8first.value+"-"+form1.thu8last.value;
        var arr = [t2,t3,t4,t5,t6,t7,t8];
        for(var i=0;i<arr.length;i++)
        {
            if(arr[i]!="---")
            {
                lich+="t"+(i+2)+" "+arr[i]+"$";
            }
        }
        lich=lich.substr(0,lich.length-1);
        return lich;
    }
    $("#themMon").click(function(event){
        var maMon = $("#maSo").text();
        var maGiaoVien = $("#maGV").text();
        if(form1.toiDa.value==""){alert("Bạn chưa nhập số lượng tối đa !");}
        else if(maMon=="Chọn mã môn bên phải"){alert("Chưa Chọn Môn !");}
        else
        {
            $.post('dangKy-label-1.php', {'maGV':maGiaoVien,'tiet':layTiet()}, function(data) {
                if(data=="ok")
                {
                    $.post('dangKy-label-2.php', {'maGV':maGiaoVien,'maMon':maMon,'soLuong':form1.toiDa.value,'tiet':layTiet()}, function(data) {$("#form2").html(data);});
                }
                else
                    alert("Đã trùng lịch !");
            });
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