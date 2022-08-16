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
                            <div class="col-md-12"><h5><i class="m-menu__link-icon flaticon-user"></i> Data Video Opening</h5></div>
                        </div>
                    </h3>
                </div>
            </div>
        </div>

        <div class="m-portlet__body">
            <table cellpadding="0" class="table-striped tabel_show table table-bordered nowrap" cellspacing="0" width="100%">
                <thead width="100%" class="m-datatable__head" style="background-image: url('https://www.transparenttextures.com/patterns/sos.png');background-color: #349d44;color: #e5f6dd;width:100%">
                    <tr>
                        <th>No.</th>
                        <th>LINK</th>
                        <th>STATUS</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

{{--  edit data modal  --}}
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog modal-lg opacity-animate2" style="max-width: 50%;overflow-y: initial !important">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color: #4f7f4f;color:white">
                <h6 class="modal-title" style="color: whitesmoke;height:5px;padding-bottom:7px;margin-top:-10px"><b><i class="m-menu__link-icon flaticon-user"></i> Update Video</b></h6>
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
                        <strong>Success!</strong>Video was update successfully.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <b style="color: red">*Form Ubah Video</b>
                    <hr>
                    <input type="hidden" id="txtedit_id"  class="form-control" name="id">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="Name">* Kode Video</label>
                                    </div>
                                    <div class="col-md-8">
                                    https://youtu.be/<b class=" text-danger">Ma_fzjyeLEw</b>
                                    <input type="text" class="form-control" name="link" required placeholder="Ma_fzjyeLEw" id="txtedit_link" style="width: 100%"></input>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="Name">* Status:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="status" id="txtedit_status" required style="width: 100%">
                                            <option value="Aktif">Aktif</option>
                                            <option value="Tidak Aktif">Tidak Aktif</option>
                                        </select>
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

                
        $('#txtedit_status').select2({
            placeholder: 'Pilih Status'
        });

        $('.tabel_show').DataTable({
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
                url: '{{url("datatable_video")}}',
                dataSrc: 'result',
            },
        });
                
        $('#form_edit').submit(function (event) {
            $('#modal-edit').modal('hide');
            event.preventDefault();
            var url = '{{ url('update-video') }}';
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

        $('.tabel_show tbody').on('click', '#btn_update_video', function (e) {
            var id = $(this).attr('data-id');
            var url = '{!! url('get_video') !!}/'+id;
            ajaxEditVideo(url);
        });

        function ajaxEditVideo(url){
            $.ajax({
                type: 'GET',
                url: url,
                cache: false,
                processData: false,
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
                            $('#txtedit_link').val(data.link);
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
    });
</script>
@endsection
