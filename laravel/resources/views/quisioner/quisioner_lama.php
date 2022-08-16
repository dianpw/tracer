<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap 4 Fixed Layout Example</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark mb-3" style="background-color: #3cc16a !important">
    <div class="container">
        <a href="#" class="navbar-brand mr-3">Tracer Study Unisma</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        {{--  <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="#" class="nav-item nav-link active">Home</a>
                <a href="#" class="nav-item nav-link">Services</a>
                <a href="#" class="nav-item nav-link">About</a>
                <a href="#" class="nav-item nav-link">Contact</a>
            </div>
            <div class="navbar-nav ml-auto">
                <a href="#" class="nav-item nav-link">Register</a>
                <a href="#" class="nav-item nav-link">Login</a>
            </div>
        </div>  --}}
    </div>
</nav>
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
    <div class="d-flex">
        <div>

        </div>
        <div class="ml-auto" style="margin-right: 80px; margin-bottom:30px">
          <table>
            <tr>
                <td>
                    NPM
                </td>
                <td>&nbsp&nbsp:</td>
                <td><b>{{$data_mhs->npm}}</b></td>
            </tr>
              <tr>
                  <td>
                      Nama
                  </td>
                  <td>&nbsp&nbsp:</td>
                  <td><b>{{$data_mhs->nama}}</b></td>
              </tr>
              <tr>
                <td>
                    Tahun Lulus
                </td>
                <td>&nbsp&nbsp:</td>
                <td><b>{{$data_mhs->tahun_lulus}}</b></td>
            </tr>
            </table>
        </div>
   </div>

