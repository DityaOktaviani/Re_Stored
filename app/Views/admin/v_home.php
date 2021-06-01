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
            <h1>Dasboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Dasboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid dasboard">
        <div class="row justify-content-around">
          <div class="col-6">
            <!-- Default box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Buku Dipinjam</h3>
              </div>
              <!-- buku yang dipinjam -->
              <div class="card-body dipinjam">
              <ul>
                <li>

                </li>
              </ul>
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
              <div class="card-body dipinjam">
              <ul>
                <li>
                    
                </li>
              </ul>
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
              <div class="card-body dipinjam">
              <ul>
                <li>
                    
                </li>
              </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
              </div>
              <!-- /.card-footer-->
            </div>
          </div>
        </div>
      </div>
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
                    <button href="#" type="button" class="btn btn-tool tambah" data-toggle="modal" data-target="#addModal">
                        <i class="fas fa-plus-square"></i> Tambah </button>
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
                    <a class="nav-item nav-link" id="nav-tambah-tab" data-toggle="tab" href="#nav-tambah" role="tab" aria-controls="nav-tambah" aria-selected="false" hidden></a>
                    <a class="nav-item nav-link" id="nav-edit-tab" data-toggle="tab" href="#nav-edit" role="tab" aria-controls="nav-edit" aria-selected="false" hidden></a>
                    <a class="nav-item nav-link" id="nav-lihat-tab" data-toggle="tab" href="#nav-lihat" role="tab" aria-controls="nav-lihat" aria-selected="false" hidden></a>
                    <a class="nav-item nav-link" id="nav-buka-tab" data-toggle="tab" href="#nav-buka" role="tab" aria-controls="nav-buka" aria-selected="false" hidden></a>
                  </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                  <!-- Show Data -->
                  <div class="tab-pane fade show active" id="nav-buku" role="tabpanel" aria-labelledby="nav-buku-tab">
                    <table class="table table-bordered">
                      <thead>
                        <tr class=>
                          <th class="col-4">Judul</th>
                          <th class="col-2">Penulis</th>
                          <th class="col-2">Pemilik</th>
                          <th class="col-2">Status</th>
                          <th class="col-2">Aksi</th>
                        </tr>
                      </thead>
                      <tbody class="databuku"></tbody>
                    </table>
                  </div>
                  <!-- Add Data -->
                  <div class="tab-pane fade" id="nav-tambah" role="tabpanel" aria-labelledby="nav-tambah-tab">
                    <form id="myform" name="myForm">
                      <div class="row">
                        <div class="col-8">
                          <h4>Detail Buku</h4>
                          <div class="form-group">
                            <label>Judul</label> <span id="error_judul" class="text-danger ms-3"></span>
                            <input type="text" class="form-control judul" id="judul" name="judul" placeholder="Masukan judul">
                            <small class="text-muted">
                              *Judul tidak boleh kosong
                            </small>
                          </div>
                          <div class="form-group">
                            <label>Abstrak</label>
                            <textarea class="form-control abstrak" id="abstrak" name="abstrak" rows="15"></textarea>
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="form-group">
                            <label>Penulis</label> <span id="error_penulis" class="text-danger ms-3"></span>
                            <input type="text" class="form-control penulis" id="penulis" name="penulis" placeholder="Masukan nama Penulis">
                            <small class="text-muted">
                              *Nama penulis tidak boleh kosong
                            </small>
                          </div>
                          <div class="form-group">
                            <label>Jenis Buku</label> <span id="error_jenis" class="text-danger ms-3"></span>
                            <select class="form-control jenis" id="jenis" name="jenis">
                              <option></option>
                              <option value="1">Skripsi</option>
                              <option value="2">Jurnal</option>
                              <option value="3">Penelitian</option>
                              <option value="4">Artikel</option>
                              <option value="5">Tesis</option>
                              <option value="6">Disertasi<option>
                            </select>
                            <small class="text-muted">
                              *Tipe tidak boleh kosong
                            </small>
                          </div>
                          <div class="form-group">
                            <label>Tahun Terbit</label>
                            <input type="text" class="form-control tahun" id="tahun" name="tahun" placeholder="Masukan tahun terbit">
                          </div>
                          <div class="form-group">
                            <label>File</label> <span id="error_file" class="text-danger ms-3"></span>
                            <input type="file" class="form-control file" id="file" name="file" placeholder="Upload file">
                            <small> **Hanya menerima dalam bentuk pdf</small>
                          </div>
                          <input type="hidden" class="form-control pemilik" id="pemilik" name="pemilik" value="">
                          <button type="submit" class="btn btn-block btn-success btn-lg upload" style="display:none;">
                            <i class="far fa-save"></i> Submit
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- Edit Data-->
                  <div class="tab-pane fade" id="nav-edit" role="tabpanel" aria-labelledby="nav-edit-tab">
                    <form id="edit" name="edit">
                      <div class="row">
                        <div class="col-8">
                          <h4>Detail Buku</h4>
                          <div class="form-group">
                            <label>Judul</label> <span id="e_error_judul" class="text-danger ms-3"></span>
                            <input type="text" class="form-control e_judul" id="ejudul" name="ejudul" placeholder="Masukan judul">
                            <small class="text-muted">
                              *Judul tidak boleh kosong
                            </small>
                          </div>
                          <div class="form-group">
                            <label>Abstrak</label>
                            <textarea class="form-control e_abstrak" id="eabstrak" name="eabstrak" rows="15"></textarea>
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="form-group">
                            <label>Penulis</label> <span id="e_error_penulis" class="text-danger ms-3"></span>
                            <input type="text" class="form-control e_penulis" id="epenulis" name="epenulis" placeholder="Masukan nama Penulis">
                            <small class="text-muted">
                              *Nama penulis tidak boleh kosong
                            </small>
                          </div>
                          <div class="form-group">
                            <label>Jenis Buku</label> <span id="e_error_jenis" class="text-danger ms-3"></span>
                            <input class="form-control e_jenis" id="ejenis" name="ejenis" readonly>
                          </div>
                          <div class="form-group">
                            <label>Tahun Terbit</label>
                            <input type="text" class="form-control e_tahun" id="etahun" name="etahun" placeholder="Masukan tahun terbit">
                          </div>
                          <div class="form-group">
                            <label>File</label> <span id="error_file" class="text-danger ms-3"></span>
                            <input type="file" class="form-control e_file" id="efile" name="efile" placeholder="Upload file">
                            <small> **Hanya menerima dalam bentuk pdf</small>
                          </div>
                          <input type="hidden" class="form-control e_pemilik" id="epemilik" name="epemilik">
                          <input type="hidden" class="form-control e_id_buku" id="eid_buku" name="eid_buku">
                          <button class="btn btn-block btn-info btn-lg e_preview">
                            <i class="far fa-eye"></i> Preview
                          </button>
                          <button type="submit" class="btn btn-block btn-success btn-lg e_upload">
                            <i class="far fa-save"></i> Submit
                          </button>
                        </div>
                      </div>
                    </form>
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

  //TAMBAH
  $(document).on('click', '.tambah', function(){
    $('#nav-tambah-tab').tab('show');
    $('.kembali').show();
    $('.upload').show();
  });

  //EDIT
  $(document).on('click', '.edit_btn', function(){
    $('#nav-edit-tab').tab('show');
    $('.kembali').show();
    $('.e_upload').show();
    var buku_id = $(this).closest('td').find('.id_data').val();
    //console.log(buku_id);

    $.ajax({
        method:"POST",
        url:"/buku/view",
        data: {
          'id' : buku_id,
        },
        success:function (response){
          //console.log(response.buku);
          $.each(response.buku, function(key, val){
            $('.e_judul').val(val['judul']);
            $('.e_abstrak').val(val['abstrak']);
            $('.e_jenis').val(val['type']);
            $('.e_penulis').val(val['penulis']);
            $('.e_tahun').val(val['tahun']);
            $('.e_id_buku').val(val['id_buku']);
            $('.e_pemilik').val(val['id_pemilik']);
          });
        }
      });
  });

  //LIHAT
  $(document).on('click', '.view_btn', function(){
    $('#nav-lihat-tab').tab('show');
    $('.kembali').show();
    var buku_id = $(this).closest('td').find('.id_data').val();
    //console.log(buku_id);

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
    var id = $(this).closest('td').find('.id_data').val();
    preview(id);
  });

  $(document).on('click', '.e_preview', function(){
    $('#nav-buka-tab').tab('show');
    $('.kembali').show();
    var id = $('.e_id_buku').val();
    console.log(id)
    preview(id);
  });

  $(document).on('click', '.v_preview', function(){
    $('#nav-buka-tab').tab('show');
    $('.kembali').show();
    var id = $('.v_id_buku').val();
    //console.log(id)
    preview(id);
  });

  //KEMBALI
  $(document).on('click', '.kembali', function(){
    $('#nav-buku-tab').tab('show');
    $('.kembali').hide();
    $('.databuku').html("");
    $('.iframe').html("");
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
    //console.log(key)
        caridata(key);
  });

   //Fungsi Tambah
   $('#myform').on('submit', function(e){
    e.preventDefault();
    if(validation()){
      var fd = new FormData(this);
      //for (var value of fd.values()) {
        //  console.log(value);
        //};

      $.ajax({
         method: "POST",
         url: "/buku/add",
         data: fd,
         cache: false,
        processData: false,
        contentType: false,
        dataType: "JSON",
         success:function(response){
          //console.log(response);
          $('#myform').find('input').val('');
          $('#abstrak').val('');

          $('#nav-buku-tab').tab('show');
          $('.kembali').hide();
          $('.databuku').html("");
          loaddata();

          Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Data berhasil dimasukan!'
          })
         }
       });
      
    } else{
      return false;
    }
   });

   //fungsi Edit
   $('#edit').on('submit', function(e){
    e.preventDefault();
    console.log(e_validation());
    if(e_validation()){
      var efd = new FormData(this);
      for (var value of efd.values()) {
          console.log(value);
        };

      $.ajax({
         method: "POST",
         url: "/buku/edit",
         data: efd,
         cache: false,
        processData: false,
        contentType: false,
        dataType: "JSON",
         success:function(response){
          console.log(response);
          $('#e_myform').find('input').val('');
          $('.e_abstrak').val('');

          $('#nav-buku-tab').tab('show');
          $('.kembali').hide();
          $('.databuku').html("");
          loaddata();

          Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Data berhasil dimasukan!'
          })
         }
       });
      
    } else{
      return false;
    }
   });

   //delete
   $(document).on('click','.delete_btn', function(){
      var buku_id = $(this).closest('td').find('.id_data').val();

      Swal.fire({
        title: 'Apa anda yakin ingin menhapus ini?',
        showDenyButton: true,
        confirmButtonText: `Ya`,
        denyButtonText: `Tidak`,
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            method:"POST",
            url:"/buku/delete",
            data: {
              'id' : buku_id,
            },
            success:function (response){
              Swal.fire('Data berhasil dihapus!!', '', 'success')
              $('.databuku').html("");
              loaddata();
            }
          });
        } else if (result.isDenied) {
          Swal.fire('Data tetap disimpan', '', 'info')
        }
      })
    });
});

