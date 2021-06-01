<?= $this->extend('_layout/tu_temp') ?>

<?= $this->section('content') ?>

<!-- Main Sidebar Container -->
  <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Mahasiwa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>NIM</label> <span id="error_nim" class="text-danger ms-3"></span>
                    <input type="text" class="form-control nim" placeholder="Masukan NIM">
                    <small class="text-muted">
                        NIM harus berbentuk angka
                    </small>
                </div>
                <div class="form-group">
                    <label>Nama</label> <span id="error_nama" class="text-danger ms-3"></span>
                    <input type="text" class="form-control nama" placeholder="Masukan Nama">
                    <small class="text-muted">
                        Nama lengkap sesuai data diri Mahasiswa
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
          <h5 class="modal-title" id="editModalLabel">Edit Mahasiwa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <input type="hidden" class="e_id">
            <div class="form-group">
                <label>NIM</label> <span id="e_error_nim" class="text-danger ms-3"></span>
                <input type="text" class="form-control e_nim" placeholder="Masukan NIM" readonly>
                <small class="text-muted">
                  NIM harus berbentuk angka
                </small>
            </div>
            <div class="form-group">
                <label>Nama</label> <span id="e_error_nama" class="text-danger ms-3"></span>
                <input type="text" class="form-control e_nama" placeholder="Masukan Nama">
                <small class="text-muted">
                  Nama lengkap sesuai data diri Mahasiswa
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
            <h1>Data Mahasiswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin')?>">Dasboard</a></li>
              <li class="breadcrumb-item active">Data Mahasiswa</li>
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
                      <th class="col-3">NIM</th>
                      <th class="col-4">Nama</th>
                      <th class="col-2">Status</th>
                      <th class="col-2">Aksi</th>
                    </tr>
                  </thead>
                  <tbody class="datamhs"></tbody>
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
      $('.datamhs').html("");
      loaddata();
  })

  $('.cari').keyup(function () {
    var key = $('.cari').val();
    //console.log(key);
        caridata(key);
   });

  $(document).on('click','.edit_btn', function(){

    var anggota_id = $(this).closest('td').find('.id_data').val();
    //alert(anggota_id);

    $.ajax({
      method:"POST",
      url:"/mhs/view",
      data: {
        'id' : anggota_id,
      },
      success:function (response){
        //console.log(response.anggota);
        $.each(response.anggota, function(key, val){
          $('#editModal').modal('show');
          $('.e_id').val(val['id']);
          $('.e_nim').val(val['username']);
          $('.e_nama').val(val['nama']);
        });
      }
    });
  });

  $(document).on('click','.ajaxedit-save', function(){
    if($.trim($('.e_nim').val()).length == 0){
        error_nim = 'NIM masih Kosong';
        $('#e_error_nim').text(error_nim);
      }else if($.trim($('.e_nim').val()).length < 6){
        error_nim = 'Panjang NIM minimal 6';
        $('#e_error_nim').text(error_nim);
      }else{
        error_nim = '';
        $('#e_error_nim').text(error_nim);
      }

      if($.trim($('.e_nama').val()).length == 0){
        error_nama = 'Nama masih Kosong';
        $('#e_error_nama').text(error_nama);
      }else{
        error_nama = '';
        $('#e_error_nama').text(error_nama);
      }

      if(error_nim !='' || error_nama != ''){
        return false;
      }else{
        var data ={
          'id':$('.e_id').val(),
          'nama': $('.e_nama').val(),
          'username' : $('.e_nim').val(),
        };

        $.ajax({
          method:"POST",
          url:"/mhs/edit",
          data:data,
          success:function (response){
            Swal.fire({
              icon: 'success',
              title: 'Success',
              text: 'Data berhasil diubah!'
            })
            $('#editModal').modal('hide');

            $('.datamhs').html("");
            loaddata();
        }
        });
      }
  });

  $(document).on('click','.delete_btn', function(){

  var anggota_id = $(this).closest('td').find('.id_data').val();
  //alert(anggota_id);

  Swal.fire({
    title: 'Apa anda yakin ingin menhapus ini?',
    showDenyButton: true,
    showCancelButton: true,
    confirmButtonText: `Ya`,
    denyButtonText: `Tidak`,
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      $.ajax({
        method:"POST",
        url:"/mhs/delete",
        data: {
          'id' : anggota_id,
        },
        success:function (response){
          //console.log(response.anggota);
          Swal.fire('Data berhasil dihapus!!', '', 'success')
          $('.datamhs').html("");
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
        url:"/mhs/search",
        data: {
            'key' : key,
        },
        success:function (response){
            //console.log(response.anggota);
            $('.datamhs').html("");

            $.each(response.anggota, function(key,value){
                //console.log(value['id_Anggota']);
                var status = '';
                if(value['status'] == 1){
                status = '<span class="badge bg-danger"><i class="fab fa-creative-commons-by"></i> Belum Aktif</span>';
                }else{
                status = '<span class="badge bg-success"><i class="fab fa-creative-commons-by"></i> Aktif</span>';
                }
                $('.datamhs').append(
                '<tr>\
                    <td class="col-3">'+value['username']+'</td>\
                    <td class="col-4">'+value['nama']+'</td>\
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
    });
}

function loaddata(){
  $.ajax({
    method: "GET",
    url: "/mhs/get",
    success:function(response){
      //console.log(response.anggota);
      $.each(response.anggota, function(key,value){
        //console.log(value['id_Anggota']);
        var status = '';
        if(value['status'] == 1){
          status = '<a class="badge bg-danger"><i class="fab fa-creative-commons-by"></i> Belum Aktif</a>';
        }else{
          status = '<a class="badge bg-success"><i class="fab fa-creative-commons-by"></i> Aktif</a>';
        }
        $('.datamhs').append(
          '<tr>\
            <td class="col-3">'+value['username']+'</td>\
            <td class="col-4">'+value['nama']+'</td>\
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

    $(".nim").keypress(function (e) {
        //if the letter is not digit then display error and don't type anything
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            //display error message
            return false;
        }
   });

    $(document).on('click','.ajaxadd-save', function () {
      var username = $('.nim').val();
      
      $.ajax({
        method:"POST",
        url:"/mhs/check",
        data: {
          'username' : username,
        },
        success:function (response){
          if(response.status == 1){
            error_nim = 'NIM sudah dipakai';
            $('#error_nim').text(error_nim);
          }
        }
      })

      if($.trim($('.nim').val()).length == 0){
        error_nim = 'NIM masih Kosong';
        $('#error_nim').text(error_nim);
      }else if($.trim($('.nim').val()).length < 6){
        error_nim = 'Panjang NIM minimal 6';
        $('#error_nim').text(error_nim);
      }else{
        error_nim = '';
        $('#error_nim').text(error_nim);
      }

      if($.trim($('.nama').val()).length == 0){
        error_nama = 'Nama masih Kosong';
        $('#error_nama').text(error_nama);
      }else{
        error_nama = '';
        $('#error_nama').text(error_nama);
      }

      if(error_nim !='' || error_nama != ''){
        return false;
      }else{
        var data ={
          'nama': $('.nama').val(),
          'username' : $('.nim').val(),
          'type_anggota' : '2'
        };
       $.ajax({
         method: "POST",
         url: "/mhs/add",
         data: data,
         success:function(response){
          $('#addModal').modal('hide');
          $('#addModal').find('input').val('');
          $('.datamhs').html("");
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