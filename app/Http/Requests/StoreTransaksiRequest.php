<?php

namespace App\Http\Requests;

use App\Models\Transaksi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTransaksiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('transaksi_create');
    }

    public function rules()
    {
        return [
            'tanggal' => [
                'string',
                'nullable',
            ],
            'qty' => [
                'string',
                'nullable',
            ],
            'total_harga' => [
                'string',
                'nullable',
            ],
            'total_bayar' => [
                'string',
                'nullable',
            ],
            'promo' => [
                'string',
                'nullable',
            ],
            'diskon' => [
                'string',
                'nullable',
            ],
            'kustomer' => [
                'string',
                'nullable',
            ],
            'metode_pembayaran' => [
                'string',
                'nullable',
            ],
            'keterangan' => [
                'string',
                'nullable',
            ],
        ];
    }
}