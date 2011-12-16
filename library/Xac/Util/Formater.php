<?php
class Xac_Util_Formater {

	public static function printr($data, $exit = TRUE) {
		if ($data) {
			print '<pre>';
			print_r($data);
			print '</pre>';
		}
		if ($exit) {
			exit;
		}
	}

}