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

                        You are logged in! Hello {{ Auth::user()->name }}!
                        <br>

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
                                <div class="card mb-3"><img class="card-img-top" src="assets/img/full.jpg" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">Nilai Rata-Rata per Klasifikasi</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a natural
                                            lead-in to additional content. This content is a little bit longer.</p>
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
                                        <p class="card-text">This is a wider card with supporting text below as a natural
                                            lead-in to additional content. This content is a little bit longer.</p>
                                        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins
                                                ago</small></p>
                                        <canvas id="nilaiPolarAreaChart" width="400" height="400"></canvas>

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
