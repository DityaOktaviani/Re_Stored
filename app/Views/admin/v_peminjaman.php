<?= $this->extend('_layout/admin_temp') ?>

<?= $this->section('content') ?>
<!-- Main Sidebar Container -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Log Peminjaman</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin')?>">Dasboard</a></li>
              <li class="breadcrumb-item active">Log Peminjaman</li>
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
                </div>
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="col-2">Judul Buku</th>
                      <th class="col-2">Peminjam</th>
                      <th class="col-2">username</th>
                      <th class="col-2">Timestamp</th>
                    </tr>
                  </thead>
                  <tbody class="log"></tbody>
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
      $('.log').html("");
      loaddata();
  })

  $('.cari').keyup(function () {
    var key = $('.cari').val();
    //console.log(key);
        caridata(key);
   });

});

function caridata(key){

    $.ajax({
        method:"POST",
        url:"/peminjaman/log_search",
        data: {
            'key' : key,
        },
        success:function (response){
            //console.log(response);
            $('.log').html("");

            $.each(response, function(key,value){
                //console.log(value['id_admin']);
                $('.log').append(
                  '<tr>\
                      <td class="col-2">'+value['buku']+'</td>\
                      <td class="col-2">'+value['peminjam']+'</td>\
                      <td class="col-2">'+value['username']+'</td>\
                      <td class="col-2">'+value['timestamp']+'</td>\
                  </tr>'
                  );
            });
        }
    });
}

function loaddata(){
  $.ajax({
    method: "GET",
    url: "/peminjaman/log",
    success:function(response){
      //console.log(response);
      $.each(response, function(key,value){
        //console.log(value);
        $('.log').append(
          '<tr>\
              <td class="col-2">'+value['buku']+'</td>\
              <td class="col-2">'+value['peminjam']+'</td>\
              <td class="col-2">'+value['username']+'</td>\
              <td class="col-2">'+value['timestamp']+'</td>\
          </tr>'
          );
      });
    }
  })
}

</script>
<?= $this->endSection() ?>