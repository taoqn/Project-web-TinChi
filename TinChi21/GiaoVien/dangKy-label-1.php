<table border="1" class="bang" style="border-collapse:collapse;">
  	<tr bgcolor="#C93">
    	<th>Tên Môn</th>
    	<th>Mã Môn</th>
        <th></th>
  	</tr>
<?php
		$ma="";$maGV="";
		$sql="Select * from giaovien where matKhau='".$_SESSION['mk']."' and tenGV='".$_SESSION['name']."' ";
        $kqua=Data::TruyVanGV($sql);
		if($row=mysqli_fetch_array($kqua)){$ma=$row['khoa'];$maGV=$row['maGV'];}
		$sql="select * from ds_mon where khoa='".$ma."' order by tenMon asc";
        $kqua=Data::TruyVanMon($sql);
        $i=1;
        while($row=mysqli_fetch_array($kqua))
        {
            echo '<td>'.$row['tenMon'].'</td>';
            echo '<td>'.$row['maMon'].'</td>';
            echo '<td align="center"><a href="javascript:chonLich(\''.$row['maMon'].'\')">Chọn</a></td>';
            echo '</tr>';
            $i++;
        }
?>
</table>