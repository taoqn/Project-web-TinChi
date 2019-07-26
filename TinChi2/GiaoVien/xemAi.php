<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
    #label-1{
        overflow: auto;
        float: left;
        width: 100%;
        height: 490px;
    }
</style>
<label id="label-1">
<?php
require 'AD.php';
?>
        <table align="center" border="1" style="border-collapse: collapse;" width="90%">
        <tr style="background-color: yellow;">
            <th>STT</th>
            <th>Tên Môn</th>
            <th>Tên Giáo Viên</th>
            <th>Mã Học Phần</th>
            <th>Số Lượng</th>
            <th>Thứ 2</th>
            <th>Thứ 3</th>
            <th>Thứ 4</th>
            <th>Thứ 5</th>
            <th>Thứ 6</th>
            <th>Thứ 7</th>
            <th>Chủ Nhật</th>
        </tr>
<?php
    $sql="SELECT * FROM  `".$_REQUEST['id']."` order by maHP asc";
    $kqua=Data::TruyVanMon($sql);
    $i=1;
    while($row=mysqli_fetch_array($kqua))
    {
        echo '<tr>';
        echo '<td align="center">'.$i.'</td>';
        echo '<td>'.$row['dsMon'].'</td>';
            $gh=substr($row['maHP'],6,4);
            $s="SELECT * FROM  giaovien where maGV='".$gh."' ";
            $k=Data::TruyVanGV($s);
            if($r=mysqli_fetch_array($k))
            {
                echo '<td>'.$r['tenGV'].'</td>';
            }
        echo '<td align="center">'.$row['maHP'].'</td>';
        echo '<td align="center">'.$row['toiDa'].'</td>';
        echo '<td align="center">'.$row['T2'].'</td>';
        echo '<td align="center">'.$row['T3'].'</td>';
        echo '<td align="center">'.$row['T4'].'</td>';
        echo '<td align="center">'.$row['T5'].'</td>';
        echo '<td align="center">'.$row['T6'].'</td>';
        echo '<td align="center">'.$row['T7'].'</td>';
        echo '<td align="center">'.$row['CN'].'</td>';
        echo '</tr>';
        $i++;
    }
    echo '</table>';
?>
</label>