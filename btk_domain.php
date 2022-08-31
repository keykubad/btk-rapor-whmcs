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

				 if(isset($_POST["domain"])){
				 header("Pragma: public");
				 header("Expires: 0");
				 header("Cache-Control: private");
				 header("Content-type: application/csv");
				 header("Content-Disposition: attachment; filename=domainler.csv");
				 $domainler_tescil = mysql_query("SELECT userid, registrationdate, domain, nextduedate FROM tbldomains WHERE status='Active' ORDER BY domain ASC");
				 $row_domainler_tescil = mysql_fetch_assoc($domainler_tescil);
				 
					
				do {
					$hosting_kontrol = mysql_query("SELECT * FROM tblhosting WHERE domain='".$row_domainler_tescil['domain']."'");
					$hosting_kontrol_durum = mysql_num_rows($hosting_kontrol);
					
					if($hosting_kontrol_durum==0){
						$kullanicibilgileri_tescil = mysql_query("SELECT firstname, lastname, email, phonenumber FROM tblclients WHERE id='".$row_domainler_tescil['userid']."'");
						$row_kullanicibilgileri_tescil = mysql_fetch_assoc($kullanicibilgileri_tescil);
						echo $row_domainler_tescil['domain'].",".str_replace(" ", "_", $row_kullanicibilgileri_tescil['firstname'])."_".$row_kullanicibilgileri_tescil['lastname'].",".$row_kullanicibilgileri_tescil['phonenumber'].",".$row_kullanicibilgileri_tescil['email'].",".$row_domainler_tescil['registrationdate'].",".$row_domainler_tescil['nextduedate']."\n";
					}
				} while($row_domainler_tescil = mysql_fetch_assoc($domainler_tescil));
				 
			 }else{
				 echo "direk calismaz!!";
			 }

?>