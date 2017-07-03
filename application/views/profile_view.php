<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>My Profile | </title>
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
        $("#generate").click(function(){
            var link=$("#link").val();

            $.post("/link/index",
                {
                    link: link
                },
                function(data, status){
                $("#generated").html(data);
                    alert("Data: " + data + "\nStatus: " + status);

                });
        });
        });
    </script>
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
			<a class="navbar-brand" href="<?php echo base_url(); ?>home">TRAINING CI</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
				<?php if ($this->session->userdata('login')){ ?>
				<li><p class="navbar-text">Hello <?php echo $this->session->userdata('uname'); ?></p></li>
                    <li><a href="<?php echo base_url(); ?>profile/index">Add New Link</a></li>
                    <li><a href="<?php echo base_url(); ?>datatable">View Added Links</a></li>
                    <li><a href="<?php echo base_url(); ?>home/logout">Log Out</a></li>				<?php } else { ?>
				<li><a href="<?php echo base_url(); ?>login">Login</a></li>
				<li><a href="<?php echo base_url(); ?>signup">Signup</a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<h4>Profile Summary</h4>
			<hr/>
			<p>Name: <?php echo $uname; ?></p>
			<p>Email: <?php echo $uemail; ?></p>
			<p>...</p>
		</div>
		<div class="col-md-8">

            <form class="form-inline">
                <div class="form-group">
                    <label for="link">Link address:</label>
                    <input type="link" class="form-control" id="link">
                </div>
                <a id="generate"  name="generate" class="btn btn-default">Generate</a>

                <div style="display: table">
                    <div id="generated"
                            style="display: table-cell; text-align:center; vertical-align: middle; height: 200px;"
                            ">
                        Result will appear here
                    </div>
                </div>

            </form>

		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-1.10.2.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
</body>
</html>