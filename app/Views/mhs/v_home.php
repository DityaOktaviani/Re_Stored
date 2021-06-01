<?= $this->extend('_layout/mhs_temp') ?>

<?= $this->section('content') ?>    
  <!-- Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dasboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Dasboard</li>
            </ol>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid dasboard">
        <div class="row justify-content-around">
          <div class="col-5">
            <!-- Default box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Terakhir Dilihat</h3>
              </div>
              <!-- buku yang dipinjam -->
              <div class="card-body">
                <table class="table">
                  <tbody class="dipinjam">
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-4">
            <!-- Default box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Buku Terbaru</h3>
              </div>
              <!-- buku yang dipinjam -->
              <div class="card-body">
                <table class="table">
                  <tbody class="terbaru">
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Buku Favorite</h3>
              </div>
              <!-- buku yang dipinjam -->
              <div class="card-body">
                <table class="table">
                  <tbody class="favorite">
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
              </div>
              <!-- /.card-footer-->
            </div>
          </div>
        </div>
      </div>
      <!--TEMPAT CARI BUKU DI SINI-->
      <div class="container-fluid book">
        <div class="row justify-content-center">
          <div class="col-11">
            <!-- Default box -->
            <div class="card card-primary">
              <div class="card-header">
                <div class="card-tool">
                  <div class="card-tool float-left">
                    <button class="btn btn-tool kembali" style="display:none;">
                      <i class="fas fa-arrow-left"></i> Kembali
                    </button>
                  </div>
                  <div class="card-tool float-right">
                    <button class="btn btn-tool refresh" type="button">
                            <i class="fas fa-sync-alt"></i>
                    </button>
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
                  </div>
                </div>
              </div>
              <div class="card-body">
                <!-- tab -->
                <nav>
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-buku-tab" data-toggle="tab" href="#nav-buku" role="tab" aria-controls="nav-buku" aria-selected="true"hidden></a>
                    <a class="nav-item nav-link" id="nav-lihat-tab" data-toggle="tab" href="#nav-lihat" role="tab" aria-controls="nav-lihat" aria-selected="false" hidden></a>
                    <a class="nav-item nav-link" id="nav-buka-tab" data-toggle="tab" href="#nav-buka" role="tab" aria-controls="nav-buka" aria-selected="false" hidden></a>
                  </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                  <!-- Show Data -->
                  <div class="tab-pane fade show active" id="nav-buku" role="tabpanel" aria-labelledby="nav-buku-tab">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th class="col-4">Judul</th>
                          <th class="col-2">Penulis</th>
                          <th class="col-2">Pemilik</th>
                          <th class="col-2">Aksi</th>
                        </tr>
                      </thead>
                      <tbody class="databuku"></tbody>
                    </table>
                  </div>
                  <!-- Show Data -->
                  <div class="tab-pane fade" id="nav-lihat" role="tabpanel" aria-labelledby="nav-lihat-tab">
                    <div class="row">
                      <div class="col-8">
                        <h4>Detail Buku</h4>
                        <div class="form-group">
                          <label>Judul</label>
                          <p type="text" class="form-control v_judul"></p>
                        </div>
                        <div class="form-group">
                          <label>Abstrak</label>
                          <p class="form-control v_abstrak"></p>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                          <label>Penulis</label>
                          <p class="form-control v_penulis"></p>
                        </div>
                        <div class="form-group">
                          <label>Jenis Buku</label>
                          <p class="form-control v_jenis"></p>
                        </div>
                        <div class="form-group">
                          <label>Tahun Terbit</label>
                          <p class="form-control v_tahun"></p>
                        </div>
                          <input type="hidden" class="form-control v_id_buku">
                          <button class="btn btn-block btn-info btn-lg v_preview">
                            <i class="far fa-eye"></i> Pinjam
                          </button>
                        </div>
                    </div>
                  </div>
                  <!-- Show File-->
                  <div class="tab-pane fade" id="nav-buka" role="tabpanel" aria-labelledby="nav-buka-tab">
                      <div class="iframe"></div>
                  </div>
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
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>


<script>

$(document).ready(function (){
  loaddata();
  history();
  newest();
  favorite();

  //LIHAT
  $(document).on('click', '.view_btn', function(){
    $('#nav-lihat-tab').tab('show');
    $('.kembali').show();
    $('.dasboard').hide();
    var buku_id = $(this).closest('td').find('.id_data').val();

    $.ajax({
        method:"POST",
        url:"/buku/view",
        data: {
          'id' : buku_id,
        },
        success:function (response){
          //console.log(response.buku);
          $.each(response.buku, function(key, val){
            $('.v_judul').html(val['judul']);
            $('.v_abstrak').html(val['abstrak']);
            $('.v_jenis').html(val['type']);
            $('.v_penulis').html(val['penulis']);
            $('.v_tahun').html(val['tahun']);
            $('.v_id_buku').val(val['id_buku']);
            $('.v_pemilik').html(val['id_pemilik']);
          });
        }
      });
  });

  //DOWNLOAD
  $(document).on('click', '.download', function(){
    $('#nav-buka-tab').tab('show');
    $('.kembali').show();
    $('.dasboard').hide();
    var id = $(this).closest('td').find('.id_data').val();
    pinjam(id);
    preview(id);
  });

  $(document).on('click', '.v_preview', function(){
    $('#nav-buka-tab').tab('show');
    $('.kembali').show();
    var id = $('.v_id_buku').val();
    pinjam(id);
    preview(id);
  });

  $(document).on('click', '.view_history', function(){
    $('#nav-buka-tab').tab('show');
    $('.kembali').show();
    $('.dasboard').hide();
    var id = $(this).closest('td').find('.history_id').val();
    //console.log(id);
    pinjam(id);
    preview(id);
  });


  //KEMBALI
  $(document).on('click', '.kembali', function(){
    $('#nav-buku-tab').tab('show');
    $('.kembali').hide();
    $('.databuku').html("");
    $('.iframe').html("");
    $('.dasboard').show();
    loaddata();
  });

  //REFRESH
  $(document).on('click', '.refresh', function(){
      $('.databuku').html("");
      loaddata();
  })

  //CARI
  $('.cari').keyup(function () {
    var key = $('.cari').val();
        caridata(key);
  });
});

