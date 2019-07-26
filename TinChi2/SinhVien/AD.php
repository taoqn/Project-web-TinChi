<?php
	class Data
	{
        public static function ktThu($thu)
        {
            if($thu!="")
            {
                $mang=explode("-",$thu);
                if($mang[0]<=5)
                    return 1;
                else
                    return 2;
            }
        }
        public static function layNgayThang($i)
        {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            if($i=='d')   return date('d');
            elseif($i=='m')   return date('m');
            elseif($i=='y')   return date('Y');
            else    return date('d/m/Y');
        }
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
        public static function kiemTraLich($thu1,$thu2)
        {
            if($thu1!="" && $thu2!="")
            {
                $mang1=explode("-",$thu1);$st1=$mang1[0];$end1=$mang1[1];
                $mang2=explode("-",$thu2);$st2=$mang2[0];$end2=$mang2[1];
                for($i=$st1;$i<$end1;$i++)
                {
                    for($k=$st2;$k<$end2;$k++)
                    {
                        if($i==$k)
                            return true;
                    }
                }
                return false;
            }
            else
                {return false;}
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
	}
?>