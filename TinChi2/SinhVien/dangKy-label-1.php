<?php
require 'AD.php';
if(isset($_POST['maChon']))
{
?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <table align="center" border="1" style="border-collapse: collapse;" width="100%">
        <tr style="background-color: antiquewhite;">
            <th>STT</th>
            <th>Giáo viên</th>
            <th>Mã Học Phần</th>
            <th>Số TC</th>
            <th>Số Lượng</th>
            <th>Thứ 2</th>
            <th>Thứ 3</th>
            <th>Thứ 4</th>
            <th>Thứ 5</th>
            <th>Thứ 6</th>
            <th>Thứ 7</th>
            <th>Chủ Nhật</th>
            <th>Đã đăng ký</th>
            <th></th>
            <th></th>
        </tr>
        <tr>
<?php
    $sql="select * from `".$_POST['maChon']."` Order by T2,T3,T4,T5,T6,T7,CN desc";
    $kqua=Data::TruyVanMon($sql);
    $i=1;
    while($row=mysqli_fetch_array($kqua))
    {
        if($row['toiDa']>=$row['soLuong'])
        {
            echo '<tr>';
            echo '<td align="center">'.$i.'</td>';
            $sql1="Select * from giaovien where maGV='".substr($row['maHP'],6,4)."' ";
            $kqua1=Data::TruyVanGV($sql1);
            if($row1=mysqli_fetch_array($kqua1)){echo '<td>'.$row1['tenGV'].'</td>';}
            echo '<td align="center">'.$row['maHP'].'</td>';
            echo '<td align="center">'.$row['soTC'].'</td>';
            echo '<td align="center">'.$row['toiDa'].'</td>';
        if(Data::ktThu($row['T2'])==1)
            echo '<td align="center" style="background-color: yellow;">'.$row['T2'].'</td>';
        elseif(Data::ktThu($row['T2'])==2)
            echo '<td align="center" style="background-color: orange;">'.$row['T2'].'</td>';
        else
            echo '<td align="center">'.$row['T2'].'</td>';
            //Thứ 2
        if(Data::ktThu($row['T3'])==1)
            echo '<td align="center" style="background-color: yellow;">'.$row['T3'].'</td>';
        elseif(Data::ktThu($row['T3'])==2)
            echo '<td align="center" style="background-color: orange;">'.$row['T3'].'</td>';
        else
            echo '<td align="center">'.$row['T3'].'</td>';
            //Thứ 3
        if(Data::ktThu($row['T4'])==1)
            echo '<td align="center" style="background-color: yellow;">'.$row['T4'].'</td>';
        elseif(Data::ktThu($row['T4'])==2)
            echo '<td align="center" style="background-color: orange;">'.$row['T4'].'</td>';
        else
            echo '<td align="center">'.$row['T4'].'</td>';
            //Thứ 4
        if(Data::ktThu($row['T5'])==1)
            echo '<td align="center" style="background-color: yellow;">'.$row['T5'].'</td>';
        elseif(Data::ktThu($row['T5'])==2)
            echo '<td align="center" style="background-color: orange;">'.$row['T5'].'</td>';
        else
            echo '<td align="center">'.$row['T5'].'</td>';
            //Thứ 5
        if(Data::ktThu($row['T6'])==1)
            echo '<td align="center" style="background-color: yellow;">'.$row['T6'].'</td>';
        elseif(Data::ktThu($row['T6'])==2)
            echo '<td align="center" style="background-color: orange;">'.$row['T6'].'</td>';
        else
            echo '<td align="center">'.$row['T6'].'</td>';
            //Thứ 6
        if(Data::ktThu($row['T7'])==1)
            echo '<td align="center" style="background-color: yellow;">'.$row['T7'].'</td>';
        elseif(Data::ktThu($row['T7'])==2)
            echo '<td align="center" style="background-color: orange;">'.$row['T7'].'</td>';
        else
            echo '<td align="center">'.$row['T7'].'</td>';
            //Thứ 7
        if(Data::ktThu($row['CN'])==1)
            echo '<td align="center" style="background-color: yellow;">'.$row['CN'].'</td>';
        elseif(Data::ktThu($row['CN'])==2)
            echo '<td align="center" style="background-color: orange;">'.$row['CN'].'</td>';
        else
            echo '<td align="center">'.$row['CN'].'</td>';
            //Chủ Nhật
            echo '<td align="center">'.$row['soLuong'].'</td>';
            echo '<td align="center"><a href="javascript:xemDS(\''.$row['maHP'].'\')">Dsach</a></td>';
            echo '<td align="center"><input type="radio" value="'.$row['maHP'].'" name="chLich[]" id="chLich" /></td>';
            echo '</tr>';
            $i++;
        }
    }
?>
        </tr>
    </table>
<?php
}
if(isset($_POST['maSV']) && isset($_POST['maLayChon']))
{
    $mamon=substr($_POST['maLayChon'],0,6);
    $sql="select * from `".$mamon."` where maHP=".$_POST['maLayChon']." ";
    $kqua=Data::TruyVanMon($sql);
    $dk=0;
    if($row=mysqli_fetch_array($kqua))
    {
        $tong=0;
		$hk=Data::layHK(substr($_POST['maSV'],0,2));
		$thang=Data::layNgayThang("m");
		if($thang>=6 && $thang<8)
			$s="SELECT * FROM  `".$_POST['maSV']."` where dangKy='DangHoc' and loai='He-".$hk."' ";
		else
			$s="SELECT * FROM  `".$_POST['maSV']."` where dangKy='DangHoc' and loai='HocKy-".$hk."' ";
        $k=Data::TruyVanDiem($s);
        while($r=mysqli_fetch_array($k))
        {
            $tong+=$r['soTC'];
            if( Data::kiemTraLich($row['T2'],$r['T2'])==true  || 
                Data::kiemTraLich($row['T3'],$r['T3'])==true  ||
                Data::kiemTraLich($row['T4'],$r['T4'])==true  ||
                Data::kiemTraLich($row['T5'],$r['T5'])==true  ||
                Data::kiemTraLich($row['T6'],$r['T6'])==true  ||
                Data::kiemTraLich($row['T4'],$r['T7'])==true  ||
                Data::kiemTraLich($row['CN'],$r['CN'])==true    )
            {
                $dk=1;
            }
            if(substr($r['maHP'],0,6)==$mamon)
                $dk=2;
        }
        if($row['toiDa']==$row['soLuong'])
            $dk=3;
        $tong+=$row['soTC'];
        if($tong > 30)
            $dk=4;
    }
    if($dk==1)
        echo "trung";
    if($dk==2)
        echo "dadk";
    if($dk==3)
        echo "daDay";
    if($dk==4)
        echo "fulltc";
}
if(isset($_POST['maSV']) && isset($_POST['maHPxoa']))
{
    $mamon=substr($_POST['maHPxoa'],0,6);
    $maGVDK=substr($_POST['maHPxoa'],6,4);
    $soluong=0;
    $daDK=0;
    $sql="select * from `".$mamon."` where maHP='".$_POST['maHPxoa']."' ";
    $kqua=Data::TruyVanMon($sql);
    if($row=mysqli_fetch_array($kqua))
    {
        $up="UPDATE  `quanli_diem`.`".$_POST['maSV']."` SET  `maHP` =  '".$_POST['maHPxoa']."',
            `maHP` =  NULL,
            `T2` =  NULL,
            `T3` =  NULL,
            `T4` =  NULL,
            `T5` =  NULL,
            `T6` =  NULL,
            `T7` =  NULL,
            `CN` =  NULL,
            `loai` =  NULL,
            `dangKy` =  NULL WHERE  `".$_POST['maSV']."`.`maMon` = '".$mamon."' and maHP='".$_POST['maHPxoa']."' and `dangKy`='DangHoc' ;";
        $op=Data::TruyVanDiem($up);
        $soluong=$row['soLuong'];
    }
    $sql="UPDATE  `quanli_giaovien`.`".$maGVDK."` SET  `soLuong` =  '".($soluong-1)."' WHERE  `".$maGVDK."`.`maHP` ='".$_POST['maHPxoa']."';";
    $kqua=Data::TruyVanGV($sql);
    $sql="UPDATE  `quanli_mon`.`".$mamon."` SET  `soLuong` =  '".($soluong-1)."' WHERE  `".$mamon."`.`maHP` ='".$_POST['maHPxoa']."';";
    $kqua=Data::TruyVanMon($sql);
}
if(isset($_POST['maSV']) && isset($_POST['maLayHP']))
{
    $mamon=substr($_POST['maLayHP'],0,6);
    $maGVDK=substr($_POST['maLayHP'],6,4);
    $soluong=0;
    $daDK=0;
    $sql="select * from `".$mamon."` where maHP='".$_POST['maLayHP']."' ";
    $kqua=Data::TruyVanMon($sql);
    if($row=mysqli_fetch_array($kqua))
    {
        $hk=Data::layHK(substr($_POST['maSV'],0,2));
        $thang=Data::layNgayThang("m");$loai="";
        if($thang>=6 && $thang<8)
            $loai="He-".$hk."";
        else
            $loai="HocKy-".$hk."";
        $up="UPDATE  `quanli_diem`.`".$_POST['maSV']."` SET  `maHP` =  '".$_POST['maLayHP']."',
            `T2` =  '".$row['T2']."',
            `T3` =  '".$row['T3']."',
            `T4` =  '".$row['T4']."',
            `T5` =  '".$row['T5']."',
            `T6` =  '".$row['T6']."',
            `T7` =  '".$row['T7']."',
            `CN` =  '".$row['CN']."',
            `loai` =  '".$loai."',
            `dangKy` =  'DangHoc' WHERE  `".$_POST['maSV']."`.`maMon` = '".$mamon."' and `dangKy` is null ;";
        $op=Data::TruyVanDiem($up);
        $soluong=$row['soLuong'];
    }
    $sql="UPDATE  `quanli_giaovien`.`".$maGVDK."` SET  `soLuong` =  '".($soluong+1)."' WHERE  `".$maGVDK."`.`maHP` ='".$_POST['maLayHP']."';";
    $kqua=Data::TruyVanGV($sql);
    $sql="UPDATE  `quanli_mon`.`".$mamon."` SET  `soLuong` =  '".($soluong+1)."' WHERE  `".$mamon."`.`maHP` ='".$_POST['maLayHP']."';";
    $kqua=Data::TruyVanMon($sql);
}
if(isset($_POST['maSVhienThi']))
{
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table align="center" border="1" style="border-collapse: collapse;" width="90%">
                <tr style="background-color: lightskyblue;">
                    <th>STT</th>
                    <th>Tên Môn</th>
                    <th>Giáo Viên</th>
                    <th>Số Tín Chỉ</th>
                    <th>Thứ 2</th>
                    <th>Thứ 3</th>
                    <th>Thứ 4</th>
                    <th>Thứ 5</th>
                    <th>Thứ 6</th>
                    <th>Thứ 7</th>
                    <th>Chủ Nhật</th>
                    <th></th>
                </tr>
<?php
    $hk=Data::layHK(substr($_POST['maSVhienThi'],0,2));
    $thang=Data::layNgayThang("m");
    if($thang>=6 && $thang<8)
        $sql="SELECT * FROM  `".$_POST['maSVhienThi']."` where dangKy='DangHoc' and loai='He-".$hk."' ";
    else
        $sql="SELECT * FROM  `".$_POST['maSVhienThi']."` where dangKy='DangHoc' and loai='HocKy-".$hk."' ";
    $kqua=Data::TruyVanDiem($sql);
    $i=1;$tongTC=0;
    while($row=mysqli_fetch_array($kqua))
    {
        echo '<tr>';
        echo '<td align="center">'.$i.'</td>';
        echo '<td width="300px">'.$row['Dsach'].'</td>';
        $sql1="Select * from giaovien where maGV='".substr($row['maHP'],6,4)."' ";
        $kqua1=Data::TruyVanGV($sql1);
        if($row1=mysqli_fetch_array($kqua1)){echo '<td>'.$row1['tenGV'].'</td>';}
        echo '<td align="center">'.$row['soTC'].'</td>';
        if(Data::ktThu($row['T2'])==1)
            echo '<td align="center" style="background-color: yellow;">'.$row['T2'].'</td>';
        elseif(Data::ktThu($row['T2'])==2)
            echo '<td align="center" style="background-color: orange;">'.$row['T2'].'</td>';
        else
            echo '<td align="center">'.$row['T2'].'</td>';
            //Thứ 2
        if(Data::ktThu($row['T3'])==1)
            echo '<td align="center" style="background-color: yellow;">'.$row['T3'].'</td>';
        elseif(Data::ktThu($row['T3'])==2)
            echo '<td align="center" style="background-color: orange;">'.$row['T3'].'</td>';
        else
            echo '<td align="center">'.$row['T3'].'</td>';
            //Thứ 3
        if(Data::ktThu($row['T4'])==1)
            echo '<td align="center" style="background-color: yellow;">'.$row['T4'].'</td>';
        elseif(Data::ktThu($row['T4'])==2)
            echo '<td align="center" style="background-color: orange;">'.$row['T4'].'</td>';
        else
            echo '<td align="center">'.$row['T4'].'</td>';
            //Thứ 4
        if(Data::ktThu($row['T5'])==1)
            echo '<td align="center" style="background-color: yellow;">'.$row['T5'].'</td>';
        elseif(Data::ktThu($row['T5'])==2)
            echo '<td align="center" style="background-color: orange;">'.$row['T5'].'</td>';
        else
            echo '<td align="center">'.$row['T5'].'</td>';
            //Thứ 5
        if(Data::ktThu($row['T6'])==1)
            echo '<td align="center" style="background-color: yellow;">'.$row['T6'].'</td>';
        elseif(Data::ktThu($row['T6'])==2)
            echo '<td align="center" style="background-color: orange;">'.$row['T6'].'</td>';
        else
            echo '<td align="center">'.$row['T6'].'</td>';
            //Thứ 6
        if(Data::ktThu($row['T7'])==1)
            echo '<td align="center" style="background-color: yellow;">'.$row['T7'].'</td>';
        elseif(Data::ktThu($row['T7'])==2)
            echo '<td align="center" style="background-color: orange;">'.$row['T7'].'</td>';
        else
            echo '<td align="center">'.$row['T7'].'</td>';
            //Thứ 7
        if(Data::ktThu($row['CN'])==1)
            echo '<td align="center" style="background-color: yellow;">'.$row['CN'].'</td>';
        elseif(Data::ktThu($row['CN'])==2)
            echo '<td align="center" style="background-color: orange;">'.$row['CN'].'</td>';
        else
            echo '<td align="center">'.$row['CN'].'</td>';
            //Chủ Nhật
        echo '<td align="center"><a href="javascript:xoaLich(\''.$row['maHP'].'\')">Xóa</a></td>';
        echo '</tr>';
        $tongTC+=$row['soTC'];
        $i++;
    }
    echo '<tr>';
    echo '<td align="right" colspan="3" style="font-weight: bold;color: red;">Tổng số tín chỉ :</td>';
    echo '<td align="center" style="font-weight: bold;color: red;">'.$tongTC.'/30</td>';
    echo '<td align="right" colspan="9"></td>';
    echo '</tr></table>';
}
?>