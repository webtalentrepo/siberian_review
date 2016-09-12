<?php

class Feedback_Bootstrap
{
	
	public static function init($bootstrap)
	{
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
				
	}
}