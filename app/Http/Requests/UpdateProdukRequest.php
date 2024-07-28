<?php

namespace App\Http\Requests;

use App\Models\Produk;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProdukRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('produk_edit');
    }

    public function rules()
    {
        return [
            'nama_produk' => [
                'string',
                'nullable',
            ],
            'url_checkout' => [
                'string',
                'nullable',
            ],
            'kode_produk' => [
                'string',
                'nullable',
            ],
            'kategori_produk' => [
                'string',
                'nullable',
            ],
            'koleksi_produk' => [
                'string',
                'nullable',
            ],
            'status_produk' => [
                'string',
                'nullable',
            ],
            'captcha' => [
                'string',
                'nullable',
            ],
            'visibilitas' => [
                'string',
                'nullable',
            ],
            'jumlah_maksimal' => [
                'string',
                'nullable',
            ],
            'gambar' => [
                'array',
            ],
            'tipe_produk' => [
                'string',
                'nullable',
            ],
            'setting_harga' => [
                'string',
                'nullable',
            ],
            'manajemen_stock' => [
                'string',
                'nullable',
            ],
            'gudang_persediaan' => [
                'string',
                'nullable',
            ],
            'status_stok' => [
                'string',
                'nullable',
            ],
            'setting_bump' => [
                'string',
                'nullable',
            ],
            'setting_pengiriman' => [
                'string',
                'nullable',
            ],
            'ongkos_kirim' => [
                'string',
                'nullable',
            ],
            'kurir_pengiriman' => [
                'string',
                'nullable',
            ],
            'layanan_pengiriman' => [
                'string',
                'nullable',
            ],
            'dikirim_dari' => [
                'string',
                'nullable',
            ],
            'penambahan_biaya_pengiriman' => [
                'string',
                'nullable',
            ],
            'asuransi' => [
                'string',
                'nullable',
            ],
            'metode_pembayaran' => [
                'string',
                'nullable',
            ],
            'kode_unik' => [
                'string',
                'nullable',
            ],
            'reseller' => [
                'string',
                'nullable',
            ],
            'jenis_komisi' => [
                'string',
                'nullable',
            ],
            'tiers' => [
                'string',
                'nullable',
            ],
            'cs_rotator' => [
                'string',
                'nullable',
            ],
            'customer_service' => [
                'string',
                'nullable',
            ],
            'shipper' => [
                'string',
                'nullable',
            ],
            'admin' => [
                'string',
                'nullable',
            ],
            'nama_checkout' => [
                'string',
                'nullable',
            ],
            'template' => [
                'string',
                'nullable',
            ],
            'warna_background' => [
                'string',
                'nullable',
            ],
            'section_titles' => [
                'string',
                'nullable',
            ],
            'header_image' => [
                'string',
                'nullable',
            ],
            'header_setting' => [
                'string',
                'nullable',
            ],
            'gambar_checkout' => [
                'string',
                'nullable',
            ],
            'label_garansi' => [
                'string',
                'nullable',
            ],
            'variasi_produk' => [
                'string',
                'nullable',
            ],
            'bidang_yang_diminta' => [
                'string',
                'nullable',
            ],
            'dropship' => [
                'string',
                'nullable',
            ],
            'button_setting' => [
                'string',
                'nullable',
            ],
            'video' => [
                'string',
                'nullable',
            ],
            'kolom_kupon' => [
                'string',
                'nullable',
            ],
            'poin_poin' => [
                'string',
                'nullable',
            ],
            'ringkasan_pesanan' => [
                'string',
                'nullable',
            ],
            'testimonials' => [
                'string',
                'nullable',
            ],
            'tracking_produk' => [
                'string',
                'nullable',
            ],
            'logo_bispro' => [
                'string',
                'nullable',
            ],
            'redirect_finish' => [
                'string',
                'nullable',
            ],
            'headline_setting' => [
                'string',
                'nullable',
            ],
            'video_finish' => [
                'string',
                'nullable',
            ],
            'setting_bank' => [
                'string',
                'nullable',
            ],
            'setting_text_finish' => [
                'string',
                'nullable',
            ],
            'tracking_finish' => [
                'string',
                'nullable',
            ],
        ];
    }
}