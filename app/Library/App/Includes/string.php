<?php
/**
 * Generate a random string using set characters.
 *
 * @since 1.0
 * @param integer $length 		The length of the string to generate.
 * @param string $characters 	The characters to use in the string.
 * @return string
 */
function generate_string($length = 10, $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') {
	$randomString = '';
	for($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, strlen($characters) - 1)];
	}
	return $randomString;
}

/**
 * Fetch a string from between two substrings.
 *
 * @since 1.0
 * @param string $string 	The string to shorten.
 * @param string $start 	The starting point.
 * @param string $end 		The ending point.
 * @return string
 */
function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}