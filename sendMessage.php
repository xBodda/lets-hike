<?php
include('includes/head.php');

if (Login::isLoggedIn()) 
{
    if(isset($_GET['msg']) && isset($_GET['id']))
    {
        $message = $_GET['msg'];
        $ticket_id = $_GET['id'];
        $date = date('Y-m-d H:i:s');

        DB::query('INSERT INTO tickets_messages VALUES(\'\',:ticket_id,:message,:user_id,:_date,0)',
        array(':ticket_id'=>$ticket_id,
            ':message'=>$message,
            ':user_id'=>$userid,
            ':_date'=>$date));
    }
}
else 
{
    die('Not Requested');
}
?>