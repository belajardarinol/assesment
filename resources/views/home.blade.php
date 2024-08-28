@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Dashboard
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{-- {{ Auth::user()->temp_id }} --}}
                        @if (Auth::user()->temp_id != null && Auth::user()->temp_status == 1)
                            {{-- You are logged in as  --}}
                            @php
                                $user = \App\Models\User::find(Auth::user()->temp_id);
                                // var_dump($user);
                                Auth::login($user);
                                // Auth::user()->temp_id = 1;
                                // Auth::user()->temp_status = 1;
                                // Auth::user()->save();
                            @endphp
                            {{-- @else --}}
                        @endif
                        You are logged in as {{ Auth::user()->name }}!
                        <br>
                        @if (Auth::user()->team != null)
                            Univ : {{ Auth::user()->team->name }}
                        @endif
                        <br>
                        <br>
                        @if (Auth::user()->roles->first()->id == 2)
                            @php
                                $user = Auth::user();
                                $nilai = \App\Models\Nilai::with('materi')
                                    ->where('user_id', $user->id)
                                    ->get();

                                $klasifikasi_nilai = [];

                                foreach ($nilai as $item) {
                                    $materi = \App\Models\Materi::with('klasifikasis')->find($item->materi_id);
                                    foreach ($materi->klasifikasis as $klasifikasi) {
                                        if (!isset($klasifikasi_nilai[$klasifikasi->klasifikasi])) {
                                            $klasifikasi_nilai[$klasifikasi->klasifikasi] = [];
                                        }
                                        $klasifikasi_nilai[$klasifikasi->klasifikasi][] = $item->value;
                                    }
                                }

                                $chart_labels = array_keys($klasifikasi_nilai);
                                $chart_data = array_map(function ($values) {
                                    return count($values) > 0 ? array_sum($values) / count($values) : 0;
                                }, $klasifikasi_nilai);
                                // var_dump($chart_data);
                                $data_chart = array_values($chart_data);
                            @endphp
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card mb-3"><img class="card-img-top" src="assets/img/full.jpg"
                                            alt="">
                                        <div class="card-body">
                                            <h5 class="card-title">Nilai Rata-Rata per Klasifikasi</h5>
                                            {{-- <p class="card-text">This is a wider card with supporting text below as a
                                                natural
                                                lead-in to additional content. This content is a little bit longer.</p> --}}
                                            <canvas id="nilaiRadarChart" width="400" height="400"></canvas>
                                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                            <script>
                                                var ctx = document.getElementById('nilaiRadarChart').getContext('2d');
                                                var nilaiRadarChart = new Chart(ctx, {
                                                    type: 'radar',
                                                    data: {
                                                        labels: @json($chart_labels),
                                                        datasets: [{
                                                            label: 'Nilai Rata-Rata per Klasifikasi',
                                                            data: @json($data_chart),
                                                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                                            borderColor: 'rgba(54, 162, 235, 1)',
                                                            borderWidth: 1
                                                        }]
                                                    },
                                                    options: {
                                                        scales: {
                                                            r: {
                                                                beginAtZero: true
                                                            }
                                                        }
                                                    }
                                                });
                                            </script>
                                            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins
                                                    ago</small></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Nilai Rata-Rata per Klasifikasi</h5>
                                            {{-- <p class="card-text">This is a wider card with supporting text below as a
                                                natural
                                                lead-in to additional content. This content is a little bit longer.</p> --}}
                                            <canvas id="nilaiPolarAreaChart" width="400" height="400"></canvas>
                                            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins
                                                    ago</small></p>

                                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                            <script>
                                                var ctx = document.getElementById('nilaiPolarAreaChart').getContext('2d');
                                                var nilaiPolarAreaChart = new Chart(ctx, {
                                                    type: 'polarArea',
                                                    data: {
                                                        labels: ['Farmasi Klinik', 'Farmasi Komunitas', 'Farmasi Industri'], // Label statis
                                                        datasets: [{
                                                            label: 'Nilai Rata-Rata per Klasifikasi',
                                                            // data: [75, 50, 90], // Data statis
                                                            data: @json($data_chart), // Data dinamis
                                                            backgroundColor: [
                                                                'rgba(255, 99, 132, 0.2)',
                                                                'rgba(54, 162, 235, 0.2)',
                                                                'rgba(255, 206, 86, 0.2)',
                                                            ],
                                                            borderColor: [
                                                                'rgba(255, 99, 132, 1)',
                                                                'rgba(54, 162, 235, 1)',
                                                                'rgba(255, 206, 86, 1)',
                                                            ],
                                                            borderWidth: 1
                                                        }]
                                                    },
                                                    options: {
                                                        scales: {
                                                            r: {
                                                                beginAtZero: true,
                                                                max: 100
                                                            }
                                                        }
                                                    }
                                                });
                                            </script>
                                        </div><img class="card-img-bottom" src="assets/img/full.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if (Auth::user()->roles->first()->id == 1)
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="h4 m-0">
                                                @php $members = \App\Models\Team::all(); @endphp
                                                @if ($members)
                                                    {{ count($members) }}
                                                @else
                                                    0
                                                @endif
                                            </div>
                                            <div> Jumlah Universitas
                                            </div>
                                            <div class="progress-xs my-3 mb-0 progress">
                                                <div role="progressbar" aria-valuemin="0" aria-valuemax="100"
                                                    aria-valuenow="25" class="progress-bar bg-success" style="width: 25%;">
                                                </div>
                                            </div> <small class="text-muted">
                                                Lorem ipsum dolor sit amet enim.
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="h4 m-0">
                                                @php $members = \App\Models\Team::all(); @endphp
                                                @if ($members)
                                                    {{ count($members) }}
                                                @else
                                                    0
                                                @endif
                                            </div>
                                            <div> Jumlah Universitas</div>
                                            <div class="progress-xs my-3 mb-0 progress">
                                                <div role="progressbar" aria-valuemin="0" aria-valuemax="100"
                                                    aria-valuenow="25" class="progress-bar bg-varning" style="width: 25%;">
                                                </div>
                                            </div> <small class="text-muted">
                                                Lorem ipsum dolor sit amet enim.
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row g-4 mb-4">
                                <div class="col-sm-6 col-xl-3">
                                    <div class="card text-white bg-primary">
                                        <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                                            Jumlah Mahasiswa

                                            @php $members = \App\Models\User::where('team_id', Auth::user()->team->id)->get(); @endphp
                                            @if ($members)
                                                {{ count($members) }}
                                            @else
                                                0
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="row g-4 mb-4">
                                <div class="col-sm-6 col-xl-3">
                                    <div class="card text-white bg-primary">
                                        <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                                            <div>
                                                <div class="fs-4 fw-semibold">26K <span
                                                        class="fs-6 fw-normal">(-12.4%)</span></div>
                                                <div>Users</div>
                                            </div>
                                            <div class="dropdown">
                                                <button class="btn btn-transparent text-white p-0" type="button"
                                                    data-coreui-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <svg class="icon">
                                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options">
                                                        </use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item"
                                                        href="#">Action</a><a class="dropdown-item"
                                                        href="#">Another action</a><a class="dropdown-item"
                                                        href="#">Something else here</a></div>
                                            </div>
                                        </div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                            <canvas class="chart" id="card-chart1" height="70" width="258"
                                                style="display: block; box-sizing: border-box; height: 70px; width: 258px;"></canvas>
                                            <div class="chartjs-tooltip"
                                                style="opacity: 0; left: 186.333px; top: 133.712px;">
                                                <table style="margin: 0px;">
                                                    <thead class="chartjs-tooltip-header">
                                                        <tr class="chartjs-tooltip-header-item" style="border-width: 0px;">
                                                            <th style="border-width: 0px;">May</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="chartjs-tooltip-body">
                                                        <tr class="chartjs-tooltip-body-item">
                                                            <td style="border-width: 0px;"><span
                                                                    style="background: rgb(98, 97, 204); border-color: rgba(255, 255, 255, 0.55); border-width: 2px; margin-right: 10px; height: 10px; width: 10px; display: inline-block;"></span>My
                                                                First dataset: 51</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col-->
                                <div class="col-sm-6 col-xl-3">
                                    <div class="card text-white bg-info">
                                        <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                                            <div>
                                                <div class="fs-4 fw-semibold">$6.200 <span
                                                        class="fs-6 fw-normal">(40.9%)</span></div>
                                                <div>Income</div>
                                            </div>
                                            <div class="dropdown">
                                                <button class="btn btn-transparent text-white p-0" type="button"
                                                    data-coreui-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <svg class="icon">
                                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options">
                                                        </use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item"
                                                        href="#">Action</a><a class="dropdown-item"
                                                        href="#">Another action</a><a class="dropdown-item"
                                                        href="#">Something else here</a></div>
                                            </div>
                                        </div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                            <canvas class="chart" id="card-chart2" height="70" width="258"
                                                style="display: block; box-sizing: border-box; height: 70px; width: 258px;"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col-->
                                <div class="col-sm-6 col-xl-3">
                                    <div class="card text-white bg-warning">
                                        <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                                            <div>
                                                <div class="fs-4 fw-semibold">2.49% <span
                                                        class="fs-6 fw-normal">(84.7%)</span></div>
                                                <div>Conversion Rate</div>
                                            </div>
                                            <div class="dropdown">
                                                <button class="btn btn-transparent text-white p-0" type="button"
                                                    data-coreui-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <svg class="icon">
                                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options">
                                                        </use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item"
                                                        href="#">Action</a><a class="dropdown-item"
                                                        href="#">Another action</a><a class="dropdown-item"
                                                        href="#">Something else here</a></div>
                                            </div>
                                        </div>
                                        <div class="c-chart-wrapper mt-3" style="height:70px;">
                                            <canvas class="chart" id="card-chart3" height="70" width="290"
                                                style="display: block; box-sizing: border-box; height: 70px; width: 290px;"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col-->
                                <div class="col-sm-6 col-xl-3">
                                    <div class="card text-white bg-danger">
                                        <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                                            <div>
                                                <div class="fs-4 fw-semibold">44K <span
                                                        class="fs-6 fw-normal">(-23.6%)</span></div>
                                                <div>Sessions</div>
                                            </div>
                                            <div class="dropdown">
                                                <button class="btn btn-transparent text-white p-0" type="button"
                                                    data-coreui-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <svg class="icon">
                                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options">
                                                        </use>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item"
                                                        href="#">Action</a><a class="dropdown-item"
                                                        href="#">Another action</a><a class="dropdown-item"
                                                        href="#">Something else here</a></div>
                                            </div>
                                        </div>
                                        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                            <canvas class="chart" id="card-chart4" height="70" width="258"
                                                style="display: block; box-sizing: border-box; height: 70px; width: 258px;"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col-->
                            </div>
                        @endif


                        {{-- <canvas id="nilaiPolarAreaChart" width="400" height="400"></canvas>

                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    var ctx = document.getElementById('nilaiPolarAreaChart').getContext('2d');
                    var nilaiPolarAreaChart = new Chart(ctx, {
                        type: 'polarArea', // Ganti tipe chart menjadi polarArea
                        data: {
                            labels: @json($chart_labels), // Label untuk sumbu polar, misalnya Klasifikasi
                            datasets: [{
                                label: 'Nilai Rata-Rata per Klasifikasi',
                                data: @json($data_chart), // Data untuk polar area chart
                                backgroundColor: [
                                    'rgb(255, 99, 132)',
                                    'rgb(75, 192, 192)',
                                    'rgb(255, 205, 86)',
                                    'rgb(201, 203, 207)',
                                    'rgb(54, 162, 235)'
                                ], // Warna background untuk setiap segmen
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    // 'rgba(255, 159, 64, 1)'
                                ], // Warna border untuk setiap segmen
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                r: {
                                    beginAtZero: true, // Memulai skala dari nol
                                    max: 100 // Maksimal nilai pada sumbu
                                }
                            }
                        }
                    });
                </script> --}}


                    </div>
                </div>
            </div>
        </div>
        <!-- Ilham Jelek -->



    </div>
@endsection
@section('scripts')
    @parent
@endsection
