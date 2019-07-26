<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style> 	
    #div-v1{
		color:#096;
	}
</style>
<?php
require 'AD.php';
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