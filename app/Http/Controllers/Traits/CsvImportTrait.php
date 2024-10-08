<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\IOFactory; // Menggunakan IOFactory dari PhpSpreadsheet untuk mendukung Excel dan CSV

trait CsvImportTrait
{
    public function processCsvImport(Request $request)
    {
        try {
            $filename = $request->input('filename', false);
            $path     = storage_path('app/csv_import/' . $filename);

            $hasHeader = $request->input('hasHeader', false);

            $fields = $request->input('fields', false);
            $fields = array_flip(array_filter($fields));

            $modelName = $request->input('modelName', false);
            $model     = "App\Models\\" . $modelName;

            // Gunakan IOFactory untuk mendukung CSV dan Excel
            $spreadsheet = IOFactory::load($path);
            $sheet = $spreadsheet->getActiveSheet();
            $insert = [];

            foreach ($sheet->getRowIterator() as $key => $row) {
                if ($hasHeader && $key == 1) {
                    continue;
                }

                $tmp = [];
                foreach ($fields as $header => $k) {
                    $cell = $row->getCellIterator()->seek($k)->current();
                    if ($cell !== null) {
                        $tmp[$header] = $cell->getValue();
                    }
                }

                if (count($tmp) > 0) {
                    $insert[] = $tmp;
                }
            }

            $for_insert = array_chunk($insert, 100);

            foreach ($for_insert as $insert_item) {
                foreach ($insert_item as $data) {
                    $data['keterampilan_apoteker'] = mb_convert_encoding($data['keterampilan_apoteker'], 'UTF-8', 'auto') ?? null;
                    $materi = $model::create($data);

                    if (isset($data['klasifikasi_id'])) {
                        if (is_array($data['klasifikasi_id'])) {
                            foreach ($data['klasifikasi_id'] as $klasifikasi) {
                                $materi->klasifikasis()->sync([$klasifikasi]);
                            }
                        } else {
                            $materi->klasifikasis()->sync([$data['klasifikasi_id']]);
                        }
                    }
                }
            }

            $rows  = count($insert);
            $table = Str::plural($modelName);

            File::delete($path);

            session()->flash('message', trans('global.app_imported_rows_to_table', ['rows' => $rows, 'table' => $table]));

            return redirect($request->input('redirect'));
        } catch (\Exception $ex) {
            throw $ex;
        }
    }

    public function parseCsvImport(Request $request)
    {
        $file = $request->file('csv_file');
        $request->validate([
            'csv_file' => 'mimes:csv,xlsx,xls',  // Dukung file CSV dan Excel
        ]);

        $path      = $file->path();
        $hasHeader = $request->input('header', false) ? true : false;

        // Gunakan IOFactory untuk mendukung berbagai format file
        $spreadsheet = IOFactory::load($path);
        $sheet = $spreadsheet->getActiveSheet();
        $headers = $sheet->rangeToArray('A1:Z1', null, true, true, true)[1]; // Ambil header dari baris pertama
        $lines   = [];

        $i = 0;
        // foreach ($sheet->getRowIterator(2) as $row) {
        //     if ($i < 5) {
        //         $lines[] = $sheet->rangeToArray('A' . $row->getRowIndex() . ':Z' . $row->getRowIndex(), null, true, true, true)[1];
        //         $i++;
        //     } else {
        //         break;
        //     }
        // }
        foreach ($sheet->getRowIterator(2) as $row) {
            $rowData = $sheet->rangeToArray('A' . $row->getRowIndex() . ':Z' . $row->getRowIndex(), null, true, true, true);

            // Pastikan rowData memiliki data sebelum mengakses index 1
            if (isset($rowData[1])) {
                $lines[] = $rowData[1];
            }

            // Batasi jumlah baris yang dibaca, misalnya hanya 5 baris
            if ($i++ >= 5) {
                break;
            }
        }


        $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
        $file->storeAs('csv_import', $filename);

        $modelName     = $request->input('model', false);
        $fullModelName = "App\Models\\" . $modelName;

        $model     = new $fullModelName();
        $fillables = $model->getFillable();

        $redirect = url()->previous();

        $routeName = 'admin.' . strtolower(Str::plural(Str::kebab($modelName))) . '.processCsvImport';

        return view('csvImport.parseInput', compact('headers', 'filename', 'fillables', 'hasHeader', 'modelName', 'lines', 'redirect', 'routeName'));
    }
}
