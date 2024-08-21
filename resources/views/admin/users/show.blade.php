@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.user.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.id') }}
                            </th>
                            <td>
                                {{ $user->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.name') }}
                            </th>
                            <td>
                                {{ $user->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.email') }}
                            </th>
                            <td>
                                {{ $user->email }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.email_verified_at') }}
                            </th>
                            <td>
                                {{ $user->email_verified_at }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.approved') }}
                            </th>
                            <td>
                                <input type="checkbox" disabled="disabled" {{ $user->approved ? 'checked' : '' }}>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.verified') }}
                            </th>
                            <td>
                                <input type="checkbox" disabled="disabled" {{ $user->verified ? 'checked' : '' }}>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.two_factor') }}
                            </th>
                            <td>
                                <input type="checkbox" disabled="disabled" {{ $user->two_factor ? 'checked' : '' }}>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.user.fields.roles') }}
                            </th>
                            <td>
                                @foreach ($user->roles as $key => $roles)
                                    <span class="label label-info">{{ $roles->title }}</span>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
                @php
                    $nilai = \App\Models\Nilai::with('materi')
                        ->where('user_id', $user->id)
                        ->get();

                    $total = 0;
                    $count = 0;
                    foreach ($nilai as $n) {
                        $total += $n->value;
                        $count++;
                    }
                    $average = $count > 0 ? $total / $count : 0;
                    $detail_nilai = [];

                    foreach ($nilai as $item) {
                        $d = \App\Models\Materi::with('sub_bab', 'klasifikasis')->find($item->materi_id);
                        $detail_nilai[] = [
                            'id' => $item->id,
                            'materi' => $d->keterampilan_apoteker,
                            'value' => $item->value,
                            'sub_bab' => $d->sub_bab->judul_sub_bab,
                            'klasifikasi' => $d->klasifikasis->pluck('klasifikasi')->implode(', '),
                            'subkategori' => $d->klasifikasis->pluck('subkategori')->implode(', '),
                        ];
                    }
                @endphp

                <h3>Nilai Rata-Rata: {{ $average }}</h3>
                <h3>Total Nilai: {{ $total }}</h3>
                <h3>Jumlah Materi: {{ $count }}</h3>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Materi</th>
                            <th>Nilai</th>
                            <th>Sub Bab</th>
                            <th>Klasifikasi</th>
                            <th>Sub Kategori</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detail_nilai as $item)
                            <tr>
                                <td>{{ $item['materi'] }}</td>
                                <td>{{ $item['value'] }}</td>
                                <td>{{ $item['sub_bab'] }}</td>
                                <td>{{ $item['klasifikasi'] }}</td>
                                <td>{{ $item['subkategori'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @php
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
                <canvas id="nilaiRadarChart" width="400" height="400"></canvas>
                {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
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
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            {{ trans('global.relatedData') }}
        </div>
        <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
            <li class="nav-item">
                <a class="nav-link" href="#user_user_alerts" role="tab" data-toggle="tab">
                    {{ trans('cruds.userAlert.title') }}
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" role="tabpanel" id="user_user_alerts">
                @includeIf('admin.users.relationships.userUserAlerts', [
                    'userAlerts' => $user->userUserAlerts,
                ])
            </div>
        </div>
    </div>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/helpers.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/helpers.min.js"></script>
