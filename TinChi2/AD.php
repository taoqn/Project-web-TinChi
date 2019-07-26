<?php
	class Data
	{
        public static function layHK($sKhoa)
        {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
			$namhientai=date("Y");
            $thanghientai=date('m');
			$sKhoaMD=28;$namMD=2005;$sNam=$namMD+($sKhoa-$sKhoaMD);
            $hk=0;
            for($i=$sNam;$i<=$namhientai;$i++)
            {
                $sT=2;
                if($i==$namhientai and $thanghientai>=1)
                    $sT=0;
                if($i==$namhientai and $thanghientai>=8)
                    $sT=1;
                for($k=1;$k<=$sT;$k++)
                {
                    $hk++;
                }
            }
            return $hk;
        }
		public static function TruyVan($sql)
		{
			$conn=mysqli_connect("localhost","root","") or die("Không thể kết nối cơ sở dữ liệu");
			mysqli_select_db($conn,"quanli_admin");
			mysqli_query($conn,"set names 'utf8'");
			$result=mysqli_query($conn,$sql) or die ("Khong thuc hien duoc !");
			mysqli_close($conn);
			return $result;
		}
		public static function TruyVanDiem($sql)
		{
			$conn=mysqli_connect("localhost","root","") or die("Không thể kết nối cơ sở dữ liệu");
			mysqli_select_db($conn,"quanli_diem");
			mysqli_query($conn,"set names 'utf8'");
			$result=mysqli_query($conn,$sql) or die ("Khong thuc hien duoc !");
			mysqli_close($conn);
			return $result;
		}
		public static function TruyVanSV($sql)
		{
			$conn=mysqli_connect("localhost","root","") or die("Không thể kết nối cơ sở dữ liệu");
			mysqli_select_db($conn,"quanli_sinhvien");
			mysqli_query($conn,"set names 'utf8'");
			$result=mysqli_query($conn,$sql) or die ("Khong thuc hien duoc !");
			mysqli_close($conn);
			return $result;
		}
		public static function TruyVanGV($sql)
		{
			$conn=mysqli_connect("localhost","root","") or die("Không thể kết nối cơ sở dữ liệu");
			mysqli_select_db($conn,"quanli_giaovien");
			mysqli_query($conn,"set names 'utf8'");
			$result=mysqli_query($conn,$sql) or die ("Khong thuc hien duoc !");
			mysqli_close($conn);
			return $result;
		}
		public static function TruyVanMon($sql)
		{
			$conn=mysqli_connect("localhost","root","") or die("Không thể kết nối cơ sở dữ liệu");
			mysqli_select_db($conn,"quanli_mon");
			mysqli_query($conn,"set names 'utf8'");
			$result=mysqli_query($conn,$sql) or die ("Khong thuc hien duoc !");
			mysqli_close($conn);
			return $result;
		}
		public static function dsKhoa()
		{
			$namhientai=date("Y");
			for($i=$namhientai;$i>1977;$i--)
			{
				echo '<option value="'.($i-1977).'">'.'Khóa '.($i-1977).' - Năm '.$i.'</option>';
			}
		}
		public static function dsNganh()
		{
			$sql="select * from ds_nganh order by nganh asc";
			$kqua=Data::TruyVanMon($sql);
			while($row=mysqli_fetch_array($kqua))
			{
					echo '<option value="'.$row['ma'].'">';
					echo ''.$row['nganh'].'';
					echo '</option>';
			}
		}
		public static function dsMon()
		{
			$sql="select * from ds_mon order by maMon asc";
			$kqua=Data::TruyVanMon($sql);
			while($row=mysqli_fetch_array($kqua))
			{
					echo '<option value="'.$row['maMon'].'">';
					echo 'Khoa :'.$row['khoa'].' - '.$row['maMon'].' - '.$row['tenMon'];
					echo '</option>';
			}
		}
		public static function dsTenKhoa()
		{
			$sql="select * from ds_khoa order by tenKhoa asc";
			$kqua=Data::TruyVanMon($sql);
			while($row=mysqli_fetch_array($kqua))
			{
					echo '<option value="'.$row['tenKhoa'].'">';
					echo ''.$row['tenKhoa'].'';
					echo '</option>';
			}
		}
		public static function dsTinh()
		{
			$sql="select * from tinhvatp order by tenTP asc";
			$kqua=Data::TruyVanSV($sql);
			while($row=mysqli_fetch_array($kqua))
			{
					echo '<option value="'.$row['tenTP'].'">';
					echo ''.$row['tenTP'].'';
					echo '</option>';
			}
		}
		public static function dsDayPhong()
		{
			$sql="select dayPhong from phonghoc order by dayPhong asc";
			$kqua=Data::TruyVan($sql);
			$num=mysqli_num_rows($kqua);$arr=array(" ");
			while($row=mysqli_fetch_array($kqua))
			{
				$e=0;
				foreach($arr as $key)
				{if($key==$row['dayPhong']) $e=1;}
				if($e==0)
				{
					$arr[]=$row['dayPhong'];
					echo '<option value="'.$row['dayPhong'].'">'.$row['dayPhong'].'</option>';
				}
			}
		}
		public static function dsLop($nganh)
		{
			$sql="select lop from thongtin where nganh = '".$nganh."' order by lop asc";
			$kqua=Data::TruyVanSV($sql);
			$num=mysqli_num_rows($kqua);$arr=array(" ");
			while($row=mysqli_fetch_array($kqua))
			{
				$e=0;
				foreach($arr as $key)
				{if($key==$row['lop']) $e=1;}
				if($e==0)
				{
					$arr[]=$row['lop'];
					echo '<option value="'.$row['lop'].'">'.$row['lop'].'</option>';
				}
			}
		}
		public static function LayTen()
		{
			$sql="select * from tinhvatp order by tenTP asc";
			$kqua=Data::TruyVanSV($sql);
			while($row=mysqli_fetch_array($kqua))
			{
					echo '<option value="'.$row['tenTP'].'">';
					echo ''.$row['tenTP'].'';
					echo '</option>';
			}
		}
		public static function capNhatMASV($lop,$masv)
		{
			$sql="Select * from newsv where lop='".$lop."' Order by masv asc";
			$kqua=Data::TruyVanSV($sql);
            $i=1;$m="";
            while($row=mysqli_fetch_array($kqua))
            {
                if($row['masv']!=$masv)
                {
                    $dk=0;$ma="";
                    if($i<10)
					   $ma=$masv."00".$i;
                    if($i>=10)
					   $ma=$masv."0".$i;
				    if($i>=100)
					   $ma=$masv.$i;
                    if($row['masv']==$ma)
                        $dk=1;
                    if($dk==0)
                        break;
                    $i++;
                }
            }
            if($i<10)
			     $m=$masv."00".$i;
            if($i>=10)
                 $m=$masv."0".$i;
			if($i>=100)
			     $m=$masv.$i;
			$s="UPDATE  `quanli_sinhvien`.`newsv` SET  `masv` =  '".$m."' 
			WHERE  masv='".$masv."' and lop='".$lop."'";
			$kqu=Data::TruyVanSV($s);
            return $m;
            //Cập Nhập Mã số sv
		}
		public static function capNhatMaGV($khoa,$maGV)
		{
			$sql="Select * from giaovien where khoa='".$khoa."' Order by maGV asc";
			$kqua=Data::TruyVanGV($sql);
            $i=1;$m="";
            while($row=mysqli_fetch_array($kqua))
            {
                if($row['maGV']!=$maGV)
                {
                    $dk=0;$ma="";
                    if($i<10)
					   $ma=$maGV."0".$i;
                    if($i>=10)
					   $ma=$maGV.$i;
                    if($row['maGV']==$ma)
                        $dk=1;
                    if($dk==0)
                        break;
                    $i++;
                }
            }
            if($i<10)
			     $m=$maGV."0".$i;
            if($i>=10)
                 $m=$maGV.$i;
			$s="UPDATE  `quanli_giaovien`.`giaovien` SET  `maGV` =  '".$m."' 
			WHERE  `maGV` =  '".$maGV."' ";
			$kqu=Data::TruyVanGV($s);
            //Cập Nhập Mã giáo viên
		}
		public static function capNhatMaMon($ten,$tenM)
		{
			$sql="Select * from ds_mon where UuTien like '".$ten."%' Order by maMon asc";
			$kqua=Data::TruyVanMon($sql);
            $i=1;$m="";
            while($row=mysqli_fetch_array($kqua))
            {
                if($row['maMon']!=$ten)
                {
                    $dk=0;$ma="";
                    if($i<10)
					   $ma=$ten."00".$i;
                    if($i>=10)
					   $ma=$ten."0".$i;
				    if($i>=100)
					   $ma=$ten.$i;
                    if($row['maMon']==$ma)
                        $dk=1;
                    if($dk==0)
                        break;
                    $i++;
                }
            }
            if($i<10)
			     $m=$ten."00".$i;
            if($i>=10)
                 $m=$ten."0".$i;
			if($i>=100)
			     $m=$ten.$i;
            $s="UPDATE  `quanli_mon`.`ds_mon` SET  `maMon` =  '".$m."' 
            WHERE  tenMon ='".$tenM."' and UuTien like '".$ten."%' ";
            $kqu=Data::TruyVanMon($s);
		}
	}
?>