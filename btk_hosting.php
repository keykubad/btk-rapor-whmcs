<?php
//Kodlayan : Gürkan Ersan
//Keykubad
//Hostgrup İnternet ve Bilişim Hizmetleri
//www.hostgrup.com www.ekonomikhost.net www.hostingal.com
define('DS', DIRECTORY_SEPARATOR); 
define('WHMCS_MAIN_DIR', substr(dirname(__FILE__),0, strpos(dirname(__FILE__),'modules'.DS.'addons')));  

if(file_exists(WHMCS_MAIN_DIR.DS.'init.php')) // 
{
    require_once WHMCS_MAIN_DIR.DS.'init.php';
}
else // eski sürüm
{
    require_once WHMCS_MAIN_DIR.DS."configuration.php";
    require_once WHMCS_MAIN_DIR.DS."includes".DS."functions.php";
}
			 if(isset($_POST["hosting"])){
				 header("Pragma: public");
				 header("Expires: 0");
				 header("Cache-Control: private");
				 header("Content-type: application/csv");
				 header("Content-Disposition: attachment; filename=hostlar.csv");
				 $domainler = mysql_query("SELECT userid, regdate, domain, nextduedate FROM tblhosting WHERE domainstatus='active' ORDER BY domain ASC");
				$row_domainler = mysql_fetch_assoc($domainler);

				do {
					$kullanicibilgileri = mysql_query("SELECT firstname, lastname, email, phonenumber FROM tblclients WHERE id='".$row_domainler['userid']."'");
					$row_kullanicibilgileri = mysql_fetch_assoc($kullanicibilgileri);
					echo $row_domainler['domain'].",".str_replace(" ", "_", $row_kullanicibilgileri['firstname'])."_".$row_kullanicibilgileri['lastname'].",".$row_kullanicibilgileri['phonenumber'].",".$row_kullanicibilgileri['email'].",".$row_domainler['regdate'].",".$row_domainler['nextduedate']."\n";
				} while($row_domainler = mysql_fetch_assoc($domainler));
				 
			 }else{
				 echo "direk calismaz!!";
			 }
			 
?>