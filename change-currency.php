<?php
session_start();
if(isset($_GET['currency'])){
    $_SESSION['currency'] = $_GET['currency'];
}
header('Location:./');
?>