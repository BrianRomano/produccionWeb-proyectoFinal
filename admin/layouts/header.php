<?php
    session_start();

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include_once('./../helpers/conecction.php'); 
    include_once('./../helpers/redirect.php'); 
    include_once('./../logic/LoginBusiness.php');
    
    $loginB = new LoginBusiness($con);
    
    if(isset($_POST['login'])){
        if(!$loginB->login($_POST)){
        redirect('login.php?errAth');
        die();
        }
    }
    
    if(isset($_GET['logout'])){
        $loginB->logout();
    }
    
    if (!$loginB->isLoged()){
        redirect('login.php');
        die();
    }
?>

<!Doctype html>
<html lang="es">
<head>
    <title>Panel de administración</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!--    Fuente e iconos    -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS -->
    <link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
</head>
