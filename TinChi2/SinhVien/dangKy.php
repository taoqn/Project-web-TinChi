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
    if(isset($_SESSION['ma']) && isset($_SESSION['id']) && isset($_SESSION['name']) && isset($_SESSION['subname']) && isset($_SESSION['mk']))
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
        $thang=Data::layNgayThang("m");
        if($thang>=6  && $thang<8)
            $sql="select * from `".$masv."` where DTB<5 order by Dsach asc";
        else
            $sql="select * from `".$masv."` where HK<=".($hk+1)." order by Dsach asc";
        $kqua=Data::TruyVanDiem($sql);
        while($row=mysqli_fetch_array($kqua))
        {
            if($row['dangKy']=="" || $row['dangKy']=="DangHoc")
            {
                if($row['rangBuoc']!="")
                {
                    $sql2 = "select * from `".$masv."` where maMon='".$row['rangBuoc']."' order by sott asc";
                    $kqua2 = Data::TruyVanDiem($sql2);
                    if($row2 = mysqli_fetch_array($kqua2))
                    {
                        if($row2['dangKy']!="" && $row2['chuyenCan']!="" && $row2['giuaKy']!="" && $row2['cuoiKy']!="")
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
                    }
                }
                else
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
            }
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
 	  if(form1.chLich.length>1)
      {
            for(var i=0;i<form1.chLich.length;i++)
            {
                if(form1.chLich[i].checked==true)
                    return form1.chLich[i].value;
            }
       }
       else
       {
            return form1.chLich.value;
       }
	}
    var maSV = $("#layMaSV").text();
    function xoaLich(hp){
        var dy = confirm("Bạn thật sự muốn xóa ?");
        if(dy==true)
        {
            $("#form2").html("<center><img src=\"imgs/2ajax-loader.gif\" /></center>");
            $.post('dangKy-label-1.php', {'maSV':maSV,'maHPxoa':hp}, function(data) {
                //$("#form2").html(data);
                hienThiDK();
                $("#form1").html("");
            });
        }
    }
    function xemDS(hp1){
        var ur = "xemDS.php?id="+hp1;
        window.open(ur, "Xem Lịch", "width=800,height=500");
    }
	function chonLich(ma){
	   $("#form1").html("<center><img src=\"imgs/2ajax-loader.gif\" /></center>");
	   $.post('dangKy-label-1.php', {'maChon':ma}, function(data) {$("#form1").html(data);});
	}
	function hienThiDK(){
	   $("#form2").html("<center><img src=\"imgs/2ajax-loader.gif\" /></center>");
	   $.post('dangKy-label-1.php', {'maSVhienThi':maSV}, function(data) {$("#form2").html(data);});
	}
    hienThiDK();
    $("#chonLichdk").click(function(event){
        $.post('dangKy-label-1.php', {'maSV':maSV,'maLayChon':layHocPhan()}, function(data) {
            if(data=="trung"){alert("Đã trùng lịch !");}
            else if(data=="dadk"){alert("Bạn đã đăng ký môn này, hãy xóa môn này ở trên rồi chọn lại !");}
            else if(data=="daDay"){alert("Số lượng đã đầy !");}
            else if(data=="fulltc"){alert("Số tín chỉ lớn hơn 30 !");}
            else
            {
                $.post('dangKy-label-1.php', {'maSV':maSV,'maLayHP':layHocPhan()}, function(data) {
                    //$("#form2").html(data);
                    hienThiDK();
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