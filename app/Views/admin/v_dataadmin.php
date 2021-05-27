<?= $this->extend('_layout/admin_temp') ?>

<?= $this->section('content') ?>
<!-- Main Sidebar Container -->
  <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Username</label> <span id="error_username" class="text-danger ms-3"></span>
                    <input type="text" class="form-control username" placeholder="Masukan Username">
                    <small class="text-muted">
                        Username minimal terdiri dari 3 huruf ataupun angka
                    </small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary ajaxadd-save">Save</button>
            </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Admin</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <input type="hidden" class="e_id">
            <div class="form-group">
                    <label>Username</label> <span id="error_username" class="text-danger ms-3"></span>
                    <input type="text" class="form-control e_username" placeholder="Masukan Username">
                    <small class="text-muted">
                        Username minimal terdiri dari 3 huruf ataupun angka
                    </small>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary ajaxedit-save">Save</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Admin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin')?>">Dasboard</a></li>
              <li class="breadcrumb-item active">Data Admin</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card card-primary">
              <div class="card-header">
                <form class="form-inline ml-3 float-right">
                  <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar cari" type="search" placeholder="Cari Lewat Nama" aria-label="Search">
                    <div class="input-group-append">
                      <button class="btn btn-tool cari_submit" type="button">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </form>
                <div class="card-tool float-right">
                <button class="btn btn-tool refresh" type="button">
                        <i class="fas fa-sync-alt"></i>
                      </button>
                <button href="#" type="button" class="btn btn-tool" data-toggle="modal" data-target="#addModal">
                    <i class="fas fa-plus-square"></i> Tambah </button>
                </div>
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr class=>
                      <th class="col-3">Username</th>
                      <th class="col-2">Status</th>
                      <th class="col-2">Aksi</th>
                    </tr>
                  </thead>
                  <tbody class="dataAdmin"></tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- jQuery -->
<script src="<?php echo base_url('plugins/jquery/jquery.min.js')?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('dist/js/adminlte.min.js')?>"></script>
<!-- Sweet Alert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

$(document).ready(function (){
  loaddata();

  $(document).on('click', '.refresh', function(){
      $('.dataAdmin').html("");
      loaddata();
  })

  $('.cari').keyup(function () {
    var key = $('.cari').val();
    //console.log(key);
        caridata(key);
   });

   $(document).on('click','.edit_btn', function(){

    var admin_id = $(this).closest('td').find('.id_data').val();
    console.log(admin_id);

    $.ajax({
        method:"POST",
        url:"/admin/view",
        data: {
          'id' : admin_id,
        },
        success:function (response){
          //console.log(response.admin);
          $.each(response.admin, function(key, val){

            $('#editModal').modal('show');
            $('.e_id').val(val['id']);
            $('.e_username').val(val['username']);
          });
        }
      });
    });

   $(document).on('click','.ajaxedit-save', function(){
    if($.trim($('.e_username').val()).length == 0){
        error_username = 'Username masih Kosong';
        $('#e_error_ndin').text(error_username);
      }else if($.trim($('.e_username').val()).length < 3){
        error_username = 'Panjang Username minimal 3';
        $('#e_error_username').text(error_username);
      }else{
        error_username = '';
        $('#e_error_username').text(error_username);
      }

      if(error_username !=''){
        return false;
      }else{
        var data ={
          'id':$('.e_id').val(),
          'username' : $('.e_username').val(),
        };

        //console.log(data);

        $.ajax({
          method:"POST",
          url:"/admin/edit",
          data:data,
          success:function (response){
            Swal.fire({
              icon: 'success',
              title: 'Success',
              text: 'Data berhasil diubah!'
            })
            $('#editModal').modal('hide');

            $('.dataAdmin').html("");
            loaddata();
        }
        });
      }
  });

  $(document).on('click','.delete_btn', function(){

  var admin_id = $(this).closest('td').find('.id_data').val();
    console.log(admin_id);
  Swal.fire({
    title: 'Apa anda yakin ingin menhapus ini?',
    showDenyButton: true,
    confirmButtonText: `Ya`,
    denyButtonText: `Tidak`,
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        method:"POST",
        url:"/admin/delete",
        data: {
          'id' : admin_id,
        },
        success:function (response){
          Swal.fire('Data berhasil dihapus!!', '', 'success')
          $('.dataAdmin').html("");
          loaddata();
        }
      });
    } else if (result.isDenied) {
      Swal.fire('Data tetap disimpan', '', 'info')
    }
  })
  });
});

function caridata(key){

    $.ajax({
        method:"POST",
        url:"/admin/search",
        data: {
            'key' : key,
        },
        success:function (response){
            //console.log(response.admin);
            $('.dataAdmin').html("");

            $.each(response.admin, function(key,value){
                //console.log(value['id_admin']);
                var status = '';
                if(value['status'] == 1){
                status = '<span class="badge bg-danger"><i class="fab fa-creative-commons-by"></i> Belum Aktif</span>';
                }else{
                status = '<span class="badge bg-success"><i class="fab fa-creative-commons-by"></i> Aktif</span>';
                }
                $('.dataAdmin').append(
                '<tr>\
                    <td class="col-3">'+value['username']+'</td>\
                    <td class="col-2">'+status+'</td>\
                    <td class="col-2">\
                    <input type="hidden" class="id_data" value="'+value['id_admin']+'">\
                    <a href="#" class="badge btn-primary edit_btn"> Edit</a>\
                    <a href="#" class="badge btn-danger delete_btn"> Delete</a>\
                    </td>\
                </tr>'
                );
            });
        }
    });
}

function loaddata(){
  $.ajax({
    method: "GET",
    url: "/admin/get",
    success:function(response){
      //console.log(response.admin);
      $.each(response.admin, function(key,value){
        //console.log(value['id']);
        var status = '';
        if(value['status'] == 1){
          status = '<a class="badge bg-danger"><i class="fab fa-creative-commons-by"></i> Belum Aktif</a>';
        }else{
          status = '<a class="badge bg-success"><i class="fab fa-creative-commons-by"></i> Aktif</a>';
        }
        $('.dataAdmin').append(
          '<tr>\
            <td class="col-3">'+value['username']+'</td>\
            <td class="col-2">'+status+'</td>\
            <td class="col-2">\
              <input type="hidden" class="id_data" value="'+value['id']+'">\
              <a href="#" class="badge btn-primary edit_btn"> Edit</a>\
              <a href="#" class="badge btn-danger delete_btn"> Delete</a>\
            </td>\
          </tr>'
        );
      });
    }
  })
}

</script>



<script>
  $(document).ready(function () {

    $(document).on('click','.ajaxadd-save', function () {
      if($.trim($('.username').val()).length == 0){
        error_username = 'Username masih Kosong';
        $('#error_username').text(error_username);
      }else if($.trim($('.username').val()).length < 3){
        error_username = 'Panjang Username minimal 3';
        $('#error_username').text(error_username);
      }else{
        error_username = '';
        $('#error_username').text(error_username);
      }

      if(error_username !=''){
        return false;
      }else{
        var data ={
          'username' : $('.username').val(),
        };
       $.ajax({
         method: "POST",
         url: "/admin/add",
         data: data,
         success:function(response){
          $('#addModal').modal('hide');
          $('#addModal').find('input').val('');
          $('.dataAdmin').html("");
          loaddata();

          Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Data berhasil dimasukan!'
          })
         }
       });
      }
    });
  });
</script>

<?= $this->endSection() ?>