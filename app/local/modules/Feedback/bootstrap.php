<?php

class Feedback_Bootstrap
{
	
	public static function init($bootstrap)
	{
		// # Copy assets
		// $previewer_varpath = Core_Model_Directory::getBasePathTo("/app/local/modules/Feedback/resources/var/apps");
		// $varpath = Core_Model_Directory::getBasePathTo("/var/apps/browser");
		// if (file_exists($previewer_varpath) && !file_exists("{$varpath}/js/controllers/feedback.js")) {
			// exec("cp -R {$previewer_varpath}/* {$varpath}/");
			// exec("chmod -R 777 {$varpath}/");
		// }
		
		// $varpath1 = Core_Model_Directory::getBasePathTo("/var/apps/ionic/ios/www");
		// if (file_exists($previewer_varpath) && !file_exists("{$varpath1}/js/controllers/feedback.js")) {
			// exec("cp -R {$previewer_varpath}/* {$varpath1}/");
			// exec("chmod -R 775 {$varpath1}/");
		// }
		
		// $varpath2 = Core_Model_Directory::getBasePathTo("/var/apps/ionic/android/assets/www");
		// if (file_exists($previewer_varpath) && file_exists("{$varpath2}/js/controllers/feedback.js")) {
			// exec("cp -R {$previewer_varpath}/* {$varpath2}/");
			// exec("chmod -R 775 {$varpath2}/");
		// }
		
		// $varpath3 = Core_Model_Directory::getBasePathTo("/var/apps/ionic/ios-noads/www");
		// if (file_exists($previewer_varpath) && !file_exists("{$varpath3}/js/controllers/feedback.js")) {
			// exec("cp -R {$previewer_varpath}/* {$varpath3}/");
			// exec("chmod -R 775 {$varpath3}/");
		// }
		
		// $indexHtml = Core_Model_Directory::getBasePathTo("/var/apps/browser/index.html");
		// $str = file_get_contents($indexHtml);
		// $oldStr = '<script src="js/controllers/radio.js"></script>';
		// $oldStr1 = '<script src="js/factory/radio.js"></script>';
		// $replaceStr = '<script src="js/controllers/radio.js"></script>
		// <script src="js/controllers/feedback.js"></script>';
		// $replaceStr1 = '<script src="js/factory/radio.js"></script>
		// <script src="js/factory/feedback.js"></script>';
		// if (strpos($str, "feedback") !== false) {
		// } else {
			// $str = str_replace($oldStr, $replaceStr, $str);
			// $str = str_replace($oldStr1, $replaceStr1, $str);
			// file_put_contents($indexHtml, $str);
		// }
		
		// $indexHtml1 = Core_Model_Directory::getBasePathTo("/var/apps/ionic/ios/www/index.html");
		// $str1 = file_get_contents($indexHtml1);
		// if (strpos($str1, "feedback") !== false) {
		// } else {
			// $str1 = str_replace($oldStr, $replaceStr, $str1);
			// $str1 = str_replace($oldStr1, $replaceStr1, $str1);
			// file_put_contents($indexHtml1, $str1);
		// }
		
		// $indexHtml3 = Core_Model_Directory::getBasePathTo("/var/apps/ionic/ios-noads/www/index.html");
		// $str3 = file_get_contents($indexHtml3);
		// if (strpos($str3, "feedback") !== false) {
		// } else {
			// $str3 = str_replace($oldStr, $replaceStr, $str3);
			// $str3 = str_replace($oldStr1, $replaceStr1, $str3);
			// file_put_contents($indexHtml3, $str3);
		// }
		
		// $indexHtml2 = Core_Model_Directory::getBasePathTo("/var/apps/ionic/android/assets/www/index.html");
		// $str2 = file_get_contents($indexHtml2);
		// if (strpos($str2, "feedback") !== false) {
		// } else {
			// $str2 = str_replace($oldStr, $replaceStr, $str2);
			// $str2 = str_replace($oldStr1, $replaceStr1, $str2);
			// file_put_contents($indexHtml2, $str2);
		// }
		
	}
}