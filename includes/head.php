<?php
date_default_timezone_set('Africa/Cairo');

include('./classes/Login.php');
include_once("./classes/DB.php");
if (Login::isLoggedIn())
{
  $userid = Login::isLoggedIn();
  $image = DB::query('SELECT image FROM users WHERE id=:id',array(':id'=>$userid))[0]['image'];
  $fullname = DB::query('SELECT fullname FROM users WHERE id=:id',array(':id'=>$userid))[0]['fullname'];
  $total_cart = DB::query('SELECT COUNT(id) AS cnt FROM cart WHERE user_id=:user_id',array(':user_id'=>$userid))[0]['cnt'];
}
else
{
  $total_cart = 0;
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

function CalculateRating($hikeid)
{
  $rating = DB::query('SELECT stars FROM reviews WHERE hike_id=:hike_id',array(':hike_id'=>$hikeid));
  $total_ratings = DB::query('SELECT COUNT(id) AS cnt FROM reviews WHERE hike_id=:hike_id',array(':hike_id'=>$hikeid))[0]['cnt'];
  $ratingValue = 0;
  $fratingValue = 0;
  if(!$rating)
  {
    $ratingValue = 0;
  }
  else
  {
    foreach($rating as $rate)
    {
      $fratingValue += $rate['stars'];
      $ratingValue = $fratingValue / $total_ratings;
    }
  }

  return round($ratingValue);
}

?>
