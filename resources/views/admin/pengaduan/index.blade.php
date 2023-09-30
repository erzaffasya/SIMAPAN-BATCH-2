<x-app-layout>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Pengaduan</h4>
                <h6>Manajemen Pengaduan</h6>
            </div>
            <div class="page-btn">
                <a href="{{ route('pengaduan.create') }}" class="btn btn-added"><img
                        src="{{ asset('tadmin/assets/img/icons/plus.svg') }}" alt="img">Tambah Pengaduan</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-top">
                    <div class="search-set">
                        <div class="search-path">
                            <a class="btn btn-filter {{ $year || $status ? ' setclose' : '' }}" id="filter_search">
                                <img src="/tadmin/assets/img/icons/filter.svg" alt="img">
                                <span><img src="/tadmin/assets/img/icons/closes.svg" alt="img"></span>
                            </a>
                        </div>
                        <div class="search-input">
                            <a class="btn btn-searchset"><img
                                    src="{{ asset('tadmin/assets/img/icons/search-white.svg') }}" alt="img"></a>
                        </div>
                    </div>
                    <div class="wordset">
                        <ul>
                            <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"
                                    href="/admin/pengaduan/export?{{ explode('?', Request::getRequestUri())[1] ?? '' }}"><img
                                        src="/tadmin/assets/img/icons/excel.svg" alt="img"></a>
                            </li>
                        </ul>
                    </div>
                </div>
                {{-- /Filter --}}
                <div class="card mb-0" id="filter_inputs" {{ $year || $status ? 'style=display:block' : '' }}>
                    <div class="card-body pb-0">
                        <form action="">
                            <div class="row">
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <select class="form-control" name="status">
                                            <option value="">Status</option>
                                            <option value="Menunggu" {{ $status == 'Menunggu' ? 'selected' : '' }}>
                                                Menunggu</option>
                                            <option value="Proses" {{ $status == 'Proses' ? 'selected' : '' }}>
                                                Proses</option>
                                            <option value="Selesai" {{ $status == 'Selesai' ? 'selected' : '' }}>
                                                Selesai</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <select class="form-control" name="year">
                                            <option value="">Tahun</option>
                                            @for ($i = 2022; $i < \Carbon\Carbon::now()->format('Y') + 1; $i++)
                                                <option value="{{ $i }}"
                                                    {{ $year == $i ? 'selected' : '' }}>
                                                    {{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-sm-6 col-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-filters ms-auto"><img
                                                src="/tadmin/assets/img/icons/search-whites.svg"
                                                alt="img"></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /Filter -->
                <div class="table-responsive">
                    <table class="table datanew">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Pengaduan as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nomor }}</td>
                                    <td>{{ $item->tanggal_registrasi }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a class="me-3" href="{{ route('pengaduan.edit', $item->id) }}">
                                                <img src="{{ asset('tadmin/assets/img/icons/edit.svg') }}"
                                                    alt="img">
                                            </a>
                                            <a class="me-3" href="{{ route('pengaduan.show', $item->id) }}">
                                                <img src="{{ asset('tadmin/assets/img/icons/search.svg') }}"
                                                    alt="img">
                                            </a>
                                            <a class='confirm-text' href='javascript:void(0);' data-bs-toggle='modal'
                                                data-bs-target='#deleteModal' data-id='{{ $item->id }}'
                                                data-action='{{ route('pengaduan.destroy', $item->id) }}'
                                                data-message='{{ $item->name }}'>
                                                <img src="{{ asset('tadmin/assets/img/icons/delete.svg') }}"
                                                    alt="img">
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
