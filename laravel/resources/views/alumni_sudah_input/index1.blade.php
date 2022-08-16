@extends('template')
@section('konten')
<head>
<style>
 @media only screen and (max-width: 400px) {
    .modal-dialog{
                  max-width: 100%;
              }

 }
</style>
</head>
<div class="m-grid__item m-grid__item--fluid m-wrapper" style="margin: 10px">
<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    <div class="row">
                        <div class="col-md-12"><h5><i class="m-menu__link-icon flaticon-edit-1"></i> Alumni sudah mengisi Tracer Study</h5></div>

                    </div>
                </h3>
            </div>
        </div>

        <div class="m-portlet__head-tools">

            <ul class="m-portlet__nav">
                <li class="m-portlet__nav-item">



                </li>
            </ul>
        </div>
    </div>

    <div class="m-portlet__body">
     <div class="row">
                    <div class="col-md-9">
                        <div class="m-alert m-alert--icon m-alert--air alert alert-dismissible fade show" role="alert" style="background-color: #95a57e36">
                            <div class="m-alert__icon">
                                <i class="la 
                                la-info
                                 "></i>
                            </div>
                            <div class="m-alert__text">
                                <strong>Data Alumni : </strong>
                                
                                Alumni yang sudah input Tracer Study 
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-md-3 text-right">
                        <a href="{{url('export-alumni-sudah-input')}}" class="btn btn-success m-btn m-btn--custom m-btn--icon">
                            <span>
                                <i class="la la-file-excel-o"></i>
                                <span>Export Excell</span>
                            </span>
                        </a>
                    </div>
    </div>
        <b>Filter Tahun Lulus: </b>
        @foreach ($show_tahun as $item)
            <label class="m-checkbox m-checkbox--solid m-checkbox--success">
                <input class="filter-checkbox" type="checkbox"  value="{{$item->tahun_lulus}}"> {{$item->tahun_lulus}}
                <span></span>
            </label>
        @endforeach
       
        &nbsp
        <br><br>
        <table cellpadding="5" class="table-striped tabel_show table table-bordered nowrap" cellspacing="0" width="100%">
            <thead class="m-datatable__head" style="background-image: url('https://www.transparenttextures.com/patterns/sos.png');background-color: #349d44;color: #e5f6dd;">
                <tr>
                    <th>No.</th>
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Program Studi</th>
                    <th>Lulus</th>
                 	<th>Kontak</th>
                 	<th>Alamat</th>
                    <th style="25%">Update</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
</div>


<div class="modal fade" id="CreateUserModal">
    <div class="modal-dialog modal-lg opacity-animate2" style="max-width: 50%;overflow-y: initial !important">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color: #4f7f4f;color:white">
                <h6 class="modal-title" style="color: whitesmoke;height:5px;padding-bottom:7px;margin-top:-10px"><b><i class="m-menu__link-icon flaticon-user"></i> Input User</b></h6>
                <button type="button" class="close" style="color: whitesmoke" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" style="height: 390px;
            overflow-y: auto;">
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
                    <strong>Success!</strong>Product was added successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <b style="color: red">*Form Users Baru</b>
                <hr>
                <form id="form_submit" method="post">
                    @csrf
                <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">

                        <div class="row">
                            <div class="col-md-4">
                                <label for="Name">* Hak Akses:</label>
                            </div>
                            <div class="col-md-8">
                                <select name="prodi_id" id="txtinput_prodi" required style="width: 100%"></select>

                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="Name">* Nama Lengkap:</label><br>

                            </div>
                            <div class="col-md-8">
                               <input type="text" required class="form-control" placeholder="Nama lengkap.." name="name">

                            </div>
                        </div>
                    </div>


                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="Name">* Username:</label><br>
                                    <small style="color: red">Username untuk login !</small>
                                </div>
                                <div class="col-md-8">
                                   <input type="text" required class="form-control" placeholder="Username.." name="username">

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="Name">* Password:</label><br>
                                    <small style="color: red">Password untuk login !</small>
                                </div>
                                <div class="col-md-8">
                                   <input required type="password" class="form-control" placeholder="Password.." name="password">

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="Name">Email:</label>
                                </div>
                                <div class="col-md-8">
                                    <input name="email"
                                    class="form-control" placeholder="Email" style="width:100%">
                                    </input>

                                </div>
                            </div>
                        </div>



                    </div>


                </div>


            </div>
            <!-- Modal footer -->
            <div class="modal-footer" style="height: 70px">
                <button type="submit" class="btn btn-success" id="SubmitCreateForm">Simpan</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
            </div>
        </form>
        </div>
    </div>
