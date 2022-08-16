@extends('template')

@section('konten')
<head>
    <style>
        .modal.modal-wide{
            overflow: hidden;
        }

        .modal-wide .modal-body {
            overflow-y: auto;
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
                        <div class="col-md-12"><h5><i class="m-menu__link-icon flaticon-book"></i> Data Mahasiswa Alumni </h5></div>

                    </div>
                </h3>
            </div>
        </div>

        <div class="m-portlet__head-tools">
            <ul class="m-portlet__nav">
                <li class="m-portlet__nav-item">
                    <button class="btn btn-danger delete_all" data-url="{{ url('myproductsDeleteAll') }}">

                            <i class="la la-trash"></i>
                            <span> Delete All Selected</span>

                       </button>&nbsp


                     <a href="#" data-toggle="modal" data-target="#modal_email" class="btn btn-success m-btn m-btn--icon">
                        <span>
                            <i class="far fa-file-excel"></i>
                            <span>Import Data Alumni</span>
                        </span>
                    </a>&nbsp
                    <a href="#" data-toggle="modal" data-target="#CreateMahasiswaModal" class="btn btn-primary m-btn m-btn--icon m-btn--air">
                        <span>
                            <i class="la la-plus"></i>
                            <span>Tambah Alumni</span>
                        </span>
                    </a> &nbsp

                </li>
            </ul>
        </div>
    </div>

    <div class="modal fade" id="modal_email" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="height:50px;
                background-image: url('https://www.transparenttextures.com/patterns/sos.png');background-color: #349d44">
                <h4 style="color: #e5f6dd;margin-top:-10px" class="modal-title" id="myModalLabel"><i class="far fa-file-excel"></i> Import Data Alumni (.xls) </h4><br>
                <button style="color: #e5f6dd" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body" style="padding:0px;height: 500px;
                overflow-y: auto;">
                    <div class="m-portlet m-portlet--tabs">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text">
                                        Info Petunjuk
                                    </h3>
                                </div>
                            </div>
                            <div class="m-portlet__head-tools">
                                <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--right m-tabs-line-danger" role="tablist">
                                    <li class="nav-item m-tabs__item">
                                        <a class="nav-link m-tabs__link active show" data-toggle="tab" href="#m_portlet_tab_1_3" role="tab" aria-selected="true">
                                            Petunjuk upload
                                        </a>
                                    </li>
                                    <li class="nav-item m-tabs__item">
                                        <a class="nav-link m-tabs__link " data-toggle="tab" href="#m_portlet_tab_1_1" role="tab" aria-selected="false">
                                            Kode Fakultas
                                        </a>
                                    </li>
                                    <li class="nav-item m-tabs__item">
                                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_portlet_tab_1_2" role="tab" aria-selected="false">
                                            Kode Prodi
                                        </a>
                                    </li>

                                    <li class="nav-item m-tabs__item">
                                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_portlet_tab_1_4" role="tab" aria-selected="false">
                                            Upload Data Alumni
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="m-portlet__body">
                            <div class="tab-content">
                                <div class="tab-pane " id="m_portlet_tab_1_1">
                                    <table cellpadding="5" class="table-striped table_fakultas table table-bordered nowrap" cellspacing="0" width="100%">

                                        <thead class="m-datatable__head">
                                            <tr>

                                                <th>Kode</th>
                                                <th>Fakultas</th>

                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="tab-pane" id="m_portlet_tab_1_2">
                                    <table cellpadding="5" class="table-striped table_prodi table table-bordered nowrap" cellspacing="0" width="100%">

                                        <thead class="m-datatable__head">
                                            <tr>

                                                <th>Kode</th>
                                                <th>Prodi</th>

                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="tab-pane active show" id="m_portlet_tab_1_3">
                                        <div class="m-alert m-alert--icon m-alert--air alert alert-dismissible fade show" role="alert"
                                        style="background-color: #bf5353e0;
                                        color: white;">
                                            <div class="m-alert__icon">
                                                <i class="la
                                                la-info
                                                "></i>
                                            </div>
                                            <div class="m-alert__text">
                                                <strong>Petunjuk : </strong>
                                                Format penamaan judul npm, nama, status_baru, tahun_lulus(<i>tahun-bulan-tanggal</i>), dst. <br>
                                                 harus sesuai dengan format penamaan seperti gambar dibawah.
                                            </div>

                                        </div>
                                   <img src="public/excel_format.JPG" width="750px">

                                </div>
                                <div class="tab-pane" id="m_portlet_tab_1_4">
                                    <form action="{{ url('importAccount') }}"  method="POST" enctype="multipart/form-data">
                                        @csrf
                                      <div class="row">
                                          <div class="col-md-3">
                                                Upload File Excel :
                                          </div>
                                          <div class="col-md-9">
                                            <div class="custom-file">
                                                <input type="file" required class="custom-file-input" name="file" id="customFile">
                                                <label class="custom-file-label" for="customFile">Upload File Excel (.xlsx)</label>
                                            </div>
                                        </div>
                                      </div>


                                        <br><br><br>
                                        <button class="btn btn-success">Import Data Alumni</button>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
      </div>
    <div class="m-portlet__body">
        <table cellpadding="5" class="table-striped tabel_show table table-bordered nowrap" cellspacing="0" width="100%">

            <thead class="m-datatable__head" style="background-image: url('https://www.transparenttextures.com/patterns/sos.png');background-color: #349d44;color: #e5f6dd;">
                <tr>
                    <th width="50px"><div class="form-check">
                        <label class="m-checkbox m-checkbox--solid m-checkbox--success" for="master">
                            <input type="checkbox"  id="master" >

                            <span style="margin-top: -13px;"></span>
                        </label>
                        </div></th>
                    <th>No.</th>
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Gender</th>
                    <th>HP</th>
                    <th>email</th>
                    <th>NPWP</th>
                    <th>Aamat</th>
                    <th>Fakultas</th>
                    <th>Prodi</th>
                    <th style="width: 15%">Tahun Masuk</th>
                    <th>Status</th>
                    <th style="width: 15%">Tahun Lulus</th>
                    <th style="width: 25%">Aksi</th>
                    
                </tr>
            </thead>
        </table>
    </div>
    {{--  input data modal  --}}
    <div class="modal fade" id="CreateMahasiswaModal">
        <div class="modal-dialog modal-lg opacity-animate2" style="max-width: 50%;overflow-y: initial !important">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header" style="background-color: #4f7f4f;color:white">
                    <h6 class="modal-title" style="color: whitesmoke;height:5px;padding-bottom:7px;margin-top:-10px"><b><i class="m-menu__link-icon flaticon-user"></i> Input Mahasiswa Alumni</b></h6>
                    <button type="button" class="close" style="color: whitesmoke" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
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
                                        <label for="Name">* NPM:</label>
                                    </div>
                                    <div class="col-md-8">
                                       <input required type="text" class="form-control" placeholder="NPM.." name="npm">
                                           <input id="txtinput_kode_pt" type="hidden" class="form-control" placeholder="UNISMA" name="kode_pt" value="071027">

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="Name">* Nama:</label>
                                    </div>
                                    <div class="col-md-8">
                                       <input required type="text" class="form-control" placeholder="Nama Mahasiswa.." name="nama">

                                    </div>
                                </div>
                            </div><div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="Name">* Gender</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select id="txtinput_jk" name="jk" required
                                            class="custom-select select2 form-control" style="width:100%">
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="Name">* NIK</label>
                                        </div>
                                        <div class="col-md-8">
                                        <input id="txtinput_nik" required type="text" class="form-control" placeholder="NIK.." name="nik">

                                        </div>
                                    </div>
                                </div>                                
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="Name">* email</label>
                                        </div>
                                        <div class="col-md-8">
                                        <input id="txtinput_email" required type="text" class="form-control" placeholder="email.." name="email">

                                        </div>
                                    </div>
                                </div>                               
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="Name">* No Telp</label>
                                        </div>
                                        <div class="col-md-8">
                                        <input id="txtinput_no_hp" required type="text" class="form-control" placeholder="No Telp.." name="no_hp">

                                        </div>
                                    </div>
                                </div>                           
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="Name">* Alamat</label>
                                        </div>
                                        <div class="col-md-8">
                                        <input id="txtinput_alamat" required type="text" class="form-control" placeholder="Alamat.." name="alamat">

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="Name">* NPWP</label>
                                        </div>
                                        <div class="col-md-8">
                                        <input id="txtinput_npwp" required type="text" class="form-control" placeholder="NPWP.." name="npwp">

                                        </div>
                                    </div>
                                </div>  

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="Name">* Status Baru:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="status_baru" required id="txtinput_status_baru"
                                        class="custom-select select2 form-control" style="width:100%">
                                        <option value="Lulus">Lulus</option>
                                        <option value="belum_lulus">Belum Lulus</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="Name">* Tahun Masuk</label>
                                        </div>
                                        <div class="col-md-8">
                                        <input id="txtinput_tahun_masuk" required type="text" class="form-control" placeholder="Tahun Masuk.." name="tahun_masuk">

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="Name">* Tahun Lulus sesuai tanggal di Ijazah</label>
                                        </div>
                                        <div class="col-md-8">
                                        <input id="txtinput_tahun_lulus" required type="text" class="form-control" placeholder="Tahun Lulus.." name="tahun_lulus">

                                        </div>
                                    </div>
                                </div>

                            <div class="form-group">

                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="Name">* Fakultas:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="mhs_fakultas_id" id="txtinput_fakultas" required style="width: 100%"></select>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group prodi">

                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="Name">* Program Studi:</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="kode_prodi_id" id="txtinput_prodi" style="width: 100%"></select>

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
                    <h6 class="modal-title" style="color: whitesmoke;height:5px;padding-bottom:7px;margin-top:-10px"><b><i class="m-menu__link-icon flaticon-user"></i> Update Mahasiswa Alumni</b></h6>
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
                    <b style="color: red">*Form Ubah Mahasiswa</b>
                    <hr>
                    <form id="form_edit" enctype="multipart/form-data" method="post">
                        {!! csrf_field() !!}
                        <input type="hidden" id="txtedit_id"  class="form-control" name="id">
                        <div class="row">

                            <div class="col-md-12">

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="Name">* NPM</label>
                                        </div>
                                        <div class="col-md-8">
                                           <input id="txtedit_npm" required type="text" class="form-control" placeholder="NPM.." name="npm">
                                           <input id="txtedit_kode_pt" type="hidden" class="form-control" placeholder="UNISMA" name="kode_pt" value="071027">

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="Name">* Nama</label>
                                        </div>
                                        <div class="col-md-8">
                                           <input id="txtedit_nama" required type="text" class="form-control" placeholder="Nama Mahasiswa.." name="nama">

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="Name">* Gender</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select id="txtedit_jk" name="jk" required
                                            class="custom-select select2 form-control" style="width:100%">
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="Name">* NIK</label>
                                        </div>
                                        <div class="col-md-8">
                                        <input id="txtedit_nik" required type="text" class="form-control" placeholder="NIK.." name="nik">

                                        </div>
                                    </div>
                                </div>                                
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="Name">* email</label>
                                        </div>
                                        <div class="col-md-8">
                                        <input id="txtedit_email" required type="text" class="form-control" placeholder="email.." name="email">

                                        </div>
                                    </div>
                                </div>                               
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="Name">* No Telp</label>
                                        </div>
                                        <div class="col-md-8">
                                        <input id="txtedit_no_hp" required type="text" class="form-control" placeholder="No Telp.." name="no_hp">

                                        </div>
                                    </div>
                                </div>                           
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="Name">* Alamat</label>
                                        </div>
                                        <div class="col-md-8">
                                        <input id="txtedit_alamat" required type="text" class="form-control" placeholder="Alamat.." name="alamat">

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="Name">* NPWP</label>
                                        </div>
                                        <div class="col-md-8">
                                        <input id="txtedit_npwp" required type="text" class="form-control" placeholder="NPWP.." name="npwp">

                                        </div>
                                    </div>
                                </div>  

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="Name">* Status Baru</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select id="txtedit_status_baru" name="status_baru" required
                                            class="custom-select select2 form-control" style="width:100%">
                                            <option value="Lulus">Lulus</option>
                                            <option value="Belum lulus">Belum Lulus</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="Name">* Tahun Masuk</label>
                                        </div>
                                        <div class="col-md-8">
                                        <input id="txtedit_tahun_masuk" required type="text" class="form-control" placeholder="Tahun Masuk.." name="tahun_masuk">

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="Name">* Tahun Lulus sesuai tanggal di Ijazah</label>
                                        </div>
                                        <div class="col-md-8">
                                        <input id="txtedit_tahun_lulus" required type="text" class="form-control" placeholder="Tahun Lulus.." name="tahun_lulus">

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="Name">* Fakultas</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="mhs_fakultas_id" id="txtedit_fakultas" required
                                            class="custom-select select2 form-control" style="width:100%">
                                            </select>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="Name">* Prodi</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="kode_prodi_id" id="txtedit_prodi" required
                                            class="custom-select select2 form-control" style="width:100%">
                                            </select>

                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>


                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="SubmitEditForm">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                </div>
            </form>
            </div>
        </div>
    </div>

</div>
</div>
    {{--  modal detail  --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>

<script>

    $(document).ready(function () {

        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;

            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;

            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;

            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
        @endif

        $(".catatan").fadeOut();
        $(".hak_akses").change(function() {
            if($(this).val() == 2 || $(this).val() == 4){
                $(".catatan").fadeIn();
                $('#txtinput_id_jabatan').attr('required');
            }else{
                $(".catatan").fadeOut();
                $('#txtinput_id_jabatan').removeAttr('required');
            }
        });

        $('#txtedit_status_baru').select2({
        placeholder: 'Status Baru..',
        dropdownParent: $("#txtedit_status_baru").parent(),

        });
        $('#txtinput_status_baru').select2({
        placeholder: 'Status Baru..',
        dropdownParent: $("#txtinput_status_baru").parent(),

        });

        $('#txtedit_jk').select2({
        placeholder: 'Gender..',
        dropdownParent: $("#txtedit_jk").parent(),

        });
        $('#txtinput_jk').select2({
        placeholder: 'Gender..',
        dropdownParent: $("#txtinput_jk").parent(),
        
        });
        $('#txtedit_tahun_masuk').datepicker({
            format: 'yyyy-mm-dd'
        });
        $('#txtinput_tahun_masuk').datepicker({
            format: 'yyyy-mm-dd'
        });

        $('#txtinput_tahun_lulus').datepicker({
            format: 'yyyy-mm-dd'
        });
        $('#txtedit_tahun_lulus').datepicker({
            format: 'yyyy-mm-dd'
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


        $('#txtedit_fakultas').select2({
            placeholder: 'Pilih Fakultas',
            dropdownParent: $("#txtedit_fakultas").parent(),
            minimumResultsForSearch:1,
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
        $('#txtedit_prodi').select2({
            placeholder: 'Pilih Program Studi',
            dropdownParent: $("#txtedit_prodi").parent(),
            minimumResultsForSearch:1,
            ajax: {
              url: '{{url("/cari/prodi")}}',
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



        var table_mahasiswa = $('.tabel_show').DataTable({
        
            responsive:true,
            paging: true,
            info: true,
            searching: true,
            scrollX:        true,
			
            "aaSorting": [],
            "ordering": true,
            ajax: {
                url: '{{url("show_datatable_mahasiswa")}}',
                dataSrc: 'result',
            },

        });

        var table_fakultas = $('.table_fakultas').DataTable({
            responsive:true,
            searching: false,
            paging:false,
            autoWidth:         true,
            "aaSorting": [],
            "ordering": true,
            ajax: {
                url: '{{url("show_fakultas")}}',
                dataSrc: 'result',
            },

        });

        var table_prodi = $('.table_prodi').DataTable({
            responsive:true,
            searching: false,
            paging:false,
            autoWidth:         true,
            "aaSorting": [],
            "ordering": true,
            ajax: {
                url: '{{url("show_prodi")}}',
                dataSrc: 'result',
            },

        });

        //input data

        $('#form_submit').submit(function (event) {
            event.preventDefault();
            $('#CreateMahasiswaModal').modal('hide');
            var url = '{{ url('simpan_mahasiswa') }}';
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

        //action edit

        $('#form_edit').submit(function (event) {
            $('#modal-edit').modal('hide');
            event.preventDefault();
            var url = '{{ url('update_mahasiswa') }}';
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
            var url = '{!! url('get_mahasiswa') !!}/'+id;

            ajaxMahasiswa(url);
        });

        function ajaxMahasiswa(url){
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
                    $('.cssload-container').hide();
                    if(response.status == 'success') {
                       if(response.result != null){
                           var data = response.result;
                           $('#txtedit_id').val(data.id_mhs);
                           $('#txtedit_npm').val(data.npm);
                           $('#txtedit_kode_pt').val(data.kode_pt);
                           $('#txtedit_nama').val(data.nama);
                           $('#txtedit_nik').val(data.nik);
                           $('#txtedit_jk').val(data.jk).trigger('change');
                           $('#txtedit_no_hp').val(data.no_hp);
                           $('#txtedit_npwp').val(data.npwp);
                           $('#txtedit_email').val(data.email);
                           $('#txtedit_alamat').val(data.alamat);
                           $('#txtedit_tahun_masuk').val(data.tahun_masuk);

                           $('#txtedit_tahun_lulus').val(data.tahun_lulus);

                           var selected_kode_prodi = $("<option selected='selected'></option>").val(data.kode).text(data.prodi);
                           $("#txtedit_prodi").append(selected_kode_prodi).trigger('change');
                           var selected_kode_fakultas = $("<option selected='selected'></option>").val(data.kode_fakultas).text(data.fakultas);
                           $("#txtedit_fakultas").append(selected_kode_fakultas).trigger('change');
                           $('#txtedit_status_baru').val(data.status_baru).trigger('change');
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

        //modal detail jquery

        //delete data propinsi

        $('.tabel_show tbody').on('click', '#btn-delete', function () {
            var url = '{{ url('destroy_mahasiswa') }}';
            var id = $(this).attr('data-id');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var data_id = {_token: CSRF_TOKEN, id: id};
            delete_master(url, data_id);
        });


        function delete_master(url, data) {
            swal.fire({
                title: "Informasi !",
                text: "Apakah anda ingin menghapus data ?",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus data!'
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

        $('#master').on('click', function(e) {

            if($(this).is(':checked',true))

            {

               $(".sub_chk").prop('checked', true);

            } else {

               $(".sub_chk").prop('checked',false);

            }

           });


           $('.delete_all').on('click', function(e) {


               var allVals = [];

               $(".sub_chk:checked").each(function() {

                   allVals.push($(this).attr('data-id'));

               });


               if(allVals.length <=0)

               {

                Swal.fire({
                    title: 'Information',
                    html: 'Tidak ada data yang di pilih, Checklist terlebih dahulu untuk memilih data yang ingin dihapus.',
                    type: 'warning',
                    showConfirmButton: true,

                });

               }  else {
                swal.fire({
                    title: "Informasi !",
                    text: "Hapus data yang ada pilih ?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Hapus data!'
                }).then((result) => {
                    if(result.value)
                    {

                        var join_selected_values = allVals.join(",");


                        $.ajax({

                            url: $(this).data('url'),

                            type: 'DELETE',

                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

                            data: 'ids='+join_selected_values,

                            success: function (data) {

                                if (data['success']) {

                                    $(".sub_chk:checked").each(function() {

                                        $(this).parents("tr").remove();

                                    });

                                    Swal.fire({
                                        title: 'Success',
                                        html: '<strong>' + data['success'] + '</strong>',
                                        type: 'success',
                                        showConfirmButton: false,
                                        timer: 3000
                                    })
                                    $('.tabel_show').DataTable().ajax.reload();


                                } else if (data['error']) {

                                    alert(data['error']);

                                } else {

                                    alert('Whoops Something went wrong!!');

                                }

                            },

                            error: function (data) {

                                alert(data.responseText);

                            }

                        });


                         $.each(allVals, function( index, value ) {

                             $('table tr').filter("[data-row-id='" + value + "']").remove();

                         });
                    }
                });



               }

           });


           $('[data-toggle=confirmation]').confirmation({

               rootSelector: '[data-toggle=confirmation]',

               onConfirm: function (event, element) {

                   element.trigger('confirm');

               }

           });


           $(document).on('confirm', function (e) {

               var ele = e.target;

               e.preventDefault();


               $.ajax({

                   url: ele.href,

                   type: 'DELETE',

                   headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

                   success: function (data) {

                       if (data['success']) {

                           $("#" + data['tr']).slideUp("slow");

                           alert(data['success']);
                           $('.tabel_show').DataTable().ajax.reload();

                       } else if (data['error']) {

                           alert(data['error']);

                       } else {

                           alert('Whoops Something went wrong!!');

                       }

                   },

                   error: function (data) {

                       alert(data.responseText);

                   }

               });


               return false;

           });


    })
</script>

@endsection
