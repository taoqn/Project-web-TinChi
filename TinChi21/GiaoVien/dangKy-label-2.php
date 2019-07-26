<?php
require 'AD.php';
if(isset($_POST['soLuong']) && isset($_POST['tiet']) && isset($_POST['maGV']) && isset($_POST['maMon']))
{
    $bang1="CREATE TABLE IF NOT EXISTS `".$_POST['maGV']."` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `dsMon` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `maHP` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `soTC` int(11) DEFAULT NULL,
  `hocKy` int(11) DEFAULT NULL,
  `T2` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T3` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T4` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T5` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T6` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T7` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `CN` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phong` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `toiDa` int(11) DEFAULT NULL,
  `soLuong` int(11) DEFAULT NULL,
  `thoiGian` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;";
    $kqua=Data::TruyVanGV($bang1);

    $bang1="CREATE TABLE IF NOT EXISTS `".$_POST['maMon']."` (
  `sott` int(11) NOT NULL AUTO_INCREMENT,
  `dsMon` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `maHP` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `soTC` int(11) DEFAULT NULL,
  `hocKy` int(11) DEFAULT NULL,
  `T2` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T3` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T4` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T5` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T6` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `T7` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `CN` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phong` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `toiDa` int(11) DEFAULT NULL,
  `soLuong` int(11) DEFAULT NULL,
  `thoiGian` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`sott`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;";
    $kqua=Data::TruyVanMon($bang1);
    
    $tenmon="";
    $mahp=$_POST['maMon'].$_POST['maGV'];
    $tinchi="";
    $hocky="";
    $thu2="NULL";
    $thu3="NULL";
    $thu4="NULL";
    $thu5="NULL";
    $thu6="NULL";
    $thu7="NULL";
    $thu8="NULL";
    
    $sql="Select * from ds_mon where maMon='".$_POST['maMon']."'";
    $kqua=Data::TruyVanMon($sql);
    if($row=mysqli_fetch_array($kqua))
    {
        $tenmon=$row['tenMon'];$tinchi=$row['soTC'];$hocky=$row['HK'];
    }
    
    $mang=explode("$",$_POST['tiet']);$arr=array();
    foreach($mang as $key=>$value){$arr[]=$value;}
    for($i=0;$i<(count($mang));$i++)
    {
        $mang1=explode(" ",$arr[$i]);$arr1=array();
        foreach($mang1 as $key=>$value){$arr1[]=$value;}
        if($arr1[0]=="t2") {$thu2="'".$arr1[1]."'";}
        elseif($arr1[0]=="t3") {$thu3="'".$arr1[1]."'";}
        elseif($arr1[0]=="t4") {$thu4="'".$arr1[1]."'";}
        elseif($arr1[0]=="t5") {$thu5="'".$arr1[1]."'";}
        elseif($arr1[0]=="t6") {$thu6="'".$arr1[1]."'";}
        elseif($arr1[0]=="t7") {$thu7="'".$arr1[1]."'";}
        else
            $thu8="'".$arr1[1]."'";
    }
    
    $sql="INSERT INTO `quanli_giaovien`.`".$_POST['maGV']."` 
    VALUES (NULL,
     '".$tenmon."',
      '".$mahp."',
       '".$tinchi."',
        '".$hocky."',
         ".$thu2.",
          ".$thu3.",
           ".$thu4.",
            ".$thu5.",
             ".$thu6.",
              ".$thu7.",
               ".$thu8.",
                NULL, '".$_POST['soLuong']."', NULL, NULL);";
    $kqua=Data::TruyVanGV($sql);
    Data::capNhatMaHocPhan($_POST['maGV'],$mahp);
    
    $sql="SELECT * FROM  `".$_POST['maGV']."`";
    $kqua=Data::TruyVanGV($sql);
    if($row=mysqli_fetch_array($kqua)){$mahp=$row['maHP'];}
    
    $sql="INSERT INTO `quanli_mon`.`".$_POST['maMon']."` 
    VALUES (NULL,
     '".$tenmon."',
      '".$mahp."',
       '".$tinchi."',
        '".$hocky."',
         ".$thu2.",
          ".$thu3.",
           ".$thu4.",
            ".$thu5.",
             ".$thu6.",
              ".$thu7.",
               ".$thu8.",
                NULL, '".$_POST['soLuong']."', NULL, NULL);";
    $kqua=Data::TruyVanMon($sql);
?>
    <table align="center" border="1">
        <tr>
            <th>STT</th>
            <th>Tên Môn</th>
            <th>Mã Học Phần</th>
            <th>Thứ 2</th>
            <th>Thứ 3</th>
            <th>Thứ 4</th>
            <th>Thứ 5</th>
            <th>Thứ 6</th>
            <th>Thứ 7</th>
            <th>Chủ Nhật</th>
        </tr>
<?php
    $sql="SELECT * FROM  `".$_POST['maGV']."`";
    $kqua=Data::TruyVanGV($sql);
    $i=1;
    while($row=mysqli_fetch_array($kqua))
    {
        echo '<tr>';
        echo '<td align="center">'.$i.'</td>';
        echo '<td>'.$row['dsMon'].'</td>';
        echo '<td align="center">'.$row['maHP'].'</td>';
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
}
?>
