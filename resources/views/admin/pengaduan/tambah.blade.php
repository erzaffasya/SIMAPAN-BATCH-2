<x-app-layout>
    <style>
        .wrapper {
            position: relative;
            width: 400px;
            height: 200px;
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .signature-pad {
            position: absolute;
            left: 0;
            top: 0;
            width: 400px !important;
            height: 200px;
        }
    </style>
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Pengaduan</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Pengaduan</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">

        <!-- Lightbox -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Form Pengaduan</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('pengaduan.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div id="basic-pills-wizard" class="twitter-bs-wizard">
                            <ul class="twitter-bs-wizard-nav">
                                <li class="nav-item">
                                    <a href="#form-pengaduan-wizard" class="nav-link" data-toggle="tab">
                                        <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Form Pengaduan">
                                            <i class="far fa-user"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#form-pelapor-wizard" class="nav-link" data-toggle="tab">
                                        <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Data Pelapor">
                                            <i class="fas fa-map-pin"></i>
                                        </div>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#form-korban-wizard" class="nav-link" data-toggle="tab">
                                        <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Data Korban">
                                            <i class="fas fa-credit-card"></i>
                                        </div>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#form-pelaku-wizard" class="nav-link" data-toggle="tab">
                                        <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Data Pelaku">
                                            <i class="fas fa-credit-card"></i>
                                        </div>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#form-kronologis-wizard" class="nav-link" data-toggle="tab">
                                        <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Data Kronologis">
                                            <i class="fas fa-credit-card"></i>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <!-- wizard-nav -->

                            <div class="tab-content twitter-bs-wizard-tab-content">
                                <div class="tab-pane" id="form-pengaduan-wizard">
                                    <div class="mb-4">
                                        <h5>Pendaftaran Pengaduan</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-firstname-input" class="form-label">No.
                                                    Registrasi</label>
                                                <input type="text" name="nomor" readonly class="form-control"
                                                    id="basicpill-firstname-input">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-lastname-input" required
                                                    class="form-label">Tanggal
                                                    Registrasi</label>
                                                <input type="date" required name="tanggal_registrasi"
                                                    class="form-control" id="basicpill-lastname-input">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-phoneno-input" class="form-label">Petugas
                                                    Penerima</label>
                                                <select class="form-select" name="petugas_penerima">
                                                    @foreach ($user as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-email-input" class="form-label">Petugas
                                                    Menangani</label>
                                                <select class="form-select" name="petugas_menangani">
                                                    @foreach ($user as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-email-input" class="form-label">Jenis
                                                    Kekerasan/Non Kekerasan</label>
                                                <select class="form-select" name="jenis_aduan">
                                                    <option value="Kekerasan">Kekerasan</option>
                                                    <option value="Non Kekerasan">Non Kekerasan</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="pager wizard twitter-bs-wizard-pager-link">
                                        <li class="next"><a href="javascript: void(0);"
                                                class="btn btn-primary">Next <i
                                                    class="bx bx-chevron-right ms-1"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- tab pane -->
                                <div class="tab-pane" id="form-pelapor-wizard">
                                    <div>
                                        <div class="mb-4">
                                            <h5>Data Pelapor</h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-pancard-input" class="form-label">Nama
                                                        Pelapor</label>
                                                    <input type="text" name="nama_pelapor" class="form-control"
                                                        id="basicpill-pancard-input">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-vatno-input" class="form-label">Jenis
                                                        Kelamin Pelapor</label>
                                                    <select class="form-select" name="jenis_kelamin_pelapor">
                                                        <option value="Laki-Laki">Laki-Laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-cstno-input" class="form-label">Alamat
                                                        Pelapor</label>
                                                    <textarea name="alamat_pelapor" class="form-control"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input" class="form-label">Nomor
                                                        Handphone</label>
                                                    <input type="number" name="hp_pelapor" class="form-control"
                                                        id="basicpill-servicetax-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input"
                                                        class="form-label">Hubungan Dengan Korban</label>
                                                    <input type="text" name="hubungan_korban" class="form-control"
                                                        id="basicpill-servicetax-input">
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="pager wizard twitter-bs-wizard-pager-link">
                                            <li class="previous"><a href="javascript: void(0);"
                                                    class="btn btn-primary"><i class="bx bx-chevron-left me-1"></i>
                                                    Previous</a></li>
                                            <li class="next"><a href="javascript: void(0);"
                                                    class="btn btn-primary">Next <i
                                                        class="bx bx-chevron-right ms-1"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="tab-pane" id="form-korban-wizard">
                                    <div>
                                        <div class="mb-4">
                                            <h5>Data Korban</h5>
                                        </div>
                                        <div class="row">

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input" class="form-label">Nama
                                                        Korban</label>
                                                    <input type="text" name="nama_korban" class="form-control"
                                                        id="basicpill-servicetax-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input" class="form-label">Nama
                                                        Alias Korban</label>
                                                    <input type="text" name="nama_alias_korban"
                                                        class="form-control" id="basicpill-servicetax-input">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input" class="form-label">NIK
                                                        Korban</label>
                                                    <input type="number" name="nik_korban" class="form-control"
                                                        id="basicpill-servicetax-input">
                                                </div>
                                            </div>


                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input" class="form-label">Jenis
                                                        Kelamin Korban</label>
                                                    <select class="form-select" name="jenis_kelamin_korban">
                                                        <option value="Laki-Laki">Laki-Laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input" class="form-label">Tempat,
                                                        Tanggal Lahir Korban</label>
                                                    <div class="d-flex gap-2">
                                                        <input type="text" name="tempat_lahir_korban"
                                                            class="form-control" id="tempat_lahir_korban"
                                                            placeholder="Tempat Lahir">
                                                        <input type="date" name="lahir_korban" required
                                                            class="form-control" id="lahir_korban">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input" class="form-label">Usia
                                                        Korban</label>
                                                    <input type="number" readonly name="usia_korban"
                                                        id="usia_korban" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input" class="form-label">Alamat
                                                        Korban</label>
                                                    <textarea name="alamat_korban" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input"
                                                        class="form-label">Kecamatan</label>
                                                    <select class="form-select" id="kecamatan"
                                                        name="kecamatan_korban">
                                                        <option>==Pilih Salah Satu==</option>
                                                        @foreach ($kota as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input"
                                                        class="form-label">Kelurahan</label>
                                                    <select class="form-select" name="kelurahan_korban"
                                                        id="desa" required>
                                                        <option>==Pilih Salah Satu==</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input"
                                                        class="form-label">Pendidikan Korban</label>
                                                    <input type="text" name="pendidikan_korban"
                                                        class="form-control" id="basicpill-servicetax-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input" class="form-label">Agama
                                                        Korban</label>
                                                    <input type="text" name="agama_korban" class="form-control"
                                                        id="basicpill-servicetax-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input" class="form-label">Suku
                                                        Korban</label>
                                                    <input type="text" name="suku_korban" class="form-control"
                                                        id="basicpill-servicetax-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input"
                                                        class="form-label">Kewarganegaraan Korban</label>
                                                    <input type="text" name="kewarganegaraan_korban"
                                                        class="form-control" id="basicpill-servicetax-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input"
                                                        class="form-label">Pekerjaan Korban</label>
                                                    <input type="text" name="pekerjaan_korban"
                                                        class="form-control" id="basicpill-servicetax-input">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input" class="form-label">Layanan
                                                        Yang Diberikan</label>
                                                    <select class="form-select" multiple="true" required
                                                        name="jenis_layanan[]">
                                                        @foreach ($layanan as $item)
                                                            <option value="{{ $item->id }}">
                                                                {{ $item->jenis_layanan }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input" class="form-label">Jenis
                                                        Kekerasan</label>
                                                    <select class="form-select" multiple="true" required
                                                        name="jenis_kekerasan[]">
                                                        @foreach ($kekerasan as $item)
                                                            <option value="{{ $item->id }}">
                                                                {{ $item->jenis_kekerasan }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="pager wizard twitter-bs-wizard-pager-link">
                                            <li class="previous"><a href="javascript: void(0);"
                                                    class="btn btn-primary"><i class="bx bx-chevron-left me-1"></i>
                                                    Previous</a></li>
                                            <li class="next"><a href="javascript: void(0);"
                                                    class="btn btn-primary">Next <i
                                                        class="bx bx-chevron-right ms-1"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-pane" id="form-pelaku-wizard">
                                    <div>
                                        <div class="mb-4">
                                            <h5>Data Pelaku</h5>
                                        </div>
                                        <div class="row">

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input" class="form-label">Nama
                                                        Pelaku</label>
                                                    <input type="text" name="nama_pelaku" class="form-control"
                                                        id="basicpill-servicetax-input">
                                                </div>
                                            </div>


                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input" class="form-label">Jenis
                                                        Kelamin Pelaku</label>
                                                    <select class="form-select" name="jenis_kelamin_pelaku">
                                                        <option value="Laki-Laki">Laki-Laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input" class="form-label">Tempat,
                                                        Tanggal Lahir Pelaku</label>
                                                    <div class="d-flex gap-2">
                                                        <input type="text" name="tempat_lahir_pelaku"
                                                            class="form-control" id="tempat_lahir_pelaku"
                                                            placeholder="Tempat Lahir">
                                                        <input type="date" name="lahir_pelaku"
                                                            class="form-control" id="lahir_pelaku">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input" class="form-label">Usia
                                                        Pelaku</label>
                                                    <input type="number" readonly name="usia_pelaku"
                                                        class="form-control" id="usia_pelaku">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input" class="form-label">Alamat
                                                        Pelaku</label>
                                                    <textarea name="alamat_pelaku" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input"
                                                        class="form-label">Pendidikan Pelaku</label>
                                                    <input type="text" name="pendidikan_pelaku"
                                                        class="form-control" id="basicpill-servicetax-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input" class="form-label">Agama
                                                        Pelaku</label>
                                                    <input type="text" name="agama_pelaku" class="form-control"
                                                        id="basicpill-servicetax-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input" class="form-label">Suku
                                                        Pelaku</label>
                                                    <input type="text" name="suku_pelaku" class="form-control"
                                                        id="basicpill-servicetax-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input"
                                                        class="form-label">Pekerjaan Pelaku</label>
                                                    <input type="text" name="pekerjaan_pelaku"
                                                        class="form-control" id="basicpill-servicetax-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input"
                                                        class="form-label">Hubungan Pelaku Dengan Korban</label>
                                                    <input type="text" name="hubungan_pelaku" class="form-control"
                                                        id="basicpill-servicetax-input">
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="pager wizard twitter-bs-wizard-pager-link">
                                            <li class="previous"><a href="javascript: void(0);"
                                                    class="btn btn-primary"><i class="bx bx-chevron-left me-1"></i>
                                                    Previous</a></li>
                                            <li class="next"><a href="javascript: void(0);"
                                                    class="btn btn-primary">Next <i
                                                        class="bx bx-chevron-right ms-1"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- tab pane -->
                                <div class="tab-pane" id="form-kronologis-wizard">
                                    <div>
                                        <div class="mb-4">
                                            <h5>Data Kronologis</h5>
                                        </div>
                                        <div class="row">

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input" class="form-label">Tempat
                                                        Kejadian Perkara</label>
                                                    <input type="text" name="tempat_kejadian" class="form-control"
                                                        id="basicpill-servicetax-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input"
                                                        class="form-label">KDRT/NON KDRT</label>

                                                    <select class="form-select" name="kdrt_nonkdrt">
                                                        <option value="KDRT">KDRT</option>
                                                        <option value="NON KDRT">NON KDRT</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input"
                                                        class="form-label">Kronologis</label>
                                                    <textarea name="kronologis" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input"
                                                        class="form-label">DIFABEL/NON DIFABEL</label>
                                                    <select class="form-select" name="difabel_nondifabel">
                                                        <option value="DIFABEL">DIFABEL</option>
                                                        <option value="NON DIFABEL">NON DIFABEL</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input" class="form-label">Status
                                                        Kasus</label>
                                                    <select class="form-select" name="status">
                                                        <option value="Menunggu">Menunggu</option>
                                                        <option value="Proses">Proses</option>
                                                        <option value="Selesai">Selesai</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input"
                                                        class="form-label">Keterangan</label>
                                                    <textarea name="keterangan" class="form-control"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="ktp-input" class="form-label">KTP</label>
                                                    <input type="file" name="ktp" class="form-control"
                                                        id="ktp-input" onchange="previewImage(event, 'ktp-preview')">
                                                    <img id="ktp-preview"
                                                        style="display: none; max-width: 100%; height: auto; margin-top: 10px;" />
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="akta-input" class="form-label">Akta</label>
                                                    <input type="file" name="akta" class="form-control"
                                                        id="akta-input"
                                                        onchange="previewImage(event, 'akta-preview')">
                                                    <img id="akta-preview"
                                                        style="display: none; max-width: 100%; height: auto; margin-top: 10px;" />
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="kk-input" class="form-label">KK</label>
                                                    <input type="file" name="kk" class="form-control"
                                                        id="kk-input" onchange="previewImage(event, 'kk-preview')">
                                                    <img id="kk-preview"
                                                        style="display: none; max-width: 100%; height: auto; margin-top: 10px;" />
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="foto_korban-input" class="form-label">Foto
                                                        Korban</label>
                                                    <input type="file" name="foto_korban" class="form-control"
                                                        id="foto_korban-input" accept="image/*"
                                                        onchange="previewImage(event, 'foto_korban-preview')">
                                                    <img id="foto_korban-preview"
                                                        style="display: none; max-width: 100%; height: auto; margin-top: 10px;" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3" id="signature-pad">
                                                    <label for="basicpill-servicetax-input" class="form-label">Tanda
                                                        Tangan</label>
                                                    <div class="m-signature-pad">
                                                        <div class="m-signature-pad--body">
                                                            <canvas name="ttd"
                                                                style="border: 2px dashed #ccc"></canvas>
                                                        </div>

                                                        <div class="m-signature-pad--footer">
                                                            <button type="button" class="btn btn-sm btn-secondary"
                                                                data-action="clear">Clear</button>
                                                            <button type="button" class="btn btn-sm btn-primary"
                                                                data-action="save">Save</button>
                                                        </div>

                                                        <input type="hidden" name="signature" id="signatureData">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="pager wizard twitter-bs-wizard-pager-link">
                                            <li class="previous"><a href="javascript: void(0);"
                                                    class="btn btn-primary"><i class="bx bx-chevron-left me-1"></i>
                                                    Previous</a></li>
                                            <button class="btn btn-primary float-end">Save
                                                Changes</button>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- tab pane -->

            </div>
            <!-- end tab content -->
        </div>
    </div>
    </div>
    <!-- end card body -->
    </div>
    </div>
    <!-- /Wizard -->
    </div>

    <script>
        document.querySelector("form").addEventListener("submit", function(event) {
            let layananSelect = document.querySelector("select[name='jenis_layanan[]']");
            let kekerasanSelect = document.querySelector("select[name='jenis_kekerasan[]']");
            let signatureInput = document.getElementById('signatureData');

            let requiredInputs = document.querySelectorAll("input[required], select[required], textarea[required]");
            let isValid = true;
            let message = "";

            // Cek semua input yang required (selain select multiple)
            requiredInputs.forEach(input => {
                if (!input.value.trim()) {
                    message +=
                        `Harap isi ${input.previousElementSibling ? input.previousElementSibling.textContent : 'semua field wajib'}.\n`;
                    isValid = false;
                }
            });

            // Cek input select multiple (jenis layanan & jenis kekerasan)
            if (layananSelect.selectedOptions.length === 0) {
                message += "Harap pilih setidaknya satu layanan.\n";
                isValid = false;
                layananSelect.focus();
            }
            if (kekerasanSelect.selectedOptions.length === 0) {
                message += "Harap pilih setidaknya satu jenis kekerasan.\n";
                isValid = false;
                kekerasanSelect.focus();
            }

            // Cek apakah tanda tangan sudah diisi
            if (!signatureInput.value.trim()) {
                message += "Harap isi tanda tangan sebelum mengirim formulir.\n";
                isValid = false;
            }

            // Jika ada kesalahan, tampilkan alert dan batalkan submit
            if (!isValid) {
                alert(message);
                event.preventDefault();
            }
        });


        function onChangeSelect(url, id, name) {
            // send ajax request to get the cities of the selected province and append to the select tag
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    id: id
                },
                success: function(data) {
                    $('#' + name).empty();
                    $('#' + name).append('<option>==Pilih Salah Satu==</option>');

                    $.each(data, function(key, value) {
                        $('#' + name).append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        }
        $(function() {
            $('#kecamatan').on('change', function() {
                onChangeSelect('{{ route('villages') }}', $(this).val(), 'desa');
            })

            $('#lahir_korban').on('change', function() {
                let birthdateInput = document.getElementById('lahir_korban');
                if (!birthdateInput) return; // Ensure the input exists

                let birthdate = birthdateInput.value;
                let today = new Date();
                let birthDate = new Date(birthdate);
                let age = today.getFullYear() - birthDate.getFullYear();

                if (today < new Date(today.getFullYear(), birthDate.getMonth(), birthDate.getDate())) {
                    age--;
                }

                document.getElementById('usia_korban').value = age;
            });

            $('#lahir_pelaku').on('change', function() {
                let birthdateInput = document.getElementById('lahir_pelaku');
                if (!birthdateInput) return; // Ensure the input exists

                let birthdate = birthdateInput.value;
                let today = new Date();
                let birthDate = new Date(birthdate);
                let age = today.getFullYear() - birthDate.getFullYear();

                // Adjust age if birthday hasn't occurred yet this year
                if (today < new Date(today.getFullYear(), birthDate.getMonth(), birthDate.getDate())) {
                    age--;
                }

                document.getElementById('usia_pelaku').value = age;

            })
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
    <script>
        $(function() {
            var wrapper = document.getElementById("signature-pad"),
                clearButton = wrapper.querySelector("[data-action=clear]"),
                saveButton = wrapper.querySelector("[data-action=save]"),
                canvas = wrapper.querySelector("canvas"),
                signaturePad;

            signaturePad = new SignaturePad(canvas, {
                backgroundColor: "rgb(255,255,255)",
            });

            // Function to save the signature
            function saveSignature() {
                const signatureData = signaturePad.toDataURL();

                // Set the signature data to the hidden input
                document.getElementById('signatureData').value = signatureData;

                // Optionally, you can submit the form here
                // document.getElementById('yourFormId').submit();
            }

            // Event listener to clear the signature
            clearButton.addEventListener("click", function(event) {
                signaturePad.clear();
            });

            // Event listener to save the signature
            saveButton.addEventListener("click", function(event) {
                saveSignature();
            });
        });
    </script>

</x-app-layout>
