<?php

return [
    'userManagement' => [
        'title'          => 'Manajemen User',
        'title_singular' => 'Manajemen User',
    ],
    'permission' => [
        'title'          => 'Izin',
        'title_singular' => 'Izin',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Peranan',
        'title_singular' => 'Peranan',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Daftar Pengguna',
        'title_singular' => 'User',
        'fields'         => [
            'id'                           => 'ID',
            'id_helper'                    => ' ',
            'name'                         => 'Name',
            'name_helper'                  => ' ',
            'email'                        => 'Email',
            'email_helper'                 => ' ',
            'email_verified_at'            => 'Email verified at',
            'email_verified_at_helper'     => ' ',
            'password'                     => 'Password',
            'password_helper'              => ' ',
            'roles'                        => 'Roles',
            'roles_helper'                 => ' ',
            'remember_token'               => 'Remember Token',
            'remember_token_helper'        => ' ',
            'created_at'                   => 'Created at',
            'created_at_helper'            => ' ',
            'updated_at'                   => 'Updated at',
            'updated_at_helper'            => ' ',
            'deleted_at'                   => 'Deleted at',
            'deleted_at_helper'            => ' ',
            'approved'                     => 'Approved',
            'approved_helper'              => ' ',
            'verified'                     => 'Verified',
            'verified_helper'              => ' ',
            'verified_at'                  => 'Verified at',
            'verified_at_helper'           => ' ',
            'verification_token'           => 'Verification token',
            'verification_token_helper'    => ' ',
            'team'                         => 'Team',
            'team_helper'                  => ' ',
            'two_factor'                   => 'Two-Factor Auth',
            'two_factor_helper'            => ' ',
            'two_factor_code'              => 'Two-factor code',
            'two_factor_code_helper'       => ' ',
            'two_factor_expires_at'        => 'Two-factor expires at',
            'two_factor_expires_at_helper' => ' ',
            'nim'                      => 'Nim',
            'nim_helper'               => ' ',
            'kelas'                    => 'Kelas',
            'kelas_helper'             => ' ',
        ],
    ],
    'cpl' => [
        'title'          => 'Cpl',
        'title_singular' => 'Cpl',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'value'             => 'Value',
            'value_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'subCpmk' => [
        'title'          => 'Sub Cpmk',
        'title_singular' => 'Sub Cpmk',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'value'             => 'Value',
            'value_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'mataKuliah' => [
        'title'          => 'Mata Kuliah',
        'title_singular' => 'Mata Kuliah',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'name'                    => 'Name',
            'name_helper'             => ' ',
            'sks'                     => 'Sks',
            'sks_helper'              => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
            'jumlah_pertemuan'        => 'Jumlah Pertemuan',
            'jumlah_pertemuan_helper' => ' ',
        ],
    ],
    'kela' => [
        'title'          => 'Kelas',
        'title_singular' => 'Kela',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'indikator' => [
        'title'          => 'Indikator',
        'title_singular' => 'Indikator',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'value'             => 'Value',
            'value_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'cpmk' => [
        'title'          => 'Cpmk',
        'title_singular' => 'Cpmk',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'value'             => 'Value',
            'value_helper'      => ' ',
            'sub_cpmk'          => 'Sub Cpmk',
            'sub_cpmk_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'auditLog' => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'team' => [
        'title'          => 'Teams',
        'title_singular' => 'Team',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'owner'             => 'Owner',
            'owner_helper'      => ' ',
        ],
    ],
    'userAlert' => [
        'title'          => 'User Alerts',
        'title_singular' => 'User Alert',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'alert_text'        => 'Alert Text',
            'alert_text_helper' => ' ',
            'alert_link'        => 'Alert Link',
            'alert_link_helper' => ' ',
            'user'              => 'Users',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
        ],
    ],

    'provinsi' => [
        'title'          => 'Provinsi',
        'title_singular' => 'Provinsi',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'nama_provinsi'        => 'Nama Provinsi',
            'nama_provinsi_helper' => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'kabupaten' => [
        'title'          => 'Kabupaten',
        'title_singular' => 'Kabupaten',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'nama_kabupaten'        => 'Nama Kabupaten',
            'nama_kabupaten_helper' => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'provinsi'              => 'Provinsi',
            'provinsi_helper'       => ' ',
        ],
    ],
    'penduduk' => [
        'title'          => 'Penduduk',
        'title_singular' => 'Penduduk',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'nama'                 => 'Nama',
            'nama_helper'          => ' ',
            'nik'                  => 'Nik',
            'nik_helper'           => ' ',
            'jenis_kelamin'        => 'Jenis Kelamin',
            'jenis_kelamin_helper' => ' ',
            'tanggal_lahir'        => 'Tanggal Lahir',
            'tanggal_lahir_helper' => ' ',
            'alamat'               => 'Alamat',
            'alamat_helper'        => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'provinsi'             => 'Provinsi',
            'provinsi_helper'      => ' ',
            'kabupaten'            => 'Kabupaten',
            'kabupaten_helper'     => ' ',
        ],

    ],
    'msCategory' => [
        'title'          => 'Ms Category',
        'title_singular' => 'Ms Category',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'transactionDetail' => [
        'title'          => 'Transaction Detail',
        'title_singular' => 'Transaction Detail',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'value_idr'          => 'Value Idr',
            'value_idr_helper'   => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'transaction'        => 'Transaction',
            'transaction_helper' => ' ',
        ],
    ],
    'transactionHeader' => [
        'title'          => 'Transaction Header',
        'title_singular' => 'Transaction Header',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'description'               => 'Description',
            'description_helper'        => ' ',
            'code'                      => 'Code',
            'code_helper'               => ' ',
            'rate_euro'                 => 'Rate Euro',
            'rate_euro_helper'          => ' ',
            'date_paid'                 => 'Date Paid',
            'date_paid_helper'          => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
            'transaction_detail'        => 'Transaction Detail',
            'transaction_detail_helper' => ' ',
            'category'                  => 'Category',
            'category_helper'           => ' ',
        ],
    ],
    'klasifikasi' => [
        'title'          => 'Klasifikasi',
        'title_singular' => 'Klasifikasi',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'kode_klasifikasi'        => 'Kode Klasifikasi',
            'kode_klasifikasi_helper' => ' ',
            'klasifikasi'             => 'Klasifikasi',
            'klasifikasi_helper'      => ' ',
            'kode_subkategori'        => 'Kode Subkategori',
            'kode_subkategori_helper' => ' ',
            'subkategori'             => 'Subkategori',
            'subkategori_helper'      => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
            'keterangan'                   => 'Keterangan',
            'keterangan_helper'            => ' ',
        ],
    ],
    'bab' => [
        'title'          => 'Bab',
        'title_singular' => 'Bab',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'judul_bab'         => 'Judul Bab',
            'judul_bab_helper'  => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'subBab' => [
        'title'          => 'Sub Bab',
        'title_singular' => 'Sub Bab',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'bab'                  => 'Bab',
            'bab_helper'           => ' ',
            'judul_sub_bab'        => 'Judul Sub Bab',
            'judul_sub_bab_helper' => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'materi' => [
        'title'          => 'Materi',
        'title_singular' => 'Materi',
        'fields'         => [
            'id'                           => 'ID',
            'id_helper'                    => ' ',
            'sub_bab'                      => 'Sub Bab',
            'sub_bab_helper'               => ' ',
            'keterampilan_apoteker'        => 'Keterampilan Apoteker',
            'keterampilan_apoteker_helper' => ' ',
            'kode'                         => 'Kode',
            'kode_helper'                  => ' ',
            'klasifikasi'                  => 'Klasifikasi',
            'klasifikasi_helper'           => ' ',
            'created_at'                   => 'Created at',
            'created_at_helper'            => ' ',
            'updated_at'                   => 'Updated at',
            'updated_at_helper'            => ' ',
            'deleted_at'                   => 'Deleted at',
            'deleted_at_helper'            => ' ',

        ],
    ],
];
