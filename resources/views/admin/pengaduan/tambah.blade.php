<x-app-layout>

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
                                <form>
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
                                                <label for="basicpill-lastname-input" class="form-label">Tanggal
                                                    Registrasi</label>
                                                <input type="date" name="tanggal_registrasi" class="form-control"
                                                    id="basicpill-lastname-input">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-phoneno-input" class="form-label">Petugas
                                                    Penerima</label>
                                                <select class="form-select" name="petugas_penerima" name="customer">
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
                                                <select class="form-select" name="petugas_menangani" name="customer">
                                                    @foreach ($user as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-email-input" class="form-label">Jenis
                                                    Kekerasan/Non Kekerasan</label>
                                                <select class="form-select" name="jenis_aduan" name="customer">
                                                    <option value="">KDRT</option>
                                                    <option value="">NON KDRT</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <ul class="pager wizard twitter-bs-wizard-pager-link">
                                    <li class="next"><a href="javascript: void(0);" class="btn btn-primary"
                                            onclick="nextTab()">Next <i class="bx bx-chevron-right ms-1"></i></a></li>
                                </ul>
                            </div>
                            <!-- tab pane -->
                            <div class="tab-pane" id="form-pelapor-wizard">
                                <div>
                                    <div class="mb-4">
                                        <h5>Data Pelapor</h5>
                                    </div>
                                    <form>
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
                                                    <select class="form-select" name="jenis_kelamin_pelapor"
                                                        name="customer">
                                                        <option value="">Laki-Laki</option>
                                                        <option value="">Perempuan</option>
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
                                    </form>
                                    <ul class="pager wizard twitter-bs-wizard-pager-link">
                                        <li class="previous"><a href="javascript: void(0);" class="btn btn-primary"
                                                onclick="nextTab()"><i class="bx bx-chevron-left me-1"></i>
                                                Previous</a></li>
                                        <li class="next"><a href="javascript: void(0);" class="btn btn-primary"
                                                onclick="nextTab()">Next <i class="bx bx-chevron-right ms-1"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="tab-pane" id="form-korban-wizard">
                                <div>
                                    <div class="mb-4">
                                        <h5>Data Korban</h5>
                                    </div>
                                    <form>
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
                                                    <select class="form-select" name="jenis_kelamin_korban"
                                                        name="customer">
                                                        <option value="">Laki-Laki</option>
                                                        <option value="">Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input" class="form-label">Tempat,
                                                        Tanggal Lahir Korban</label>
                                                    <input type="text" name="lahir_korban" class="form-control"
                                                        id="basicpill-servicetax-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input" class="form-label">Usia
                                                        Korban</label>
                                                    <input type="number" name="usia_korban" class="form-control"
                                                        id="basicpill-servicetax-input">
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
                                                        class="form-label">Kelurahan</label>
                                                    <input type="text" name="kelurahan_korban"
                                                        class="form-control" id="basicpill-servicetax-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input"
                                                        class="form-label">Kecamatan</label>
                                                    <input type="text" name="kecamatan_korban"
                                                        class="form-control" id="basicpill-servicetax-input">
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
                                                    <select class="form-select" multiple="true"
                                                        name="jenis_kelamin_korban" name="layanan_id[]">
                                                        @foreach ($layanan as $item)
                                                            <option value="">{{ $item->jenis_layanan }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input" class="form-label">Jenis
                                                        Kekerasan</label>
                                                    <select class="form-select" multiple="true"
                                                        name="jenis_kelamin_korban" name="layanan_id[]">
                                                        @foreach ($kekerasan as $item)
                                                            <option value="">{{ $item->jenis_kekerasan }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <ul class="pager wizard twitter-bs-wizard-pager-link">
                                        <li class="previous"><a href="javascript: void(0);" class="btn btn-primary"
                                                onclick="nextTab()"><i class="bx bx-chevron-left me-1"></i>
                                                Previous</a></li>
                                        <li class="next"><a href="javascript: void(0);" class="btn btn-primary"
                                                onclick="nextTab()">Next <i class="bx bx-chevron-right ms-1"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-pane" id="form-pelaku-wizard">
                                <div>
                                    <div class="mb-4">
                                        <h5>Data Pelaku</h5>
                                    </div>
                                    <form>
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
                                                    <input type="text" name="jenis_kelamin_pelaku"
                                                        class="form-control" id="basicpill-servicetax-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input" class="form-label">Tempat,
                                                        Tanggal Lahir Pelaku</label>
                                                    <input type="text" name="lahir_pelaku" class="form-control"
                                                        id="basicpill-servicetax-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input" class="form-label">Usia
                                                        Pelaku</label>
                                                    <input type="number" name="usia_pelaku" class="form-control"
                                                        id="basicpill-servicetax-input">
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
                                                    <input type="text" name="hubungan_pelaku"
                                                        class="form-control" id="basicpill-servicetax-input">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <ul class="pager wizard twitter-bs-wizard-pager-link">
                                        <li class="previous"><a href="javascript: void(0);" class="btn btn-primary"
                                                onclick="nextTab()"><i class="bx bx-chevron-left me-1"></i>
                                                Previous</a></li>
                                        <li class="next"><a href="javascript: void(0);" class="btn btn-primary"
                                                onclick="nextTab()">Next <i class="bx bx-chevron-right ms-1"></i></a>
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
                                    <form>
                                        <div class="row">

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input" class="form-label">Tempat
                                                        Kejadian Perkara</label>
                                                    <input type="text" name="tempat_kejadian"
                                                        class="form-control" id="basicpill-servicetax-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input"
                                                        class="form-label">KDRT/NON KDRT</label>
                                                    <input type="text" name="kdrt_nonkdrt" class="form-control"
                                                        id="basicpill-servicetax-input">
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
                                                    <label for="basicpill-servicetax-input" class="form-label">Status
                                                        Kasus</label>
                                                    <input type="text" name="status_kasus" class="form-control"
                                                        id="basicpill-servicetax-input">
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
                                                    <label for="basicpill-servicetax-input" class="form-label">Tanda
                                                        Tangan</label>
                                                    <input type="text" name="ttd" class="form-control"
                                                        id="basicpill-servicetax-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input"
                                                        class="form-label">KTP</label>
                                                    <input type="file" name="ktp" class="form-control"
                                                        id="basicpill-servicetax-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input"
                                                        class="form-label">Akta</label>
                                                    <input type="file" name="akta" class="form-control"
                                                        id="basicpill-servicetax-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input"
                                                        class="form-label">KK</label>
                                                    <input type="file" name="kk" class="form-control"
                                                        id="basicpill-servicetax-input">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-servicetax-input" class="form-label">Foto
                                                        Korban</label>
                                                    <input type="file" name="foto_korban" class="form-control"
                                                        id="basicpill-servicetax-input">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <ul class="pager wizard twitter-bs-wizard-pager-link">
                                        <li class="previous"><a href="javascript: void(0);" class="btn btn-primary"
                                                onclick="nextTab()"><i class="bx bx-chevron-left me-1"></i>
                                                Previous</a></li>
                                        <li class="float-end"><a href="javascript: void(0);" class="btn btn-primary"
                                                data-bs-toggle="modal" data-bs-target=".confirmModal">Save
                                                Changes</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- tab pane -->

                        </div>
                        <!-- end tab content -->
                    </div>
                </div>
                <!-- end card body -->
            </div>
        </div>
        <!-- /Wizard -->
    </div>


</x-app-layout>
