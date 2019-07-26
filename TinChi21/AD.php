<?php
	class Data
	{
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
		public static function dsLop($nganh)
		{
			$sql="select lop from thongtin where nganh = '".$nganh."' order by lop asc";
			$kqua=Data::TruyVanSV($sql);
			$num=mysqli_num_rows($kqua);$arr=array(" ");
            echo '<option> -- -- </option>';
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
		public static function capNhatMASV($lop)
		{
			$sql="Select * from newsv where lop='".$lop."' Order by ten,ho,ngaysinh asc";
			$kqua=Data::TruyVanSV($sql);
			$i=1;
			while($row=mysqli_fetch_array($kqua))
			{
				if($i<10)
				{
					$ma=substr($row['masv'],0,6);
					$ma.="00".$i;
					$s="UPDATE  `quanli_sinhvien`.`newsv` SET  `masv` =  '".$ma."' 
					WHERE  `newsv`.`sott` =".$row['sott']." and lop='".$lop."'";
					$kqu=Data::TruyVanSV($s);
				}
				if($i>=10)
				{
					$ma=substr($row['masv'],0,6);
					$ma.="0".$i;
					$s="UPDATE  `quanli_sinhvien`.`newsv` SET  `masv` =  '".$ma."' 
					WHERE  `newsv`.`sott` =".$row['sott']." and lop='".$lop."'";
					$kqu=Data::TruyVanSV($s);
				}
				if($i>=100)
				{
					$ma=substr($row['masv'],0,6);
					$ma.=$i;
					$s="UPDATE  `quanli_sinhvien`.`newsv` SET  `masv` =  '".$ma."' 
					WHERE  `newsv`.`sott` =".$row['sott']." and lop='".$lop."'";
					$kqu=Data::TruyVanSV($s);
				}
				$i++;
			}//Cập Nhập Mã số sv
		}
		public static function capNhatMaGV($khoa)
		{
			$sql="Select * from giaovien where khoa='".$khoa."' Order by tenGV asc";
			$kqua=Data::TruyVanGV($sql);
			$i=1;
			while($row=mysqli_fetch_array($kqua))
			{
				if($i<10)
				{
					$ma=substr($row['maGV'],0,2);
					$ma.="0".$i;
					$s="UPDATE  `quanli_giaovien`.`giaovien` SET  `maGV` =  '".$ma."' 
					WHERE  `giaovien`.`sott` =".$row['sott']." ";
					$kqu=Data::TruyVanGV($s);
				}
				if($i>=10)
				{
					$ma=substr($row['maGV'],0,2);
					$ma.=$i;
					$s="UPDATE  `quanli_giaovien`.`giaovien` SET  `maGV` =  '".$ma."' 
					WHERE  `giaovien`.`sott` =".$row['sott']." ";
					$kqu=Data::TruyVanGV($s);
				}
				$i++;
			}//Cập Nhập Mã giáo viên
		}
		public static function capNhatMaMon($ten)
		{
			$sql="Select * from ds_mon where UuTien like '".$ten."%' Order by tenMon asc";
			$kqua=Data::TruyVanMon($sql);
			$i=1;
			while($row=mysqli_fetch_array($kqua))
			{
				if($i<10)
				{
					$ma=substr($row['maMon'],0,3);
					$ma.="00".$i;
					$s="UPDATE  `quanli_mon`.`ds_mon` SET  `maMon` =  '".$ma."' 
					WHERE  `ds_mon`.`sott` =".$row['sott']." ";
					$kqu=Data::TruyVanMon($s);
				}
				if($i>=10)
				{
					$ma=substr($row['maMon'],0,3);
					$ma.="0".$i;
					$s="UPDATE  `quanli_mon`.`ds_mon` SET  `maMon` =  '".$ma."' 
					WHERE  `ds_mon`.`sott` =".$row['sott']." ";
					$kqu=Data::TruyVanMon($s);
				}
				if($i>=100)
				{
					$ma=substr($row['maMon'],0,3);
					$ma.=$i;
					$s="UPDATE  `quanli_mon`.`ds_mon` SET  `maMon` =  '".$ma."' 
					WHERE  `ds_mon`.`sott` =".$row['sott']." ";
					$kqu=Data::TruyVanMon($s);
				}
				$i++;
			}//Cập Nhập Mã môn
		}
	}
?>