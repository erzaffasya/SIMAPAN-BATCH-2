<x-app-layout>
    <div class="content">
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-12 d-flex">
                <div class="dash-count">
                    <div class="dash-counts">
                        <h4>{{ $pengaduan }}</h4>
                        <h5>Jumlah Pengaduan</h5>
                    </div>
                    <div class="dash-imgs">
                        <i data-feather="user"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12 d-flex">
                <div class="dash-count das1">
                    <div class="dash-counts">
                        <h4>{{ $pengaduan }}</h4>
                        <h5>Jumlah Korban</h5>
                    </div>
                    <div class="dash-imgs">
                        <i data-feather="file-text"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12 d-flex">
                <div class="dash-count das2">
                    <div class="dash-counts">
                        <h4>{{ $pengaduan }}</h4>
                        <h5>Jumlah Keseluruhan Kasus</h5>
                    </div>
                    <div class="dash-imgs">
                        <i data-feather="file-text"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12 d-flex">
                <div class="dash-count das3">
                    <div class="dash-counts">
                        <h4>{{ $pengaduanSelesai }}</h4>
                        <h5>Jumlah Penyelesaian Kasus</h5>
                    </div>
                    <div class="dash-imgs">
                        <i data-feather="file"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- Button trigger modal -->

        <div class="row">
            <div class="col-lg-6 col-sm-6 col-6 d-flex">
                <div class="card flex-fill">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Grafik KDRT/NON KDRT</h5>
                        <div class="graph-sets mb-2">
                            <ul>
                                <li>
                                    <span>KDRT</span>
                                </li>
                                <li>
                                    <span>NON KDRT</span>
                                </li>
                            </ul>
                            <div class="dropdown mb-2">
                                {{-- <button class="btn btn-white btn-sm dropdown-toggle" type="button"
                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    2022 <img src="{{ asset('tadmin/assets/img/icons/dropdown.svg') }}" alt="img"
                                        class="ms-2">
                                </button> --}}
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item">2022</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item">2021</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item">2020</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div id="s-line1" class="chart-set"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-6 d-flex">
                <div class="card flex-fill">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Grafik Total Kasus</h5>
                        <div class="graph-sets mb-2">
                            <ul>
                                <li>
                                    <span>Laki-Laki</span>
                                </li>
                                <li>
                                    <span>Perempuan</span>
                                </li>
                            </ul>
                            <div class="dropdown mb-2">
                                {{-- <button class="btn btn-white btn-sm dropdown-toggle" type="button"
                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    2022 <img src="{{ asset('tadmin/assets/img/icons/dropdown.svg') }}" alt="img"
                                        class="ms-2">
                                </button> --}}
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item">2022</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item">2021</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item">2020</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div id="s-line3" class="chart-set"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-3 col-3 d-flex">
                <div class="card flex-fill">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Grafik Jenis Kekerasan</h5>
                        <div class="graph-sets mb-2">
                            <div class="dropdown mb-2">
                                {{-- <button class="btn btn-white btn-sm dropdown-toggle" type="button"
                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    2022 <img src="{{ asset('tadmin/assets/img/icons/dropdown.svg') }}" alt="img"
                                        class="ms-2">
                                </button> --}}
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item">2022</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item">2021</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item">2020</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div id="s-jenis-kekerasan" class="chart-set"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-3 col-3 d-flex">
                <div class="card flex-fill">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Grafik Jenis Layanan</h5>
                        <div class="graph-sets mb-2">
                            <div class="dropdown mb-2">
                                {{-- <button class="btn btn-white btn-sm dropdown-toggle" type="button"
                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    2022 <img src="{{ asset('tadmin/assets/img/icons/dropdown.svg') }}" alt="img"
                                        class="ms-2">
                                </button> --}}
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item">2022</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item">2021</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item">2020</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div id="s-jenis-layanan" class="chart-set"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-3 col-3 d-flex">
                <div class="card flex-fill">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Grafik Perkecamatan</h5>
                        <div class="graph-sets mb-2">
                            <div class="dropdown mb-2">
                                {{-- <button class="btn btn-white btn-sm dropdown-toggle" type="button"
                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    2022 <img src="{{ asset('tadmin/assets/img/icons/dropdown.svg') }}" alt="img"
                                        class="ms-2">
                                </button> --}}
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item">2022</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item">2021</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item">2020</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div id="s-line2" class="chart-set"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-3 col-3 d-flex">
                <div class="card flex-fill">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Grafik Perkelurahan</h5>
                        <div class="graph-sets mb-2">
                            {{-- <ul>
                                    <li>
                                        <span>Kekerasan</span>
                                    </li>
                                    <li>
                                        <span>Non Kekerasan</span>
                                    </li>
                                </ul> --}}
                            <div class="dropdown mb-2">
                                {{-- <button class="btn btn-white btn-sm dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        2022 <img src="{{ asset('tadmin/assets/img/icons/dropdown.svg') }}" alt="img"
                                            class="ms-2">
                                    </button> --}}
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item">2022</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item">2021</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item">2020</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="s-line4" class="chart-set"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Grafik Pengaduan</h5>
                        <div class="graph-sets mb-2">
                            <ul>
                                <li>
                                    <span>Pengaduan</span>
                                </li>
                            </ul>
                            <div class="dropdown mb-2">
                                {{-- <button class="btn btn-white btn-sm dropdown-toggle" type="button"
                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    2022 <img src="{{ asset('tadmin/assets/img/icons/dropdown.svg') }}" alt="img"
                                        class="ms-2">
                                </button> --}}
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item">2022</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item">2021</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item">2020</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div id="s-line" class="chart-set"></div>
                    </div>
                </div>
            </div>

        </div>
        <div class="card mb-0">
            <div class="card-body">
                <h4 class="card-title">Recent Pengaduan</h4>
                <div class="table-responsive dataview">
                    <table class="table datatable ">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor</th>
                                <th>Tanggal</th>
                                <th>Nama Korban</th>
                                <th>KDRT/NON KDRT</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentPengaduan as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><a href="javascript:void(0);">{{ $item->nomor }}</a></td>
                                    <td class="productimgname">
                                        {{ $item->tanggal_registrasi }}
                                    </td>
                                    <td>{{ $item->nama_korban }}</td>
                                    <td>{{ $item->kdrt_nonkdrt }}</td>
                                    <td>{{ $item->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <!-- Chart JS -->
        <script src="{{ asset('tadmin/assets/plugins/apexchart/apexcharts.min.js') }}"></script>

        <script>
            $(document).ready(function() {

                function generateData(baseval, count, yrange) {
                    var i = 0;
                    var series = [];
                    while (i < count) {
                        var x = Math.floor(Math.random() * (750 - 1 + 1)) + 1;;
                        var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;
                        var z = Math.floor(Math.random() * (75 - 15 + 1)) + 15;

                        series.push([x, y, z]);
                        baseval += 86400000;
                        i++;
                    }
                    return series;
                }

                if ($('#s-line2').length > 0) {
                    var options = {
                        series: [<?php echo implode(', ', $dataKecamatan[1]); ?>],
                        labels: ["<?php echo implode('", "', $dataKecamatan[0]); ?>"],
                        chart: {
                            height: 350,
                            type: 'donut',
                            zoom: {
                                enabled: false
                            },
                            toolbar: {
                                show: false,
                            }
                        }
                    };
                    var chart = new ApexCharts(
                        document.querySelector("#s-line2"),
                        options
                    );
                    chart.render();
                }

                if ($('#s-jenis-kekerasan').length > 0) {

                    var dataJenisKekerasan = @json($dataJenisKekerasan);
                    var labels = dataJenisKekerasan.map(item => item.jenis_kekerasan);
                    var values = dataJenisKekerasan.map(item => item.total);
                    var options = {
                        series: values,
                        labels: labels,
                        chart: {
                            height: 350,
                            type: 'donut',
                            zoom: {
                                enabled: false
                            },
                            toolbar: {
                                show: false,
                            }
                        }
                    };
                    var chart = new ApexCharts(
                        document.querySelector("#s-jenis-kekerasan"),
                        options
                    );
                    chart.render();
                }

                if ($('#s-jenis-layanan').length > 0) {

                    var dataJenisLayanan = @json($dataJenisLayanan);
                    var labels = dataJenisLayanan.map(item => item.jenis_layanan);
                    var values = dataJenisLayanan.map(item => item.total);
                    console.log(dataJenisLayanan, 'dataJenisLayanan', dataJenisLayanan.total, dataJenisLayanan
                        .jenis_layanan);
                    var options = {
                        series: values,
                        labels: labels,
                        chart: {
                            height: 350,
                            type: 'donut',
                            zoom: {
                                enabled: false
                            },
                            toolbar: {
                                show: false,
                            }
                        }
                    };
                    var chart = new ApexCharts(
                        document.querySelector("#s-jenis-layanan"),
                        options
                    );
                    chart.render();
                }

                // Simple Line
                if ($('#s-line1').length > 0) {
                    var sbar = {
                        chart: {
                            height: 350,
                            type: 'bar',
                            zoom: {
                                enabled: false
                            },
                            toolbar: {
                                show: false,
                            }
                        },
                        // colors: ['#4361ee'],
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            curve: 'straight'
                        },
                        series: [{
                                name: "KDRT",
                                data: [<?php echo implode(', ', $dataKDRT[0]); ?>]
                            },
                            {
                                name: "NON KDRT",
                                data: [<?php echo implode(', ', $dataKDRT[1]); ?>]
                            }
                        ],
                        grid: {
                            row: {
                                colors: ['#f1f2f3',
                                    'transparent'
                                ], // takes an array which will be repeated on columns
                                opacity: 0.5
                            },
                        },
                        xaxis: {
                            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt',
                                'Nov', 'Des'
                            ],
                        }
                    }
                    var chart = new ApexCharts(
                        document.querySelector("#s-line1"),
                        sbar
                    );
                    chart.render();
                }
                if ($('#s-line3').length > 0) {
                    var data_pengaduan_total_kasus = @json($pengaduan_total_korban);
                    console.log(data_pengaduan_total_kasus);
                    var sbar = {
                        chart: {
                            height: 350,
                            type: 'bar',
                            zoom: {
                                enabled: false
                            },
                            toolbar: {
                                show: false,
                            }
                        },
                        // colors: ['#4361ee'],
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            curve: 'straight'
                        },
                        series: [{
                                name: "Laki-laki",
                                data: [data_pengaduan_total_kasus.find(d => d.jenis_kelamin == 'L')
                                    ?.total_dibawah_18, data_pengaduan_total_kasus.find(d => d
                                        .jenis_kelamin == 'L')?.total_diatas_18
                                ]
                            },
                            {
                                name: "Perempuan",
                                data: [data_pengaduan_total_kasus.find(d => d.jenis_kelamin == 'P')
                                    ?.total_dibawah_18, data_pengaduan_total_kasus.find(d => d
                                        .jenis_kelamin == 'P')?.total_diatas_18
                                ]
                            }
                        ],
                        grid: {
                            row: {
                                colors: ['#f1f2f3',
                                    'transparent'
                                ], // takes an array which will be repeated on columns
                                opacity: 0.5
                            },
                        },
                        xaxis: {
                            categories: ['Dibawah 18 Tahun', 'Diatas 18 Tahun'],
                        }
                    }
                    var chart = new ApexCharts(
                        document.querySelector("#s-line3"),
                        sbar
                    );
                    chart.render();
                }

                if ($('#s-line4').length > 0) {
                    var options = {
                        series: [<?php echo implode(', ', $dataKelurahan[1]); ?>],
                        labels: ["<?php echo implode('", "', $dataKelurahan[0]); ?>"],
                        chart: {
                            height: 350,
                            type: 'donut',
                            zoom: {
                                enabled: false
                            },
                            toolbar: {
                                show: false,
                            }
                        }
                    };
                    var chart = new ApexCharts(
                        document.querySelector("#s-line4"),
                        options
                    );
                    chart.render();
                }

                if ($('#s-line').length > 0) {
                    var sline = {
                        chart: {
                            height: 350,
                            type: 'line',
                            zoom: {
                                enabled: false
                            },
                            toolbar: {
                                show: false,
                            }
                        },
                        // colors: ['#4361ee'],
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            curve: 'straight'
                        },
                        series: [{
                            name: "Pengaduan",
                            data: [{{ $arrayStatistikPengaduan }}]
                        }],
                        grid: {
                            row: {
                                colors: ['#f1f2f3',
                                    'transparent'
                                ], // takes an array which will be repeated on columns
                                opacity: 0.5
                            },
                        },
                        xaxis: {
                            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt',
                                'Nov', 'Des'
                            ],
                        }
                    }
                    var chart = new ApexCharts(
                        document.querySelector("#s-line"),
                        sline
                    );
                    chart.render();
                }
            });
        </script>
    @endpush
</x-app-layout>