<div class="container">
    <div class="pertanyaan1">
        <div class="card" style="width: 100%;">
            <form action="{{url('submit-tracer')}}" method="POST">
            @csrf
            <input type="hidden" value="{{$data_mhs->npm}}" name="npm">
            <div class="card-header">
                Menurut anda seberapa besar penekanan pada metode pembelajaran di bawah ini dilaksanakan di program studi anda?
            </div>

            <div class="row" style="padding: 15px">
                <div class="col-md-3">
                    <b>Perkuliahan</b></br>
                        <div class="form-check">
                            <input class="form-check-input" type="radio"  name="perkuliahan" id="perkuliahan" value="sangat besar">
                            <label class="form-check-label" for="perkuliahan">
                            Sangat Besar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="perkuliahan" id="perkuliahan2" value="besar">
                            <label class="form-check-label" for="perkuliahan2">
                            Besar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="perkuliahan" id="perkuliahan3" value="cukup besar">
                            <label class="form-check-label" for="perkuliahan3">
                            Cukup Besar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="perkuliahan" id="perkuliahan4" value="kurang">
                            <label class="form-check-label" for="perkuliahan4">
                            Kurang
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="perkuliahan" id="perkuliahan5" value="tidak sama sekali">
                            <label class="form-check-label" for="perkuliahan5">
                            Tidak Sama Sekali
                            </label>
                        </div>
                </div>

                <div class="col-md-3">
                    <b>Demonstrasi</b></br>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="demonstrasi" id="demonstrasi" value="sangat besar">
                            <label class="form-check-label" for="demonstrasi">
                            Sangat Besar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="demonstrasi" id="demonstrasi2" value="besar">
                            <label class="form-check-label" for="demonstrasi2">
                            Besar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="demonstrasi" id="demonstrasi3" value="cukup besar">
                            <label class="form-check-label" for="demonstrasi3">
                            Cukup Besar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="demonstrasi" id="demonstrasi4" value="kurang">
                            <label class="form-check-label" for="demonstrasi4">
                            Kurang
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="demonstrasi" id="demonstrasi5" value="tidak sama sekali">
                            <label class="form-check-label" for="demonstrasi5">
                            Tidak Sama Sekali
                            </label>
                        </div>
                </div>

                <div class="col-md-3">
                    <b>Partisipasi dalam proyek riset</b></br>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Partisipasi_dalam_proyek_riset" id="Partisipasi_dalam_proyek_riset" value="sangat besar">
                            <label class="form-check-label" for="Partisipasi_dalam_proyek_riset">
                            Sangat Besar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Partisipasi_dalam_proyek_riset" id="Partisipasi_dalam_proyek_riset2" value="besar">
                            <label class="form-check-label" for="Partisipasi_dalam_proyek_riset2">
                            Besar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Partisipasi_dalam_proyek_riset" id="Partisipasi_dalam_proyek_riset3" value="cukup besar">
                            <label class="form-check-label" for="Partisipasi_dalam_proyek_riset3">
                            Cukup Besar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Partisipasi_dalam_proyek_riset" id="Partisipasi_dalam_proyek_riset4" value="kurang">
                            <label class="form-check-label" for="Partisipasi_dalam_proyek_riset4">
                            Kurang
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Partisipasi_dalam_proyek_riset" id="Partisipasi_dalam_proyek_riset5" value="tidak sama sekali">
                            <label class="form-check-label" for="Partisipasi_dalam_proyek_riset5">
                            Tidak Sama Sekali
                            </label>
                        </div>
                </div>

                <div class="col-md-3">
                    <b>Magang</b></br>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="magang" id="magang" value="sangat besar">
                            <label class="form-check-label" for="magang">
                            Sangat Besar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="magang" id="magang2" value="besar">
                            <label class="form-check-label" for="magang2">
                            Besar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="magang" id="magang3" value="cukup besar">
                            <label class="form-check-label" for="magang3">
                            Cukup Besar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="magang" id="magang4" value="kurang">
                            <label class="form-check-label" for="magang4">
                            Kurang
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="magang" id="magang5" value="tidak sama sekali">
                            <label class="form-check-label" for="magang5">
                            Tidak Sama Sekali
                            </label>
                        </div>
                </div>
            </div>
            <br>
            <div class="row" style="padding: 15px">
                <div class="col-md-3">
                    <b>Praktikum</b></br>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="praktikum" id="praktikum" value="sangat besar">
                            <label class="form-check-label" for="praktikum">
                            Sangat Besar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="praktikum" id="praktikum2" value="besar">
                            <label class="form-check-label" for="praktikum2">
                            Besar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="praktikum" id="praktikum3" value="cukup besar">
                            <label class="form-check-label" for="praktikum3">
                            Cukup Besar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="praktikum" id="praktikum4" value="kurang">
                            <label class="form-check-label" for="praktikum4">
                            Kurang
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="praktikum" id="praktikum5" value="tidak sama sekali">
                            <label class="form-check-label" for="praktikum5">
                            Tidak Sama Sekali
                            </label>
                        </div>
                </div>

                <div class="col-md-3">
                    <b>Kerja Lapangan</b></br>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kerja_lapangan" id="kerja_lapangan" value="sangat besar">
                            <label class="form-check-label" for="kerja_lapangan">
                            Sangat Besar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kerja_lapangan" id="kerja_lapangan2" value="besar">
                            <label class="form-check-label" for="kerja_lapangan2">
                            Besar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kerja_lapangan" id="kerja_lapangan3" value="cukup besar">
                            <label class="form-check-label" for="kerja_lapangan3">
                            Cukup Besar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kerja_lapangan" id="kerja_lapangan4" value="kurang">
                            <label class="form-check-label" for="kerja_lapangan4">
                            Kurang
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kerja_lapangan" id="kerja_lapangan5" value="tidak sama sekali">
                            <label class="form-check-label" for="kerja_lapangan5">
                            Tidak Sama Sekali
                            </label>
                        </div>
                </div>

                <div class="col-md-3">
                    <b>Diskusi</b></br>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="diskusi" id="diskusi" value="sangat besar">
                            <label class="form-check-label" for="diskusi">
                            Sangat Besar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="diskusi" id="diskusi2" value="besar">
                            <label class="form-check-label" for="diskusi2">
                            Besar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="diskusi" id="diskusi3" value="cukup besar">
                            <label class="form-check-label" for="diskusi3">
                            Cukup Besar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="diskusi" id="diskusi4" value="kurang">
                            <label class="form-check-label" for="diskusi4">
                            Kurang
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="diskusi" id="diskusi5" value="tidak sama sekali">
                            <label class="form-check-label" for="diskusi5">
                            Tidak Sama Sekali
                            </label>
                        </div>
                </div>
            </div>
        </div>
        <br>
        <button type="button" class="btn btn-primary" id="btn-pertanyaan1">Next >> </button>
    </div>

    <div class="pertanyaan2">
        <div class="card" style="width: 100%;">
            <div class="card-header">
                Kapan anda mulai mencari pekerjaan? Mohon pekerjaan sambilan tidak dimasukkan ?
            </div>

            <div class="row" style="padding: 15px">
                <div class="col-md-3">

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaan2_f3" id="pertanyaan2" value="1">
                            <label class="form-check-label" for="pertanyaan2">
                                Kira-kira bulan sebelum lulus
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaan2_f3" id="pertanyaan22" value="2">
                            <label class="form-check-label" for="pertanyaan22">
                                Kira-kira bulan sesudah lulus
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaan2_f3" id="pertanyaan222" value="3">
                            <label class="form-check-label" for="pertanyaan222">
                                Saya tidak mencari kerja
                            </label>
                        </div>

                </div>
            </div>

        </div>
        <br>
        <button type="button" class="btn btn-danger" id="btn-pertanyaan1-previous"><< Previous</button>
        <button type="button" class="btn btn-primary" id="btn-pertanyaan2-next">Next >></button>

        <hr>
    </div>

      <div class="pertanyaanf8">
        <div class="card" style="width: 100%;">
            <div class="card-header">
                Apakah anda bekerja saat ini (termasuk kerja sambilan dan wirausaha)?
            </div>

            <div class="row" style="padding: 15px">
                <div class="col-md-3">

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaanf8" id="pertanyaanf81" value="sangat besar">
                            <label class="form-check-label" for="pertanyaanf81">
                                YA
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaanf8" id="pertanyaanf82" value="besar">
                            <label class="form-check-label" for="pertanyaanf82">
                                TIDAK
                            </label>
                        </div>


                </div>
            </div>

        </div>
        <br>
        <button type="button" class="btn btn-danger" id="btn-pertanyaan2-previous"><< Previous</button>
        <button type="button" class="btn btn-primary" id="btn-pertanyaan-bekerja-next">Next >></button>

        <hr>
    </div>

    <div class="pertanyaanf4">
        <div class="card" style="width: 100%;">
            <div class="card-header">
                Bagaimana anda mencari pekerjaan tersebut? <i>Jawaban bisa lebih dari satu</i>
            </div>

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

        </div>
        <br>
        <button type="button" class="btn btn-danger" id="btn-pertanyaanf4-previous"><< Previous</button>
        <button type="button" class="btn btn-primary" id="btn-pertanyaan5-next">Next >></button>

        <hr>
    </div>

    <div class="pertanyaanf5">
        <div class="card" style="width: 100%;">
            <div class="card-header">
                Berapa bulan waktu yang dihabiskan (sebelum dan sesudah kelulusan) untuk memeroleh pekerjaan pertama?
            </div>

            <div class="row" style="padding: 15px">
                <div class="col-md-12">

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaanf5" id="pertanyaanf51" value="sangat besar">
                            <label class="form-check-label" for="pertanyaanf51">
                                Kira-kira  bulan sebelum lulus ujian
                            </label>
                            <select class="form-class">
                                <option>3 bulan</option>
                                <option>6 bulan</option>
                            </select>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaanf5" id="pertanyaanf52" value="besar">
                            <label class="form-check-label" for="pertanyaanf52">
                                Kira-kira  bulan setelah lulus ujian
                            </label>
                        </div>

                </div>
            </div>

        </div>
        <br>
        <button type="button" class="btn btn-danger" id="btn-pertanyaanf45-previous"><< Previous</button>
        <button type="button" class="btn btn-primary" id="btn-pertanyaanf6-next">Next >></button>

        <hr>
    </div>

    <div class="pertanyaanf6">
        <div class="card" style="width: 100%;">
            <div class="card-header">
                Berapa perusahaan/instansi/institusi yang sudah anda lamar (lewat surat atau e-mail) sebelum anda memeroleh pekerjaan pertama?
            </div>

            <div class="row" style="padding: 15px">
                <div class="col-md-12">

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaanf6" id="pertanyaanf61" value="sangat besar">
                            <label class="form-check-label" for="pertanyaanf61">
                                1
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaanf6" id="pertanyaanf62" value="besar">
                            <label class="form-check-label" for="pertanyaanf62">
                               2
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaanf6" id="pertanyaanf63" value="besar">
                            <label class="form-check-label" for="pertanyaanf63">
                               3
                            </label>
                        </div>

                </div>
            </div>

        </div>
        <br>
        <button type="button" class="btn btn-danger" id="btn-pertanyaanf6-previous"><< Previous</button>
        <button type="button" class="btn btn-primary" id="btn-pertanyaanf7-next">Next >></button>

        <hr>
    </div>

    <div class="pertanyaanf7">
        <div class="card" style="width: 100%;">
            <div class="card-header">
                Berapa banyak perusahaan/instansi/institusi yang merespons lamaran anda?
            </div>

            <div class="row" style="padding: 15px">
                <div class="col-md-12">

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaanf7" id="pertanyaanf71" value="sangat besar">
                            <label class="form-check-label" for="pertanyaanf71">
                                1
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaanf7" id="pertanyaanf72" value="besar">
                            <label class="form-check-label" for="pertanyaanf72">
                               2
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaanf7" id="pertanyaanf73" value="besar">
                            <label class="form-check-label" for="pertanyaanf73">
                               3
                            </label>
                        </div>

                </div>
            </div>

        </div>
        <br>
        <button type="button" class="btn btn-danger" id="btn-pertanyaanf7-previous"><< Previous</button>
        <button type="button" class="btn btn-primary" id="btn-pertanyaan7a-next">Next >></button>

        <hr>
    </div>

    <div class="pertanyaanf7a">
        <div class="card" style="width: 100%;">
            <div class="card-header">
                Berapa banyak perusahaan/instansi/institusi yang mengundang anda untuk wawancara?
            </div>

            <div class="row" style="padding: 15px">
                <div class="col-md-12">

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaanf7a" id="pertanyaanf7a1" value="sangat besar">
                            <label class="form-check-label" for="pertanyaanf7a1">
                                1
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaanf7a" id="pertanyaanf7a2" value="besar">
                            <label class="form-check-label" for="pertanyaanf7a2">
                               2
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaanf7a" id="pertanyaanf7a3" value="besar">
                            <label class="form-check-label" for="pertanyaanf7a3">
                               3
                            </label>
                        </div>

                </div>
            </div>

        </div>
        <br>
        <button type="button" class="btn btn-danger" id="btn-pertanyaanf7a-previous"><< Previous</button>
        <button type="button" class="btn btn-primary" id="btn-pertanyaanf9-next">Next >></button>

        <hr>
    </div>

    <div class="pertanyaanf9">
        <div class="card" style="width: 100%;">
            <div class="card-header">
                Bagaimana anda menggambarkan situasi anda saat ini? Jawaban bisa lebih dari satu
            </div>

            <div class="row" style="padding: 15px">
                <div class="col-md-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="pertanyaanf9" id="pertanyaanf91" value="sangat besar">
                        <label class="form-check-label" for="pertanyaanf91">
                            Saya masih belajar/melanjutkan kuliah profesi atau pascasarjana
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="pertanyaanf9" id="pertanyaanf92" value="sangat besar">
                        <label class="form-check-label" for="pertanyaanf92">
                            Saya Menikah
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="pertanyaanf9" id="pertanyaanf93" value="sangat besar">
                        <label class="form-check-label" for="pertanyaanf93">
                            Saya sibuk dengan keluarga dan anak-anak
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="pertanyaanf9" id="pertanyaanf94" value="sangat besar">
                        <label class="form-check-label" for="pertanyaanf94">
                            Saya sekarang sedang mencari pekerjaan
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="pertanyaanf9" id="pertanyaanf95" value="sangat besar">
                        <label class="form-check-label" for="pertanyaanf95">
                            Lainnya
                        </label>
                    </div>
                </div>
            </div>

        </div>
        <br>
        <button type="button" class="btn btn-danger" id="btn-pertanyaanf9a-previous"><< Previous</button>
        <button type="button" class="btn btn-primary" id="btn-pertanyaanf10-next">Next >></button>

        <hr>
    </div>

    <div class="pertanyaanf10">
        <div class="card" style="width: 100%;">
            <div class="card-header">
                Apakah anda aktif mencari pekerjaan dalam 4 minggu terakhir? Pilihlah Satu Jawaban.
            </div>

            <div class="row" style="padding: 15px">
                <div class="col-md-12">

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaanf10" id="pertanyaanf10" value="sangat besar">
                            <label class="form-check-label" for="pertanyaanf10">
                               Tidak
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaanf10" id="pertanyaanf101" value="sangat besar">
                            <label class="form-check-label" for="pertanyaanf101">
                                Tidak, tapi saya sedang menunggu hasil lamaran kerja
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaanf10" id="pertanyaanf102" value="sangat besar">
                            <label class="form-check-label" for="pertanyaanf102">
                                Ya, saya akan mulai bekerja dalam 2 minggu ke depan
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaanf10" id="pertanyaanf103" value="sangat besar">
                            <label class="form-check-label" for="pertanyaanf103">
                                Ya, tapi saya belum pasti akan bekerja dalam 2 minggu ke depan
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaanf10" id="pertanyaanf104" value="sangat besar">
                            <label class="form-check-label" for="pertanyaanf104">
                                Lainnya
                            </label>
                        </div>

                </div>
            </div>

        </div>
        <br>
        <button type="button" class="btn btn-danger" id="btn-pertanyaanf10-previous"><< Previous</button>
        <button type="button" class="btn btn-primary" id="btn-pertanyaan13-next">Next >></button>

        <hr>
    </div>

    <div class="pertanyaanf11">
        <div class="card" style="width: 100%;">
            <div class="card-header">
                Apa jenis perusahaan/instansi/institusi tempat anda bekerja sekarang?
            </div>

            <div class="row" style="padding: 15px">
                <div class="col-md-12">

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaanf11" id="pertanyaanf11" value="sangat besar">
                            <label class="form-check-label" for="pertanyaanf11">
                                Instansi pemerintah (termasuk BUMN)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaanf11" id="pertanyaanf111" value="besar">
                            <label class="form-check-label" for="pertanyaanf111">
                                Organisasi non-profit/Lembaga Swadaya Masyarakat
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaanf11" id="pertanyaanf112" value="cukup besar">
                            <label class="form-check-label" for="pertanyaanf112">
                                Perusahaan swasta
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaanf11" id="pertanyaanf113" value="cukup besar">
                            <label class="form-check-label" for="pertanyaanf113">
                                Wiraswasta/perusahaan sendiri
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaanf11" id="pertanyaanf114" value="cukup besar">
                            <label class="form-check-label" for="pertanyaanf114">
                                Lainnya, tuliskan:
                            </label>
                        </div>

                </div>
            </div>

        </div>
        <br>
        <button type="button" class="btn btn-danger" id="btn-pertanyaanf11-previous"><< Previous</button>
        <button type="button" class="btn btn-primary" id="btn-pertanyaan13-next">Next >></button>

        <hr>
    </div>

    <div class="pertanyaanf13">
        <div class="card" style="width: 100%;">
            <div class="card-header">
                Kira-kira berapa pendapatan anda setiap bulannya?
            </div>

            <div class="row" style="padding: 15px">
                <div class="col-md-12">
                    <table>
                        <tr>
                            <td>Dari Pekerjaan Utama </td>
                            <td><div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">RP</span>
                                </div>
                                <input type="text" placeholder="5.000.000" name="pekerjaan_utama" class="form-control" aria-label="Amount (to the nearest dollar)">

                              </div></td>
                        </tr>
                        <tr>
                            <td>Dari Lembur dan Tips </td>
                            <td><div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">RP</span>
                                </div>
                                <input type="text" placeholder="500.000" name="lembut_tips" class="form-control" aria-label="Amount (to the nearest dollar)">

                              </div></td>
                        </tr>
                        <tr>
                            <td> Dari Pekerjaan Lainnya </td>
                            <td><div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">RP</span>
                                </div>
                                <input type="text" placeholder="2.500.000" name="pekerjaan_lainnya" class="form-control" aria-label="Amount (to the nearest dollar)">

                              </div></td>
                        </tr>
                    </table>

                </div>
            </div>

        </div>
        <br>
        <button type="button" class="btn btn-danger" id="btn-pertanyaanf13-previous"><< Previous</button>
        <button type="button" class="btn btn-primary" id="btn-pertanyaan133-next">Next >></button>

        <hr>
    </div>

    <div class="pertanyaanf14">
        <div class="card" style="width: 100%;">
            <div class="card-header">
               Seberapa erat hubungan antara bidang studi dengan pekerjaan anda?
            </div>
            <div class="row" style="padding: 15px">
                <div class="col-md-12">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="pertanyaanf14" id="pertanyaanf14" value="sangat erat">
                        <label class="form-check-label" for="pertanyaanf14">
                            Sangat erat
                        </label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="pertanyaanf14" id="pertanyaanf141" value="sangat erat">
                        <label class="form-check-label" for="pertanyaanf141">
                            Erat
                        </label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="pertanyaanf14" id="pertanyaanf142" value="sangat erat">
                        <label class="form-check-label" for="pertanyaanf142">
                           Cukup Erat
                        </label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="pertanyaanf14" id="pertanyaanf143" value="sangat erat">
                        <label class="form-check-label" for="pertanyaanf143">
                           Kurang Erat
                        </label>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="pertanyaanf14" id="pertanyaanf144" value="sangat erat">
                        <label class="form-check-label" for="pertanyaanf144">
                            Tidak Sama Sekali
                        </label>
                    </div>
                </div>
            </div>

        </div>
        <br>
        <button type="button" class="btn btn-danger" id="btn-pertanyaanf134-previous"><< Previous</button>
        <button type="button" class="btn btn-primary" id="btn-pertanyaanf15-next">Next >></button>

        <hr>
    </div>

    <div class="pertanyaanf15">
        <div class="card" style="width: 100%;">
            <div class="card-header">
                Tingkat pendidikan apa yang paling tepat/sesuai untuk pekerjaan anda saat ini?
            </div>
            <div class="row" style="padding: 15px">
                <div class="col-md-12">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="pertanyaanf15" id="pertanyaanf15" value="sangat erat">
                        <label class="form-check-label" for="pertanyaanf15">
                            Setingkat Lebih Tinggi
                        </label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="pertanyaanf15" id="pertanyaanf151" value="sangat erat">
                        <label class="form-check-label" for="pertanyaanf151">
                            Tingkat Yang Sama
                        </label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="pertanyaanf15" id="pertanyaanf152" value="sangat erat">
                        <label class="form-check-label" for="pertanyaanf152">
                           Setingkat Lebih Rendah
                        </label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="pertanyaanf15" id="pertanyaanf153" value="sangat erat">
                        <label class="form-check-label" for="pertanyaanf153">
                            Tidak Perlu Pendidikan Tinggi
                        </label>
                    </div>
                </div>


            </div>

        </div>
        <br>
        <button type="button" class="btn btn-danger" id="btn-pertanyaanf16-previous"><< Previous</button>
        <button type="button" class="btn btn-primary" id="btn-pertanyaanf16-next">Next >></button>

        <hr>
    </div>

    <div class="pertanyaanf16">
        <div class="card" style="width: 100%;">
            <div class="card-header">
                Jika menurut anda pekerjaan anda saat ini tidak sesuai dengan pendidikan anda, mengapa anda mengambilnya? Jawaban bisa lebih dari satu
            </div>

            <div class="row" style="padding: 15px">
                <div class="col-md-9">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="pertanyaanf16" id="pertanyaanf161" value="sangat besar">
                        <label class="form-check-label" for="pertanyaanf161">
                            Pertanyaan tidak sesuai; pekerjaan saya sekarang sudah sesuai dengan pendidikan saya.
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="pertanyaanf16" id="pertanyaanf162" value="sangat besar">
                        <label class="form-check-label" for="pertanyaanf162">
                            Saya belum mendapatkan pekerjaan yang lebih sesuai.
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="pertanyaanf16" id="pertanyaanf163" value="sangat besar">
                        <label class="form-check-label" for="pertanyaanf163">
                            Di pekerjaan ini saya memeroleh prospek karir yang baik.
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="pertanyaanf16" id="pertanyaanf164" value="sangat besar">
                        <label class="form-check-label" for="pertanyaanf164">
                            Saya lebih suka bekerja di area pekerjaan yang tidak ada hubungannya dengan pendidikan saya.
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="pertanyaanf16" id="pertanyaanf165" value="sangat besar">
                        <label class="form-check-label" for="pertanyaanf165">
                            Saya dipromosikan ke posisi yang kurang berhubungan dengan pendidikan saya dibanding posisi sebelumnya.
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="pertanyaanf16" id="pertanyaanf166" value="sangat besar">
                        <label class="form-check-label" for="pertanyaanf166">
                            Saya dapat memeroleh pendapatan yang lebih tinggi di pekerjaan ini.
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="pertanyaanf16" id="pertanyaanf167" value="sangat besar">
                        <label class="form-check-label" for="pertanyaanf167">
                            Pekerjaan saya saat ini lebih aman/terjamin/secure.
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="pertanyaanf16" id="pertanyaanf168" value="sangat besar">
                        <label class="form-check-label" for="pertanyaanf168">
                            Pekerjaan saya saat ini lebih menarik.
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="pertanyaanf16" id="pertanyaanf169" value="sangat besar">
                        <label class="form-check-label" for="pertanyaanf169">
                            Pekerjaan saya saat ini lebih memungkinkan saya mengambil pekerjaan tambahan/jadwal yang fleksibel, dll.
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="pertanyaanf16" id="pertanyaanf1610" value="sangat besar">
                        <label class="form-check-label" for="pertanyaanf1610">
                            Pekerjaan saya saat ini lokasinya lebih dekat dari rumah saya.
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="pertanyaanf16" id="pertanyaanf1611" value="sangat besar">
                        <label class="form-check-label" for="pertanyaanf1611">
                            Pekerjaan saya saat ini dapat lebih menjamin kebutuhan keluarga saya.
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="pertanyaanf16" id="pertanyaanf1612" value="sangat besar">
                        <label class="form-check-label" for="pertanyaanf1612">
                            Pada awal meniti karir ini, saya harus menerima pekerjaan yang tidak berhubungan dengan pendidikan saya.
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="pertanyaanf16" id="pertanyaanf1613" value="sangat besar">
                        <label class="form-check-label" for="pertanyaanf1613">
                            Lainnya:
                        </label>
                    </div>
                </div>
            </div>

        </div>
        <br>
        <button type="button" class="btn btn-danger" id="btn-pertanyaanf156-previous"><< Previous</button>
        <button type="button" class="btn btn-primary" id="btn-pertanyaan4-next">Next >></button>


        <hr>

    </div>
    <br>
    <button type="submit" class="btn btn-primary" id="btn-pertanyaan4-next">Submit</button>
