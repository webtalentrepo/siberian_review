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

# Copy assets
$feedback_var_path = Core_Model_Directory::getBasePathTo("/app/local/modules/Feedback/resources/var/apps");
$var_path = Core_Model_Directory::getBasePathTo("/var/apps/browser");

if (file_exists($feedback_var_path) && file_exists($var_path)) {
	exec("cp -R {$feedback_var_path}/* {$var_path}/");
	exec("chmod -R 777 {$var_path}/");
}

$var_path1 = Core_Model_Directory::getBasePathTo("/var/apps/ionic/ios/www");
if (file_exists($feedback_var_path) && file_exists($var_path1)) {
	exec("cp -R {$feedback_var_path}/* {$var_path1}/");
	exec("chmod -R 777 {$var_path1}/");
}

$var_path2 = Core_Model_Directory::getBasePathTo("/var/apps/ionic/android/assets/www");
if (file_exists($feedback_var_path) && file_exists($var_path2)) {
	exec("cp -R {$feedback_var_path}/* {$var_path2}/");
	exec("chmod -R 777 {$var_path2}/");
}

$var_path3 = Core_Model_Directory::getBasePathTo("/var/apps/ionic/ios-noads/www");
if (file_exists($feedback_var_path) && file_exists($var_path3)) {
	exec("cp -R {$feedback_var_path}/* {$var_path3}/");
	exec("chmod -R 777 {$var_path3}/");
}

$indexHtml = Core_Model_Directory::getBasePathTo("/var/apps/browser/index.html");
$str = file_get_contents($indexHtml);
$oldStr = '<script src="js/controllers/radio.js"></script>';
$oldStr1 = '<script src="js/factory/radio.js"></script>';
$oldStr2 = '<link href="css/ionic.app.min.css" rel="stylesheet">';
$oldStr3 = '<script src="js/constants/cache-events.js"></script>';
$oldStr4 = '<script src="js/directives/sb-a-click.js"></script>';
$replaceStr = '<script src="js/controllers/radio.js"></script>
		<script src="js/controllers/feedback.js"></script>';
$replaceStr1 = '<script src="js/factory/radio.js"></script>
		<script src="js/factory/feedback.js"></script>';
$replaceStr2 = '<link href="css/ionic.app.min.css" rel="stylesheet">
		<link href="css/feedback.css" rel="stylesheet">';
$replaceStr3 = '<script src="js/constants/cache-events.js"></script>
		<script src="js/constants/feedback-config.js"></script>';
$replaceStr4 = '<script src="js/directives/sb-a-click.js"></script>
		<script src="js/directives/sb-feedback-rating.js"></script>';
if (strpos($str, "feedback") !== false) {
} else {
	$str = str_replace($oldStr, $replaceStr, $str);
	$str = str_replace($oldStr1, $replaceStr1, $str);
	$str = str_replace($oldStr2, $replaceStr2, $str);
	$str = str_replace($oldStr3, $replaceStr3, $str);
	$str = str_replace($oldStr4, $replaceStr4, $str);
	file_put_contents($indexHtml, $str);
}

$indexHtml1 = Core_Model_Directory::getBasePathTo("/var/apps/ionic/ios/www/index.html");
$str1 = file_get_contents($indexHtml1);
if (strpos($str1, "feedback") !== false) {
} else {
	$str1 = str_replace($oldStr, $replaceStr, $str1);
	$str1 = str_replace($oldStr1, $replaceStr1, $str1);
	$str1 = str_replace($oldStr2, $replaceStr2, $str1);
	$str1 = str_replace($oldStr3, $replaceStr3, $str1);
	$str1 = str_replace($oldStr4, $replaceStr4, $str1);
	file_put_contents($indexHtml1, $str1);
}

$indexHtml2 = Core_Model_Directory::getBasePathTo("/var/apps/ionic/android/assets/www/index.html");
$str2 = file_get_contents($indexHtml2);
if (strpos($str2, "feedback") !== false) {
} else {
	$str2 = str_replace($oldStr, $replaceStr, $str2);
	$str2 = str_replace($oldStr1, $replaceStr1, $str2);
	$str2 = str_replace($oldStr2, $replaceStr2, $str2);
	$str2 = str_replace($oldStr3, $replaceStr3, $str2);
	$str2 = str_replace($oldStr4, $replaceStr4, $str2);
	file_put_contents($indexHtml2, $str2);
}

$indexHtml3 = Core_Model_Directory::getBasePathTo("/var/apps/ionic/ios-noads/www/index.html");
$str3 = file_get_contents($indexHtml3);
if (strpos($str3, "feedback") !== false) {
} else {
	$str3 = str_replace($oldStr, $replaceStr, $str3);
	$str3 = str_replace($oldStr1, $replaceStr1, $str3);
	$str3 = str_replace($oldStr2, $replaceStr2, $str3);
	$str3 = str_replace($oldStr3, $replaceStr3, $str3);
	$str3 = str_replace($oldStr4, $replaceStr4, $str3);
	file_put_contents($indexHtml3, $str3);
}