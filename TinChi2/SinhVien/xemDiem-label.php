<?php
require 'AD.php';
if(isset($_POST['maSVhienThi']) && isset($_POST['hocKy']))
{
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table align="center" border="1" style="border-collapse: collapse;margin-bottom: 10px;" width="100%">
                <tr style="background-color: lightskyblue;">
                    <th>STT</th>
                    <th width="300px">Tên Môn</th>
                    <th>Mã Môn</th>
                    <th>Số Tín Chỉ</th>
                    <th>Mã Điễm</th>
                    <th width="60px">Điểm 10</th>
                    <th width="60px">Điểm 4</th>
                    <th>Loại</th>
                    <th>Ghi Chú</th>
                </tr>
<?php
    if($_POST['hocKy']=="all")
        $sql="SELECT * FROM  `".$_POST['maSVhienThi']."` where dangKy='hoanThanh' or dangKy='DangHoc' order by Dsach,sott asc ";
    else
        $sql="SELECT * FROM  `".$_POST['maSVhienThi']."` where loai='".$_POST['hocKy']."' order by Dsach asc ";
    $kqua=Data::TruyVanDiem($sql);
    $i=1;$tongTC=0;$soTC=0;$diemTB=0;$diem4=0;$mamon="";$k=1;
    while($row=mysqli_fetch_array($kqua))
    {
        echo '<tr bgcolor="yellow">';
        echo '<td align="center">'.$i.'</td>';
        if($mamon==$row['maMon'])
        {
            echo '<td>'.$row['Dsach'].' - Học lại lần '.$k.'</td>';
            $k++;
        }
        else
        {
            echo '<td>'.$row['Dsach'].'</td>';
            $k=1;
        }
        $mamon=$row['maMon'];
        echo '<td align="center">'.$row['maMon'].'</td>';
        echo '<td align="center">'.$row['soTC'].'</td>';
		echo '<td align="center">Điểm HP : </td>';
        if($row['chuyenCan']=="" && $row['giuaKy']=="" && $row['cuoiKy']=="")
        {
            echo '<td align="center" style="font-weight: bold;color: red;"></td>';
            echo '<td align="center" style="font-weight: bold;color: red;"></td>';
            echo '<td align="center"></td>';
            echo '<td align="center"></td>';
        }
        else
        {
            echo '<td align="center" style="font-weight: bold;color: red;">'.$row['DTB'].'</td>';
            $tongTC+=$row['soTC'];
            $diemTB+=$row['DTB']*$row['soTC'];
            if($row['DTB']>=9.5)
            {
                echo '<td align="center" style="font-weight: bold;color: red;">5.5</td>';
                echo '<td align="center">A+</td>';
                echo '<td align="center"></td>';
                $diem4+=5.5*$row['soTC'];
            }
            elseif($row['DTB']>=9)
            {
                echo '<td align="center" style="font-weight: bold;color: red;">5.0</td>';
                echo '<td align="center">A</td>';
                echo '<td align="center"></td>';
                $diem4+=5*$row['soTC'];
            }
            elseif($row['DTB']>=8.5)
            {
                echo '<td align="center" style="font-weight: bold;color: red;">4.5</td>';
                echo '<td align="center">B+</td>';
                echo '<td align="center"></td>';
                $diem4+=4.5*$row['soTC'];
            }
            elseif($row['DTB']>=8)
            {
                echo '<td align="center" style="font-weight: bold;color: red;">4.0</td>';
                echo '<td align="center">B</td>';
                echo '<td align="center"></td>';
                $diem4+=4*$row['soTC'];
            }
            elseif($row['DTB']>=7.5)
            {
                echo '<td align="center" style="font-weight: bold;color: red;">3.5</td>';
                echo '<td align="center">C+</td>';
                echo '<td align="center"></td>';
                $diem4+=3.5*$row['soTC'];
            }
            elseif($row['DTB']>=7)
            {
                echo '<td align="center" style="font-weight: bold;color: red;">3.0</td>';
                echo '<td align="center">C</td>';
                echo '<td align="center"></td>';
                $diem4+=3*$row['soTC'];
            }
            elseif($row['DTB']>=6.5)
            {
                echo '<td align="center" style="font-weight: bold;color: red;">2.5</td>';
                echo '<td align="center">D+</td>';
                echo '<td align="center"></td>';
                $diem4+=2.5*$row['soTC'];
            }
            elseif($row['DTB']>=6)
            {
                echo '<td align="center" style="font-weight: bold;color: red;">2.0</td>';
                echo '<td align="center">D</td>';
                echo '<td align="center"></td>';
                $diem4+=2*$row['soTC'];
            }
            elseif($row['DTB']>=5.5)
            {
                echo '<td align="center" style="font-weight: bold;color: red;">1.5</td>';
                echo '<td align="center">E+</td>';
                echo '<td align="center"></td>';
                $diem4+=1.5*$row['soTC'];
            }
            elseif($row['DTB']>=5)
            {
                echo '<td align="center" style="font-weight: bold;color: red;">1.0</td>';
                echo '<td align="center">E</td>';
                echo '<td align="center"></td>';
                $diem4+=1*$row['soTC'];
            }
            elseif($row['DTB']>=4.5)
            {
                echo '<td align="center" style="font-weight: bold;color: red;">0.5</td>';
                echo '<td align="center">F+</td>';
                echo '<td align="center">Cải Thiện</td>';
                $diem4+=0.5*$row['soTC'];
            }
            elseif($row['DTB']>=4)
            {
                echo '<td align="center" style="font-weight: bold;color: red;">0</td>';
                echo '<td align="center">F</td>';
                echo '<td align="center">Cải Thiện</td>';
                $diem4+=0*$row['soTC'];
            }
            else
            {
                echo '<td align="center" style="font-weight: bold;color: red;">0</td>';
                echo '<td align="center">F-</td>';
                echo '<td align="center">Học Lại</td>';
                $diem4+=0*$row['soTC'];
            }
        }
        echo '</tr>';
        echo '<tr>';
        echo '<td></td><td></td><td></td><td></td>';
		echo '<td>Chuyên Cần</td>';
        echo '<td align="center">'.$row['chuyenCan'].'</td>';
		echo '<td></td>';
        echo '<td></td>';
        echo '<td></td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td></td><td></td><td></td><td></td>';
		echo '<td>Giữa Kỳ</td>';
        echo '<td align="center">'.$row['giuaKy'].'</td>';
		echo '<td></td>';
        echo '<td></td>';
        echo '<td></td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td></td><td></td><td></td><td></td>';
		echo '<td>Cuối Kỳ</td>';
        echo '<td align="center">'.$row['cuoiKy'].'</td>';
		echo '<td></td>';
        echo '<td></td>';
        echo '<td></td>';
        echo '</tr>';
        $soTC+=$row['soTC'];
        $i++;
    }
    if($diem4!=0 && $diemTB!=0 && $tongTC!=0)
    {
        echo '<tr bgcolor="#66CC01">';
        echo '<td align="right" colspan="3" style="font-weight: bold;color: Black;">Tổng số tín chỉ :</td>';
        echo '<td align="center" style="font-weight: bold;color: red;">'.$tongTC.'/'.$soTC.'</td>';
        echo '<td align="right" style="font-weight: bold;color: Black;">Thang Điểm 10 - 4 :</td>';
        $diem="".($diemTB/$tongTC);$diem=substr($diem,0,4);
        echo '<td align="center" style="font-weight: bold;color: red;">'.$diem.'</td>';
        $diem="".($diem4/$tongTC);$diem=substr($diem,0,4);
        echo '<td align="center" style="font-weight: bold;color: red;">'.$diem.'</td>';
        echo '<td align="right" colspan="2"></td>';
        echo '</tr>';
    }
    else
    {
        echo '<tr bgcolor="#66CC01">';
        echo '<td align="right" colspan="3" style="font-weight: bold;color: Black;">Tổng số tín chỉ :</td>';
        echo '<td align="center" style="font-weight: bold;color: red;">0</td>';
        echo '<td align="right" style="font-weight: bold;color: Black;">Thang Điểm 10 - 4 :</td>';
        echo '<td align="center" style="font-weight: bold;color: red;"></td>';
        echo '<td align="center" style="font-weight: bold;color: red;"></td>';
        echo '<td align="right" colspan="2"></td>';
        echo '</tr>';
    }
    echo '</table>';
}
?>