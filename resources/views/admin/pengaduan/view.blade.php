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

            <div class="card" id="form-pengaduan-wizard">
                <div class="card-header">
                    <h5>Pendaftaran Pengaduan</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>Nomor Registrasi</td>
                            <td>:</td>
                            <td>{{ $pengaduan->nomor }}</td>
                            <td>Tanggal</td>
                            <td>:</td>
                            <td>{{ $pengaduan->tanggal_registrasi->format('Y-m-d') }}</td>
                        </tr>
                        <tr>
                            <td>Petugas Penerima</td>
                            <td>:</td>
                            <td>{{ $pengaduan->petugasPenerima?->name }}</td>
                            <td>Petugas Menangani</td>
                            <td>:</td>
                            <td>{{ $pengaduan->petugasMenangani?->name }}</td>
                        </tr>
                        <tr>
                            <td>Jenis Kekerasan</td>
                            <td>:</td>
                            <td>{{ $pengaduan->jenis_kekerasan }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5>Data Pelapor</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>Nama Pelapor</td>
                            <td>:</td>
                            <td>{{ $pengaduan->nama_pelapor }}</td>
                            <td>Jenis Kelamin Pelapor</td>
                            <td>:</td>
                            <td>{{ $pengaduan->jenis_kekerasan }}</td>
                        </tr>
                        <tr>
                            <td>Hubungan Pelapor</td>
                            <td>:</td>
                            <td>{{ $pengaduan->hubungan_korban }}</td>
                            <td>Nomor Handphone</td>
                            <td>:</td>
                            <td colspan="4">{{ $pengaduan->hp_pelapor }}</td>
                        </tr>
                        <tr>
                            <td>Alamat Pelapor</td>
                            <td>:</td>
                            <td colspan="4">{{ $pengaduan->alamat_pelapor }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5>Data Korban</h5>
                </div>

                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>Nama Korban</td>
                            <td>:</td>
                            <td>{{ $pengaduan->nama_korban }}</td>
                            <td>Nama Alias Korban</td>
                            <td>:</td>
                            <td>{{ $pengaduan->nama_alias_korban }}</td>
                        </tr>
                        <tr>
                            <td>NIK Korban</td>
                            <td>:</td>
                            <td>{{ $pengaduan->nik_korban }}</td>
                            <td>Jenis Kelamin Korban</td>
                            <td>:</td>
                            <td>{{ $pengaduan->jenis_kelamin_korban }}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir Korban</td>
                            <td>:</td>
                            <td>{{ $pengaduan->lahir_korban?->format('Y-m-d') }}</td>
                            <td>Usia Korban</td>
                            <td>:</td>
                            <td>{{ $pengaduan->usia_korban }}</td>
                        </tr>
                        <tr>
                            <td>Kecamatan Korban</td>
                            <td>:</td>
                            <td>{{ $pengaduan->kecamatanKorban?->name }}</td>
                            <td>Kelurahan Korban</td>
                            <td>:</td>
                            <td>{{ $pengaduan->kelurahanKorban?->name }}</td>
                        </tr>
                        <tr>
                            <td>Alamat Korban</td>
                            <td>:</td>
                            <td colspan="4">{{ $pengaduan->alamat_korban }}</td>
                        </tr>
                        <tr>
                            <td>Agama Korban</td>
                            <td>:</td>
                            <td>{{ $pengaduan->agama_korban }}</td>
                            <td>Pendidikan Korban</td>
                            <td>:</td>
                            <td>{{ $pengaduan->pendidikan_korban }}</td>
                        </tr>
                        <tr>
                            <td>Suku Korban</td>
                            <td>:</td>
                            <td>{{ $pengaduan->suku_korban }}</td>
                            <td>Kewarganegaraan Korban</td>
                            <td>:</td>
                            <td>{{ $pengaduan->kewarganegaraan_korban }}</td>
                        </tr>
                        <tr>
                            <td>Jenis Layanan</td>
                            <td>:</td>
                            <td>
                                @foreach ($pengaduan->lJenisLayanan as $item)
                                    {{ $item->jenis_layanan }}
                                    <br>
                                @endforeach
                            </td>
                            <td>Jenis Kekerasan</td>
                            <td>:</td>
                            <td>
                                @foreach ($pengaduan->lJenisKekerasan as $item)
                                    {{ $item->jenis_kekerasan }}
                                    <br>
                                @endforeach
                            </td>

                        </tr>
                    </table>
                </div>
            </div>


            <div class="card">
                <div class="card-header">
                    <h5>Data Pelaku</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>Nama Pelaku</td>
                            <td>:</td>
                            <td>{{ $pengaduan->nama_pelaku }}</td>
                            <td>Jenis Kelamin Pelaku</td>
                            <td>:</td>
                            <td>{{ $pengaduan->jenis_kelamin_pelaku }}</td>
                        </tr>
                        <tr>
                            <td>Lahir Pelaku</td>
                            <td>:</td>
                            <td>{{ $pengaduan->lahir_pelaku?->format('Y-m-d') }}</td>
                            <td>Usia Pelaku</td>
                            <td>:</td>
                            <td>{{ $pengaduan->usia_pelaku }}</td>
                        </tr>
                        <tr>
                            <td>Alamat Pelaku</td>
                            <td>:</td>
                            <td>{{ $pengaduan->alamat_pelaku }}</td>
                            <td>Pendidikan Pelaku</td>
                            <td>:</td>
                            <td>{{ $pengaduan->pendidikan_pelaku }}</td>
                        </tr>
                        <tr>
                            <td>Agama Pelaku</td>
                            <td>:</td>
                            <td>{{ $pengaduan->agama_pelaku }}</td>
                            <td>Suku Pelaku</td>
                            <td>:</td>
                            <td>{{ $pengaduan->suku_pelaku }}</td>
                        </tr>
                        <tr>
                            <td>Pekerjaan Pelaku</td>
                            <td>:</td>
                            <td>{{ $pengaduan->pekerjaan_pelaku }}</td>
                            <td>Hubungan Pelaku</td>
                            <td>:</td>
                            <td>{{ $pengaduan->hubungan_pelaku }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5>Data Kronologis</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>Tempat Kejadian Perkara</td>
                            <td>:</td>
                            <td>{{ $pengaduan->tempat_kejadian }}</td>
                            <td>KDRT/NON KDRT</td>
                            <td>:</td>
                            <td>{{ $pengaduan->kdrt_nonkdrt }}</td>
                        </tr>
                        <tr>
                            <td>Status Kasus</td>
                            <td>:</td>
                            <td colspan="4">{{ $pengaduan->status }}</td>
                        </tr>
                        <tr>
                            <td>Kronologis</td>
                            <td>:</td>
                            <td colspan="4">{{ $pengaduan->kronologis }}</td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td>:</td>
                            <td colspan="4">{{ $pengaduan->keterangan }}</td>
                        </tr>
                        <tr>
                            <td>Tanda Tangan</td>
                            <td>:</td>
                            <td><img style="width: 200px" src="{{ asset('storage/ttd/' . $pengaduan->ttd) }}" alt=""
                                    width="100" height="100">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5>Dokumen Pendukung</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="basicpill-servicetax-input" class="form-label">KTP</label>
                                <br>
                                @if ($pengaduan->ktp != null)
                                    @php
                                        $ext = pathinfo($pengaduan->ktp, PATHINFO_EXTENSION);
                                    @endphp
                                    @switch($ext)
                                        @case('pdf')
                                            <embed src="{{ asset($pengaduan->ktp) }}#toolbar=0" type="application/pdf"
                                                width="100%" height="600px" />
                                        @break

                                        @default
                                            <img src="{{ asset($pengaduan->ktp) }}" alt="ktp" width="300">
                                    @endswitch
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="basicpill-servicetax-input" class="form-label">Akta</label>
                                <br>
                                @if ($pengaduan->akta != null)
                                    @php
                                        $ext = pathinfo($pengaduan->akta, PATHINFO_EXTENSION);
                                    @endphp
                                    @switch($ext)
                                        @case('pdf')
                                            <embed src="{{ asset($pengaduan->akta) }}#toolbar=0" type="application/pdf"
                                                width="100%" height="600px" />
                                        @break

                                        @default
                                            <img src="{{ asset($pengaduan->akta) }}" alt="akta" width="300">
                                    @endswitch
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="basicpill-servicetax-input" class="form-label">KK</label>
                                <br>
                                @if ($pengaduan->kk != null)
                                    @php
                                        $ext = pathinfo($pengaduan->kk, PATHINFO_EXTENSION);
                                    @endphp
                                    @switch($ext)
                                        @case('pdf')
                                            <embed src="{{ asset($pengaduan->kk) }}#toolbar=0" type="application/pdf"
                                                width="100%" height="600px" />
                                        @break

                                        @default
                                            <img src="{{ asset($pengaduan->kk) }}" alt="kk" width="300">
                                    @endswitch
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="basicpill-servicetax-input" class="form-label">Foto Korban</label>
                                <br>
                                @if ($pengaduan->foto_korban != null)
                                    @php
                                        $ext = pathinfo($pengaduan->foto_korban, PATHINFO_EXTENSION);
                                    @endphp
                                    @switch($ext)
                                        @case('pdf')
                                            <embed src="{{ asset($pengaduan->foto_korban) }}#toolbar=0" type="application/pdf"
                                                width="100%" height="600px" />
                                        @break

                                        @default
                                            <img src="{{ asset($pengaduan->foto_korban) }}" alt="foto_korban" width="300">
                                    @endswitch
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