</div>

  {{--  edit data modal  --}}
  <div class="modal fade" id="modal-edit">
    <div class="modal-dialog modal-lg opacity-animate2" style="max-width: 50%;overflow-y: initial !important">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color: #4f7f4f;color:white">
                <h6 class="modal-title" style="color: whitesmoke;height:5px;padding-bottom:7px;margin-top:-10px"><b><i class="m-menu__link-icon flaticon-user"></i> Update User</b></h6>
                <button type="button" class="close" style="color: whitesmoke" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" style="height: 420px;
            overflow-y: auto;">
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
                    <strong>Success!</strong>Product was added successfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <b style="color: red">*Form Ubah User</b>
                <hr>
                <form id="form_edit" enctype="multipart/form-data" method="post">
                    {!! csrf_field() !!}
                    <input type="hidden" id="txtedit_id"  class="form-control" name="id">
                    <div class="row">

                        <div class="col-md-12">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="Name">* Hak Akses:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="prodi_id" id="txtedit_prodi" required
                                        class="custom-select select2 form-control" style="width:100%">

                                        </select>

                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="Name"* >Nama Lengkap:</label>
                                    </div>
                                    <div class="col-md-8">
                                       <input required type="text" id="txtedit_name" class="form-control" placeholder="Nama lengkap.." name="name">

                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="Name">* Username:</label><br>
                                        <small style="color: red">Username untuk login !</small>
                                    </div>
                                    <div class="col-md-8">
                                       <input type="text" required class="form-control" id="txtedit_username" placeholder="Username.." name="username">

                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="Name">* Password:</label><br>
                                        <small style="color: red">Password untuk login !</small>
                                    </div>
                                    <div class="col-md-8">
                                       <input required type="password"  class="form-control" placeholder="Password.." name="password">

                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="Name">Email:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input name="email"
                                        class="form-control" id="txtedit_email" placeholder="Email" style="width:100%">
                                        </input>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>


            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="SubmitCreateForm">Simpan</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
            </div>
        </form>
        </div>
    </div>
</div>

