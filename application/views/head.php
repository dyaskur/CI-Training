<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training CI SoftwareSeni</title>
    <!--link the bootstrap css file-->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/jquery.dataTables.min.css"); ?>">
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url(); ?>home">TRAINING SOFTWARESENI</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar1">
            <ul class="nav navbar-nav navbar-right">
                <?php if ($this->session->userdata('login')){ ?>
                    <li><p class="navbar-text">Hello <?php echo $this->session->userdata('uname'); ?></p></li>
                    <li><a href="<?php echo base_url(); ?>profile/index">Add New Link</a></li>
                    <li><a href="<?php echo base_url(); ?>datatable">View Added Links</a></li>
                    <li><a href="<?php echo base_url(); ?>home/logout">Log Out</a></li>
                <?php } else { ?>
                    <li><a href="<?php echo base_url(); ?>login">Login</a></li>
                    <li><a href="<?php echo base_url(); ?>signup">Signup</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>