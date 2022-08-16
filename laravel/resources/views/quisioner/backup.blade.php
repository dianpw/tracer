<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=400">
    <title>Tracer Study - UNISMA</title>
    <link rel = "icon" href ="../images/logounisma.png">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz&display=swap" rel="stylesheet">
        <link href="https://cdn.muicss.com/mui-0.5.3/css/mui.min.css" rel="stylesheet" type="text/css" />
        <script src="https://cdn.muicss.com/mui-0.5.3/js/mui.min.js"></script>
           <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../style_quisioner.css" rel="stylesheet" type="text/css" />
        <link href="https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
			WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>
        <style>
        /* START - Tambah Untuk Font */
            @import url("https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700");
            @import url("https://fonts.googleapis.com/css?family=Roboto:400,300,500,700");
            @font-face {
                    font-family: 'Glyphicons Halflings';
                    src: url('../fonts/glyphicons-halflings-regular.eot');
                    src: url('../fonts/glyphicons-halflings-regular.eot?#iefix') format('embedded-opentype'), url('../fonts/glyphicons-halflings-regular.woff2') format('woff2'), url('../fonts/glyphicons-halflings-regular.woff') format('woff'), url('../fonts/glyphicons-halflings-regular.ttf') format('truetype'), url('../fonts/glyphicons-halflings-regular.svg') format('svg');
                    }
            body {
                    margin: 0;
                    font-family: "open sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
                    background-color: #2f4050;
                    font-size: 12px;
                    color: #676a6c;
                    overflow-x: hidden;
                    }
            .monospace {
                /* font-family: Impact, Charcoal, sans-serif; */
                font-family:"open sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
                font-size:11pt;
              }
        /* END - Tambah Untuk Font */

            .card-header {
                padding: 15px 10px 20px 20px;
                background: #4ba859;
                color: white;
              }
              .form-check{
                  font-size:12px;
              }
              [type="radio"]:not(:checked) + label, [type="radio"]:checked + label {
                position: relative;
                padding-left: 35px;
                cursor: pointer;
                display: inline-block;
                height: 25px;
                line-height: 25px;
                font-size: 14px;
                transition: .8s ease;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            [type="checkbox"] + label {
                position: relative;
                padding-left: 35px;
                cursor: pointer;
                display: inline-block;
                height: 28px;
                line-height: 25px;
                font-size: 14px;
                -webkit-user-select: none;
                -moz-user-select: none;
                -khtml-user-select: none;
                -ms-user-select: none;
            }
             .header {
                padding: 10px 16px;
                background: #accc96;;
                color: #f1f1f1;
                height: 72px;
                width:175%;
              }


              .content {
                padding: 16px;
                z-index: 1;
              }

              .sticky {
                position: fixed;
                top: 0;
                width: 100%;
                z-index: 1;
              }

              .sticky + .content {
                padding-top: 102px;
                z-index: 1;
              }
              .img_logo{
                  width: 272px;
              }
            @media only screen and (max-width: 400px) {
                [type="checkbox"] + label {
                    position: relative;
                    padding-left: 35px;
                    cursor: pointer;
                    display: inline-block;
                    height: 28px;
                    line-height: 25px;
                    font-size: 18px;
                    -webkit-user-select: none;
                    -moz-user-select: none;
                    -khtml-user-select: none;
                    -ms-user-select: none;
                }

                [type="radio"]:not(:checked) + label, [type="radio"]:checked + label {
                position: relative;
                padding-left: 35px;
                cursor: pointer;
                display: inline-block;
                height: 25px;
                line-height: 25px;
                font-size: 18px;
                transition: .8s ease;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }
                .input-field{
                    font-size: 18px;
                }

                .card-title{
                    font-size: 20px;
                }
                b{
                     font-size: 20px;
                }
                .logo-tracer{
                    width: 460px;
                }

                .header {

                background: #accc96;;
                color: #f1f1f1;
                height: 101px;
                width:173%;
              }
              .img_logo{
                  width: 375px;
                  margin-top:0px
              }

              }



        </style>
    </head>
    <html>
    <body>
    <div class=" header" id="myHeader">
        <h5 style="
          margin-top:-25px"><b>
             <h5 id="title"> <img class="img_logo" src="../LogoTraceStudy.png" ></h5></b> </h5>
            
    </div>
    <section class="form-card container monospace">
        <div class="image-container" style="z-index:-1">
          <header>


            <hr>


                <!--START - Edit Untuk Tampilan Data Mhs -->
                <table style="font-size: 14px;line-height: 0px;color:#000">
                    <tr >
                        <td ><b>NPM</b></td>
                        <td>&nbsp:</td>
                        <td ><b> {{$data_mhs->npm}}</b></td>
                    </tr>

                    <tr>
                        <td><b>Nama</b></td>
                        <td>&nbsp:</td>
                        <td><b> {{$data_mhs->nama}}</b></td>
                    </tr>
                    <tr>
                        <td><b>Tahun Lulus</b></td>
                        <td>&nbsp:</td>
                        <td><b> {{$data_mhs->tahun_lulus}}</b></td>
                    </tr>
                    <tr>
                        <td><b>Kode PT</b></td>
                        <td>&nbsp:</td>
                        <td><b> {{$data_mhs->kode_pt}}</b></td>
                    </tr>
                </table>
                <!-- END - Edit Untuk Tampilan Data Mhs -->

          </header>

          <p class="footer-bottom">Designed By Unisma <span class="heart"></span>

        </div>
        <div class="form-container" style="z-index:0">
            <div class="card-header" style="margin-top: -8px;width: 103%;
            margin-left: -17px;border-radius:3px;background-color:whitesmoke;height:70px">
                <span class="card-title">
                    <h5 style="color: #697870;margin-top:3px"><b>Form Tracer Study Alumni</b></h5>
                </span>

              </div>

            <hr style="color:brown">
          <form id="survey-form" method="POST" action="{{url('submit-tracer')}}">

              @csrf

              <input type="hidden" value="{{$data_mhs->npm}}" name="npm">
                <div class = "card-panel responsive-card">
                    <div class="card-header" style="margin-top: -19px;width: 107%;
                    margin-left: -20px;border-radius:3px">
                        <span class="card-title"><b>Isi Data berikut</b></span>

                    </div>

                    <blockquote style="border-left: 5px solid white;">
                        <div class="row" style="margin-bottom: -20px">
                            <div class="col s12">
                              <div class="row">
                                <div class="input-field col s12">
                               <b>* Alamat Email</b><br>
                                  <input type="text"  name="email" required placeholder="Jawaban Anda" class="autocomplete">

                                </div>
                              </div>
                            </div>
                          </div>
                        <div class="row">
                            <div class="col s12">
                                <div class="row" >
                                    <div class="input-field col s12" >
                                    <b>* Jenis Kelamin</b><br>
                                    <div class="form-check" style="margin-left: -15px;">
                                        <input class="form-check-input " type="radio" name="jeniskelamin" id="jeniskelamin" value="sangat besar">
                                        <label class="form-check-label" for="jeniskelamin">
                                        Perempuan
                                        </label>
                                    </div>
                                    <div class="form-check" style="margin-left: -15px;">
                                        <input class="form-check-input " type="radio" name="jeniskelamin" id="jeniskelamin2" value="besar">
                                        <label class="form-check-label" for="jeniskelamin2">
                                    Laki-laki
                                        </label>
                                    </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: -20px">
                            <div class="col s12">
                              <div class="row">
                                <div class="input-field col s12">
                               <b>* No HP (Whatsapp)</b><br>
                                  <input type="text" name="no_whatsapp" required placeholder="Jawaban Anda" class="autocomplete">

                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row" style="margin-bottom: -20px">
                            <div class="col s12">
                              <div class="row">
                                <div class="input-field col s12">
                               <b>* Alamat</b><br>
                                  <input type="text" name="alamat" required placeholder="Jawaban Anda" class="autocomplete">

                                </div>
                              </div>
                            </div>
                          </div>
                    </blockquote>
                </div>
              <div class = "card-panel responsive-card">
                <div class="card-header" style="margin-top: -19px;width: 107%;
                    margin-left: -20px;border-radius:3px">
                    <span class="card-title"><b>KEAKTIVAN DALAM ORGANISASI KEMAHASISWAAN</b></span>

                  </div>

                <blockquote style="border-left: 5px solid #86b080;">
                    <div class="row">
                        <div class="col-md-12" style="padding: 15px">
                            <b>Organisasi kemahasiswaan apa yang pernah Saudara ikuti saat kuliah di UNISMA
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </b><br><br>
                            <div class="col-md-9">

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="DewanPermusyawaratan" value="Dewan Permusyawaratan Mahasiswa Universitas">
                                        <label class="form-check-label" for="DewanPermusyawaratan">
                                            Dewan Permusyawaratan Mahasiswa Universitas (DPMU)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="BadanEksekutif" value="Badan Eksekutif Mahasiswa Universitas">
                                        <label class="form-check-label" for="BadanEksekutif">
                                            Badan Eksekutif Mahasiswa Universitas (BEMU)
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="SI" value="UKM Seni Islami">
                                        <label class="form-check-label" for="SI">
                                            UKM Seni Islami (SI)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="JQH" value="UKM jam'iyyatul Qurro'Wal Huffadz">
                                        <label class="form-check-label" for="JQH">
                                           UKM jam'iyyatul Qurro'Wal Huffadz (JQH) 4
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="MATAN" value="MATAN">
                                        <label class="form-check-label" for="MATAN">
                                           UKM Mahasiswa Ahli Thoriq An-Nahdliyah (MATAN)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="PagarNusa" value="UKM Ikatan Pencak Silat NU">
                                        <label class="form-check-label" for="PagarNusa">
                                            UKM Ikatan Pencak Silat NU "Pagar Nusa"
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="Photography" value="UKM Panorama Photography">
                                        <label class="form-check-label" for="Photography">
                                            UKM Panorama Photography
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="PSM_BA" value="PSM-BA">
                                        <label class="form-check-label" for="PSM_BA">
                                            Paduan Suara Mahasiswa "Bunga Almamater" (PSM-BA)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="KSR_PMI" value="KSR-PMI">
                                        <label class="form-check-label" for="KSR_PMI">
                                            UKM Korps Suka Rela Palang Merah Indonesia (KSR-PMI)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="KOPMA" value="KOPMA">
                                        <label class="form-check-label" for="KOPMA">
                                            UKM Koperasi Mahasiswa (KOPMA)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="Pramuka" value="UKM Pramuka">
                                        <label class="form-check-label" for="Pramuka">
                                            UKM Pramuka
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="Olahraga" value="UKM Olahraga">
                                        <label class="form-check-label" for="Olahraga">
                                            UKM Olahraga
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="Musik_Gaung" value="UKM Musik Gaung 193">
                                        <label class="form-check-label" for="Musik_Gaung">
                                            UKM Musik Gaung 193
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="Teater" value="UKM Komunitas Teater">
                                        <label class="form-check-label" for="Teater">
                                           UKM Komunitas Teater
                                        </label>
                                    </div>
                                     <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="RPA" value="RPA">
                                        <label class="form-check-label" for="RPA">
                                           UKM pecinta Alam "Ranti Pager Aji"(RPA)
                                        </label>
                                    </div>
                                     <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="Melati_Sekar_Langit" value=" UKM Seni Tari">
                                        <label class="form-check-label" for="Melati_Sekar_Langit">
                                           UKM Seni Tari "Melati Sekar Langit"
                                        </label>
                                    </div>
                                     <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="Cinta_Tanah_Air" value=" UKM Cinta Tanah Air">
                                        <label class="form-check-label" for="Cinta_Tanah_Air">
                                           UKM Cinta Tanah Air
                                        </label>
                                    </div>
                                     <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="FAI" value="FAI">
                                        <label class="form-check-label" for="FAI">
                                           DPM Fakultas Agama islam (FAI)
                                        </label>
                                    </div>
                                     <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="FH" value="FH">
                                        <label class="form-check-label" for="FH">
                                          DPM Fakultas Hukum (FH)
                                        </label>
                                    </div>
                                     <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="FP" value="FP">
                                        <label class="form-check-label" for="FP">
                                           DPM Fakultas Pertanian (FP)
                                        </label>
                                    </div>
                                     <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="FAPET" value="FAPET">
                                        <label class="form-check-label" for="FAPET">
                                           DPM Fakultas Peternakan (FAPET)
                                        </label>
                                    </div>
                                     <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="FT" value="FT">
                                        <label class="form-check-label" for="FT">
                                           DPM Fakultas Teknik (FT)
                                        </label>
                                    </div>
                                     <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="FMIPA" value="FMIPA">
                                        <label class="form-check-label" for="FMIPA">
                                          DPM Fakultas Matematika dan Ilmu Pengetahuan Alam (FMIPA)
                                        </label>
                                    </div>
                                     <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="FKIP" value="FKIP">
                                        <label class="form-check-label" for="FKIP">
                                           DPM Fakultas Keguruan dan Ilmu Pendidikan (FKIP)
                                        </label>
                                    </div>
                                     <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="FIA" value="FIA">
                                        <label class="form-check-label" for="FIA">
                                          DPM Fakultas Ilmu Administrasi (FIA)
                                        </label>
                                    </div>
                                     <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="FK" value="FK">
                                        <label class="form-check-label" for="FK">
                                           DPM Fakultas Kedokteran (FK)
                                        </label>
                                    </div>
                                     <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="BEMFAI" value="BEM Fakultas Agama Islam">
                                        <label class="form-check-label" for="BEMFAI">
                                           BEM Fakultas Agama Islam (FAI)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="BEMFH" value="BEM Fakultas Hukum (FH)">
                                        <label class="form-check-label" for="BEMFH">
                                        BEM Fakultas Hukum (FH)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="BEMFP" value="BEM Fakultas Pertanian (FP)">
                                        <label class="form-check-label" for="BEMFP">
                                           BEM Fakultas Pertanian (FP)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="BEMFAPET" value="BEM Fakultas Peternakan (FAPET)">
                                        <label class="form-check-label" for="BEMFAPET">
                                           BEM Fakultas Peternakan (FAPET)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="BEMFT" value="BEM Fakultas Teknik (FT)">
                                        <label class="form-check-label" for="BEMFT">
                                           BEM Fakultas Teknik (FT)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="BEMFMIPA" value="BEM Fakultas Matematika dan Ilmu Pengetahuan Alam">
                                        <label class="form-check-label" for="BEMFMIPA">
                                           BEM Fakultas Matematika dan Ilmu Pengetahuan Alam (FMIPA)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="FKIPBEM" value="BEM Fakultas Keguruan dan Ilmu Pendidikan (FKIP)">
                                        <label class="form-check-label" for="FKIPBEM">
                                           BEM Fakultas Keguruan dan Ilmu Pendidikan (FKIP)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="BEMFIA" value="BEM Fakultas Ilmu Administrasi (FIA)">
                                        <label class="form-check-label" for="BEMFIA">
                                          BEM Fakultas Ilmu Administrasi (FIA)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="BEMFK" value="BEM Fakultas Kedokteran (FK)">
                                        <label class="form-check-label" for="BEMFK">
                                           BEM Fakultas Kedokteran (FK)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="BSO" value="BSO (Badan Semi Ortonom)">
                                        <label class="form-check-label" for="BSO">
                                           BSO (Badan Semi Ortonom)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="Agama_Islam" value="Himaprodi Pend.Agama Islam">
                                        <label class="form-check-label" for="Agama_Islam">
                                           Himaprodi Pend.Agama Islam
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="HukumIslam" value="Himaprodi Hukum Islam">
                                        <label class="form-check-label" for="HukumIslam">
                                           Himaprodi Hukum Islam
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="PGMI" value="Himaprodi PGMI">
                                        <label class="form-check-label" for="PGMI">
                                           Himaprodi PGMI
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="PGRA" value="Himaprodi PGRA">
                                        <label class="form-check-label" for="PGRA">
                                         Himaprodi PGRA
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="Ilmu Hukum" value="Himaprodi Ilmu Hukum">
                                        <label class="form-check-label" for="Ilmu Hukum">
                                           Himaprodi Ilmu Hukum
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="Agroteknologi" value="Himaprodi Agroteknologi">
                                        <label class="form-check-label" for="Agroteknologi">
                                           Himaprodi Agroteknologi
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="HimaprodiAgribisnis" value="Himaprodi Agribisnis">
                                        <label class="form-check-label" for="HimaprodiAgribisnis">
                                           Himaprodi Agribisnis
                                        </label>
                                    </div>
                                     <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="HimaprodiPeternakan" value="Himaprodi Peternakan">
                                        <label class="form-check-label" for="HimaprodiPeternakan">
                                           Himaprodi Peternakan
                                        </label>
                                    </div>
                                     <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="TeknikSipil" value="Himaprodi Teknik Sipil">
                                        <label class="form-check-label" for="TeknikSipil">
                                          Himaprodi Teknik Sipil
                                        </label>
                                    </div>
                                     <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="TeknikMesin" value="Himaprodi Teknik Mesin">
                                        <label class="form-check-label" for="TeknikMesin">
                                          Himaprodi Teknik Mesin
                                        </label>
                                    </div>
                                     <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="TeknikElektro" value="Himaprodi Teknik Elektro">
                                        <label class="form-check-label" for="TeknikElektro">
                                           Himaprodi Teknik Elektro
                                        </label>
                                    </div>
                                     <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="HimaprodiBiologi" value="Himaprodi Biologi">
                                        <label class="form-check-label" for="HimaprodiBiologi">
                                           Himaprodi Biologi
                                        </label>
                                    </div>
                                     <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="BahasadanSastraIndonesia" value="Himaprodi Pendidikan Bahasa dan Sastra Indonesia">
                                        <label class="form-check-label" for="BahasadanSastraIndonesia">
                                          Himaprodi Pendidikan Bahasa dan Sastra Indonesia
                                        </label>
                                    </div>
                                     <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="PendidikanMatematika" value="Himaprodi Pendidikan Matematika">
                                        <label class="form-check-label" for="PendidikanMatematika">
                                          Himaprodi Pendidikan Matematika
                                        </label>
                                    </div>
                                     <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="Inggris" value="Himaprodi Pendidikan Bahasa Inggris">
                                        <label class="form-check-label" for="Inggris">
                                          Himaprodi Pendidikan Bahasa Inggris
                                        </label>
                                    </div>
                                     <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="Akuntansi" value="Himaprodi Akuntansi">
                                        <label class="form-check-label" for="Akuntansi">
                                          Himaprodi Akuntansi
                                        </label>
                                    </div>
                                     <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="ManajemenHimaprodi" value="Himaprodi Manajemen">
                                        <label class="form-check-label" for="ManajemenHimaprodi">
                                          Himaprodi Manajemen
                                        </label>
                                    </div>
                                     <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="PerbankanSyariah" value="Himaprodi Perbankan Syariah">
                                        <label class="form-check-label" for="PerbankanSyariah">
                                         Himaprodi Perbankan Syariah
                                        </label>
                                    </div>
                                     <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="AdministrasiNegara" value="Himaprodi Ilmu Administrasi Negara">
                                        <label class="form-check-label" for="AdministrasiNegara">
                                           Himaprodi Ilmu Administrasi Negara
                                        </label>
                                    </div>
                                     <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="AdministrasiNiaga" value="Himaprodi Ilmu Administrasi Niaga">
                                        <label class="form-check-label" for="AdministrasiNiaga">
                                          Himaprodi Ilmu Administrasi Niaga
                                        </label>
                                    </div>
                                     <div class="form-check">
                                        <input class="form-check-input " type="checkbox" name="organisasi_dalam_kemahasiswaan[]" id="HimaprodiPendidikanDokter" value="Himaprodi Pendidikan Dokter">
                                        <label class="form-check-label" for="HimaprodiPendidikanDokter">
                                          Himaprodi Pendidikan Dokter
                                        </label>
                                    </div>
                                    {{--  <input type="button" name="reset_organisasi_kemahasiswaan" id="reset_organisasi_kemahasiswaan" value="Reset_organisasi_kemahasiswaan" />                                  --}}
                                    <br>



                            </div>
                        </div>
                    </div>
                </blockquote>
                   <div align="right" style="z-index:5;">
                        <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_organisasi_kemahasiswaan" type="button" name="HimaprodiPendidikanDokter"><b>Clear Selection</b>

                        </button>
                    </div>
             </div>

            <div class = "card-panel responsive-card">
                <blockquote style="border-left: 5px solid #86b080;">
                    <div class="row">
                        <div class="col-md-12" style="padding: 15px">
                            <b>Kemukakan kedudukan Saudara sebagai pengurus kegiatan organisasi kemahasiswaan yang pernah Saudara ikuti:</b>
                            <br><br>
                                <div class="form-check">
                                    <input class="form-check-input " type="radio" name="kedudukansaudara" id="kedudukansaudara" value="Sebagai ketua">
                                    <label class="form-check-label" for="kedudukansaudara">
                                    Sebagai ketua
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input " type="radio" name="kedudukansaudara" id="kedudukansaudara2" value="Sebagai wakil ketua">
                                    <label class="form-check-label" for="kedudukansaudara2">
                                    Sebagai wakil ketua
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input " type="radio" name="kedudukansaudara" id="kedudukansaudara3" value="Sebagai sekretaris/bendahara">
                                    <label class="form-check-label" for="kedudukansaudara3">
                                    Sebagai sekretaris/bendahara
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input " type="radio" name="kedudukansaudara" id="kedudukansaudara4" value="Sebagai koordinator divisi/seksi">
                                    <label class="form-check-label" for="kedudukansaudara4">
                                    Sebagai koordinator divisi/seksi
                                    </label>
                                </div>
                                <br>
                                <div align="right">
                                    <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_kemukakan_kedudukan_saudara" type="button"><b>Clear Selection</b>

                                    </button>
                                </div>

                        </div>
                    </div>
                </blockquote>
            </div>

            <div class = "card-panel responsive-card">
                <blockquote style="border-left: 5px solid #86b080;">
                    <div class="row">
                        <div class="col-md-12" style="padding: 15px">
                            <b>Berapa kali saudara menjadi panitia kegiatan organisasi kemahasiswaan pada saat kuliah di UNISMA</b>
                                <br><br>
                                <div class="form-check">
                                    <input class="form-check-input " type="radio" name="panitiakegiatan" id="panitiakegiatan" value="> dari 3 kali">
                                    <label class="form-check-label" for="panitiakegiatan">
                                    > dari 3 kali
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input " type="radio" name="panitiakegiatan" id="panitiakegiatan2" value="3 kali">
                                    <label class="form-check-label" for="panitiakegiatan2">
                                    3 kali
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input " type="radio" name="panitiakegiatan" id="panitiakegiatan3" value="2 kali">
                                    <label class="form-check-label" for="panitiakegiatan3">
                                   2 kali
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input " type="radio" name="panitiakegiatan" id="panitiakegiatan4" value="1 kali">
                                    <label class="form-check-label" for="panitiakegiatan4">
                                   1 kali
                                    </label>
                                </div>
                                <br>
                                <div align="right">
                                    <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_kegiatan_organisasi_kemahasiswaan" type="button" name="HimaprodiPendidikanDokter"><b>Clear Selection</b>

                                    </button>
                                </div>

                        </div>
                    </div>
                </blockquote>
            </div>

            <div class = "card-panel responsive-card">
                <blockquote style="border-left: 5px solid #86b080;">
                    <div class="row">
                        <div class="col-md-12" style="padding: 15px">
                            <b>Apakah Saudara mengikuti organisasi kemahasiswaan berbasis ke NU an? &nbsp;&nbsp;
                                &nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </b>
                                <br><br>
                                <div class="form-check">
                                    <input class="form-check-input " type="radio" name="organisasikemahasiswaanNU" id="organisasikemahasiswaanNU" value="YA">
                                    <label class="form-check-label" for="organisasikemahasiswaanNU">
                                    YA
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input " type="radio" name="organisasikemahasiswaanNU" id="organisasikemahasiswaanNU2" value="Tidak">
                                    <label class="form-check-label" for="organisasikemahasiswaanNU2">
                                   Tidak
                                    </label>
                                </div>
                                <br>
                                <div align="right">
                                    <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_kemahasiswaan_nu" type="button" name="HimaprodiPendidikanDokter"><b>Clear Selection</b>

                                    </button>
                                </div>

                        </div>
                    </div>
                </blockquote>
            </div>


            <div class = "card-panel responsive-card">
                <blockquote style="border-left: 5px solid #86b080;">
                    <div class="row">
                        <div class="col-md-12" style="padding: 15px">
                            <b style="margin-top:120px">Jika YA

                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </b>
                                <br><br>
                                <div class="form-check">
                                    <input class="form-check-input " type="radio" name="organisasiNU" id="organisasiNU" value="PMII">
                                    <label class="form-check-label" for="organisasiNU">
                                   PMII
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input " type="radio" name="organisasiNU" id="organisasiNU2" value="IPNU/IPPNU">
                                    <label class="form-check-label" for="organisasiNU2">
                                   IPNU/IPPNU
                                    </label>
                                </div>
                                 <div class="form-check">
                                    <input class="form-check-input " type="radio" name="organisasiNU" id="organisasiNU3" value="FATAYAT">
                                    <label class="form-check-label" for="organisasiNU3">
                                   FATAYAT
                                    </label>
                                </div>
                                 <div class="form-check">
                                    <input class="form-check-input " type="radio" name="organisasiNU" id="organisasiNU4" value="ANSOR">
                                    <label class="form-check-label" for="organisasiNU4">
                                   ANSOR
                                    </label>
                                </div>
                                 <div class="form-check">
                                    <input class="form-check-input " type="radio" name="organisasiNU" id="organisasiNU5" value="MUSLIMAT">
                                    <label class="form-check-label" for="organisasiNU5">
                                   MUSLIMAT
                                    </label>
                                </div>

                                <br>
                                <div align="right">
                                    <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_iya_nu" type="button"><b>Clear Selection</b>

                                    </button>
                                </div>


                        </div>
                      </div>
                </blockquote>
            </div>

            <div class = "card-panel responsive-card">
                <blockquote style="border-left: 5px solid #86b080;">
                    <div class="row">
                        <div class="col-md-12" style="padding: 15px">
                            <b>Kemukakan kedudukan Saudara sebagai pengurus organisasi kemahasiswaan berbasis ke-Nu-an yang pernah Saudara ikuti: </b>
                                <br><br>
                                <div class="form-check">
                                    <input class="form-check-input " type="radio" name="kemukakankedudukanpengurusorganisasi" id="kemukakankedudukanpengurusorganisasi" value="sebagai ketua">
                                    <label class="form-check-label" for="kemukakankedudukanpengurusorganisasi">
                                    sebagai ketua
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input " type="radio" name="kemukakankedudukanpengurusorganisasi" id="kemukakankedudukanpengurusorganisasi2" value="sebagai wakil ketua">
                                    <label class="form-check-label" for="kemukakankedudukanpengurusorganisasi2">
                                    sebagai wakil ketua
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input " type="radio" name="kemukakankedudukanpengurusorganisasi" id="kemukakankedudukanpengurusorganisasi3" value="sebagai sekretaris/bendahara">
                                    <label class="form-check-label" for="kemukakankedudukanpengurusorganisasi3">
                                    sebagai sekretaris/bendahara
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input " type="radio" name="kemukakankedudukanpengurusorganisasi" id="kemukakankedudukanpengurusorganisasi4" value="sebagai koordinator divisi/seksi">
                                    <label class="form-check-label" for="kemukakankedudukanpengurusorganisasi4">
                                    sebagai koordinator divisi/seksi
                                    </label>
                                </div>
                                <div align="right">
                                    <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_kemukakankedudukanpengurusorganisasi" type="button"><b>Clear Selection</b>

                                    </button>
                                </div>


                        </div>
                      </div>
                </blockquote>
            </div>



            <div class = "card-panel responsive-card">
                <blockquote style="border-left: 5px solid #86b080;">
                    <div class="row">
                        <div class="col-md-12" style="padding: 15px">
                            <b>Berapa kali Saudara menjadi panitia dalam organisasi kemahasiswaan berbasis Ke-NU-an:</b>
                                <br><br>
                               <div class="form-check">
                                    <input class="form-check-input " type="radio" name="BerapakaliSaudaramenjadipanitiadalamorganisasi" id="BerapakaliSaudaramenjadipanitiadalamorganisasi" value="> dari 3 kali">
                                    <label class="form-check-label" for="BerapakaliSaudaramenjadipanitiadalamorganisasi">
                                    > dari 3 kali
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input " type="radio" name="BerapakaliSaudaramenjadipanitiadalamorganisasi" id="BerapakaliSaudaramenjadipanitiadalamorganisasi2" value="3 kali">
                                    <label class="form-check-label" for="BerapakaliSaudaramenjadipanitiadalamorganisasi2">
                                    3 kali
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input " type="radio" name="BerapakaliSaudaramenjadipanitiadalamorganisasi" id="BerapakaliSaudaramenjadipanitiadalamorganisasi3" value="2 kali">
                                    <label class="form-check-label" for="BerapakaliSaudaramenjadipanitiadalamorganisasi3">
                                   2 kali
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input " type="radio" name="BerapakaliSaudaramenjadipanitiadalamorganisasi" id="BerapakaliSaudaramenjadipanitiadalamorganisasi4" value="1 kali">
                                    <label class="form-check-label" for="BerapakaliSaudaramenjadipanitiadalamorganisasi4">
                                   1 kali
                                    </label>
                                </div>
                                <br>
                                <div align="right">
                                    <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_BerapakaliSaudaramenjadipanitiadalamorganisasi" type="button"><b>Clear Selection</b>

                                    </button>
                                </div>


                        </div>
                      </div>
                </blockquote>
            </div>

            <div class = "card-panel responsive-card">
                <div class="card-header" style="margin-top: -19px;width: 107%;
                    margin-left: -20px;border-radius:3px">
                    <span class="card-title"><b>Data Tracer</b></span>

                  </div>

                <blockquote style="border-left: 5px solid #87c2c0;">
                    <div class="row">
                        <div class="col-md-12" style="padding: 15px">
                            <b>Menurut Anda seberapa besar penekanan pada metode pembelajaran di bawah ini dilaksanakan di program studi Anda?</b>
                                <table class="lefted highlight">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Sangat Besar</th>
                                        <th>Besar</th>
                                        <th>Cukup</th>
                                        <th>Kecil</th>
                                        <th>Sangat Kecil</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr>
                                        <td>Kuliah</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="kuliah" id="kuliah1" value="sangat besar">
                                            <label class="form-check-label" for="kuliah1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kuliah" id="kuliah2" value="besar">
                                                <label class="form-check-label" for="kuliah2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kuliah" id="kuliah3" value="cukup besar">
                                                <label class="form-check-label" for="kuliah3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kuliah" id="kuliah4" value="kurang">
                                                <label class="form-check-label" for="kuliah4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kuliah" id="kuliah5" value="tidak sama sekali">
                                                <label class="form-check-label" for="kuliah5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Responsi dan tutorial</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="responsi" id="responsi1" value="sangat besar">
                                            <label class="form-check-label" for="responsi1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="responsi" id="responsi2" value="besar">
                                                <label class="form-check-label" for="responsi2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="responsi" id="responsi3" value="cukup besar">
                                                <label class="form-check-label" for="responsi3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="responsi" id="responsi4" value="kurang">
                                                <label class="form-check-label" for="responsi4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="responsi" id="responsi5" value="tidak sama sekali">
                                                <label class="form-check-label" for="responsi5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Seminar</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="seminar" id="seminar1" value="sangat besar">
                                            <label class="form-check-label" for="seminar1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="seminar" id="seminar2" value="besar">
                                                <label class="form-check-label" for="seminar2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="seminar" id="seminar3" value="cukup besar">
                                                <label class="form-check-label" for="seminar3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="seminar" id="seminar4" value="kurang">
                                                <label class="form-check-label" for="seminar4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="seminar" id="seminar5" value="tidak sama sekali">
                                                <label class="form-check-label" for="seminar5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Praktikum, praktik studio, praktik bengkel</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="praktikum_praktik" id="praktikum_praktik1" value="sangat besar">
                                            <label class="form-check-label" for="praktikum_praktik1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="praktikum_praktik" id="praktikum_praktik2" value="besar">
                                                <label class="form-check-label" for="praktikum_praktik2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="praktikum_praktik" id="praktikum_praktik3" value="cukup besar">
                                                <label class="form-check-label" for="praktikum_praktik3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="praktikum_praktik" id="praktikum_praktik4" value="kurang">
                                                <label class="form-check-label" for="praktikum_praktik4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="praktikum_praktik" id="praktikum_praktik5" value="tidak sama sekali">
                                                <label class="form-check-label" for="praktikum_praktik5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Praktek lapangan, praktik kerja</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="praktek_lapangan" id="praktek_lapangan1" value="sangat besar">
                                            <label class="form-check-label" for="praktek_lapangan1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="praktek_lapangan" id="praktek_lapangan2" value="besar">
                                                <label class="form-check-label" for="praktek_lapangan2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="praktek_lapangan" id="praktek_lapangan3" value="cukup besar">
                                                <label class="form-check-label" for="praktek_lapangan3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="praktek_lapangan" id="praktek_lapangan4" value="kurang">
                                                <label class="form-check-label" for="praktek_lapangan4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="praktek_lapangan" id="praktek_lapangan5" value="tidak sama sekali">
                                                <label class="form-check-label" for="praktek_lapangan5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Penelitian, perancangan, atau pengembangan</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="penelitian" id="penelitian1" value="sangat besar">
                                            <label class="form-check-label" for="penelitian1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="penelitian" id="penelitian2" value="besar">
                                                <label class="form-check-label" for="penelitian2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="penelitian" id="penelitian3" value="cukup besar">
                                                <label class="form-check-label" for="penelitian3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="penelitian" id="penelitian4" value="kurang">
                                                <label class="form-check-label" for="penelitian4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="penelitian" id="penelitian5" value="tidak sama sekali">
                                                <label class="form-check-label" for="penelitian5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Pelatihan militer</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="pelatihan_militer" id="pelatihan_militer1" value="sangat besar">
                                            <label class="form-check-label" for="pelatihan_militer1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="pelatihan_militer" id="pelatihan_militer2" value="besar">
                                                <label class="form-check-label" for="pelatihan_militer2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="pelatihan_militer" id="pelatihan_militer3" value="cukup besar">
                                                <label class="form-check-label" for="pelatihan_militer3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="pelatihan_militer" id="pelatihan_militer4" value="kurang">
                                                <label class="form-check-label" for="pelatihan_militer4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="pelatihan_militer" id="pelatihan_militer5" value="tidak sama sekali">
                                                <label class="form-check-label" for="pelatihan_militer5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Pertukaran Pelajar</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="pertukaran_pelajar" id="pertukaran_pelajar1" value="sangat besar">
                                            <label class="form-check-label" for="pertukaran_pelajar1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="pertukaran_pelajar" id="pertukaran_pelajar2" value="besar">
                                                <label class="form-check-label" for="pertukaran_pelajar2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="pertukaran_pelajar" id="pertukaran_pelajar3" value="cukup besar">
                                                <label class="form-check-label" for="pertukaran_pelajar3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="pertukaran_pelajar" id="pertukaran_pelajar4" value="kurang">
                                                <label class="form-check-label" for="pertukaran_pelajar4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="pertukaran_pelajar" id="pertukaran_pelajar5" value="tidak sama sekali">
                                                <label class="form-check-label" for="pertukaran_pelajar5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Magang</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="magang" id="magang1" value="sangat besar">
                                            <label class="form-check-label" for="magang1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="magang" id="magang2" value="besar">
                                                <label class="form-check-label" for="magang2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="magang" id="magang3" value="cukup besar">
                                                <label class="form-check-label" for="magang3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="magang" id="magang4" value="kurang">
                                                <label class="form-check-label" for="magang4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="magang" id="magang5" value="tidak sama sekali">
                                                <label class="form-check-label" for="magang5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Wirausaha</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="wirausaha" id="wirausaha1" value="sangat besar">
                                            <label class="form-check-label" for="wirausaha1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="wirausaha" id="wirausaha2" value="besar">
                                                <label class="form-check-label" for="wirausaha2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="wirausaha" id="wirausaha3" value="cukup besar">
                                                <label class="form-check-label" for="wirausaha3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="wirausaha" id="wirausaha4" value="kurang">
                                                <label class="form-check-label" for="wirausaha4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="wirausaha" id="wirausaha5" value="tidak sama sekali">
                                                <label class="form-check-label" for="wirausaha5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Bentuk lain pengabdian kepada masyarakat</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="pengabdian" id="pengabdian1" value="sangat besar">
                                            <label class="form-check-label" for="pengabdian1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="pengabdian" id="pengabdian2" value="besar">
                                                <label class="form-check-label" for="pengabdian2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="pengabdian" id="pengabdian3" value="cukup besar">
                                                <label class="form-check-label" for="pengabdian3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="pengabdian" id="pengabdian4" value="kurang">
                                                <label class="form-check-label" for="pengabdian4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="pengabdian" id="pengabdian5" value="tidak sama sekali">
                                                <label class="form-check-label" for="pengabdian5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                                <br>
                                <div align="right">
                                    <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_penekanan_pada_metode_pembelajaran" type="button"><b>Clear Selection</b>

                                    </button>
                                </div>
                        </div>
                      </div>
                </blockquote>
            </div>

    {{--
            <div class="row">
                <div class="col-md-12" style="padding: 15px">
                    <b>Demonstrasi</b></br><br>
                        <div class="form-check">
                            <input class="form-check-input " type="radio" name="demonstrasi" id="demonstrasi" value="sangat besar">
                            <label class="form-check-label" for="demonstrasi">
                            Sangat Besar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input " type="radio" name="demonstrasi" id="demonstrasi2" value="besar">
                            <label class="form-check-label" for="demonstrasi2">
                            Besar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input " type="radio" name="demonstrasi" id="demonstrasi3" value="cukup besar">
                            <label class="form-check-label" for="demonstrasi3">
                            Cukup Besar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input " type="radio" name="demonstrasi" id="demonstrasi4" value="kurang">
                            <label class="form-check-label" for="demonstrasi4">
                            Kurang
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input " type="radio" name="demonstrasi" id="demonstrasi5" value="tidak sama sekali">
                            <label class="form-check-label" for="demonstrasi5">
                            Tidak Sama Sekali
                            </label>
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="padding: 15px">
                    <b>Partisipasi dalam proyek riset</b></br><br>
                        <div class="form-check">
                            <input class="form-check-input " type="radio" name="Partisipasi_dalam_proyek_riset" id="Partisipasi_dalam_proyek_riset" value="sangat besar">
                            <label class="form-check-label" for="Partisipasi_dalam_proyek_riset">
                            Sangat Besar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input " type="radio" name="Partisipasi_dalam_proyek_riset" id="Partisipasi_dalam_proyek_riset2" value="besar">
                            <label class="form-check-label" for="Partisipasi_dalam_proyek_riset2">
                            Besar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input " type="radio" name="Partisipasi_dalam_proyek_riset" id="Partisipasi_dalam_proyek_riset3" value="cukup besar">
                            <label class="form-check-label" for="Partisipasi_dalam_proyek_riset3">
                            Cukup Besar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input " type="radio" name="Partisipasi_dalam_proyek_riset" id="Partisipasi_dalam_proyek_riset4" value="kurang">
                            <label class="form-check-label" for="Partisipasi_dalam_proyek_riset4">
                            Kurang
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input " type="radio" name="Partisipasi_dalam_proyek_riset" id="Partisipasi_dalam_proyek_riset5" value="tidak sama sekali">
                            <label class="form-check-label" for="Partisipasi_dalam_proyek_riset5">
                            Tidak Sama Sekali
                            </label>
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="padding: 15px">
                    <b>Magang</b></br>
                        <div class="form-check">
                            <input class="form-check-input " type="radio" name="magang" id="magang" value="sangat besar">
                            <label class="form-check-label" for="magang">
                            Sangat Besar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input " type="radio" name="magang" id="magang2" value="besar">
                            <label class="form-check-label" for="magang2">
                            Besar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input " type="radio" name="magang" id="magang3" value="cukup besar">
                            <label class="form-check-label" for="magang3">
                            Cukup Besar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input " type="radio" name="magang" id="magang4" value="kurang">
                            <label class="form-check-label" for="magang4">
                            Kurang
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input " type="radio" name="magang" id="magang5" value="tidak sama sekali">
                            <label class="form-check-label" for="magang5">
                            Tidak Sama Sekali
                            </label>
                        </div>
                </div>
            </div>
            <div class="row" style="padding: 15px">
                <div class="col-md-12">
                    <b>Praktikum</b></br>
                        <div class="form-check">
                            <input class="form-check-input " type="radio" name="praktikum" id="praktikum" value="sangat besar">
                            <label class="form-check-label" for="praktikum">
                            Sangat Besar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input " type="radio" name="praktikum" id="praktikum2" value="besar">
                            <label class="form-check-label" for="praktikum2">
                            Besar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input " type="radio" name="praktikum" id="praktikum3" value="cukup besar">
                            <label class="form-check-label" for="praktikum3">
                            Cukup Besar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input " type="radio" name="praktikum" id="praktikum4" value="kurang">
                            <label class="form-check-label" for="praktikum4">
                            Kurang
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input " type="radio" name="praktikum" id="praktikum5" value="tidak sama sekali">
                            <label class="form-check-label" for="praktikum5">
                            Tidak Sama Sekali
                            </label>
                        </div>
                </div>
            </div>
            <div class="row" style="padding: 15px">
                <div class="col-md-12">
                    <b>Kerja Lapangan</b></br>
                        <div class="form-check">
                            <input class="form-check-input " type="radio" name="kerja_lapangan" id="kerja_lapangan" value="sangat besar">
                            <label class="form-check-label" for="kerja_lapangan">
                            Sangat Besar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input " type="radio" name="kerja_lapangan" id="kerja_lapangan2" value="besar">
                            <label class="form-check-label" for="kerja_lapangan2">
                            Besar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input " type="radio" name="kerja_lapangan" id="kerja_lapangan3" value="cukup besar">
                            <label class="form-check-label" for="kerja_lapangan3">
                            Cukup Besar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input " type="radio" name="kerja_lapangan" id="kerja_lapangan4" value="kurang">
                            <label class="form-check-label" for="kerja_lapangan4">
                            Kurang
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input " type="radio" name="kerja_lapangan" id="kerja_lapangan5" value="tidak sama sekali">
                            <label class="form-check-label" for="kerja_lapangan5">
                            Tidak Sama Sekali
                            </label>
                        </div>
                </div>
            </div>
            <div class="row" style="padding: 15px">
                <div class="col-md-12">
                    <b>Diskusi</b></br>
                        <div class="form-check">
                            <input class="form-check-input " type="radio" name="diskusi" id="diskusi" value="sangat besar">
                            <label class="form-check-label" for="diskusi">
                            Sangat Besar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input " type="radio" name="diskusi" id="diskusi2" value="besar">
                            <label class="form-check-label" for="diskusi2">
                            Besar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input " type="radio" name="diskusi" id="diskusi3" value="cukup besar">
                            <label class="form-check-label" for="diskusi3">
                            Cukup Besar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input " type="radio" name="diskusi" id="diskusi4" value="kurang">
                            <label class="form-check-label" for="diskusi4">
                            Kurang
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input " type="radio" name="diskusi" id="diskusi5" value="tidak sama sekali">
                            <label class="form-check-label" for="diskusi5">
                            Tidak Sama Sekali
                            </label>
                        </div>
                </div>
            </div>  --}}

            <div class = "card-panel responsive-card">
                <blockquote style="border-left: 5px solid #87c2c0;">
                    <b>F3. Kapan anda mulai mencari pekerjaan? Mohon pekerjaan sambilan tidak dimasukkan ?</b>
                    <div class="row" style="padding: 15px">
                        <div class="col-md-12">
                            <table >
                                <tr >
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input " type="radio" name="pertanyaan_f3" id="pertanyaan22" value="sebelum">
                                            <label class="form-check-label" for="pertanyaan22">
                                                Sebelum Lulus,

                                                &nbsp
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                        <input class="form-control" placeholder="Jawaban Anda" type="text" name="pertanyaanf3_input_sebelum" id="pertanyaanf61">

                                        </div>
                                    </td>
                                    <td>   bulan sebelum lulus    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input " type="radio" name="pertanyaan_f3" id="pertanyaan90" value="setelah">
                                            <label class="form-check-label" for="pertanyaan90">
                                                Setelah Lulus,

                                                &nbsp
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                        <input class="form-control" placeholder="Jawaban Anda" type="text" name="pertanyaanf3_input_setelah" id="pertanyaanf61">

                                        </div>
                                    </td>
                                    <td>   bulan setelah lulus    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-check">
                                            <input class="form-check-input " type="radio" name="pertanyaan_f3" id="pertanyaan222" value="tidak mencari kerja">
                                            <label class="form-check-label" for="pertanyaan222">
                                                Saya tidak mencari kerja <i>(Langsung Ke Bagian Pekerjaan)</i>
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                            </table>

                        </div>
                    </div>
                    <div align="right">
                        <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_mulai_mencari_pekerjaan" type="button"><b>Clear Selection</b>

                        </button>
                    </div>
                </blockquote>
            </div>



            <div class = "card-panel responsive-card">
                <div class="card-header" style="margin-top: -19px;width: 107%;
                    margin-left: -20px;border-radius:3px">
                    <span class="card-title"><b>Mencari Kerja</b></span>

                  </div>

                <blockquote style="border-left: 5px solid white;">
                    Lewati Section Ini Jika Anda Tidak Mencari Kerja
                </blockquote>
            </div>

            <div class = "card-panel responsive-card">
                <blockquote style="border-left: 5px solid #87c2c0;">
                    <b>F4. Bagaimana anda mencari pekerjaan tersebut? <i>Jawaban bisa lebih dari satu</i></b>
                    <div class="row" style="padding: 15px">
                        <div class="col-md-9">

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="pertanyaanf4_iklan" id="pertanyaanf41" value="1">
                                    <label class="form-check-label" for="pertanyaanf41">
                                        Melalui iklan di koran/majalah, brosur
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="pertanyaanf4_melamar" id="pertanyaanf42" value="1">
                                    <label class="form-check-label" for="pertanyaanf42">
                                        Melamar ke perusahaan tanpa mengetahui lowongan yang ada
                                    </label>
                                </div>
                                <br>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="pertanyaanf4_pergi" id="pertanyaanf43" value="1">
                                    <label class="form-check-label" for="pertanyaanf43">
                                        Pergi ke bursa/pameran kerja
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="pertanyaanf4_mencari" id="pertanyaanf44" value="1">
                                    <label class="form-check-label" for="pertanyaanf44">
                                        Mencari lewat internet/iklan online/milis
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="pertanyaanf4_dihubungi" id="pertanyaanf45" value="1">
                                    <label class="form-check-label" for="pertanyaanf45">
                                        Dihubungi oleh perusahaan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="pertanyaanf4_menghubungi_kemenakertrans" id="pertanyaanf46" value="1">
                                    <label class="form-check-label" for="pertanyaanf46">
                                        Menghubungi Kemenakertrans
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="pertanyaanf4_memeroleh" id="pertanyaanf47" value="1">
                                    <label class="form-check-label" for="pertanyaanf47">
                                        Memeroleh informasi dari pusat/kantor pengembangan karir fakultas/universitas
                                    </label>
                                </div>
                                <br>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="pertanyaanf4_menghubungi_kantor" id="pertanyaanf48" value="1">
                                    <label class="form-check-label" for="pertanyaanf48">
                                        Menghubungi kantor kemahasiswaan/hubungan alumni
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="pertanyaanf4_membangun_jejaring" id="pertanyaanf49" value="1">
                                    <label class="form-check-label" for="pertanyaanf49">
                                        Membangun jejaring (network) sejak masih kuliah
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="pertanyaanf4_melalui" id="pertanyaanf410" value="1">
                                    <label class="form-check-label" for="pertanyaanf410">
                                        Melalui relasi (misalnya dosen, orang tua, saudara, teman, dll.)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="pertanyaanf4_membangun_bisnis" id="pertanyaanf411" value="1">
                                    <label class="form-check-label" for="pertanyaanf411">
                                        Membangun bisnis sendiri
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="pertanyaanf4_melalui_magang" id="pertanyaanf412" value="1">
                                    <label class="form-check-label" for="pertanyaanf412">
                                        Melalui penempatan kerja atau magang
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="pertanyaanf4_bekerja_tempat_sama" id="pertanyaanf413" value="1">
                                    <label class="form-check-label" for="pertanyaanf413">
                                        Bekerja di tempat yang sama dengan tempat kerja semasa kuliah
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="pertanyaanf4_lainnya" id="pertanyaanf414" value="1">
                                    <label class="form-check-label" for="pertanyaanf414">
                                        Lainnya
                                    </label>
                                </div>

                        </div>
                    </div>
                    <div align="right">
                        <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_mencari_pekerjaan" type="button"><b>Clear Selection</b>

                        </button>
                    </div>
                </blockquote>
            </div>

            <div class = "card-panel responsive-card">
                <blockquote style="border-left: 5px solid #87c2c0;">
                    <b>F5. Berapa bulan waktu yang dihabiskan (sebelum dan sesudah kelulusan) untuk memeroleh pekerjaan pertama?</b>


                    <br>
                    <div class="row" style="padding: 15px">
                        <div class="col-md-12">

                            <table >
                                <tr >
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input " type="radio" name="pertanyaan2_f5" id="pertanyaanf51" value="sebelum">
                                            <label class="form-check-label" for="pertanyaanf51">
                                               Kira-kira

                                                &nbsp
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                        <input class="form-control" placeholder="Jawaban Anda" type="text" name="pertanyaanf5input" id="pertanyaanf5input1">

                                        </div>
                                    </td>
                                    <td>   bulan sebelum lulus ujian  </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input " type="radio" name="pertanyaan2_f5" id="pertanyaanf52" value="setelah">
                                            <label class="form-check-label" for="pertanyaanf52">
                                               Kira-kira

                                                &nbsp
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                        <input class="form-control" placeholder="Jawaban Anda" type="text" name="pertanyaanf5input2" id="pertanyaanf5input2">

                                        </div>
                                    </td>
                                    <td>   bulan sesudah lulus ujian   </td>
                                </tr>

                            </table>

                        </div>
                    </div>
                    <div align="right">
                        <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_bulan_untuk_mencari_pekerjaan" type="button"><b>Clear Selection</b>

                        </button>
                    </div>
                </blockquote>
            </div>
            <div class = "card-panel responsive-card">
                <blockquote style="border-left: 5px solid #87c2c0;">
                    <b>F6. Berapa perusahaan/instansi/institusi yang sudah anda lamar (lewat surat atau e-mail) sebelum anda memeroleh pekerjaan pertama?</b>
                    <div class="row" style="padding: 15px">
                        <div class="col-md-12">
                            <div class="row">

                              </div>
                                <div class="form-check">
                                    <input class="form-control" placeholder="Jawaban Anda" type="text" name="pertanyaanf6" id="pertanyaanf61">
                                </div>
                        </div>
                    </div>
                    <div align="right">
                        <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_perusahaan_yang_sudah_anda_lamar_lewat_email" type="button"><b>Clear Selection</b>

                        </button>
                    </div>
                </blockquote>
            </div>

            <div class = "card-panel responsive-card">
                <blockquote style="border-left: 5px solid #87c2c0;">
                    <b>F7. Berapa banyak perusahaan/instansi/institusi yang merespons lamaran anda?</b>
                    <div class="row" style="padding: 15px">
                        <div class="col-md-12">

                            <div class="form-check">
                                <input class="form-control" placeholder="Jawaban Anda" type="text" name="pertanyaanf7" id="pertanyaanf61">
                            </div>

                        </div>
                    </div>
                    <div align="right">
                        <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_perusahaan_merespon" type="button"><b>Clear Selection</b>

                        </button>
                    </div>
                </blockquote>
            </div>

            <div class = "card-panel responsive-card">
                <blockquote style="border-left: 5px solid #87c2c0;">
                    <b>F7a. Berapa banyak perusahaan/instansi/institusi yang mengundang anda untuk wawancara?</b>
                    <div class="row" style="padding: 15px">
                        <div class="col-md-12">

                            <div class="form-check">
                                <input class="form-control" placeholder="Jawaban Anda" type="text" name="pertanyaanf7a" id="pertanyaanf71">
                            </div>

                        </div>
                    </div>
                    <div align="right">
                        <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_perusahaan_yang_mengundang_anda" type="button"><b>Clear Selection</b>

                        </button>
                    </div>
                </blockquote>
            </div>
            <div class = "card-panel responsive-card">
                <blockquote style="border-left: 5px solid #86b080;">
                    <b>Apa nama perusahaan tempat anda bekerja saat ini?</b>
                    <div class="row" style="padding: 15px">
                        <div class="col-md-12">

                            <div class="input-group mb-6">

                                <input type="text" placeholder="Jawaban Anda" name="nama_perusahaan" class="form-control" aria-label="Amount (to the nearest dollar)">

                              </div>


                        </div>
                    </div>
                    <div align="right">
                        <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_perusahaan_tempat_bekerja" type="button"><b>Clear Selection</b>

                        </button>
                    </div>
                </blockquote>
            </div>

            <div class = "card-panel responsive-card">
                <blockquote style="border-left: 5px solid #86b080;">
                    <b>Dimana alamat perusahaan tempat anda bekerja saat ini?</b>
                    <div class="row" style="padding: 15px">
                        <div class="col-md-12">

                            <div class="input-group mb-6">

                                <input type="text" placeholder="Jawaban Anda" name="alamat_tempat_bekerja" class="form-control" aria-label="Amount (to the nearest dollar)">

                              </div>


                        </div>
                    </div>
                    <div align="right">
                        <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_alamat_tempat_bekerja" type="button"><b>Clear Selection</b>

                        </button>
                    </div>
                </blockquote>
            </div>

            <div class = "card-panel responsive-card">
                <blockquote style="border-left: 5px solid #86b080;">
                    <b>No. Telpon Perusahaan </b>
                    <div class="row" style="padding: 15px">
                        <div class="col-md-12">

                            <div class="input-group mb-6">

                                <input type="text" placeholder="Jawaban Anda" name="no_telp_perusahaan" class="form-control" aria-label="Amount (to the nearest dollar)">

                              </div>


                        </div>
                    </div>
                    <div align="right">
                        <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_no_telp_perusahaan" type="button"><b>Clear Selection</b>

                        </button>
                    </div>
                </blockquote>
            </div>





                <div class = "card-panel responsive-card">
                    <div class="card-header" style="margin-top: -18px;width: 106%;
                    margin-left: -17px;border-radius:3px">
                        <span class="card-title"><b>Pekerjaan</b></span>

                    </div>

                    <blockquote style="border-left: 5px solid #86b080;">
                        <b>F8. Apakah anda bekerja saat ini (termasuk kerja sambilan dan wirausaha)?</b>
                        <div class="row" style="padding: 15px">
                            <div class="col-md-3">

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pertanyaanf8" id="pertanyaanf81" value="2">
                                        <label class="form-check-label" for="pertanyaanf81">
                                            YA <i>(Jika Ya, lanjutkan ke f11)</i>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pertanyaanf8" id="pertanyaanf82" value="1">
                                        <label class="form-check-label" for="pertanyaanf82">
                                            TIDAK
                                        </label>
                                    </div>


                            </div>
                        </div>
                        <div align="right">
                            <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_anda_bekerja_saat_ini" type="button"><b>Clear Selection</b>

                            </button>
                        </div>
                    </blockquote>
                </div>



                <div class = "card-panel responsive-card">
                    <div class="card-header" style="margin-top: -18px;width: 106%;
                    margin-left: -17px;border-radius:3px">
                        <span class="card-title"><b>Belum Bekerja</b></span>

                      </div>

                    <blockquote style="border-left: 5px solid white;">
                        Lewati Bagian Ini jika Anda Sudah Bekerja
                    </blockquote>
                </div>

                <div class = "card-panel responsive-card">
                    <blockquote style="border-left: 5px solid #4ba859;">
                        <b>F9. Bagaimana anda menggambarkan situasi anda saat ini? Jawaban bisa lebih dari satu</b>
                        <div class="row" style="padding: 15px">
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="pertanyaanf9_belajar" id="pertanyaanf91" value="1">
                                    <label class="form-check-label" for="pertanyaanf91">
                                        Saya masih belajar/melanjutkan kuliah profesi atau pascasarjana
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="pertanyaanf9_menikah" id="pertanyaanf92" value="1">
                                    <label class="form-check-label" for="pertanyaanf92">
                                        Saya Menikah
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="pertanyaanf9_sibuk_keluarga" id="pertanyaanf93" value="1">
                                    <label class="form-check-label" for="pertanyaanf93">
                                        Saya sibuk dengan keluarga dan anak-anak
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="pertanyaanf9_sedang_mencari_pekerjaan" id="pertanyaanf94" value="1">
                                    <label class="form-check-label" for="pertanyaanf94">
                                        Saya sekarang sedang mencari pekerjaan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="pertanyaanf9_lainnya" id="pertanyaanf95" value="1">
                                    <label class="form-check-label" for="pertanyaanf95">
                                        Lainnya
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div align="right">
                            <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_menggambarkan_situasi_anda" type="button"><b>Clear Selection</b>

                            </button>
                        </div>
                    </blockquote>
                </div>

                <div class = "card-panel responsive-card">
                    <blockquote style="border-left: 5px solid #4ba859;">
                        <b>F10. Apakah anda aktif mencari pekerjaan dalam 4 minggu terakhir? Pilihlah Satu Jawaban.</b>
                        <div class="row" style="padding: 15px">
                            <div class="col-md-12">

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pertanyaanf10" id="pertanyaanf10" value="1">
                                        <label class="form-check-label" for="pertanyaanf10">
                                           Tidak
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pertanyaanf10" id="pertanyaanf101" value="2">
                                        <label class="form-check-label" for="pertanyaanf101">
                                            Tidak, tapi saya sedang menunggu hasil lamaran kerja
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pertanyaanf10" id="pertanyaanf102" value="3">
                                        <label class="form-check-label" for="pertanyaanf102">
                                            Ya, saya akan mulai bekerja dalam 2 minggu ke depan
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pertanyaanf10" id="pertanyaanf103" value="4">
                                        <label class="form-check-label" for="pertanyaanf103">
                                            Ya, tapi saya belum pasti akan bekerja dalam 2 minggu ke depan
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pertanyaanf10" id="pertanyaanf104" value="5">
                                        <label class="form-check-label" for="pertanyaanf104">
                                            Lainnya
                                        </label>
                                    </div>

                            </div>
                        </div>
                        <div align="right">
                            <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_pekerjaan_dalam_4minggu" type="button"><b>Clear Selection</b>

                            </button>
                        </div>
                    </blockquote>
                </div>




                <div class = "card-panel responsive-card">
                    <div class="card-header" style="margin-top: -18px;width: 106%;
                    margin-left: -17px;border-radius:3px">
                        <span class="card-title"><b>Data Alumni Yang Sudah Bekerja</b></span>

                      </div>

                    <blockquote style="border-left: 5px solid white;">
                        Lewati bagian ini jika Anda belum bekerja
                    </blockquote>
                </div>

                <div class = "card-panel responsive-card">
                    <blockquote style="border-left: 5px solid #86b080;">
                        <b>Nama Atasan Langsung Anda (Jika Sudah Bekerja)</b>
                        <div class="row" style="padding: 15px">
                            <div class="col-md-12">

                                <div class="input-group mb-6">

                                    <input type="text" placeholder="Jawaban Anda" name="nama_atasan_langsung" class="form-control" aria-label="Amount (to the nearest dollar)">

                                  </div>


                            </div>
                        </div>
                        <div align="right">
                            <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_nama_atasan_langsung" type="button"><b>Clear Selection</b>

                            </button>
                        </div>
                    </blockquote>
                </div>

                <div class = "card-panel responsive-card">
                    <blockquote style="border-left: 5px solid #86b080;">
                        <b>Nomor HP Atasan Langsung Anda (Jika Sudah Bekerja)</b>
                        <div class="row" style="padding: 15px">
                            <div class="col-md-12">

                                <div class="input-group mb-6">

                                    <input type="text" placeholder="Jawaban Anda" name="no_hp_atasan" class="form-control" aria-label="Amount (to the nearest dollar)">

                                  </div>


                            </div>
                        </div>
                        <div align="right">
                            <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_nohp_atasan_langsung" type="button"><b>Clear Selection</b>

                            </button>
                        </div>
                    </blockquote>
                </div>

                <div class = "card-panel responsive-card">
                    <blockquote style="border-left: 5px solid #86b080;">
                        <b>F11. Apa jenis perusahaan/instansi/institusi tempat anda bekerja sekarang?</b>
                        <div class="row" style="padding: 15px">
                            <div class="col-md-12">

                                <table class="lefted highlight">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Berijin</th>
                                        <th>Tidak Berijin</th>
                                        <th>Lokal</th>
                                        <th>Nasional</th>
                                        <th>Internasional</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>  Wirausaha Ijin/tidak berijin</td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="wiraswastaijintidakberijin_ijin" id="wiraswastaijintidakberijinberijin" value="1">
                                                <label class="form-check-label" for="wiraswastaijintidakberijinberijin">

                                                </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="wiraswastaijintidakberijin_tidakijin" id="wiraswastaijintidakberijintidakberijin" value="1">
                                                <label class="form-check-label" for="wiraswastaijintidakberijintidakberijin">

                                                </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="wiraswastaijintidakberijin_lokal" id="wiraswastaijintidakberijinlokal" value="1">
                                                <label class="form-check-label" for="wiraswastaijintidakberijinlokal">

                                                </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="wiraswastaijintidakberijin_nasional" id="wiraswastaijintidakberijinnasional" value="1">
                                                <label class="form-check-label" for="wiraswastaijintidakberijinnasional">

                                                </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="wiraswastaijintidakberijin_internasional" id="wiraswastainternasional" value="1">
                                                <label class="form-check-label" for="wiraswastainternasional">

                                                </label>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>  Wirausaha Lokal/Nasional/Internasional</td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="wiraswastalokal/nasional" id="wiraswastalokal/nasionalberijin" value="1">
                                                <label class="form-check-label" for="wiraswastalokal/nasionalberijin">

                                                </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="wiraswastalokal/nasional" id="wiraswastalokal/nasionaltidakberijin" value="1">
                                                <label class="form-check-label" for="wiraswastalokal/nasionaltidakberijin">

                                                </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="pertanyaanf4_membangun_jejaring" id="wiraswastalokal/nasionallokal" value="1">
                                                <label class="form-check-label" for="wiraswastalokal/nasionallokal">

                                                </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="pertanyaanf4_membangun_jejaring" id="wiraswastalokal/nasionalnasional" value="1">
                                                <label class="form-check-label" for="wiraswastalokal/nasionalnasional">

                                                </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="pertanyaanf4_membangun_jejaring" id="wiraswastainternasional" value="1">
                                                <label class="form-check-label" for="wiraswastainternasional">

                                                </label>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td> Perusahaan swasta Ijin/tidak berijin</td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="perusahaanswasta" id="perusahaanswastaberijin" value="1">
                                                <label class="form-check-label" for="perusahaanswastaberijin">

                                                </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="perusahaanswasta" id="perusahaanswastatidakberijin" value="1">
                                                <label class="form-check-label" for="perusahaanswastatidakberijin">

                                                </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="pertanyaanf4_membangun_jejaring" id="perusahaanswastalokal" value="1">
                                                <label class="form-check-label" for="perusahaanswastalokal">

                                                </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="pertanyaanf4_membangun_jejaring" id="perusahaanswastanasional" value="1">
                                                <label class="form-check-label" for="perusahaanswastanasional">

                                                </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="pertanyaanf4_membangun_jejaring" id="perusahaanswastainternasional" value="1">
                                                <label class="form-check-label" for="perusahaanswastainternasional">

                                                </label>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td> Perusahaan Lokal/Nasional/Internasional</td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="perusahaanlokalnasional_" id="perusahaanlokalnasional_berijin" value="1">
                                                <label class="form-check-label" for="perusahaanlokalnasional_berijin">

                                                </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="perusahaanlokalnasional_" id="perusahaanlokalnasional_tidakberijin" value="1">
                                                <label class="form-check-label" for="perusahaanlokalnasional_tidakberijin">

                                                </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="pertanyaanf4_membangun_jejaring" id="perusahaanlokalnasional_lokal" value="1">
                                                <label class="form-check-label" for="perusahaanlokalnasional_lokal">

                                                </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="pertanyaanf4_membangun_jejaring" id="perusahaanlokalnasional_nasional" value="1">
                                                <label class="form-check-label" for="perusahaanlokalnasional_nasional">

                                                </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="pertanyaanf4_membangun_jejaring" id="perusahaanlokalnasional_internasional" value="1">
                                                <label class="form-check-label" for="perusahaanlokalnasional_internasional">

                                                </label>
                                                </div>
                                            </td>
                                        </tr>


                                    <tr>
                                        <td> Instansi pemerintah (termasuk BUMN)</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="bumn" id="bumnberijin" value="1">
                                            <label class="form-check-label" for="bumnberijin">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="bumn" id="bumntidakberijin" value="1">
                                            <label class="form-check-label" for="bumntidakberijin">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="pertanyaanf4_membangun_jejaring" id="bumnlokal" value="1">
                                            <label class="form-check-label" for="bumnlokal">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="pertanyaanf4_membangun_jejaring" id="bumnnasional" value="1">
                                            <label class="form-check-label" for="bumnnasional">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="pertanyaanf4_membangun_jejaring" id="bumninternasional" value="1">
                                            <label class="form-check-label" for="bumninternasional">

                                            </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td> Organisasi non-profit/Lembaga Swadaya Masyarakat</td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="organisasi" id="organisasiberijin" value="1">
                                            <label class="form-check-label" for="organisasiberijin">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="organisasi" id="organisasitidakberijin" value="1">
                                            <label class="form-check-label" for="organisasitidakberijin">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="pertanyaanf4_membangun_jejaring" id="organisasilokal" value="1">
                                            <label class="form-check-label" for="organisasilokal">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="pertanyaanf4_membangun_jejaring" id="organisasinasional" value="1">
                                            <label class="form-check-label" for="organisasinasional">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="pertanyaanf4_membangun_jejaring" id="organisasiinternasional" value="1">
                                            <label class="form-check-label" for="organisasiinternasional">

                                            </label>
                                            </div>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>



                            </div>
                        </div>
                        <div align="right">
                            <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_jenis_perusahaan_tempat_bekerja" type="button"><b>Clear Selection</b>

                            </button>
                        </div>
                    </blockquote>
                </div>

                <div class = "card-panel responsive-card">
                    <blockquote style="border-left: 5px solid #86b080;">
                        <b>F13. Kira-kira berapa pendapatan anda setiap bulannya?</b>
                        <div class="row" style="padding: 15px">
                            <div class="col-md-12">
                                <table>
                                    <tr>
                                        <td>Dari Pekerjaan Utama </td>
                                        <td><div class="input-group mb-3">

                                            <input type="text" onkeypress="return isNumberKey(event)" placeholder="5000000" name="pekerjaan_utama" class="form-control loan_max_amount" aria-label="Amount (to the nearest dollar)">

                                          </div></td>
                                    </tr>
                                    <tr>
                                        <td>Dari Lembur dan Tips </td>
                                        <td><div class="input-group mb-3">
                                            <div class="input-group-prepend">

                                            </div>
                                            <input type="text" onkeypress="return isNumberKey(event)" placeholder="500000" name="lembur_tips" class="form-control loan_max_amount" aria-label="Amount (to the nearest dollar)">

                                          </div></td>
                                    </tr>
                                    <tr>
                                        <td> Dari Pekerjaan Lainnya </td>
                                        <td><div class="input-group mb-3">
                                            <div class="input-group-prepend">

                                            </div>
                                            <input type="text" onkeypress="return isNumberKey(event)" placeholder="2500000" name="pekerjaan_lainnya" class="form-control loan_max_amount" aria-label="Amount (to the nearest dollar)">

                                          </div></td>
                                    </tr>
                                </table>

                            </div>
                        </div>
                        <div align="right">
                            <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_pendapatan_setiap_bulannya" type="button"><b>Clear Selection</b>

                            </button>
                        </div>
                    </blockquote>
                </div>

                <div class = "card-panel responsive-card">
                    <blockquote style="border-left: 5px solid #86b080;">
                        <b>F14. Seberapa erat hubungan antara bidang studi dengan pekerjaan anda?</b>
                        <div class="row" style="padding: 15px">
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pertanyaanf14" id="pertanyaanf14" value="1">
                                    <label class="form-check-label" for="pertanyaanf14">
                                        Sangat erat
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pertanyaanf14" id="pertanyaanf141" value="2">
                                    <label class="form-check-label" for="pertanyaanf141">
                                        Erat
                                    </label>
                                </div>


                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pertanyaanf14" id="pertanyaanf142" value="3">
                                    <label class="form-check-label" for="pertanyaanf142">
                                       Cukup Erat
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pertanyaanf14" id="pertanyaanf143" value="4">
                                    <label class="form-check-label" for="pertanyaanf143">
                                       Kurang Erat
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pertanyaanf14" id="pertanyaanf144" value="5">
                                    <label class="form-check-label" for="pertanyaanf144">
                                        Tidak Sama Sekali
                                    </label>
                                </div>
                            </div>

                        </div>
                        <div align="right">
                            <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_Seberapaerathubunganantarabidangstudi" type="button"><b>Clear Selection</b>

                            </button>
                        </div>
                    </blockquote>
                </div>

                <div class = "card-panel responsive-card">
                    <blockquote style="border-left: 5px solid #86b080;">
                        <b>F15. Tingkat pendidikan apa yang paling tepat/sesuai untuk pekerjaan anda saat ini?</b>
                        <div class="row" style="padding: 15px">
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pertanyaanf15" id="pertanyaanf15" value="1">
                                    <label class="form-check-label" for="pertanyaanf15">
                                        Setingkat Lebih Tinggi
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pertanyaanf15" id="pertanyaanf151" value="2">
                                    <label class="form-check-label" for="pertanyaanf151">
                                        Tingkat Yang Sama
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pertanyaanf15" id="pertanyaanf152" value="3">
                                    <label class="form-check-label" for="pertanyaanf152">
                                       Setingkat Lebih Rendah
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pertanyaanf15" id="pertanyaanf153" value="4">
                                    <label class="form-check-label" for="pertanyaanf153">
                                        Tidak Perlu Pendidikan Tinggi
                                    </label>
                                </div>
                            </div>


                        </div>
                        <div align="right">
                            <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_tingkat_pendidikan_yang_tepat" type="button"><b>Clear Selection</b>

                            </button>
                        </div>
                    </blockquote>
                </div>

                <div class = "card-panel responsive-card">
                    <blockquote style="border-left: 5px solid #86b080;">
                        <b>F16. Jika menurut anda pekerjaan anda saat ini tidak sesuai dengan pendidikan anda, mengapa anda mengambilnya? Jawaban bisa lebih dari satu</b>
                        <div class="row" style="padding: 15px">
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="pertanyaanf16_pertanyaan_tidak_sesuai" id="pertanyaanf161" value="1">
                                    <label class="form-check-label" for="pertanyaanf161">
                                        Pertanyaan tidak sesuai; pekerjaan saya sekarang sudah sesuai dengan pendidikan saya.
                                    </label>
                                </div>
                                <br>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="pertanyaanf16_Saya_belum_mendapatkan_pekerjaan_yang_lebih_sesuai" id="pertanyaanf162" value="1">
                                    <label class="form-check-label" for="pertanyaanf162">
                                        Saya belum mendapatkan pekerjaan yang lebih sesuai.
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="pertanyaanf16_di_pekerjaan_ini_saya_memeroleh_prospek_karir_yang_baik" id="pertanyaanf163" value="1">
                                    <label class="form-check-label" for="pertanyaanf163">
                                        Di pekerjaan ini saya memeroleh prospek karir yang baik.
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="pertanyaanf16_saya_lebih_suka_bekerja_di_area_pekerjaan" id="pertanyaanf164" value="1">
                                    <label class="form-check-label" for="pertanyaanf164">
                                        Saya lebih suka bekerja di area pekerjaan yang tidak ada hubungannya dengan pendidikan saya.
                                    </label>
                                </div>
                                <br>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="pertanyaanf16_saya_dipromosikan_ke_posisi_yang_kurang" id="pertanyaanf165" value="1">
                                    <label class="form-check-label" for="pertanyaanf165">
                                        Saya dipromosikan ke posisi yang kurang berhubungan dengan pendidikan saya dibanding posisi sebelumnya.
                                    </label>
                                </div>
                                <br>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="pertanyaanf16_Saya_dapat_memeroleh_pendapatan" id="pertanyaanf166" value="1">
                                    <label class="form-check-label" for="pertanyaanf166">
                                        Saya dapat memeroleh pendapatan yang lebih tinggi di pekerjaan ini.
                                    </label>
                                </div>
                                <br>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="pertanyaanf16_Pekerjaan_saya_saat_ini_lebih_aman_terjamin_secure" id="pertanyaanf167" value="1">
                                    <label class="form-check-label" for="pertanyaanf167">
                                        Pekerjaan saya saat ini lebih aman/terjamin/secure.
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="pertanyaanf16_Pekerjaan_saya_saat_ini_lebih_menarik" id="pertanyaanf168" value="1">
                                    <label class="form-check-label" for="pertanyaanf168">
                                        Pekerjaan saya saat ini lebih menarik.
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="pertanyaanf16_Pekerjaan_saya_saat_ini_lebih_memungkinkan" id="pertanyaanf169" value="1">
                                    <label class="form-check-label" for="pertanyaanf169">
                                        Pekerjaan saya saat ini lebih memungkinkan saya mengambil pekerjaan tambahan/jadwal yang fleksibel, dll.
                                    </label>
                                </div>
                                <br>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="pertanyaanf16_Pekerjaan_saya_saat_ini_lokasinya_lebih_dekat" id="pertanyaanf1610" value="1">
                                    <label class="form-check-label" for="pertanyaanf1610">
                                        Pekerjaan saya saat ini lokasinya lebih dekat dari rumah saya.
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="pertanyaanf16_Pekerjaan_saya_saat_ini_dapat_lebih" id="pertanyaanf1611" value="1">
                                    <label class="form-check-label" for="pertanyaanf1611">
                                        Pekerjaan saya saat ini dapat lebih menjamin kebutuhan keluarga saya.
                                    </label>
                                </div>
                                <br>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="pertanyaanf16_Pada_awal_meniti_karir_ini" id="pertanyaanf1612" value="1">
                                    <label class="form-check-label" for="pertanyaanf1612">
                                        Pada awal meniti karir ini, saya harus menerima pekerjaan yang tidak berhubungan dengan pendidikan saya.
                                    </label>
                                </div>
                                <br>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="pertanyaanf16_Lainnya" id="pertanyaanf1613" value="1">
                                    <label class="form-check-label" for="pertanyaanf1613">
                                        Lainnya:
                                    </label>
                                </div>
                            </div>
                    </div>
                    <div align="right">
                        <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_tingkat_pendidikan_yang_tepat2" type="button"><b>Clear Selection</b>

                        </button>
                    </div>
                    </blockquote>
                </div>

                <div class = "card-panel responsive-card">
                    <blockquote style="border-left: 5px solid #86b080;">
                        <div class="row">
                            <div class="col-md-12" style="padding: 15px">
                                <b>Menurut Anda, bagaimanakah profil karakter kepribadian Anda dalam lingkungan kerja?</b>
                                    <table class="lefted highlight">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th>Sangat Besar</th>
                                            <th>Besar</th>
                                            <th>Cukup</th>
                                            <th>Kecil</th>
                                            <th>Sangat Kecil</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <tr>
                                            <td>Melakukan pekerjaan dengan penuh tanggung jawab dan keikhlasan</td>
                                            <td>
                                                <div class="form-check">
                                                <input class="form-check-input " type="radio" name="tanggung_jawab" id="tanggung_jawab1" value="sangat besar">
                                                <label class="form-check-label" for="tanggung_jawab1">

                                                </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input " type="radio" name="tanggung_jawab" id="tanggung_jawab2" value="besar">
                                                    <label class="form-check-label" for="tanggung_jawab2">

                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input " type="radio" name="tanggung_jawab" id="tanggung_jawab3" value="cukup besar">
                                                    <label class="form-check-label" for="tanggung_jawab3">

                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input " type="radio" name="tanggung_jawab" id="tanggung_jawab4" value="kurang">
                                                    <label class="form-check-label" for="tanggung_jawab4">

                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input " type="radio" name="tanggung_jawab" id="tanggung_jawab5" value="tidak sama sekali">
                                                    <label class="form-check-label" for="tanggung_jawab5">

                                                    </label>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Mampu bekerjasama dalam tim</td>
                                            <td>
                                                <div class="form-check">
                                                <input class="form-check-input " type="radio" name="bekerjasama" id="bekerjasama1" value="sangat besar">
                                                <label class="form-check-label" for="bekerjasama1">

                                                </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input " type="radio" name="bekerjasama" id="bekerjasama2" value="besar">
                                                    <label class="form-check-label" for="bekerjasama2">

                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input " type="radio" name="bekerjasama" id="bekerjasama3" value="cukup besar">
                                                    <label class="form-check-label" for="bekerjasama3">

                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input " type="radio" name="bekerjasama" id="bekerjasama4" value="kurang">
                                                    <label class="form-check-label" for="bekerjasama4">

                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input " type="radio" name="bekerjasama" id="bekerjasama5" value="tidak sama sekali">
                                                    <label class="form-check-label" for="bekerjasama5">

                                                    </label>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Bersungguh-sungguh dan memegang teguh nilai kebenaran dalam melakanakan pekerjaan</td>
                                            <td>
                                                <div class="form-check">
                                                <input class="form-check-input " type="radio" name="bersungguhsungguh" id="bersungguhsungguh1" value="sangat besar">
                                                <label class="form-check-label" for="bersungguhsungguh1">

                                                </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input " type="radio" name="bersungguhsungguh" id="bersungguhsungguh2" value="besar">
                                                    <label class="form-check-label" for="bersungguhsungguh2">

                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input " type="radio" name="bersungguhsungguh" id="bersungguhsungguh3" value="cukup besar">
                                                    <label class="form-check-label" for="bersungguhsungguh3">

                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input " type="radio" name="bersungguhsungguh" id="bersungguhsungguh4" value="kurang">
                                                    <label class="form-check-label" for="bersungguhsungguh4">

                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input " type="radio" name="bersungguhsungguh" id="bersungguhsungguh5" value="tidak sama sekali">
                                                    <label class="form-check-label" for="bersungguhsungguh5">

                                                    </label>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Bekerja keras sesuai dengan kompetensi</td>
                                            <td>
                                                <div class="form-check">
                                                <input class="form-check-input " type="radio" name="bekerjakeras" id="bekerjakeras1" value="sangat besar">
                                                <label class="form-check-label" for="bekerjakeras1">

                                                </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input " type="radio" name="bekerjakeras" id="bekerjakeras2" value="besar">
                                                    <label class="form-check-label" for="bekerjakeras2">

                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input " type="radio" name="bekerjakeras" id="bekerjakeras3" value="cukup besar">
                                                    <label class="form-check-label" for="bekerjakeras3">

                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input " type="radio" name="bekerjakeras" id="bekerjakeras4" value="kurang">
                                                    <label class="form-check-label" for="bekerjakeras4">

                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input " type="radio" name="bekerjakeras" id="bekerjakeras5" value="tidak sama sekali">
                                                    <label class="form-check-label" for="bekerjakeras5">

                                                    </label>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Toleran dan mampu menerima masukkan dari siapapun</td>
                                            <td>
                                                <div class="form-check">
                                                <input class="form-check-input " type="radio" name="toleran" id="toleran1" value="sangat besar">
                                                <label class="form-check-label" for="toleran1">

                                                </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input " type="radio" name="toleran" id="toleran2" value="besar">
                                                    <label class="form-check-label" for="toleran2">

                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input " type="radio" name="toleran" id="toleran3" value="cukup besar">
                                                    <label class="form-check-label" for="toleran3">

                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input " type="radio" name="toleran" id="toleran4" value="kurang">
                                                    <label class="form-check-label" for="toleran4">

                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input " type="radio" name="toleran" id="toleran5" value="tidak sama sekali">
                                                    <label class="form-check-label" for="toleran5">

                                                    </label>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Meletakkan segala sesuatu secara profesional</td>
                                            <td>
                                                <div class="form-check">
                                                <input class="form-check-input " type="radio" name="meletakkansegalasesuatu" id="meletakkansegalasesuatu1" value="sangat besar">
                                                <label class="form-check-label" for="meletakkansegalasesuatu1">

                                                </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input " type="radio" name="meletakkansegalasesuatu" id="meletakkansegalasesuatu2" value="besar">
                                                    <label class="form-check-label" for="meletakkansegalasesuatu2">

                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input " type="radio" name="meletakkansegalasesuatu" id="meletakkansegalasesuatu3" value="cukup besar">
                                                    <label class="form-check-label" for="meletakkansegalasesuatu3">

                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input " type="radio" name="meletakkansegalasesuatu" id="meletakkansegalasesuatu4" value="kurang">
                                                    <label class="form-check-label" for="meletakkansegalasesuatu4">

                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input " type="radio" name="meletakkansegalasesuatu" id="meletakkansegalasesuatu5" value="tidak sama sekali">
                                                    <label class="form-check-label" for="meletakkansegalasesuatu5">

                                                    </label>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Kreatif dan inovatif dalam mengembangkan kualitas pekerjaan</td>
                                            <td>
                                                <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kreatifdaninovatif" id="kreatifdaninovatif1" value="sangat besar">
                                                <label class="form-check-label" for="kreatifdaninovatif1">

                                                </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input " type="radio" name="kreatifdaninovatif" id="kreatifdaninovatif2" value="besar">
                                                    <label class="form-check-label" for="kreatifdaninovatif2">

                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input " type="radio" name="kreatifdaninovatif" id="kreatifdaninovatif3" value="cukup besar">
                                                    <label class="form-check-label" for="kreatifdaninovatif3">

                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input " type="radio" name="kreatifdaninovatif" id="kreatifdaninovatif4" value="kurang">
                                                    <label class="form-check-label" for="kreatifdaninovatif4">

                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input " type="radio" name="kreatifdaninovatif" id="kreatifdaninovatif5" value="tidak sama sekali">
                                                    <label class="form-check-label" for="kreatifdaninovatif5">

                                                    </label>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Mampu membuat keputusan terbaik dengan arif dan bijaksana</td>
                                            <td>
                                                <div class="form-check">
                                                <input class="form-check-input " type="radio" name="keputusanterbaik" id="keputusanterbaik1" value="sangat besar">
                                                <label class="form-check-label" for="keputusanterbaik1">

                                                </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input " type="radio" name="keputusanterbaik" id="keputusanterbaik2" value="besar">
                                                    <label class="form-check-label" for="keputusanterbaik2">

                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input " type="radio" name="keputusanterbaik" id="keputusanterbaik3" value="cukup besar">
                                                    <label class="form-check-label" for="keputusanterbaik3">

                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input " type="radio" name="keputusanterbaik" id="keputusanterbaik4" value="kurang">
                                                    <label class="form-check-label" for="keputusanterbaik4">

                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input " type="radio" name="keputusanterbaik" id="keputusanterbaik5" value="tidak sama sekali">
                                                    <label class="form-check-label" for="keputusanterbaik5">

                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                            </div>
                          </div>
                          <div align="right">
                            <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_tingkat_pendidikan_yang_tepat" type="button"><b>Clear Selection</b>

                            </button>
                        </div>
                    </blockquote>
                </div>


              <div class = "card-panel responsive-card">
                <div class="card-header" style="margin-top: -19px;width: 107%;
                    margin-left: -20px;border-radius:3px">
                    <span class="card-title"><b>Kompetensi</b></span>

                </div>

                <blockquote style="border-left: 5px solid #86b080;">
                    <div class="row">
                        <div class="col-md-12" style="padding: 15px">
                            <b>Pada saat lulus, pada tingkat mana kompetensi di bawah ini Anda kuasai? (A)</b>
                                <table class="lefted highlight">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Sangat Besar</th>
                                        <th>Besar</th>
                                        <th>Cukup</th>
                                        <th>Kecil</th>
                                        <th>Sangat Kecil</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr>
                                        <td>Pengetahuan di bidang atau disiplin ilmu Anda</td>
                                        <td>
                                            <div class="form-check">

                                            <input class="form-check-input " type="radio" name="pengetahuandibidang" id="pengetahuandibidang1" value="5">
                                            <label class="form-check-label" for="pengetahuandibidang1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="pengetahuandibidang" id="pengetahuandibidang2" value="4">
                                                <label class="form-check-label" for="pengetahuandibidang2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="pengetahuandibidang" id="pengetahuandibidang3" value="3">
                                                <label class="form-check-label" for="pengetahuandibidang3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="pengetahuandibidang" id="pengetahuandibidang4" value="2">
                                                <label class="form-check-label" for="pengetahuandibidang4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="pengetahuandibidang" id="pengetahuandibidang5" value="1">
                                                <label class="form-check-label" for="pengetahuandibidang5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Pengetahuan di luar bidang atau disiplin ilmu Anda</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="pengetahuandiluarbidang" id="pengetahuandiluarbidang1" value="5">
                                            <label class="form-check-label" for="pengetahuandiluarbidang1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="pengetahuandiluarbidang" id="pengetahuandiluarbidang2" value="4">
                                                <label class="form-check-label" for="pengetahuandiluarbidang2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="pengetahuandiluarbidang" id="pengetahuandiluarbidang3" value="3">
                                                <label class="form-check-label" for="pengetahuandiluarbidang3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="pengetahuandiluarbidang" id="pengetahuandiluarbidang4" value="2">
                                                <label class="form-check-label" for="pengetahuandiluarbidang4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="pengetahuandiluarbidang" id="pengetahuandiluarbidang5" value="1">
                                                <label class="form-check-label" for="pengetahuandiluarbidang5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Pengetahuan umum</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="pengetahuanumum" id="pengetahuanumum1" value="5">
                                            <label class="form-check-label" for="pengetahuanumum1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="pengetahuanumum" id="pengetahuanumum2" value="4">
                                                <label class="form-check-label" for="pengetahuanumum2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="pengetahuanumum" id="pengetahuanumum3" value="3">
                                                <label class="form-check-label" for="pengetahuanumum3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="pengetahuanumum" id="pengetahuanumum4" value="2">
                                                <label class="form-check-label" for="pengetahuanumum4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="pengetahuanumum" id="pengetahuanumum5" value="1">
                                                <label class="form-check-label" for="pengetahuanumum5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Bahasa Inggris</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="bahasainggris" id="bahasainggris1" value="5">
                                            <label class="form-check-label" for="bahasainggris1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="bahasainggris" id="bahasainggris2" value="4">
                                                <label class="form-check-label" for="bahasainggris2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="bahasainggris" id="bahasainggris3" value="3">
                                                <label class="form-check-label" for="bahasainggris3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="bahasainggris" id="bahasainggris4" value="2">
                                                <label class="form-check-label" for="bahasainggris4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="bahasainggris" id="bahasainggris5" value="1">
                                                <label class="form-check-label" for="bahasainggris5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Ketrampilan internet</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="ketrampilaninternet" id="ketrampilaninternet1" value="5">
                                            <label class="form-check-label" for="ketrampilaninternet1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="ketrampilaninternet" id="ketrampilaninternet2" value="4">
                                                <label class="form-check-label" for="ketrampilaninternet2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="ketrampilaninternet" id="ketrampilaninternet3" value="3">
                                                <label class="form-check-label" for="ketrampilaninternet3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="ketrampilaninternet" id="ketrampilaninternet4" value="2">
                                                <label class="form-check-label" for="ketrampilaninternet4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="ketrampilaninternet" id="ketrampilaninternet5" value="1">
                                                <label class="form-check-label" for="ketrampilaninternet5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Ketrampilan komputer</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="ketrampilankomputer" id="ketrampilankomputer1" value="5">
                                            <label class="form-check-label" for="ketrampilankomputer1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="ketrampilankomputer" id="ketrampilankomputer2" value="4">
                                                <label class="form-check-label" for="ketrampilankomputer2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="ketrampilankomputer" id="ketrampilankomputer3" value="3">
                                                <label class="form-check-label" for="ketrampilankomputer3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="ketrampilankomputer" id="ketrampilankomputer4" value="2">
                                                <label class="form-check-label" for="ketrampilankomputer4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="ketrampilankomputer" id="ketrampilankomputer5" value="1">
                                                <label class="form-check-label" for="ketrampilankomputer5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Berpikir kritis</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="berpikirkritis" id="berpikirkritis1" value="5">
                                            <label class="form-check-label" for="berpikirkritis1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="berpikirkritis" id="berpikirkritis2" value="4">
                                                <label class="form-check-label" for="berpikirkritis2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="berpikirkritis" id="berpikirkritis3" value="3">
                                                <label class="form-check-label" for="berpikirkritis3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="berpikirkritis" id="berpikirkritis4" value="2">
                                                <label class="form-check-label" for="berpikirkritis4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="berpikirkritis" id="berpikirkritis5" value="1">
                                                <label class="form-check-label" for="berpikirkritis5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Keterampilan Riset</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="ketrampilanriset" id="ketrampilanriset1" value="5">
                                            <label class="form-check-label" for="ketrampilanriset1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="ketrampilanriset" id="ketrampilanriset2" value="4">
                                                <label class="form-check-label" for="ketrampilanriset2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="ketrampilanriset" id="ketrampilanriset3" value="3">
                                                <label class="form-check-label" for="ketrampilanriset3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="ketrampilanriset" id="ketrampilanriset4" value="2">
                                                <label class="form-check-label" for="ketrampilanriset4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="ketrampilanriset" id="ketrampilanriset5" value="1">
                                                <label class="form-check-label" for="ketrampilanriset5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Kemampuan belajar</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="kemampuanbelajar" id="kemampuanbelajar1" value="5">
                                            <label class="form-check-label" for="kemampuanbelajar1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuanbelajar" id="kemampuanbelajar2" value="4">
                                                <label class="form-check-label" for="kemampuanbelajar2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuanbelajar" id="kemampuanbelajar3" value="3">
                                                <label class="form-check-label" for="kemampuanbelajar3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuanbelajar" id="kemampuanbelajar4" value="2">
                                                <label class="form-check-label" for="kemampuanbelajar4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuanbelajar" id="kemampuanbelajar5" value="1">
                                                <label class="form-check-label" for="kemampuanbelajar5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Kemampuan berkomunikasi</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="kemampuanberkomunikasi" id="kemampuanberkomunikasi1" value="5">
                                            <label class="form-check-label" for="kemampuanberkomunikasi1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuanberkomunikasi" id="kemampuanberkomunikasi2" value="4">
                                                <label class="form-check-label" for="kemampuanberkomunikasi2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuanberkomunikasi" id="kemampuanberkomunikasi3" value="3">
                                                <label class="form-check-label" for="kemampuanberkomunikasi3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuanberkomunikasi" id="kemampuanberkomunikasi4" value="2">
                                                <label class="form-check-label" for="kemampuanberkomunikasi4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuanberkomunikasi" id="kemampuanberkomunikasi5" value="1">
                                                <label class="form-check-label" for="kemampuanberkomunikasi5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Bekerja di bawah tekanan</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="bekerjadibawahtekanan" id="bekerjadibawahtekanan1" value="5">
                                            <label class="form-check-label" for="bekerjadibawahtekanan1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="bekerjadibawahtekanan" id="bekerjadibawahtekanan2" value="4">
                                                <label class="form-check-label" for="bekerjadibawahtekanan2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="bekerjadibawahtekanan" id="bekerjadibawahtekanan3" value="3">
                                                <label class="form-check-label" for="bekerjadibawahtekanan3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="bekerjadibawahtekanan" id="bekerjadibawahtekanan4" value="2">
                                                <label class="form-check-label" for="bekerjadibawahtekanan4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="bekerjadibawahtekanan" id="bekerjadibawahtekanan5" value="1">
                                                <label class="form-check-label" for="bekerjadibawahtekanan5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Manajemen waktu</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="manajemenwaktu" id="manajemenwaktu1" value="5">
                                            <label class="form-check-label" for="manajemenwaktu1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="manajemenwaktu" id="manajemenwaktu2" value="4">
                                                <label class="form-check-label" for="manajemenwaktu2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="manajemenwaktu" id="manajemenwaktu3" value="3">
                                                <label class="form-check-label" for="manajemenwaktu3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="manajemenwaktu" id="manajemenwaktu4" value="2">
                                                <label class="form-check-label" for="manajemenwaktu4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="manajemenwaktu" id="manajemenwaktu5" value="1">
                                                <label class="form-check-label" for="manajemenwaktu5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Bekerja secara mandiri</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="bekerjasecaramandiri" id="bekerjasecaramandiri1" value="5">
                                            <label class="form-check-label" for="bekerjasecaramandiri1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="bekerjasecaramandiri" id="bekerjasecaramandiri2" value="4">
                                                <label class="form-check-label" for="bekerjasecaramandiri2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="bekerjasecaramandiri" id="bekerjasecaramandiri3" value="3">
                                                <label class="form-check-label" for="bekerjasecaramandiri3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="bekerjasecaramandiri" id="bekerjasecaramandiri4" value="2">
                                                <label class="form-check-label" for="bekerjasecaramandiri4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="bekerjasecaramandiri" id="bekerjasecaramandiri5" value="1">
                                                <label class="form-check-label" for="bekerjasecaramandiri5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Bekerja dalam tim/bekerjasama</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="bekerjadalamtim" id="bekerjadalamtim1" value="5">
                                            <label class="form-check-label" for="bekerjadalamtim1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="bekerjadalamtim" id="bekerjadalamtim2" value="4">
                                                <label class="form-check-label" for="bekerjadalamtim2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="bekerjadalamtim" id="bekerjadalamtim3" value="3">
                                                <label class="form-check-label" for="bekerjadalamtim3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="bekerjadalamtim" id="bekerjadalamtim4" value="2">
                                                <label class="form-check-label" for="bekerjadalamtim4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="bekerjadalamtim" id="bekerjadalamtim5" value="1">
                                                <label class="form-check-label" for="bekerjadalamtim5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Kemampuan dalam memecahkan masalah</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="kemampuandalammemecahkanmasalah" id="kemampuandalammemecahkanmasalah1" value="5">
                                            <label class="form-check-label" for="kemampuandalammemecahkanmasalah1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuandalammemecahkanmasalah" id="kemampuandalammemecahkanmasalah2" value="4">
                                                <label class="form-check-label" for="kemampuandalammemecahkanmasalah2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuandalammemecahkanmasalah" id="kemampuandalammemecahkanmasalah3" value="3">
                                                <label class="form-check-label" for="kemampuandalammemecahkanmasalah3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuandalammemecahkanmasalah" id="kemampuandalammemecahkanmasalah4" value="2">
                                                <label class="form-check-label" for="kemampuandalammemecahkanmasalah4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuandalammemecahkanmasalah" id="kemampuandalammemecahkanmasalah5" value="1">
                                                <label class="form-check-label" for="kemampuandalammemecahkanmasalah5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Negosiasi</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="negoisasi" id="negoisasi1" value="5">
                                            <label class="form-check-label" for="negoisasi1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="negoisasi" id="negoisasi2" value="4">
                                                <label class="form-check-label" for="negoisasi2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="negoisasi" id="negoisasi3" value="3">
                                                <label class="form-check-label" for="negoisasi3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="negoisasi" id="negoisasi4" value="2">
                                                <label class="form-check-label" for="negoisasi4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="negoisasi" id="negoisasi5" value="1">
                                                <label class="form-check-label" for="negoisasi5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Kemampuan analisis</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="kemampuanalisis" id="kemampuanalisis1" value="5">
                                            <label class="form-check-label" for="kemampuanalisis1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuanalisis" id="kemampuanalisis2" value="4">
                                                <label class="form-check-label" for="kemampuanalisis2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuanalisis" id="kemampuanalisis3" value="3">
                                                <label class="form-check-label" for="kemampuanalisis3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuanalisis" id="kemampuanalisis4" value="2">
                                                <label class="form-check-label" for="kemampuanalisis4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuanalisis" id="kemampuanalisis5" value="1">
                                                <label class="form-check-label" for="kemampuanalisis5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Toleransi </td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="toleransi" id="toleransi1" value="5">
                                            <label class="form-check-label" for="toleransi1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="toleransi" id="toleransi2" value="4">
                                                <label class="form-check-label" for="toleransi2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="toleransi" id="toleransi3" value="3">
                                                <label class="form-check-label" for="toleransi3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="toleransi" id="toleransi4" value="2">
                                                <label class="form-check-label" for="toleransi4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="toleransi" id="toleransi5" value="1">
                                                <label class="form-check-label" for="toleransi5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Kemampuan adaptasi</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="kemampuanadaptasi" id="kemampuanadaptasi1" value="5">
                                            <label class="form-check-label" for="kemampuanadaptasi1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuanadaptasi" id="kemampuanadaptasi2" value="4">
                                                <label class="form-check-label" for="kemampuanadaptasi2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuanadaptasi" id="kemampuanadaptasi3" value="3">
                                                <label class="form-check-label" for="kemampuanadaptasi3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuanadaptasi" id="kemampuanadaptasi4" value="2">
                                                <label class="form-check-label" for="kemampuanadaptasi4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuanadaptasi" id="kemampuanadaptasi5" value="1">
                                                <label class="form-check-label" for="kemampuanadaptasi5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Loyalitas</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="loyalitas" id="loyalitas1" value="5">
                                            <label class="form-check-label" for="loyalitas1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="loyalitas" id="loyalitas2" value="4">
                                                <label class="form-check-label" for="loyalitas2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="loyalitas" id="loyalitas3" value="3">
                                                <label class="form-check-label" for="loyalitas3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="loyalitas" id="loyalitas4" value="2">
                                                <label class="form-check-label" for="loyalitas4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="loyalitas" id="loyalitas5" value="1">
                                                <label class="form-check-label" for="loyalitas5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Integritas</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="integritas" id="integritas1" value="5">
                                            <label class="form-check-label" for="integritas1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="integritas" id="integritas2" value="4">
                                                <label class="form-check-label" for="integritas2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="integritas" id="integritas3" value="3">
                                                <label class="form-check-label" for="integritas3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="integritas" id="integritas4" value="2">
                                                <label class="form-check-label" for="integritas4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="integritas" id="integritas5" value="1">
                                                <label class="form-check-label" for="integritas5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Bekerja dengan orang yang berbeda budaya maupun latar belakang</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="bekerjadengancaraberbeda" id="bekerjadengancaraberbeda1" value="5">
                                            <label class="form-check-label" for="bekerjadengancaraberbeda1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="bekerjadengancaraberbeda" id="bekerjadengancaraberbeda2" value="4">
                                                <label class="form-check-label" for="bekerjadengancaraberbeda2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="bekerjadengancaraberbeda" id="bekerjadengancaraberbeda3" value="3">
                                                <label class="form-check-label" for="bekerjadengancaraberbeda3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="bekerjadengancaraberbeda" id="bekerjadengancaraberbeda4" value="2">
                                                <label class="form-check-label" for="bekerjadengancaraberbeda4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="bekerjadengancaraberbeda" id="bekerjadengancaraberbeda5" value="1">
                                                <label class="form-check-label" for="bekerjadengancaraberbeda5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Kepemimpinan</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="kepemimpinan" id="kepemimpinan1" value="5">
                                            <label class="form-check-label" for="kepemimpinan1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kepemimpinan" id="kepemimpinan2" value="4">
                                                <label class="form-check-label" for="kepemimpinan2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kepemimpinan" id="kepemimpinan3" value="3">
                                                <label class="form-check-label" for="kepemimpinan3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kepemimpinan" id="kepemimpinan4" value="2">
                                                <label class="form-check-label" for="kepemimpinan4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kepemimpinan" id="kepemimpinan5" value="1">
                                                <label class="form-check-label" for="kepemimpinan5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Kemampuan dalam memegang tanggungjawab</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="kemampuandalammemegangtanggungjawab" id="kemampuandalammemegangtanggungjawab1" value="5">
                                            <label class="form-check-label" for="kemampuandalammemegangtanggungjawab1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuandalammemegangtanggungjawab" id="kemampuandalammemegangtanggungjawab2" value="4">
                                                <label class="form-check-label" for="kemampuandalammemegangtanggungjawab2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuandalammemegangtanggungjawab" id="kemampuandalammemegangtanggungjawab3" value="3">
                                                <label class="form-check-label" for="kemampuandalammemegangtanggungjawab3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuandalammemegangtanggungjawab" id="kemampuandalammemegangtanggungjawab4" value="2">
                                                <label class="form-check-label" for="kemampuandalammemegangtanggungjawab4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuandalammemegangtanggungjawab" id="kemampuandalammemegangtanggungjawab5" value="1">
                                                <label class="form-check-label" for="kemampuandalammemegangtanggungjawab5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Inisiatif</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="inisiatif" id="inisiatif1" value="5">
                                            <label class="form-check-label" for="inisiatif1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="inisiatif" id="inisiatif2" value="4">
                                                <label class="form-check-label" for="inisiatif2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="inisiatif" id="inisiatif3" value="3">
                                                <label class="form-check-label" for="inisiatif3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="inisiatif" id="inisiatif4" value="2">
                                                <label class="form-check-label" for="inisiatif4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="inisiatif" id="inisiatif5" value="1">
                                                <label class="form-check-label" for="inisiatif5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Manajemen proyek/program</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="manajemenproyek" id="manajemenproyek1" value="5">
                                            <label class="form-check-label" for="manajemenproyek1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="manajemenproyek" id="manajemenproyek2" value="4">
                                                <label class="form-check-label" for="manajemenproyek2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="manajemenproyek" id="manajemenproyek3" value="3">
                                                <label class="form-check-label" for="manajemenproyek3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="manajemenproyek" id="manajemenproyek4" value="2">
                                                <label class="form-check-label" for="manajemenproyek4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="manajemenproyek" id="manajemenproyek5" value="1">
                                                <label class="form-check-label" for="manajemenproyek5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Kemampuan untuk memresentasikan ide/produk/laporan</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="kemampuanmemresentasikanide" id="kemampuanmemresentasikanide1" value="5">
                                            <label class="form-check-label" for="kemampuanmemresentasikanide1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuanmemresentasikanide" id="kemampuanmemresentasikanide2" value="4">
                                                <label class="form-check-label" for="kemampuanmemresentasikanide2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuanmemresentasikanide" id="kemampuanmemresentasikanide3" value="3">
                                                <label class="form-check-label" for="kemampuanmemresentasikanide3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuanmemresentasikanide" id="kemampuanmemresentasikanide4" value="2">
                                                <label class="form-check-label" for="kemampuanmemresentasikanide4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuanmemresentasikanide" id="kemampuanmemresentasikanide5" value="1">
                                                <label class="form-check-label" for="kemampuanmemresentasikanide5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Kemampuan dalam menulis laporan, memo dan dokumen</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="kemampuandalammenulislaporan" id="kemampuandalammenulislaporan1" value="5">
                                            <label class="form-check-label" for="kemampuandalammenulislaporan1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuandalammenulislaporan" id="kemampuandalammenulislaporan2" value="4">
                                                <label class="form-check-label" for="kemampuandalammenulislaporan2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuandalammenulislaporan" id="kemampuandalammenulislaporan3" value="3">
                                                <label class="form-check-label" for="kemampuandalammenulislaporan3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuandalammenulislaporan" id="kemampuandalammenulislaporan4" value="2">
                                                <label class="form-check-label" for="kemampuandalammenulislaporan4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuandalammenulislaporan" id="kemampuandalammenulislaporan5" value="1">
                                                <label class="form-check-label" for="kemampuandalammenulislaporan5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>Kemampuan untuk terus belajar sepanjang hayat</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="kemampuanuntukterusbelajar" id="kemampuanuntukterusbelajar1" value="5">
                                            <label class="form-check-label" for="kemampuanuntukterusbelajar1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuanuntukterusbelajar" id="kemampuanuntukterusbelajar2" value="4">
                                                <label class="form-check-label" for="kemampuanuntukterusbelajar2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuanuntukterusbelajar" id="kemampuanuntukterusbelajar3" value="3">
                                                <label class="form-check-label" for="kemampuanuntukterusbelajar3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuanuntukterusbelajar" id="kemampuanuntukterusbelajar4" value="2">
                                                <label class="form-check-label" for="kemampuanuntukterusbelajar4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuanuntukterusbelajar" id="kemampuanuntukterusbelajar5" value="1">
                                                <label class="form-check-label" for="kemampuanuntukterusbelajar5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                        </div>
                      </div>
                      <div align="right">
                        <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_tingkat_pendidikan_yang_tepat" type="button"><b>Clear Selection</b>

                        </button>
                    </div>
                </blockquote>
                </div>


              <div class = "card-panel responsive-card">


                <blockquote style="border-left: 5px solid #86b080;">
                    <div class="row">
                        <div class="col-md-12" style="padding: 15px">
                            <b>Pada saat ini, pada tingkat mana kompetensi di bawah ini diperlukan dalam pekerjaan? (B)</b>
                                <table class="lefted highlight">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Sangat Tinggi</th>
                                        <th>Tinggi</th>
                                        <th>Cukup</th>
                                        <th>Rendah</th>
                                        <th>Sangat Rendah</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr>
                                        <td>Pengetahuan di bidang atau disiplin ilmu Anda</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="pengetahuandibidang_b" id="pengetahuandibidang_b1" value="5">
                                            <label class="form-check-label" for="pengetahuandibidang_b1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="pengetahuandibidang_b" id="pengetahuandibidang_b2" value="4">
                                                <label class="form-check-label" for="pengetahuandibidang_b2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="pengetahuandibidang_b" id="pengetahuandibidang_b3" value="3">
                                                <label class="form-check-label" for="pengetahuandibidang_b3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="pengetahuandibidang_b" id="pengetahuandibidang_b4" value="2">
                                                <label class="form-check-label" for="pengetahuandibidang_b4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="pengetahuandibidang_b" id="pengetahuandibidang_b5" value="1">
                                                <label class="form-check-label" for="pengetahuandibidang_b5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Pengetahuan di luar bidang atau disiplin ilmu Anda</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="pengetahuandiluarbidang_b" id="pengetahuandiluarbidang_b1" value="5">
                                            <label class="form-check-label" for="pengetahuandiluarbidang_b1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="pengetahuandiluarbidang_b" id="pengetahuandiluarbidang_b2" value="4">
                                                <label class="form-check-label" for="pengetahuandiluarbidang_b2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="pengetahuandiluarbidang_b" id="pengetahuandiluarbidang_b3" value="3">
                                                <label class="form-check-label" for="pengetahuandiluarbidang_b3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="pengetahuandiluarbidang_b" id="pengetahuandiluarbidang_b4" value="2">
                                                <label class="form-check-label" for="pengetahuandiluarbidang_b4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="pengetahuandiluarbidang_b" id="pengetahuandiluarbidang_b5" value="1">
                                                <label class="form-check-label" for="pengetahuandiluarbidang_b5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Pengetahuan umum</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="pengetahuanumum_b" id="pengetahuanumum_b1" value="5">
                                            <label class="form-check-label" for="pengetahuanumum_b1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="pengetahuanumum_b" id="pengetahuanumum_b2" value="4">
                                                <label class="form-check-label" for="pengetahuanumum_b2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="pengetahuanumum_b" id="pengetahuanumum_b3" value="3">
                                                <label class="form-check-label" for="pengetahuanumum_b3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="pengetahuanumum_b" id="pengetahuanumum_b4" value="2">
                                                <label class="form-check-label" for="pengetahuanumum_b4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="pengetahuanumum_b" id="pengetahuanumum_b5" value="1">
                                                <label class="form-check-label" for="pengetahuanumum_b5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Bahasa Inggris</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="bahasainggris_b" id="bahasainggris_b1" value="5">
                                            <label class="form-check-label" for="bahasainggris_b1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="bahasainggris_b" id="bahasainggris_b2" value="4">
                                                <label class="form-check-label" for="bahasainggris_b2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="bahasainggris_b" id="bahasainggris_b3" value="3">
                                                <label class="form-check-label" for="bahasainggris_b3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="bahasainggris_b" id="bahasainggris_b4" value="2">
                                                <label class="form-check-label" for="bahasainggris_b4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="bahasainggris_b" id="bahasainggris_b5" value="1">
                                                <label class="form-check-label" for="bahasainggris_b5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Ketrampilan internet</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="ketrampilaninternet_b" id="ketrampilaninternet_b1" value="5">
                                            <label class="form-check-label" for="ketrampilaninternet_b1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="ketrampilaninternet_b" id="ketrampilaninternet_b2" value="4">
                                                <label class="form-check-label" for="ketrampilaninternet_b2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="ketrampilaninternet_b" id="ketrampilaninternet_b3" value="3">
                                                <label class="form-check-label" for="ketrampilaninternet_b3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="ketrampilaninternet_b" id="ketrampilaninternet_b4" value="2">
                                                <label class="form-check-label" for="ketrampilaninternet_b4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="ketrampilaninternet_b" id="ketrampilaninternet_b5" value="1">
                                                <label class="form-check-label" for="ketrampilaninternet_b5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Ketrampilan komputer</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="ketrampilankomputer_b" id="ketrampilankomputer_b1" value="5">
                                            <label class="form-check-label" for="ketrampilankomputer_b1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="ketrampilankomputer_b" id="ketrampilankomputer_b2" value="4">
                                                <label class="form-check-label" for="ketrampilankomputer_b2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="ketrampilankomputer_b" id="ketrampilankomputer_b3" value="3">
                                                <label class="form-check-label" for="ketrampilankomputer_b3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="ketrampilankomputer_b" id="ketrampilankomputer_b4" value="2">
                                                <label class="form-check-label" for="ketrampilankomputer_b4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="ketrampilankomputer_b" id="ketrampilankomputer_b5" value="1">
                                                <label class="form-check-label" for="ketrampilankomputer_b5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Berpikir kritis</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="berpikirkritis_b" id="berpikirkritis_b1" value="5">
                                            <label class="form-check-label" for="berpikirkritis_b1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="berpikirkritis_b" id="berpikirkritis_b2" value="4">
                                                <label class="form-check-label" for="berpikirkritis_b2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="berpikirkritis_b" id="berpikirkritis_b3" value="3">
                                                <label class="form-check-label" for="berpikirkritis_b3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="berpikirkritis_b" id="berpikirkritis_b4" value="2">
                                                <label class="form-check-label" for="berpikirkritis_b4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="berpikirkritis_b" id="berpikirkritis_b5" value="1">
                                                <label class="form-check-label" for="berpikirkritis_b5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Ketrampilan riset</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="ketrampilanriset_b" id="ketrampilanriset_b1" value="5">
                                            <label class="form-check-label" for="ketrampilanriset_b1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="ketrampilanriset_b" id="ketrampilanriset_b2" value="4">
                                                <label class="form-check-label" for="ketrampilanriset_b2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="ketrampilanriset_b" id="ketrampilanriset_b3" value="3">
                                                <label class="form-check-label" for="ketrampilanriset_b3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="ketrampilanriset_b" id="ketrampilanriset_b4" value="2">
                                                <label class="form-check-label" for="ketrampilanriset_b4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="ketrampilanriset_b" id="ketrampilanriset_b5" value="1">
                                                <label class="form-check-label" for="ketrampilanriset_b5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Kemampuan belajar</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="kemampuanbelajar_b" id="kemampuanbelajar_b1" value="5">
                                            <label class="form-check-label" for="kemampuanbelajar_b1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuanbelajar_b" id="kemampuanbelajar_b2" value="4">
                                                <label class="form-check-label" for="kemampuanbelajar_b2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuanbelajar_b" id="kemampuanbelajar_b3" value="3">
                                                <label class="form-check-label" for="kemampuanbelajar_b3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuanbelajar_b" id="kemampuanbelajar_b4" value="2">
                                                <label class="form-check-label" for="kemampuanbelajar_b4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuanbelajar_b" id="kemampuanbelajar_b5" value="1">
                                                <label class="form-check-label" for="kemampuanbelajar_b5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Kemampuan berkomunikasi</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="kemampuanberkomunikasi_b" id="kemampuanberkomunikasi_b1" value="5">
                                            <label class="form-check-label" for="kemampuanberkomunikasi_b1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuanberkomunikasi_b" id="kemampuanberkomunikasi_b2" value="4">
                                                <label class="form-check-label" for="kemampuanberkomunikasi_b2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuanberkomunikasi_b" id="kemampuanberkomunikasi_b3" value="3">
                                                <label class="form-check-label" for="kemampuanberkomunikasi_b3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuanberkomunikasi_b" id="kemampuanberkomunikasi_b4" value="2">
                                                <label class="form-check-label" for="kemampuanberkomunikasi_b4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuanberkomunikasi_b" id="kemampuanberkomunikasi_b5" value="1">
                                                <label class="form-check-label" for="kemampuanberkomunikasi_b5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Bekerja di bawah tekanan</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="bekerjadibawahtekanan_b" id="bekerjadibawahtekanan_b1" value="5">
                                            <label class="form-check-label" for="bekerjadibawahtekanan_b1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="bekerjadibawahtekanan_b" id="bekerjadibawahtekanan_b2" value="4">
                                                <label class="form-check-label" for="bekerjadibawahtekanan_b2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="bekerjadibawahtekanan_b" id="bekerjadibawahtekanan_b3" value="3">
                                                <label class="form-check-label" for="bekerjadibawahtekanan_b3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="bekerjadibawahtekanan_b" id="bekerjadibawahtekanan_b4" value="2">
                                                <label class="form-check-label" for="bekerjadibawahtekanan_b4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="bekerjadibawahtekanan_b" id="bekerjadibawahtekanan_b5" value="1">
                                                <label class="form-check-label" for="bekerjadibawahtekanan_b5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Manajemen waktu</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="manajemenwaktu_b" id="manajemenwaktu_b1" value="5">
                                            <label class="form-check-label" for="manajemenwaktu_b1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="manajemenwaktu_b" id="manajemenwaktu_b2" value="4">
                                                <label class="form-check-label" for="manajemenwaktu_b2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="manajemenwaktu_b" id="manajemenwaktu_b3" value="3">
                                                <label class="form-check-label" for="manajemenwaktu_b3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="manajemenwaktu_b" id="manajemenwaktu_b4" value="2">
                                                <label class="form-check-label" for="manajemenwaktu_b4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="manajemenwaktu_b" id="manajemenwaktu_b5" value="1">
                                                <label class="form-check-label" for="manajemenwaktu_b5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Bekerja secara mandiri</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="bekerjasecaramandiri_b" id="bekerjasecaramandiri_b1" value="5">
                                            <label class="form-check-label" for="bekerjasecaramandiri_b1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="bekerjasecaramandiri_b" id="bekerjasecaramandiri_b2" value="4">
                                                <label class="form-check-label" for="bekerjasecaramandiri_b2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="bekerjasecaramandiri_b" id="bekerjasecaramandiri_b3" value="3">
                                                <label class="form-check-label" for="bekerjasecaramandiri_b3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="bekerjasecaramandiri_b" id="bekerjasecaramandiri_b4" value="2">
                                                <label class="form-check-label" for="bekerjasecaramandiri_b4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="bekerjasecaramandiri_b" id="bekerjasecaramandiri_b5" value="1">
                                                <label class="form-check-label" for="bekerjasecaramandiri_b5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Bekerja dalam tim/bekerjasama</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="bekerjadalamtim_b" id="bekerjadalamtim_b1" value="5">
                                            <label class="form-check-label" for="bekerjadalamtim_b1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="bekerjadalamtim_b" id="bekerjadalamtim_b2" value="4">
                                                <label class="form-check-label" for="bekerjadalamtim_b2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="bekerjadalamtim_b" id="bekerjadalamtim_b3" value="3">
                                                <label class="form-check-label" for="bekerjadalamtim_b3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="bekerjadalamtim_b" id="bekerjadalamtim_b4" value="2">
                                                <label class="form-check-label" for="bekerjadalamtim_b4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="bekerjadalamtim_b" id="bekerjadalamtim_b5" value="1">
                                                <label class="form-check-label" for="bekerjadalamtim_b5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Kemampuan dalam memecahkan masalah</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="kemampuandalammemecahkanmasalah_b" id="kemampuandalammemecahkanmasalah_b1" value="5">
                                            <label class="form-check-label" for="kemampuandalammemecahkanmasalah_b1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuandalammemecahkanmasalah_b" id="kemampuandalammemecahkanmasalah_b2" value="4">
                                                <label class="form-check-label" for="kemampuandalammemecahkanmasalah_b2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuandalammemecahkanmasalah_b" id="kemampuandalammemecahkanmasalah_b3" value="3">
                                                <label class="form-check-label" for="kemampuandalammemecahkanmasalah_b3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuandalammemecahkanmasalah_b" id="kemampuandalammemecahkanmasalah_b4" value="2">
                                                <label class="form-check-label" for="kemampuandalammemecahkanmasalah_b4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuandalammemecahkanmasalah_b" id="kemampuandalammemecahkanmasalah_b5" value="1">
                                                <label class="form-check-label" for="kemampuandalammemecahkanmasalah_b5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Negosiasi</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="negosisasi_b" id="negosisasi_b1" value="5">
                                            <label class="form-check-label" for="negosisasi_b1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="negosisasi_b" id="negosisasi_b2" value="4">
                                                <label class="form-check-label" for="negosisasi_b2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="negosisasi_b" id="negosisasi_b3" value="3">
                                                <label class="form-check-label" for="negosisasi_b3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="negosisasi_b" id="negosisasi_b4" value="2">
                                                <label class="form-check-label" for="negosisasi_b4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="negosisasi_b" id="negosisasi_b5" value="1">
                                                <label class="form-check-label" for="negosisasi_b5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>Kemampuan analisis</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="kemampuanalisis_b" id="kemampuanalisis_b1" value="5">
                                            <label class="form-check-label" for="kemampuanalisis_b1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuanalisis_b" id="kemampuanalisis_b2" value="4">
                                                <label class="form-check-label" for="kemampuanalisis_b2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuanalisis_b" id="kemampuanalisis_b3" value="3">
                                                <label class="form-check-label" for="kemampuanalisis_b3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuanalisis_b" id="kemampuanalisis_b4" value="2">
                                                <label class="form-check-label" for="kemampuanalisis_b4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuanalisis_b" id="kemampuanalisis_b5" value="1">
                                                <label class="form-check-label" for="kemampuanalisis_b5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Toleransi</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="toleransi_b" id="toleransi_b1" value="5">
                                            <label class="form-check-label" for="toleransi_b1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="toleransi_b" id="toleransi_b2" value="4">
                                                <label class="form-check-label" for="toleransi_b2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="toleransi_b" id="toleransi_b3" value="3">
                                                <label class="form-check-label" for="toleransi_b3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="toleransi_b" id="toleransi_b4" value="2">
                                                <label class="form-check-label" for="toleransi_b4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="toleransi_b" id="toleransi_b5" value="1">
                                                <label class="form-check-label" for="toleransi_b5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Kemampuan adaptasi</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="kemampuanadaptasi_b" id="kemampuanadaptasi_b1" value="5">
                                            <label class="form-check-label" for="kemampuanadaptasi_b1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuanadaptasi_b" id="kemampuanadaptasi_b2" value="4">
                                                <label class="form-check-label" for="kemampuanadaptasi_b2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuanadaptasi_b" id="kemampuanadaptasi_b3" value="3">
                                                <label class="form-check-label" for="kemampuanadaptasi_b3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuanadaptasi_b" id="kemampuanadaptasi_b4" value="2">
                                                <label class="form-check-label" for="kemampuanadaptasi_b4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuanadaptasi_b" id="kemampuanadaptasi_b5" value="1">
                                                <label class="form-check-label" for="kemampuanadaptasi_b5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Loyalitas</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="loyalitas_b" id="loyalitas_b1" value="5">
                                            <label class="form-check-label" for="loyalitas_b1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="loyalitas_b" id="loyalitas_b2" value="4">
                                                <label class="form-check-label" for="loyalitas_b2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="loyalitas_b" id="loyalitas_b3" value="3">
                                                <label class="form-check-label" for="loyalitas_b3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="loyalitas_b" id="loyalitas_b4" value="2">
                                                <label class="form-check-label" for="loyalitas_b4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="loyalitas_b" id="loyalitas_b5" value="1">
                                                <label class="form-check-label" for="loyalitas_b5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>integritas</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="integritas_b" id="integritas_b1" value="5">
                                            <label class="form-check-label" for="integritas_b1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="integritas_b" id="integritas_b2" value="4">
                                                <label class="form-check-label" for="integritas_b2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="integritas_b" id="integritas_b3" value="3">
                                                <label class="form-check-label" for="integritas_b3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="integritas_b" id="integritas_b4" value="2">
                                                <label class="form-check-label" for="integritas_b4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="integritas_b" id="integritas_b5" value="1">
                                                <label class="form-check-label" for="integritas_b5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Bekerja dengan orang yang berbeda budaya maupun latar belakang</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="bekerjadenganlatarbelakang_b2" id="bekerjadenganlatarbelakang_b21" value="5">
                                            <label class="form-check-label" for="bekerjadenganlatarbelakang_b21">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="bekerjadenganlatarbelakang_b2" id="bekerjadenganlatarbelakang_b22" value="4">
                                                <label class="form-check-label" for="bekerjadenganlatarbelakang_b22">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="bekerjadenganlatarbelakang_b2" id="bekerjadenganlatarbelakang_b23" value="3">
                                                <label class="form-check-label" for="bekerjadenganlatarbelakang_b23">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="bekerjadenganlatarbelakang_b2" id="bekerjadenganlatarbelakang_b24" value="2">
                                                <label class="form-check-label" for="bekerjadenganlatarbelakang_b24">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="bekerjadenganlatarbelakang_b2" id="bekerjadenganlatarbelakang_b25" value="1">
                                                <label class="form-check-label" for="bekerjadenganlatarbelakang_b25">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Kepemimpinan</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="kepemimpinan_b" id="kepemimpinan_b1" value="5">
                                            <label class="form-check-label" for="kepemimpinan_b1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kepemimpinan_b" id="kepemimpinan_b2" value="4">
                                                <label class="form-check-label" for="kepemimpinan_b2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kepemimpinan_b" id="kepemimpinan_b3" value="3">
                                                <label class="form-check-label" for="kepemimpinan_b3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kepemimpinan_b" id="kepemimpinan_b4" value="2">
                                                <label class="form-check-label" for="kepemimpinan_b4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kepemimpinan_b" id="kepemimpinan_b5" value="1">
                                                <label class="form-check-label" for="kepemimpinan_b5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Kemampuan dalam memegang tanggungjawab</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="kemampuandalamtanggungjawab_b" id="kemampuandalamtanggungjawab_b1" value="5">
                                            <label class="form-check-label" for="kemampuandalamtanggungjawab_b1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuandalamtanggungjawab_b" id="kemampuandalamtanggungjawab_b2" value="4">
                                                <label class="form-check-label" for="kemampuandalamtanggungjawab_b2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuandalamtanggungjawab_b" id="kemampuandalamtanggungjawab_b3" value="3">
                                                <label class="form-check-label" for="kemampuandalamtanggungjawab_b3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuandalamtanggungjawab_b" id="kemampuandalamtanggungjawab_b4" value="2">
                                                <label class="form-check-label" for="kemampuandalamtanggungjawab_b4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuandalamtanggungjawab_b" id="kemampuandalamtanggungjawab_b5" value="1">
                                                <label class="form-check-label" for="kemampuandalamtanggungjawab_b5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Inisiatif</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="inisiatif_b" id="inisiatif_b1" value="5">
                                            <label class="form-check-label" for="inisiatif_b1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="inisiatif_b" id="inisiatif_b2" value="4">
                                                <label class="form-check-label" for="inisiatif_b2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="inisiatif_b" id="inisiatif_b3" value="3">
                                                <label class="form-check-label" for="inisiatif_b3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="inisiatif_b" id="inisiatif_b4" value="2">
                                                <label class="form-check-label" for="inisiatif_b4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="inisiatif_b" id="inisiatif_b5" value="1">
                                                <label class="form-check-label" for="inisiatif_b5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Manajemen proyek/program</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="manajemenproyek_b" id="manajemenproyek_b1" value="5">
                                            <label class="form-check-label" for="manajemenproyek_b1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="manajemenproyek_b" id="manajemenproyek_b2" value="4">
                                                <label class="form-check-label" for="manajemenproyek_b2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="manajemenproyek_b" id="manajemenproyek_b3" value="3">
                                                <label class="form-check-label" for="manajemenproyek_b3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="manajemenproyek_b" id="manajemenproyek_b4" value="2">
                                                <label class="form-check-label" for="manajemenproyek_b4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="manajemenproyek_b" id="manajemenproyek_b5" value="1">
                                                <label class="form-check-label" for="manajemenproyek_b5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Kemampuan untuk memresentasikan ide/produk/laporan</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="mempresentasikanideproduk_b" id="mempresentasikanideproduk_b1" value="5">
                                            <label class="form-check-label" for="mempresentasikanideproduk_b1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="mempresentasikanideproduk_b" id="mempresentasikanideproduk_b2" value="4">
                                                <label class="form-check-label" for="mempresentasikanideproduk_b2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="mempresentasikanideproduk_b" id="mempresentasikanideproduk_b3" value="3">
                                                <label class="form-check-label" for="mempresentasikanideproduk_b3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="mempresentasikanideproduk_b" id="mempresentasikanideproduk_b4" value="2">
                                                <label class="form-check-label" for="mempresentasikanideproduk_b4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="mempresentasikanideproduk_b" id="mempresentasikanideproduk_b5" value="1">
                                                <label class="form-check-label" for="mempresentasikanideproduk_b5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Kemampuan dalam menulis laporan, memo dan dokumen</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="kemampuandalammenulislaporan_b" id="kemampuandalammenulislaporan_b1" value="5">
                                            <label class="form-check-label" for="kemampuandalammenulislaporan_b1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuandalammenulislaporan_b" id="kemampuandalammenulislaporan_b2" value="4">
                                                <label class="form-check-label" for="kemampuandalammenulislaporan_b2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuandalammenulislaporan_b" id="kemampuandalammenulislaporan_b3" value="3">
                                                <label class="form-check-label" for="kemampuandalammenulislaporan_b3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuandalammenulislaporan_b" id="kemampuandalammenulislaporan_b4" value="2">
                                                <label class="form-check-label" for="kemampuandalammenulislaporan_b4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuandalammenulislaporan_b" id="kemampuandalammenulislaporan_b5" value="1">
                                                <label class="form-check-label" for="kemampuandalammenulislaporan_b5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Kemampuan untuk terus belajar sepanjang hayat</td>
                                        <td>
                                            <div class="form-check">
                                            <input class="form-check-input " type="radio" name="kemampuanuntukbelajarsepanjanghayat_b" id="kemampuanuntukbelajarsepanjanghayat_b1" value="5">
                                            <label class="form-check-label" for="kemampuanuntukbelajarsepanjanghayat_b1">

                                            </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuanuntukbelajarsepanjanghayat_b" id="kemampuanuntukbelajarsepanjanghayat_b2" value="4">
                                                <label class="form-check-label" for="kemampuanuntukbelajarsepanjanghayat_b2">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuanuntukbelajarsepanjanghayat_b" id="kemampuanuntukbelajarsepanjanghayat_b3" value="3">
                                                <label class="form-check-label" for="kemampuanuntukbelajarsepanjanghayat_b3">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuanuntukbelajarsepanjanghayat_b" id="kemampuanuntukbelajarsepanjanghayat_b4" value="2">
                                                <label class="form-check-label" for="kemampuanuntukbelajarsepanjanghayat_b4">

                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input " type="radio" name="kemampuanuntukbelajarsepanjanghayat_b" id="kemampuanuntukbelajarsepanjanghayat_b5" value="1">
                                                <label class="form-check-label" for="kemampuanuntukbelajarsepanjanghayat_b5">

                                                </label>
                                            </div>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                        </div>
                      </div>
                      <div align="right">
                        <button style="background-color:white;color:#97c197" class="btn waves-effect waves-light" id="reset_tingkat_pendidikan_yang_tepat" type="button"><b>Clear Selection</b>

                        </button>
                    </div>
                </blockquote>
                </div>


        <div align="right">

            <button type="button" class="btn waves-effect waves-light" id="b5" name="action">Kirim Tracer Study
                <i class="material-icons right">send</i>
            </button>
        </div>


          </form>
        </div>
      </section>
      </html>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/cleave.js@1.5.3/dist/cleave.min.js"></script>
      <script src="https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js"></script>
      <script type="text/javascript" language="javascript" >
        
            document.getElementById('b5').onclick = function(){
                if($('input[name ="email"]').val() == '' || $('input[name ="jeniskelamin"]').val() == '' || $('input[name ="no_whatsapp"]').val() == '' || $('input[name ="alamat"]').val() == ''){
                swal({
                    title: "Warning!",
                    text: "Lengkapi data Anda terlebih dahulu!",
                    icon: "warning",
                    button: "Aww yiss!",
                });
                }else{
                    swal({
                        title: "Are you sure?",
                        text: " Submit data tracer study!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: '#DD6B55',
                        confirmButtonText: 'YA, submit tracer!',
                        cancelButtonText: "Batalkan, submit !",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function(isConfirm){
                    if (isConfirm){
                        document.getElementById("survey-form").submit();
                        
                    } else {
                      swal("Cancelled", "Anda Membatalkan Submit Tracer", "error");
                    }
                    });
                }
            };
 
           
               
         
        
        

        document.querySelectorAll('.loan_max_amount').forEach(inp => new Cleave(inp, {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
          }));
        function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
         window.onscroll = function() {myFunction()};

            var header = document.getElementById("myHeader");
            var sticky = header.offsetTop;

            function myFunction() {
            if (window.pageYOffset > sticky) {
                header.classList.add("sticky");
            } else {
                header.classList.remove("sticky");
            }
            }
        $('#reset_organisasi_kemahasiswaan').click(function() {
            $('input[name="organisasi_dalam_kemahasiswaan[]"]').prop('checked', false);



        });

        $('#reset_kemukakan_kedudukan_saudara').click(function() {
            $('input[name="kedudukansaudara"]').prop('checked', false);
        });

        $('#reset_kegiatan_organisasi_kemahasiswaan').click(function() {
            $('input[name="panitiakegiatan"]').prop('checked', false);
        });

        $('#reset_kemahasiswaan_nu').click(function() {
            $('input[name="organisasikemahasiswaanNU"]').prop('checked', false);
        });

        $('#reset_iya_nu').click(function() {
            $('input[name="organisasiNU"]').prop('checked', false);
        });

        $('#reset_kemukakankedudukanpengurusorganisasi').click(function() {
            $('input[name="kemukakankedudukanpengurusorganisasi"]').prop('checked', false);
        });

        $('#reset_kemukakankedudukanpanitiaorganisasi').click(function() {
            $('input[name="kemukakankedudukanpanitiaorganisasi"]').prop('checked', false);
        });

        $('#reset_BerapakaliSaudaramenjadipanitiadalamorganisasi').click(function() {
            $('input[name="BerapakaliSaudaramenjadipanitiadalamorganisasi"]').prop('checked', false);
        });

        $('#reset_penekanan_pada_metode_pembelajaran').click(function() {
            $('input[name="kuliah"]').prop('checked', false);
            $('input[name="responsi"]').prop('checked', false);
            $('input[name="seminar"]').prop('checked', false);
            $('input[name="praktikum"]').prop('checked', false);
            $('input[name="praktek_lapangan"]').prop('checked', false);
            $('input[name="penelitian"]').prop('checked', false);
            $('input[name="pelatihan_militer"]').prop('checked', false);
            $('input[name="pertukaran_pelajar"]').prop('checked', false);
            $('input[name="magang"]').prop('checked', false);
            $('input[name="wirausaha"]').prop('checked', false);
            $('input[name="pengabdian"]').prop('checked', false);
        });

        $('#reset_mulai_mencari_pekerjaan').click(function() {
            $('input[name="pertanyaan_f3"]').prop('checked', false);
            $('input[name="pertanyaanf3_input_sebelum"]').val('');
            $('input[name="pertanyaanf3_input_setelah"]').val('');

        });

        $('#reset_mencari_pekerjaan').click(function() {
            $('input[name="pertanyaanf4_iklan"]').prop('checked', false);
            $('input[name="pertanyaanf4_melamar"]').prop('checked', false);
            $('input[name="pertanyaanf4_pergi"]').prop('checked', false);
            $('input[name="pertanyaanf4_mencari"]').prop('checked', false);
            $('input[name="pertanyaanf4_dihubungi"]').prop('checked', false);
            $('input[name="pertanyaanf4_menghubungi_kemenakertrans"]').prop('checked', false);
            $('input[name="pertanyaanf4_memeroleh"]').prop('checked', false);
            $('input[name="pertanyaanf4_menghubungi_kantor"]').prop('checked', false);
            $('input[name="pertanyaanf4_membangun_jejaring"]').prop('checked', false);
            $('input[name="pertanyaanf4_melalui"]').prop('checked', false);
            $('input[name="pertanyaanf4_membangun_bisnis"]').prop('checked', false);
            $('input[name="pertanyaanf4_melalui_magang"]').prop('checked', false);
            $('input[name="pertanyaanf4_bekerja_tempat_sama"]').prop('checked', false);
            $('input[name="pertanyaanf4_lainnya"]').prop('checked', false);
        });

        $('#reset_bulan_untuk_mencari_pekerjaan').click(function() {
            $('input[name="pertanyaan2_f5"]').prop('checked', false);
            $('input[name="pertanyaanf5input"]').val('');
            $('input[name="pertanyaanf5input2"]').val('');
        });

        $('#reset_perusahaan_yang_sudah_anda_lamar_lewat_email').click(function() {
            $('input[name="pertanyaanf6"]').val('');
        });

        $('#reset_perusahaan_merespon').click(function() {
            $('input[name="pertanyaanf7"]').val('');
        });

        $('#reset_perusahaan_yang_mengundang_anda').click(function() {
            $('input[name="pertanyaanf7a"]').val('');
        });

        $('#reset_perusahaan_tempat_bekerja').click(function() {
            $('input[name="perusahaan_tempat_bekerja"]').val('');
        });

        $('#reset_alamat_tempat_bekerja').click(function() {
            $('input[name="alamat_tempat_bekerja"]').val('');
        });

        $('#reset_no_telp_perusahaan').click(function() {
            $('input[name="no_telp_perusahaan"]').val('');
        });

        $('#reset_anda_bekerja_saat_ini').click(function() {
            $('input[name="pertanyaanf8"]').prop('checked', false);
        });

        $('#reset_menggambarkan_situasi_anda').click(function() {
            $('input[name="pertanyaanf9_belajar"]').prop('checked', false);
            $('input[name="pertanyaanf9_menikah"]').prop('checked', false);
            $('input[name="pertanyaanf9_sibuk_keluarga"]').prop('checked', false);
            $('input[name="pertanyaanf9_sedang_mencari_pekerjaan"]').prop('checked', false);
            $('input[name="pertanyaanf9_lainnya"]').prop('checked', false);
        });

        $('#reset_pekerjaan_dalam_4minggu').click(function() {
            $('input[name="pertanyaanf10"]').prop('checked', false);

        });

        $('#reset_nama_atasan_langsung').click(function() {
            $('input[name="nama_atasan_langsung"]').val('');
        });

         $('#reset_nohp_atasan_langsung').click(function() {
            $('input[name="no_hp_atasan"]').val('');
        });

        $('#reset_jenis_perusahaan_tempat_bekerja').click(function() {
            $('input[name="wiraswastaijintidakberijin_ijin"]').prop('checked', false);
            $('input[name="wiraswastaijintidakberijin_tidakijin"]').prop('checked', false);
            $('input[name="wiraswastaijintidakberijin_lokal"]').prop('checked', false);
            $('input[name="wiraswastaijintidakberijin_nasional"]').prop('checked', false);
            $('input[name="wiraswastaijintidakberijin_internasional"]').prop('checked', false);
        });

        $('#reset_pendapatan_setiap_bulannya').click(function() {
            $('input[name="pekerjaan_utama"]').val('');
            $('input[name="lembur_tips"]').val('');
            $('input[name="pekerjaan_lainnya"]').val('');
        });

        $('#reset_Seberapaerathubunganantarabidangstudi').click(function() {
            $('input[name="pertanyaanf14"]').prop('checked', false);

        });

        $('#reset_tingkat_pendidikan_yang_tepat').click(function() {
            $('input[name="pertanyaanf15"]').prop('checked', false);

        });

        $('#reset_tingkat_pendidikan_yang_tepat2').click(function() {
            $('input[name="pertanyaanf16_pertanyaan_tidak_sesuai"]').prop('checked', false);
            $('input[name="pertanyaanf16_Saya_belum_mendapatkan_pekerjaan_yang_lebih_sesuai"]').prop('checked', false);
            $('input[name="pertanyaanf16_di_pekerjaan_ini_saya_memeroleh_prospek_karir_yang_baik"]').prop('checked', false);
            $('input[name="pertanyaanf16_saya_lebih_suka_bekerja_di_area_pekerjaan"]').prop('checked', false);
            $('input[name="pertanyaanf16_saya_dipromosikan_ke_posisi_yang_kurang"]').prop('checked', false);

            $('input[name="pertanyaanf16_Saya_dapat_memeroleh_pendapatan"]').prop('checked', false);
            $('input[name="pertanyaanf16_Pekerjaan_saya_saat_ini_lebih_aman_terjamin_secure"]').prop('checked', false);
            $('input[name="pertanyaanf16_Pekerjaan_saya_saat_ini_lebih_menarik"]').prop('checked', false);
            $('input[name="pertanyaanf16_Pekerjaan_saya_saat_ini_lebih_memungkinkan"]').prop('checked', false);
            $('input[name="pertanyaanf16_Pekerjaan_saya_saat_ini_lokasinya_lebih_dekat"]').prop('checked', false);

            $('input[name="pertanyaanf16_Pekerjaan_saya_saat_ini_dapat_lebih"]').prop('checked', false);
            $('input[name="pertanyaanf16_Pada_awal_meniti_karir_ini"]').prop('checked', false);
            $('input[name="pertanyaanf16_Lainnya"]').prop('checked', false);
        });

        </script>
