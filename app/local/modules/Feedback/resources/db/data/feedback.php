<?php
$name = "Feedback";
$category = "social";

# Install icons
$icons = array(
	'/app/local/modules/Feedback/resources/media/library/feedback1.png',
	'/app/local/modules/Feedback/resources/media/library/feedback2.png',
);

$result = Siberian_Feature::installIcons($name, $icons);

# Install the Feature
$data = array(
	'library_id' => $result["library_id"],
	'icon_id' => $result["icon_id"],
	'code' => "feedback",
	'name' => $name,
	'model' => "Feedback_Model_Feedback",
	'desktop_uri' => "feedback/application/",
	'mobile_uri' => "feedback/mobile_view/",
	'mobile_uri_parameter' => "customer_id",
	'only_once' => 0,
	'is_ajax' => 1,
	'position' => 190,
	'social_sharing_is_available' => 0,
    "use_my_account" => 1
);

$option = Siberian_Feature::install($category, $data, array('code'));

$layout_data = array(1);
$slug = "feedback";

Siberian_Feature::installLayouts($option->getId(), $slug, $layout_data);

# Icons Flat
$icons = array(
	'/app/local/modules/Feedback/resources/media/library/feedback1-flat.png',
	'/app/local/modules/Feedback/resources/media/library/feedback2-flat.png',
);

$result = Siberian_Feature::installIcons("{$name}-flat", $icons);

$data = array(
	"code"  => "feedback",
	"label" => "Feedback",
	"url"   =>  "application/feedback/*",
);

$acl_resource = new Acl_Model_Resource();
$acl_resource
	->setData($data)
	->insertOnce(array("code"));

// # Copy assets
// $previewer_varpath = Core_Model_Directory::getBasePathTo("/app/local/modules/Feedback/resources/var/apps");
// $varpath = Core_Model_Directory::getBasePathTo("/var/apps/browser");

// if (file_exists($previewer_varpath) && file_exists($varpath)) {
	// exec("cp -R {$previewer_varpath}/* {$varpath}/");
	// exec("chmod -R 777 {$varpath}/");
// }

// $varpath1 = Core_Model_Directory::getBasePathTo("/var/apps/ionic/ios/www");
// if (file_exists($previewer_varpath) && file_exists($varpath1)) {
	// exec("cp -R {$previewer_varpath}/* {$varpath1}/");
	// exec("chmod -R 777 {$varpath1}/");
// }

// $varpath2 = Core_Model_Directory::getBasePathTo("/var/apps/ionic/android/assets/www");
// if (file_exists($previewer_varpath) && file_exists($varpath2)) {
	// exec("cp -R {$previewer_varpath}/* {$varpath2}/");
	// exec("chmod -R 777 {$varpath2}/");
// }

// $varpath3 = Core_Model_Directory::getBasePathTo("/var/apps/ionic/ios-noads/www");
// if (file_exists($previewer_varpath) && file_exists($varpath3)) {
	// exec("cp -R {$previewer_varpath}/* {$varpath3}/");
	// exec("chmod -R 777 {$varpath3}/");
// }

// $oldStr = '<script src="js/controllers/radio.js"></script>';
// $oldStr1 = '<script src="js/factory/radio.js"></script>';
// $replaceStr = '<script src="js/controllers/radio.js"></script>
		// <script src="js/controllers/feedback.js"></script>';
// $replaceStr1 = '<script src="js/factory/radio.js"></script>
		// <script src="js/factory/feedback.js"></script>';

// $indexHtml = Core_Model_Directory::getBasePathTo("/var/apps/browser/index.html");
// $str = file_get_contents($indexHtml);
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