</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src ="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>

    $(document).ready(function(){
        var table_evaluasi_pegawai = $('.tabel_show').DataTable({
            responsive:true,
            paging: true,
            info: true,
            searching: true,
            scrollX:        true,
            scrollCollapse: true,
            autoWidth:         true,
            "aaSorting": [],
            "ordering": true,
            ajax: {
                url: '{{url("datatable-alumni-sudah-input")}}',
                dataSrc: 'result',
            },

        });

    $('.filter-checkbox').on('change', function(e){
        var searchTerms = []
        $.each($('.filter-checkbox'), function(i,elem){
          if($(elem).prop('checked')){
            searchTerms.push("^" + $(this).val() + "$")
          }
        })
        table_evaluasi_pegawai.column(4).search(searchTerms.join('|'), true, false, true).draw();
      });

      $('.status-dropdown').on('change', function(e){
        var status = $(this).val();
        $('.status-dropdown').val(status)
        console.log(status)
        //dataTable.column(6).search('\\s' + status + '\\s', true, false, true).draw();
        table_evaluasi_pegawai.column(7).search(status).draw();
      })

        $('#txtinput_prodi').select2({
            placeholder: 'Pilih Akses Prodi...',
            dropdownParent: $("#txtinput_prodi").parent(),
            ajax: {
              url: '{{url("/cari/kode_prodi")}}',
              dataType: 'json',
              delay: 50,
              processResults: function (data) {
                return {
                  results:  $.map(data, function (item) {
                    return {
                      text: item.prodi,
                      id: item.kode
                    }
                  })
                };
              },
              cache: true,
            }
          });

          $('#txtedit_prodi').select2({
            placeholder: 'Pilih Akses Prodi...',
            dropdownParent: $("#txtedit_prodi").parent(),
            ajax: {
              url: '{{url("/cari/kode_prodi")}}',
              dataType: 'json',
              delay: 50,
              processResults: function (data) {
                return {
                  results:  $.map(data, function (item) {
                    return {
                      text: item.prodi,
                      id: item.kode
                    }
                  })
                };
              },
              cache: true,
            }
          });

          $('#form_submit').submit(function (event) {
            event.preventDefault();
            $('#CreateUserModal').modal('hide');
            var url = '{{ url('simpan_users') }}';
            ajaxProcessInsert(url, new FormData(this))
        });

        function ajaxProcessInsert(url, data) {
            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                cache: false,
                processData:false,
                contentType: false,
                beforeSend: function () {
                    $('.cssload-container').show();
                },
                success: function (response) {
                    if (response) {
                        console.log(response);
                        $('.cssload-container').hide();
                        $('#form_submit')[0].reset();
                        $('.tabel_show').DataTable().ajax.reload();
                        Swal.fire({
                            title: 'Information',
                            html: 'User berhasil disimpan',
                            type: 'success',
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                },
                error: function (error) {
                    if (error) {
                        console.log(error);
                        var result = error.responseJSON;
                        if (result != null) {
                            var message = result.errors;
                            if (Array.isArray(message)) {
                                console.log(message);
                                $.map(message, function (value, index) {
                                    message = value + '</br>';
                                });
                            }
                        } else {
                            message = 'look like something when wrong';
                        }
                    } else {
                        message = 'look like something when wrong';
                    }

                    $('.cssload-container').hide();
                    Swal.fire({
                        title: 'Warning',
                        html: '<strong>' + message + '</strong>',
                        type: 'warning',
                        showConfirmButton: false,
                        timer: 3000
                    })

                }

            })
        };

        $('#form_edit').submit(function (event) {
            $('#modal-edit').modal('hide');
            event.preventDefault();
            var url = '{{ url('update_users') }}';
            ajaxProcess(url, $(this).serialize())
        });

        function ajaxProcess(url, data) {
            $.ajax({
                type: 'post',
                url: url,
                data: data,
                dataType : 'json',
                beforeSend: function () {
                    $('.cssload-container').show();
                },
                success: function (response) {
                    console.log(response);
                    if (response) {
                        $('.cssload-container').hide();

                        $('.tabel_show').DataTable().ajax.reload();


                        Swal.fire({
                            title: 'Information',
                            html: '<strong>' + response.result + '</strong>',
                            type: 'success',
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                },
                error: function (error) {
                    if (error) {
                        console.log(error);
                        var result = error.responseJSON;
                        if (result != null) {
                            var message = result.message;
                            if (Array.isArray(message)) {
                                $.map(message, function (value, index) {
                                    message = value + '</br>';
                                });
                            }
                        } else {
                            message = 'look like something when wrong';
                        }
                    } else {
                        message = 'look like something when wrong';
                    }

                    $('#form_edit')[0].reset();
                    $('.cssload-container').hide();
                    Swal.fire({
                        title: 'Warning',
                        html: '<strong>' + message + '</strong>',
                        type: 'warning',
                        showConfirmButton: false,
                        timer: 3000
                    })

                }

            })
        };

        $('.tabel_show tbody').on('click', '#btn_update_surat', function (e) {
            var id = $(this).attr('data-id');
            var url = '{!! url('get_user') !!}/'+id;

            ajaxEditSurat(url);
        });

        function ajaxEditSurat(url){
            $.ajax({
                type: 'GET',
                url: url,
                cache: false,
                processData:false,
                contentType: false,
                beforeSend: function () {
                    $('.cssload-container').show();
                },
                success: function (response) {
                    console.log(response);
                    $('.cssload-container').hide();
                    if(response.status == 'success') {
                       if(response.result != null){
                           var data = response.result;
                           $('#txtedit_id').val(data.id);
                           $('#txtedit_name').val(data.name);
                           $('#txtedit_username').val(data.username);
                           $('#txtedit_email').val(data.email);

                           var selected_prodi = $("<option selected='selected'></option>").val(data.kode).text(data.prodi);
                           $("#txtedit_prodi").append(selected_prodi).trigger('change');

                           $('#modal-edit').modal('show');
                       }
                    }
                },
                error: function (error) {
                    if (error) {
                        console.log(error);
                        var result = error.responseJSON;
                        if (result != null) {
                            var message = result.message;
                            if (Array.isArray(message)) {
                                $.map(message, function (value, index) {
                                    message = value + '</br>';
                                });
                            }
                        } else {
                            message = 'look like something when wrong';
                        }
                    } else {
                        message = 'look like something when wrong';
                    }

                    $('.cssload-container').hide();
                    Swal.fire({
                        title: 'Warning',
                        html: '<strong>' + message + '</strong>',
                        type: 'warning',
                        showConfirmButton: false,
                        timer: 3000
                    })

                }

            })
        }

        $('.tabel_show tbody').on('click', '#btn-delete', function () {
            var url = '{{ url('destroy_users') }}';
            var id = $(this).attr('data-id');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var data_id = {_token: CSRF_TOKEN, id: id};
            delete_master(url, data_id);
        });


        function delete_master(url, data) {
            swal.fire({
                title: "Informasi !",
                text: "Apakah anda ingin menghapus User ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus User!'
            }).then((result) => {
                if(result.value)
                {
                    $.ajax({
                    type: "POST",
                    url: url,
                    /* send the csrf-token and the input to the controller */
                    data: data,
                    dataType: "json",
                    /* remind that 'data' is the response of the AjaxController */
                    beforeSend: function () {
                        $('.cssload-container').show();
                    },
                    success: function (data) {
                        $('.cssload-container').hide();
                        $('.tabel_show').DataTable().ajax.reload();

                        swal.fire({
                            title: "Delete!",
                            text: data.result,
                            type: data.status,
                            button: false,
                            timer: 2000,
                        })
                    },
                    error: function (error) {
                        if (error) {
                            console.log(error);
                            var result = error.responseJSON;
                            if (result != null) {
                                var message = result.message;
                                if (Array.isArray(message)) {
                                    $.map(message, function (value, index) {
                                        message = value + '</br>';
                                    });
                                }
                            } else {
                                message = 'look like something when wrong';
                            }
                        } else {
                            message = 'look like something when wrong';
                        }

                        $('.cssload-container').hide();
                        Swal.fire({
                            title: 'Warning',
                            html: '<strong>' + message + '</strong>',
                            type: 'warning',
                            showConfirmButton: false,
                            timer: 3000
                        })

                    }

                });
                }
            });
        }


    });

</script>
@endsection
