<?php
require 'AD.php';
if(isset($_POST['maSVhienThi']) && isset($_POST['hocKy']))
{
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table align="center" border="1" style="border-collapse: collapse;margin-bottom: 10px;" width="80%">
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
                </tr>
<?php
    $sql="SELECT * FROM  `".$_POST['maSVhienThi']."` where loai='".$_POST['hocKy']."' ";
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
        //echo '<td align="center"><a href="javascript:xoaLich(\''.$row['maHP'].'\')">Xóa</a></td>';
        echo '</tr>';
        $tongTC+=$row['soTC'];
        $i++;
    }
    echo '<tr bgcolor="#66CC00">';
    echo '<td align="right" colspan="3" style="font-weight: bold;color: red;">Tổng số tín chỉ :</td>';
    echo '<td align="center" style="font-weight: bold;color: red;">'.$tongTC.'/30</td>';
    echo '<td align="right" colspan="8"></td>';
    echo '</tr></table>';
}
?>