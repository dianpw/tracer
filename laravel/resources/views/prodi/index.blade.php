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
                            <div class="col-md-12"><h5><i class="m-menu__link-icon flaticon-user"></i> Data Program Studi</h5></div>
                        </div>
                    </h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a href="#" data-toggle="modal" data-target="#CreateUserModal" class="btn btn-success m-btn m-btn--icon m-btn--air">
                            <span>
                                <i class="la la-plus"></i>
                                <span>Tambah Prodi</span>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="m-portlet__body">
            <table cellpadding="0" class="table-striped tabel_show table table-bordered nowrap" cellspacing="0" width="100%">
                <thead width="100%" class="m-datatable__head" style="background-image: url('https://www.transparenttextures.com/patterns/sos.png');background-color: #349d44;color: #e5f6dd;width:100%">
                    <tr>
                        <th>No.</th>
                        <th >Kode</th>
                        <th style="15%">Program Studi</th>
                        <th style="15%">Fakultas</th>
                        <th style="15%">Created at</th>
                        <th style="25%">Aksi</th>
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
            <div class="modal-header" style="background-image: url('https://www.transparenttextures.com/patterns/sos.png');background-color: #349d44;color: #e5f6dd;">
                <h6 class="modal-title" style="color: whitesmoke;height:5px;padding-bottom:7px;margin-top:-10px"><b><i class="m-menu__link-icon flaticon-user"></i> Tambah prodi</b></h6>
                <button type="button" class="close" style="color: whitesmoke" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <form id="form_submit" method="post">
                @csrf
                <div class="modal-body" style="height: 330px; overflow-y: auto;">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
                        <strong>Success!</strong>Prodi was added successfully.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <b style="color: red">*Form Prodi</b>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="Name">* Fakultas:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="fakultas_id" id="txtinput_fakultas" required style="width: 100%"></select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="Name">* Kode Prodi:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="kode" required placeholder="Kode prodi" id="txtinput_kode" style="width: 100%"></input>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="Name">* Jenjang:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="jenjang" id="txtinput_jenjang" required style="width: 100%">
                                            <option value="S1">S1</option>
                                            <option value="S2">S2</option>
                                            <option value="S3">S3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="Name">* Program Studi:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="prodi" class="form-control" required placeholder="Program studi" style="width: 100%"></input>
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
                <h6 class="modal-title" style="color: whitesmoke;height:5px;padding-bottom:7px;margin-top:-10px"><b><i class="m-menu__link-icon flaticon-user"></i> Update Prodi</b></h6>
                <button type="button" class="close" style="color: whitesmoke" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <form id="form_edit" enctype="multipart/form-data" method="post">
                {!! csrf_field() !!}
                <div class="modal-body" style="height: 330px; overflow-y: auto;">
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
                    <b style="color: red">*Form Ubah Prodi</b>
                    <hr>
                    <input type="hidden" id="txtedit_id"  class="form-control" name="id">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="Name">* Fakultas:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="fakultas_id" id="txtedit_fakultas" required style="width: 100%"></select>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="Name">* Kode:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="kode" required placeholder="Kode prodi" id="txtedit_kode" style="width: 100%"></input>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="Name">* Jenjang:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="jenjang" id="txtedit_jenjang" required style="width: 100%">
                                            <option value="S1">S1</option>
                                            <option value="S2">S2</option>
                                            <option value="S3">S3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="Name">* Program Studi:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="prodi" class="form-control" id="txtedit_prodi" required placeholder="Program studi" style="width: 100%"></input>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src ="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function(){
        $(".fakultas").fadeOut();

        $(".prodi").fadeOut();

        $(".hak_akses").change(function() {
            if($(this).val() == 2){
                $(".fakultas").fadeIn();
                $(".prodi").fadeOut();
            }else{
                $(".fakultas").fadeIn();
                $(".prodi").fadeIn();
            }
        });

        $('#select_role').select2();

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
                url: '{{url("datatable_prodi")}}',
                dataSrc: 'result',
            },
        });

        $('#txtinput_fakultas').select2({
            placeholder: 'Pilih Fakultas...',
            dropdownParent: $("#txtinput_fakultas").parent(),
            ajax: {
                url: '{{url("/cari/kode_fakultas")}}',
                dataType: 'json',
                delay: 50,
                processResults: function (data) {
                    return {
                    results:  $.map(data, function (item) {
                        return {
                        text: item.fakultas,
                        id: item.id
                        }
                    })
                    };
                },
                cache: true,
            }
        });

        $('#txtinput_jenjang').select2({
            placeholder: 'Pilih Jenjang'
        });
        
        $('#txtedit_jenjang').select2({
            placeholder: 'Pilih Jenjang'
        });

        $('#txtedit_fakultas').select2({
            placeholder: 'Pilih Fakultas...',
            dropdownParent: $("#txtedit_fakultas").parent(),
            ajax: {
                url: '{{url("/cari/kode_fakultas")}}',
                dataType: 'json',
                delay: 50,
                processResults: function (data) {
                    return {
                    results:  $.map(data, function (item) {
                        return {
                        text: item.fakultas,
                        id: item.id
                        }
                    })
                    };
                },
                cache: true,
            }
        });

        $('#txtinput_fakultas').on('select2:select', function (e) {
            var data = e.params.data;
            var url = '{{url("/cari/kode_prodi")}}' + '/' + data.id;
            $("#txtinput_prodi").val(null).trigger('change');
            ajax_prodi(url);
        });

        $("#txtinput_prodi").select2({
            placeholder : 'Pilih Program Studi'
        });

        function ajax_prodi(url){
            $('#txtinput_prodi').select2({
                placeholder: 'Pilih Program Studi',
                dropdownParent: $("#txtinput_prodi").parent(),
                minimumResultsForSearch:1,
                ajax: {
                    url: url,
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
        }

        $('#form_submit').submit(function (event) {
            event.preventDefault();
            $('#CreateUserModal').modal('hide');
            var url = '{{ url('simpan-prodi') }}';
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
                            html: 'Program studi berhasil disimpan',
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
            var url = '{{ url('update-prodi') }}';
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
            var url = '{!! url('get_prodi') !!}/'+id;
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
                            $('#txtedit_id').val(data.id_kode_prodi);
                            $('#txtedit_kode').val(data.kode);
                            $('#txtedit_prodi').val(data.prodi);

                            var selected_jenjang = $("<option selected='selected'></option>").val(data.jenjang).text(data.jenjang);
                            $("#txtedit_jenjang").append(selected_jenjang).trigger('change');

                            var selected_fakultas = $("<option selected='selected'></option>").val(data.id).text(data.fakultas);
                            $("#txtedit_fakultas").append(selected_fakultas).trigger('change');

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
            var url = '{{ url('destroy-prodi') }}';
            var id = $(this).attr('data-id');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var data_id = {_token: CSRF_TOKEN, id: id};
            delete_master(url, data_id);
        });

        function delete_master(url, data) {
            swal.fire({
                title: "Informasi !",
                text: "Apakah anda ingin menghapus Program Studi ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus Program Studi!'
            }).then((result) => {
                if(result.value){
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
