<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Produks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_produk')->nullable();
            $table->string('url_checkout')->nullable();
            $table->string('kode_produk')->nullable();
            $table->string('kategori_produk')->nullable();
            $table->string('koleksi_produk')->nullable();
            $table->string('status_produk')->nullable();
            $table->string('captcha')->nullable();
            $table->string('visibilitas')->nullable();
            $table->string('jumlah_maksimal')->nullable();
            $table->longText('deskripsi')->nullable();
            $table->string('tipe_produk')->nullable();
            $table->string('setting_harga')->nullable();
            $table->string('manajemen_stock')->nullable();
            $table->string('gudang_persediaan')->nullable();
            $table->string('status_stok')->nullable();
            $table->string('setting_bump')->nullable();
            $table->string('setting_pengiriman')->nullable();
            $table->string('ongkos_kirim')->nullable();
            $table->string('kurir_pengiriman')->nullable();
            $table->string('layanan_pengiriman')->nullable();
            $table->string('dikirim_dari')->nullable();
            $table->string('penambahan_biaya_pengiriman')->nullable();
            $table->string('asuransi')->nullable();
            $table->string('metode_pembayaran')->nullable();
            $table->string('kode_unik')->nullable();
            $table->string('reseller')->nullable();
            $table->string('jenis_komisi')->nullable();
            $table->string('tiers')->nullable();
            $table->string('cs_rotator')->nullable();
            $table->string('customer_service')->nullable();
            $table->string('shipper')->nullable();
            $table->string('admin')->nullable();
            $table->string('nama_checkout')->nullable();
            $table->string('template')->nullable();
            $table->string('warna_background')->nullable();
            $table->string('section_titles')->nullable();
            $table->string('header_image')->nullable();
            $table->string('header_setting')->nullable();
            $table->string('gambar_checkout')->nullable();
            $table->string('label_garansi')->nullable();
            $table->string('variasi_produk')->nullable();
            $table->string('bidang_yang_diminta')->nullable();
            $table->string('dropship')->nullable();
            $table->string('button_setting')->nullable();
            $table->string('video')->nullable();
            $table->longText('konten')->nullable();
            $table->string('kolom_kupon')->nullable();
            $table->string('poin_poin')->nullable();
            $table->string('ringkasan_pesanan')->nullable();
            $table->string('testimonials')->nullable();
            $table->string('tracking_produk')->nullable();
            $table->string('logo_bispro')->nullable();
            $table->string('redirect_finish')->nullable();
            $table->string('headline_setting')->nullable();
            $table->string('video_finish')->nullable();
            $table->string('setting_bank')->nullable();
            $table->string('setting_text_finish')->nullable();
            $table->string('tracking_finish')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