//fungsi cari data
function caridata(key){

    $.ajax({
        method:"POST",
        url:"/buku/search",
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
                  <td class="col-2">'+status+'</td>\
                  <td class="col-2">\
                    <input type="hidden" class="id_data" value="'+value['id_buku']+'">\
                    <a href="#" class="badge btn-secondary view_btn"> View</a>\
                    <a href="#" class="badge btn-primary edit_btn"> Edit</a>\
                    <a href="#" class="badge btn-danger delete_btn"> Delete</a>\
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
    url: "/buku/get",
    success:function(response){
      //console.log(response.anggota);
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
            <td class="col-2">'+status+'</td>\
            <td class="col-2">\
              <input type="hidden" class="id_data" value="'+value['id_buku']+'">\
              <a href="#" class="badge btn-secondary view_btn"> View</a>\
              <a href="#" class="badge btn-primary edit_btn"> Edit</a>\
              <a href="#" class="badge btn-danger delete_btn"> Delete</a>\
              <a href="#" class="badge btn-success download"> View File</a>\
            </td>\
          </tr>'
        );
      });
    }
  })
}

//fungsi validasi
function validation(){
  if($.trim($('.judul').val()).length == 0){
    error_judul = 'Judul masih Kosong';
    $('#error_judul').text(error_judul);
  }else{
    error_judul = '';
    $('#error_judul').text(error_judul);
  }

  if($.trim($('.penulis').val()).length == 0){
    error_penulis = 'penulis masih Kosong';
    $('#error_penulis').text(error_penulis);
  }else{
    error_penulis = '';
    $('#error_penulis').text(error_penulis);
  }
  
  if($.trim($('.jenis').val()).length == 0){
    error_jenis = 'jenis masih Kosong';
    $('#error_jenis').text(error_jenis);
  }else{
    error_jenis = '';
    $('#error_jenis').text(error_jenis);
  }

  //console.log($('.file').val().split('.').pop().toLowerCase());
  if($.trim($('.file').val()).length == 0){
    error_file = 'file masih Kosong';
    $('#error_file').text(error_file);
  }else if ($('.file').val().split('.').pop().toLowerCase() != 'pdf') {
    error_file = 'hanya menerima file pdf';
    $('#error_file').text(error_file);
  }else{
    error_file = '';
    $('#error_file').text(error_file);
  }

  if(error_file != '' || error_jenis != '' || error_penulis != '' || error_judul != ''){
    return false;
  } else{
    return true;
  }
}

