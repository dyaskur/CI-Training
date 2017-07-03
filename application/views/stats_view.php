<? $this->load->view('head'); ?>

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