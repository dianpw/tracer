<div class="col-md-12">

    <!--begin:: Widgets/User Progress -->
    <div  class="m-portlet m-portlet--mobile" style="margin:-24px;margin-bottom:0px">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Penilaian Dosen
                    </h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_widget4_tab1_content" role="tab">
                            Today
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="m-portlet__body">
            <div class="tab-content">
                <div class="tab-pane active" id="m_widget4_tab1_content">
                    <div class="m-widget4 m-widget4--progress">
                        <table style="font-size: 12px;margin:2px">
                            <tr>
                                <td>
                                    Nama pegawai
                                </td>
                                <td>:</td>
                                <td><div id="input_nama_pegawai">&nbsp<b>{{($check_nip->nama_pegawai)}}</b></div></td>
                            </tr>
                            <tr>
                                <td>
                                   NIP
                                </td>
                                <td>:</td>
                                <td><div id="input_nama_pegawai">&nbsp<b>{{($check_nip->nip)}}</b></div></td>
                            </tr>
                            {{-- <tr>
                                <td>
                                    Jabatan
                                </td>
                                <td>:</td>
                                <td><div id="input_jabatan">&nbsp<b>{{($check_nip->jenis_pegawai)}}</b></div></td>
                            </tr> --}}
                            <tr>
                                <td>
                                    Program Studi
                                </td>
                                <td>:</td>
                                <td><div id="input_program_studi">&nbsp<b>{{($check_nip->bidang_studi)}}</b></div></td>
                            </tr>
                        </table>
                        <br>
                        <hr>
                        <div class="m-widget4__item" style="width: 100%">
                            <div class="m-widget4__img m-widget4__img--pic">
                                <i class="flaticon-line-graph"></i>
                            </div>
                            <div class="m-widget4__info">
                                <span class="m-widget4__title">
                                    Predikat : Istimewa
                                </span><br>
                                <span class="m-widget4__sub">
                                    Jan - Mar 2020
                                </span>
                            </div>
                            <div class="m-widget4__progress">
                                <span class="m-widget17__progress-number">63%</span>
                                <div class="progress">

                                    <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="m-widget4__ext">
                                <a href="#" class="btn btn-primary btn-sm m-btn  m-btn m-btn--icon m-btn--pill">
                                    <span>
                                        <i class="la la-archive"></i>
                                        <span>Detail</span>
                                    </span>
                                </a>
                            </div>
                        </div>

                        <div class="m-widget4__item" style="width: 100%">
                            <div class="m-widget4__img m-widget4__img--pic">
                                <i class="flaticon-line-graph"></i>
                            </div>
                            <div class="m-widget4__info">
                                <span class="m-widget4__title">
                                    Jan - Mar 2020
                                </span><br>
                                <span class="m-widget4__sub">
                                    Jan - Mar 2020
                                </span>
                            </div>
                            <div class="m-widget4__progress">
                                <span class="m-widget17__progress-number">63%</span>
                                <div class="progress">

                                    <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="m-widget4__ext">
                                <a href="#" class="btn btn-primary btn-sm m-btn  m-btn m-btn--icon m-btn--pill">
                                    <span>
                                        <i class="la la-archive"></i>
                                        <span>Detail</span>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="m-widget4__item" style="width: 100%">
                            <div class="m-widget4__img m-widget4__img--pic">
                                <i class="flaticon-line-graph"></i>
                            </div>
                            <div class="m-widget4__info">
                                <span class="m-widget4__title">
                                    Jan - Mar 2020
                                </span><br>
                                <span class="m-widget4__sub">
                                    Jan - Mar 2020
                                </span>
                            </div>
                            <div class="m-widget4__progress">
                                <span class="m-widget17__progress-number">63%</span>
                                <div class="progress">

                                    <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="m-widget4__ext">
                                <a href="#" class="btn btn-primary btn-sm m-btn  m-btn m-btn--icon m-btn--pill">
                                    <span>
                                        <i class="la la-archive"></i>
                                        <span>Detail</span>
                                    </span>
                                </a>
                            </div>
                        </div>

                        <div class="m-widget4__item">
                            <div class="m-widget4__img m-widget4__img--pic">
                                <i class="flaticon-line-graph"></i>
                            </div>
                            <div class="m-widget4__info">
                                <span class="m-widget4__title">
                                    Jan - Mar 2020
                                </span><br>
                                <span class="m-widget4__sub">
                                    Istimewa
                                </span>
                            </div>
                            <div class="m-widget4__progress">
                                <span class="m-widget17__progress-number">63%</span>
                                <div class="progress">

                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="m-widget4__ext">
                                <a href="#" class="btn btn-primary btn-sm m-btn  m-btn m-btn--icon m-btn--pill">
                                    <span>
                                        <i class="la la-archive"></i>
                                        <span>Detail</span>
                                    </span>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="tab-pane" id="m_widget4_tab2_content">
                </div>
                <div class="tab-pane" id="m_widget4_tab3_content">
                </div>
            </div>
        </div>
    </div>

    <!--end:: Widgets/User Progress -->
</div>
