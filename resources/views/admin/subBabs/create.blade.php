@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.subBab.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.sub-babs.store') }}" enctype="multipart/form-data">
                @csrf
                <!-- Select Bab -->
                <div class="form-group">
                    <label for="bab_id">{{ trans('cruds.subBab.fields.bab') }}</label>
                    <select class="form-control select2 {{ $errors->has('bab') ? 'is-invalid' : '' }}" name="bab_id"
                        id="bab_id">
                        @foreach ($babs as $id => $entry)
                            <option value="{{ $id }}" {{ old('bab_id') == $id ? 'selected' : '' }}>
                                {{ $entry }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('bab'))
                        <div class="invalid-feedback">
                            {{ $errors->first('bab') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.subBab.fields.bab_helper') }}</span>
                </div>

                <!-- Input Teks Judul Sub Bab Awalnya -->
                <div class="form-group" id="judul_sub_bab_group">
                    <label for="judul_sub_bab">{{ trans('cruds.subBab.fields.judul_sub_bab') }}</label>
                    <input class="form-control {{ $errors->has('judul_sub_bab') ? 'is-invalid' : '' }}" type="text"
                        name="judul_sub_bab" id="judul_sub_bab" value="{{ old('judul_sub_bab', '') }}">
                    @if ($errors->has('judul_sub_bab'))
                        <div class="invalid-feedback">
                            {{ $errors->first('judul_sub_bab') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.subBab.fields.judul_sub_bab_helper') }}</span>
                </div>

                <!-- Dropdown Select untuk Judul Sub Bab (Disembunyikan Awalnya) -->
                <div class="form-group" id="select_sub_bab_group" style="display: none;">
                    <label for="select_sub_bab">{{ trans('cruds.subBab.fields.judul_sub_bab') }}</label>
                    <select class="form-control select2" name="select_sub_bab" id="select_sub_bab">
                        <!-- Dynamic options from API akan ditambahkan di sini -->
                    </select>
                    <span class="help-block">{{ trans('cruds.subBab.fields.judul_sub_bab_helper') }}</span>
                </div>

                <!-- Input Teks Baru untuk Sub Bab (Disembunyikan Awalnya) -->
                <div class="form-group" id="sub_bab_group" style="display: none;">
                    <label for="sub_bab">{{ trans('cruds.subBab.fields.sub_bab') }}</label>
                    <input class="form-control" type="text" name="sub_bab" id="sub_bab"
                        value="{{ old('sub_bab', '') }}">
                    <span class="help-block">{{ trans('cruds.subBab.fields.sub_bab_helper') }}</span>
                </div>

                <button class="btn btn-success" type="button" id="add_sub_bab_button">Add Sub Bab</button>

                <div class="form-group mt-4">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            console.log('Create Sub Bab script loaded');

            // Bind event listener untuk select2
            $('#bab_id').on('change.select2', function() {
                const babId = $(this).val(); // Mengambil value dari select2
                console.log('Bab changed to:', babId); // Debug untuk melihat apakah event listener bekerja

                // Lakukan fetch data sub bab
                fetchSubBab(babId);
            });

            // Fungsi untuk mengambil data sub bab dari API
            function fetchSubBab(babId) {
                console.log('Fetching sub bab for bab ID:', babId); // Debug untuk memastikan fetch dijalankan

                fetch('/getSub-bab', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content')
                        },
                        body: JSON.stringify({
                            bab_id: babId
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log('Data fetched:', data); // Debug untuk memastikan data diterima

                        const selectSubBab = document.getElementById('select_sub_bab');
                        selectSubBab.innerHTML = ''; // Kosongkan select sebelumnya

                        if (data.length > 0) {
                            data.forEach(item => {
                                const option = document.createElement('option');
                                option.value = item.id;
                                option.textContent = item
                                    .judul_sub_bab; // Sesuaikan dengan nama kolom di response
                                selectSubBab.appendChild(option);
                            });
                        } else {
                            const option = document.createElement('option');
                            option.value = '';
                            option.textContent = 'Tidak ada sub bab tersedia';
                            selectSubBab.appendChild(option);
                        }

                        // Re-initialize Select2 jika menggunakan select2
                        $('#select_sub_bab').select2();
                    })
                    .catch(error => console.error('Error fetching sub-bab:', error));
            }
        });



        // Event listener untuk ketika tombol "Add Sub Bab" diklik
        document.getElementById('add_sub_bab_button').addEventListener('click', function() {
            // Sembunyikan input teks untuk Judul Sub Bab
            document.getElementById('judul_sub_bab_group').style.display = 'none';

            // Tampilkan Select Sub Bab dan input teks untuk Sub Bab
            document.getElementById('select_sub_bab_group').style.display = 'block';
            document.getElementById('sub_bab_group').style.display = 'block';
        });
    </script>
@endsection
