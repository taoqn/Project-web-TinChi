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
<center>
<label style="font-weight: bold;">
    Danh Sách Sinh Viên Đăng Ký Học Phần <span id="layMaSV" style="color: red;"><?php echo $_REQUEST['id']; ?></span>
</label>
</center>
        <table align="center" border="1" style="border-collapse: collapse; margin-top: 10px" width="90%">
        <tr style="background-color: lawngreen;">
            <th>STT</th>
            <th>Sinh Viên</th>
            <th>Mã Sinh Viên</th>
            <th>Ngành</th>
        </tr>
<?php
    $uutien="";
    $sql="SELECT * FROM  ds_mon where maMon = '".substr($_REQUEST['id'],0,6)."' ";
    $kqua=Data::TruyVanMon($sql);
    if($row=mysqli_fetch_array($kqua)){$uutien=$row['UuTien'];}
    $mang=explode("-",$uutien);
    $k=1;
    for($i=0;$i<(count($mang));$i++)
    {
        $tennganh="";
        $sql="SELECT * FROM ds_nganh where ma='".$mang[$i]."' order by ma asc";
        $kqua=Data::TruyVanMon($sql);
        if($row=mysqli_fetch_array($kqua)){$tennganh=$row['nganh'];}
        
        $sql="SELECT * FROM newsv where nganh='".$tennganh."' order by masv asc";
        $kqua=Data::TruyVanSV($sql);
        while($row=mysqli_fetch_array($kqua))
        {
            $sql1="SELECT * FROM  `".$row['masv']."` where maHP='".$_REQUEST['id']."'";
            $kqua1=Data::TruyVanDiem($sql1);
            if($row1=mysqli_fetch_array($kqua1))
            {
                if($row1['dangKy']=="DangHoc")
                {
                    echo '<tr>';
                    echo '<td align="center">'.$k.'</td>';
                    echo '<td>'.$row['ho'].' '.$row['ten'].'</td>';
                    echo '<td align="center">'.$row['masv'].'</td>';
                    echo '<td align="center">'.$row['nganh'].'</td>';
                    echo '</tr>';
                    $k++;
                }
            }
        }
        
    }
?>
    </table>
</label>