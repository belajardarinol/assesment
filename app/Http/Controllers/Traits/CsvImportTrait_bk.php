<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use SpreadsheetReader;

trait CsvImportTrait_bk
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

            $reader = new SpreadsheetReader($path);
            $insert = [];

            foreach ($reader as $key => $row) {
                if ($hasHeader && $key == 0) {
                    continue;
                }

                $tmp = [];
                foreach ($fields as $header => $k) {
                    if (isset($row[$k])) {
                        $tmp[$header] = $row[$k];
                    }
                }

                if (count($tmp) > 0) {
                    // $tmp['klasifikasi_id'] = $request->input('klasifikasi_id', []);
                    $insert[] = $tmp;
                }
            }

            $for_insert = array_chunk($insert, 100);

            foreach ($for_insert as $insert_item) {
                foreach ($insert_item as $data) {
                    // var_dump($data);
                    // die;
                    $data['keterampilan_apoteker'] = mb_convert_encoding($data['keterampilan_apoteker'], 'UTF-8', 'auto') ?? null;
                    $materi = $model::create($data);
                    if (isset($data['klasifikasi_id'])) {
                        // $data = [1,2];
                        if (is_array($data['klasifikasi_id'])) {
                            foreach ($data['klasifikasi_id'] as $klasifikasi) {
                                $materi->klasifikasis()->sync([$klasifikasi]);
                            }
                        } else {
                            $materi->klasifikasis()->sync([$data['klasifikasi_id']]);
                        }
                        // $materi->klasifikasis()->sync($data['klasifikasi_id']);
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
            'csv_file' => 'mimes:csv,txt',
        ]);

        $path      = $file->path();
        $hasHeader = $request->input('header', false) ? true : false;

        $reader  = new SpreadsheetReader($path);
        $headers = $reader->current();
        $lines   = [];

        $i = 0;
        while ($reader->next() !== false && $i < 5) {
            $lines[] = $reader->current();
            $i++;
        }

        $filename = Str::random(10) . '.csv';
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
