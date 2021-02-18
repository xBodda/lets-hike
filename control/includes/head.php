<?php
include('./classes/Login.php');
include_once("./classes/DB.php");
if (Login::isLoggedIn())
{
  $userid = Login::isLoggedIn();
  $fullname = DB::query('SELECT name FROM admins WHERE id=:id', array(':id'=>$userid))[0]['name'];
  $total_messages = DB::query('SELECT COUNT(id) AS cnt FROM messages WHERE _to=:_to',array(':_to'=>$userid))[0]['cnt'];
}
else
{
    $fullname = "Admin";
}
// $date = date('Y-m-d H:i:s');

// $total_users = DB::query('SELECT COUNT(id) AS cnt FROM users')[0]['cnt'];

// $total_complaints = DB::query('SELECT COUNT(id) AS cnt FROM contact')[0]['cnt'];

$total_admins = DB::query('SELECT COUNT(id) AS cnt FROM admins')[0]['cnt'];

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

$level[1] = true;

?>