function e_validation(){
  if($.trim($('.e_judul').val()).length == 0){
    error_judul = 'Judul masih Kosong';
    $('#e_error_judul').text(error_judul);
  }else{
    error_judul = '';
    $('#e_error_judul').text(error_judul);
  }

  if($.trim($('.e_penulis').val()).length == 0){
    error_penulis = 'penulis masih Kosong';
    $('#e_error_penulis').text(error_penulis);
  }else{
    error_penulis = '';
    $('#e_error_penulis').text(error_penulis);
  }
  
  //console.log($('.file').val().split('.').pop().toLowerCase());
  if($.trim($('.e_file').val()).length == 0){
    error_file = '';
    $('#e_error_file').text(error_file);
  }else if ($('.e_file').val().split('.').pop().toLowerCase() != 'pdf') {
    error_file = 'hanya menerima file pdf';
    $('#e_error_file').text(error_file);
  }else{
    error_file = '';
    $('#e_error_file').text(error_file);
  }

  if(error_file != '' || error_penulis != '' || error_judul != ''){
    return false;
  } else{
    return true;
  }
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
          console.log(response.buku);
          $.each(response.buku, function(key, val){
            $('.iframe').append('<iframe src="http://localhost:8080/upload/'+val['link']+'" width="100%" height="1080px"></iframe>')
          });
        }
      });
}
</script>
<?= $this->endSection() ?>