</form>
    <footer>
        <div class="row">
            <div class="col-md-6">
                <p>Copyright &copy; 2020 Quisioner Unisma</p>
            </div>
            <div class="col-md-6 text-md-right">
                <a href="#" class="text-dark">Ts</a>
                <span class="text-muted mx-2">|</span>
                <a href="#" class="text-dark">Privacy Policy</a>
            </div>
        </div>
    </footer>
</div>

</body>
</html>
<script>

    $(document).ready(function(){
        //check submit
        {{--  var index = 1;
        $('input[name=perkuliahan]').click(function(e){
            $(this).attr('checked');
        });
        if($('input[name=perkuliahan]').is(':checked')){
            $('#btn-pertanyaan1').removeAttr('disabled');
        }  --}}

        $('.pertanyaan2').hide();
        $('.pertanyaanf5').hide();
        $('.pertanyaanf6').hide();
        $('.pertanyaanf7').hide();
        $('.pertanyaanf7a').hide();
        $('.pertanyaanf8').hide();
        $('.pertanyaanf9').hide();
        $('.pertanyaanf10').hide();
        $('.pertanyaanf4').hide();
        $('.pertanyaanf11').hide();
        $('.pertanyaanf13').hide();
        $('.pertanyaanf14').hide();
        $('.pertanyaanf15').hide();
        $('.pertanyaanf16').hide();

        $('#btn-pertanyaan1').click(function(){
            $('.pertanyaan1').hide();
            $('.pertanyaan2').show();
        });
        $('#btn-pertanyaan1-previous').click(function(){
            $('.pertanyaan1').show();
            $('.pertanyaan2').hide();
        });
        $('#btn-pertanyaan2-next').click(function(){
            if($('#pertanyaan222').is(':checked'))
            {
                $('.pertanyaanf8').show();
                $('.pertanyaan2').hide();
            }else if($('#pertanyaan2').is(':checked') || $('#pertanyaan22').is(':checked')){
                $('.pertanyaan2').hide();
                $('.pertanyaanf4').show();
            }
        });
        $('#btn-pertanyaan2-previous').click(function(){
            $('.pertanyaanf8').hide();
            $('.pertanyaanf4').hide();
            $('.pertanyaan2').show();
        });
        $('#btn-pertanyaanf4-previous').click(function(){
            $('.pertanyaanf4').hide();
            $('.pertanyaan2').show();
        });


        $('#btn-pertanyaan-bekerja-next').click(function(){
            if($('#pertanyaanf81').is(':checked'))
            {
                $('.pertanyaanf8').hide();
                $('.pertanyaanf11').show();
            }else{

            }
        });

        $('#btn-pertanyaan13-next').click(function(){
            $('.pertanyaanf13').show();
            $('.pertanyaanf11').hide();
        });

        $('#btn-pertanyaanf11-previous').click(function(){
            $('.pertanyaanf11').hide();
            $('.pertanyaanf8').show();
        });

        $('#btn-pertanyaanf13-previous').click(function(){
            $('.pertanyaanf13').hide();
            $('.pertanyaanf11').show();
        });

        $('#btn-pertanyaan133-next').click(function(){
            $('.pertanyaanf14').show();
            $('.pertanyaanf13').hide();
        });

        $('#btn-pertanyaanf134-previous').click(function(){
            $('.pertanyaanf13').show();
            $('.pertanyaanf14').hide();
        });

        $('#btn-pertanyaanf15-next').click(function(){
            $('.pertanyaanf15').show();
            $('.pertanyaanf14').hide();
        });

        $('#btn-pertanyaanf15-previous').click(function(){
            $('.pertanyaanf15').hide();
            $('.pertanyaanf14').show();
        });

        $('#btn-pertanyaanf16-next').click(function(){
            $('.pertanyaanf15').hide();
            $('.pertanyaanf16').show();
        });

        $('#btn-pertanyaanf16-previous').click(function(){
            $('.pertanyaanf15').hide();
            $('.pertanyaanf14').show();
        });

        $('#btn-pertanyaanf156-previous').click(function(){
            $('.pertanyaanf16').hide();
            $('.pertanyaanf15').show();
        });

        $('#btn-pertanyaan5-next').click(function(){
            $('.pertanyaanf4').hide();
            $('.pertanyaanf5').show();
        });

        $('#btn-pertanyaanf45-previous').click(function(){
            $('.pertanyaanf4').show();
            $('.pertanyaanf5').hide();
        });

        $('#btn-pertanyaanf6-next').click(function(){
            $('.pertanyaanf6').show();
            $('.pertanyaanf5').hide();
        });

        $('#btn-pertanyaanf6-previous').click(function(){
            $('.pertanyaanf5').show();
            $('.pertanyaanf6').hide();
        });

        $('#btn-pertanyaanf7-previous').click(function(){
            $('.pertanyaanf6').show();
            $('.pertanyaanf7').hide();
        });
        $('#btn-pertanyaanf7-next').click(function(){
            $('.pertanyaanf7').show();
            $('.pertanyaanf6').hide();
        });
        $('#btn-pertanyaan7a-next').click(function(){
            $('.pertanyaanf7a').show();
            $('.pertanyaanf7').hide();
        });

        $('#btn-pertanyaanf7a-previous').click(function(){
            $('.pertanyaanf7a').hide();
            $('.pertanyaanf7').show();
        });

        $('#btn-pertanyaanf9-next').click(function(){
            $('.pertanyaanf9').show();
            $('.pertanyaanf7a').hide();
        });

        $('#btn-pertanyaanf9a-previous').click(function(){
            $('.pertanyaanf7a').show();
            $('.pertanyaanf9').hide();
        });

        $('#btn-pertanyaanf10-next').click(function(){
            $('.pertanyaanf10').show();
            $('.pertanyaanf9').hide();
        });

        $('#btn-pertanyaanf10-previous').click(function(){
            $('.pertanyaanf9').show();
            $('.pertanyaanf10').hide();
        });
    });
    </script>
