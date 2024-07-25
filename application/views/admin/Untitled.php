      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="prodi-table" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>ID Prodi</th>
                      <th>Nama Prodi</th>
                      <th>Ketua Prodi</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                  <tfoot>
                    <tr>
                      <th>ID Prodi</th>
                      <th>Nama Prodi</th>
                      <th>Ketua Prodi</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->

      <script>
        var save_method; //for save method string
        var table;

        $(document).ready(function() {
          table = $("#prodi-table").DataTable({
            dom: 'Blfrtip',

            //pagination & record shown option 
            "paging": true,
            "lengthChange": false,
            "lengthMenu": [10, 25, 50, 75, 100],

            //sorting field tabel berdasarkan id prodi
            "order": [
              [0, "asc"]
            ],

            "searching": true,
            "autoWidth": true,
            "info": true,

            //"scrollY": 200, //scroll inside table for faster data searching
            "deferRender": true,

            "processing": true,
            "serverSide": true,

            "ajax": {
              "url": "<?php echo site_url("Prodi/prodi_list") ?>",
              "type": "POST"
            },

            buttons: [{
                extend: 'excelHtml5',
                text: '<i class="fas fa-plus fa-sm"></i> Tambah',
                titleAttr: 'Tambah'
              },
              {
                extend: 'copyHtml5',
                text: '<i class="fas fa-copy fa-sm"></i> Copy',
                titleAttr: 'Copy'
              },
              {
                extend: 'excelHtml5',
                text: '<i class="fas fa-file-excel fa-sm"></i> Excel',
                titleAttr: 'Excel'
              },
              {
                extend: 'csvHtml5',
                text: '<i class="fas fa-file-csv fa-sm"></i> CSV',
                titleAttr: 'CSV'
              },
              {
                extend: 'pdfHtml5',
                text: '<i class="fas fa-file-pdf fa-sm"></i> PDF',
                titleAttr: 'PDF'
              },
              {
                extend: 'print',
                text: '<i class="fas fa-print fa-sm"></i> Print',
                titleAttr: 'Print'
              },
              {
                extend: 'colvis',
                text: 'Kolom',
                titleAttr: 'colvis'
              }, 'pageLength',
            ]
          });
          table.buttons().container().appendTo($('#searchbar'));
        });

        function reload_table() {
          table.ajax.reload(null, false); //reload datatable ajax 
        }

        function add_prodi() {
          save_method = 'add';
          $('#form')[0].reset(); // reset form on modals
          $('.form-group').removeClass('has-error'); // clear error class
          $('.help-block').empty(); // clear error string
          $('#modal_form').modal('show'); // show bootstrap modal
          $('.modal-title').text('Tambah Prodi'); // Set Title to Bootstrap modal title
        }

        function edit_prodi(idProdi) {
          save_method = 'update';
          $('#form')[0].reset(); // reset form on modals
          $('.form-group').removeClass('has-error'); // clear error class
          $('.help-block').empty(); // clear error string

          //Ajax Load data from ajax
          $.ajax({
            url: "<?php echo site_url('prodi/ajax_edit/') ?>" + idProdi,
            type: "GET",
            dataType: "JSON",
            success: function(data) {

              $('[name="idProdi"]').val(data.idProdi);
              $('[name="nmProdi"]').val(data.nmProdi);
              $('[name="kaProdi"]').val(data.kaProdi);
              $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
              $('.modal-title').text('Edit Prodi'); // Set title to Bootstrap modal title

            },
            error: function(jqXHR, textStatus, errorThrown) {
              alert('Error get data from ajax');
            }
          });
        }

        function save() {
          $('#btnSave').text('saving...'); //change button text
          $('#btnSave').attr('disabled', true); //set button disable 
          var url;

          if (save_method == 'add') {
            url = "<?php echo site_url('Prodi/ajax_add') ?>";
          } else {
            url = "<?php echo site_url('Prodi/ajax_update') ?>";
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
                reload_table();
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

        function delete_prodi(idProdi) {
          if (confirm('Are you sure delete this data?')) {
            // ajax delete data to database
            $.ajax({
              url: "<?php echo site_url('prodi/ajax_delete') ?>/" + idProdi,
              type: "POST",
              dataType: "JSON",
              success: function(data) {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
              },
              error: function(jqXHR, textStatus, errorThrown) {
                alert('Error deleting data');
              }
            });

          }
        }
      </script>

      <!-- Bootstrap modal -->
      <div class="modal fade" id="modal_form" role="dialog">
        <div class="modal-dialog modal-md">
          <div class="modal-content">

            <div class="modal-header">
              <h3 class="modal-title">Form Prodi</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body form">
              <form action="#" id="form" class="form-horizontal">
                <input type="hidden" value="" name="idProdi" />
                <div class="form-body">
                  <div class="form-group">
                    <label class="control-label col-md-3">Nama Prodi</label>
                    <div class="col-md-9">
                      <input name="nmProdi" placeholder="Nama Prodi" class="form-control" type="text">
                      <span class="help-block"></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Ketua Prodi</label>
                    <div class="col-md-9">
                      <input name="kaProdi" placeholder="Ketua Prodi" class="form-control" type="text">
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>
              </form>
            </div>

            <div class="modal-footer">
              <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>

          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
      <!-- End Bootstrap modal -->