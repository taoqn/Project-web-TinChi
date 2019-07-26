<?php
require 'AD.php';
if(isset($_POST['tiet']) && isset($_POST['maGV']))
{
    $thu2="";$thu3="";$thu4="";$thu5="";$thu6="";$thu7="";$thu8="";
    $mang=explode("$",$_POST['tiet']);$arr=array();
    foreach($mang as $key=>$value){$arr[]=$value;}
    for($i=0;$i<(count($mang));$i++)
    {
        $mang1=explode(" ",$arr[$i]);$arr1=array();
        foreach($mang1 as $key=>$value){$arr1[]=$value;}
        if($arr1[0]=="t2") {$thu2=$arr1[1];}
        elseif($arr1[0]=="t3") {$thu3=$arr1[1];}
        elseif($arr1[0]=="t4") {$thu4=$arr1[1];}
        elseif($arr1[0]=="t5") {$thu5=$arr1[1];}
        elseif($arr1[0]=="t6") {$thu6=$arr1[1];}
        elseif($arr1[0]=="t7") {$thu7=$arr1[1];}
        else
            $thu8=$arr1[1];
    }
    $sql="SELECT * FROM  `".$_POST['maGV']."`";
    $kqua=Data::TruyVanGV($sql);
    $dk=0;
    while($row=mysqli_fetch_array($kqua))
    {
            if( Data::kiemTraLich($row['T2'],$thu2)==true  || 
                Data::kiemTraLich($row['T3'],$thu3)==true  ||
                Data::kiemTraLich($row['T4'],$thu4)==true  ||
                Data::kiemTraLich($row['T5'],$thu5)==true  ||
                Data::kiemTraLich($row['T6'],$thu6)==true  ||
                Data::kiemTraLich($row['T4'],$thu7)==true  ||
                Data::kiemTraLich($row['CN'],$thu8)==true    )
            {
                $dk=1;
            }
    }
    if($dk!=1)
        echo "ok";
}
if(isset($_POST['maHPxoa']) && isset($_POST['maGV']))
{
    $maHP=$_POST['maHPxoa'];
    $sql="DELETE FROM `quanli_giaovien`.`".$_POST['maGV']."` WHERE `".$_POST['maGV']."`.`maHP` = '".$_POST['maHPxoa']."' ;";
    $kqua=Data::TruyVanGV($sql);
    $maHP=substr($maHP,0,6);
    $sql="DELETE FROM `quanli_mon`.`".$maHP."` WHERE `".$maHP."`.`maHP` = '".$_POST['maHPxoa']."' ;";
    $kqua=Data::TruyVanGV($sql);
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
    $sql="SELECT * FROM  `".$_POST['maGV']."` order by maHP asc";
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
    echo '</table>';
}

?>