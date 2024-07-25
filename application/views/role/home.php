      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">

            <!-- /.card -->
            <div class="card">

              <!-- /.card-header -->
              <div class="card-header">
                <div class="row">
                  <div class="col-md-4">
                    <button class=" form-control btn btn-success" onclick="add_role()"><i class="fa fa-plus fa-sm"></i> Tambah Data</button>
                  </div>
                  <div class="col-md-3">
                    <a href="<?php echo base_url('role/export'); ?>" class="form-control btn btn-default"><i class="fa fa-file-excel fa-sm"></i> Export Data Excel</a>
                  </div>
                  <div class="col-md-3">
                    <a href="<?php echo base_url('role/export'); ?>" class="form-control btn btn-default"><i class="fa fa-file-excel fa-sm"></i> Import Data Excel</a>
                  </div>
                  <div class="col-md-2">
                    <button class="form-control btn btn-default" data-toggle="modal" data-target="#import-role"><i class="fa fa-file-pdf fa-sm"></i> Cetak PDF</button>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->

              <!-- /.card-body -->
              <div class="card-body">

                <table id="table" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th style="width:30px;">No</th>
                      <th>ID Role</th>
                      <th>Nama Role</th>
                      <th style="width:170px;">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>ID Role</th>
                      <th>Nama role</th>
                      <th style="width:170px;">Action</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
            <!-- /.card-body -->

          </div>
        </div>
      </div>



      <!-- /.js -->
      <script type="text/javascript">
        var save_method; //for save method string
        var table;

        $(document).ready(function() {

          //datatables
          //datatables
          table = $('#table').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
              "url": "<?php echo site_url('role/ajax_list') ?>",
              "type": "POST"
            },

            // //Set column definition initialisation properties.
            // "columnDefs": [{
            //   "targets": [0, 3], //last column
            //   "orderable": true, //set not orderable
            // }, ],

          });
        });

        function add_role() {
          save_method = 'add';
          $('#form')[0].reset(); // reset form on modals
          $('.form-group').removeClass('has-error'); // clear error class
          $('.help-block').empty(); // clear error string
          $('#modal_form').modal('show'); // show bootstrap modal
          $('.modal-title').text('Add role'); // Set Title to Bootstrap modal title
        }

        function edit_role(id) {
          save_method = 'update';
          $('#form')[0].reset(); // reset form on modals
          $('.form-group').removeClass('has-error'); // clear error class
          $('.help-block').empty(); // clear error string

          //Ajax Load data from ajax
          $.ajax({
            url: "<?php echo site_url('role/ajax_edit/') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
              $('[name="id_role"]').val(data.id_role);
              $('[name="nama_role"]').val(data.nama_role);
              $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
              $('.modal-title').text('Edit role'); // Set title to Bootstrap modal title
            },
            error: function(jqXHR, textStatus, errorThrown) {
              alert('Error get data from ajax');
            }
          });
        }

        function reload_table() {
          table.ajax.reload(null, false); //reload datatable ajax 
        }

        function save() {
          $('#btnSave').text('saving...'); //change button text
          $('#btnSave').attr('disabled', true); //set button disable 
          var url;

          if (save_method == 'add') {
            url = "<?php echo site_url('role/ajax_add') ?>";
          } else {
            url = "<?php echo site_url('role/ajax_update') ?>";
          }

          // ajax adding data to database
          $.ajax({
            url: url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data) {

              if (data.status) //if success close modal and reload ajax table
              {
                $('#modal_form').modal('hide');
                alert('Data berhasil disimpan');
                reload_table();
              } else {
                for (var i = 0; i < data.inputerror.length; i++) {
                  $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                  $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
              }
              $('#btnSave').text('save'); //change button text
              $('#btnSave').attr('disabled', false); //set button enable 


            },
            error: function(jqXHR, textStatus, errorThrown) {
              alert('Error adding / update data');
              $('#btnSave').text('save'); //change button text
              $('#btnSave').attr('disabled', false); //set button enable 

            }
          });
        }

        function delete_role(id) {
          if (confirm('Are you sure delete this data?')) {
            // ajax delete data to database
            $.ajax({
              url: "<?php echo site_url('role/ajax_delete') ?>/" + id,
              type: "POST",
              dataType: "JSON",
              success: function(data) {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                alert('Data berhasil dihapus');
                reload_table();
              },
              error: function(jqXHR, textStatus, errorThrown) {
                alert('Error deleting data');
              }
            });

          }
        }
      </script>

      <?php include("modules/modal.php")  ?>