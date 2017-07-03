<? $this->load->view('head'); ?>

<div class="container">
	<div class="row">

		<div class="col-md-8">

            <div class="container">
                <h1 style="font-size:20pt">Simple Serverside Datatable Codeigniter</h1>

                <h3>Customers Data</h3>
                <br />

                <table id="table" class="display" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Code</th>
                        <th>URL</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>

                    <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Code</th>
                        <th>URL</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>

            <script src="<?php echo base_url("assets/js/jquery-2.1.4.min.js"); ?>"></script>
            <script src="<?php echo base_url("assets/js/jquery.dataTables.min.js"); ?>"></script>


            <script type="text/javascript">

                var table;

                $(document).ready(function() {

                    //datatables
                    table = $('#table').DataTable({

                        "processing": true, //Feature control the processing indicator.
                        "serverSide": true, //Feature control DataTables' server-side processing mode.
                        "order": [], //Initial no order.

                        // Load data for the table's content from an Ajax source
                        "ajax": {
                            "url": "<?php echo site_url('datatable/ajax_list')?>",
                            "type": "POST"
                        },

                        //Set column definition initialisation properties.
                        "columnDefs": [
                            {
                                "targets": [ 2 ], //first column / numbering column
                                "orderable": false, //set not orderable
                            },
                        ],

                    });

                });
            </script>

		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
</body>
</html>