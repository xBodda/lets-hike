<?php
include('./classes/Login.php');
include_once("./classes/DB.php");
if (Login::isLoggedIn())
{
  $userid = Login::isLoggedIn();
}

function truncate($text, $length) 
{
  $length = abs((int)$length);
  if(strlen($text) > $length) {
     $text = preg_replace("/^(.{1,$length})(\s.*|$)/s", '\\1...', $text);
  }
  return($text);
}

function timeago($date) {
  $timestamp = strtotime($date);	
  
  $strTime = array("second", "minute", "hour", "day", "month", "year");
  $length = array("60","60","24","30","12","10");

  $currentTime = time();
  if($currentTime >= $timestamp) {
   $diff     = time()- $timestamp;
   for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
   $diff = $diff / $length[$i];
   }

   $diff = round($diff);
   return $diff . " " . $strTime[$i] . "(s) ago ";
  }
}

?>
