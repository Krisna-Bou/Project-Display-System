<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="/Project-Display/assets/css/style.css?<?php echo time(); ?>">
    <script src=/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
</head>

<nav class="logo-header">
    <div class="logo-title">
        <a href="https://www.uq.edu.au/"><img class="logo" src="/Project-Display/writable/uploads/UQ-Logo.png"></a>
        <a href="/Project-Display/public"><h1>DECO3801 Projects</h1>
    </div>

    <div>
        <?php if (session()->get('username')) { ?>
            <a class="mx-4" href="<?php echo base_url(); ?>login/logout"> Logout </a>
            <a class="mx-4" href="<?php echo base_url(); ?>account"> Account </a>
            <a class="mx-4" href="<?php echo base_url(); ?>submit"> Create Post </a>
        <?php } else { ?>
            <a class="mx-4" href="<?php echo base_url(); ?>login"> Login </a>
            <a class="mx-4" href="<?php echo base_url(); ?>register"> Register </a> 
        <?php } ?>
    </div>
</nav>
<body>

