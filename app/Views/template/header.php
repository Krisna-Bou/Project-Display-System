<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="/Project-Display/assets/css/style.css?<?php echo time(); ?>">
    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
    <link rel="shortcut icon" type="favicon.ico" href="<?php echo base_url(); ?>/assets/favicon.ico?">
</head>

<nav class="logo-header">
    <div class="logo-title">
        <a href="https://www.uq.edu.au/"><img class="logo" src="/Project-Display/writable/uploads/UQ-Logo.png"></a>
        <a href="<?php echo base_url(); ?>"><h1>DECO3801 Projects</h1></a>
    </div>

    <div>
        <?php if (session()->get('token')) { ?>
            <a class="mx-4" href="<?php echo base_url(); ?>login/logout"> Logout </a>
            <a class="mx-4" href="<?php echo base_url(); ?>profile"> Profile </a>
        <?php } else { ?>
            <a class="mx-4" href="<?php echo base_url(); ?>login"> Login </a>
            <a class="mx-4" href="<?php echo base_url(); ?>register"> Register </a> 
        <?php } ?>
    </div>
</nav>
<body>