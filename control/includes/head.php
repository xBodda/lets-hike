<?php
include('../classes/Login.php');
include_once("../classes/DB.php");
if (Login::isLoggedIn())
{
  $userid = Login::isLoggedIn();
  $user = DB::query('SELECT * FROM users WHERE id=:id',array(':id'=> $userid));
  $fullname = $user[0]['fullname'];
  $total_messages = DB::query('SELECT COUNT(id) AS cnt FROM tickets_messages WHERE user_id!=:user_id',array(':user_id'=>$userid))[0]['cnt'];
  $type = $user[0]['type'];
  if($type == 1){
    header('Location:../');
    exit;
  }
}else{
    header('Location:../signin.php');
    exit;
}
// $date = date('Y-m-d H:i:s');

$total_users = DB::query('SELECT COUNT(id) AS cnt FROM users WHERE type=1')[0]['cnt'];

$total_complaints = DB::query('SELECT COUNT(id) AS cnt FROM contact')[0]['cnt'];

$total_admins = DB::query('SELECT COUNT(id) AS cnt FROM users WHERE type>1')[0]['cnt'];

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
