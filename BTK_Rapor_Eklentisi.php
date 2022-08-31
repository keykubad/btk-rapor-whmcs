<?php
//Kodlayan : Gürkan Ersan
//Keykubad
//Hostgrup İnternet ve Bilişim Hizmetleri
//www.hostgrup.com www.ekonomikhost.net www.hostingal.com
if (!defined("WHMCS")) die("This file cannot be accessed directly");
	
function BTK_Rapor_Eklentisi_config() {
	global $CONFIG;
    $configarray = array(
    "name" => "BTK Rapor Eklentisi",
    "description" => "Bu eklenti sayesinde BTK'nın yer sağlayıcılar için zorunlu tuttuğu alan adı ve hizmet bildirim dosyalarını (csv) oluşturabilirsiniz.",
    "version" => "Final",
    "author" => "Hostgrup",
	);

    return $configarray;

}

function BTK_Rapor_Eklentisi_output($vars) {

    $modulelink = $vars['modulelink'];
	    $LANG = $vars['_lang'];
	echo '<div class="alert alert-info" role="alert">Bu kısım <b>"Barındırılan Alan Adları"</b> listenizi almak içindir. Butona bastığınızda sadece aktif listenizi alacaktır.</div>
	<form method="post" action="/modules/addons/BTK_Rapor_Eklentisi/btk_hosting.php">
	<div class="row">
							<div class="col-md-12">
							<div class="form-group">					
	 </div>
	 
	
	 <p><center><button type="submit" name="hosting" class="btn btn-primary">Hosting Dosyasını İndir</button></center></p>
	  </form></div> </div><br>';
	echo '<div class="alert alert-info" role="alert">Bu kısım <b>"Tescil Edilen Alan Adları"</b> listenizi almak içindir. Butona bastığınızda sadece aktif listenizi alacaktır.</div>
	<form method="post" action="/modules/addons/BTK_Rapor_Eklentisi/btk_domain.php">
	<div class="row">
							<div class="col-md-12">
							<div class="form-group">					
	 </div>
	 
	 
	 <p><center><button type="submit" name="domain" class="btn btn-primary">Domain Dosyasını İndir</button></center></p>
	  </form>
	 </div></div>';
 


}
   



?>