<table>
    <thead>
        <tr>
            <td>No</td>
            <td>Tanggal Registrasi</td>
            <td>Petugas Penerima</td>
            <td>Petugas Menangani</td>
            <td>Jenis Aduan</td>
            <td>Nama Pelapor</td>
            <td>Jenis Kelamin Pelapor</td>
            <td>Alamat Pelapor</td>
            <td>Nomor HP Pelapor</td>
            <td>Hubungan dengan Korban</td>
            <td>Nama Korban</td>
            <td>Nama Alias Korban</td>
            <td>NIK Korban</td>
            <td>Jenis Kelamin Korban</td>
            <td>Tanggal Lahir Korban</td>
            <td>Usia Korban</td>
            <td>Alamat Korban</td>
            <td>Kelurahan Korban</td>
            <td>Kecamatan Korban</td>
            <td>Pendidikan Korban</td>
            <td>Agama Korban</td>
            <td>Suku Korban</td>
            <td>Kewarganegaraan Korban</td>
            <td>Pekerjaan Korban</td>
            <td>Nama Pelaku</td>
            <td>Jenis Kelamin Pelaku</td>
            <td>Tanggal Lahir Pelaku</td>
            <td>Usia Pelaku</td>
            <td>Alamat Pelaku</td>
            <td>Pendidikan Pelaku</td>
            <td>Agama Pelaku</td>
            <td>Suku Pelaku</td>
            <td>Pekerjaan Pelaku</td>
            <td>Hubungan dengan Pelaku</td>
            <td>Difabel/Non-Difabel</td>
            <td>Tempat Kejadian</td>
            <td>KDRT/Non-KDRT</td>
            <td>Kronologis</td>
            <td>Status</td>
            <td>Keterangan</td>
            <td>Tanda Tangan</td>
            <td>Akta</td>
            <td>KTP</td>
            <td>KK</td>
            <td>Foto Korban</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($pengaduan as $item)
            <tr>
                <td>{{ $item->nomor }}</td>
                <td>{{ $item->tanggal_registrasi?->format('d/m/Y') }}</td>
                <td>{{ $item->petugasPenerima?->name }}</td>
                <td>{{ $item->petugasMenangani?->name }}</td>
                <td>{{ $item->jenis_aduan }}</td>
                <td>{{ $item->nama_pelapor }}</td>
                <td>{{ $item->jenis_kelamin_pelapor }}</td>
                <td>{{ $item->alamat_pelapor }}</td>
                <td>{{ $item->hp_pelapor }}</td>
                <td>{{ $item->hubungan_korban }}</td>

                <td>{{ $item->nama_korban }}</td>
                <td>{{ $item->nama_alias_korban }}</td>
                <td>{{ $item->nik_korban }}</td>
                <td>{{ $item->jenis_kelamin_korban }}</td>
                <td>{{ $item->lahir_korban?->format('d/m/Y') }}</td>
                <td>{{ $item->usia_korban }}</td>
                <td>{{ $item->alamat_korban }}</td>
                <td>{{ $item->kelurahanKorban?->name }}</td>
                <td>{{ $item->kecamatanKorban?->name }}</td>
                <td>{{ $item->pendidikan_korban }}</td>
                <td>{{ $item->agama_korban }}</td>
                <td>{{ $item->suku_korban }}</td>
                <td>{{ $item->kewarganegaraan_korban }}</td>
                <td>{{ $item->pekerjaan_korban }}</td>

                <td>{{ $item->nama_pelaku }}</td>
                <td>{{ $item->jenis_kelamin_pelaku }}</td>
                <td>{{ $item->lahir_pelaku?->format('d/m/Y') }}</td>
                <td>{{ $item->usia_pelaku }}</td>
                <td>{{ $item->alamat_pelaku }}</td>
                <td>{{ $item->pendidikan_pelaku }}</td>
                <td>{{ $item->agama_pelaku }}</td>
                <td>{{ $item->suku_pelaku }}</td>
                <td>{{ $item->pekerjaan_pelaku }}</td>
                <td>{{ $item->hubungan_pelaku }}</td>

                <td>{{ $item->difabel_nondifabel }}</td>
                <td>{{ $item->tempat_kejadian }}</td>
                <td>{{ $item->kdrt_nonkdrt }}</td>
                <td>{{ $item->kronologis }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->keterangan }}</td>

                <td><a href="{{ asset($item->ttd) }}">Tanda Tangan</a></td>
                <td><a href="{{ asset($item->akta) }}">Akta</a></td>
                <td><a href="{{ asset($item->ktp) }}">KTP</a></td>
                <td><a href="{{ asset($item->kk) }}">KK</a></td>
                <td><a href="{{ asset($item->foto_korban) }}">Foto Korban</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