//fungsi cari data
function caridata(key){

    $.ajax({
        method:"POST",
        url:"/buku/search_r",
        data: {
            'key' : key,
        },
        success:function (response){
            //console.log(response);
            $('.databuku').html("");

            $.each(response.buku, function(key,value){
              //console.log(value['id_Anggota']);
              var status = '';
              if(value['dikonfirmasi'] == 1){
                status = '<a class="badge bg-danger"><i class="fas fa-book"></i> Draft</a>';
              }else{
                status = '<a class="badge bg-success"><i class="fas fa-book"></i> Publish</a>';
              }
              $('.databuku').append(
                '<tr>\
                  <td class="col-4">'+value['judul']+'</td>\
                  <td class="col-2">'+value['penulis']+'</td>\
                  <td class="col-2">'+value['pemilik']+'</td>\
                  <td class="col-2">\
                    <input type="hidden" class="id_data" value="'+value['id_buku']+'">\
                    <a href="#" class="badge btn-secondary view_btn"> View</a>\
                    <a href="#" class="badge btn-success download"> View File</a>\
                  </td>\
                </tr>'
              );
            });
        }
    });
}

//fungsi ambil data
function loaddata(){
  $.ajax({
    method: "GET",
    url: "/buku/get_r",
    success:function(response){
      $.each(response.buku, function(key,value){
        var status = '';
        if(value['dikonfirmasi'] == 1){
          status = '<a class="badge bg-danger"><i class="fas fa-book"></i> Draft</a>';
        }else{
          status = '<a class="badge bg-success"><i class="fas fa-book"></i> Publish</a>';
        }
        $('.databuku').append(
          '<tr>\
            <td class="col-4">'+value['judul']+'</td>\
            <td class="col-2">'+value['penulis']+'</td>\
            <td class="col-2">'+value['pemilik']+'</td>\
            <td class="col-2">\
              <input type="hidden" class="id_data" value="'+value['id_buku']+'">\
              <a href="#" class="badge btn-secondary view_btn"> View</a>\
              <a href="#" class="badge btn-success download"> View File</a>\
            </td>\
          </tr>'
        );
      });
    }
  })
}

//fungsi preview pdf
function preview(id){
  $.ajax({
    method:"POST",
    url:"/buku/view",
    data: {
      'id' : id,
    },
    success:function (response){
      $.each(response.buku, function(key, val){
        $('.iframe').append('<iframe src="http://localhost:8080/upload/'+val['link']+'" width="100%" height="1080px"></iframe>')
      });
    }
  });
}

function pinjam(id){
  var username = $('.username').val();
  var name = $('.name').val();
  $.ajax({
    method:"POST",
    url:"/peminjaman/pinjam",
    data: {
      'id_book' : id,
      'username':username,
      'name' : name,
    },
    success:function (response){
     console.log(response);
    }
  });
}

function history(){
  var username = $('.username').val();
  $.ajax({
    method:"POST",
    url:"/peminjaman/history",
    data: {
      'username':username,
    },
    success:function (response){
     //console.log(response);
     $.each(response, function(key, val){
        //console.log(val);
        $('.dipinjam').append('<tr>\
        <td><input type="hidden" class="history_id" value="'+val['id_buku']+'">\
        <a href="#" class="view_history">'+val['buku']+'</a></td>\
        </tr>');
    });
    }
  });
}

function newest(){
  var username = $('.username').val();
  $.ajax({
    method:"GET",
    url:"/buku/newest",
    success:function (response){
     //console.log(response);
     $.each(response, function(key, val){
        $('.terbaru').append('<tr>\
        <td><input type="hidden" class="history_id" value="'+val['id_buku']+'">\
        <a href="#" class="view_history">'+val['judul']+'</a></td>\
        </tr>');
    });
    }
  });
}

function favorite(){
  var username = $('.username').val();
  $.ajax({
    method:"GET",
    url:"/buku/favorite",
    success:function (response){
     console.log(response);
     $.each(response, function(key, val){
        $('.favorite').append('<tr>\
        <td><input type="hidden" class="history_id" value="'+val['id_buku']+'">\
        <a href="#" class="view_history">'+val['judul']+'</a></td>\
        </tr>');
    });
    }
  });
}
</script>
<?= $this->endSection() ?>