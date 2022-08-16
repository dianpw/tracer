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
                            <div class="col-md-12"><h5><i class="m-menu__link-icon flaticon-book"></i> Data Pengguna Lulusan </h5></div>

                        </div>
                    </h3>
                </div>
            </div>
        </div>

        <div class="m-portlet__body">                
            <table cellpadding="5" class="table-striped tabel_show1 table table-bordered nowrap" cellspacing="0" width="100%">
                <thead class="m-datatable__head" style="background-image: url('https://www.transparenttextures.com/patterns/sos.png');background-color: #349d44;color: #e5f6dd;">
                    <tr>
                        <th class="align-text-top">No.</th>
                        <th>Pimpinan</th>
                        <th>Perusahaan</th>
                        <th>Masukan untuk UNISMA</th>                    
                    </tr>
                </thead>
            </table>
        </div>

        <div class="m-portlet__body">   
            <table cellpadding="5" class="table-striped tabel_show2 table table-bordered nowrap" cellspacing="0" width="100%">

                <thead class="m-datatable__head" style="background-image: url('https://www.transparenttextures.com/patterns/sos.png');background-color: #349d44;color: #e5f6dd;">
                    <tr>
                        <th class="align-text-top">No.</th>
                        <th>Perusahaan</th>
                        <th>Pegawai</th>
                        <th>Masa Kerja </th>
                        <th>Gaji Awal </th>
                        <th>IPK (Skala 4)</th>                   
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

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

        $('.tabel_show1').DataTable({
        
            responsive:true,
            paging: true,
            info: true,
            searching: true,
            scrollX: true,
            
            "aaSorting": [],
            "ordering": true,
            ajax: {
                url: '{{url("datatable-pengguna-lulusan-1")}}',
                dataSrc: 'result',
            },
        });
        
        $('.tabel_show2').DataTable({
        
            responsive:true,
            paging: true,
            info: true,
            searching: true,
            scrollX: true,
			
            "aaSorting": [],
            "ordering": true,
            ajax: {
                url: '{{url("datatable-pengguna-lulusan-2")}}',
                dataSrc: 'result',
            },
        });
        
        $('.tabel_show3').DataTable({
        
            responsive:true,
            paging: true,
            info: true,
            searching: true,
            scrollX: true,
			
            "aaSorting": [],
            "ordering": true,
            ajax: {
                url: '{{url("datatable-pengguna-lulusan-3")}}',
                dataSrc: 'result',
            },
        });

    })
</script>

@endsection
