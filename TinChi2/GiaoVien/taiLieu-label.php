<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
	#div-v1{
		color:#096;
	}
</style>
<?php
ini_set('upload_max_filesize', '10M');
ini_set('post_max_size', '10M');
ini_set('max_execution_time', 300);
require 'AD.php';
if(isset($_POST['cv']) && isset($_POST['magv']))
{
    if($_POST['cv']=="1")
    {
?>
	<center>
        <form name="form1" style="margin:20px;">
            <span style="font-weight: bold;">Tìm tài liệu : </span>
            <input type="text" name="timTL" id="timTL" onkeyup="hienThiTL(this.value)" />
        </form>
    </center>
        <span id="kQuaTim"></div>
	<script>
        var k = "";
		function hienThiTL(tl){
            if(tl.length < 1)
                return;
            k=tl;
            hienThi(0,10);
		}
		function hienThi(viTri,soLuong){
	   		//var kqTim = form1.timTL.value;
            $.post('taiLieu-label.php', {'viTri':viTri,'soLuong':soLuong,'kqTim':k}, function(data) {$("#kQuaTim").html(data);});
		}
	</script>
<?php
    }
    if($_POST['cv']=="3")
    {
?>
<form name="form1" style="margin:20px;" method="post" enctype="multipart/form-data" action="taiLieu-label.php?id=<?php echo $_POST['magv']; ?>">
<input type="hidden" name="magv" />
<table bgcolor="#71CCBE" width="50%" align="center" height="300px" style="font-weight:bold; border-collapse:collapse;">
	<tr>
    	<th colspan="2" bgcolor="#00CCFF">UPLOAD</th>
    </tr>
	<tr>
	    <td>Tên Tài Liệu :</td><td><input type="text" name="tenTL" size="70"/></td>
    </tr>
    <tr>
	    <td>Mô tả :</td><td><textarea name="moTaTL" rows="5"></textarea></td>
    </tr>
    <tr>
	    <td>Chọn File :</td>
		<td>
			<input type="file" id="fileTL" name="fileTL"/>
		</td>
    </tr>
    <tr>
	    <td colspan="2" align=center>
            <input type="submit" name="upTL" id="upTL" value="Upload" /><br />
            <label style="color: red;font-weight: bold;">
                Lưu ý : Chỉ hổ trợ các file Docx, Doc, rar, zip, pdf, ppt, pptx !
            </label>
        </td>
    </tr>
</table>
</form>
<?php
    }
	if($_POST['cv']=="2")
	{
?>
        <form name="form1" style="margin:20px;" id="form1">
        <table align="center" border="1" style="border-collapse: collapse;font-weight: bold;" width="100%">
            <tr style="background-color: yellow;">
            <th width="5%">STT</th>
            <th width="20%">Tên File</th>
            <th>Mã File</th>
            <th>Loại File</th>
            <th>Dung Lượng</th>
            <th width="40%">Mô tả</th>
            <th>Thời gian</th>
            <th width="5%"></th>
        </tr>
<?php
    $sql="SELECT * FROM  `tailieu` where giaoVien='".$_POST['magv']."' order by tenFile,maFile asc";
    $kqua=Data::TruyVan($sql);
    $i=1;
    while($row=mysqli_fetch_array($kqua))
    {
        echo '<tr height="30px">';
        echo '<td align="center">'.$i.'</td>';
        echo '<td>'.$row['tenFile'].'</td>';
        echo '<td align="center">'.$row['maFile'].'</td>';
        echo '<td align="center">'.$row['LoaiFile'].'</td>';
        echo '<td align="center">'.$row['dungLuong'].' Mb</td>';
        echo '<td align="center" width="10%">'.$row['moTa'].'</td>';
        echo '<td align="center">'.$row['thoiGian'].'</td>';
        echo '<td align="center"><a href="javascript:xoaUp(\''.$row['sott'].'-'.$row['maFile'].'.'.$row['LoaiFile'].'\')"><img src="../imgs/not-available.png" height="15px" width="15px" /></a></td>';
        echo '</tr>';
        $i++;
    }
    echo '<tr>';
    echo '<td colspan="9" align="center">Số Lượng File : '.($i-1).'/20</td>';
    echo '</tr>';
    echo '</table>';
    echo '</table>';
?>
        </form>
	<script>
        function xoaUp(sott){
            var dy = confirm("Bạn thật sự muốn xóa ?");
            if(dy==true)
            {
                $("#form1").html("<center><img src=\"imgs/2ajax-loader.gif\" /></center>");
                $.post('taiLieu-label.php', {'xoaUpload':sott}, function(data) {
                    layCV(2);
                });
            }
        }
	</script>
<?php
    }
}
if(isset($_FILES['fileTL']) && isset($_POST['tenTL']) && isset($_POST['moTaTL']) && isset($_REQUEST['id']))
{
    if(strlen($_POST['tenTL'])<6)
    {
        echo "Tên Tài Liệu Quá Ngắn ! <a href=\"javascript:history.go(-1)\">Quay Lại</a>";
        return;
    }
    $tenFile=$_FILES['fileTL']['name'];$mang=explode(".",$tenFile);
    $loaiFile=$mang[(count($mang)-1)];
    if($loaiFile=="rar" || $loaiFile=="zip" || $loaiFile=="pdf" || $loaiFile=="doc" 
        || $loaiFile=="docx" || $loaiFile=="ppt" || $loaiFile=="pptx")
    {
        if ($_FILES["fileTL"]["error"] > 0)
        {
            echo "File Lỗi: " . $_FILES["fileTL"]["error"] . "<a href=\"javascript:history.go(-1)\">Quay Lại</a>";
            return;
        }
        //if($_FILES['fileTL']["size"] >= 2097152)
        //{
            //echo "Vượt dung Lượng cho phép : " . $_FILES['fileTL']["size"] . "<br />";
            //return;
        //}
        $sql="Select * from tailieu where giaoVien='".$_REQUEST['id']."' Order by maFile asc";
        $kqua=Data::TruyVan($sql);
        $num=mysqli_num_rows($kqua);
        if($num >20)
        {
            echo "Vượt số Lượng file cho phép : " . $_FILES['fileTL']["size"] . "<a href=\"javascript:history.go(-1)\">Quay Lại</a>";
            return;
        }
        $i=1;$maTL="";
        if($num>0)
        {
            while($row=mysqli_fetch_array($kqua))
            {
                $dk=0;$ma="";
                if($i<10)
                    $ma=$_REQUEST['id']."00".$i;
                if($i>=10)
                    $ma=$_REQUEST['id']."0".$i;
                if($i>=100)
                    $ma=$_REQUEST['id'].$i;
                if($row['maFile']==$ma)
                    $dk=1;
                if($dk==0)
                    break;
                $i++;
            }
        }
        if($i<10)
            $maTL=$_REQUEST['id']."00".$i;
        if($i>=10)
            $maTL=$_REQUEST['id']."0".$i;
        if($i>=100)
            $maTL=$_REQUEST['id'].$i;
        
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        
        $sql="INSERT INTO `quanli_admin`.`tailieu` 
        VALUES (NULL, 
        '".$_POST['tenTL']."', 
        '".$maTL."', 
        '".strtoupper($loaiFile)."', 
        '".($_FILES['fileTL']["size"]/1048576)."', '".$_POST['moTaTL']."', '".$_REQUEST['id']."', '".date('d/m/Y')."');";
        
        $kqua=Data::TruyVan($sql);
        move_uploaded_file($_FILES['fileTL']['tmp_name'],"../Upload/".$maTL.".".$loaiFile);
        echo "Upload Thành công !<br>";
        echo "Mã Giáo Viên :".$_REQUEST['id']."<br>";
        echo "Tên File : ".$tenFile."<br>";
        echo "Dung Lượng : ".($_FILES['fileTL']["size"]/1048576)." Mb<br>";
        echo "Loại File : ".strtoupper($loaiFile)." - ".$_FILES['fileTL']['type'];
        echo "<br><a href=\"javascript:history.go(-1)\">Quay Lại</a>";
        
    }
    else
    {
        echo "Không Hỗ Trợ loại File này !<a href=\"javascript:history.go(-1)\">Quay Lại</a>";
    }
}
if(isset($_POST['xoaUpload']))
{
    $mang=explode("-",$_POST['xoaUpload']);
    
    $sql="DELETE FROM `quanli_admin`.`tailieu` WHERE `tailieu`.`sott` = ".$mang[0].";";
    $kqua=Data::TruyVan($sql);
    
    unlink("../Upload/".$mang[1]);
}
if(isset($_POST['viTri']) && isset($_POST['soLuong']) && isset($_POST['kqTim']))
{
    $sql="SELECT * FROM  `tailieu` where tenFile like '%".$_POST['kqTim']."%' or maFile like '%".$_POST['kqTim']."%' order by tenFile,maFile asc";
    $kqua=Data::TruyVan($sql);
    $num=mysqli_num_rows($kqua);
    //$soTrang=($num/$_POST['soLuong']);
    if($num == 0){
        echo '<center><div style="font-weight:bold;">Không tìm thấy từ khóa này !</div></center>';
        return;
    }
    echo '<table align="center" style="font-weight:bold;"><tr align="center"><td>Trang :</td>';
    $demTrang=1;
    for($i=0;$i<$num;$i+=$_POST['soLuong'])
    {
        if(  $demTrang  ==  (($_POST['viTri']/$_POST['soLuong'])+1)  )
            echo '<td width="30"><a href="javascript:hienThi(\''.$i.'\',\''.$_POST['soLuong'].'\');">['.$demTrang.']</a></td>';
        else
            echo '<td width="30"><a href="javascript:hienThi(\''.$i.'\',\''.$_POST['soLuong'].'\');">'.$demTrang.'</a></td>';
        $demTrang++;
    }
    echo '</tr></table>';
    $sql.=" LIMIT ".$_POST['viTri']." , ".$_POST['soLuong']."";
    $kqua=Data::TruyVan($sql);
    while($row=mysqli_fetch_array($kqua))
    {
		$loai="";
		if($row['LoaiFile']=="PPT") $loai="ppt.png";
		elseif($row['LoaiFile']=="DOC") $loai="doc.png";
		elseif($row['LoaiFile']=="DOCX") $loai="docx.png";
		elseif($row['LoaiFile']=="PPTX") $loai="pptx.png";
		elseif($row['LoaiFile']=="RAR") $loai="rar.jpg";
		elseif($row['LoaiFile']=="ZIP") $loai="zip.png";
		else
			$loai="pdf.png";
			
        echo '<table width="100%" style="font-weight:bold">';
		echo '<tr>';
		echo '<td rowspan="3" width="10%"><img src="../imgs/'.$loai.'" height="100px" width="100px" /></td>';
        echo '<td align="left" colspan="2" width="60%">Tên File : <span id="div-v1">'.$row['tenFile'].'</span></td>';
		echo '<td align="right" width="10%">Mã : <span id="div-v1">'.$row['maFile'].'</span></td>';
		echo '<td rowspan="3" width="20%" align="center"><a href="../Upload/'.$row['maFile'].'.'.$row['LoaiFile'].'"><img src="../imgs/download.png" height="50px" width="150px" /></a></td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td colspan="3">Mô tả : <span id="div-v1">'.$row['moTa'].'</span></td>';
		echo '</tr>';
		echo '<tr>';
		$sql1="Select * from giaovien where maGV='".$row['giaoVien']."' ";
        $kqua1=Data::TruyVanGV($sql1);
        if($row1=mysqli_fetch_array($kqua1)){echo '<td width="40%">Giáo Viên : <span id="div-v1">'.$row1['tenGV'].'</span></td>';}
		echo '<td>Dung Lượng : <span id="div-v1">'.$row['dungLuong'].'</span> Mb</td>';
		echo '<td align="right"><span id="div-v1">'.$row['thoiGian'].'</span></td>';
		echo '</tr>';
        echo '</table>';
		echo '<hr>';
    }
	echo '<center>';
    echo '<span style="font-weight:bold;">Trang '.(($_POST['viTri']/$_POST['soLuong'])+1).'</span>';
    echo '</center>';
}
?>