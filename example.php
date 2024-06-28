<?php
$location = realpath(dirname(__FILE__));
require_once $location . '/function.php';
$currentPermutation = array('c', 'c', 'c');
$validCharacters = array('a','b','c');
$n = 1;
$return = NULL;
while ($n < 1000 AND $return !== FALSE){
	$n++;
	$return = previousPermutation($currentPermutation, $validCharacters);
	var_dump($return);
	$currentPermutation = $return;
}